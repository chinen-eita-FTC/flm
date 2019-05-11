<?php
declare(strict_types=1);

namespace App\Models\Transactions;

use App\Models\Model;
use Illuminate\Support\Collection;

/**
 * 書籍所有者モデル
 *
 * @package App\Models\Transactions
 */
class BookOwner extends Model
{

    /**
     * テーブルの物理名
     *
     * @var string
     */
    protected $table = 't_book_owners';

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
     * 主キーを指定して書籍所有者を検索
     *
     * @param int $id 主キー
     * @return Collection 1件の書籍所有者をラップしたコレクションオブジェクト
     */
    public function getBookOwnerById(int $id) : Collection
    {
        $result = $this->find($id);
        if(is_null($result)){
            return collect([]);
        }
        return collect($result->toArray());
    }
}