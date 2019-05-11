<?php
declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Libraries\Migration;

/**
 * 蔵書マスタテーブルのマイグレーション
 */
class CreateMasterUsersTable extends Migration
{

    /**
     * @const テーブル物理名
     */
    const TABLE_PHYSICAL_NAME = 'm_users';

    /**
     * @const テーブル論理名
     */
    const TABLE_LOGICAL_NAME = 'ユーザーマスタ';

    /**
     * テーブルを作成
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_PHYSICAL_NAME, function (Blueprint $table) {
            $table->increments('id')->comment('ユーザーマスタID');
            $table->bigInteger('m_user_role_id')->unsigned()->comment('ユーザー権限マスタID');
            $table->string('last_name')->comment('ユーザー姓');
            $table->string('last_name_kana')->comment('ユーザー姓(セイ)');
            $table->string('first_name')->comment('ユーザー名');
            $table->string('first_name_kana')->comment('ユーザー名(メイ)');
            $table->string('email_address')->unique()->comment('メールアドレス');
            $table->string('password')->comment('パスワード');
            $table->timestamp('password_created_at')->comment('パスワード登録日時');
            $table->timestamp('password_updated_at')->nullable()->comment('パスワード更新日時');
            $table->rememberToken()->comment('リメンバートークン');
            $table->timestamp('created_at')->useCurrent()->comment('登録日時');
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
