@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col">
			<div class="card">
				<div class="card-header">All Payments</div>
				<div class="card-body">
          <button class="btn btn-secondary float-right mb-2" onclick="print()">Print PDF</button>
          <button class="btn btn-secondary float-right mb-2 mx-2" onclick="printExcel()">Print Excel</button>
          <div class="table-responsive">
            <table class="table table-bordered" id='table'>
              <thead class="thead-light">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Method</th>
                  <th scope="col">Consumption</th>
                  <th scope="col">Unit Price</th>
                  <th scope="col">Paid Amount</th>
                  <th scope="col">Client</th>
                  <th scope="col">Time</th>
                </tr>
              </thead>
              <tbody>
                @foreach($payments as $key => $payment)
                <tr>
                  <th scope="row">{{ $key + 1 }}</th>
                  <td>{{ $payment->method }}</td>
                  <td>{{ number_format($payment->bill->consumption, 2) }} M<sup>3</sup></td>
                  <td>{{ number_format($payment->bill->price) }} RWF</td>
                  <td>{{ number_format($payment->amount) }} RWF</td>
                  <td>{{ $payment->client->name }}</td>
                  <td>{{ $payment->created_at }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          {{ $payments->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/tableToExcel.js') }}"></script>
<script>
  function printExcel() {
    TableToExcel.convert(document.getElementById("table"));
  }
</script>
@endsection
