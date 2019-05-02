<?php
declare(strict_types=1);

namespace App\Models;

/**
 * ユーザーモデル
 *
 * @package App\Models
 */
class User extends Model
{
    use Notifiable;

    /**
     * 意図しないデータの更新を防ぎたいカラム群
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * モデルを配列/JSON変換するときに隠蔽されるカラム軍
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
