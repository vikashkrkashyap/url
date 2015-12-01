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

    public function showDashboard()
    {

        $url_data = DB::table('keys')->where('user_id','=',Auth::user()->id)->orderBy('id','desc')->get();
        $recent_url = DB::table('keys')->where('user_id','=',Auth::user()->id)->orderBy('id','desc')->first();
        if($recent_url){
            $hits_today_by_time = Hit::where('url_id',$recent_url->id)->select(DB::raw('hour(created_at) as time'), DB::raw('IFNULL(count(id),0) as hits'))
                ->groupBy(DB::raw('hour(created_at)'))->distinct()->orderBy('id','asc')->get();

            $hits_per_week_by_day = Hit::where('url_id',$recent_url->id)->select(DB::raw('dayname(created_at) as dayofweek'), DB::raw('count(id) as hits'))
                ->groupBy(DB::raw('dayname(created_at)'))->distinct()->orderBy(DB::raw('dayname(created_at)'),'asc')
                ->whereBetween(DB::raw('date(created_at)'),[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->get();

            $hits_per_month = Hit::where('url_id',$recent_url->id)->select(DB::raw('day(created_at) as dayofmonth'), DB::raw('count(id) as hits'))
                ->groupBy(DB::raw('day(created_at)'))->distinct()->orderBy(DB::raw('day(created_at)'),'asc')
                ->whereBetween(DB::raw('date(created_at)'),[Carbon::now()->startOfmonth(),Carbon::now()->endOfMonth()])->get();


            $hits_per_year = Hit::where('url_id',$recent_url->id)->select(DB::raw('monthname(created_at) as monthname'), DB::raw('count(id) as hits'))
                ->groupBy(DB::raw('monthname(created_at)'))->distinct()->orderBy(DB::raw('monthname(created_at)'),'asc')
                ->whereBetween(DB::raw('date(created_at)'),[Carbon::now()->startOfYear(),Carbon::now()->endOfYear()])->get();


//        return $hits_today_by_time;
            return view('User.dashboard',compact('url_data','recent_url','hits_today_by_time','hits_per_week_by_day','hits_per_month','hits_per_year'));

        }else{
            //$url_data = DB::table('keys')->where('user_id','=',Auth::user()->id)->orderBy('id','desc')->get();
            return ('No Link Sorted');
        }

    }
    public function showStats(Request $request)
    {

        $recent_url = DB::table('keys')->where(['user_id'=>Auth::user()->id,'id'=>$request->id])->orderBy('id','desc')->first();

        $hits_today_by_time = Hit::where('url_id',$recent_url->id)->select(DB::raw('hour(created_at) as time'), DB::raw('count(id) as hits'))
            ->groupBy(DB::raw('hour(created_at)'))->distinct()->orderBy('id','asc')->get();

        $hits_per_week_by_day = Hit::where('url_id',$recent_url->id)->select(DB::raw('dayname(created_at) as dayofweek'), DB::raw('count(id) as hits'))
            ->groupBy(DB::raw('dayname(created_at)'))->distinct()->orderBy(DB::raw('dayname(created_at)'),'asc')
            ->whereBetween(DB::raw('date(created_at)'),[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->get();

        $hits_per_month = Hit::where('url_id',$recent_url->id)->select(DB::raw('day(created_at) as dayofmonth'), DB::raw('count(id) as hits'))
            ->groupBy(DB::raw('day(created_at)'))->distinct()->orderBy(DB::raw('day(created_at)'),'asc')
            ->whereBetween(DB::raw('date(created_at)'),[Carbon::now()->startOfmonth(),Carbon::now()->endOfMonth()])->get();

        $hits_per_year = Hit::where('url_id',$recent_url->id)->select(DB::raw('monthname(created_at) as monthname'), DB::raw('count(id) as hits'))
            ->groupBy(DB::raw('monthname(created_at)'))->distinct()->orderBy(DB::raw('monthname(created_at)'),'asc')
            ->whereBetween(DB::raw('date(created_at)'),[Carbon::now()->startOfYear(),Carbon::now()->endOfYear()])->get();
//return $hits_per_week_by_day;
        return view('User.show_stats',compact('url_data','recent_url','hits_today_by_time','hits_per_week_by_day','hits_per_month','hits_per_year'));

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
                    'key'=>$key,
                    'created_at'=>Carbon::now()
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
               $browser_data = Redirected_websites::where('url_id',$url->id)->select(DB::raw('(select(browser_name) from browsers where id =browser_id) as browser'),
                   DB::raw('count(browser_id) as hits'))
                   ->groupBy('browser')->distinct()->get();

       //Operating System vs hits graph
               $os_data = Redirected_websites::where('url_id',$url->id)->select(DB::raw('(select(operating_system) from operating_systems where id = os_id) as os'),
                   DB::raw('count(os_id) as hits'))
                   ->groupBy('os')->distinct()->get();

       //platform Data
               $query1 = Redirected_websites::where('url_id',$url->id)->select(DB::raw('"Desktop"  as device'),DB::raw('count(is_desktop) as hit'))->where('is_desktop',1)
                   ->groupBy('is_desktop')->get();

               $query2 = Redirected_websites::where('url_id',$url->id)->select(DB::raw('"Mobile"  as device'),DB::raw('count(is_mobile) as hits'))->where('is_mobile',0)
                   ->groupBy('is_mobile')->get();
               $query3 = Redirected_websites::where('url_id',$url->id)->select(DB::raw('"Tablet"  as device'),DB::raw('count(is_tablet) as hits'))->where('is_tablet',0)
                   ->groupBy('is_tablet')->get();

       $platform = array();
       array_push($platform,['Desktop' =>$query1, 'Mobile' =>$query2,'Tablet' =>$query3]);
      return $platform;

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
