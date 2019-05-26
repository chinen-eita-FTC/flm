<?php
declare(strict_types=1);

namespace Tests\Unit\Services;

use App\Services\LibraryService;
use Tests\TestCase;
use App\Models\Masters\Book;
use Mockery;

/**
 * 蔵書管理サービスクラスのテスト
 *
 * @package Tests\Unit\Services
 */
class LibraryServiceTest extends TestCase
{

    /**
     * @var LibraryService テスト対象クラス
     */
    private $testee;

    /**
     * @var Book DIするインスタンス
     */
    private $book;

    /**
     * 初期処理
     */
    public function setUp()
    {
        parent::setUp();
        // モデルレイヤをモックオブジェクトとして定義
        $this->book = Mockery::mock(Book::class);
        $this->instance(Book::class,  $this->book);
        // テスト対象のクラスをインスタンスを生成
        $this->testee = app()->make(LibraryService::class);
    }

    /**
     * 対象メソッド：deleted
     * @test
     */
    public function 蔵書の削除が正常に実行されること()
    {
        $response = collect([
            'status' => true
        ]);

        // モデルレイヤの振る舞いを定義
        $id = 1;
        $this->book
        ->shouldReceive('deleteBook')
        ->with($id)
        ->once()
        ->andReturn($response);
        
        $actual = $this->testee->deleted($id);

        $this->assertTrue($actual->get('status'));
    }
}