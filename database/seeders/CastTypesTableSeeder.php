<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CastTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('cast_types')->delete();
        
        DB::table('cast_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Actors',
                'deleted_at' => NULL,
                'created_at' => '2021-09-02 08:32:30',
                'updated_at' => '2021-09-02 08:32:30',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Directors',
                'deleted_at' => NULL,
                'created_at' => '2021-09-02 08:32:35',
                'updated_at' => '2021-09-02 08:32:35',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Production House',
                'deleted_at' => NULL,
                'created_at' => '2021-09-02 08:32:43',
                'updated_at' => '2021-09-02 08:32:43',
            ),
        ));
        
        
    }
}