@extends('layout')
@section('title', '編集')
@section('content')

<div class="container px-5 py-24 mx-auto flex justify-center">
    <div class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 w-full mt-10 md:mt-0 relative z-10 shadow-md">
        <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">レストラン編集</h2>
        <form method="post" action="{{ route('restaurant.update', $restaurant) }}" onSubmit="return checkSubmit()" enctype="multipart/form-data">
            @method('PATCH')    
            @csrf
            <div class="form-group">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="name">
                    お店の名前
                </label>
                <input id="name" name="name" class="form-control bg-gray-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:bg-white focus:border-purple-500 focus:outline-none focus:shadow-outline" value="{{ $restaurant->name }}" type="text">
                @if ($errors->has('name'))
                    <div class="text-danger">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="description">
                    お店の特徴
                </label>
                <textarea
                    id="description"
                    name="description"
                    class="form-control bg-gray-50 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    rows="4"
                >{{ $restaurant->description }}</textarea>
                @if ($errors->has('description'))
                    <div class="text-danger">
                        {{ $errors->first('description') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="email">メールアドレス</label>
                <input id="email" name="email" class="form-control bg-gray-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:bg-white focus:border-purple-500 focus:outline-none focus:shadow-outline" value="{{ $restaurant->email }}" type="text">
                @if ($errors->has('email'))
                    <div class="text-danger">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>
            
            <div class="form-group">
                <label for="image_id">画像登録</label>
                <input type="file" name="image_id" id="image_id" class="form-control btn btn-primary">
            </div>
            <div class="mt-5">
                <a class="block shadow text-purple-400 hover:bg-purple-400 focus:shadow-outline focus:outline-none hover:text-white font-bold py-2 px-4 rounded" href="{{ route('restaurants') }}">
                    キャンセル
                </a>
                <button class="block shadow text-purple-400 hover:bg-purple-400 focus:shadow-outline focus:outline-none hover:text-white font-bold py-2 px-4 rounded" type="submit">
                    更新する
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