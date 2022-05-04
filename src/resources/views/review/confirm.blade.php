@extends('layout')
@section('title', '入力確認画面')
@section('content')


<div class="container px-5 py-24 mx-auto flex justify-center">
    <div class="lg:w-3/5 md:w-1/2 bg-white rounded-lg p-8 w-full mt-10 md:mt-0 relative z-10 shadow-md">
        <div class="container">
        <h2>入力確認</h2>
        <p>こちらの内容で投稿しますか？</p>
        <form method="POST" action="{{ route('restaurant.reviews.store', $restaurant) }}" onSubmit="return checkSubmit()" enctype="multipart/form-data">
            @csrf
            <label class="block mt-3 text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="name">お名前</label>
            {{ $input['name'] }}
            <input id="name" name="name" class="bg-gray-50 shadow appearance-none border rounded
              w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:bg-white focus:border-blue-500 focus:outline-none focus:shadow-outline" value="{{ $input['name'] }}" type="hidden">
        
            <label class="block mt-3 text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="name">お問い合わせ内容</label>
              {{ $input['comment'] }}
            <input name="comment" value="{{ $input['comment'] }}" type="hidden">

            <input value="{{ $restaurant->id }}" type="hidden" name="restaurant_id" />

            <label class="block mt-3 text-gray-500 font-bold  mb-1 md:mb-0 pr-4" for="gender">性別</label>
            <p>{{\App\Enums\Gender::getDescription($input['gender'])}}</p>
            <input name="gender" value="{{ $input['gender'] }}" type="hidden">

            <label class="mt-3 block text-gray-500 font-bold  mb-1 md:mb-0 pr-4" for="age">年代</label>
            <p>{{\App\Enums\Age::getDescription($input['age'])}}</p>
            <input name="age" value="{{ $input['age'] }}" type="hidden">

            <label class="mt-3 block text-gray-500 font-bold  mb-1 md:mb-0 pr-4" for="email">メールアドレス</label>
            {{ $input['email'] }}
            <input id="email" name="email" class="form-control bg-gray-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:bg-white focus:border-blue-500 focus:outline-none focus:shadow-outline" value="{{ $input['email'] }}" type="hidden">

            <label class="mt-3 block text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="is_receivable">メール送信可否</label>
            {{ $input['is_receivable'] == 1 ? "許可する" : "許可しない" }}
            <input name="is_receivable" type="hidden" value="{{ $input['is_receivable'] }}">

            <label class="mt-3 block text-gray-500 font-bold  mb-1 md:mb-0 pr-4" for="star">評価</label>
            {{ $input['star'] }}
            <input id="star" name="star" class="form-control bg-gray-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:bg-white focus:border-blue-500 focus:outline-none focus:shadow-outline" value="{{ $input['star'] }}" type="hidden">
            
            @if(!is_null($formItems_image)) 
              <div class="thumb mb-5">
                <img src="{{ asset('storage/' . $formItems_image[2]) }}" alt="">
                <input type="hidden" id="image_id" name="image_id" value="{{ $formItems_image[2] }}">
              </div>
            @endif

            <div class="mt-5">
              <button class="block shadow text-blue-400 hover:bg-blue-400 focus:shadow-outline focus:outline-none hover:text-white font-bold py-2 px-4 rounded" type="submit" name="action" value="back">
                  入力内容修正
              </button>
              <button class="block shadow text-blue-400 hover:bg-blue-400 focus:shadow-outline focus:outline-none hover:text-white font-bold py-2 px-4 rounded" type="submit" name="action" value="submit">
                  投稿する
              </button>
            </div>
          </form>  
        </div>
    </div>
</div> 
@endsection