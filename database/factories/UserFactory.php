<?php
declare(strict_types=1);

use Faker\Generator as Faker;
use App\Models\Masters\User;

$factory->define(User::class, function (Faker $faker) {
    static $number = 1;
    $result = [
        'last_name' => 'last_name' . $number,
        'last_name_kana' => 'last_name_kana' . $number,
        'first_name' => 'first_name' . $number,
        'first_name_kana' => 'first_name_kana' . $number,
        'email_address' => 'email_address' . $number,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
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