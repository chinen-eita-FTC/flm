<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

/**
 * ユーザーモデル
 *
 * @package App\Models
 */
class User extends Model
{
    use Notifiable;

    /**
     * テーブルの物理名
     *
     * @var string
     */
    protected $table = 'users';

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
}
