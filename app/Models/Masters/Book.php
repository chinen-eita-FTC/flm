<?php
declare(strict_types=1);

namespace App\Models\Masters;

use App\Models\Model;
use Exception;
use Illuminate\Support\Collection;
use Log;
use App\Models\Masters\BookGenre;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * 蔵書モデル
 *
 * @package App\Models\Masters
 */
class Book extends Model
{

    /**
     * テーブルの物理名
     *
     * @var string
     */
    protected $table = 'm_books';

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

    /**
     * Carbonインスタンスに変換するカラム群
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'published_at',
    ];

    /**
     * 蔵書ジャンルモデルと1:1でリレーション
     *
     * @return HasOne
     */
    public function bookGenre(): HasOne
    {
        return $this->hasOne(BookGenre::class, 'id', 'm_book_genre_id');
    }

    /**
     * 任意の値に応じて複数件の蔵書モデルを取得
     *
     * @param Collection $input 主キー
     * @return Collection
     */
    public function getBooks(Collection $input): Collection
    {
        try {
            // Eagger Loading の実行
            $query = $this->with('bookGenre');
            if($input->has('name')){
                $query->where('name', 'LIKE', "%".$input->get('name')."%");
            }
            if($input->has('m_book_genre_id') && $input->get('m_book_genre_id') !== 0){
                $query->where('m_book_genre_id', $input->get('m_book_genre_id'));
            }
            return $query->get();
        } catch (Exception $e) {
            // TODO [v1.0|機能追加] 例外処理の送出方法の決定後に削除時の例外処理の追加すること 
        }
    }

    /**
     * 主キーを指定して蔵書情報を削除
     *
     * @param int $id 主キー
     * @return Collection
     */
    public function deleteBook(int $id): Collection
    {
        $response['status'] = false;
        try {
            $target = $this->find($id);
            $deleted = $target->delete();
            $response['status'] = $deleted;
            return collect($response);
        } catch (Exception $e) {
            // TODO [v1.0|機能追加] 例外処理の送出方法の決定後に削除時の例外処理の追加すること 
        }
    }

    /**
     * 蔵書マスタデータの1件新規登録
     *
     * @param array $input 蔵書マスタデータを登録
     * @return Collection 登録した蔵書マスタデータをラップしたコレクションオブジェクト
     */
    public function createBook(array $input)
    {
        try {
            $created = $this->create($input);
            return collect($created->toArray());
        } catch (Exception $e) {
            // TODO [v1.0|機能追加] 例外処理の送出方法の決定後に削除時の例外処理の追加すること
            return collect([]);
        }
    }

    /**
     * 主キーを指定して任意の蔵書マスタを1件更新できること
     *
     * @param array $input
     * @return Collection 登録した蔵書マスタデータをラップしたコレクションオブジェクト
     */
    public function updateBook(array $input)
    {
        $response['status'] = false;
        try {
            $target = $this->find($input['id']);
            $updated = $target->fill($input)->update();
            $response['status'] = $updated;
            return collect($response);
        } catch (Exception $e) {
            // TODO [v1.0|機能追加] 例外処理の送出方法の決定後に削除時の例外処理の追加すること
            return collect([]);
        }
    }
}
