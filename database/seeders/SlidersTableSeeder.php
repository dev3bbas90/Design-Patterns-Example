<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlidersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('sliders')->delete();

        DB::table('sliders')->insert(array (
            0 =>
            array (
                'id' => 1,
                'alt' => 'habitant morbi tristique',
                'image' => '/1631111182.jpg',
                'title' => 'Lorem ipsum dolor sit amet',
                'short_title' => 'Lorem ipsum dolor',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc id magna eget lectus facilisis pretium ac tincidunt orci. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
                'url' => 'https://www.google.com/',
                'deleted_at' => NULL,
                'created_at' => '2021-09-08 14:26:22',
                'updated_at' => '2021-09-08 14:26:22',
            ),
            1 =>
            array (
                'id' => 2,
                'alt' => 'habitant morbi tristique',
                'image' => '/1631111281.jpg',
                'title' => 'Lorem ipsum dolor sit amet',
                'short_title' => 'Lorem ipsum dolor',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc id magna eget lectus facilisis pretium ac tincidunt orci. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
                'url' => 'https://www.google.com/',
                'deleted_at' => NULL,
                'created_at' => '2021-09-08 14:28:01',
                'updated_at' => '2021-09-08 14:28:01',
            ),
            2 =>
            array (
                'id' => 3,
                'alt' => 'habitant morbi tristique',
                'image' => '/1631111298.jpg',
                'title' => 'Lorem ipsum dolor sit amet',
                'short_title' => 'Lorem ipsum dolor',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc id magna eget lectus facilisis pretium ac tincidunt orci. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
                'url' => 'https://www.google.com/',
                'deleted_at' => NULL,
                'created_at' => '2021-09-08 14:28:18',
                'updated_at' => '2021-09-08 14:28:18',
            ),
            3 =>
            array (
                'id' => 4,
                'alt' => 'habitant morbi tristique',
                'image' => '/1631111316.jpg',
                'title' => 'Lorem ipsum dolor sit amet',
                'short_title' => 'Lorem ipsum dolor',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc id magna eget lectus facilisis pretium ac tincidunt orci. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
                'url' => 'https://www.google.com/',
                'deleted_at' => NULL,
                'created_at' => '2021-09-08 14:28:36',
                'updated_at' => '2021-09-08 14:28:36',
            ),
            4 =>
            array (
                'id' => 5,
                'alt' => 'habitant morbi tristique',
                'image' => '/1631111333.jpg',
                'title' => 'Lorem ipsum dolor sit amet',
                'short_title' => 'Lorem ipsum dolor',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc id magna eget lectus facilisis pretium ac tincidunt orci. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
                'url' => 'https://www.google.com/',
                'deleted_at' => NULL,
                'created_at' => '2021-09-08 14:28:53',
                'updated_at' => '2021-09-08 14:28:53',
            ),
        ));


    }
}
