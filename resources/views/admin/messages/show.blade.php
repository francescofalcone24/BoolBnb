@extends('layouts.admin')

@section('content')
	<div class="container ">

		@foreach ($suite->messages as $item)
			<div class="card mt-5">
				<div class="card-header">
					From: {{ $item->email }}
				</div>
				<div class="card-body">
					@if ($item->name != null)
						<h5 class="card-title">{{ $item->name }}</h5>
					@else
						<h5 class="card-title">Anonymous</h5>
					@endif
					<p class="card-text">{{ $item->text }}</p>

				</div>
				<div class="card-footer text-body-secondary">
					{{ $item->date }}
				</div>
			</div>
		@endforeach
	</div>
@endsection
