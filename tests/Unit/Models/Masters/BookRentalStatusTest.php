<?php
declare(strict_types=1);

namespace Tests\Unit\Models\Masters;

use Tests\Unit\Models\TestCase;
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
        $actual = $this->testee->deleteBook(1);
        $this->assertTrue($actual['status']);
		$id =1;
        $actual = $this->testee::withTrashed()->find($id);
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
	* @test
	*/
	public function ユーザー名を利用した貸出情報ステータスの取得に関するテスト(){
		$ary = array();
		$ary['name'] = 1;
		$actual = $this->testee->getBookRentalStatus($ary);
		$this->assertTrue($actual['status']);
		$this->assertNotNull($actual['data']);
	}

	/**
	 * @test 
	 */
	public function 蔵書貸出情報ステータスidを利用した貸出情報ステータスの取得に関するテスト(){
		$ary = array('id'=>1);
		$actual = $this->testee->getBookRentalStatus($ary);
		$this->assertTrue($actual['status']);
		$this->assertNotNull($actual['data']);
	}

	/**
	 * @test 
	 */
	public function 貸出情報全件取得に関するテスト(){
		$ary = array();
		$actual = $this->testee->getBookRentalStatus($ary);
		$this->assertTrue($actual['status']);
		$this->assertNotNull($actual['data']);
    }
}
