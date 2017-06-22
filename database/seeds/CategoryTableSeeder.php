<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mems = [
            'category_01' => ['category_name' => 'Pizza', 'created_at' => \Carbon\Carbon::now()],
            'category_02' => ['category_name' => 'Baked Potatoes', 'created_at' => \Carbon\Carbon::now()],

        ];

        foreach ($mems as $code => $sys) {
            $mem = new \App\Models\CategoryModel();
            $mem->category_name = $sys['category_name'];
            $mem->created_at = $sys['created_at'];
            $mem->save();
        }
    }
}
