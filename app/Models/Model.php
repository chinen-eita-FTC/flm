<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;


/**
 * Eloquentモデルクラスを本アプリケーション向けにラップしたモデルの基底クラス
 *
 * @package App\Models
 */
class Model extends BaseModel
{

    /**
     * 初期処理
     *
     * @param array $attributes ミューテター
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
