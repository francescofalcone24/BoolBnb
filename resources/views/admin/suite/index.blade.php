@extends('layouts.admin')

@section('content')
    <div class="jumbotron m-4 rounded-3">

        
        

        @if ( count($suite) == 0)
            <div class="d-flex justify-content-between">
                <h1>
                    Your Suites:
                </h1>
                <a href="{{ route('admin.suite.create') }}" class="btn btn-warning btn-lg" type="button">Add a Suite</a>
            </div>
            <div class="d-flex justify-content-center align-items-center h-50">
                <h2>You don't have any suite yet</h2>
                
            </div>
        @else 

        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{session('message')}}</strong>
            </div>
        @endif
             
         <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1>Your Suites:</h1>
                <div class="fs-5">You have <strong>{{count($suite)}}</strong> suites</div>
            </div>
            <div class="my-div">
                <a class="btn btn-warning text-dark {{ Route::currentRouteName() == 'admin.suite.create' ? 'bg-secondary' : '' }}"
									href="{{ route('admin.suite.create') }}">
									<i class="fa-solid fa-plus fa-lg fa-fw"></i> Add a Suite
				</a>
            </div>

         </div>

        <div class="d-flex justify-content-center">
            {{-- <div class="row d-flex "> --}}


                {{-- @foreach ($suite as $item)
                    <div class="card m-3" style="width: 30%">
                        @if (Str::startsWith($item->img, 'http'))
                            <img class="card-img-top object-fit-contain w-100  rounded p-2" src="{{ $item['img'] }}">
                        @else
                            <img class="card-img-top object-fit-contain w-100  rounded p-2"
                                src="{{ asset('/storage/' . $item->img) }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }} </h5>
                            <p class="card-text"> Stanze:{{ $item->room }}, Bagni:{{ $suite[0]->bathroom }},
                                Letti:{{ $item->bed }}, Indirizzo:{{ $item->address }} 
                            </p>
                            
                            <a href=" {{ route('admin.suite.edit', $item->id) }} " class="btn btn-primary me-2 fs-5" style="margin-left: 120px">EDIT</a>
                            <a href=" {{ route('admin.suite.show', $item->id) }} " class="btn btn-primary fs-5">VIEW</a>
                            
                        </div>
                    </div>
                @endforeach --}}
                <table class="styled-table w-100">
                    <thead class="">

                        <th>SUITE IMAGE</th>
                        <th>SUITE TITLE</th>
                        {{-- <th>SUITE VISUALS</th> MANCANO LE VISUALIZZAZIONI --}}
                        <th class="sponsor text-center">SUITE SPONSOR</th>
                        {{-- <th class="visibility text-center">SUITE VISIBILITY</th> --}}
                        <th class="action-width text-end">ACTION</th>
                    </thead>
                    <tbody>
                        {{-- {{dd($suite[0]->sponsors[0]->id)}} --}}
                    @foreach ($suite as $item)
                        <tr>
                            <td>
                                @if (Str::startsWith($item->img, 'http'))
                                <img class="rounded p-2" src="{{ $item['img'] }}">
                                @else
                                <img class="rounded p-2" src="{{ asset('/storage/' . $item->img) }}">
                                @endif
                            </td>
                            
                            <td> {{$item->title}} </td>
                            
                            
                            @if ($item->sponsor == 1)
                            <td class="sponsor text-center"><div class="my-bg-sponsored m-auto p-2 fw-semibold"> Sponsored <i class="fa-solid fa-circle-check text-success"></i> </div></td> 
                            @else 
                            <td class="sponsor text-center"> <a href="{{route('admin.payment', $item->slug)}}" class="btn btn-success">Sponsor this suite <i class="fa-solid fa-coins text-warning"></i></a> </td>
                            @endif
                            
                            {{-- @if ($item->visible == 1)
                            <td class="visibility text-center"> <i class="fa fa-eye" aria-hidden="true"></i></td> 
                            @else
                            <td class="visibility"> <i class="fa fa-eye-slash" aria-hidden="true"></i> </td>
                            @endif --}}
                            <td class="action text-end">
                                <a class="btn btn-warning" href="{{route('admin.suite.edit', $item->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                
                                <a class="btn btn-primary" href="{{route('admin.suite.show', $item->id)}}"><i class="fa-solid fa-magnifying-glass"></i></a>
                                
        
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{$item->id}}">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                  </button>
                                <div class="modal fade" id="modal-{{$item->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{$item->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content bg-dark">
                                            <div class="modal-header">
                                                <h3 class="modal-title text-white" id="modalTitle-{{$item->id}}">
                                                    Delete suite "{{$item->title}}"
                                                </h3>
                                                <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                  
                                            <div class="modal-body text-center m-3">
                                                <span class="text-white fs-5">
                                                  Are you sure you want to delete
                                                  <br>
                                                  <strong>
                                                     {{$item->title}}?
                                                  </strong>
                                                </span>
                                                <br>
                                                <span class="text-danger fs-5">
                                                    You cannot undo this operation
                                                </span>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                  
                                                <form action="{{ route('admin.suite.destroy', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                  
                                                    <button type="submit" class="btn btn-danger">
                                                        Delete
                                                    </button>
                                  
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                            </td>
                        </tr>
                        @endforeach   
                    </tbody>
                </table>
            {{-- </div> --}}
        </div>
        @endif
    </div>
@endsection

<style scoped>
    .action-width{
        width: 13%;
        
    }
    .my-bg-sponsored{
        background-color: rgb(0, 208, 255);
        width: 65%;
        border-radius: 5px;
        font-size: 16px
    }
   
    img{
        width: 5rem;
    }
    /* .my-div{
        width: rem;
    } */
    .styled-table {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        font-family: sans-serif;
        min-width: 90%;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .styled-table thead tr {
        background-color: #009879;
        color: #ffffff;
        text-align: left;
    }
    .styled-table th,
    .styled-table td {
        padding: 12px 15px;
    }
     .styled-table tbody tr {
    /* border-bottom: 2px solid #8A9A5B; */
    border-bottom: 1px solid #dddddd;
    }
    tbody tr:nth-child(even) {
        font-weight: bold;
        color: #009879;
        background-color: #f3f3f3;
    }
    tbody tr:last-of-type {
        border-bottom: 5px solid #009879;
    }

    @media only screen and (max-width: 1232px) {
        td .btn-warning{
            display: none
        }
        .action{
            display: flex;
            gap: 1rem
        }

        .my-bg-sponsored{
        width: 75%;
        }
    }
    @media only screen and (max-width: 992px) {
        /* .action{
            display: none;
        } */
        td .btn-danger{
            display: none

        }
        .my-bg-sponsored{
        width: 95%;
        }
    }
    @media only screen and (max-width: 576px) {
        /* .action{
            display: none;
        } */
       .sponsor{
        display: none;
       }
    }
    @media only screen and (max-width: 435px) {
        /* .action{
            display: none;
        } */
       .visibility{
        display: none;
       }
    }

</style>