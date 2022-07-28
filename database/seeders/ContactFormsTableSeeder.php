<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ContactFormsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('contact_forms')->delete();
        
        DB::table('contact_forms')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'test icons',
                'email' => 'admin@admin.com',
                'message' => 'asd',
                'deleted_at' => NULL,
                'created_at' => '2021-09-02 13:55:08',
                'updated_at' => '2021-09-02 13:55:08',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'last test',
                'email' => 'aa@aa.com',
                'message' => 'ass',
                'deleted_at' => NULL,
                'created_at' => '2021-09-06 14:26:46',
                'updated_at' => '2021-09-06 14:26:46',
            ),
        ));
        
        
    }
}