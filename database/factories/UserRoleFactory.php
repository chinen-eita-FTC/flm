<?php
declare(strict_types=1);

use Faker\Generator as Faker;
use App\Models\Masters\UserRole;

$factory->define(UserRole::class, function (Faker $faker) {
    static $number = 1;
    $result = [
        'name' => 'name' . $number,
        'created_at' => $faker->date,
        'updated_at' => null,
        'deleted_at' => null,
    ];
    $number++;
    return $result;
}, 'デフォルト');