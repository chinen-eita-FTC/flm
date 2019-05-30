<?php
declare(strict_types=1);

namespace Tests\Unit\Models\Masters;

use Tests\Unit\Models\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Masters\BookRentalStatus;
use Illuminate\Support\Facades\Artisan;
use Log;

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
    public function 「任意の主キー」を使用してレコードが1件削除する()
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
    public function 「任意の配列」を用いてデータを登録する(){
        $array = array('name'=>'flm');
        $actual = $this->testee->createBook($array);
        $this->assertTrue($actual['status']);
		$id = 51;
        $data = $this->testee->find($id);
        $this->assertSame($data->name,'flm');
    }

    /**
     * @test updateBookRentalStatus
     */
    public function 「任意の配列」を用いてデータを更新する(){
		$id = 3;
        $array = array('id'=>$id,'name'=>'PHP');
        $actual = $this->testee->updateBook($array);
        $this->assertTrue($actual['status']);
        $name = $this->testee->find($id)->name;
        log::info($name);
        $this->assertSame($name,'PHP');
    } 

    /**
	* @test
	*/
	public function 「ユーザー名」を利用して貸出情報ステータスを取得する(){
		$array['name'] = 1;
		$actual = $this->testee->getBookRentalStatus($array);
		$this->assertTrue($actual['status']);
		$this->assertNotNull($actual['data']);
	}

	/**
	 * @test 
	 */
	public function 「蔵書貸出情報ステータスid」を利用して貸出情報ステータスを取得する(){
		$array = array('id'=>1);
		$actual = $this->testee->getBookRentalStatus($array);
		$this->assertTrue($actual['status']);
		$this->assertNotNull($actual['data']);
	}

	/**
	 * @test 
	 */
	public function 貸出情報全件を取得する(){
		$array = array();
		$actual = $this->testee->getBookRentalStatus($array);
		$this->assertTrue($actual['status']);
		$this->assertNotNull($actual['data']);
    }
}
