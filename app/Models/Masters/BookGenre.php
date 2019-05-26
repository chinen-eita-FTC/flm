<?php
declare(strict_types=1);

namespace App\Models\Masters;

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

    /**
     * 任意の値に応じて複数件の蔵書ジャンルモデルを取得
     *
     * @param Collection $input 主キー
     * @return Collection
     */
    public function getBookGenres(Collection $input): Collection
    {
        try {
            $query = $this;
            if($input->has('name')){
                $query->where('name', 'LIKE', "%".$input->get('name')."%");
            }
            if($input->has('m_book_genre_id') && $input->get('m_book_genre_id') !== 0){
                $query->where('id', $input->get('m_book_genre_id'));
            }
            return $query->get();
        } catch (Exception $e) {
            // TODO [v1.0|機能追加] 例外処理の送出方法の決定後に削除時の例外処理の追加すること 
        }
    }
}