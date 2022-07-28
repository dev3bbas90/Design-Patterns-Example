<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TheatersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('theaters')->delete();

        DB::table('theaters')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'VOX Cinemas Almaza City Center',
                'location' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3452.4305601705246!2d31.365252985469333!3d30.081853023760644!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583d0c045dab79%3A0x5ead4da702f5488e!2sVOX%20Cinemas%20Almaza%20City%20Center!5e0!3m2!1sar!2seg!4v1630926936840!5m2!1sar!2seg" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                'description' => '<p>Owned and operated by Majid Al Futtaim Cinemas, VOX Cinemas is the cinema arm of Majid Al Futtaim, the leading shopping malls, communities, retail and leisure pioneer across the Middle East,&nbsp;Africa and Central Asia</p>',
                'image' => '/1630927119.png',
                'created_at' => '2021-08-31 11:26:25',
                'updated_at' => '2021-09-08 09:28:23',
                'address' => 'Almaza',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Al Rehab Cinema',
                'location' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3454.201715587871!2d31.413570285470513!3d30.031070326160435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583d1d2b2654cb%3A0x616d3bbf60392098!2sCFC%20Theater!5e0!3m2!1sar!2seg!4v1630927201071!5m2!1sar!2seg" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                'description' => '<ul>
<li>All film screenings at the theater are held with a priority being given to the film(s) in high demand.</li>
<li>For 3D films, the ticket price does not include the price of the 3D glasses.</li>
</ul>',
                'image' => '/1630927426.jpg',
                'created_at' => '2021-09-01 15:09:01',
                'updated_at' => '2021-09-08 09:28:44',
                'address' => 'AlRehab',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Niagara Falls IMAX Theatre',
                'location' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2913.9187783857474!2d-79.07986831493217!3d43.085202896991596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d3430deaecfee1%3A0x62221c431e8c0a53!2sNiagara%20Falls%20IMAX%20Theatre!5e0!3m2!1sar!2seg!4v1630927634034!5m2!1sar!2seg" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                'description' => '<div class="lead-in">Niagara Falls is amazing! Learn more about this special place and impress your friends when you check out some fun and interesting facts about Niagara Falls.</div>',
                'image' => '/1630927644.jpg',
                'created_at' => '2021-09-06 08:48:41',
                'updated_at' => '2021-09-08 09:28:56',
                'address' => 'Canda',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Théâtre Capitol Theatre',
                'location' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2767.132211351675!2d-64.77684841504413!3d46.088341999600985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ca0b9395048fbb1%3A0x94e922e1e68b571!2sTh%C3%A9%C3%A2tre%20Capitol%20Theatre!5e0!3m2!1sar!2seg!4v1630927772376!5m2!1sar!2seg" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                'description' => '<p>The Capitol Theatre in downtown Moncton, New Brunswick, Canada is an 800-seat, restored 1920s-era vaudeville house on Main Street that serves as the centre for cultural entertainment for the city</p>',
                'image' => '/1630927783.jpeg',
                'created_at' => '2021-09-06 08:48:41',
                'updated_at' => '2021-09-08 09:29:28',
                'address' => 'Canda',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'The Marquee Theatre',
                'location' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3454.348437023348!2d31.41411678547073!3d30.02686002635925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583d1d3533cb91%3A0x73012be0e9bd109a!2sCairo%20Show%20Theater%20The%20Marquee!5e0!3m2!1sar!2seg!4v1630921966753!5m2!1sar!2seg" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                'description' => '<p>The Marquee Theatre by Cairo Festival&nbsp;City&rsquo;s is a1600-seats art and performance venue built to international standards &ndash; the largest&nbsp;in New&nbsp;Cairo and second largest in Egypt- designed to host international and local acts and performances, concerts and display covering every genre of the arts.</p>',
                'image' => '/1630922021.jpg',
                'created_at' => '2021-09-06 09:53:41',
                'updated_at' => '2021-09-08 09:30:12',
                'address' => 'cairo festival city',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'Dubai Opera',
                'location' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3610.2253497442016!2d55.274067685582416!3d25.19562183794872!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f682aaf28d991%3A0xc855ffaf3a4aff63!2z2K_Yp9ixINiv2KjZiiDZhNmE2KPZiNio2LHYpw!5e0!3m2!1sar!2seg!4v1630922302207!5m2!1sar!2seg" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                'description' => '<p>Dubai Opera is the definitive destination for performing arts in Dubai, bringing arts and music to life like never before.Located at what&rsquo;s billed as &lsquo;the most prestigious square kilometre in the world&rsquo; in Downtown Dubai, Dubai Opera is the radiant centre of culture and arts in Dubai and the shining pearl of The Opera District. Dubai Opera passionately embraces its role as the creative heart of the city, producing and hosting the most beautiful, most authentic, and engaging performing arts experiences from Dubai and the world.</p>',
                'image' => '/1630922579.jpg',
                'created_at' => '2021-09-06 10:02:59',
                'updated_at' => '2021-09-08 09:30:30',
                'address' => 'Dubai',
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'Future Mall Cinema',
                'location' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3455.9081510672404!2d31.42856958547187!3d29.98206952847265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583bd8c93daabb%3A0xbf28c07d1a22a46!2sCinema%20future%20Mall!5e0!3m2!1sar!2seg!4v1630923266909!5m2!1sar!2seg" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                'description' => '<ul>
<li>&nbsp;All film screenings at the theater are held with a priority being given to the film(s) in high demand.</li>
<li>Midnight screenings are available only on Thursdays and Fridays of each week, except during public holidays and feasts.</li>
</ul>',
                'image' => '/1630923299.jpg',
                'created_at' => '2021-09-06 10:14:59',
                'updated_at' => '2021-09-08 09:31:44',
                'address' => 'nasr city',
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'Point90 Cinema',
                'location' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3454.5761192210766!2d31.497216385470814!3d30.02032542666771!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145822591a17706b%3A0xc9f886adcffbb941!2z2LPZitmG2YXYpyDYqNmI2YrZhtiqINmp2aA!5e0!3m2!1sar!2seg!4v1630923578594!5m2!1sar!2seg" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                'description' => '<p>Point90 Cinemas is the first major cinema multiplex in the Fifth Settlement, New Cairo, located right in front of the American University in Cairo, inside the Point90 mall.</p>

<p>Our aim is to offer you the ultimate cinema experience, with 11 premium screen halls equipped with the latest movie projection and sound technology. </p>',
                'image' => '/1630923673.jpg',
                'created_at' => '2021-09-06 10:21:13',
                'updated_at' => '2021-09-08 09:31:06',
                'address' => 'New cairo',
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'cairo opera house',
                'location' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.807991957349!2d31.225856885470282!3d30.04236592562701!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458411b18beb2fb%3A0x4bb773a7745b4aba!2sCairo%20Opera%20House!5e0!3m2!1sar!2seg!4v1630923836121!5m2!1sar!2seg" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                'description' => '<p>The&nbsp;<strong>Cairo Opera House</strong>&nbsp;is a cultural landmark renowned for leadership, excellence and imagination. It has carved itself a significant place in the cultural landscape of Egypt and the Middle East</p>',
                'image' => '/1630923852.jpg',
                'created_at' => '2021-09-06 10:24:12',
                'updated_at' => '2021-09-08 09:31:16',
                'address' => 'cairo',
            ),
        ));


    }
}
