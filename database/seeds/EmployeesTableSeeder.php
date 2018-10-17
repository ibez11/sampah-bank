<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $employees = [array(
        'employee_no' => '829301820282',
        'fullname' => 'Administrator (Yogyakarta)',
        'birthplace' => 'New York',
        'birthdate' => '1989-07-09',
        'address' => '123 New York Street',
        'division_id' => 2,
        'sex' =>  'M',
        'phone_number' => '01012020291',
        'employeeAvatar' => 'tdb.png',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        'city_id' => 1 
      ), array(
        'employee_no' => '1111102292929',
        'fullname' => 'Administrator (Pekanbaru)',
        'birthplace' => 'New Orleans',
        'birthdate' => '1979-07-09',
        'address' => '123 New Orleans Street',
        'division_id' => 2,
        'sex' =>  'M',
        'phone_number' => '020101019299',
        'employeeAvatar' => 'tdb.png',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        'city_id' => 3
      ), array(
        'employee_no' => '84412321233',
        'fullname' => 'Administrator (Medan)',
        'birthplace' => 'New Jersey',
        'birthdate' => '1989-07-10',
        'address' => '123 New Jersey Street',
        'division_id' => 2,
        'sex' =>  'F',
        'phone_number' => '030192939292',
        'employeeAvatar' => 'tdb.png',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        'city_id' => 2
      ),
      array(
        'employee_no' => '01010101010101',
        'fullname' => 'User Owner',
        'birthplace' => 'Sumatera',
        'birthdate' => '1980-07-10',
        'address' => '123 New Jersey Street',
        'division_id' => 1,
        'sex' =>  'F',
        'phone_number' => '080808080808',
        'employeeAvatar' => 'tdb.png',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        'city_id' => 1
      ),
      array(
        'employee_no' => '01010101010101',
        'fullname' => 'User Cashier',
        'birthplace' => 'Sumatera',
        'birthdate' => '1989-07-10',
        'address' => '123 New Jersey Street',
        'division_id' => 2,
        'sex' =>  'F',
        'phone_number' => '080808080808',
        'employeeAvatar' => 'tdb.png',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        'city_id' => 1
      ),
      array(
        'employee_no' => '1409035711950003',
        'fullname' => 'Uswatun Khasanah',
        'birthplace' => 'Lampung',
        'birthdate' => '1995-11-17',
        'address' => 'Jl. Poros RT 008/RW 003 Sumber Datar, Singingi, Kuantan Singingi',
        'division_id' => 2,
        'sex' =>  'F',
        'phone_number' => '082390308197',
        'employeeAvatar' => 'tdb.png',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        'city_id' => 3
      ),
      array(
        'employee_no' => '1506021010960001',
        'fullname' => 'Egi Rahman Hakim',
        'birthplace' => 'Sapat',
        'birthdate' => '1995-10-10',
        'address' => 'Jl. Namirah Blok A RT 006, Sungainibung, Tangkal Ilir',
        'division_id' => 2,
        'sex' =>  'M',
        'phone_number' => '085355843826',
        'employeeAvatar' => 'tdb.png',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        'city_id' => 3
      ),
      array(
        'employee_no' => '1571031612980022',
        'fullname' => 'M. Ridho Idris',
        'birthplace' => 'Jambi',
        'birthdate' => '1998-12-16',
        'address' => 'Jl. Panglima Polim Lr. Hidayat RT 013 Jambi Timur',
        'division_id' => 2,
        'sex' =>  'M',
        'phone_number' => '082281410756',
        'employeeAvatar' => 'tdb.png',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        'city_id' => 3
      ),
      array(
        'employee_no' => '1304075903910003',
        'fullname' => 'Zeni Aliaspal',
        'birthplace' => 'Sungai Patai',
        'birthdate' => '1991-03-19',
        'address' => 'Jorong Bungo Setangkai, Sungai Patai, Sungayang',
        'division_id' => 2,
        'sex' =>  'F',
        'phone_number' => '-',
        'employeeAvatar' => 'tdb.png',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        'city_id' => 3
      ),
    ];

      foreach ($employees as $employee) {
        DB::table('employees')->insert($employee);
      }
    }
}
