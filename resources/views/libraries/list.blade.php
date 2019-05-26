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
    <button class="button">aaaa</button>
    <div class="list-table-box">
      <div class="list-table">
        <ul class="style_none">
          <li class="one-forty-width">書籍名</li>
          <li class="fifth-width">ジャンル</li>
          <li class="one-fifteenth-width">送信日時</li>
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