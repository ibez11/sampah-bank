<?php

use Illuminate\Database\Seeder;

class ReligionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $religions = array(
        'Buddha', 'Hindu', 'Islam', 'Katolik', 'Kristen', 'Konghucu'
      );

      foreach ($religions as $religion) {
        DB::table('religions')->insert(array(
          'religion' =>$religion
        ));
      }
    }
}
