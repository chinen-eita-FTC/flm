<?php
declare(strict_types=1);

namespace Tests\Unit\Models\Masters;

use Tests\Unit\Models\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Masters\Book;

/**
 * 蔵書モデルのテスト
 *
 * @package Tests\Unit\Models\Masters
 */
class BookTest extends TestCase
{

    /**
     * @var Book テスト対象クラス
     */
    private $testee;

    /**
     * 初期処理
     */
    public function setUp()
    {
        parent::setUp();
        $this->testee = app()->make(Book::class);
    }

    /**
     * @test
     */
    public function 任意の主キーを使用してレコードが1件削除されること()
    {
        // テストデータを準備
        $factoryKey = 'デフォルト';
        $seedingCount = 10;
        $this->seed(
            Book::class,
            $factoryKey,
            $seedingCount
        );

        // 検証に使用する主キー
        $id = 1;

        // 返却値の検証
        $actual = $this->testee->deleteBook($id);
        $this->assertTrue($actual->get('status'));

        // DBの実体の検証
        $actual = $this->testee->find($id);
        $this->assertEmpty($actual);
    }
}
