@extends('layouts.admin')

@section('content')
    <div class="jumbotron m-4 rounded-3">

        
        

        @if ( count($suite) == 0)
            <h1>
                You don't have any suites yet
            </h1>
            <a href="{{ route('admin.suite.create') }}" class="btn btn-warning btn-lg" type="button">Add a Suite</a>
        @else 

        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{session('message')}}</strong>
            </div>
        @endif
             
         <div class="d-flex justify-content-between align-items-center">
            <h1>My Suites: {{count($suite)}} 
            </h1>
            <div class="my-div">
                <a class="btn btn-warning text-dark {{ Route::currentRouteName() == 'admin.suite.create' ? 'bg-secondary' : '' }}"
									href="{{ route('admin.suite.create') }}">
									<i class="fa-solid fa-plus fa-lg fa-fw"></i> Aggiungi Suite
				</a>
            </div>

         </div>

        <div class="d-flex justify-content-center">
                <table class="styled-table w-100">
                    <thead class="">
                        <th>SUITE IMAGE</th>
                        <th>SUITE TITLE</th>
                        <th>SUITE SPONSOR</th>
                        <th>SUITE VISIBILITY</th>
                        <th>ACTION</th>
                    </thead>
                    <tbody>
                    @foreach ($suite as $item)
                        
                        <tr>
                            <td>
                                @if (Str::startsWith($item->img, 'http'))
                                <img class="rounded p-2" src="{{ $item['img'] }}">
                                @else
                                <img class="rounded p-2" src="{{ asset('/storage/' . $item->img) }}">
                                @endif
                            </td>
                            
                            <td> {{$item->slug}} </td>
                            
                            
                            @if ($item->sponsor == 1)
                            <td class=" my-bg-sponsorized"> Sponsorizzato <i class="fa-solid fa-coins text-warning"></i> </td> 
                            @else 
                            <td><form action=>
                                
                                <a href="{{route('admin.payment' , $item->slug , $item->sponsors->id) }}" class="btn btn-success">{{$item->slug}} <i class="fa-solid fa-coins text-warning"></i></a> </td>
                            </form> 
                            @endif
                            
                       
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
    img{
        width: 5rem;
    }
    .my-div{
        width: rem;
    }
    .styled-table {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        font-family: sans-serif;
        min-width: 400px;
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


</style>