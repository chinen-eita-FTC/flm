<?php
declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Libraries\Migration;

/**
 * 蔵書貸出情報ステータスマスタテーブルのマイグレーション
 */
class CreateMasterBookRentalStatusesTable extends Migration
{

    /**
     * @const テーブル物理名
     */
    const TABLE_PHYSICAL_NAME = 'm_book_rental_statuses';

    /**
     * @const テーブル論理名
     */
    const TABLE_LOGICAL_NAME = '蔵書貸出情報ステータスマスタ';

    /**
     * テーブルを作成
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_PHYSICAL_NAME, function (Blueprint $table) {
            $table->bigIncrements('id')->comment('蔵書貸出情報ステータスマスタID');
            $table->string('name', 100)->comment('蔵書貸出情報ステータス名');
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
