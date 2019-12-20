<?php

use Illuminate\Database\Seeder;

class MovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies =
        [
            [
                'title' => 'Avengers: Endgame',
                'description' => "Adrift in space with no food or water, Tony Stark sends a message to Pepper Potts as his oxygen supply starts to dwindle. Meanwhile, the remaining Avengers -- Thor, Black Widow, Captain America and Bruce Banner -- must figure out a way to bring back their vanquished allies for an epic showdown with Thanos -- the evil demigod who decimated the planet and the universe.'",
                'director' => 'Russos',
                'release' => 'April 22, 2019',
                'genre' => 'Fantasy/Sci-fi',
                'language' => 'English',
                'trailer_link' => 'https://www.youtube.com/embed/TcMBFSGVi1c',
                'poster' => 'endgame.jpg',
                'picture_1' => 'av1.jpg',
                'picture_2' => 'av2.jpg',
                'picture_3' => 'av3.jpg',
                'picture_4' => 'av4.jpg',
                'picture_5' => 'av5.jpg',
                'picture_6' => 'av6.jpg',
            ],

            [
                'title' => 'John Wick: Chapter 3 – Parabellum',
                'description' => "After gunning down a member of the High Table -- the shadowy international assassin's guild -- legendary hit man John Wick finds himself stripped of the organization's protective services. Now stuck with a $14 million bounty on his head, Wick must fight his way through the streets of New York as he becomes the target of the world's most ruthless killers.",
                'director' => 'Chad Stahelski',
                'release' => 'May 9, 2019',
                'genre' => 'Thriller/Mystery',
                'language' => 'English',
                'trailer_link' => 'https://www.youtube.com/embed/pU8-7BX9uxs',
                'poster' => 'jw3.jpg',
                'picture_1' => 'jw01.jpg',
                'picture_2' => 'jw02.jpg',
                'picture_3' => 'jw03.jpeg',
                'picture_4' => 'jw04.jpg',
                'picture_5' => 'jw05.jpg',
                'picture_6' => 'jw06.jpg',
            ],

            [
                'title' => 'Godzilla: King of the Monsters',
                'description' => "Members of the crypto-zoological agency Monarch face off against a battery of god-sized monsters, including the mighty Godzilla, who collides with Mothra, Rodan, and his ultimate nemesis, the three-headed King Ghidorah. When these ancient super-species-thought to be mere myths-rise again, they all vie for supremacy, leaving humanity's very existence hanging in the balance.",
                'director' => 'Michael Dougherty',
                'release' => 'May 13, 2019',
                'genre' => 'Fantasy/Sci-fi',
                'language' => 'English',
                'trailer_link' => 'https://www.youtube.com/embed/QFxN2oDKk0E',
                'poster' => 'godzilla.jpg',
                'picture_1' => 'godzilla1.jpg',
                'picture_2' => 'godzilla2.jpg',
                'picture_3' => 'godzilla3.jpg',
                'picture_4' => 'godzilla4.jpg',
                'picture_5' => 'godzilla5.jpg',
                'picture_6' => 'godzilla6.jpg',
            ],

            [
                'title' => 'Avengers: Infinity War',
                'description' => "Iron Man, Thor, the Hulk and the rest of the Avengers unite to battle their most powerful enemy yet -- the evil Thanos. On a mission to collect all six Infinity Stones, Thanos plans to use the artifacts to inflict his twisted will on reality. The fate of the planet and existence itself has never been more uncertain as everything the Avengers have fought for has led up to this moment.",
                'director' => 'Anthony Russo, Joe Russo',
                'release' => 'April 23, 2018',
                'genre' => 'Fantasy/Sci-fi',
                'language' => 'English',
                'trailer_link' => 'https://www.youtube.com/embed/6ZfuNTqbHE8',
                'poster' => 'iw.jpg',
                'picture_1' => 'iw1.jpg',
                'picture_2' => 'iw2.jpg',
                'picture_3' => 'iw3.jpg',
                'picture_4' => 'iw4.jpg',
                'picture_5' => 'iw5.jpg',
                'picture_6' => 'iw6.jpg',
            ],

            [
                'title' => 'Pokémon Detective Pikachu',
                'description' => "Ace detective Harry Goodman goes mysteriously missing, prompting his 21-year-old son, Tim, to find out what happened. Aiding in the investigation is Harry's former Pokémon partner, wise-cracking, adorable super-sleuth Detective Pikachu. Finding that they are uniquely equipped to work together, as Tim is the only human who can talk with Pikachu, they join forces to unravel the tangled mystery.",
                'director' => 'Rob Letterman',
                'release' => 'May 3, 2019',
                'genre' => 'Fantasy/Mystery',
                'language' => 'English',
                'trailer_link' => 'https://www.youtube.com/embed/bILE5BEyhdo',
                'poster' => 'poke.jpg',
                'picture_1' => 'poke1.jpeg',
                'picture_2' => 'poke2.jpg',
                'picture_3' => 'poke3.jpg',
                'picture_4' => 'poke4.jpg',
                'picture_5' => 'poke5.jpg',
                'picture_6' => 'poke6.jpeg',
            ],

            [
                'title' => 'Toy Story 4',
                'description' => "Woody, Buzz Lightyear and the rest of the gang embark on a road trip with Bonnie and a new toy named Forky. The adventurous journey turns into an unexpected reunion as Woody's slight detour leads him to his long-lost friend Bo Peep. As Woody and Bo discuss the old days, they soon start to realize that they're worlds apart when it comes to what they want from life as a toy.",
                'director' => 'Josh Cooley',
                'release' => 'June 11, 2019',
                'genre' => 'Fantasy/Adventure',
                'language' => 'English',
                'trailer_link' => 'https://www.youtube.com/embed/Pl9JS8-gnWQ',
                'poster' => 'toy.jpg',
                'picture_1' => 'toy1.jpg',
                'picture_2' => 'toy2.jpg',
                'picture_3' => 'toy3.jpg',
                'picture_4' => 'toy4.jpg',
                'picture_5' => 'toy5.jpg',
                'picture_6' => 'toy6.jpg',
            ],
        ];

        DB::table('movies')->insert($movies);
    }
}
