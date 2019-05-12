<?php
declare(strict_types=1);

namespace Tests\Unit\Models;

use Tests\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;
use Database\Seeds\Unit\Models\Seeder;
use Illuminate\Support\Facades\Schema;

/**
 * モデルテストの基底クラス
 *
 * @package Tests\Unit\Models
 */
abstract class TestCase extends BaseTestCase
{

    /**
     * 初期処理
     */
    public function setUp()
    {
        parent::setUp();
        $this->reset();
        Schema::disableForeignKeyConstraints();
    }

    /**
     * 後処理
     */
    public function tearDown()
    {
        Schema::enableForeignKeyConstraints();
        parent::tearDown();
    }

    /**
     * ダミーデータのシーディングを行う
     * 
     * @param string $modelClassPath シーディング対象のモデルパス
     * @param string $factoryKey シーディング時に使用するファクトリのキー
     * @param string $count 作成するレコード数
     * @return void
     */
    public function seed(
        string $modelClassPath,
        string $factoryKey,
        int $count
    ) {
        app()->make(Seeder::class)->run($modelClassPath, $factoryKey, $count);
    }

    public function reset()
    {
        Artisan::call('migrate:refresh');
        sleep(2);
    }
}
