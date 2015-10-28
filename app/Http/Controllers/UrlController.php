<?php

namespace App\Http\Controllers;
use App\Hit;
use App\Key;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class UrlController extends MainController
{

    public function index(Request $request)
    {
        $url = $request->input('input_data');
        $title = "Uct | Cut Your url";


        return view('Url.home', compact('title','url'));
    }

    //saving the data in database

    public function show(Request $request)
    {
        $url = $request->input('input_data');
        $key = $this->checkKeyRepetition();


        if ($request->ajax()) {

            $data = new key;
            $data->url = $url;
            $data->key = $key;
            $data->user_id='1';
            $data->ip = $request->getClientIp();
            $data->save();

            //checking the url repetition and if repeated then returning the old one

            if($this->checkUrlRepetition($url))
            {
                $repeated_key = DB::table('keys')->where('keys.url','=',$url)->value('key');

                $full_url = "http://ucut.herokuapp.com/" . $repeated_key;

            }
            else{
                $full_url = "http://ucut.herokuapp.com/" . $key;
            }

            return response()->json([
                'message' => 'created',
                'url' => $full_url
              ]);

        }


    }


    public function hash(Request $request,$key)
    {
        $link = DB::table('keys')->where('key', '=', $key)->get();

        if($link) {

            $data = new Hit;
            $data->url_ip = $request->getClientIp();
            $data->url_id = $link[0]->id;
            $data->save();
            $test =app('Illuminate\Routing\UrlGenerator')->previous();
            return $test;
            //return redirect($link[0]->url);
        }
        else{
            return redirect('/');
        }



    }
}
