<?php

namespace App\Services;

use App\Models\Masters\Book;
use Illuminate\Support\Collection;

/**
 * 蔵書管理サービスクラス
 *
 * @package App\Services
 */
class LibraryService
{

    private $book;

    /**
     * 初期処理
     *
     * @return void
     */
    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    /**
     *
     */
    public function list()
    {
        $books = $this->book->all();
        return $books;
    }

    /**
     * 主キーを指定して蔵書情報を削除
     *
     * @param int $id 主キー
     * @return Collection
     */
    public function deleted(int $id): Collection
    {
        $response = $this->book->deleteBook($id);
        return $response;
    }

    /**
     * コントローラーから受け取ったリクエストパラメータをモデルレイヤが認識できるように成型し、
     * 更新メソッドを実行
     *
     * @param array $input リクエストパラメータ
     * @return Collection
     */
    public function updated(array $input): Collection
    {
        $input['id'] = $this->convertToInteger($input['id']);
        $response = $this->book->updateBook($input);
        return $response;
    }

    /**
     * 文字列型の数値をint型に変換
     *
     * @param string $target 変換対象の文字列
     * @return int int型の数値
     */
    private function convertToInteger(string $target): int
    {
        return intval($target);
    }
}
