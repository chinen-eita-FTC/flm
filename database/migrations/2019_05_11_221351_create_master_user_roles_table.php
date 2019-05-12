<?php
declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Libraries\Migration;

/**
 * ユーザー権限マスタテーブルのマイグレーション
 */
class CreateMasterUserRolesTable extends Migration
{

    /**
     * @const テーブル物理名
     */
     const TABLE_PHYSICAL_NAME = 'm_user_roles';

     /**
      * @const テーブル論理名
      */
     const TABLE_LOGICAL_NAME = 'ユーザー権限マスタ';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_PHYSICAL_NAME, function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ユーザー権限マスタID');
            $table->string('name', 100)->comment('ユーザー権限名');
            $table->timestamp('created_at')->comment('登録日時');
            $table->timestamp('updated_at')->nullable()->comment('更新日時');
            $table->timestamp('deleted_at')->nullable()->comment('削除日時');
        });
        $this->addTableComment(self::TABLE_PHYSICAL_NAME, self::TABLE_LOGICAL_NAME);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::TABLE_PHYSICAL_NAME);
    }
}
