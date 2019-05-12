<?php
declare(strict_types=1);

namespace App\Models\Masters;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Model;
use Illuminate\Support\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Models\Masters\UserRole;

/**
 * ユーザーモデル
 *
 * @package App\Models\Masters
 */
class User extends Authenticatable
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
    
    public function isAdministrator()
    {
        if( isset($this->userRole) && $this->userRole->id === config('auth.guards.administrator.userRoleId')){
            return true;
        }
        return false;
    }

    /**
     * ユーザーと1:1で対応するユーザ権限情報を取得
     */
     public function userRole()
     {
         return $this->hasOne(UserRole::class, 'id', 'm_user_role_id');
     }

    /**
     * 主キーを指定してユーザー情報を検索
     *
     * @param int $id 主キー
     * @return Collection 1件のユーザ情報をラップしたコレクションオブジェクト
     */
    public function getUserById(int $id) : Collection
    {
        $result = $this->with('userRole')->where('id', $id)->first();
        if(is_null($result)){
            return collect([]);
        }
        return collect($result->toArray());
    }
}