<?php
declare(strict_types=1);

namespace App\Models\Masters;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Model;
use Illuminate\Support\Collection;

/**
 * ユーザーモデル
 *
 * @package App\Models\Masters
 */
class User extends Model
{
    use Notifiable;

    /**
     * テーブルの物理名
     *
     * @var string
     */
    protected $table = 'm_users';

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
        'password', 'remember_token',
    ];

    /**
     * 主キーを指定してユーザー情報を検索
     *
     * @param int $id 主キー
     * @return Collection 1件のユーザ情報をラップしたコレクションオブジェクト
     */
    public function getUserById(int $id) : Collection
    {
        $result = $this->find($id);
        if(is_null($result)){
            return collect([]);
        }
        return collect($result->toArray());
    }
}