@extends('layout')
@section('title', 'レビュー詳細')
@section('content')

<h2>詳細</h2>
{{
  $review->comment;
}}

<!-- 削除ボタン -->
<form action="{{ route('restaurant.reviews.destroy', ['restaurant'=>$review->restaurant_id, 'review'=>$review->id]) }}" method="POST">
  @method('delete')
  @csrf
  <button type="submit" class="mr-2 ml-2 text-sm bg-black hover:bg-gray-900 hover:shadow-none text-white py-1 px-2 focus:outline-none focus:shadow-outline">
    <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="white">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
    </svg>
  </button>
</form>

