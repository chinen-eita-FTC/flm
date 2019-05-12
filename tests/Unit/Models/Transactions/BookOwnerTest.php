<?php
declare(strict_types=1);

namespace Tests\Unit\Models\Transactions;

use Tests\Unit\Models\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Transactions\BookOwner;

/**
 * 書籍所有者モデルのテスト
 *
 * @package Tests\Unit\Models\Transactions
 */
class BookOwnerTest extends TestCase
{

    /**
     * @var BookOwner テスト対象クラス
     */
    private $testee;

    /**
     * 初期処理
     */
    public function setUp()
    {
        parent::setUp();
        $this->testee = app()->make(BookOwner::class);
    }

    /**
     * 対象メソッド：getBookOwnerById
     * @test
     */
    public function 存在する主キーを指定して1件のユーザ情報を取得できること()
    {
        // テストデータを準備
        $factoryKey = 'デフォルト';
        $seedingCount = 10;
        BookOwner::truncate();
        $this->seed(
            BookOwner::class,
            $factoryKey,
            $seedingCount
        );

        // テスト対象メソッドを実行
        $id = 1;
        $actuarl = $this->testee->getBookOwnerById($id);

        // 検証
        $this->assertSame(1, $actuarl->get('id'));
        $this->assertSame(1, $actuarl->get('m_book_id'));
        $this->assertSame(1, $actuarl->get('m_user_id'));
    }

    /**
     * 対象メソッド：getBookOwnerById
     * @test
     */
    public function 存在しない主キーを指定してユーザ情報を取得できないこと()
    {
        // テストデータを準備
        $factoryKey = 'デフォルト';
        $seedingCount = 10;
        BookOwner::truncate();
        $this->seed(
            BookOwner::class,
            $factoryKey,
            $seedingCount
        );

        // テスト対象メソッドを実行
        $id = 11;
        $actuarl = $this->testee->getBookOwnerById($id);

        // 検証
        $this->assertEmpty($actuarl);
    }
}
