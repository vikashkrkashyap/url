<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class KeysTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        $faker = Faker::create();
        for($i=1;$i<3844;$i++) {
            DB::table('keys')->insert([

                'url' => 'www.' . str_random(7) . '.com',
                'user_id' => '1',
                'key' => str_random(2),
                'ip' => $faker->localIpv4


            ]);
        }
    }
}
