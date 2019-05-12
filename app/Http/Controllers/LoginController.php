<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\View\View;
use Auth;

/**
 * ログインコントローラクラス
 *
 * @package App\Http\Controllers
 */
class LoginController extends Controller
{

    use AuthenticatesUsers { login as authLogin; }

    /**
     * @var string ログイン成功後のリダイレクト先
     */
    protected $redirectTo = '/';

    /**
     * 初期処理
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Method:GET
     * URL:/logins
     * @return View ログインページ
     */
    public function index(): View
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
     * @return string 認証対象のカラム
     */
    public function username()
    {
        return 'email_address';
    }
}
