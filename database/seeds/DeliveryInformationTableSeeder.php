<?php

use Illuminate\Database\Seeder;

class DeliveryInformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mems = [
            'timing_01' => ['post_code' => 'PAN 3AN','min_order_val'=>'3','delivery_charge'=>'1.60','aprrox_delivery_time' => '00:45', 'created_at' => \Carbon\Carbon::now()],
            'timing_02' => ['post_code' => 'EC1A 1AA','min_order_val'=>'2','delivery_charge'=>'1.60','aprrox_delivery_time' => '00:45', 'created_at' => \Carbon\Carbon::now()],
            'timing_03' => ['post_code' => 'B1 1AA', 'min_order_val'=>'2','delivery_charge'=>'1.60','aprrox_delivery_time' => '00:45','created_at' => \Carbon\Carbon::now()],
            'timing_04' => ['post_code' => 'WV1 1DF', 'min_order_val'=>'1','delivery_charge'=>'1.60','aprrox_delivery_time' => '00:45','created_at' => \Carbon\Carbon::now()],
            'timing_05' => ['post_code' => 'WV1 1EA', 'min_order_val'=>'5','delivery_charge'=>'1.60','aprrox_delivery_time' => '00:45','created_at' => \Carbon\Carbon::now()],
            'timing_06' => ['post_code' => 'EC4Y 0AD', 'min_order_val'=>'3','delivery_charge'=>'1.60','aprrox_delivery_time' => '00:45','created_at' => \Carbon\Carbon::now()],
            'timing_07' => ['post_code' => 'EC2V 5AF','min_order_val'=>'4','delivery_charge'=>'1.60', 'aprrox_delivery_time' => '00:45','created_at' => \Carbon\Carbon::now()],

        ];

        foreach ($mems as $code => $sys) {
            $mem = new \App\Models\DeliveryInformationModel();
            $mem->post_code = $sys['post_code'];
            $mem->min_order_val = $sys['min_order_val'];
            $mem->delivery_charge = $sys['delivery_charge'];
            $mem->aprrox_delivery_time = $sys['aprrox_delivery_time'];
            $mem->created_at = $sys['created_at'];
            $mem->save();
        }
    }
}
