@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
        @if (Auth::user()->role != "client")
		<div class="col-md-3">
            <div class="card card-body shadow border-0 mb-2">
                <h1 id='client-count'>{{ $clientCount }}</h1>
                <p>Clients</p>
                <a href="{{ route('users.clients') }}" class="btn btn-sm btn-outline-primary">View</a>
            </div>
        </div>
        @if (Auth::user()->role == "admin")
        <div class="col-md-3">
            <div class="card card-body shadow border-0 mb-2">
                <h1 id='user-count'>{{ $userCount }}</h1>
                <p>Users</p>
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-primary">View</a>
            </div>
        </div>
        @endif
        <div class="col-md-3">
            <div class="card card-body shadow border-0 mb-2">
                <h1 id='bill-count'>{{ number_format($billsCount) }}</h1>
                <p>Bills</p>
                <a href="{{ route('bills.index') }}" class="btn btn-sm btn-outline-primary">View</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-body shadow border-0 mb-2">
                <h1 id='unpaid-bills-count'>{{ number_format($unpaidBillsCount) }}</h1>
                <p>Unpaid Bills</p>
                <a href="{{ route('bills.unpaid') }}" class="btn btn-sm btn-outline-primary">View</a>
            </div>
        </div>
        @else
        <div class="col-md-3">
            <div class="card card-body shadow border-0 mb-2">
                <h1 id='my-bills'>{{ number_format($myBills) }}</h1>
                <p>My Bills</p>
                <a href="{{ route('bills.index') }}" class="btn btn-sm btn-outline-primary">View</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-body shadow border-0 mb-2">
                <h1><span id='total-consumption'>{{ number_format($totalConsumption) }}</span> M<sup>3</sup></h1>
                <p>My Total Consumption</p>
                <a href="{{ route('bills.index') }}" class="btn btn-sm btn-outline-primary">View</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-body shadow border-0 mb-2">
                <h1><span id='total-bill-amount'>{{ number_format($totalBillAmount) }}</span> <small>RWF</small></h1>
                <p>My Total Billed Amount</p>
                <a href="{{ route('bills.index') }}" class="btn btn-sm btn-outline-primary">View</a>
            </div>
        </div>
        @endif @if (Auth::user()->role != "admin")
        <div class="col-md-3">
            <div class="card card-body shadow border-0 mb-2">
                <h1 id='notifications-count'>{{ number_format($notificationsCount) }}</h1>
                <p>Notifications</p>
                <a href="{{ route('notifications.index') }}" class="btn btn-sm btn-outline-primary">View</a>
            </div>
        </div>
        @endif
        <div class="col-md-12 mt-3"><div class='card card-body shadow'><canvas id="chart"></canvas></div></div>
	</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/chart.min.js') }}"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const thisChart = document.getElementById("chart").getContext("2d");

    const backgroundColor = [
        "rgba(255, 99, 132, 0.2)",
        "rgba(54, 162, 235, 0.2)",
        "rgba(255, 206, 86, 0.2)",
        "rgba(75, 192, 192, 0.2)",
        "rgba(153, 102, 255, 0.2)",
        "rgba(255, 159, 64, 0.2)",
    ];
    const borderColor = [
        "rgba(255, 99, 132, 1)",
        "rgba(54, 162, 235, 1)",
        "rgba(255, 206, 86, 1)",
        "rgba(75, 192, 192, 1)",
        "rgba(153, 102, 255, 1)",
        "rgba(255, 159, 64, 1)",
    ];

    setInterval(() => {
        fetch("/stats")
            .then((res) => res.json())
            .then((data) => {
                if (document.getElementById('client-count')) {
                    el = document.getElementById('client-count');
                    el.innerHTML = data.clientCount;
                }
                if (document.getElementById('user-count')) {
                    el = document.getElementById('user-count');
                    el.innerHTML = data.userCount;
                }
                if (document.getElementById('bills-count')) {
                    el = document.getElementById('bills-count');
                    el.innerHTML = data.billsCount;
                }
                if (document.getElementById('my-bills')) {
                    el = document.getElementById('my-bills');
                    el.innerHTML = data.myBills;
                }
                if (document.getElementById('total-consumption')) {
                    el = document.getElementById('total-consumption');
                    el.innerHTML = data.totalConsumption;
                }
                if (document.getElementById('total-bill-amount')) {
                    el = document.getElementById('total-bill-amount');
                    el.innerHTML = Intl.NumberFormat().format(Number.parseFloat(data.totalBillAmount));
                }
                if (document.getElementById('unpaid-bills-count')) {
                    el = document.getElementById('unpaid-bills-count');
                    el.innerHTML = data.unpaidBillsCount;
                }
                if (document.getElementById('notifications-count')) {
                    el = document.getElementById('notifications-count');
                    el.innerHTML = data.notificationsCount;
                }

                const myData = [];
                const myLabels = [];

                data.chart.reverse().map((item) => {
                    myLabels.push(item.client.name);
                    myData.push(item.consumption);
                });

                try {
                    new Chart(thisChart, {
                        type: "bar",
                        options: { scales: { y: { beginAtZero: true } } },
                        data: {
                            labels: myLabels,
                            datasets: [{
                                label: "Water Consumption Statistics",
                                data: myData,
                                backgroundColor,
                                borderColor,
                                borderWidth: 1,
                            }],
                        },
                    });
                } catch (err) {}
            });
    }, 5_000);
});
</script>
@endsection
