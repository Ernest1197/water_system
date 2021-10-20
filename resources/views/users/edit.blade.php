@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
            @include('partials.alert')
			<div class="card">
				<div class="card-header">Edit User</div>
				<div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input
                            type="text"
                            id="name"
                            class="form-control"
                            name="name"
                            placeholder="Name"
                            value="{{ $user->name }}"
                        />
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input
                            type="email"
                            id="email"
                            class="form-control"
                            name="email"
                            placeholder="Email"
                            value="{{ $user->email }}"
                        />
                        </div>
                        <div class="form-group">
                          <label for="role">Role</label>
                            <select name="role" id="role" class="form-control">
                                <option value="{{ $user->role }}" selected>{{ $user->role }}</option>
                                <option value="client">client</option>
                                <option value="user">user</option>
                                <option value="admin">admin</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="meter_number">Meter Number</label>
                              <input
                                type="text"
                                id="meter_number"
                                class="form-control"
                                name="meter_number"
                                placeholder="Meter Number"
                                value="{{ $user->meter_number }}"
                            />
                          </div>
                        <div class="form-group">
                            <label for="first_meter_reading">First Meter Reading (in M<sup>3</sup>)</label>
                            <input
                                type="text"
                                id="first_meter_reading"
                                class="form-control"
                                name="first_meter_reading"
                                placeholder="First Meter Reading"
                                value="{{ $user->first_meter_reading }}"
                            />
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
