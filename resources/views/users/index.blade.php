@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card">
				<div class="card-header">All Users</div>
				<div class="card-body">
					<table class="table">
						<thead class="thead-light">
						  <tr>
								<th scope="col">#</th>
								<th scope="col">Name</th>
								<th scope="col">Email</th>
								<th scope="col">Role</th>
								<th scope="col">Meter Number</th>
								<th scope="col">Action</th>
						  </tr>
						</thead>
						<tbody>
							@foreach($users as $user)
							<tr>
								<th scope="row">{{ $user->id }}</th>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->role }}</td>
                                <td>{{ $user->meter_number }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-sm btn-warning">Delete</a>
                                    </div>
                                </td>
							</tr>
                            @endforeach
						</tbody>
                    </table>
                    {{ $users->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
