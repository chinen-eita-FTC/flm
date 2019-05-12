<?php
declare(strict_types=1);

namespace App\Models\Masters;

use App\Models\Model;
use Illuminate\Support\Collection;

/**
 * ユーザー権限モデル
 *
 * @package App\Models\Masters
 */
class UserRole extends Model
{

    /**
     * テーブルの物理名
     *
     * @var string
     */
    protected $table = 'm_user_roles';

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
     * 主キーを指定してユーザー権限を検索
     *
     * @param int $id 主キー
     * @return Collection 1件のユーザー権限をラップしたコレクションオブジェクト
     */
    public function getUserRoleById(int $id) : Collection
    {
        $result = $this->find($id);
        if(is_null($result)){
            return collect([]);
        }
        return collect($result->toArray());
    }
}