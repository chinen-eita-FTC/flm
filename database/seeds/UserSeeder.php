<?php
declare(strict_types=1);

use Illuminate\Database\Seeder;
use App\Models\Masters\User;

class UserSeeder extends Seeder
{

    /**
     * @var int ダミーデータ
     */
    private $count = 10;

    /**
     * @var string ファクトリーのキー
     */
    private $factoryKey = 'デフォルト';

    /**
     * テストデータを登録
     *
     * @return void
     */
    public function run()
    {
        $users = factory(
            User::class,
            $this->factoryKey,
            $this->count
        )->create();
        foreach($users as $user){
            $user->save();
        }
    }
}
