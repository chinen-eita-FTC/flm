<?php
declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 外部キー制約専用のマイグレーション
 */
class CreateForeignKeys extends Migration
{
    /**
     * 外部キー付与
     *
     * @return void
     */
    public function up()
    {
        // ユーザー情報マスタ
        Schema::table('m_users', function (Blueprint $table) {
            // ユーザー情報マスタ　:　ユーザー権限情報マスタ
            $table->foreign('m_user_role_id')
            ->references('id')
            ->on('m_user_roles')
            ->onDelete('cascade');
        });

        // 蔵書情報マスタ
        Schema::table('m_books', function (Blueprint $table) {
            // 蔵書情報マスタ　:　蔵書レベル情報マスタ
            $table->foreign('m_book_level_id')
            ->references('id')
            ->on('m_book_levels')
            ->onDelete('cascade');
            // 蔵書情報マスタ　:　蔵書ジャンル情報マスタ
            $table->foreign('m_book_genre_id')
            ->references('id')
            ->on('m_book_genres')
            ->onDelete('cascade');
        });

        // 貸出情報トランザクション
        Schema::table('t_book_rentals', function (Blueprint $table) {
            // 貸出情報トランザクション　:　蔵書情報マスタ
            $table->foreign('m_book_id')
            ->references('id')
            ->on('m_books')
            ->onDelete('cascade');
            // 貸出情報トランザクション　:　ユーザー情報マスタ
            $table->foreign('m_user_id')
            ->references('id')
            ->on('m_users')
            ->onDelete('cascade');
        });

        // 蔵書所有者情報トランザクション
        Schema::table('t_book_owners', function (Blueprint $table) {
            // 蔵書所有者情報トランザクション　:　蔵書情報マスタ
            $table->foreign('m_book_id')
            ->references('id')
            ->on('m_books')
            ->onDelete('cascade');
            // 蔵書所有者情報トランザクション　:　ユーザー情報マスタ
            $table->foreign('m_user_id')
            ->references('id')
            ->on('m_users')
            ->onDelete('cascade');
        });
    }

    /**
     * 外部キー削除
     *
     * @return void
     */
    public function down()
    {
        // ユーザー情報マスタ
        Schema::table('m_users', function (Blueprint $table) {
            // ユーザー情報マスタ　:　ユーザー権限情報マスタ
            $table->dropForeign('m_users_m_user_role_id_foreign');
        });

        // 蔵書情報マスタ
        Schema::table('m_books', function (Blueprint $table) {
            // 蔵書情報マスタ　:　蔵書レベル情報マスタ
            $table->dropForeign('m_books_m_book_level_id_foreign');
            // 蔵書情報マスタ　:　蔵書ジャンル情報マスタ
            $table->dropForeign('m_books_m_book_genre_id_foreign');
        });

        // 貸出情報トランザクション
        Schema::table('t_book_rentals', function (Blueprint $table) {
            // 貸出情報トランザクション　:　蔵書情報マスタ
            $table->dropForeign('t_book_rentals_m_book_id_foreign');
            // 貸出情報トランザクション　:　ユーザー情報マスタ
            $table->dropForeign('t_book_rentals_m_user_id_foreign');
        });

        // 蔵書所有者情報トランザクション
        Schema::table('t_book_owners', function (Blueprint $table) {
            // 蔵書所有者情報トランザクション　:　蔵書情報マスタ
            $table->dropForeign('t_book_owners_m_book_id_foreign');
            // 蔵書所有者情報トランザクション　:　ユーザー情報マスタ
            $table->dropForeign('t_book_owners_m_user_id_foreign');
        });
    }
}
