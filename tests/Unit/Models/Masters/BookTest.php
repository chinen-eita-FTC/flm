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
<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
     /**
     * @test
     */
    public function 各カラム型の一致している任意の配列を利用してレコードを１件登録できること(){
<<<<<<< Updated upstream
        //今回は登録だからテストコードの挿入はなし

        //検証に使用するコレクションを定義する
        //date型をMysqlへ渡すときの記述をチェック
=======

        //検証に使用するコレクションを定義する    
>>>>>>> Stashed changes
        $date = '2019-01-01';
        $collection = array('m_book_level_id' => 1,
        'm_book_genre_id' => 2,
        'name' => 'ftc',
        'isbn_code' => '1919810',
        'published_at' => $date
<<<<<<< Updated upstream
        //登録時の処理のため、以下のフィールドは入力不要
        //'created_at',
        //'updated_at',
        //'deleted_at',
        );

        //Bookインスタンスを作成して、createBookを実行する
        //結果は$actualに入れておく
        $actual = $this->testee->createBook($collection);

        //create()でモデルを作った場合、返却値は新しく生成したオブジェクト
        //$actualの中がtrueである事を確認する

        $this->assertTrue($actual->get('status'));

        //きちんと登録できているか、取得する
=======
        );

        $actual = $this->testee->createBook($collection);

        //$actualの中がtrueである事を検証する
        $this->assertTrue($actual->get('status'));

        // DBの実体の検証
>>>>>>> Stashed changes
        $actual = $this->testee->find(1);
        $this->assertNotNull($actual);
    }

     /**
     * @test
     */
<<<<<<< Updated upstream
    public function 自動入力のidへ数字を入れて渡し、idが上書き登録されること(){
        //今回は登録だからテストコードの挿入はなし

        //検証に使用するコレクションを定義する
        //date型をMysqlへ渡すときの記述をチェック
=======
    public function 自動入力のidへ数字を入れて渡し、idが更新登録されること(){

        //検証に使用するコレクションを定義する
>>>>>>> Stashed changes
        $date = '2019-01-01';
        $collection = array('id' => 2,
        'm_book_level_id' => 1,
        'm_book_genre_id' => 2,
        'name' => 'ftc',
        'isbn_code' => '19890220',
        'published_at' => $date
<<<<<<< Updated upstream
        //登録時の処理のため、以下のフィールドは入力不要
        //'created_at',
        //'updated_at',
        //'deleted_at',
        );

        //Bookインスタンスを作成して、createBookを実行する
        //結果は$actualに入れておく
        $actual = $this->testee->createBook($collection);

        //create()でモデルを作った場合、返却値は新しく生成したオブジェクト
        //$actualの中がtrueである事を確認する

        $this->assertTrue($actual->get('status'));

        //AUTO_INCREMENTできちんと上書きして登録できているか、取得して確認する
        $actual = $this->testee->find(1)->isbn_code;
        //配列で渡したisbn_codeと、登録されたisbn_codeでの一致を確認
        $isbn = '19890220';
        $boole = $actual === $isbn;
        //きちんと上書きで登録されていれば、trueになるはず
=======
            );

        $actual = $this->testee->createBook($collection);
        
        //$actualの中がtrueである事を検証する

        $this->assertTrue($actual->get('status'));

        $actual = $this->testee->find(1)->isbn_code;

        //配列で渡したisbn_codeと、登録されたisbn_codeでの一致を検証
        $isbn = '19890220';
        $boole = $actual === $isbn;

        //登録結果の検証
>>>>>>> Stashed changes
        $this->assertTrue($boole);

    }

     /**
     * @test
     */
    public function 自動入力のidへ文字列を入れて渡し、idが上書き登録されること(){
<<<<<<< Updated upstream
        //今回は登録だからテストコードの挿入はなし

        //検証に使用するコレクションを定義する
        //date型をMysqlへ渡すときの記述をチェック
=======

        //検証に使用するコレクションを定義する
>>>>>>> Stashed changes
        $date = '2019-01-01';
        $collection = array('id' => 'ftc',
        'm_book_level_id' => 1,
        'm_book_genre_id' => 2,
        'name' => 'ftc',
        'isbn_code' => '198902201',
        'published_at' => $date
<<<<<<< Updated upstream
        //登録時の処理のため、以下のフィールドは入力不要
        //'created_at',
        //'updated_at',
        //'deleted_at',
        );

        //Bookインスタンスを作成して、createBookを実行する
        //結果は$actualに入れておく
        $actual = $this->testee->createBook($collection);

        //create()でモデルを作った場合、返却値は新しく生成したオブジェクト
        //$actualの中がtrueである事を確認する

        $this->assertTrue($actual->get('status'));

        //AUTO_INCREMENTできちんと上書きして登録できているか、取得して確認する
        $actual = $this->testee->find(1)->isbn_code;
        //配列で渡したisbn_codeと、登録されたisbn_codeでの一致を確認
        $isbn = '198902201';
        $boole = $actual === $isbn;
        //きちんと上書きで登録されていれば、trueになるはず
        $this->assertTrue($boole);
=======
        );

        $actual = $this->testee->createBook($collection);
       
        //$actualの中がtrueである事を検証する
        $this->assertTrue($actual->get('status'));

        //AUTO_INCREMENTできちんと上書きして登録できているか、取得して検証する
        $actual = $this->testee->find(1)->isbn_code;

        //配列で渡したisbn_codeと、登録されたisbn_codeでの一致を検証
        $isbn = '198902201';

        //きちんと上書きで登録されていれば、trueになる
        $this->assertSame($isbn, $actual);
>>>>>>> Stashed changes

    }

     /**
     * @test
     */
<<<<<<< Updated upstream
    public function 蔵書レベルマスタIDを入れずに渡して、登録できない事(){
        //今回は登録だからテストコードの挿入はなし

        //検証に使用するコレクションを定義する
        //date型をMysqlへ渡すときの記述をチェック
        $date = '2019-01-01';
        $collection = array(
        //'m_book_level_id' => 1,
=======
    public function 蔵書レベルマスタidを入れずに渡して、登録できない事(){

        //検証に使用するコレクションを定義する
        $date = '2019-01-01';
        $collection = array(
>>>>>>> Stashed changes
        'm_book_genre_id' => 2,
        'name' => 'ftc',
        'isbn_code' => '198902201',
        'published_at' => $date
<<<<<<< Updated upstream
        //登録時の処理のため、以下のフィールドは入力不要
        //'created_at',
        //'updated_at',
        //'deleted_at',
        );

        //Bookインスタンスを作成して、createBookを実行する
        //結果は$actualに入れておく
        $actual = $this->testee->createBook($collection);

        //create()でモデルを作った場合、返却値は新しく生成したオブジェクト
        //$actualの中がfalseである事を確認する

        $this->assertFalse($actual->get('status'));
    }


=======
        );

        $actual = $this->testee->createBook($collection);
        
        //$actualの中がfalseである事を検証する
        $this->assertFalse($actual->get('status'));
    }

    
>>>>>>> Stashed changes
     /**
     * @test
     */
    public function 蔵書レベルマスタIDに文字列を入力して、登録できない事(){
<<<<<<< Updated upstream
        //今回は登録だからテストコードの挿入はなし

        //検証に使用するコレクションを定義する
        //date型をMysqlへ渡すときの記述をチェック
=======

        //検証に使用するコレクションを定義する
>>>>>>> Stashed changes
        $date = '2019-01-01';
        $collection = array(
        'm_book_level_id' => 'ftc',
        'm_book_genre_id' => 2,
        'name' => 'ftc',
        'isbn_code' => '198902201',
        'published_at' => $date
<<<<<<< Updated upstream
        //登録時の処理のため、以下のフィールドは入力不要
        //'created_at',
        //'updated_at',
        //'deleted_at',
        );

        //Bookインスタンスを作成して、createBookを実行する
        //結果は$actualに入れておく
        $actual = $this->testee->createBook($collection);

        //create()でモデルを作った場合、返却値は新しく生成したオブジェクト
        //$actualの中がfalseである事を確認する

        $this->assertFalse($actual->get('status'));
    }


=======
        );

        $actual = $this->testee->createBook($collection);
        
        //$actualの中がfalseである事を検証する
        $this->assertFalse($actual->get('status'));
    }

    
>>>>>>> Stashed changes
     /**
     * @test
     */
    public function 蔵書ジャンルマスタIDを入れずに渡して、登録できない事(){
<<<<<<< Updated upstream
        //今回は登録だからテストコードの挿入はなし

        //検証に使用するコレクションを定義する
        //date型をMysqlへ渡すときの記述をチェック
        $date = '2019-01-01';
        $collection = array(
        'm_book_level_id' => 1,
        //'m_book_genre_id' => 2,
        'name' => 'ftc',
        'isbn_code' => '198902201',
        'published_at' => $date
        //登録時の処理のため、以下のフィールドは入力不要
        //'created_at',
        //'updated_at',
        //'deleted_at',
        );

        //Bookインスタンスを作成して、createBookを実行する
        //結果は$actualに入れておく
        $actual = $this->testee->createBook($collection);

        //create()でモデルを作った場合、返却値は新しく生成したオブジェクト
        //$actualの中がfalseである事を確認する

        $this->assertFalse($actual->get('status'));
    }


=======

        //検証に使用するコレクションを定義する
        $date = '2019-01-01';
        $collection = array(
        'm_book_level_id' => 1,
        'name' => 'ftc',
        'isbn_code' => '198902201',
        'published_at' => $date
        );

        $actual = $this->testee->createBook($collection);

        //$actualの中がfalseである事を検証する
        $this->assertFalse($actual->get('status'));
    }

    
>>>>>>> Stashed changes
     /**
     * @test
     */
    public function 蔵書ジャンルマスタIDに文字列を入力して、登録できない事(){
<<<<<<< Updated upstream
        //今回は登録だからテストコードの挿入はなし

        //検証に使用するコレクションを定義する
        //date型をMysqlへ渡すときの記述をチェック
=======

        //検証に使用するコレクションを定義する
>>>>>>> Stashed changes
        $date = '2019-01-01';
        $collection = array(
        'm_book_level_id' => 1,
        'm_book_genre_id' => 'ftc',
        'name' => 'ftc',
        'isbn_code' => '198902201',
        'published_at' => $date
<<<<<<< Updated upstream
        //登録時の処理のため、以下のフィールドは入力不要
        //'created_at',
        //'updated_at',
        //'deleted_at',
        );

        //Bookインスタンスを作成して、createBookを実行する
        //結果は$actualに入れておく
        $actual = $this->testee->createBook($collection);

        //create()でモデルを作った場合、返却値は新しく生成したオブジェクト
        //$actualの中がfalseである事を確認する

        $this->assertFalse($actual->get('status'));
    }


=======
        );

        $actual = $this->testee->createBook($collection);

        //$actualの中がfalseである事を検証する
        $this->assertFalse($actual->get('status'));
    }

        
>>>>>>> Stashed changes
     /**
     * @test
     */
    public function 蔵書名を入れずに渡して、登録できない事(){
<<<<<<< Updated upstream
        //今回は登録だからテストコードの挿入はなし

        //検証に使用するコレクションを定義する
        //date型をMysqlへ渡すときの記述をチェック
=======

        //検証に使用するコレクションを定義する
>>>>>>> Stashed changes
        $date = '2019-01-01';
        $collection = array(
        'm_book_level_id' => 1,
        'm_book_genre_id' => 2,
<<<<<<< Updated upstream
        //'name' => 'ftc',
        'isbn_code' => '198902201',
        'published_at' => $date
        //登録時の処理のため、以下のフィールドは入力不要
        //'created_at',
        //'updated_at',
        //'deleted_at',
        );

        //Bookインスタンスを作成して、createBookを実行する
        //結果は$actualに入れておく
        $actual = $this->testee->createBook($collection);

        //create()でモデルを作った場合、返却値は新しく生成したオブジェクト
        //$actualの中がfalseである事を確認する

=======
        'isbn_code' => '198902201',
        'published_at' => $date
        );

        $actual = $this->testee->createBook($collection);

        //$actualの中がfalseである事を検証する
>>>>>>> Stashed changes
        $this->assertFalse($actual->get('status'));
    }

     /**
     * @test
     */
    public function ISBNコードを入れずに渡して、登録できる事(){
<<<<<<< Updated upstream
        //今回は登録だからテストコードの挿入はなし

        //検証に使用するコレクションを定義する
        //date型をMysqlへ渡すときの記述をチェック
=======

        //検証に使用するコレクションを定義する
>>>>>>> Stashed changes
        $date = '2019-01-01';
        $collection = array(
        'm_book_level_id' => 1,
        'm_book_genre_id' => 2,
        'name' => 'ftc',
<<<<<<< Updated upstream
        //'isbn_code' => '198902201',
        'published_at' => $date
        //登録時の処理のため、以下のフィールドは入力不要
        //'created_at',
        //'updated_at',
        //'deleted_at',
        );

        //Bookインスタンスを作成して、createBookを実行する
        //結果は$actualに入れておく
        $actual = $this->testee->createBook($collection);

        //create()でモデルを作った場合、返却値は新しく生成したオブジェクト
        //$actualの中がtrueである事を確認する

=======
        'published_at' => $date
        );

        $actual = $this->testee->createBook($collection);

        //$actualの中がtrueである事を検証する
>>>>>>> Stashed changes
        $this->assertTrue($actual->get('status'));
    }
}
