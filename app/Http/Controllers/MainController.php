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
    const MAX_KEY_LENGTH = 20;

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

//function Responsible for checking the guest url

    public function checkGuestUrlRepetition($url)
    {
        $data= DB::table('keys')->where('user_id','=',1)->lists('url');

        return (in_array($url,$data));
    }

//function Responsible for checking the repeated url in the database by Current User

    public function checkUserUrlRepetition($url)
    {
        $data= DB::table('keys')->where('user_id','=',Auth::user()->id)->lists('url');

        return (in_array($url,$data));

    }


//function responsible for the custom url

    public function setCustomUrl($key)
    {
        $old_key = Key::orderBy('id','desc')->take(1)->value('key');

        $key_length = strlen($key);

        if($key_length >= 2 && $key_length <= self::MAX_KEY_LENGTH)
        {

            Key::where('key',$old_key)->update(['key' => $key,'is_custom' => true]);

            return true;
        }
        else
        {
            return false;
        }

    }

 //function counting the number of key updated all size

    public function countUpdatedKeyByNumberOfCharacter()
    {
        $old_key = Key::select(DB::raw('CHAR_LENGTH(`key`) as length'))->where('is_custom',1)->get();


        if(count($old_key))
        {
            $key_count = array();

            foreach ($old_key as $key) {
                $key_count[] = $key->length;
            }
            $lol = array_count_values($key_count);


            for($i=2;$i <= self::MAX_KEY_LENGTH;$i++ )
            {
                if(@$lol[$i] === null){
                    array_push($lol, 0);
                }
            }

            return $lol;

        }
        else {
            $lol = [];
            for ($i = 2; $i <= self::MAX_KEY_LENGTH; $i++) {
                $lol[$i] = 0;
            }
            return $lol;
        }
    }


//function responsible for minimum digit random number generation

    public function RandomControl()
    {

        $unique_id = DB::table('keys')->orderBy('id','desc')->take(1)->value('id');

        //Displaying the random key for

        $min = 0;
        for ($i = 2; $i <= self::MAX_KEY_LENGTH; $i++) {
            $key_skipped = $this->countUpdatedKeyByNumberOfCharacter();

            $max = pow(62, $i)+ $key_skipped[$i];


            if ($unique_id > $min AND $unique_id <= $max) {
                $random_number = str_random($i);

                return $random_number;
            }

                $min = $max;
                //return str_random(3);



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
