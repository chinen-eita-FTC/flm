<?php
declare(strict_types=1);

namespace Tests\Unit\Libraries;

use Tests\TestCase;
use App\Libraries\BookGateway;

/**
 * 外部の書籍検索APIから取得した情報をサービスレイヤに提供するクラスのテスト
 *
 * @package Tests\Unit\Libraries
 */
class BookGatewayTest extends TestCase
{

    /**
     * @var BookGateway テスト対象クラス
     */
    private $testee;

    /**
     * 初期処理
     */
    public function setUp()
    {
        parent::setUp();
        $this->testee = app()->make(BookGateway::class);
    }

    /**
     * @test
     */
    public function ISBNコードを指定した場合1件の書籍情報が取得できること()
    {
        $isbn = '9784815600846';
        $actual = $this->testee->getBookByIsbn($isbn);
        $this->assertCount(1, $actual);
    }

    /**
     * @test
     */
    public function 存在しないISBNコードを指定した場合からのコレクションオブジェクトを取得できること()
    {
        $isbn = 'XXXXXXX';
        $actual = $this->testee->getBookByIsbn($isbn);
        $this->assertEmpty($actual);
    }
}
