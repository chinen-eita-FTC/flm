<?php
declare(strict_types=1);

namespace Database\Seeds\Unit\Models;

use Illuminate\Database\Seeder as BaseSeeder;

class Seeder extends BaseSeeder
{

    /**
     * テストデータを登録
     *
     * @param string $modelClassPath シーディング対象のモデルパス
     * @param string $factoryKey シーディング時に使用するファクトリのキー
     * @param string $count 作成するレコード数
     * @return void
     */
    public function run(
        string $modelClassPath,
        string $factoryKey,
        int $count
    ) {
        $results = factory(
            $modelClassPath,
            $factoryKey,
            $count
        )->create();
        foreach($results as $result){
            $result->save();
        }        
    }
}
