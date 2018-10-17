<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InstitutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $institutions = array(
            array(
                'name' => 'Universitas Gadjah Mada',
                'description' => 'Desc 1',
                'address' => 'Address 1',
                'phone' => '0274-1111111',
                'created_at' => Carbon::now()
            ),
            array(
                'name' => 'KFC Sudirman',
                'description' => 'Desc 2',
                'address' => 'Address 2',
                'phone' => '0274-222222',
                'created_at' => Carbon::now()
            ),
            array(
                'name' => 'SD Budi Luhur',
                'description' => 'Desc 3',
                'address' => 'Address 3',
                'phone' => '0274-333333',
                'created_at' => Carbon::now()
            )
            );
            DB::table('institutions')->insert($institutions);

    }
}
