@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col">
			<div class="card">
				<div class="card-header">All {{ $title }}</div>
				<div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                            <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    @if ($title == 'Clients')
                                    <th scope="col">Meter Number</th>
                                    <th scope="col">First Meter Reading</th>
                                    @endif
                                    <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $key => $user)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    @if ($title == 'Clients')
                                    <td>{{ $user->meter_number }}</td>
                                    <td>{{ number_format($user->first_meter_reading, 2) }} M<sup>3</sup></td>
                                    @endif
                                    @if (Auth::user()->role != 'client')
                                    <td>
                                        <div class="btn-group">
                                            @if ($title != 'Users')
                                            <a href="{{ route('bills.user', $user->id) }}" class="btn btn-sm btn-warning">Add Bill</a>
                                            <a href="{{ route('bills.show', $user->id) }}" class="btn btn-sm btn-success">View Bills</a>
                                            @endif @if (Auth::user()->role == 'admin')
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="{{ route('users.delete', $user->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                            @endif
                                        </div>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $users->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
