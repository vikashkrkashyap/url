<?php

namespace App\Http\Controllers;

use App\Key;
use Faker\Factory as Faker;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DemoController extends MainController
{
    public function test(Request $request){
        $start = microtime(true);
        $faker = Faker::create();
        for($i=1;$i<1004;$i++) {
            $id = DB::table('keys')->InsertGetId([
                'url' => $faker->url,
                'user_id' => 1,
                'key' =>'',
                'ip' => $request->getClientIp()
            ]);
            $keys = Key::find($id);
            $keys->key = exec('/usr/bin/python '.public_path('converter.py').' -d '.$id);
            $keys->update();
        }
        $time_elapsed_secs = microtime(true) - $start;
        return $time_elapsed_secs;
    }
}
