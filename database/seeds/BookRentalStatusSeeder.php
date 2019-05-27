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
        //
		BookRentalStatus::create([
		'id' => 1,
		'name'=>'test'
		]);
		
		BookRentalStatus::create([
		'id' => 2,
		'name'=>'test2'
		]);
    }
}
