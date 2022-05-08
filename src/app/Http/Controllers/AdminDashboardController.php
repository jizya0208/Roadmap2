<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Enums\Age;
use App\Enums\Gender;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $age = Age::toSelectArray();
        $gender = Gender::toSelectArray();
        $reviews = Review::paginate(10);
        //日付が選択されたら
        if (!empty($request['from']) && !empty($request['until'])) {
            //ハッシュタグの選択された20xx/xx/xx ~ 20xx/xx/xxのレポート情報を取得
            // $date = Date::getDate($request['from'], $request['until']);
        } else {
            //リクエストデータがなければそのままで表示
            // $date = Date::get();
        }
        return view('admin.dashboard', compact('gender','age', 'reviews'));
    }

    public function search(Request $request) {
        $keyword = $request->keyword;
        $keyword_name = $request->name;
        $keyword_age = $request->age;
        $keyword_gender = $request->gender;
        $keyword_is_receivable = $request->is_receivable;
        $from = $request->from;
        $to = $request->to;
        $age = Age::toSelectArray();
        $gender = Gender::toSelectArray();
        $query = Review::query();
        if(!empty($keyword)) {
            $query->where('comment', 'LIKE', "%{$keyword}%");
        }
        if(!empty($keyword_name)) {
            $query->where('name', 'LIKE', "%{$keyword_name}%");
        }
        if(!empty($keyword_age)) {
            $query->where('age', $keyword_age);
        }
        if(!empty($keyword_gender)) {
            $query->where('gender', $keyword_gender);
        }
        if($keyword_is_receivable == "1") {
            $query->where('is_receivable', "1");
        } else {
            $query->where('is_receivable', "0");
        }
        if (!empty($from) && !empty($to)) {
            $query->whereBetween('created_at', [$from, $to]);
        } 
        $reviews = $query->paginate(10);;
        return view('admin.dashboard', compact('reviews', 'age', 'gender'));
    }
}
