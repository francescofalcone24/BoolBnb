@extends('layouts.admin')

@section('content')

	@if (session('message'))
		<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			<strong>{{ session('message') }}</strong>
		</div>
	@endif
	<h1 class=" text-center card-title ms-4 mt-5">{{ $selectedSuite->title }}</h1>
	<div class="jumbotron p-3 mb-4 rounded-3 ">
		<div class="vista col-12 ">
			<div class="col-6">
				@if (Str::startsWith($selectedSuite->img, 'http'))
					<img class="col-12 object-fit-contain rounded p-2" src="{{ $selectedSuite['img'] }}">
				@else
					<img class="col-12 object-fit-contain rounded p-2" src="{{ asset('/storage/' . $selectedSuite->img) }}">
				@endif
			</div>
			<div class="card-body col-lg-6 col-sm-12 px-5 align-self-start">

				<h3 class="mb-5">Suite informations:</h3>
				<h4>
					<p>
						Rooms <i class="fa-solid fa-person-shelter" aria-hidden="true"></i> {{ $selectedSuite->room }}
					</p>
					<p>
						Bathrooms <i class="fa fa-bath" aria-hidden="true"></i> {{ $selectedSuite->bathroom }}
					</p>
					<p>
						Beds <i class="fa fa-bed" aria-hidden="true"></i> {{ $selectedSuite->bed }}
					</p>
					<p>
						Address: {{ $selectedSuite->address }}
					</p>

					<a href=" {{ route('admin.suite.edit', $selectedSuite->id) }} " class="btn btn-primary my-2">EDIT</a>
					 
					<button type="button" class="btn btn-danger" data-bs-toggle="modal"
						data-bs-target="#modal-{{ $selectedSuite->id }}">
						DELETE
					</button>
					@if ($selectedSuite->sponsor == 1)
					<h3 class="text-success"> Sponsorizzato <i class="fa-solid fa-coins text-warning"></i> </h3>
					@else 
					<a href="{{route('admin.payment', $selectedSuite->slug)}}" class="btn btn-success">sponsorizza <i class="fa-solid fa-coins text-warning"></i></a>
					@endif
					{{-- __________________________________________________________________ --}}

					{{-- <div>
						@if ($selectedSuite->visible == 1)
							<h3 class="text-primary align-center">VISIBLE <a class="btn btn-primary" href="#"> <i class="fa fa-eye" aria-hidden="true"></i></a></h3> 
						@else
							<h3 class="text danger">NOT VISIBLE <a class="btn btn-primary" href="#"> <i class="fa fa-eye-slash" aria-hidden="true"></i></a></h3>
						@endif
					</div> --}}

					<a class="btn btn-outline-success" href="{{route('admin.visuals.show', $selectedSuite->id)}}">Analytics <i class="fa-solid fa-chart-line"></i></a>

					{{-- INIZIO SEZIONE MODALE --}}

					<div class="modal fade" id="modal-{{ $selectedSuite->id }}" tabindex="-1" data-bs-backdrop="static"
						data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{ $selectedSuite->id }}" aria-hidden="true">
						<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm " role="document">
							<div class="modal-content bg-dark">
								<div class="modal-header">
									<h5 class="modal-title text-white" id="modalTitle-{{ $selectedSuite->id }}">
										Delete suite
									</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>

								<div class="modal-body text-center">
									<span class="text-white">
										Are you sure you want to delete
										<br>
										<strong>
											{{ $selectedSuite->title }}?
										</strong>
									</span>
									<br>
									<span class="text-danger">
										Danger, you cannot undo this operation
									</span>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
										Close
									</button>

									<form action="{{ route('admin.suite.destroy', $selectedSuite->id) }}" method="post">
										@csrf
										@method('DELETE')

										<button type="submit" class="btn btn-danger">
											Confirm
										</button>

									</form>
								</div>
							</div>
						</div>
					</div>
					{{-- FINE SEZIONE MODALE --}}







					{{-- <form action="{{ route('admin.suite.destroy', $selectedSuite->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger ">
                        DELETE
                    </button>
                </form> --}}


			</div>
		</div>
	</div>
@endsection

<style scoped>
	.vista{
		display: flex;
		flex-direction: row
	}
	@media only screen and (max-width: 700px) {
		.vista{
		display: flex;
		flex-direction: column;
		align-items: center
	}
}
</style>