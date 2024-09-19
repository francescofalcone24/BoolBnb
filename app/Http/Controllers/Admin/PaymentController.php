<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Suite;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Braintree_Transaction;
use Braintree\Gateway;

class PaymentController extends Controller
{
    private $gateway;
    // use Braintree_Transaction;
    public function __construct()
    {
        $this->gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => 'yz8kqy5b4s9p34y4',
            'publicKey' => 'wyc972ft929h3vwc',
            'privateKey' => '159ac0e7bdcfb9af1a24d85bacdbcd8d',
        ]);
    }
    public function generateToken(Sponsor $sponsor, Suite $suite)
    {   $suite = Suite::findOrFail($suite->slug);
        $amount =  Sponsor::findOrFail($sponsor->id); // L'importo del pagamento
        $token = $this->gateway->clientToken()->generate();
        $token = $this->gateway->clientToken()->generate();
        $data =[
            'token' => $token,
            'amount'=> $amount
        ];
        return response()->view('welcome', $data);
    }
   

    public function check_in($slug )
    {   
        $suite = Suite::where('slug', $slug)->get();
        $amount =  Sponsor::all();
        $token = $this->gateway->clientToken()->generate();
        $token = $this->gateway->clientToken()->generate();
        $data =[
            'token' => $token,
            'suite' => $suite,
            'sponsor' => $amount,
        ];
       

        return view('admin.payment.esperimento',$data);
       
    }
    
}
