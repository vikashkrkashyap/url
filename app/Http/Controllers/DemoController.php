<?php

namespace App\Http\Controllers;

use Faker\Factory as Faker;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DemoController extends MainController
{
    public function test(){
        $faker = Faker::create();
        for($i=1;$i<1004;$i++) {
            DB::table('keys')->insert([
                'url' => 'www.' . str_random(30) . '.com',
                'user_id' => '1',
                'key' => $this->getUniqueRandomKey(),
                'ip' => $faker->localIpv4

            ]);
        }
    }
}
