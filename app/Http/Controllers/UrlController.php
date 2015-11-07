<?php

namespace App\Http\Controllers;
use App\Hit;
use App\Key;
use App\Redirected_websites;
use App\website_detail;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Validator;

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

//
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

                $full_url = "http://ucut.in/" . $repeated_key;

            }
            else{
                $full_url = "http://ucut.in/" . $key;
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

            if(Auth::user())
            {
                $name = $this->get_website_name($test);
                $website_hits = new Redirected_websites;
                $website_hits->user_id = Auth::user()->id;
                $website_hits->url_id = $link[0]->id;
                $website_hits->website_url = $test;
                $website_hits->website_name = $name;

                $website_hits->save();

                $website_details = new website_detail;



                $name_exists = DB::table('website_details')->lists('name');

                if(in_array($name,$name_exists))
                {

                    if($name == 't.co')
                    {
                        $name = 'twitter.com';
                    }
                    $website_details->name = $name;
                    $website_details->logo = 'suji hai';

                    $website_details->save();

                }

            }

            return redirect($link[0]->url);
        }
        else{
            return redirect('/');
        }



    }

    public function get_website_name($string)
    {

        if(str_contains($string,'https'))
        {

            preg_match('@^(?:https://)?([^/]+)@i', $string, $matches);
        }
        else
        {
            preg_match('@^(?:http://)?([^/]+)@i', $string, $matches);
        }
        $host = $matches[1];

        // get last two segments of host name
        preg_match('/[^.]+\.[^.]+$/', $host, $matches);

         return $matches[0];

    }


}
