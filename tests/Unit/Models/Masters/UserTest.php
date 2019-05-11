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
     * @var User テスト対象クラス
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
     * 対象メソッド：getUserById
     * @test
     */
    public function 主キーを指定して1件のユーザ情報を取得できること()
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

    /**
     * 対象メソッド：getUserById
     * @test
     */
    public function 存在しない主キーを指定してユーザ情報を取得できないこと()
    {
        // テストデータを準備
        $seederName = 'UserSeeder';
        User::truncate();
        $this->seed($seederName);

        // テスト対象メソッドを実行
        $id = 11;
        $actuarl = $this->testee->getUserById($id);

        // 検証
        $this->assertEmpty(0, $actuarl);
    }
}
