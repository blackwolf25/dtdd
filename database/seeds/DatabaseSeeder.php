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
         $this->call(UserTableSeeder::class);
         $this->call(AdminTableSeeder::class);
         $this->call(CompanyTableSeeder::class);
         $this->call(NewsTableSeeder::class);
         $this->call(ProductTableSeeder::class);
         $this->call(CustomerTableSeeder::class);
         $this->call(OrderTableSeeder::class);
         $this->call(ProvincesTable::class);
         $this->call(DistrictsTable::class);
         $this->call(WardsTable::class);       
         
    }
}
