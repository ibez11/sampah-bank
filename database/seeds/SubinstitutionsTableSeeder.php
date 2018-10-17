<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SubinstitutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subinstitutions = array(
            array(
                'name' => 'Teknik Elektro',
                'description' => 'Desc 1',
                'institution_id' => 1,
                'created_at' => Carbon::now()
            ),
            array(
                'name' => 'Teknik Fisika',
                'description' => 'Desc 2',
                'institution_id' => 1,
                'created_at' => Carbon::now()
            ),
            array(
                'name' => 'Teknik Geologi',
                'description' => 'Desc 3',
                'institution_id' => 1,
                'created_at' => Carbon::now()
            ),
            array(
                'name' => 'Kelas A',
                'description' => 'Desc 1',
                'institution_id' => 3,
                'created_at' => Carbon::now()
            ),
            array(
                'name' => 'Kelas B',
                'description' => 'Desc 2',
                'institution_id' => 3,
                'created_at' => Carbon::now()
            ),
            array(
                'name' => 'Kelas C',
                'description' => 'Desc 3',
                'institution_id' => 3,
                'created_at' => Carbon::now()
            )
            );
            DB::table('subinstitutions')->insert($subinstitutions);

    }
}
