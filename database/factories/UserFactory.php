<?php
declare(strict_types=1);

use Faker\Generator as Faker;
use App\Models\Masters\User;

$factory->define(User::class, function (Faker $faker) {
    static $number = 1;
    $result = [
        'm_user_role_id' => $faker->numberBetween(1, 2),
        'last_name' => 'last_name' . $number,
        'last_name_kana' => 'last_name_kana' . $number,
        'first_name' => 'first_name' . $number,
        'first_name_kana' => 'first_name_kana' . $number,
        'email_address' => 'email_address' . $number,
        'password' => bcrypt('sample'),
        'password_created_at' => $faker->date,
        'password_updated_at' => $faker->date,
        'remember_token' => str_random(10),
        'created_at' => $faker->date,
        'updated_at' => null,
        'deleted_at' => null,
    ];
    $number++;
    return $result;
}, 'デフォルト');

$factory->define(User::class, function (Faker $faker) {
    static $number = 1;
    $result = [
        'm_user_role_id' => 2,
        'last_name' => 'last_name' . $number,
        'last_name_kana' => 'last_name_kana' . $number,
        'first_name' => 'first_name' . $number,
        'first_name_kana' => 'first_name_kana' . $number,
        'email_address' => 'email_address' . $number,
        'password' => bcrypt('sample'),
        'password_created_at' => $faker->date,
        'password_updated_at' => $faker->date,
        'remember_token' => str_random(10),
        'created_at' => $faker->date,
        'updated_at' => null,
        'deleted_at' => null,
    ];
    $number++;
    return $result;
}, 'ユーザ権限マスタとのリレーションテスト');