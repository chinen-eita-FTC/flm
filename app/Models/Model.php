<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;
use Log;
use DB;

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

    /**
     * 基底クラスのfindメソッド使用時にクエリログを発行する処理を追加
     *
     * @param int $id 主キー
     * @return Model|Null
     */
    public function find(int $id): ?Model
    {
        DB::enableQueryLog();
        $result = parent::find($id);
        Log::info('クエリ発行対象テーブル名：'.$this->table);
        Log::info('クエリ発行内容：', DB::getQueryLog());
        return $result;
    }
}
