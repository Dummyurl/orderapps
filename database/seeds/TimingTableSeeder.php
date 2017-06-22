<?php

use Illuminate\Database\Seeder;
use App\Models\TimingModel;

class TimingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mems = [
            'timing_01' => ['day' => 'Monday','opening'=>'10:00 AM','closing'=>'10:00 PM','collection_timing'=>'00:30', 'created_at' => \Carbon\Carbon::now()],
            'timing_02' => ['day' => 'Tuesday','opening'=>'10:00 AM','closing'=>'11:00 PM','collection_timing'=>'00:30', 'created_at' => \Carbon\Carbon::now()],
            'timing_03' => ['day' => 'Wednesday', 'opening'=>'10:00 AM','closing'=>'12:00 PM','collection_timing'=>'00:30','created_at' => \Carbon\Carbon::now()],
            'timing_04' => ['day' => 'Thursday', 'opening'=>'10:00 AM','closing'=>'09:00 PM','collection_timing'=>'00:30','created_at' => \Carbon\Carbon::now()],
            'timing_05' => ['day' => 'Friday', 'opening'=>'10:00 AM','closing'=>'08:00 PM','collection_timing'=>'00:30','created_at' => \Carbon\Carbon::now()],
            'timing_06' => ['day' => 'Saturday', 'opening'=>'10:00 AM','closing'=>'07:00 PM','collection_timing'=>'00:40','created_at' => \Carbon\Carbon::now()],
            'timing_07' => ['day' => 'Sunday','opening'=>'10:00 AM','closing'=>'06:00 PM', 'collection_timing'=>'00:40','created_at' => \Carbon\Carbon::now()],

        ];

        foreach ($mems as $code => $sys) {
            $mem = new TimingModel();
            $mem->day = $sys['day'];
            $mem->opening_time = $sys['opening'];
            $mem->closing_time = $sys['closing'];
            $mem->collection_timing = $sys['collection_timing'];
            $mem->created_at = $sys['created_at'];
            $mem->save();
        }

    }
}
