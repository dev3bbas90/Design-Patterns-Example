<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class HallTimeFramesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('hall_time_frames')->delete();
        
        DB::table('hall_time_frames')->insert(array (
            0 => 
            array (
                'id' => 1,
                'from' => '16:00:00',
                'to' => '22:00:00',
                'hall_id' => 11,
                'created_at' => '2021-09-01 14:52:58',
                'updated_at' => '2021-09-01 15:15:32',
            ),
            1 => 
            array (
                'id' => 14,
                'from' => '18:00:00',
                'to' => '20:00:00',
                'hall_id' => 11,
                'created_at' => '2021-09-06 14:04:44',
                'updated_at' => '2021-09-06 14:04:44',
            ),
            2 => 
            array (
                'id' => 15,
                'from' => '00:00:00',
                'to' => '03:00:00',
                'hall_id' => 11,
                'created_at' => '2021-09-06 14:24:12',
                'updated_at' => '2021-09-06 14:24:12',
            ),
            3 => 
            array (
                'id' => 16,
                'from' => '17:00:00',
                'to' => '19:00:00',
                'hall_id' => 11,
                'created_at' => '2021-09-06 14:24:33',
                'updated_at' => '2021-09-06 14:24:33',
            ),
        ));
        
        
    }
}