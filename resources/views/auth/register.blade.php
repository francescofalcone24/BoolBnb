@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" autocomplete="off">
                        @csrf

                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" autocomplete="new-surname">

                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            {{-- <label for="birth_date" class="col-md-4 col-form-label text-md-right">{{ __('Birth Date') }}</label> --}}
                            <label class="col-md-4 col-form-label text-md-right" for="birthInput">Birth Date</label>

                            <div class="col-md-6">
                                {{-- <input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" autocomplete="new-birth_date" v-model="age">

                                @error('birth_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror --}}

                                
                                <input id="birth_date" type="date" class="form-control" name="birth_date" value="{{ old('birth_date') }}" autocomplete="new-birth_date" oninput="getBirthDate(), getAbilited()">
                                <span id="birthFeedback" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address*') }}</label> --}}
                            <label class="col-md-4 col-form-label text-md-right" for="emailInput">*E-Mail Address</label>

                            <div class="col-md-6">
                                {{-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"> --}}
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" id="emailInput" oninput="validateEmailInput(), getAbilited()">
                                <span id="emailFeedback" style="color: red;"></span>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            
                            
                        </div>

                        <div class="mb-4 row">
                            <label for="passwordInput" class="col-md-4 col-form-label text-md-right">{{ __('*Password') }}</label>

                            <div class="col-md-6">
                                <input id="passwordInput" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" oninput="validatePassword(), getAbilited()">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('*Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" oninput="validatePassword()">
                                <span id="feedbackPassword" style="color: red;"></span>
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="register">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    const register = document.getElementById('register');


    let abilitedMail = false;
    function validateEmailInput() {
        const emailInput = document.getElementById('emailInput').value;
        const feedbackElement = document.getElementById('emailFeedback');
        const emailRegex = /^[^\s@]+@[^\s@]+.[^\s@]+$/;

        if (emailInput.includes('@') && emailInput.includes('.') && !emailInput.endsWith('.')) {
                feedbackElement.textContent = ""; // Email is valid
                abilitedMail = true
        } else {
                feedbackElement.textContent = "Please enter a valid email address.";
                abilitedMail = false
        }
        getAbilited();
    }

    let userDate = '';
    let abilitedBirth = true;
    function getBirthDate(){
        abilitedBirth = false;
        register.classList.add('disabled')
        let birthInput = document.getElementById('birth_date').value;
        let userDate = birthInput
        console.log(userDate)

        // const currentDate = new Date();
        let dateObj = new Date();
        let month = ('0' + (dateObj.getMonth() + 1)).slice(-2);
        let date = ('0' + dateObj.getDate()).slice(-2);
        let year = dateObj.getFullYear();
        let shortDate = year + '-' + month + '-' + date;
        let minAgeDate = (year - 18) + '-' + month + '-' + date
        let feedbackBirth = document.getElementById('birthFeedback');

        

        // Check if userDate is a valid date and is not in the future
        if (userDate > shortDate) {
            feedbackBirth.textContent = 'Invalid date';
            console.log(userDate>shortDate, 'oltre 2024')
            abilitedBirth = false  
            getAbilited(); 
        }

        else if (userDate > minAgeDate) {
            feedbackBirth.textContent = 'You must be over 18 to register';
            console.log(userDate>shortDate, 'minorenne')
            abilitedBirth = false
            getAbilited();
        }
        else{
            feedbackBirth.textContent = '';
            abilitedBirth = true
            getAbilited();
        } 
        
    }


    let abilitedPassword = false;
    function validatePassword() {
        let passwordInput = document.getElementById('passwordInput').value;
        console.log(passwordInput)
        let passwordConfirm = document.getElementById('password-confirm').value;
        let feedbackPassword = document.getElementById('feedbackPassword');

        if (passwordInput === passwordConfirm) {
            abilitedPassword = true;
            // console.log(abilitedPassword, 'verificata')
            feedbackPassword.textContent = "";
        } else {
            abilitedPassword = false
            // console.log(abilitedPassword, 'invalida')
            feedbackPassword.textContent = "Your password do not match";
        }
        getAbilited();
    }

    function getAbilited(){
        if(abilitedPassword==false && abilitedMail==false && abilitedBirth==false){
            register.classList.add('disabled');
            console.log('disabilitato')
            console.log(abilitedMail == false, 'controllo mail')
            console.log(abilitedPassword == false, 'controllo password')
            console.log(abilitedBirth == false, 'controllo data')
        }
        else if(abilitedPassword==false || abilitedMail==false || abilitedBirth==false){
            register.classList.add('disabled');
            console.log('disabilitato')
            console.log(abilitedMail == false, 'controllo mail')
            console.log(abilitedPassword == false, 'controllo password')
            console.log(abilitedBirth == false, 'controllo data')
        }
        else {
            register.classList.remove('disabled');
            console.log('tutte buone')
            console.log(abilitedMail == false, 'controllo mail')
            console.log(abilitedPassword == false, 'controllo password')
            console.log(abilitedBirth == false, 'controllo data')

        } 
    }
    getAbilited();
</script>
@endsection