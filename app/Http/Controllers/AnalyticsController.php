<?php

namespace App\Http\Controllers;

use App\Browser;
use App\Redirected_websites;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends MainController
{
    public function index(){

        $data =(object) [
            'title' => 'Analytics | '.Auth::user()->first_name.' '.Auth::user()->last_name
        ];
        $browser_data = [];
        $browsers = Browser::all();
        foreach($browsers as $browser){
            $l = Redirected_websites::where('user_id',Auth::user()->id)->where('browser_id',$browser->id)->get();
            array_push($browser_data,[(string)$browser->browser_name, $l->count()]);
        }
        $encoded = json_encode($browser_data);
        return view('User.analytics',compact('data','encoded'));
    }
}
