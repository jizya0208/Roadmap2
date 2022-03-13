

@extends('layout')
@section('title', 'お店一覧')
@section('content')



<div class="row">
  <div class="col-md-8 col-md-offset-2">
      <h2>ブログ記事一覧</h2>
      <table class="table table-striped">
        @foreach($restaurants as $restaurant)
          {{ $restaurant->name }}
          {{ $restaurant->image_id }}
          {{ $restaurant->description }}
        @endforeach
          <tr>
              <th>歩いてきんさい屋</th>
              <th>評価</th>
              <th>レビューする</th>
              <th></th>
          </tr>
          <tr>
              <td>1</td>
              <td>2020/06/30</td>
              <td>テスト</td>
              <td></td>
          </tr>
      </table>
  </div>
</div>
@endsection




<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">お店</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="#">お店<span class="sr-only"></span></a>
      <a class="nav-item nav-link" href="#">ブログ投稿</a>
    </div>
  </div>
</nav>
    </header>
    <br>
    <div class="container">
      @yield('content')

</div>
</div>
    <footer class="footer bg-dark  fixed-bottom">

    </footer>
</body>
</html>






