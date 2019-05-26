<?php
declare(strict_types=1);

namespace App;

use App\Models\Model;
use Illuminate\Support\Collection;
use Log;
use Exception;

/**
 * 蔵書ジャンルモデル
 *
 * @package App\Models\Masters
 */
class BookGenre extends Model
{

    /**
     * テーブルの物理名
     *
     * @var string
     */
    protected $table = 'm_book_genres';

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
}
