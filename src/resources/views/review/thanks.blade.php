@extends('layout')
@section('title', '入力確認画面')
@section('content')

<div class="container px-5 py-24 mx-auto flex justify-center">
  <div class="lg:w-3/5 md:w-1/2 bg-white rounded-lg p-8 w-full mt-10 md:mt-0 relative z-10 shadow-md">
    <div class="container">
    <h2>入力確認</h2>
    <p>レビューの投稿が完了しました。<br>
       ご意見いただきありがとうございました。
    </p>
    <button class="block shadow text-blue-400 hover:bg-blue-400 focus:shadow-outline focus:outline-none hover:text-white font-bold py-2 px-4 rounded" type="submit" name="action" value="back">
        <a href="/">お店一覧へ戻る</a>
    </button>
    </div>  
  </div>
</div>

@endsection