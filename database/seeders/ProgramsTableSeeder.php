<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('programs')->delete();

        DB::table('programs')->insert(array (
            0 =>
            array (
                'id' => 1,
                'title' => 'الانس والنمس',
                'image' => '/1630929423.jpg',
            'description' => 'في إطار الرعب الكوميدي، يعيش تحسين مع والدته، وشقيقته، ويعمل في بيت الرعب بإحدى الملاهي الترفيهية، في يوم من الأيام يقع له حادث ويتسبب ذلك في تغيير حياته جذريا، حيث يتعرف على الفتاة نرمين، ويتعلق بقلبها، ولكنه يصدم عندما يعلم أنها من قبيلة جن تُدعى (النمس)، وأنهم يسعون إلى زيادة نسلهم عن طريق زواج تحسين ونرمين.',
                'program_category_id' => 3,
                'created_at' => '2021-09-02 08:49:47',
                'updated_at' => '2021-09-06 11:57:03',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'title' => 'dina el wedidi live concert',
                'image' => '/1630932726.jpg',
                'description' => 'The queen of fusion Dina El Wedidi is performing on Sehraya tent’s stage this Ramadan! Don’t miss the chance to enjoy Sohour while listening to her magical voice.',
                'program_category_id' => 5,
                'created_at' => '2021-09-02 08:51:56',
                'updated_at' => '2021-09-06 12:52:43',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'title' => 'Free Guy',
                'image' => '/1630930796.jpg',
            'description' => 'When Guy finds out that he\'s a non-player character (NPC) working as a bank teller in the open world video game Free City, he sets out to be the hero and save the game before it shuts down.',
                'program_category_id' => 1,
                'created_at' => '2021-09-06 12:19:56',
                'updated_at' => '2021-09-06 12:19:56',
                'deleted_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'title' => 'قصة شاب من الفشل إلى النجاح',
                'image' => '/1630931986.jpg',
            'description' => 'لكل قاعدة استثناء، وإن ” قصة نجاح ” ” احمد الشقيري ” صاحب البرنامج الأشهر في عالمنا العربي ” خواطر ” هي إحدى هذه الاستثناءات فالقاعدة تقول (من شب على شيء شاب عليه). فقد كانت لبدايات ” احمد الشقيري ” سمات حياة الشاب الحر الغير ملتزم بالصلاة والمبتلى بالتدخين، ولم يكن له رسالة هادفة واضحة الملامح إلا إنه بفضل الله غيّر من واقعه الذي تكلل بـ ” قصة نجاح ” سنتابع تفاصيلها معاً.',
                'program_category_id' => 4,
                'created_at' => '2021-09-06 12:39:46',
                'updated_at' => '2021-09-06 12:40:34',
                'deleted_at' => NULL,
            ),
            4 =>
            array (
                'id' => 5,
                'title' => 'Aziz Maraka concert',
                'image' => '/1630939490.jpg',
                'description' => 'Aziz Maraka concert',
                'program_category_id' => 5,
                'created_at' => '2021-09-06 14:44:50',
                'updated_at' => '2021-09-06 14:44:50',
                'deleted_at' => NULL,
            ),
        ));


    }
}
