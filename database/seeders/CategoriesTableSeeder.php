<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('categories')->delete();
        
        DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Economy',
                'price_raise' => 0.0,
                'color' => '#16d0b7',
                'code' => 'E',
                'created_at' => '2021-08-31 09:54:10',
                'updated_at' => '2021-09-08 09:49:52',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'First Class',
                'price_raise' => 10.0,
                'color' => '#d73737',
                'code' => 'F',
                'created_at' => '2021-08-31 09:54:21',
                'updated_at' => '2021-09-08 09:49:59',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'VIP',
                'price_raise' => 20.0,
                'color' => '#ebc60f',
                'code' => 'V',
                'created_at' => '2021-08-31 09:54:32',
                'updated_at' => '2021-09-08 09:51:25',
            ),
        ));
        
        
    }
}