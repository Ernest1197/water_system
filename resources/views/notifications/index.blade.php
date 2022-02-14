@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col">
			<div class="card">
				<div class="card-header">Notifications</div>
				<div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Message</th>
                            <th scope="col">Time</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($notifications as $key => $notification)
                            <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $notification->message }}</td>
                            <td>{{ $notification->created_at }}</td>
                            <td>
                                <a
                                    class="btn btn-sm btn-primary"
                                    href="{{ route('notifications.seen', $notification->id) }}"
                                >
                                    Mark Read
                                </a>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    {{ $notifications->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
