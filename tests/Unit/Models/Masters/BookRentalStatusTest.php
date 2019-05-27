<?php
declare(strict_types=1);

namespace Tests\Unit\Models\Masters;

use Tests\Unit\Models\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Masters\BookRentalStatus;
use Illuminate\Support\Facades\Artisan;

/**
 * 蔵書貸出情報ステータスモデルのテスト
 *
 * @package Tests\Unit\Models\Masters
 */
class BookRentalStatusTest extends TestCase
{

    /**
     * @var BookRentalStatus テスト対象クラス
     */
    private $testee;

    /**
     * 初期処理
     */
    public function setUp()
    {
        parent::setUp();
		Artisan::call('migrate:refresh');
        Artisan::call('db:seed');
        $this->testee = app()->make(BookRentalStatus::class);
    }

    /**
     * @test deleteBookRentalStatus
     */
    public function 任意の主キーを使用してレコードが1件削除されること()
    {
        //$array = array('name'=>'flm');
        //$this->testee->create($array); 
    
        $actual = $this->testee->deleteBook(1);
        $this->assertTrue($actual['status']);
		
		$id =1;
        $actual = $this->testee->find($id);
        $this->assertSame($actual->id,$id);
    }

    /**
    * @test createBookRentalstatus
    */
    public function 任意の配列を用いてデータを登録できる事(){
        $array = array('name'=>'flm');
        $actual = $this->testee->createBook($array);

        $this->assertTrue($actual['status']);

		$id = 3;
        $data = $this->testee->find($id);
        $this->assertSame($data->name,'flm');

    }

    /**
     * @test updateBookRentalStatus
     */
    public function 任意の配列を用いてデータを更新できる(){
		$id = 3;
        $array = array('id'=>$id,'name'=>'PHP');
        $actual = $this->testee->updateBook($array);
        
        $this->assertTrue($actual['status']);

        $name = $this->testee->find($id)->name;
        $this->assertSame($name,'PHP');

    } 

    /**
     * @test getBookRentalStatus
     */
    public function 主キーを指定して1つの蔵書貸出情報ステータスを取得(){

        $id = 1;
        $actual = $this->testee->getBook($id);
        $this->assertTrue($actual['status']);
		$name = $this->testee->find($id)->name;
		$this->assertSame($name,'test');



    }
	
	    /**
     * @test getBooksRentalStatus
     */
    public function 主キーを指定して全ての蔵書貸出情報ステータスを取得(){

        $actual = $this->testee->getBooks();
        $this->assertTrue($actual['status']);
		
		$data = $this->testee::all()->count();
		
		$this->assertSame($data,2);

    }
}
