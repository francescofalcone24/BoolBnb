<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use App\Models\Suite;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\SuiteSponsor;
use Braintree\Gateway;
class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $gateway;
    public function __construct()
    {
        $this->gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => 'yz8kqy5b4s9p34y4',
            'publicKey' => 'wyc972ft929h3vwc',
            'privateKey' => '159ac0e7bdcfb9af1a24d85bacdbcd8d',
        ]);
    }
    public function index()
    {
        $user_id = Auth::user()->id;
        $token = $this->gateway->clientToken()->generate();
        $data = [
            'suite' => Suite::with(
                'user',
                'messages',
                'visuals',
                'sponsors',
                'services'
            )->select()->where('user_id', $user_id)->get(),
            'token' => $token,
        ];
        return view('admin.payment.check_in', $data);
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
 
    }

    /**
     * Display the specified resource.
     */
   
    public function show(Sponsor $sponsor, Suite $suite)
    {
        
    
        return view('admin.payment.check_in',);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sponsor $sponsor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sponsor $sponsor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sponsor $sponsor)
    {
        //
    }
}
