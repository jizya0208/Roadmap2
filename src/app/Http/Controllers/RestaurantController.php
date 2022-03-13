<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    /**
     * レストラン一覧を表示する
     * 
     * @return view
     */
    public function showList()
    {
        $restaurants = Restaurant::all();
        return view('restaurant.list', ['restaurants' => $restaurants]);
    } 
}
