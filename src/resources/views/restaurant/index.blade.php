

@extends('layout')
@section('title', 'お店一覧')
@section('content')

<div class="container px-5 py-24 mx-auto flex justify-center">
  <div class="lg:w-2/5 md:w-1/2 bg-white rounded-lg p-8 w-full mt-10 md:mt-0 relative z-10 shadow-md">
  <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">レストラン一覧</h2>
  <ul class="flex flex-col">
    @foreach($restaurants as $restaurant)
      <li>
        <h2>{{ $restaurant->name }}</h2>
        <div class="thumb">
          <img src="{{ asset('storage/' . $restaurant->image_id) }}" alt="" width="200" height="300">
        </div>
        <p>{{ $restaurant->description }}<p>
        <div class="">レビュー数：</div>
        <div><a href="{{ route('restaurant.show', ['restaurant'=>$restaurant->id]) }}" class="btn btn-primary">レビューを見る</a></div>
        <div><a href="{{ route('restaurant.edit', ['restaurant'=>$restaurant->id]) }}" class="btn btn-primary">編集</a></div>
        @if($restaurant->reviews->isNotEmpty())
            {{ round($restaurant->reviews->avg('star'), 1, PHP_ROUND_HALF_UP) }}
        @else
            <p class="text-center pt-2">評価がまだ投稿されていません。</p>
        @endif

        <!-- 削除ボタン -->
        <form action="{{ route('restaurant.destroy',$restaurant->id) }}" method="POST">
          @method('delete')
          @csrf
          <button type="submit" class="mr-2 ml-2 text-sm bg-black hover:bg-gray-900 hover:shadow-none text-white py-1 px-2 focus:outline-none focus:shadow-outline">
            <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="white">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
          </button>
        </form>
      </li>
    @endforeach
  </ul>
</div>
@endsection







