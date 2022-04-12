<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Enums\Gender;
use App\Enums\Age;

class ReviewController extends Controller
{
    /**
     * クチコミを投稿する
     * 
     * @return view
     */
    public function store(Request $request)
    {
        // バリデーションルールはvalidateメソッドへ渡される
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'comment' => 'required',
        ]);
        // バリデーション:エラー
        // if ($validated->fails()) {
        //     return redirect()
        //     ->route('restaurant.show')
        //     ->withInput()
        //     ->withErrors($validated);
        // }
        // 戻り値は挿入されたレコードの情報
        // $result = Review::create($request->all());

        $review = new Review();
        $review->name = $request['name'];
        $review->email = $request['email'];
        $review->comment = $request['comment'];
        $review->restaurant_id = $request['restaurant_id'];
        $review->gender = $request['gender'];
        $review->age = $request['age'];
        $review->star = $request['star'];

        $review->is_receivable = $request['is_receivable'];

        $review->save();
        return redirect(route('restaurant.index'))->with('success', '正常に投稿されました');
    } 

    public function show($id)
    {
        $review = Review::find($id);
        return view('review.show', compact('review'));
    } 
    
    public function destroy($id)
    {
        Review::find($id)->delete();
        return redirect(route('admin.dashboard'))->with('success','削除しました');
    } 
}
