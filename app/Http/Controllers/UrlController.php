<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UrlController extends Controller
{
    public function index()
    {
        $title = "Uct|Cut Your url";
        return view('Url.home',compact('title'));
    }
}
