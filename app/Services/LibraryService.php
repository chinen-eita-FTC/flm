<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Masters\Book;
use App\Models\Masters\BookGenre;
use Illuminate\Support\Collection;

/**
 * 蔵書管理サービスクラス
 *
 * @package App\Services
 */
class LibraryService
{

    /**
     * @var Book 蔵書モデル
     */
    private $book;

    /**
     * @var BookGenre 蔵書ジャンルモデル
     */
    private $bookGenre;

    /**
     * 初期処理
     *
     * @return void
     */
    public function __construct(
        Book $book,
        BookGenre $bookGenre
    ) {
        $this->book = $book;
        $this->bookGenre = $bookGenre;
    }

    /**
     * 任意の値より蔵書情報を取得
     *
     * @param array $input
     * @return Collection
     */
    public function list(array $input): Collection
    {
        $input['m_book_genre_id'] = $this->convertToInteger($input['m_book_genre_id']);
        $input = collect($input);
        $response['books'] = $this->book->getBooks($input);
        $response['bookGenres'] = $this->bookGenre->getBookGenres($input);
        return collect($response);
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
