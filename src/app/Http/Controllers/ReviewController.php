<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Review;
use App\Enums\Gender;
use App\Enums\Age;
use Session;
use Validator;
use Storage;

class ReviewController extends Controller
{
    private $formItems = ['name', 'email', 'comment', 'restaurant_id', 'gender', 'age', 'star', 'is_receivable'];
	private $validator = [
        'name' => 'required|max:255',
        'comment' => 'required',
	];

    public function post(Request $request, $id)
    {
        $restaurant = Restaurant::find($id);
        $input = $request->only($this->formItems);
        $validator = Validator::make($input, $this->validator);
        if($validator->fails()){
            return redirect()->action("App\Http\Controllers\RestaurantController@show", $restaurant)
                        ->withInput()
                        ->withErrors($validator);
        }
        //セッションに書き込む
        $request->session()->put("form_input", $input);
        if($request->hasFile('image_id')) {
            $file = $request->file('image_id');
            $path = Storage::disk('s3')->putFile('/', $file); // S3バケットへアップロードする
            $request->session()->put('review_image_url', $path); //review_image_urlという名前で$urlをsessionに保存
        }
        return redirect()->action("App\Http\Controllers\ReviewController@confirm", $restaurant);
    }

    public function confirm(Request $request, $id)
    {
        $restaurant = Restaurant::find($id);
        $input = $request->session()->get("form_input");
        $fullpath =  $request->session()->get("review_image_url");
        //セッションに値が無い時はフォームに戻る
		if(!$input){
			return redirect()->action("App\Http\Controllers\RestaurantController@show", $restaurant);
		} elseif(!$fullpath) {
            return view("review.confirm", compact('input', 'restaurant'));
        }
		return view("review.confirm", compact('input', 'fullpath', 'restaurant'));
    }

    public function complete(){	
		return view('review.thanks');
	}


     /**
     * レビューを投稿する
     * 
     * @return view
     */
    public function store(Request $request)
    {
        $action = $request->get('action', 'back');
        $input = $request->except('action');
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
        if($action == 'back'){
             return redirect()->action("App\Http\Controllers\RestaurantController@show", $request['restaurant_id'])
        ->withInput($input);
        } else {
            $review = new Review();
            $review->name = $request['name'];
            $review->email = $request['email'];
            $review->comment = $request['comment'];
            $review->restaurant_id = $request['restaurant_id'];
            $review->gender = $request['gender'];
            $review->age = $request['age'];
            $review->star = $request['star'];
            $review->is_receivable = $request['is_receivable'];
            if($request['image_id'] != 'no-image.png') {
                $path = $request->session()->get('review_image_url');
                $review->image_id = Storage::disk('s3')->url($path);
            }
            $review->save();
            return redirect(route('form.complete'))->with('success', '正常に投稿されました');
        }
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
