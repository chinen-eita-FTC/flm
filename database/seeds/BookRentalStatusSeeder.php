<?php

use Illuminate\Database\Seeder;
use App\Models\Masters\BookRentalStatus;
//use Faker\Factory as Faker;

class BookRentalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(BookRentalStatus::class,50)->create();
    }
}
