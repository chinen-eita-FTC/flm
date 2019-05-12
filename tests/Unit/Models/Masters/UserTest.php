<?php
declare(strict_types=1);

namespace Tests\Unit\Models\Masters;

use Tests\Unit\Models\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Masters\User;
use App\Models\Masters\UserRole;

/**
 * ユーザーモデルのテスト
 *
 * @package Tests\Unit\Models\Masters
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
    public function 存在する主キーを指定して1件のユーザ情報を取得できること()
    {
        // テストデータを準備
        $factoryKey = 'デフォルト';
        $seedingCount = 10;
        User::truncate();
        $this->seed(
            User::class,
            $factoryKey,
            $seedingCount
        );

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
        $factoryKey = 'デフォルト';
        $seedingCount = 10;
        User::truncate();
        $this->seed(
            User::class,
            $factoryKey,
            $seedingCount
        );

        // テスト対象メソッドを実行
        $id = 11;
        $actuarl = $this->testee->getUserById($id);

        // 検証
        $this->assertEmpty(0, $actuarl);
    }

    /**
     * 対象メソッド：getUserById
     * @test
     */
     public function ユーザ情報マスタのユーザ権限情報マスタIDが2のときユーザ権限情報マスタの主キーが2であること()
     {
        // テストデータを準備
        // ユーザ情報マスタの登録
        $factoryKey = 'ユーザ権限マスタとのリレーションテスト';
        $seedingCount = 10;
        User::truncate();
        $this->seed(
            User::class,
            $factoryKey,
            $seedingCount
        );

        // テストデータを準備
        // ユーザ権限情報マスタの登録
        $factoryKey = 'デフォルト';
        $seedingCount = 3;
        UserRole::truncate();
        $this->seed(
            UserRole::class,
            $factoryKey,
            $seedingCount
        );
 
         // テスト対象メソッドを実行
         $id = 1;
         $actuarl = $this->testee->getUserById($id);

         // 検証
         $this->assertSame(1, $actuarl->get('id'));
         $this->assertSame(2, $actuarl->get('m_user_role_id'));
         $this->assertSame(2, $actuarl->get('user_role')['id']);
     }
}
