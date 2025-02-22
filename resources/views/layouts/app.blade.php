<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	{{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
	<title>BoolBnB</title>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">

	{{-- Braintree --}}
	<script src="https://js.braintreegateway.com/web/dropin/1.43.0/js/dropin.min.js"></script>
	<script src="https://js.braintreegateway.com/web/3.103.0/js/hosted-fields.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
	<!-- Usando Vite -->
	@vite(['resources/js/app.js'])
</head>

<body>
	<div id="app">


		<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
			<div class="container">
				<div class="w-100 d-flex justify-space-between">
					{{-- ***********************LOGO**************************** --}}
					<div class="">
						<a class="navbar-brand " href="{{ url('/') }}">
							<div class="logo_laravel col-4">

								<img src="/img/BoolBnB.png" alt="" srcset="" width="100px">
							</div>
						</a>
					</div>

					{{-- ***********************BOTTONE RESPONSIVE**************************** --}}
					<div class="align-self-center ms-auto mx-2">
						<button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
							aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
							<span class="navbar-toggler-icon"></span>
						</button>
					</div>


					<!-- Right Side Of Navbar -->
					<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

						<ul class="navbar-nav ms-auto">
							{{-- ***********************RIGHT SIDE LINKS**************************** --}}
							<li class="nav-item">
								<a class="nav-link" href="http://localhost:5173/">Homepage</a>
							</li>

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
									<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
										aria-haspopup="true" aria-expanded="false" v-pre>
										{{ Auth::user()->name }}
									</a>

									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
										<a class="dropdown-item" href="{{ route('logout') }}"
											onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
											{{ __('Logout') }}
										</a>

										<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
											@csrf
										</form>
									</div>
								</li>
							@endguest
						</ul>
					</div>
				</div>
		</nav>

		<main class="">
			@yield('content')
		</main>
	</div>
</body>

</html>
