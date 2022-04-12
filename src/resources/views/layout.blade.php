<!DOCTYPE HTML>
<html lang="ja">
  <head>
      <meta charset="UTF-8">
      <!-- csrf対策のためのトークン -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>@yield('title')</title>
      <link rel="stylesheet" href="/css/app.css">
      <link rel ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
      <script src="/js/app.js" defer></script>
  </head>
  <body>
    <header>
      @include('header')
    </header>
    <div class="bg-slate-100">
      @yield('content')
    </div>
    <footer class="footer bg-amber-200 fixed-bottom">
      @include('footer')
    </footer>
  </body>
</html>