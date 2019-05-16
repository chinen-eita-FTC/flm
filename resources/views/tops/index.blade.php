@extends('layouts.layout')

@section('title', 'トップページ')

@section('script')
{{--  TODO[Ph.1.0] styleを外部ファイルに移し替えること --}}
<style>
.search-box {
  width: 92%;
  margin: 0 auto;
  height: auto;
}
.search-title {
  border-radius: 0.1em;
  background: #003268; 
  font-size: 2em;
  font-weight: 500;
  color: #fff;
  text-align: center;
}

ul li {
    display: -webkit-flex;
    display: flex;
    -webkit-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-align-items: center;
    align-items: center;
    padding: 0.8em;
}

.login-form-title {
  -webkit-flex-basis: 28%;
  flex-basis: 28%;
  padding: 0.4em;
  width: 50%;
  font-size: 1.2em;
  font-weight: 900;
}

.login-form-input {
    -webkit-flex-basis: 50%;
    flex-basis: 50%;
    -webkit-flex-grow: 0.8;
    flex-grow: 0.8;
    padding: 0.4em;
    width: 42%;
    font-size: 1.2em;
    border-radius: 5px;
}

.button-ajust {
  justify-content: center;
}

.button-login {
  display: inline-block;
  padding: 8px 20px;
  min-width: 160px;
  background: #fff;
  border-radius: 6px;
  border: 2px solid #003268;
  font-size: 1.6rem;
  color: #003268;
  text-decoration: none;  
}

.button-login:hover {
  background: #003268;
  color: #fff;
  font-weight: 800;
  transition: .2s;
}

/* 角丸リスト風テーブル　スカウトレター検索画面用 */
.list_table_ScoutLetter {
  width: 100%;

  border-spacing: 0;
  border-collapse: separate;
}
.list_table_ScoutLetter li{
  display: inline-block;
  vertical-align: middle;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  padding: 0 0 0 3px;
}
.list_table_ScoutLetter .btn{
  display:inline-block;
  text-align: center;
  margin:1px;
  font-size: 1em;
  text-decoration: none;
  line-height:1.42;
  padding:0.2em 0.6em;
  border-width:3px;
  border-style:solid;
  background:transparent;
  border-radius:0.4em;
  cursor:pointer;
  color:#003268;
  background-color: #ffffff;
  border-color:#003268;
  user-select:none;
  vertical-align:bottom;
  width: 100%;
  transition:background-color 0.2s, color 0.2s, padding 0.2s cubic-bezier(0.175, 0.885, 0.32, 1.275), border-radius 0.2s;
}

.list_table_ScoutLetter li.scout_id{
  width:52%;
}
.list_table_ScoutLetter li.normal{
  width:15%;
}
.list_table_ScoutLetter li.title{
  width:20%;
}
.list_table_ScoutLetter li.detail{
  width:10%;
}
.list_table_ScoutLetter ul.style_none {
  margin: 10px 10px 10px 10px;
  border: 0px;
}

.list_table_ScoutLetter ul {
  margin: 10px 10px 10px 10px;
  padding: 5px;
  border-collapse: separate;
  border: 1px solid #003268;
  -webkit-border-radius:10px;
  -moz-border-radius:10px;
  border-radius:10px;
}

span.red{
  color: red;
}


</style>
@endsection

@section('main')
<div class="main-wrap">
  <div class="main-one-column">
    <h1>ユーザー情報管理画面</h1>
    <div class="search-box">
      <div class="list_table_ScoutLetter">
        <ul class="style_none">
          <li class="scout_id">書籍名</li>
          <li class="title">ジャンル</li>
          <li class="normal">送信日時</li>
          <li class="detail"></li>
        </ul>

        <ul>
          <li class="scout_id">よくわかるJava</li>
          <li class="title">PHP</li>
          <li class="normal">2018/09/01</li>
          <li class="detail"><a class="btn">返却</a></li>
        </ul>
        <ul>
          <li class="scout_id"> 書籍名書籍名書籍名書籍名書籍名書籍名</li>
          <li class="title">CentOS</li>
          <li class="normal">2018/09/01</li>
          <li class="detail"><a class="btn">返却</a></li>
        </ul>
        <ul>
          <li class="scout_id">書籍名書籍名書籍名書籍名書籍名書籍名書籍名書籍名書籍名書籍名書籍名書籍名書籍名書籍名</li>
          <li class="title">コンサル</li>
          <li class="normal">2018/09/01</li>
          <li class="detail"><a class="btn">返却</a></li>
        </ul>
        <ul>
          <li class="scout_id">書籍名</li>
          <li class="title">自己啓発</li>
          <li class="normal">2018/09/01</li>
          <li class="detail"><a class="btn">返却</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection