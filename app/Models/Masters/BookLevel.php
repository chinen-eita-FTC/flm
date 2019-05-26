<?php
declare(strict_types=1);

namespace App\Models\Masters;

use App\Models\Model;
use Illuminate\Support\Collection;
use Log;
use Exception;

/**
 * 蔵書レベルモデル
 *
 * @package App\Models\Masters
 */
class BookLevel extends Model
{

    /**
     * テーブルの物理名
     *
     * @var string
     */
    protected $table = 'm_book_levels';

    /**
     * 意図しないデータの更新を防ぎたいカラム群
     *
     * @var array
     */
    protected $guarded = [
        'id',
        'created_at',
    ];

    /**
     * モデルを配列/JSON変換するときに隠蔽されるカラム群
     *
     * @var array
     */
    protected $hidden = [

    ];
}