<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProgramCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('program_categories')->delete();
        
        DB::table('program_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Action',
                'description' => '<p>Test</p>',
                'deleted_at' => NULL,
                'created_at' => '2021-09-02 08:36:22',
                'updated_at' => '2021-09-02 08:36:22',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Horror',
                'description' => '<p>Test Horror</p>',
                'deleted_at' => NULL,
                'created_at' => '2021-09-02 08:36:33',
                'updated_at' => '2021-09-02 08:36:33',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Drama',
                'description' => '<p>Test</p>',
                'deleted_at' => NULL,
                'created_at' => '2021-09-02 08:36:43',
                'updated_at' => '2021-09-02 08:36:43',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Symposium',
                'description' => 'Symposium',
                'deleted_at' => NULL,
                'created_at' => '2021-09-06 12:40:16',
                'updated_at' => '2021-09-06 12:40:16',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'music',
                'description' => 'music',
                'deleted_at' => NULL,
                'created_at' => '2021-09-06 12:50:04',
                'updated_at' => '2021-09-06 12:50:04',
            ),
        ));
        
        
    }
}