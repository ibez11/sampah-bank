<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->delete();

      DB::table('users')->insert(array(
              array('email' => 'jogja@tdbangarna.com',
                    'password' => Hash::make('jogja1'),
                    'customer_id' => null,
                    'employee_id' => 1,
                    'remember_token' => Hash::make(str_random(60)),
                    'created_at' => Carbon::now(),
                    'updated_at'  => Carbon::now()
                  ),
              array('email' => 'pekanbaru@tdbangarna.com',
                    'password' => bcrypt('pekanbaru1'),
                    'customer_id' => null,
                    'employee_id' => 2,
                    'remember_token' => Hash::make(str_random(60)),
                    'created_at' => Carbon::now(),
                    'upda7ted_at'  => Carbon::now()
                  ),
              array('email' => 'medan@tdbangarna.com',
                    'password' => Hash::make('medan1'),
                    'customer_id' => null,
                    'employee_id' => 3,
                    'remember_token' => Hash::make(str_random(60)),
                    'created_at' => Carbon::now(),
                    'updated_at'  => Carbon::now()
                  ),
              array('email' => 'admin@tdbangarna.com',
                    'password' => Hash::make('themoneygo'),
                    'customer_id' => null,
                    'employee_id' => 4,
                    'remember_token' => Hash::make(str_random(60)),
                    'created_at' => Carbon::now(),
                    'updated_at'  => Carbon::now()),
              array('email' => 'kasir@tdbangarna.com',
                    'password' => Hash::make('kasir1'),
                    'customer_id' => null,
                    'employee_id' => 5,
                    'remember_token' => Hash::make(str_random(60)),
                    'created_at' => Carbon::now(),
                    'updated_at'  => Carbon::now()),
            array('email' => 'jamil@yahoo.com',
                    'password' => Hash::make('password'),
                    'customer_id' => 1,
                    'employee_id' => null,
                    'remember_token' => Hash::make(str_random(60)),
                    'created_at' => Carbon::now(),
                    'updated_at'  => Carbon::now()),
            array('email' => 'naruto@yahoo.com',
                    'password' => Hash::make('password'),
                    'customer_id' => 2,
                    'employee_id' => null,
                    'remember_token' => Hash::make(str_random(60)),
                    'created_at' => Carbon::now(),
                    'updated_at'  => Carbon::now()),
            array('email' => 'sasuke@yahoo.com',
                    'password' => Hash::make('password'),
                    'customer_id' => 3,
                    'employee_id' => null,
                    'remember_token' => Hash::make(str_random(60)),
                    'created_at' => Carbon::now(),
                    'updated_at'  => Carbon::now()),
                array('email' => 'uswatun.khasanah@tdbangarna.com',
                    'password' => Hash::make('tdb2018'),
                    'customer_id' => null,
                    'employee_id' => 6,
                    'remember_token' => Hash::make(str_random(60)),
                    'created_at' => Carbon::now(),
                    'updated_at'  => Carbon::now()),
                array('email' => 'egi.rahman@tdbangarna.com',
                    'password' => Hash::make('tdb2018'),
                    'customer_id' => null,
                    'employee_id' => 7,
                    'remember_token' => Hash::make(str_random(60)),
                    'created_at' => Carbon::now(),
                    'updated_at'  => Carbon::now()),
                array('email' => 'm.ridho@tdbangarna.com',
                    'password' => Hash::make('tdb2018'),
                    'customer_id' => null,
                    'employee_id' => 8,
                    'remember_token' => Hash::make(str_random(60)),
                    'created_at' => Carbon::now(),
                    'updated_at'  => Carbon::now()),
                array('email' => 'zeni.aliaspal@tdbangarna.com',
                    'password' => Hash::make('tdb2018'),
                    'customer_id' => null,
                    'employee_id' => 9,
                    'remember_token' => Hash::make(str_random(60)),
                    'created_at' => Carbon::now(),
                    'updated_at'  => Carbon::now())
      )
            );
    }
}
