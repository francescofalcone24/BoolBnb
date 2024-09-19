@extends('layouts.admin')

@section('content')
	<section class="p-0">
		<div class="container-fluid mt-4 h-100">
			<div class="row justify-content-center align-items-center h-100">
				<div class="col-md-4">
					<div class="card">
						<div class="card-header text-center">{{ __('Dashboard') }}</div>

						<div class="card-body">
							@if (session('status'))
								<div class="alert alert-success" role="alert">
									{{ session('status') }}
								</div>
							@endif

							<p class="fs-4 fw-semibold text-center">{{ __('Welcome') }} {{ Auth::user()->name }}</p>

							<div class="text-center">
								<a href="{{ route('admin.suite.create') }}" class="btn btn-warning btn-lg" type="button">Add a Suite</a>

								<a href="{{ route('admin.suite.index') }}" class="btn btn-info btn-lg " type="button">My Suites</a>
							</div>


							{{-- ------------- --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

<style scoped>
	.card {
		z-index: 1;
	}

	section {
		background-image: url('/img/interno.jpg');
		background-size: contain;
		height: 90%;
	}
</style>
