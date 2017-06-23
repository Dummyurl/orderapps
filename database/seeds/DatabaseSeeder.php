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
         $this->call(UsersTableSeeder::class);
         $this->call(CategoryTableSeeder::class);
         $this->call(CategoryAttributeTableSeeder::class);
         $this->call(AddressTableSeeder::class);
         $this->call(DeliveryInformationTableSeeder::class);
         $this->call(TimingTableSeeder::class);

    }
}
