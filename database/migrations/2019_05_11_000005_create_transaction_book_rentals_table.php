<?php
declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Libraries\Migration;

/**
 * 貸出情報トランザクションテーブルのマイグレーション
 */
class CreateTransactionBookRentalsTable extends Migration
{

    /**
     * @const テーブル物理名
     */
    const TABLE_PHYSICAL_NAME = 't_book_rentals';

    /**
     * @const テーブル論理名
     */
    const TABLE_LOGICAL_NAME = '貸出情報トランザクション';

    /**
     * テーブルを作成
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_PHYSICAL_NAME, function (Blueprint $table) {
            $table->bigIncrements('id')->comment('蔵書貸出情報トランザクションID');
            $table->bigInteger('m_book_id')->unsigned()->comment('蔵書マスタID');
            $table->bigInteger('m_user_id')->unsigned()->comment('ユーザーマスタID');
            $table->bigInteger('m_book_rental_status_id')->unsigned()->comment('蔵書貸出情報ステータスマスタID');
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
