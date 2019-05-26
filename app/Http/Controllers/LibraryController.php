<?php

namespace App\Http\Controllers;

use App\Services\LibraryService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * 蔵書管理コントローラクラス
 *
 * @package App\Http\Controllers
 */
class LibraryController extends Controller
{

    private $service;

    /**
     * 初期処理
     *
     * @return void
     */
    public function __construct(LibraryService $service)
    {
        $this->service = $service;
    }

    /**
     * Method:GET
     * URL:/library/list
     * @return View 蔵書管理画面トップページ
     */
    public function list(Request $request): View
    {
        $books = $this->service->list();
        return view('libraries.list', compact('books'));
    }

    /**
     * Method:GET
     * URL:/library/delete
     * @return View 蔵書削除確認画面のモーダルウィンドウ
     */
    public function delete(Request $request): View
    {
        $id = $request->id;
        $name = $request->name;
        $publishedAt = $request->published_at;
        $isbnCode = $request->isbn_code;
        return view('libraries.delete', compact('id', 'name', 'publishedAt', 'isbnCode'));
    }

    /**
     * Method:POST
     * URL:/library/delete
     * @return RedirectResponse 蔵書管理画面トップページ
     */
    public function deleted(Request $request): RedirectResponse
    {
        $response = $this->service->deleted($request->input('id'));
        return redirect()->action('LibraryController@list');
    }
}
