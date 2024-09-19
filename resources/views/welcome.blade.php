@extends('layouts.app')

@section('content')
	<div class="my_jumbotron">
		<div class="container-fluid p-0">
			<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="{{ asset('/img/' . 'Villa_St_Tropez_3729da2012.webp') }}" class="d-block " alt="...">
						<div class="carousel-caption d-none d-md-block my_bg ">
							<h4>Enjoy every moment</h4>
							<p>Home is not where we live, but wherever we are understood.</p>
						</div>
					</div>
					<div class="carousel-item">
						<img src="{{ asset('/img/' . 'Villa.jpg') }}" class="d-block " alt="...">
						<div class="carousel-caption d-none d-md-block my_bg ">
							<h4>Find you're story</h4>
							<p>Each House is a story that is not identical to any other.</p>
						</div>
					</div>
					<div class="carousel-item">
						<img src="{{ asset('/img/' . 'ville-di-lusso.jpg') }}" class="d-block " alt="...">
						<div class="carousel-caption d-none d-md-block my_bg ">
							<h4>Feel at Home</h4>
							<p>Home is that place where, when you go, they always welcome you.</p>
						</div>
					</div>
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
					<span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
					<span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
		@endsection

		<style scoped>
			.my_bg {
				background-color: rgba(128, 128, 128, 0.534);
				width: 40%;
				margin: 0 auto
			}

			.my_jumbotron {
				height: calc(100vh - 4.5rem);
				/* overflow: hidden */
			}

			.my_jumbotron img {
				width: 100%;
				height: 100%;
				object-fit: cover;
			}


			.nerko-one-regular {
				font-family: "Nerko One", cursive;
				font-weight: 400;
				font-style: normal;
				font-size: 85px;
			}

			@media only screen and (max-width: 768px) {
				.breack {
					display: flex;
					flex-direction: column;
				}

				.my_jumbotron img {
					width: 100%;
					height: 10%;
				}

			}

			@media only screen and (max-width: 992px) {


				.my_jumbotron img {
					width: 100%;
					height: 30%;
				}

			}

			@media only screen and (max-width:1200px) {


				.my_jumbotron img {
					width: 100%;
					height: 75%;
				}

			}
		</style>
