<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class RestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \Illuminate\Support\Facades\DB::table('restaurants')->truncate(); // data clear
        // \Illuminate\Support\Facades\DB::table('reviews')->truncate(); // data clear
        \App\Models\Restaurant::factory()->count(15)->create(); // data insert
    }
}
