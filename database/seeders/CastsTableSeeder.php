<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CastsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('casts')->delete();
        
        DB::table('casts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'menna shalaby',
                'description' => 'menna shalaby',
                'image' => '/1630928998.jpg',
                'cast_type_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-09-02 08:33:11',
                'updated_at' => '2021-09-06 11:49:58',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'mohamed hendy',
                'description' => 'mohamed hendy',
                'image' => '/1630929022.jpg',
                'cast_type_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-09-02 08:33:11',
                'updated_at' => '2021-09-06 11:50:22',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'bayomy fouad',
                'description' => 'bayomy fouad',
                'image' => '/1630929129.jpg',
                'cast_type_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-09-02 08:33:11',
                'updated_at' => '2021-09-06 11:52:09',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'sherif arfa',
                'description' => 'sherif arfa',
                'image' => '/1630929200.jpg',
                'cast_type_id' => 2,
                'deleted_at' => NULL,
                'created_at' => '2021-09-02 08:33:11',
                'updated_at' => '2021-09-06 11:53:20',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Test director 2',
                'description' => '<p>Test director 2</p>',
                'image' => '/1630571591.jpg',
                'cast_type_id' => 2,
                'deleted_at' => NULL,
                'created_at' => '2021-09-02 08:33:11',
                'updated_at' => '2021-09-02 08:33:11',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Test director 3',
                'description' => '<p>Test director 3</p>',
                'image' => '/1630571591.jpg',
                'cast_type_id' => 2,
                'deleted_at' => NULL,
                'created_at' => '2021-09-02 08:33:11',
                'updated_at' => '2021-09-02 08:33:11',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'hisham abdelkhalaa',
                'description' => 'hisham abdelkhalaa',
                'image' => '/1630929418.jpg',
                'cast_type_id' => 3,
                'deleted_at' => NULL,
                'created_at' => '2021-09-02 08:33:11',
                'updated_at' => '2021-09-06 11:56:58',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Test production house2',
                'description' => '<p>Test production house2</p>',
                'image' => '/1630571591.jpg',
                'cast_type_id' => 3,
                'deleted_at' => NULL,
                'created_at' => '2021-09-02 08:33:11',
                'updated_at' => '2021-09-02 08:33:11',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Test production house3',
                'description' => '<p>Test production house3</p>',
                'image' => '/1630571591.jpg',
                'cast_type_id' => 3,
                'deleted_at' => NULL,
                'created_at' => '2021-09-02 08:33:11',
                'updated_at' => '2021-09-02 08:33:11',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Ryan Reynolds',
                'description' => 'is a Canadian actor born on October 23, 1976. Reynolds began his career working on Canadian television but soon moved to the United States where he was cast alongside legendary actress Glenn Close in the TV movie',
                'image' => '/1630930194.jpg',
                'cast_type_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-09-06 12:09:54',
                'updated_at' => '2021-09-06 12:09:54',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Jodie Comer',
                'description' => 'Jodie Comer is an English actress, born in Liverpool and attended St Julie\'s Catholic High School. She appeared in small roles in various TV series including: My Mad Fat Diary, Doctor Foster and Thirteen.',
                'image' => '/1630930698.jpg',
                'cast_type_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-09-06 12:18:18',
                'updated_at' => '2021-09-06 12:18:18',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Shawn Levy',
                'description' => 'Shawn Levy is a Canadian film director, producer, and actor. He was born in Montreal, Quebec and graduated from Yale University in 1989 majoring in Performing Arts.  He\'s known',
                'image' => '/1630930759.jpg',
                'cast_type_id' => 2,
                'deleted_at' => NULL,
                'created_at' => '2021-09-06 12:19:19',
                'updated_at' => '2021-09-06 12:19:19',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'احمد الشقيري',
                'description' => 'احمد الشقيري',
                'image' => '/1630931251.png',
                'cast_type_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-09-06 12:27:31',
                'updated_at' => '2021-09-06 12:27:31',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'dina el wedidi',
                'description' => 'Dina El Wedidi, is an Egyptian singer, composer, guitarist, duf drum player, actress, and storyteller. Dina has been known as the lead performer of an ensemble of musicians who have performed extensively in the past 2 years,',
                'image' => '/1630932417.jpg',
                'cast_type_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-09-06 12:46:57',
                'updated_at' => '2021-09-06 12:46:57',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Aziz Maraka',
                'description' => 'Aziz Maraka concert',
                'image' => '/1630939400.jpg',
                'cast_type_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-09-06 14:43:20',
                'updated_at' => '2021-09-06 14:43:20',
            ),
        ));
        
        
    }
}