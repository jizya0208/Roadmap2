@extends('layout')
@section('title', 'お店一覧')
@section('content')

    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        管理者ダッシュボード
    </h2>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <h2>検索条件を入力してください</h2>
                <form action="{{ url('/search')}}" method="post">
                  @csrf
                  {{ method_field('get') }}

                  <div class="container">
                    <h3>Personal</h3>
                    <div class="form-check">
                    <label class="block text-gray-500 font-bold mb-5 md:mb-0 pr-4" for="age">年代</label>
                    <select name="age" class="form-control">
                        <option value="">▼ 以下から選択</option>
                        @foreach($age as $key => $value)
                            <option value="{{$key}}">{{ $value }}</option>
                        @endforeach
                    </select>
                    
                    <div>性別</div>
                    <div class="form-check">
                      <input type="radio" name="gender" class="form-check-input" id="male" value="男性" {{ old ('gender', "男性") == 1 ? 'checked' : '' }}>
                      <label class="text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="gender">男性</label>
                      <!-- oldヘルパー バリデーションのエラー時に、値を保持しておきたい項目のvalue属性に「name属性の値」と同じ引数を渡して設定。 -->
                    </div>
                    <div class="form-check">
                      <input type="radio" name="gender" class="form-check-input" id="female" value="女性" {{ old ('gender') == '女性' ? 'checked' : '' }}>
                      <label class="text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="gender">女性</label>
                    </div>
                    <div class="form-check">
                      <input type="radio" name="gender" class="form-check-input" id="another" value="その他" {{ old ('gender') == 'その他' ? 'checked' : '' }}>
                      <label class="text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="gender">その他</label>
                    </div>
                    <div class="form-check">
                      <input type="radio" name="gender" class="form-check-input" id="gender1" value="解答しない" {{ old ('gender') == '解答しない' ? 'checked' : '' }}>
                      <label class="text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="gender">解答しない</label>
                    </div>
                    <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="is_receivable">メール送信可否</label>
                    <input id="is_receivable" name="is_receivable" type="checkbox" checked="checked" value="1">
                  </div>


                  <div class="container">
                    <h3>Date</h3>
                    <div class="form-group">
                      <label>投稿日</label>
                      <input type="date" name="from" placeholder="from_date">
                          <span class="mx-3 text-grey">~</span>
                      <input type="date" name="to" placeholder="to_date">
                    </div>
                  </div>


                  <div class="container">
                    <h3>Keyword</h3>         
                      <div class="form-group">
                        <label>店名</label>
                        <input type="text" class="form-control col-md-8" placeholder="検索したい名前を入力してください" name="name">
                      </div>
                      <div class="form-group">
                        <label>レビューのキーワード</label>
                        <input type="text" name="keyword" value="{{ old('keyword') }}">
                      </div>
                  </div>




                  <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">検索</button>
                </form>
                @if(session('flash_message'))
                  <div class="alert alert-primary" role="alert" style="margin-top:50px;">{{ session('flash_message')}}</div>
                @endif
            </div>
        </div>

        @if($reviews->isNotEmpty())
            @foreach ($reviews as $review)
                <div class="border-bottom border-secondary pt-2">
                    <p class="text-muted mx-3 pt-1">{{ $review->name }}
                        が{{ $review->created_at->format('Y年n月j日') }}に投稿</p>
                    <p class="text-muted mx-3">{!! nl2br(e($review->comment)) !!}</p>
                    <a href="{{ route('restaurant.reviews.show', ['restaurant'=>$review->restaurant_id, 'review'=>$review->id]) }}" class="btn btn-primary">レビュー詳細</a>
                </div>
            @endforeach
        @else 
            <p>合致するレビューがありません</p>
        @endif
    </div>
@endsection

