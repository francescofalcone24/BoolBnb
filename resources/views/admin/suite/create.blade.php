@extends('layouts.admin')

@section('content')
    <div class="jumbotron px-5 pt-3 rounded-3">
        <h3>Add a suite:</h3>
        {{-- {{$suite}} --}}
    </div>
 

    <form action="{{ route('admin.suite.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="my-width m-5">
            <label for="suite_title" class="form-label">*Title:</label>
            <input type="text" class="form-control" id="suite_title" placeholder="Suite Title" name="title" oninput="disabledButton()"
                value="{{ old('title') }}" required>
        </div>
        @error('title')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="my-width m-5">
            <label for="suite_room" class="form-label">*Rooms:</label>
            <input type="number" class="form-control" id="suite_room" placeholder="Number of rooms" name="room" oninput="disabledButton()"
                min="1" max="20" value="{{ old('room') }}" required>
        </div>
        @error('room')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="my-width m-5">
            <label for="suite_bed" class="form-label">*Beds:</label>
            <input type="number" class="form-control" id="suite_bed" placeholder="Number of beds" name="bed" oninput="disabledButton()"
                min="1" max="20"value="{{ old('bed') }}" required>
        </div>
        @error('bed')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="my-width m-5">
            <label for="suite_bathroom" class="form-label">*Bathrooms:</label>
            <input type="number" class="form-control" id="suite_bathroom" placeholder="Number of bathrooms" name="bathroom" oninput="disabledButton()"
                min="1" max="10"value="{{ old('bathroom') }}" required>
        </div>
        @error('bathroom')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="my-width m-5">
            <label for="suite_squareM" class="form-label">*Square Meters:</label>
            <input type="number" class="form-control" id="suite_squareM" placeholder="Square meters" name="squareM" oninput="disabledButton()"
                min="25"value="{{ old('squareM') }}" required>
        </div>
        @error('squareM')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="my-width m-5">
            <label for="suite_address" class="form-label">*Address:</label>
            <input type="text" class="form-control" id="suite_address" placeholder="Address" name="address" oninput="disabledButton()"
                value="{{ old('address') }}" required>
            <div class="position-relative">
                <ul id="result" class="list-group position-absolute">
                    {{-- suggest here --}}
                </ul>
            </div>
        </div>
        <div class="my-width m-5">
            <label for="suite_img" class="form-label">*Upload Suite Images:</label>

            <input type="file" accept=".png,.jpg,.jpeg,.webp,image/png" class="form-control" name="img"
                id="Suite_img" required />
        </div>
        @error('img')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        {{-- <div class="mb-4 row">
            <label class="col-md-2 col-form-label text-md-right">Sponsor</label>
            <div class="col-md-10">
                @foreach ($sponsor as $item)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sponsorship" value="{{ $item->id }}"
                            id="sponsorship{{ $item->id }}">
                            
                        
                        <label class="form-check-label" for="sponsorship{{ $item->id }}"> {{ $item->name }}</label>
                    </div>
                @endforeach
                @error('sponsorship')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                
            </div> --}}

        <div class="m-5 row d-flex flex-column">
            <label class="col-md-2 col-form-label text-md-right">Services:</label>
            <div class="col-md-10">
                @foreach ($service as $item)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="service[]" value="{{ $item->id }}"
                            id="tech{{ $item->id }}">


                        <label class="form-check-label" for="tech{{ $item->id }}"> {{ $item->name }}</label>
                    </div>
                @endforeach
                @error('service')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

       

        {{-- <h1 id="prova"></h1> --}}
        <button id="my-btn" type="submit" class="btn btn-primary fs-5 mx-5 mb-5"> Add Suite </button>
    </form>
    <script>
        const input = document.getElementById("suite_address");
        input.addEventListener("input", autocomplete);
        let risultati = document.getElementById("result");
        let result_suggest;

        function autocomplete(value) {
            const base_url = "https://api.tomtom.com/search/2/search/"
            risultati.innerHTML = null;

            let codifica = value.target.value
            let mid_url = codifica.replace(/ /g, '%20');
            const apiKey = `.json?key=jmRHcyl09MwwWAWkpuc1wvI3C3miUjkN&limit=5&countrySet={IT}`

            delete axios.defaults.headers.common['X-Requested-With'];

            axios.get(base_url + mid_url + apiKey).then(response => {
                result_suggest = [];
                result_suggest = response.data.results;
                console.log(result_suggest)
                for (let index = 0; index <= result_suggest.length - 1; index++) {
                    let suggest = result_suggest[index].address;
                    let address_suggest = document.createElement("li");

                    address_suggest.classList.add("list-group-item");
                    address_suggest.classList.add("list-group-item-action");
                    address_suggest.classList.add("list-group-item");
                    address_suggest.innerHTML = `${suggest.freeformAddress}`;

                    address_suggest.addEventListener('click', function() {
                        input.value = address_suggest.innerHTML;
                        risultati.innerHTML = null;
                    })
                    risultati.append(address_suggest);
                }
            });
        }

        // ***************************************Logica Dave's Button **********************************************************

        let btn = document.getElementById("my-btn");
        btn.classList.add("disabled");
        let title = document.getElementById("suite_title");
        let room = document.getElementById("suite_room");
        let bed = document.getElementById("suite_bed");
        let bathroom = document.getElementById("suite_bathroom");
        let address = document.getElementById("suite_address");
        let squareM = document.getElementById("suite_squareM");

        function disabledButton() {
            if ( (title.value != "") && (room.value != "") && (bed.value != "") && (bathroom.value != "") && (squareM.value != "") && (address.value != "") ) {
                btn.classList.remove("disabled");
            }else {
                btn.classList.add("disabled");
            }
        }

        // *************************************************************************************************



    </script>
@endsection

<style scoped>
    .my-width{
            width: 50%;
        }   
    @media only screen and (max-width: 992px) {
        .my-width{
            width: 80%;
        }
    }
</style>