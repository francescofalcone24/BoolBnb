@extends('layouts.admin')

@section('content')
    <form id="sponsorships_update" action="{{ route('admin.suite.update', $suite[0]->id) }}" method="POST"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <section class="container pt-5">

            <div class="mb-4 row">
                <h2 class="col-12 mb-3 col-form-label text-md-right">You had chosen to sponsorship :</h2>
                <h1 class="col-12 mb-3">{{ $suite[0]->title }} {{ $suite[0]->id }}</h1>
                <h4 class="col-12 mb-5">Situated in : {{ $suite[0]->address }}</h4>
                <div class="col-md-10 d-flex gap-3 justify-content-center">
                    @foreach ($sponsor as $item)
                        <div class="card col-3 mr-2">
                            <div class="card-body" style="position: relative">
                                <div class="form-check text-center">
                                    <input class="form-check-input" type="radio" name="sponsorship" id="sponsor"
                                        value="{{ $item->id }}" style="border: 1.5px solid rgb(48, 48, 48)">
                                    <label class="form-check-label" for="sponsor">
                                        <h5 class="card-title">{{ $item->name }}</h5>
                                    </label>
                                </div>

                                <h6 class="card-subtitle mb-2 text-body-secondary">$ : {{ $item->price }} </h6>
                                <p>FOR</p>
                                <p class="card-text text-center">{{ str_replace(':00:00', '', $item->period) }} Hours in
                                    sponsorization </p>
                                    @if($item->id == 2)
                                    <span class="" style="width:100%px;position: relative;bottom:-15px; float :left;padding: 0 3px 0 5px;border-radius:5px; border-bottom: 35px solid rgb(42, 66, 252);border-right: 29px solid rgba(77, 41, 223, 0); color:whitesmoke">
                                        <span style="display :block;position:relative;bottom: -22px ">Most Sailed</span>
                                      
                                    </span>
                                    @endif
                            </div>
                        </div>
                    @endforeach
                    {{-- @error('spo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror --}}
                </div>
            </div>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            {{-- <button type="submit">premi</button> --}}
    </form>

    <div class="content container justify-content-end">
        <div class="col-6" style="margin-left: 10rem">

            <form method="post" id="payment-form" action="{{ url('/checkout') }}">
                @csrf
                <section class="w-100">
                    <div class="bt-drop-in-wrapper">
                        <div id="bt-dropin"></div>
                    </div>
                </section>

                <input id="nonce" name="payment_method_nonce" type="hidden" />
                <button id="pay" class="btn  btn-primary" type="submit"><span>Pay</span></button>

            </form>
            <div id="container_button"></div>

        </div>
    </div>
    </div>

    </section>
    <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
    <script>
        var form = document.querySelector('#payment-form');
        var client_token = "{{ $token }}";
        // let active = document.getElementById('pay')
        function ciao() {
            if (radio.checked = true) {
                console.log('buonooo')
                getPay()
            } else {
                console.log('ciaooo')
            }

        };
        let radio = document.querySelectorAll("input[type='radio']")
        radio.forEach((radio) => radio.addEventListener('click', ciao))

        function getPay() {

            braintree.dropin.create({
                authorization: client_token,
                selector: '#bt-dropin',
            }, function(createErr, instance) {
                if (createErr) {
                    console.log('Create Error', createErr);
                    return;
                }
                form.addEventListener('click', function(event) {
                    event.preventDefault();

                    instance.requestPaymentMethod(function(err, payload) {


                        if (err) {
                            console.log('Request Payment Method Error', err);
                            return;

                        } else {
                            console.log(payload, 'è stato pagato')
                            form_da_inviare = document.getElementById('sponsorships_update')
                            form_da_inviare.submit()
                        }


                        // Add the nonce to the form and submit
                        // document.querySelector('#nonce').value = payload.nonce;
                        // form.submit();
                    });
                });
            });
        }
    </script>
    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
@endsection
