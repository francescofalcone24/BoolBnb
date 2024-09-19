<button id="canvas_triggher" class="btn btn-primary" type="button"
                                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                                            aria-controls="offcanvasRight">Toggle right
                                            offcanvas </button>
                                            <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                                                <div class="offcanvas-header w-50">
                                                   
                                                    <h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                </div>
                                                <div class="offcanvas-body " >
                                                    {{-- @foreach ($sponsor as $item)
                                                        <button>{{$item->name}}</button>
                                                    @endforeach --}}
                                        
                                        
                                        
                                                    <div class="flex-center position-ref full-height">
                                                           
                                                        <form id="sponsorships_update" action="" method="POST" enctype="multipart/form-data">
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="mb-4 row">
                                                                <label class="col-md-2 col-form-label text-md-right">Sponsor</label>
                                                                <h6>Appartamento numero </h6>
                                                                <div class="col-md-10">
                                                                    {{-- @foreach ($sponsor as $item) --}}
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="sponsorship"
                                                                                value="" 
                                                                                {{-- id="tech{{ $item->id }}" --}}
                                                                                >
                                                                            
                                        
                                                                            <label class="form-check-label" for="">
                                                                                {{-- {{ $item->name }} --}}
                                                                            </label>
                                                                        </div>
                                                                    {{-- @endforeach --}}
                                                                    @error('technologies')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
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
                                        
                                                        <div class="content">
                                        
                                                            <form method="post" id="payment-form" action="{{ url('/checkout') }}">
                                                                @csrf
                                                                <section>
                                                                    <label for="amount">
                                                                        <span class="input-label">Amount</span>
                                                                        <div class="input-wrapper amount-wrapper">
                                                                            <h3>qua deve andare il prezzo</h3>
                                                                        </div>
                                                                    </label>
                                        
                                                                    <div class="bt-drop-in-wrapper">
                                                                        <div id="bt-dropin"></div>
                                                                    </div>
                                                                </section>
                                        
                                                                <input id="nonce" name="payment_method_nonce" type="hidden" />
                                                                <button class="button" type="submit"><span>Test Transaction</span></button>
                                                               
                                                            </form>
                                                            <div id="container_button"></div>
                                                        </div>
                                                    </div>
                                        
                                                    <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
                                                    <script>
                                                        var form = document.querySelector('#payment-form');
                                                        var client_token = "{{ $token }}";
                                        
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
                                                    </script>
                                        
                                        
                                                </div>
                                            </div>
                                    