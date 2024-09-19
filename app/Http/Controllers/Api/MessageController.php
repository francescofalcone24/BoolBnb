<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewMail;
use App\Models\Message;
use App\Models\Suite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class MessageController extends Controller
{
    //********************** INDEX *********************************/
    public function index()
    {

        $user_id = Auth::user()->id;
        $suite = Suite::with('user', 'messages', 'sponsors')->where('user_id', $user_id)->get();
        // $messages = Message::where('suite_id', $suite['id'])->get();
        $data = [
            'suite' => $suite,
            // 'messages' => $messages

        ];
        return view('admin.messages.index', $data);
    }
    //********************** SHOW *********************************/

    public function show(String $id)
    {
        $suite = Suite::where('id', $id)->with('messages')->first();
        $data = [
            'suite' => $suite,

        ];
        // if ($suite) {
        //     return response()->json([
        //         'status' => true,
        //         'results' => $suite
        //     ]);
        // } else {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'suite not found...'
        //     ]);
        // }

        return view('admin.messages.show', $data);
    }

    //********************** STORE *********************************/

    public function store(Request $request, $slug)
    {
        $suite = Suite::where('slug', $slug)->first();
        $data = $request->all();
        $data['date'] = now();
        $data['suite_id'] = $suite->id;
        // $data['suite'] = $suite->title;

        $validator = FacadesValidator::make($data, [

            'text' => 'required',
            'email' => 'required',
            'name' =>  'nullable',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                // la funzione errors() della classe Validator resituisce un array
                // in cui la chiave è il campo soggetto a validazione
                // e il valore è un array di messaggi di errore
                'errors' => $validator->errors()
            ]);
        }

        // salviamo a db i dati inseriti nel form di messaggio
        $new_message = new Message();
        $new_message->fill($data);
        $new_message->save();

        Mail::to('info@boolpress.com')->send(new NewMail($new_message, $suite));

        return response()->json([
            'success' => true,
        ]);
    }
}
