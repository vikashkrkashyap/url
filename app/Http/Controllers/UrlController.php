<?php

namespace App\Http\Controllers;

use App\Key;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UrlController extends Controller
{
    public function index()
    {
        $title = "Uct|Cut Your url";
        return view('Url.home', compact('title'));
    }

    public function show(Request $request)
    {
        //generating the unique field

        $token = DB:: table('keys')->lists('key');

        do {
            $random = $this->RandomControl();

        } while (in_array($random, $token));


        $data = new Key;
        $url = $request->input('input_data');
        $data->url = $url;
        $data->key = $random;
        $data->save();

        return redirect('short');

    }

    public function RandomControl()
    {
        $random_digit_length = 11;

        $data = DB::table('keys')->lists('id');
        $unique_id = last($data);
        $max = 0;
        $min = 0;
        for ($i = 2; $i < $random_digit_length; $i++) {

            $min = $max;
            $max = pow(62, $i);

            if ($unique_id > $min AND $unique_id <= $max) {
                $random_number = str_random($i);
                return $random_number;
            }

        }
        return "something went wrong";

    }

    public function showLink()
    {
        $data = DB::table('keys')->lists('key');
        $recent_url = last($data);

        $title = 'Ucut.com';
        $url = "http://www.ucut.in/" . $recent_url;

        return view('Url.shortner', compact('title', 'url'));
    }

    public function hash($hash)
    {
        $link = DB::table('keys')->where('key', '=', '$hash')->get();

        if ($link) {
            return Redirect::to($link->url);
        } else {
            return Redirect::to('/')
                ->with('message', 'Invalid Link');
        }
    }
}

}
