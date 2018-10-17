<?php

use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $transactions = [array(
        'is_debit' => 1,
        'amount_kg' => 5,
        'amount_unit' => 1000,
        'amount_money' => 5000,
        'amount_profit' => 2500,
        'amount_used' => 0,
        'city'  => 'Yogyakarta',
        'product' => 'Botol Plastik',
        'user_id' => 1,
        'created_at' => '2017/08/30 13:00'
      ), array(
        'is_debit' => 1,
        'amount_kg' => 5,
        'amount_unit' => 1000,
        'amount_money' => 5000,
        'amount_profit' => 2500,
        'amount_used' => 0,
        'city'  => 'Medan',
        'product' => 'Botol Plastik',
        'user_id' => 1,
        'created_at' => '2017/08/30 13:10'
      ), array(
        'is_debit' => 1,
        'amount_kg' => 5,
        'amount_unit' => 1000,
        'amount_money' => 5000,
        'amount_profit' => 2500,
        'amount_used' => 0,
        'city'  => 'Medan',
        'product' => 'HVS',
        'user_id' => 1,
        'created_at' => '2017/08/30 13:15'
      )];

      foreach ($transactions as $transaction) {
        DB::table('transactions')->insert($transaction);
      }
    }
}
