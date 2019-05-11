<?php

use Faker\Generator as Faker;
use App\Models\Transactions\BookOwner;

$factory->define(BookOwner::class, function (Faker $faker) {
    static $number = 1;
    $result = [
        'm_book_id' => $number,
        'm_user_id' => $number,
        'created_at' => $faker->date,
        'updated_at' => null,
        'deleted_at' => null,
    ];
    $number++;
    return $result;
}, 'デフォルト');