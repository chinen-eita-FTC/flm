<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * トップページのコントローラクラス
 *
 * @package App\Http\Controllers
 */
class TopController extends Controller
{

    /**
     * 初期処理
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * トップページの初期表示を行う。
     *
     * @param Request $request リクエストパラメータ
     * @return View
     */
    public function index(Request $request):View
    {
		return view('tops/index');
    }
}
