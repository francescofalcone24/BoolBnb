<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Sponsor;
use Illuminate\Support\Facades\DB;
use App\Models\Suite;

use Illuminate\Http\Request;

class SuiteController extends Controller
{
    public function index()
    {
        // $suites = Suite::all();
        return response()->json([
            'success' => true,
            'results' => Suite::with('sponsors', 'services', 'messages')->paginate(70)
        ]);
    }

    public function latest()
    { $dates = "2024-09-13";
        return response()->json([
            'success' => true,
            'results' => Suite::with('services')->where('suites.sponsor', 1)->orderBy("updated_at", "DESC")
            ->with(['sponsors' => function ($query) {
                 $query->orderByRaw("DATE_FORMAT(suite_sponsor.created_at, '%p')DESC");
            }])
            ->get()
        ]);
    } 

    public function show($slug)
    {
        $suite = Suite::with('sponsors', 'services', 'messages')->where('slug', $slug)->first();

        if ($suite) {
            return response()->json([
                'status' => true,
                'results' => $suite
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'suite not found...'
            ]);
        }
    }

    
    public function search(Request $request, Suite $suite)
    {
        $data = $request->query->all();
     
        $latitude_from_front = $data['latitude'];

        $longitude_from_front =  $data['longitude'];

        $room_from_front = 0;
        
        if(isset($data['room'])){
            
            $room_from_front = $data['room'];
          
        }

        $bed_from_front = 0;
        
        if(isset($data['bed'])){
            $bed_from_front = $data['bed'];   
        };
        $service_from_front = ['1','2','3','4','5','6'];
        
        if(isset($data['service']))
        {
            $service_from_front = $data['service'];
        };
        // dd($service_from_front);
          function radiusSearch( $latitude_from_front, $longitude_from_front , $room_from_front, $bed_from_front,$service_from_front)
        // function radiusSearch( $latitude_from_front, $longitude_from_front , $room_from_front, $bed_from_front)
        {
            $radius = 20;
            return  Suite::with('sponsors', 'services')
            ->where(DB::raw('111.1111 * DEGREES(ACOS(COS(RADIANS(' . $latitude_from_front . ')) * COS(RADIANS(suites.latitude)) * COS(RADIANS(' . $longitude_from_front . ' -suites.longitude)) +
             SIN(RADIANS(' . $latitude_from_front . ')) * SIN(RADIANS(suites.latitude))))'), '<=', $radius)
            ->where('room','>',$room_from_front)
            ->where('bed' ,'>',$bed_from_front) 
            ->whereHas('services', function($query) use ($service_from_front){$query->whereIn('service_id', $service_from_front);})
            ->get();
        }
        // $data = radiusSearch($latitude_from_front, $longitude_from_front,$room_from_front,$bed_from_front);
        $data = radiusSearch($latitude_from_front, $longitude_from_front,$room_from_front,$bed_from_front,$service_from_front);
        $service = Service::all();
        return response()->json([
            'success' => true,
            'quanti' => count($data),
            'results' => [$data,$service],
            'params' => [    
            'lat' =>  $latitude_from_front,
            'long'=> $longitude_from_front,
            'rom' => $room_from_front,
            'bed' => $bed_from_front,
            'service' => $service_from_front
            ]
        ]);
    }
}
