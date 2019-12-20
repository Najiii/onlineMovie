<?php

use Illuminate\Database\Seeder;

class TheatreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $theatres =
        [
            [
                'theatre_name' => 'Royal Theatre',
                'theatre_image' => 'Sala_de_cine.jpg',
                'description' => "We broadcast to cinemas worldwide through National Theatre Live, stream plays free to UK schools, and produce a wealth of digital content about theatre.",
                'location' => "Askari V",
                'contact_no' => "0123-1234567",
                'cinemas' => "3",
                'created_at' => NULL,       
                'updated_at' => NULL
            ]
        ];

        DB::table('theatre')->insert($theatres);
    }
}
