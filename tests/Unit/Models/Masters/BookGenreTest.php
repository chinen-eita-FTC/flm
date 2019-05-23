<?php
declare(strict_types=1);

namespace Tests\Unit\Models\Masters;

use Tests\Unit\Models\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Masters\BookGenre;

/**
 * 蔵書ジャンルモデルのテスト
 *
 * @package Tests\Unit\Models\Masters
 */
class BookGenreTest extends TestCase
{

    /**
     * @var BookGenre テスト対象クラス
     */
    private $testee;

    /**
     * 初期処理
     */
    public function setUp()
    {
        parent::setUp();
        $this->testee = app()->make(BookGenre::class);
    }

    /**
     * @test
     */
    public function 任意の主キーを使用してレコードが1件削除されること()
    {
        // テストデータを準備
        $this->testee->create(['name'=>'kurosaki']);
        /* $factoryKey = 'デフォルト';
        $seedingCount = 10;
        $this->seed(
            BookGenre::class,
            $factoryKey,
            $seedingCount
        );*/

        // 検証に使用する主キー
        $id = 1;

        // 返却値の検証
        $actual = $this->testee->deleteBookGenre($id);
        $this->assertTrue($actual->get('status'));

        // DBの実体の検証
        $actual = $this->testee->find($id);
        $this->assertEmpty($actual);
    }

    /**
    * @test
    */
    public function 配列を受け取ってデータが登録できる事()
    {
        $array = (['name'=>'kurosaki']);
        // データを登録する
        $this->testee->createBookGenre($array);
    
        // 検証に使用する主キー
        $id = 1;

        // 登録が完了しているかの検証
        $actual = $this->testee->find($id);
        $this->assertNotNull($actual);

    }

    /**
    * @test
    */
    public function nameに数値型が指定された場合は登録されない事()
    {
        $array = (['name'=> 4 ]);
        // データを登録する
        $this->testee->createBookGenres();
    
        // 検証に使用する主キー
        $id = 1;

        // 返却値の検証
        $actual = $this->testee->find($id);
        $this->assertNull($actual);

    }

    /**
    * @test
    */
    public function 数値を渡してレコードを一件取得する事ができる()
    {
        // テストデータを登録する
        $this->testee->create(['name'=>'kurosaki']);

        // 検証に使用する主キー
        $id = 1;

        // 返却値の検証
        $actual = $this->testee->getBookGenre($id);

        $this->assertTrue($actual->get('status'));

        $this->assertNotNull($actual);

    }

    /**
    * @test
    */
    public function 数値を渡してレコードを全権取得する事ができる()
    {
        // テストデータを登録する
        $this->testee->create(['name'=>'kurosaki']);
        $this->testee->create(['name'=>'kurosaki']);
        
        // 返却値の検証
        $actual = $this->testee->getBookGenres();
        $this->assertTrue($actual->get('status'));
        
        //レコード実体の検証
        $record = $this->testee->find(2);
        $this->assertNotNull($record);
    }
}
