@extends('layout')
@section('title', 'レビュー')
@section('content')
<div class="container px-5 py-24 mx-auto flex justify-center">
    <div class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 w-full mt-10 md:mt-0 relative z-10 shadow-md">
        <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">レビュー一覧</h2>


        <!-- foreach ($reviews as $review) {
    
        } -->
        <p>{{ $restaurant->name }}へのご意見をお聞かせください</p>
        <form method="POST" action="{{ route('restaurant.reviews.store', $restaurant) }}" onSubmit="return checkSubmit()">
            @csrf
            <div class="form-group">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="name">
                  お名前
                </label>
                <input id="name" name="name" class="form-control bg-gray-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:bg-white focus:border-purple-500 focus:outline-none focus:shadow-outline" value="{{ old('name') }}" type="text">
                @if ($errors->has('name'))
                    <div class="text-danger">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="comment">
                   ご意見
                </label>
                <textarea id="comment" name="comment" class="form-control bg-gray-50 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" rows="4">{{ old('comment') }}</textarea>
                @if ($errors->has('comment'))
                    <div class="text-danger">
                        {{ $errors->first('comment') }}
                    </div>
                @endif
            </div>
            <input value="{{ $restaurant->id }}" type="hidden" name="restaurant_id" />
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="gender">性別</label>
            <select name="gender" class="form-control">
                <option value="">▼ 以下から選択</option>
                @foreach($gender as $key => $value)
                    <option value="{{$key}}">{{$value}}</option>
                @endforeach
            </select>
            @error('gender')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="age">年代</label>
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
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="email">メールアドレス</label>
                <input id="email" name="email" class="form-control bg-gray-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:bg-white focus:border-purple-500 focus:outline-none focus:shadow-outline" value="{{ old('email') }}" type="text">
                @if ($errors->has('email'))
                    <div class="text-danger">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <div class="mt-5">
                <button class="block shadow text-purple-400 hover:bg-purple-400 focus:shadow-outline focus:outline-none hover:text-white font-bold py-2 px-4 rounded" type="button">
                    投稿する
                </button>
            </div>
        </form>
    </div>
</div>
<script>
function checkSubmit(){
if(window.confirm('送信してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection