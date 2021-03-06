<nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
	<div class="container">
		<a class="navbar-brand text-uppercase font-weight-bold" href="{{ url('/') }}">
            <span class='text-primary'>Water</span> Billing <span class='text-primary'>System</span>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			@auth
			<!-- Left Side Of Navbar -->
			<ul class="navbar-nav mr-auto">
				<li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
				<li class="nav-item"><a href="{{ route('bills.index') }}" class="nav-link">Bills</a></li>
				<li class="nav-item"><a href="{{ route('bills.unpaid') }}" class="nav-link">Unpaid Bills</a></li>
				<li class="nav-item"><a href="{{ route('notifications.index') }}" class="nav-link">Notifications</a></li>
				@if (Auth::user()->role != 'client')
				<li class="nav-item"><a href="{{ route('users.clients') }}" class="nav-link">Clients</a></li>
				@endif
				@if (Auth::user()->role == 'admin')
				<li class="nav-item"><a href="{{ route('payments.index') }}" class="nav-link">Payments</a></li>
				<li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link">Users</a></li>
				@endif
				@if (Auth::user()->role == 'client')
				<li class="nav-item"><a href="{{ route('settings.show') }}" class="nav-link">Settings</a></li>
				@endif
			</ul>
			@endauth

			<!-- Right Side Of Navbar -->
			<ul class="navbar-nav ml-auto">
				<!-- Authentication Links -->
				@guest
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
					</li>
					@if (Route::has('register'))
						<li class="nav-item">
							<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
						</li>
					@endif
				@else
					<li class="nav-item dropdown">
						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>

						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ route('logout') }}"
								onclick="event.preventDefault();
												document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</div>
					</li>
				@endguest
			</ul>
		</div>
	</div>
</nav>
