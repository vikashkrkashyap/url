<?php

namespace App\Http\Controllers;
use App\Hit;
use App\Key;
use App\Redirected_websites;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\URL;


class UserController extends MainController
{

    const ALREADY_EXIST = 0;
    const NEW_VALUE = 1;

    public function __construct()
    {
        $this->middleware('auth');


    }
    //function for showing the dashboard page after login or register

    public function showDashboard(Request $request)
    {



           $url_data = DB::table('keys')->where('user_id','=',Auth::user()->id)->orderBy('id','desc')->get();


             return view('User.dashboard',compact('url_data'));

    }

    public function postUrl(Request $request)
    {
        if ($request->ajax()) {

            $url = $request->input('user_url');


            if($this->checkUserUrlRepetition($url)) {
                $key = DB::table('keys')->where('keys.url', '=', $url)->value('key');
                return response()->json([
                    'flag'=>self::ALREADY_EXIST,
                ]);
            }
            else {


                $key = $this->getUniqueRandomKey();
                $data = new Key;
                $_id = $data->insertGetId([
                    'url'=>$url,
                    'user_id'=>$request->input('user_id'),
                    'ip'=>$request->getClientIp(),
                    'title'=>'No Title',
                    'key'=>$key
                ]);
            }
                $full_url = URL::to('/').'/'. $key;
            }

            return response()->json([
                '_id'=>$_id,
                'sorted_url' => $full_url,
                'title'=>'Retriving...',
                'original_url'=>$url,
                'flag'=>self::NEW_VALUE
            ]);
    }



  public function getHits(Request $request,$id){
       //$hits = DB::table('hits')->where('url_id','=','keys.id')->get();

      $url = Key::findOrFail($id);

       //Hits Vs Time Graph Data
             $hits = Hit::where('url_id',$url->id)->select(DB::raw('date(created_at) as date'), DB::raw('count(id) as hits'))
              ->groupBy(DB::raw('date(created_at)'))->distinct()->get();


       //total number of hits
               $total_hit =count($hits);


       //Referral websites Data
               $referral_data = Redirected_websites::where('url_id',$url->id)->select(DB::raw('website_name as website'), DB::raw('count(website_name) as hits'))
               ->groupBy('website_name')->distinct()->get();

       //country vs hits graph
               $country_data = Redirected_websites::where('url_id',$url->id)->select(DB::raw('(select(country_name) from countries where id =country_id) as country'),
                   DB::raw('count(country_id) as hits'))
                   ->groupBy('country')->distinct()->get();
       //city vs hits graph
               $city_data = Redirected_websites::where('url_id',$url->id)->select(DB::raw('(select(city_name) from cities where id =city_id) as city'),
                   DB::raw('count(city_id) as hits'))
                   ->groupBy('city')->distinct()->get();

       //Browser vs hits graph
      return parser::detect();


     // return view('User.hits',compact('url','hits_data','url_stats','items'));

}

    public function getAnalytics()
    {
        return view('User.hits');
    }
    public function updateUrlTitle(Request $request){
        $keys = Key::find($request->id);
        $keys->title = $this->get_title($request->link);
        $keys->update();
        return $keys->title;
    }
}
