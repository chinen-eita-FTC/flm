<?php
declare(strict_types=1);

namespace Tests\Unit\Models\Masters;

use Tests\Unit\Models\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Masters\Book;

/**
 * 蔵書モデルのテスト
 *
 * @package Tests\Unit\Models\Masters
 */
class BookLvelTest extends TestCase
{

    /**
     * @var BookLevel テスト対象クラス
     */
    private $testee;

    /**
     * 初期処理
     */
    public function setUp()
    {
        parent::setUp();
        $this->testee = app()->make(BookLevel::class);
    }

    /**
     * @test
     */



    }
}
