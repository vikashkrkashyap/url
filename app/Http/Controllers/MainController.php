<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{

//function for checking in database whether the random generated number is repeating or not

    public function checkKeyRepetition()
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
         if(in_array($input_url,$data)){

             return true;
         }
        else{
            return false;
        }
    }
//function responsible for minimum digit random number generation

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

}
