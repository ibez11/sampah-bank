<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = array(
            array(
                'city' => 'Yogyakarta',
                'minimum_balance' => 1500000,
                'created_at' => Carbon::now()
            ),
            array(
                'city' => 'Medan',
                'minimum_balance' => 1500000,
                'created_at' => Carbon::now()
            ),
            array(
                'city' => 'Pekanbaru',
                'minimum_balance' => 1500000,
                'created_at' => Carbon::now()
            )
            );
            DB::table('cities')->insert($cities);

    }
}
