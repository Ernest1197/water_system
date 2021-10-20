@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Welcome back <b>{{ Auth::user()->name }}</b>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        </div>
        @if (Auth::user()->role != "client")
		<div class="col-md-3">
            <div class="card card-body">
                <h1>{{ $clientCount }}</h1>
                <p>Clients</p>
                <a href="{{ route('users.clients') }}" class="btn btn-sm btn-outline-primary">View</a>
            </div>
        </div>
        @if (Auth::user()->role == "admin")
        <div class="col-md-3">
            <div class="card card-body">
                <h1>{{ $userCount }}</h1>
                <p>Users</p>
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-primary">View</a>
            </div>
        </div>
        @endif
        <div class="col-md-3">
            <div class="card card-body">
                <h1>{{ $billsCount }}</h1>
                <p>Bills</p>
                <a href="{{ route('home') }}" class="btn btn-sm btn-outline-primary">View</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-body">
                <h1>{{ $billsCount }}</h1>
                <p>Credits</p>
                <a href="{{ route('home') }}" class="btn btn-sm btn-outline-primary">View</a>
            </div>
        </div>
        @endif
	</div>
</div>
@endsection
