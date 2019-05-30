<?php

use Faker\Generator as Faker;
use App\Models\Masters\BookRentalStatus;

$factory->define(BookRentalStatus::class, function (Faker $faker) {
    return [
        //'id'=>$faker->id,
		'name'=>$faker->name
    ];
});
