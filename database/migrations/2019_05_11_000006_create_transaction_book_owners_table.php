<?php
declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Libraries\Migration;

/**
 * 書籍所有者トランザクションテーブルのマイグレーション
 */
class CreateTransactionBookOwnersTable extends Migration
{

    /**
     * @const テーブル物理名
     */
    const TABLE_PHYSICAL_NAME = 't_book_owners';

    /**
     * @const テーブル論理名
     */
    const TABLE_LOGICAL_NAME = '蔵書所有者トランザクション';
    
    /**
     * テーブルを作成
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_PHYSICAL_NAME, function (Blueprint $table) {
            $table->bigIncrements('id')->comment('蔵書所有者トランザクションID');
            $table->bigInteger('m_book_id')->unsigned()->comment('蔵書マスタID');
            $table->integer('m_user_id')->unsigned()->nullable()->comment('ユーザーマスタID');
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
