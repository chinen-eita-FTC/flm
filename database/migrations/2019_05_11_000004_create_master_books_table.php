<?php
declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Libraries\Migration;

/**
 * 蔵書マスタテーブルのマイグレーション
 *
 */
class CreateMasterBooksTable extends Migration
{

    /**
     * @const テーブル物理名
     */
    const TABLE_PHYSICAL_NAME = 'm_books';

    /**
     * @const テーブル論理名
     */
    const TABLE_LOGICAL_NAME = '蔵書マスタ';

    /**
     * テーブルを作成
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_PHYSICAL_NAME, function (Blueprint $table) {
            $table->bigIncrements('id')->comment('蔵書マスタID');
            $table->bigInteger('m_book_level_id')->unsigned()->comment('蔵書レベルマスタID');
            $table->bigInteger('m_book_genre_id')->unsigned()->comment('蔵書ジャンルマスタID');
            $table->string('name', 255)->comment('蔵書名');
            $table->string('isbn_code', 30)->nullable()->comment('蔵書ISBNコード');
            $table->date('published_at')->nullable()->comment('出版年月日');
            $table->timestamp('created_at')->comment('登録日時');
            $table->timestamp('updated_at')->nullable()->comment('更新日時');
            $table->timestamp('deleted_at')->nullable()->comment('削除日時');
        });
        $this->addTableComment(self::TABLE_PHYSICAL_NAME, self::TABLE_LOGICAL_NAME);
    }

    /**
     * テーブルを削除
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::TABLE_PHYSICAL_NAME);
    }
}
