<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DonationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $donations = [array(
            'amount_unit'=> 500000,
            'message'=> 'Untuk sekolah saja',
            'customer_id'=> 1,
            'transaction_date'=> Carbon::now()
        ),array(
            'amount_unit'=> 300000,
            'message'=> 'Untuk rumah sakit saja',
            'customer_id'=> 2,
            'transaction_date'=> Carbon::now()
        ),array(
            'amount_unit'=> 200000,
            'message'=> 'Untuk rumah jompo saja',
            'customer_id'=> 3,
            'transaction_date'=> Carbon::now()
        ),array(
            'amount_unit'=> 150000,
            'message'=> 'Untuk iseng saja',
            'customer_id'=> 1,
            'transaction_date'=> Carbon::now()
        )];

        foreach ($donations as $donation) {
            DB::table('donations')->insert($donation);
        }
    }
}
