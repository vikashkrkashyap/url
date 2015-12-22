<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AnalyticsController extends MainController
{
    public function index(){

        $data =(object) [
            'title' => 'Analytics | '.Auth::user()->first_name.' '.Auth::user()->last_name
        ];
        return view('User.analytics',compact('data'));
    }
}
