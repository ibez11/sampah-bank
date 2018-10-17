<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = array(
            array(
                'jenis_barang' => 'Botol Plastik',
                'created_at' => Carbon::now()
            ),
            array(
                'jenis_barang' => 'Karton',
                'created_at' => Carbon::now()
            ),
            array(
                'jenis_barang' => 'HVS',
                'created_at' => Carbon::now()
            ),
            array(
                'jenis_barang' => 'Sampul Buku',
                'created_at' => Carbon::now()
            ),
            array(
                'jenis_barang' => 'Koran',
                'created_at' => Carbon::now()
            )
        );

        DB::table('products')->insert($products);
    }
}
