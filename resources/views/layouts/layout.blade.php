<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>@yield('title')</title>
  @yield('script')
</head>

<!-- コンテンツ開始 -->
<body>
  <!-- ヘッダー開始 -->
  <header>

  </header>
  <!-- ヘッダー終了 -->

  <!-- メイン開始 -->
  <main>
  @yield('main')
  </main>
  <!-- メイン終了 -->

  <!-- フッター開始 -->
  <footer>

  </footer>
  <!-- フッター終了 -->
</body>
<!-- コンテンツ終了 -->
</html>