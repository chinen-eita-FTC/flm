<?php
declare(strict_types=1);

namespace App\Libraries;

use Illuminate\Database\Migrations\Migration as BaseMigration;
use Illuminate\Support\Facades\DB;

/**
 * マイグレーションクラスをラップしたクラス
 *
 * @package App\Libraries
 */
class Migration extends BaseMigration
{

    /**
     * テーブルに論理名を追加する
     *
     * @return void
     */
    public function addTableComment(string $physicalName, string $logicalName)
    {
        $statement = sprintf(
            "ALTER TABLE %s COMMENT '%s'",
            $physicalName,
            $logicalName
        );
        DB::statement($statement);
    }
}