@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card">
				<div class="card-header">My Bills</div>
				<div class="card-body">
					<table class="table table-bordered">
						<thead class="thead-light">
						  <tr>
								<th scope="col">#</th>
								<th scope="col">Previous Reading</th>
								<th scope="col">Present Reading</th>
								<th scope="col">Consumption</th>
								<th scope="col">Price</th>
								<th scope="col">Bill Amount</th>
								<th scope="col">Action</th>
						  </tr>
						</thead>
						<tbody>
							@foreach($bills as $bill)
							<tr>
								<th scope="row">{{ $bill->id }}</th>
								<td>{{ $bill->previous_reading }}</td>
								<td>{{ $bill->present_reading }}</td>
								<td>{{ $bill->consumption }}</td>
                                <td>{{ $bill->price }}</td>
                                <td>{{ $bill->bill_amount }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('bills.edit', $bill->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="{{ route('bills.destroy', $bill->id) }}" class="btn btn-sm btn-warning">Delete</a>
                                    </div>
                                </td>
							</tr>
                            @endforeach
						</tbody>
                    </table>
                    {{ $bills->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
