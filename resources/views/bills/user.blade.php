@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
            @include('partials.alert')
			<div class="card">
				<div class="card-header">Add bill to <b>{{ $user->name }}</b></div>
				<div class="card-body">
                    <form method="post" action="{{ route('bills.store') }}">
                        @csrf
                        <div class="form-group">
                          <label for="previous_reading">Previous Reading (in M<sup>3</sup>)</label>
                          <input
                            type="text"
                            id="previous_reading"
                            class="form-control"
                            name="previous_reading"
                            placeholder="Previous Reading"
                            value="{{ $previous_reading }}"
                        />
                        </div>
                        <div class="form-group">
                          <label for="present_reading">Present Reading (in M<sup>3</sup>)</label>
                          <input
                            type="text"
                            id="present_reading"
                            class="form-control"
                            name="present_reading"
                            placeholder="Present Reading"
                        />
                        </div>
                        <div class="form-group">
                          <label for="price">Price (in RWF)</label>
                            <input type="text" id="price" class="form-control" name="price" placeholder="Price" value="200">
                          </div>
                        <input type='hidden' name="client_id" value="{{ $user->id }}" />
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
