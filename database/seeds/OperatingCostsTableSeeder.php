<?php

use Illuminate\Database\Seeder;

class OperatingCostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $operating_costs = [array(
        'amount_unit' => 900000,
        'description' => "Bayar Tagihan Listrik",
        'transaction_date' => '2017-09-1',
      ), array(
        'amount_unit' => 500000,
        'description' => "Bayar Tagihan Internet",
        'transaction_date' => '2017-09-15',
      ), array(
        'amount_unit' => 700000,
        'description' => "Bayar Tagihan Pulsa",
        'transaction_date' => '2017-09-30',
      )];

      foreach ($operating_costs as $operating_cost) {
        DB::table('operating_costs')->insert($operating_cost);
      }
    }
}
