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

class BookGenre extends Model
{

    /**
     * テーブルの物理名
     *
     * @var string
     */
    protected $table = 'm_book_genres';

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

    public function deleteBookGenre(int $id){
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

}