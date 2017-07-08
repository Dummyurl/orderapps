<?php

use Illuminate\Database\Seeder;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('address')->insert([
            'address' => 'Silk St, London EC2Y ,BDS UK',
            'city' => 'London',
            'contact_no' => '+442076384141',
            'created_at'=>\Carbon\Carbon::now()
        ]);
    }
}
