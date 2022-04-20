@extends('layout')
@section('title', 'レビュー')
@section('content')


<div class="container px-5 py-24 mx-auto flex justify-center">
    <div class="lg:w-3/5 md:w-1/2 bg-white rounded-lg p-8 w-full mt-10 md:mt-0 relative z-10 shadow-md">
        <div class="container">
            <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">レビュー</h2>
            @if($restaurant->reviews->isNotEmpty())
                @foreach ($restaurant->reviews as $review)
                    <div class="border-bottom border-secondary pt-2">
                        <i class="fas fa-user"></i>
                        <p class="text-muted mx-3 pt-1">{{ $review->name }}
                            さんが{{ $review->created_at->format('Y年n月j日') }}に投稿</p>
                        <p class="text-muted mx-3">{!! nl2br(e($review->comment)) !!}</p>
                        @if(!is_null($review->image_id)) 
                            <img src="{{ asset('storage/' . $review->image_id) }}" alt="">
                        @endif
                    </div>
                @endforeach
            @else
                <p class="text-center pt-2">コメントはまだ投稿されていません。</p>
            @endif
        </div>
        
        <div class="container mt-5">
            <h2>{{ $restaurant->name }}へのご意見をお聞かせください</h2>
            <form method="POST" action="{{ route('form.send', $restaurant) }}" onSubmit="return checkSubmit()" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="block text-gray-500 font-bold  mb-1 md:mb-0 pr-4" for="name">
                    お名前
                    </label>
                    <input id="name" name="name" class="bg-gray-50 shadow appearance-none border rounded
                    w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:bg-white focus:border-blue-500 focus:outline-none focus:shadow-outline" value="{{ old('name') }}" type="text">
                    @if ($errors->has('name'))
                        <div class="text-danger">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="block mt-3 text-gray-500 font-bold  mb-1 md:mb-0 pr-4" for="comment">
                    ご意見
                    </label>
                    <textarea id="comment" name="comment" class="form-control bg-gray-50 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" rows="4">{{ old('comment') }}</textarea>
                    @if ($errors->has('comment'))
                        <div class="text-danger">
                            {{ $errors->first('comment') }}
                        </div>
                    @endif
                </div>
                <input value="{{ $restaurant->id }}" type="hidden" name="restaurant_id" />
                <label class="block mt-3 text-gray-500 font-bold  mb-1 md:mb-0 pr-4" for="gender">性別</label>
                <select name="gender" class="form-control">
                    <option value="">▼ 以下から選択</option>
                    @foreach($gender as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                @error('gender')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label class="mt-3 block text-gray-500 font-bold  mb-1 md:mb-0 pr-4" for="age">年代</label>
                <select name="age" class="form-control">
                    <option value="">▼ 以下から選択</option>
                    @foreach($age as $key => $value)
                        <option value="{{$key}}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('age')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label class="mt-3 block text-gray-500 font-bold  mb-1 md:mb-0 pr-4" for="email">メールアドレス</label>
                    <input id="email" name="email" class="form-control bg-gray-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:bg-white focus:border-blue-500 focus:outline-none focus:shadow-outline" value="{{ old('email') }}" type="text">
                    @if ($errors->has('email'))
                        <div class="text-danger">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <label class="mt-3 text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="is_receivable">メール送信可否</label>
                <input name="is_receivable" type="hidden" value="0">
                <input id="is_receivable" name="is_receivable" type="checkbox" checked="checked" value="1">

                <label class="mt-3 block text-gray-500 font-bold  mb-1 md:mb-0 pr-4" for="star">評価</label>
                <select name="star" class="form-control" type="text">
                    @foreach(config('score') as $key => $score)
                        <option value="{{ $key }}">{{ $score }}</option>
                    @endforeach
                </select>

                <div class="form-group">
                    <label class="mt-3 text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="image_id">画像の添付</label>
                    <input type="file" name="image_id" id="image_id" class="form-control btn">
                </div>

                <div class="mt-5">
                    <button class="block shadow text-blue-400 hover:bg-blue-400 focus:shadow-outline focus:outline-none hover:text-white font-bold py-2 px-4 rounded" type="submit">
                        確認画面へ進む
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>

@endsection