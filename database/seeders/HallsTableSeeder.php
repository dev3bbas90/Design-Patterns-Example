<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class HallsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('halls')->delete();
        
        DB::table('halls')->insert(array (
            0 => 
            array (
                'id' => 1,
                'theater_id' => 1,
                'code' => 'Hall 1',
                'rows_no' => 100,
                'cols_no' => 100,
                'created_at' => '2021-09-08 08:57:09',
                'updated_at' => '2021-09-08 08:57:09',
            ),
            1 => 
            array (
                'id' => 2,
                'theater_id' => 2,
                'code' => 'Hall 1',
                'rows_no' => 100,
                'cols_no' => 100,
                'created_at' => '2021-09-08 09:02:10',
                'updated_at' => '2021-09-08 09:02:10',
            ),
            2 => 
            array (
                'id' => 3,
                'theater_id' => 3,
                'code' => 'Hall 1',
                'rows_no' => 100,
                'cols_no' => 100,
                'created_at' => '2021-09-08 09:02:45',
                'updated_at' => '2021-09-08 09:02:45',
            ),
            3 => 
            array (
                'id' => 4,
                'theater_id' => 4,
                'code' => 'Hall 1',
                'rows_no' => 100,
                'cols_no' => 100,
                'created_at' => '2021-09-08 09:03:14',
                'updated_at' => '2021-09-08 09:03:14',
            ),
            4 => 
            array (
                'id' => 5,
                'theater_id' => 5,
                'code' => 'Hall 1',
                'rows_no' => 100,
                'cols_no' => 100,
                'created_at' => '2021-09-08 09:03:58',
                'updated_at' => '2021-09-08 09:03:58',
            ),
            5 => 
            array (
                'id' => 6,
                'theater_id' => 6,
                'code' => 'Hall 1',
                'rows_no' => 100,
                'cols_no' => 100,
                'created_at' => '2021-09-08 09:04:25',
                'updated_at' => '2021-09-08 09:04:25',
            ),
            6 => 
            array (
                'id' => 7,
                'theater_id' => 7,
                'code' => 'Hall 1',
                'rows_no' => 100,
                'cols_no' => 100,
                'created_at' => '2021-09-08 09:06:35',
                'updated_at' => '2021-09-08 09:06:35',
            ),
            7 => 
            array (
                'id' => 8,
                'theater_id' => 8,
                'code' => 'Hall 1',
                'rows_no' => 100,
                'cols_no' => 100,
                'created_at' => '2021-09-08 09:07:37',
                'updated_at' => '2021-09-08 09:07:37',
            ),
            8 => 
            array (
                'id' => 9,
                'theater_id' => 9,
                'code' => 'Hall 1',
                'rows_no' => 100,
                'cols_no' => 100,
                'created_at' => '2021-09-08 09:08:13',
                'updated_at' => '2021-09-08 09:08:13',
            ),
            9 => 
            array (
                'id' => 10,
                'theater_id' => 6,
                'code' => 'test 5000',
                'rows_no' => 100,
                'cols_no' => 200,
                'created_at' => '2021-09-08 09:25:09',
                'updated_at' => '2021-09-08 09:25:09',
            ),
            10 => 
            array (
                'id' => 11,
                'theater_id' => 2,
                'code' => 'Hall 2',
                'rows_no' => 30,
                'cols_no' => 30,
                'created_at' => '2021-09-08 14:58:02',
                'updated_at' => '2021-09-08 14:58:02',
            ),
        ));
        
        
    }
}