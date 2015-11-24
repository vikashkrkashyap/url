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
use hisorange\BrowserDetect\Facade\parser;


class UserController extends MainController
{



    public function __construct()
    {
        $this->middleware('auth');


    }
    //function for showing the dashboard page after login or register

    public function showDashboard(Request $request)
    {



           $url_data = DB::table('keys')->where('user_id','=',Auth::user()->id)->get();


             return view('User.dashboard',compact('url_data'));

    }

    public function postUrl(Request $request)
    {
        if ($request->ajax()) {

            $url = $request->input('user_url');

            if($this->checkUserUrlRepetition($url)) {

                $key = DB::table('keys')->where('keys.url', '=', $url)->value('key');
            }
            else {

                $key = $this->getUniqueRandomKey();

                $data = new Key;
                $data->url = $url;
                $data->user_id = $request->input('user_id');
                $data->ip = $request->getClientIp();
                $data->key = $key;
                $data->save();
            }

            $id = Key::where('key',$key)->select('id')->get();



            //checking the url repetition and if repeated then returning the old key


            $full_url = "http://ucut.in/" . $key;

            return response()->json([
                'message' => 'successful',
                'url' => $full_url

            ]);
        }
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
}
