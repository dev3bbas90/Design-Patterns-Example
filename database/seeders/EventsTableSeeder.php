<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class EventsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('events')->delete();
        
        DB::table('events')->insert(array (
            0 => 
            array (
                'id' => 64,
                'theater_id' => 2,
                'hall_time_frame_id' => 14,
                'hall_id' => 11,
                'program_id' => 1,
                'date' => '2021-09-09',
                'weekday_price' => 100.0,
                'weekend_price' => 120.0,
                'created_at' => '2021-09-08 15:09:15',
                'updated_at' => '2021-09-08 15:09:15',
            ),
            1 => 
            array (
                'id' => 65,
                'theater_id' => 2,
                'hall_time_frame_id' => 15,
                'hall_id' => 11,
                'program_id' => 1,
                'date' => '2021-09-09',
                'weekday_price' => 100.0,
                'weekend_price' => 120.0,
                'created_at' => '2021-09-08 15:09:15',
                'updated_at' => '2021-09-08 15:09:15',
            ),
            2 => 
            array (
                'id' => 66,
                'theater_id' => 2,
                'hall_time_frame_id' => 16,
                'hall_id' => 11,
                'program_id' => 1,
                'date' => '2021-09-09',
                'weekday_price' => 100.0,
                'weekend_price' => 120.0,
                'created_at' => '2021-09-08 15:09:15',
                'updated_at' => '2021-09-08 15:09:15',
            ),
            3 => 
            array (
                'id' => 67,
                'theater_id' => 2,
                'hall_time_frame_id' => 14,
                'hall_id' => 11,
                'program_id' => 1,
                'date' => '2021-09-10',
                'weekday_price' => 100.0,
                'weekend_price' => 120.0,
                'created_at' => '2021-09-08 15:09:15',
                'updated_at' => '2021-09-08 15:09:15',
            ),
            4 => 
            array (
                'id' => 68,
                'theater_id' => 2,
                'hall_time_frame_id' => 15,
                'hall_id' => 11,
                'program_id' => 1,
                'date' => '2021-09-10',
                'weekday_price' => 100.0,
                'weekend_price' => 120.0,
                'created_at' => '2021-09-08 15:09:15',
                'updated_at' => '2021-09-08 15:09:15',
            ),
            5 => 
            array (
                'id' => 69,
                'theater_id' => 2,
                'hall_time_frame_id' => 16,
                'hall_id' => 11,
                'program_id' => 1,
                'date' => '2021-09-10',
                'weekday_price' => 100.0,
                'weekend_price' => 120.0,
                'created_at' => '2021-09-08 15:09:15',
                'updated_at' => '2021-09-08 15:09:15',
            ),
            6 => 
            array (
                'id' => 70,
                'theater_id' => 2,
                'hall_time_frame_id' => 14,
                'hall_id' => 11,
                'program_id' => 1,
                'date' => '2021-09-11',
                'weekday_price' => 100.0,
                'weekend_price' => 120.0,
                'created_at' => '2021-09-08 15:09:15',
                'updated_at' => '2021-09-08 15:09:15',
            ),
            7 => 
            array (
                'id' => 71,
                'theater_id' => 2,
                'hall_time_frame_id' => 15,
                'hall_id' => 11,
                'program_id' => 1,
                'date' => '2021-09-11',
                'weekday_price' => 100.0,
                'weekend_price' => 120.0,
                'created_at' => '2021-09-08 15:09:15',
                'updated_at' => '2021-09-08 15:09:15',
            ),
            8 => 
            array (
                'id' => 72,
                'theater_id' => 2,
                'hall_time_frame_id' => 16,
                'hall_id' => 11,
                'program_id' => 1,
                'date' => '2021-09-11',
                'weekday_price' => 100.0,
                'weekend_price' => 120.0,
                'created_at' => '2021-09-08 15:09:15',
                'updated_at' => '2021-09-08 15:09:15',
            ),
            9 => 
            array (
                'id' => 73,
                'theater_id' => 2,
                'hall_time_frame_id' => 14,
                'hall_id' => 11,
                'program_id' => 1,
                'date' => '2021-09-12',
                'weekday_price' => 100.0,
                'weekend_price' => 120.0,
                'created_at' => '2021-09-08 15:09:15',
                'updated_at' => '2021-09-08 15:09:15',
            ),
            10 => 
            array (
                'id' => 74,
                'theater_id' => 2,
                'hall_time_frame_id' => 15,
                'hall_id' => 11,
                'program_id' => 1,
                'date' => '2021-09-12',
                'weekday_price' => 100.0,
                'weekend_price' => 120.0,
                'created_at' => '2021-09-08 15:09:15',
                'updated_at' => '2021-09-08 15:09:15',
            ),
            11 => 
            array (
                'id' => 75,
                'theater_id' => 2,
                'hall_time_frame_id' => 16,
                'hall_id' => 11,
                'program_id' => 1,
                'date' => '2021-09-12',
                'weekday_price' => 100.0,
                'weekend_price' => 120.0,
                'created_at' => '2021-09-08 15:09:15',
                'updated_at' => '2021-09-08 15:09:15',
            ),
            12 => 
            array (
                'id' => 76,
                'theater_id' => 2,
                'hall_time_frame_id' => 14,
                'hall_id' => 11,
                'program_id' => 1,
                'date' => '2021-09-13',
                'weekday_price' => 100.0,
                'weekend_price' => 120.0,
                'created_at' => '2021-09-08 15:09:15',
                'updated_at' => '2021-09-08 15:09:15',
            ),
            13 => 
            array (
                'id' => 77,
                'theater_id' => 2,
                'hall_time_frame_id' => 15,
                'hall_id' => 11,
                'program_id' => 1,
                'date' => '2021-09-13',
                'weekday_price' => 100.0,
                'weekend_price' => 120.0,
                'created_at' => '2021-09-08 15:09:15',
                'updated_at' => '2021-09-08 15:09:15',
            ),
            14 => 
            array (
                'id' => 78,
                'theater_id' => 2,
                'hall_time_frame_id' => 16,
                'hall_id' => 11,
                'program_id' => 1,
                'date' => '2021-09-13',
                'weekday_price' => 100.0,
                'weekend_price' => 120.0,
                'created_at' => '2021-09-08 15:09:15',
                'updated_at' => '2021-09-08 15:09:15',
            ),
            15 => 
            array (
                'id' => 79,
                'theater_id' => 2,
                'hall_time_frame_id' => 14,
                'hall_id' => 11,
                'program_id' => 1,
                'date' => '2021-09-14',
                'weekday_price' => 100.0,
                'weekend_price' => 120.0,
                'created_at' => '2021-09-08 15:09:15',
                'updated_at' => '2021-09-08 15:09:15',
            ),
            16 => 
            array (
                'id' => 80,
                'theater_id' => 2,
                'hall_time_frame_id' => 15,
                'hall_id' => 11,
                'program_id' => 1,
                'date' => '2021-09-14',
                'weekday_price' => 100.0,
                'weekend_price' => 120.0,
                'created_at' => '2021-09-08 15:09:15',
                'updated_at' => '2021-09-08 15:09:15',
            ),
            17 => 
            array (
                'id' => 81,
                'theater_id' => 2,
                'hall_time_frame_id' => 16,
                'hall_id' => 11,
                'program_id' => 1,
                'date' => '2021-09-14',
                'weekday_price' => 100.0,
                'weekend_price' => 120.0,
                'created_at' => '2021-09-08 15:09:15',
                'updated_at' => '2021-09-08 15:09:15',
            ),
            18 => 
            array (
                'id' => 82,
                'theater_id' => 2,
                'hall_time_frame_id' => 14,
                'hall_id' => 11,
                'program_id' => 1,
                'date' => '2021-09-15',
                'weekday_price' => 100.0,
                'weekend_price' => 120.0,
                'created_at' => '2021-09-08 15:09:15',
                'updated_at' => '2021-09-08 15:09:15',
            ),
            19 => 
            array (
                'id' => 83,
                'theater_id' => 2,
                'hall_time_frame_id' => 15,
                'hall_id' => 11,
                'program_id' => 1,
                'date' => '2021-09-15',
                'weekday_price' => 100.0,
                'weekend_price' => 120.0,
                'created_at' => '2021-09-08 15:09:15',
                'updated_at' => '2021-09-08 15:09:15',
            ),
            20 => 
            array (
                'id' => 84,
                'theater_id' => 2,
                'hall_time_frame_id' => 16,
                'hall_id' => 11,
                'program_id' => 1,
                'date' => '2021-09-15',
                'weekday_price' => 100.0,
                'weekend_price' => 120.0,
                'created_at' => '2021-09-08 15:09:15',
                'updated_at' => '2021-09-08 15:09:15',
            ),
        ));
        
        
    }
}