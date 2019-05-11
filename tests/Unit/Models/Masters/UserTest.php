<?php
declare(strict_types=1);

namespace Tests\Unit\Models\Masters;

use Tests\Unit\Models\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Masters\User;

/**
 * ユーザーモデルのテスト
 *
 * @package Tests\Unit\Masters\Models
 */
class UserTest extends TestCase
{

    /**
     * テスト対象のクラス
     *
     * @var User
     */
    private $testee;

    /**
     * 初期処理
     */
    public function setUp()
    {
        parent::setUp();
        $this->testee = app()->make(User::class);
    }

    /**
     * A basic test example.
     *
     * @test
     */
    public function testExample()
    {
        // テストデータを準備
        $seederName = 'UserSeeder';
        User::truncate();
        $this->seed($seederName);

        // テスト対象メソッドを実行
        $id = 1;
        $actuarl = $this->testee->getUserById($id);

        // 検証
        $this->assertSame(1, $actuarl->get('id'));
    }
}
