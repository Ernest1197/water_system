@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">Bill <b>{{ $user->name }}</b></div>
				<div class="card-body">
                    <form method="post" action="{{ route('bills.store') }}">
                        @csrf
                        <div class="form-group">
                          <label for="previous_reading">Previous Reading (ML)</label>
                          <input type="number" id="previous_reading" class="form-control" name="previous_reading" placeholder="Previous Reading">
                        </div>
                        <div class="form-group">
                          <label for="present_reading">Present Reading (ML)</label>
                          <input type="number" id="present_reading" class="form-control" name="present_reading" placeholder="Present Reading">
                        </div>
                        <div class="form-group">
                          <label for="price">Price (RWF)</label>
                            <input type="number" id="price" class="form-control" name="price" placeholder="Price" value="200">
                          </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
