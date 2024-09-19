<?php

namespace App\Http\Controllers;

use App\Models\Suite;
use App\Models\Visual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user_id = Auth::user()->id;
        // $suite = Suite::all();
        // // $room
        // $visuals = Visual::with('suites')->where('suite_id', $suite->id)->get()
        // // $data = [
        // //     'visuals' => Suite::with('user', 'visuals',)->where('user_id', $user_id)->get(),

        // // ];
        // $data = [
        //     'visuals' => Visual::all(),
        // ];

        // // dd($data);
        // return view('admin.visuals.graph', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        //
        // $user_id = Auth::user()->id;
        // $suite = Suite::all();
        // // $room
        // $visuals = Visual::with('suites')->where('suite_id', $suite->id)->get();
        // // $data = [
        // //     'visuals' => Suite::with('user', 'visuals',)->where('user_id', $user_id)->get(),

        // // ];
        // $data = [
        //     'visuals' => Visual::all(),
        // ];

        // // dd($data);
        // return view('admin.visuals.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visual $visual)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visual $visual)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visual $visual)
    {
        //
    }
}
