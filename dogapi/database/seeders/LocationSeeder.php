<?php

namespace Database\Seeders;

use App\Models\UserLocation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_locations')->insert([
            ['city'=>'Manchester'],
            ['city'=>'London'],
            ['city'=>'Poole'],
            ['city'=>'Liverpool'],
            ['city'=>'Birmingham'],
        ]);

    }
}
