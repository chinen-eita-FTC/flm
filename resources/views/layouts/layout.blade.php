<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  @yield('css')
</head>

<!-- コンテンツ開始 -->
<body>
  <!-- ヘッダー開始 -->
  <header>
    <div class="headerWrap">
      <div class="headerUpper">
        <div class="headerUpper__left">
          <h1>書籍管理システム</h1>
        </div>
        <div class="headerUpper__right">
          <p class="headerUpper__right_loginMessage">
            <span class="font_bold"><!-- ここは変数 -->こんにちは、○○</span>様
          </p>
          <a href="#" class="button__login">ログイン</a>
        </div>
      </div>
      <div class="headerlower">
        <nav class="globalMenu">
          <ul>
            <li><a href="#">トップ</a></li>
            <li><a href="#">書籍管理</a></li>
            <li><a href="#">購入申請</a></li>
            <li><a href="#">履歴</a></li>
            <li><a href="#">設定</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>
  <!-- ヘッダー終了 -->

  <!-- メイン開始 -->
  <main>
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