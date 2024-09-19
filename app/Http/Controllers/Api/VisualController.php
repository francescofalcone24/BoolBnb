<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Suite;
use App\Models\Visual;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Validator;

class VisualController extends Controller
{
    //
    public function index() {
        // return response([
        //     'success' => true,
        //     'results' => Visual::all(),
        // ]);
      

       
    }

    public function store(Request $request) {
        // 
         $data = $request->all();
         $data['date'] = now();
        
         
         
         if (DB::table('visuals')->where('ip_address', $data['ip'])
         ->where('suite_id', '=',  $data['suite'])

         ->exists()) {
            return response()->json([
                'success' => true,
                'results' => 'esiste già'
            ]);
        }else{
            $new_visual = new Visual();
            // $new_visual->fill($data);
            $new_visual->suite_id = $data['suite'];
            $new_visual->ip_address = $data['ip'];
            $new_visual->date = $data['date'];
            // dd($new_visual);
            $new_visual->save();
            return response()->json([
                'success' => true,
                'results' => 'aggiunto'
            ]);
        }
        
        // $new_visual = Visual::create([
        //      'ip_address' => $data->visuals->ip_address,
        //      'suite_id' => $data->visuals->suite_id,
        //      'date' => now(),
        //  ]) ;
        //  $new_visual->save();

        // return response()->json([
        //     'success' => true,
        //     'results' => $request->all()
        // ]);
    }
    public function show(String $id){
        //
        // $user_id = Auth::user()->id;
        // $suite = Suite::where('id', $id)->first();
        // $visuals = Visual::where('suite_id', $id)->get();

        // $dati = [
        //     'visuals' => $visuals,
        //     'suite' => $suite,
        // ];
        $visuals = DB::table('visuals')->select(DB::raw('MONTH(date) as month'), 
        DB::raw('COUNT(suite_id) as visuals'))->where('suite_id', $id)->groupBy('month')->get();


        // dd($data);
        return view('admin.visuals.show', compact('visuals'));

    }
}
