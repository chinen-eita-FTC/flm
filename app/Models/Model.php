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
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
}
