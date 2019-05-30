<?php

use Illuminate\Database\Seeder;

class BookRentalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		factory(BookRentalStatus::class,10)->create();
    }
}
