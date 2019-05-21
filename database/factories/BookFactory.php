<?php

use Faker\Generator as Faker;
use App\Models\Masters\Book;

$factory->define(Book::class, function (Faker $faker) {
    static $number = 1;
    $result = [
        'm_book_level_id' => $number,
        'm_book_genre_id' => $number,
        'name' => 'テストデータ'.$number,
        'isbn_code' => '000000000',
        'published_at' => null,
        'created_at' => $faker->date,
        'updated_at' => null,
        'deleted_at' => null,
    ];
    $number++;
    return $result;
}, 'デフォルト');