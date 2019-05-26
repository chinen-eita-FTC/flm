<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  @yield('css')
</head>

<!-- コンテンツ開始 -->
<body>
  <!-- ヘッダー開始 -->
  <header>
    <div class="headerWrap">
      <div class="headerUpper">
        <div class="headerUpper__left">
          <h1>FLM</h1>
        </div>
        <div class="headerUpper__right">
          @if(Auth::check())
          <p class="headerUpper__right_loginMessage">
            <span class="font_bold">こんにちは、{{Auth::user()->first_name}} </span>様
          </p>
          <a href="/logout" class="button__logout">ログアウト</a>
          @else
          <a href="/login" class="button__login">ログイン</a>
          @endif
        </div>
      </div>
      <div class="headerlower">
        <nav class="globalMenu">
          <ul>
            <li><a href="#">トップ</a></li>
            <li><a href="/library/list">蔵書管理</a></li>
            <li><a href="#">申請管理</a></li>
            <li><a href="#">ユーザー情報管理</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>
  <!-- ヘッダー終了 -->

  <!-- メイン開始 -->
  <main>
    <div class="modal-background hidden" id="modal-overlay" onclick="cancelDelete()"></div>
    <div class="modal-wrap hidden" id="modal-box"></div>
  @yield('main')
  </main>
  <!-- メイン終了 -->

  <!-- フッター開始 -->
  <footer>
    <div class="footer__wrap">
      <ul>
        <li><a href="#">利用規約</a></li>
        <li><a href="#">ヘルプ</a></li>
      </ul>
      <p><small>&copy;  Future Technology Consulting inc.</small></p>
    </div>
  </footer>
  <!-- フッター終了 -->
  @yield('script')
</body>
<!-- コンテンツ終了 -->
</html>