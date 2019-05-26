@extends('layouts.layout')

@section('title', 'トップページ')

@section('script')
{{--  TODO[Ph.1.0] styleを外部ファイルに移し替えること --}}
<style>
.login-box {
  width: 60%;
  margin: 0 auto;
  height: auto;
}

.login-form ul {
  padding-top: 2em;
}

.login-form ul li {
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
</style>
@endsection

@section('main')
<div class="main-wrap">
  <div class="main-one-column">
    <h1>ログイン画面</h1>
    <div class="login-box">
      <form class="login-form" action="/login" method="post">
        {{ csrf_field() }}
        <ul>
          <li>
            <label class ="login-form-title" for="email-address">メールアドレス</label>
            <input class ="login-form-input" type="text" id="email-address" name="email_address" value="">
          </li>
          <li>
            <label class ="login-form-title" for="password">パスワード</label>
            <input class ="login-form-input" type="password" id="password" name="password" value="">
          </li>
          <li class="button-ajust-center">
            <input class ="button-login" type="submit" value="ログイン" />
          </li>
        </ul>
      </form>
    </div>
  </div>
</div>
@endsection