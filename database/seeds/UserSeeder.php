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
        $results = factory(
            User::class,
            $this->factoryKey,
            $this->count
        )->create();
        foreach($results as $result){
            $result->save();
        }        
    }
}
