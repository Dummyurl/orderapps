<?php

use Illuminate\Database\Seeder;

class CategoryAttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mems = [
            'category_01' => ['cat_id' => 1,'attribute_name'=>'Small', 'created_at' => \Carbon\Carbon::now()],
            'category_02' => ['cat_id' => 1,'attribute_name'=>'Medium', 'created_at' => \Carbon\Carbon::now()],
            'category_03' => ['cat_id' => 1,'attribute_name'=>'Large', 'created_at' => \Carbon\Carbon::now()],
            'category_04' => ['cat_id' => 2,'attribute_name'=>'With One Filling', 'created_at' => \Carbon\Carbon::now()],
            'category_05' => ['cat_id' => 2,'attribute_name'=>'With Two Filling', 'created_at' => \Carbon\Carbon::now()],
        ];

        foreach ($mems as $code => $sys) {
            $mem = new \App\Models\CategoryAttributeModel();
            $mem->cat_id = $sys['cat_id'];
            $mem->attribute_name = $sys['attribute_name'];
            $mem->created_at = $sys['created_at'];
            $mem->save();
        }
    }
}
