<?php
declare(strict_types=1);

namespace Tests\Unit\Models;

use Tests\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

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
    }


    /**
     * シーダークラスを指定して実行
     * 
     * @param string $className シーダークラス名
     * @return void
     */
    public function seed(string $className)
    {
        Artisan::call('db:seed', [
            '--class' => $className
        ]);
    }
}
