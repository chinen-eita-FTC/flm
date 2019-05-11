<?php
declare(strict_types=1);

namespace Tests\Unit\Models\Masters;

use Tests\Unit\Models\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Masters\UserRole;

/**
 * ユーザー権限モデルのテスト
 *
 * @package Tests\Unit\Models\Masters
 */
class UserRoleTest extends TestCase
{

    /**
     * @var UserRole テスト対象クラス
     */
    private $testee;

    /**
     * 初期処理
     */
    public function setUp()
    {
        parent::setUp();
        $this->testee = app()->make(UserRole::class);
    }

    /**
     * 対象メソッド：getUserRoleById
     * @test
     */
    public function 存在する主キーを指定して1件のユーザ情報を取得できること()
    {
        // テストデータを準備
        $seederName = 'UserRoleSeeder';
        UserRole::truncate();
        $this->seed($seederName);

        // テスト対象メソッドを実行
        $id = 1;
        $actuarl = $this->testee->getUserRoleById($id);

        // 検証
        $this->assertSame(1, $actuarl->get('id'));
    }

    /**
     * 対象メソッド：getUserRoleById
     * @test
     */
    public function 存在しない主キーを指定してユーザ情報を取得できないこと()
    {
        // テストデータを準備
        $seederName = 'UserRoleSeeder';
        UserRole::truncate();
        $this->seed($seederName);

        // テスト対象メソッドを実行
        $id = 11;
        $actuarl = $this->testee->getUserRoleById($id);

        // 検証
        $this->assertEmpty(0, $actuarl);
    }
}
