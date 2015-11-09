<?php

namespace App\Http\Controllers;
use App\Hit;
use App\Key;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use Torann\GeoIP\GeoIPFacade;


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

            $key = $this->checkKeyRepetition();
            $url = $request->input('user_url');

            $data = new Key;
            $data->url = $url;
            $data->user_id = $request->input('user_id');
            $data->ip = $request->getClientIp();
            $data->key = $key;
            $data->save();


            //checking the url repetition and if repeated then returning the old key


            if($this->checkUrlRepetition($url))
            {
                $repeated_key = DB::table('keys')->where('keys.url','=',$url)->value('key');

                $full_url = "http://ucut.in/" . $repeated_key;

            }
            else{
                $full_url = "http://ucut.in/" . $key;
            }
            return response()->json([
                'message' => 'successful',
                'url' => $full_url

            ]);
        }
    }



  public function getHits(Request $request,$id){
    //$hits = DB::table('hits')->where('url_id','=','keys.id')->get();

      $url = Key::findOrFail($id);

      $hits = Hit::where('url_id',$url->id)->count();
      $hits_ip = $hits = DB::table('hits')->where('hits.url_id','=',$url->id)->select('url_ip')->get();

      $total_hit =count($hits);
      //return $location;


         $url_stats = DB::table('Redirected_websites')
          ->where('Redirected_websites.url_id','=',$url->id)
          ->where('Redirected_websites.user_id','=',Auth::user()->id)->groupBy('website_name')->distinct()->get();

      $items = array();
//      $locations =array();
//
////location
//      foreach($hits as $hit)
//      {
//          $location[] = GeoIPFacade::getLocation($hit);
//      }





      foreach($url_stats as $url_count)
      {
        $lol = DB::table('Redirected_websites')->where('Redirected_websites.url_id','=',$url->id)
                         ->where('Redirected_websites.website_name','=',$url_count->website_name)->count();
          $item = $url_count->website_name.'  '.$lol;
          $items[] = $item;

      }


      return view('User.hits',compact('url','total_hit','url_stats','items'));

}
}
