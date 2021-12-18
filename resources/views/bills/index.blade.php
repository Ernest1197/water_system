@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col">
			<div class="card">
				<div class="card-header">{{ isset($user) ? $user->name . ' (bills)' : 'All Bills' }}</div>
				<div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Previous Reading</th>
                                <th scope="col">Present Reading</th>
                                <th scope="col">Consumption</th>
                                <th scope="col">Price</th>
                                <th scope="col">Bill Amount</th>
                                <th scope="col">Client</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($bills as $key => $bill)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ number_format($bill->previous_reading, 2) }} M<sup>3</sup></td>
                                    <td>{{ number_format($bill->present_reading, 2) }} M<sup>3</sup></td>
                                    <td>{{ number_format($bill->consumption, 2) }} M<sup>3</sup></td>
                                    <td>{{ number_format($bill->price) }} RWF</td>
                                    <td>{{ number_format($bill->bill_amount) }} RWF</td>
                                    <td>{{ $bill->client->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            @if (Auth::user()->role != 'client')
                                            <a href="{{ route('bills.edit', $bill->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="{{ route('bills.delete', $bill->id) }}" class="btn btn-sm btn-warning">Delete</a>
                                            @else
                                            <a href="#" class="btn btn-sm btn-secondary">Pay Now</a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $bills->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(() => {
  const backgroundColor = [
    'rgba(255, 99, 132, 0.2)',
    'rgba(54, 162, 235, 0.2)',
    'rgba(255, 206, 86, 0.2)',
    'rgba(75, 192, 192, 0.2)',
    'rgba(153, 102, 255, 0.2)',
    'rgba(255, 159, 64, 0.2)',
  ]
  const borderColor = [
    'rgba(255, 99, 132, 1)',
    'rgba(54, 162, 235, 1)',
    'rgba(255, 206, 86, 1)',
    'rgba(75, 192, 192, 1)',
    'rgba(153, 102, 255, 1)',
    'rgba(255, 159, 64, 1)',
  ]
  const adChart = document.getElementById('ad-chart').getContext('2d')
  const userChart = document.getElementById('user-chart').getContext('2d')
  const searchChart = document.getElementById('search-chart').getContext('2d')
  const categoryChart = document.getElementById('category-chart').getContext('2d')

  axios('')

//   fetch('/dashboard/stats')
//     .then((res) => res.json())
//     .then(
//       ({
//         ads,
//         users,
//         searches,
//         categories,
//         adCount,
//         userCount,
//         searchCount,
//         commentCount,
//         categoryCount,
//         notificationCount,
//       }) => {
//         const adLabels = []
//         const adData = []
//         const userLabels = []
//         const userData = []
//         const searchLabels = []
//         const searchData = []
//         const categoryLabels = []
//         const categoryData = []

//         $('#ad-count').text(countSummary(adCount))
//         $('#user-count').text(countSummary(userCount))
//         $('#search-count').text(countSummary(searchCount))
//         $('#comment-count').text(countSummary(commentCount))
//         $('#category-count').text(countSummary(categoryCount))
//         $('#notification-count').text(countSummary(notificationCount))

//         ads.map((item) => {
//           adLabels.push(item.title)
//           adData.push(item.likesCount)
//         })
//         users.reverse().map((item) => {
//           userLabels.push(item.firstName + ' ' + item.lastName)
//           userData.push(item.adsCount)
//         })
//         searches.reverse().map((item) => {
//           searchLabels.push(item.keyword)
//           searchData.push(item.frequency)
//         })
//         categories.map((item) => {
//           categoryLabels.push(item.name)
//           categoryData.push(item.adsCount)
//         })

//         new Chart(adChart, {
//           type: 'doughnut',
//           options: { scales: { y: { beginAtZero: true } } },
//           data: {
//             labels: adLabels,
//             datasets: [
//               {
//                 label: 'Advert Statistics',
//                 data: adData,
//                 backgroundColor,
//                 borderColor,
//                 borderWidth: 1,
//               },
//             ],
//           },
//         })
//         new Chart(userChart, {
//           type: 'bar',
//           options: { scales: { y: { beginAtZero: true } } },
//           data: {
//             labels: userLabels,
//             datasets: [
//               {
//                 label: 'User Statistics',
//                 data: userData,
//                 backgroundColor,
//                 borderColor,
//                 borderWidth: 1,
//               },
//             ],
//           },
//         })
//         new Chart(searchChart, {
//           type: 'bar',
//           options: { scales: { y: { beginAtZero: true } } },
//           data: {
//             labels: searchLabels,
//             datasets: [
//               {
//                 label: 'Search Statistics',
//                 data: searchData,
//                 backgroundColor,
//                 borderColor,
//                 borderWidth: 1,
//               },
//             ],
//           },
//         })
//         new Chart(categoryChart, {
//           type: 'polarArea',
//           options: { scales: { y: { beginAtZero: true } } },
//           data: {
//             labels: categoryLabels,
//             datasets: [
//               {
//                 label: 'Category Statistics',
//                 data: categoryData,
//                 backgroundColor,
//                 borderColor,
//                 borderWidth: 1,
//               },
//             ],
//           },
//         })
//         $('.wrapper').removeClass('d-none')
//         $('#spinner').remove()
//       }
//     )
})
</script>
@endsection
