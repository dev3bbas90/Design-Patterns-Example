<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call([
        //     UserSeeder::class,
        // ]);
        ini_set('memory_limit', '-1');
        $this->call(UsersTableSeeder::class);
        $this->call(ProgramCategoriesTableSeeder::class);
        $this->call(TheatersTableSeeder::class);
        $this->call(HallsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(RowsTableSeeder::class);
        $this->call(SeatsTableSeeder::class);
        $this->call(ProgramsTableSeeder::class);
        $this->call(HallTimeFramesTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(CastTypesTableSeeder::class);
        $this->call(CastsTableSeeder::class);
        $this->call(ProgramCastsTableSeeder::class);
        $this->call(PartnersTableSeeder::class);
        $this->call(SlidersTableSeeder::class);
        $this->call(NewslettersTableSeeder::class);
        $this->call(ContactFormsTableSeeder::class);
        $this->call(BookingsTableSeeder::class);
    }
}
