<?php

namespace App\Services;

use App\Models\Masters\Book;

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
    public function deleted(int $id)
    {
        $response = $this->book->deleteBook($id);
        return $response;
    }
}
