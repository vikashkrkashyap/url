<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class KeysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('keys')->insert([
            'url' => 'http://ucut.in',
            'user_id'=>2,
            'key'=>'ucut',
            'ip'=> '127.0.0.1',
            'title' => 'Cut your url',
            'is_custom' => 0,
        ]);
    }
}
