<?php
declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Libraries\Migration;

/**
 * 蔵書マスタテーブルのマイグレーション
 */
class CreateMasterBookLevelsTable extends Migration
{

    /**
     * @const テーブル物理名
     */
    const TABLE_PHYSICAL_NAME = 'm_book_levels';

    /**
     * @const テーブル論理名
     */
    const TABLE_LOGICAL_NAME = '蔵書レベルマスタ';

    /**
     * テーブルを作成
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_PHYSICAL_NAME, function (Blueprint $table) {
            $table->bigIncrements('id')->comment('蔵書レベルマスタID');
            $table->string('name', 255)->comment('蔵書レベル名');
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
