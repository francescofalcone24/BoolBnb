<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Suite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {   $user_id = Auth::user()->id;
        // $mainHome = apartment::select()->where('user_id',$user_id)->get();
        $data = [
            // 'apartment' => Suite::with('user')->select()->where('user_id',$user_id)->get(),
            'suite' => 
            Suite::with('user',
            'messages',
            'visuals',
            'sponsors',
            'services')
            ->select()->where('user_id',$user_id)
            ->get(),
            'giamaicacato' => 'il cazzen'
            
            // 'type' => Type::all() Non è necessario in quanto recupera il nome del type attraverso la RELATIONS delle tabelle
        ];
        return view('admin.dashboard',$data);
    }
}
