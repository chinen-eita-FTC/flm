<?php

namespace App\Http\Controllers\Logins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

  use AuthenticatesUsers { login as authLogin; }

  /**
   * Where to redirect users after login.
   *
   * @var string
   */
  protected $redirectTo = '/top';

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }

  /**
   * Show the application's login form.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      return view('logins.index');
  }

  /**
   * Handle a login request to the application.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
   */
  public function login(Request $request)
  {
    return $this->authLogin($request);
  }

  /**
  *  デフォルトで使用されている認証対象のカラムを変更
  *
  * @return string
  */
  public function username()
  {
      return 'email_address';
  }
}
