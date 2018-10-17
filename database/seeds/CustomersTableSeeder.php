<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('customers')->delete();

      DB::table('customers')->insert(array(
              array('identity_no' => '82828282828',
                    'fullname' => 'Ahmad Jamil Al Rasyid',
                    'birthplace' => 'Palu',
                    'birthdate' => '1996-10-07',
                    'address' => 'Jalan Magelang No.1',
                    'city' => 'Yogyakarta',
                    'customer_type' => 'organization',
                    'corporate_name' => 'Tampilin',
                    'religion_id' => 1,
                    'subinstitution_id' => 1,
                    'phone_number' => '081226836303',
                    'customerAvatar' => 'tdb.png',
                    'created_at' => Carbon::now(),
                    'updated_at'  => Carbon::now()
                  ),
              array('identity_no' => '9090909090',
                    'fullname' => 'Uzumaki Naruto',
                    'birthplace' => 'Konoha',
                    'birthdate' => '1996-10-07',
                    'address' => 'Hanju hachi',
                    'city' => 'Konoha',
                    'customer_type' => 'organization',
                    'corporate_name' => 'Tampilin2',
                    'religion_id' => 2,
                    'subinstitution_id' => 2,
                    'phone_number' => '081226836303',
                    'customerAvatar' => 'tdb.png',
                    'created_at' => Carbon::now(),
                    'updated_at'  => Carbon::now()),
              array('identity_no' => '929292929',
                    'fullname' => 'Sasuke Uchiha',
                    'birthplace' => 'Konoha',
                    'birthdate' => '1996-10-07',
                    'address' => 'Kyu hachi',
                    'city' => 'Yami',
                    'customer_type' => 'individual',
                    'corporate_name' => 'Tampili3',
                    'religion_id' => 3,
                    'subinstitution_id' => 3,
                    'phone_number' => '081226836303',
                    'customerAvatar' => 'tdb.png',
                    'created_at' => Carbon::now(),
                    'updated_at'  => Carbon::now())
                  )
            );
    }

  }
