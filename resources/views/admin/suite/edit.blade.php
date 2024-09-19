@extends('layouts.admin')

@section('content')
<div class="jumbotron px-5 pt-3 rounded-3">
    <h3>Edit {{$suite->title}}:</h3>
</div>

    <form action="{{ route('admin.suite.update', $suite->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @method('PUT')
        @csrf
        <div class="my-width m-5">
            <label for="suite_title" class="form-label">Title:</label>
            <input type="text" class="form-control" id="suite_title" value="{{$suite->title}}" name="title" required>
        </div>
        @error('title')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="my-width m-5">
            <label for="suite_room" class="form-label">Rooms:</label>
            <input type="number" class="form-control" id="suite_room" value="{{$suite->room}}" name="room" min="1" max="20">
        </div>
        @error('room')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="my-width m-5">
            <label for="suite_bed" class="form-label">Beds:</label>
            <input type="number" class="form-control" id="suite_bed" value="{{$suite->bed}}" name="bed" min="1" max="20">
        </div>
        @error('bed')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="my-width m-5">
            <label for="suite_bathroom" class="form-label">Bathrooms:</label>
            <input type="number" class="form-control" id="suite_bathroom" value="{{$suite->bathroom}}" name="bathroom" min="1" max="10">
        </div>
        @error('bathroom')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="my-width m-5">
            <label for="suite_squareM" class="form-label">Square Meters:</label>
            <input type="number" class="form-control" id="suite_squareM" value="{{$suite->squareM}}" name="squareM" min="25">
        </div>
        @error('squareM')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="my-width m-5">
            <label for="suite_address" class="form-label">*Address:</label>
            <input type="text" class="form-control" id="suite_address" placeholder="Address" name="address"
                value="{{ old('address') }}" required>
            <div class="position-relative">
                <ul id="result" class="list-group position-absolute">
                    {{-- suggest here --}}
                </ul>
                
              
               
        </div>
        @error('address')
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
                
                
            </div>
        </div> --}}
        <div class="my-width my-4">
            <div class="d-flex" style="width: 100px">
                <span >Current IMG:</span>
                @if(Str::startsWith($suite->img, 'http'))
                <img class="w-100 ms-3 mb-3" src="{{ $suite->img }}" alt="">
                @else
                <img class="w-100 ms-3 mb-3" src="{{ asset('/storage/' . $suite->img) }}" alt="">
                @endif
            </div>
            <label for="suite_img" class="form-label mb-2">Update IMG:</label>
            <input type="file" class="form-control" name="img" id="suite_img" value="{{$suite->img}}" accept=“.png,.jpg,.jpeg,.webp,image/png” />
        </div>
        
        @error('img')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div class="my-5 row d-flex flex-column">
            <label class="col-md-2 col-form-label text-md-right">Services:</label>
            <div class="col-md-10">
                @foreach ($service as $item)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services[]" value="{{ $item->id }}" autocomplete=""
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
        <button  type="submit" class="btn btn-primary fs-5 mx-5 mb-5"> Edit Suit </button>
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
        };

        // ************************************************************************************

        (function() {
            var some_id = document.getElementById('suite_title');
            some_id.type = 'text';
            some_id.removeAttribute('autocomplete');
        })();
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