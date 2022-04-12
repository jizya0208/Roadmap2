<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

use App\Models\Review;
use App\Enums\Gender;
use App\Enums\Age;


class RestaurantController extends Controller
{
    /**
     * レストラン一覧を表示する
     * 
     * @return view
     */
    public function index()
    {
        $restaurants = Restaurant::paginate(8);;
        return view('restaurant.index', ['restaurants' => $restaurants]);
    } 

    // フォームで入力されたお店情報をセッションに登録
    public function create()
    {
        return view('restaurant.create');
    } 

    // フォームで入力されたお店情報をDBへ登録
    public function store(Request $request)
    {
        $data = $request->all();
        $image = $request->file('image_id');
        // 画像がアップロードされていればstorageに保存
        if($request->hasFile('image_id')) {
            $path = \Storage::put('/public', $image); //アップロードしたパスが帰ってくる
            $path = explode('/', $path);              //パスからファイル名だけを抽出
        } else {
            $path = null;
        }
        //     $fileName = time() . $file->getClientOriginalName();  // getClientOriginalName() ---> 拡張子を含め、アップロードしたファイルのファイル名を取得
        //     $target_path = public_path('storage/');               // publicディレクトリの完全パスを返す
        //     $file->move($target_path, $fileName);
        // } else {
        //     $fileName = "";
        // }

         // バリデーション
        $validatedData = $request->validate([
            'name' => 'required | max:191',
            'image_id'=>['file','mimes:jpeg,png,jpg,bmb','max:2048'], // file：フィールドがアップロードに成功したファイルであること。フィールドで指定されたファイルが拡張子のリストの中のMIMEタイプのどれかと一致すること
        ]);
        // バリデーション:エラー
        // if ($validator->fails()) {
        //     return redirect()
        //     ->route('restaurant.create')
        //     ->withInput()
        //     ->withErrors($validator);
        // }

        // create()は最初から用意されている関数
        // 戻り値は挿入されたレコードの情報
        $result = Restaurant::create($request->all());
        // ルーティング「todo.index」にリクエスト送信（一覧ページに移動）
        return redirect()->route('restaurant.index');
    } 

    public function show($id)
    {
        $restaurant = Restaurant::find($id);
        // $reviews = Review::find($restaurant->id);
        // $reviews = Review::find($restaurant.id);
        //  selectタグに最適なkeyvalueペアのリストを返すメソッドが用意されている
        $gender = Gender::toSelectArray();
        $age = Age::toSelectArray();
        return view('restaurant.show', compact('restaurant', 'gender', 'age'));
    } 

    public function edit(Restaurant $restaurant)
    {
       return view('restaurant.edit', compact('restaurant'));
    }

    public function update(Request $request, Restaurant $restaurant) //editメソッドが呼び出された時のURIがposts/1/editであれば、idが1であるPostモデルのインスタンスが代入され、$restaurant = Restaurant::find(1)が省略できる。
    {
        $data = $request->all();
        $image = $request->file('image_id');
        // 画像がアップロードされていればstorageに保存
        if($request->hasFile('image_id')) {
            $path = \Storage::put('/public', $image); //アップロードしたパスが帰ってくる
            $path = explode('/', $path);              //パスからファイル名だけを抽出
        } else {
            $path = null;
        }
        $restaurant->fill(['image_id' => $path[1]])->save();
        return redirect(route('restaurant.index'));
    }

    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect(route('restaurant.index'))->with('success','削除しました');
    } 
}
