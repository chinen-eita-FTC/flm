<?php
declare(strict_types=1);

namespace App\Models\Masters;

use App\Models\Model;
use Illuminate\Support\Collection;
use Log;
use Exception;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 蔵書貸し出し情
 * 
 * @package App\Models\Masters
 */
class BookRentalStatus extends Model
{
    /**
     * 論理削除を利用
     */
    use SoftDeletes;

    /**
     * テーブルの物理名
     *
     * @var string
     */
    protected $table = 'm_book_rental_statuses';

    /**
     * 意図しないデータの更新を防ぎたいカラム群
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * モデルを配列/JSON変換するときに隠蔽されるカラム群
     *
     * @var array
     */
    protected $hidden = [

    ];
	
    /**
     * 主キーを指定して蔵書貸出情報ステータスを削除
     * 
     * @param int $id 主キー
     * @return Collection
     */
    public function deleteBook(int $id){
        try{
            $data = $this->find($id); //->delete();
            if(isset($data)){
                $data->delete();
                $response = array("status"=>true);
                return collect($response);
            }
            else{
                throw new Exception('this record was deleted');
                $response = array("status"=>false);
                return collect($response);
            }
			$response = array("status"=>true);
            return collect($response);
        }
        catch(Exception $e){
            //TODO [v1.0|機能追加] 例外処理の送出方法の決定後に削除時の例外処理の追加すること
        }
    }

    /**
     *　入力内容から蔵書貸出情報ステータスを登録 
     * 
     * @param array $array
     * @return Collection
     */
    public function createBook(array $array){
        try{
            $this->fill($array)->save();
            $response = array("status"=>true);
            return collect($response);
        }
        catch(Exception $e){
            //TODO [v1.0|機能追加] 例外処理の送出方法の決定後に削除時の例外処理の追加すること
        }
    }

    /**
     * 配列から蔵書貸出情報ステータスを更新
     * 
     * @param array $array
     * @return Collection
     */
    public function updateBook(array $array){
        try{
            $data = $this->find($array['id']);
            $data->name = 'PHP';
            $data->save();
            $response = array("status"=>true);
            return collect($response);
        }
        catch(Exception $e){
            //TODO [v1.0|機能追加] 例外処理の送出方法の決定後に削除時の例外処理の追加すること
        }
    }

	/*
    *蔵書貸出情報ステータスFレコードの取得機能
	*
	* @param array $array
	* @return collection
	*/
	public function getBookRentalStatus(array $array){
        $query = $this;
        if(isset($array['name'])){
            $query->where('name',$array['name']);
        }
        elseif(isset($array['id'])){
            $query->where('id',$array['id']);
        }
        else{
            $data = $query::all();
            $response = array("status"=>true,"data"=>$data);
            return collect($response);
        }
        $data = $query->get();
        $response = array("status"=>true,"data"=>$data);
        return collect($response);
    }
}