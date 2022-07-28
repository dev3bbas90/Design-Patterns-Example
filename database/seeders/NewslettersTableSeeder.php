<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NewslettersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('newsletters')->delete();
        
        DB::table('newsletters')->insert(array (
            0 => 
            array (
                'id' => 1,
                'email' => 't@a.com',
                'deleted_at' => '2021-09-06 14:27:45',
                'created_at' => '2021-09-06 14:27:05',
                'updated_at' => '2021-09-06 14:27:45',
            ),
        ));
        
        
    }
}