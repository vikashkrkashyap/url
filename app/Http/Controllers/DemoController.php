<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DemoController extends MainController
{
    public function test(){
        return 'hello';
    }
}
