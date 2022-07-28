<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('users')->delete();

        DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Ahmed Abo zaid',
                'email' => 'admin@admin.com',
                'email_verified_at' => NULL,
                'password' => Hash::make('12345678'),
                'remember_token' => 'AyRgrChiENtgpRQDq1ch44ziB6BsCnviZqwV9tDAA1xpKuu307piJaJMJSpM',
                'created_at' => NULL,
                'updated_at' => '2021-09-07 14:53:17',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'bassant',
                'email' => 'bassant@egicons.com',
                'email_verified_at' => NULL,
                'password' => Hash::make('12345678'),
                'remember_token' => 'CJttQmyl54vwCP6412KLo2r5oO1Ra1vHwo68H1ohVDokozuquGrEvFfCpknc',
                'created_at' => '2021-09-07 12:23:44',
                'updated_at' => '2021-09-07 12:23:44',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Abo Zaid',
                'email' => 'abozaid@egicons.com',
                'email_verified_at' => NULL,
                'password' => Hash::make('12345678'),
                'remember_token' => NULL,
                'created_at' => '2021-09-07 12:25:41',
                'updated_at' => '2021-09-07 15:09:33',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'diab',
                'email' => 'diab@egicons.com',
                'email_verified_at' => NULL,
                'password' => Hash::make('12345678'),
                'remember_token' => NULL,
                'created_at' => '2021-09-07 12:26:04',
                'updated_at' => '2021-09-07 12:26:04',
            ),
        ));


    }
}
