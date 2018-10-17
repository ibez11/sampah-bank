<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [array(
          'amount_unit' => 2000,
          'amount_profit' => 500,
          'city_id'  => 1, //yogyakarta
          'product_id' => 1, //botol plastik
          'created_at' => Carbon::now()
        ),
        array(
          'amount_unit' => 1200,
          'amount_profit' => 500,
          'city_id'  => 1, //yogyakarta
          'product_id' => 2, //karton
          'created_at' => Carbon::now()
        ),
        array(
          'amount_unit' => 1000,
          'amount_profit' => 500,
          'city_id'  => 1, //yogyakarta
          'product_id' => 3, //HVS
          'created_at' => Carbon::now()
        ),
        array(
          'amount_unit' => 500,
          'amount_profit' => 500,
          'city_id'  => 1, //yogyakarta
          'product_id' => 4, //sampul buku
          'created_at' => Carbon::now()
        ),
        array(
          'amount_unit' => 850,
          'amount_profit' => 500,
          'city_id'  => 1, //yogyakarta
          'product_id' => 5, //koran
          'created_at' => Carbon::now()
        ),
        array(
          'amount_unit' => 2000,
          'amount_profit' => 500,
          'city_id'  => 2, //medan
          'product_id' => 1, //botol plastik,
          'created_at' => Carbon::now()
        ),
        array(
          'amount_unit' => 1200,
          'amount_profit' => 500,
          'city_id'  => 2, //medan
          'product_id' => 2, //karton
          'created_at' => Carbon::now()
        ),
        array(
          'amount_unit' => 1000,
          'amount_profit' => 500,
          'city_id'  => 2, //medan
          'product_id' => 3, //HVS
          'created_at' => Carbon::now()
        ),
        array(
          'amount_unit' => 500,
          'amount_profit' => 500,
          'city_id'  => 2, //medan
          'product_id' => 4, //sampul buku
          'created_at' => Carbon::now()
        ),
        array(
          'amount_unit' => 850,
          'amount_profit' => 500,
          'city_id'  => 2, //medan
          'product_id' => 5, //koran
          'created_at' => Carbon::now()
        ),
        array(
          'amount_unit' => 2000,
          'amount_profit' => 500,
          'city_id'  => 3, //pekanbaru
          'product_id' => 1, //botol plastik,
          'created_at' => Carbon::now()
        ),
        array(
          'amount_unit' => 1200,
          'amount_profit' => 500,
          'city_id'  => 3, //pekanbaru
          'product_id' => 2, //karton
          'created_at' => Carbon::now()
        ),
        array(
          'amount_unit' => 1000,
          'amount_profit' => 500,
          'city_id'  => 3, //pekanbaru
          'product_id' => 3, //HVS
          'created_at' => Carbon::now()
        ),
        array(
          'amount_unit' => 500,
          'amount_profit' => 500,
          'city_id'  => 3, //pekanbaru
          'product_id' => 4, //sampul buku
          'created_at' => Carbon::now()
        ),
        array(
          'amount_unit' => 850,
          'amount_profit' => 500,
          'city_id'  => 3, //pekanbaru
          'product_id' => 5, //koran
          'created_at' => Carbon::now()
        ),
        
       ];

        foreach ($settings as $setting) {
          DB::table('settings')->insert($setting);
        }
    }
}
