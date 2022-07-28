<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PartnersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('partners')->delete();
        
        DB::table('partners')->insert(array (
           0 => 
            array (
                'id' => 1,
                'alt' => 'etisalt',
                'image' => '/1630933770.png',
                'deleted_at' => NULL,
                'created_at' => '2021-09-06 13:00:57',
                'updated_at' => '2021-09-06 13:09:30',
            ),
            1 => 
            array (
                'id' => 2,
                'alt' => 'vodafone',
                'image' => '/1630933785.png',
                'deleted_at' => NULL,
                'created_at' => '2021-09-06 13:01:11',
                'updated_at' => '2021-09-06 13:09:45',
            ),
            2 => 
            array (
                'id' => 3,
                'alt' => 'orange',
                'image' => '/1630933801.png',
                'deleted_at' => NULL,
                'created_at' => '2021-09-06 13:01:30',
                'updated_at' => '2021-09-06 13:10:01',
            ),
            3 => 
            array (
                'id' => 4,
                'alt' => 'orscom',
                'image' => '/1630934993.png',
                'deleted_at' => '2021-09-09 08:18:01',
                'created_at' => '2021-09-06 13:29:53',
                'updated_at' => '2021-09-09 08:18:01',
            ),
            4 => 
            array (
                'id' => 5,
                'alt' => 'zain',
                'image' => '/1630936113.png',
                'deleted_at' => NULL,
                'created_at' => '2021-09-06 13:48:33',
                'updated_at' => '2021-09-06 13:48:33',
            ),
            5 => 
            array (
                'id' => 6,
                'alt' => 'we',
                'image' => '/1630936161.jpg',
                'deleted_at' => NULL,
                'created_at' => '2021-09-06 13:49:21',
                'updated_at' => '2021-09-06 13:49:21',
            ),
        ));
        
        
    }
}