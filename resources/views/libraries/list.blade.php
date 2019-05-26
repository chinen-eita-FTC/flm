@extends('layouts.layout')

@section('title', '蔵書管理画面')

@section('script')
<script src="{{ asset('js/delete.js') }}"></script>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/modal.css') }}">
@endsection

@section('main')
<div class="main-wrap">
  <div class="main-one-column">
    <h1>蔵書管理画面</h1>
    <div class="list-table-box radius-default padding-default">
      <p class="bold-title">蔵書検索フォーム</p>
      <div>
        <form method="GET" action="/library/list" class="table-form">
          <table>
              <tr><th>蔵書名</th><td><input type="text" name="name" value=""></td></tr>
              <tr><th>ジャンル</th>
                <td><ul class="button-ajust-left flex-wrap">
                  <li><label><input type="radio" name="book_genre" checked="">指定なし</label></li>
                  <li><label><input type="radio" name="book_genre">Java</label></li>
                  <li><label><input type="radio" name="book_genre">PHP</label></li>
                  <li><label><input type="radio" name="book_genre">Python</label></li>
                  <li><label><input type="radio" name="book_genre">Java</label></li>
                  <li><label><input type="radio" name="book_genre">PHP</label></li>
                  <li><label><input type="radio" name="book_genre">Python</label></li>
                  <li><label><input type="radio" name="book_genre">Java</label></li>
                  <li><label><input type="radio" name="book_genre">PHP</label></li>
                  <li><label><input type="radio" name="book_genre">Python</label></li>
                </ul></td>
              </tr>
          </table>
          <div class="button-ajust-center"><input type="submit" class="button button-default quarter-width" value="検索"></div>
        </form>
      </div>
    </div>

    <div class="list-table-box">
      <div class="button-ajust-right margin-top-default"><button class="button button-success">蔵書の新規登録</button></div>
      <div class="list-table">
        <ul class="style_none">
          <li class="one-forty-width">蔵書名</li>
          <li class="fifth-width">ジャンル</li>
          <li class="one-fifteenth-width">出版年月日</li>
          <li class="tenth-width"></li>
          <li class="tenth-width"></li>
        </ul>
        @foreach ($books as $book)
        <ul>
          <li class="one-forty-width"><a href="#">{{$book->name}}</a></li>
          <li class="fifth-width"><a href="#">ジャンル名</a></li>
          <li class="one-fifteenth-width">{{$book->published_at}}</li>
          <li class="tenth-width"><button class="button button-danger full-width" onclick="showBookModal('./delete', {{$book}})">削除</button></li>
          <li class="tenth-width"><button class="button button-default full-width" onclick="showBookModal('./update', {{$book}})">編集</button></li>
        </ul>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection