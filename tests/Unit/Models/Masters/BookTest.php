<?php
declare(strict_types=1);

namespace Tests\Unit\Models\Masters;

use App\Models\Masters\Book;
use Carbon\Carbon;
use Tests\Unit\Models\TestCase;

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
        $response = $this->testee->find($id);
        $this->assertEmpty($response);
    }

    /**
     * @test
     */
    public function 任意の配列を使用してレコードを１件登録できること()
    {
        // 作成日時検証のため現在日時を固定
        Carbon::setTestNow(new Carbon('2017-05-01 00:00:00'));

        // 期待する値を定義
        $id = 1;
        $name = 'テスト蔵書';
        $publishedAt = new Carbon('1991-10-25 00:00:00');
        $isbnCode = '0000010000';

        // 登録用のダミーデータを生成
        $book = factory(Book::class, 'デフォルト')->make([
            'name' => $name,
            'published_at' => $publishedAt,
            'isbn_code' => $isbnCode,
        ])->toArray();

        // 登録前にデータが存在しないことを検証
        $response = $this->testee->find($id);
        $this->assertEmpty($response);

        // 対象メソッドを実行
        $actual = $this->testee->createBook($book);

        // DBに期待する値が登録されていることを確認
        $response = $this->testee->find($id);
        $this->assertNotEmpty($response);
        $this->assertSame($id, $response->id);
        $this->assertSame($name, $response->name);
        $this->assertEquals($publishedAt, $response->published_at);
        $this->assertSame($isbnCode, $response->isbn_code);

        // 返却値に登録された蔵書マスタデータが返却されていることを検証
        $this->assertSame($id, $actual->get('id'));
        $this->assertSame($name, $actual->get('name'));
        $this->assertEquals($publishedAt, $actual->get('published_at'));
        $this->assertSame($isbnCode, $actual->get('isbn_code'));
        $this->assertNull($actual->get('updated_at'));
        $this->assertNull($actual->get('deleted_at'));
    }

    /**
     * @test
     */
    public function 任意の蔵書モデルを任意の値で1件更新できること()
    {
        // テストデータ作成日時を固定するため現在日時を固定
        Carbon::setTestNow(new Carbon('2017-05-01 00:00:00'));

        // 期待する値を定義
        $id = 1;
        $name = 'テスト蔵書';
        $publishedAt = new Carbon('1991-10-25 00:00:00');
        $isbnCode = '0000010000';
        $updatedAt = new Carbon('2018-04-01 00:00:00');

        // テストデータを準備
        $factoryKey = 'デフォルト';
        $seedingCount = 10;
        $this->seed(
            Book::class,
            $factoryKey,
            $seedingCount
        );

        // 更新前の蔵書モデルの値を検証
        $response = $this->testee->find($id);
        $this->assertNotEmpty($response);
        $this->assertSame($id, $response->id);
        $this->assertSame('テストデータ1', $response->name);
        $this->assertSame('000000000', $response->isbn_code);
        $this->assertNull($response->updated_at);
        $this->assertNull($response->deleted_at);

        // 登録用のダミーデータを生成
        $book = factory(Book::class, 'デフォルト')->make([
            'id' => $id,
            'name' => $name,
            'published_at' => $publishedAt,
            'isbn_code' => $isbnCode,
        ])->toArray();

        // 更新日時を固定するため現在日時を変更
        Carbon::setTestNow($updatedAt);

        // 対象メソッドを実行
        $actual = $this->testee->updateBook($book);

        // 検証
        $this->assertTrue($actual->get('status'));

        $response = $this->testee->find($id);
        $this->assertNotEmpty($response);
        $this->assertSame($id, $response->id);
        $this->assertSame($name, $response->name);
        $this->assertEquals($publishedAt, $response->published_at);
        $this->assertSame($isbnCode, $response->isbn_code);
        $this->assertEquals($updatedAt, $response->updated_at);
    }
}