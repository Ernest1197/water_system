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
				  <th scope="col">Paid</th>
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
                  <td>{{ $bill->paid ? 'yes' : 'no' }}</td>
				  <td>
					<div class="btn-group">
					  @if (Auth::user()->role != 'client')
                        <a href="{{ route('bills.edit', $bill->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{ route('bills.delete', $bill->id) }}" class="btn btn-sm btn-warning">Delete</a>
					  @elseif (!$bill->paid)
					    <button onclick="makePayment({{ $bill->bill_amount }}, {{ $bill->id }})" class="btn btn-sm btn-secondary">Pay Now</button>
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
<script src="https://checkout.flutterwave.com/v3.js"></script>
<script>
  function makePayment(amount = 0, bill = 0) {
    FlutterwaveCheckout({
      public_key: "FLWPUBK_TEST-5673fc12394b028302345a548ac784d8-X",
      tx_ref: 'water-bill-' + bill,
      amount,
      payment_options: 'card,mobilemoney',
      currency: "RWF",
      network: "MTN",
      redirect_url: '/bills/pay',
      customer: {
        email: "{{ Auth::user()->email }}",
        phone_number: "{{ Auth::user()->contact }}",
        name: "{{ Auth::user()->name }}",
      },
      customizations: {
        title: "Water Management System",
        description: "Keep up with your water consumption & bills",
      },
      callback: function (data) {
        console.log(data);
      },
      onclose: function() {},
    });
  }
</script>
@endsection
