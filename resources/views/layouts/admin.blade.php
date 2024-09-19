<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	{{-- <title>{{ config('app.name', 'BoolBnB') }}</title> --}}
	<title>BoolBnB</title>

	<!-- Fontawesome 6 cdn -->
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
		integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=='
		crossorigin='anonymous' referrerpolicy='no-referrer' />

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Usando Vite -->
	@vite(['resources/js/app.js'])
</head>

<body>
	<div id="app">

		<div class="container-fluid vh-100">
			<div class="row h-100">
				{{-- *****************************SIDE BAR NAV***************************** --}}

				<nav id="sidebarMenu" class="col-lg-2 d-md-block bg-dark navbar-dark nav-bar-expand-lg ">
					<div id="nav" class="position-sticky pt-3">
						<ul class="nav nav-lg">

							<li class="nav-item">
								<a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-secondary' : '' }}"
									href="{{ route('admin.dashboard') }}">
									<i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> Dashboard
								</a>
							</li>

							<li class="nav-item">
								<a
									class="nav-link text-white {{ Route::currentRouteName() == 'admin.suite.index' || Route::currentRouteName() == 'admin.suite.show' || Route::currentRouteName() == 'admin.suite.create' || Route::currentRouteName() == 'admin.suite.edit' || Route::currentRouteName() == 'admin.payment' ? 'bg-secondary' : ''}}"
									href="{{ route('admin.suite.index') }}">
									<i class="fa-solid fa-bars fa-lg fa-fw"></i> Suites
								</a>
							</li>

							<li class="nav-item">
								<a
									class="nav-link text-white {{ Route::currentRouteName() == 'admin.messages.index' || Route::currentRouteName() == 'admin.messages.show' ? 'bg-secondary' : '' }}"
									href="{{ route('admin.messages.index') }}">
									<i class="fa-regular fa-message fa-lg fa-fw" aria-hidden="true"></i></i> Messages
								</a>
							</li>


							<li class="nav-item">
								<a class="nav-link text-white" href="{{ route('logout') }}"
									onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									<i class="fa-solid fa-sign-out-alt fa-lg fa-fw"></i> {{ __('Logout') }}
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
									@csrf
								</form>
							</li>

						</ul>
						<p class="d-inline-flex gap-1">
							<button class="btn btn-primary my-toggle" type="button" data-bs-toggle="collapse"
								data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
								<i class="fa fa-navicon" aria-hidden="true"></i>
							</button>
						</p>
						{{-- *****************************COLLAPSE MENU***************************** --}}
						<div class="collapse" id="collapseExample">
							<div class="card card-body">
								<ul class="nav nav-breack">

									<li class="nav-item">
										<a class="nav-link text-dark {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-secondary' : '' }}"
											href="{{ route('admin.dashboard') }}">
											<i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> Dashboard
										</a>
									</li>

									<li class="nav-item">
										<a
											class="nav-link text-dark {{ Route::currentRouteName() == 'admin.suite.index' || Route::currentRouteName() == 'admin.suite.show' || Route::currentRouteName() == 'admin.suite.edit' || Route::currentRouteName() == 'admin.suite.create' ? 'bg-secondary' : '' }}"
											href="{{ route('admin.suite.index') }}">
											<i class="fa-solid fa-bars fa-lg fa-fw"></i> Suites
										</a>
									</li>

									<li class="nav-item">
										<a
											class="nav-link text-dark {{ Route::currentRouteName() == 'admin.messages.index' || Route::currentRouteName() == 'admin.messages.show' ? 'bg-secondary' : '' }}"
											href="{{ route('admin.messages.index') }}">
											<i class="fa-regular fa-message fa-lg fa-fw" aria-hidden="true"></i></i> Messages
										</a>
									</li>


									<li class="nav-item">
										<a class="nav-link text-dark" href="{{ route('logout') }}"
											onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
											<i class="fa-solid fa-sign-out-alt fa-lg fa-fw"></i> {{ __('Logout') }}
										</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
											@csrf
										</form>
									</li>

								</ul>
							</div>
						</div>







					</div>
				</nav>

				<main class="col-md-12 col-lg-10">
					@yield('content')
				</main>
			</div>
		</div>

	</div>
</body>

</html>

<style scoped>
	.nav-lg {
		display: flex;
		flex-direction: column;
	}

	.my-toggle {
		display: none;
	}

	@media only screen and (max-width: 1400px) {
		.nav-lg {
			display: flex;
			flex-direction: column;
		}
	}

	@media only screen and (max-width: 992px) {
		.nav-lg {
			display: flex;
			flex-direction: row;
		}

		nav {
			height: fit-content;
			padding: 1rem;
		}
	}

	@media only screen and (max-width: 796px) {

		.my-toggle {
			display: block;
		}

		.nav-breack {
			display: flex;
			flex-direction: column;
		}

		.nav-lg {
			display: none;
		}

		.offcanvas-body {
			z-index: 999999;
		}
	}
</style>
