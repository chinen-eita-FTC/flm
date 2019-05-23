<?php
declare(strict_types=1);

namespace App\Models\Masters;

use App\Models\Model;
use Illuminate\Support\Collection;
use Log;
use Exception;

/**
 * 蔵書モデル
 *
 * @package App\Models\Masters
 */
class Book extends Model
{

    /**
     * テーブルの物理名
     *
     * @var string
     */
    protected $table = 'm_books';

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
     * 主キーを指定して蔵書情報を削除
     * 
     * @param int $id 主キー
     * @return Collection
     */
    public function deleteBook(int $id):Collection
    {
        $response['status'] = false;
        try{
            $target = $this->find($id);
            $deleted = $target->delete();
            $response['status'] = $deleted;
            return collect($response);
        } catch (Exception $e) {
            // TODO [v1.0|機能追加] 例外処理の送出方法の決定後に削除時の例外処理の追加すること 
	}

    }

        public function createBook(array $collection)
    {
        //outが規約でcollectionである
        $response['status'] = false;
        try{
            //受け取った配列で、createメソッドを実行する
            $insert = $this::create($collection);
            //成功したら、書き換えて
            $response['status'] = true ;
            //true返す
            return collect($response);
        } catch (Exception $e) {
            // TODO [v1.0|機能追加] 例外処理の送出方法の決定後に削除時の例外処理の追加すること
            return collect($response);
        }

    }

    public function getBook(int $id)
    {
        //outが規約でcollectionである
        $response['status'] = false;
        try{
            //受け取った配列で、createメソッドを実行する
            $get = $this::find($id);
            //成功したら、書き換えて
            $response['status'] = true ;
            //true返す
            return collect($response);
        } catch (Exception $e) {
            // TODO [v1.0|機能追加] 例外処理の送出方法の決定後に削除時の例外処理の追加すること
            return collect($response);
        }

    }

    public function getAllBook()
    {
        //outが規約でcollectionである
        $response['status'] = false;
        try{
            //受け取った配列で、createメソッドを実行する
            $all = $this::all();
            //成功したら、書き換えて
            $response['status'] = true ;
            //true返す
            return collect($response);
        } catch (Exception $e) {
            // TODO [v1.0|機能追加] 例外処理の送出方法の決定後に削除時の例外処理の追加すること
            return collect($response);
        }

    }
}
