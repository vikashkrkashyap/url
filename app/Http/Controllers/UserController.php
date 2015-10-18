<?php

namespace App\Http\Controllers;
use App\Hit;
use App\Key;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends MainController
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    //function for showing the dashboard page after login or register

    public function showDashboard()
    {


           $url_data = DB::table('keys')->where('user_id','=',Auth::user()->id)->get();
               $hits = DB::table('hits')->join('keys','hits.url_id','=','keys.id')->get();
               foreach($hits as $hit ){

                   
               }

//return $url;
           return view('User.dashboard',compact('url_data','hits'));

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

            $full_url = "http://ucut.herokuapp.com/" . $key;


            return response()->json([
                'message' => 'successful',
                'url' => $full_url

            ]);
        }
    }



  public function getHits(Request $request){
    //$hits = DB::table('hits')->where('url_id','=','keys.id')->get();
    if($request->ajax())
    {

       return response()->ajax([
           'message' =>'successful'
       ]) ;
    }
  }


}
