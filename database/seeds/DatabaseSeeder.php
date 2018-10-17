<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OperatingCostsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(ReligionsTableSeeder::class);
        $this->call(InstitutionsTableSeeder::class);
        $this->call(SubinstitutionsTableSeeder::class);
        $this->call(DivisionsTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TransactionsTableSeeder::class);
        $this->call(DonationsTableSeeder::class);
        $this->call(GalleryTableSeeder::class);
    }
}
