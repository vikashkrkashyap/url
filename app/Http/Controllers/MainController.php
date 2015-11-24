<?php

namespace App\Http\Controllers;

use App\Key;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{

//function for checking in database whether the random generated number is repeating or not

    public function getUniqueRandomKey()
    {
        $token = DB:: table('keys')->lists('key');

        do {
            $random = $this->RandomControl();

        } while (in_array($random, $token));

       return $random;
    }


//function responsible for checking repeated url in database

    public function checkUrlRepetition($input_url)
    {
        $data = DB::table('keys')->lists('url');
        return (in_array($input_url,$data));
    }

//function Responsible for checking the repeated url in the database by Current User

    public function checkUserUrlRepetition($url)
    {
        $data= DB::table('keys')->where('user_id','=',Auth::user()->id)->lists('url');

        return (in_array($url,$data));

    }

//function responsible for minimum digit random number generation

    public function RandomControl()
    {
        $random_digit_length = 15;

        $data = DB::table('keys')->lists('id');

        //Displaying the random key for
        if(count($data)== 0){
           $first_key = str_random(2);
            return $first_key;
        }

        //Displaying the random number

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

    //Check user_id is available or Not

    public function checkUserId($id)
    {
        $user_id = User::find($id);

        if($user_id)
            return true;
        else
            return false;
    }

    //Check url_id is available or not

    public function checkUrlId($id)
    {
        $url_id = Key::find($id);

        if($url_id)
            return true;
        else
            return false;

    }

    //function for find the title of the page

    public function get_title($url)
    {
        $str = file_get_contents($url);
        if(strlen($str)>0)
        {
            $str = trim(preg_replace('/\s+/', ' ', $str)); // supports line breaks inside <title>
            preg_match("/\<title\>(.*)\<\/title\>/i",$str,$title); // ignore case
            return $title[1];
        }
    }
}
