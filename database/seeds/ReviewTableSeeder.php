<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now()->toDateTimeString();

        $reviews =
        [
            [
                'movie_name' => 'Godzilla: King of the Monsters',
                'user_name' => 'Pola',
                'title' => 'Great Movie',
                'review' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'rating' => '10',
                'reviewedByAdmin' => '1',
                'created_at' => $date,       
                'updated_at' => $date
            ],

            [
                'movie_name' => 'Godzilla: King of the Monsters',
                'user_name' => 'Cooke',
                'title' => 'Fantastic Movie',
                'review' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'rating' => '9.5',
                'reviewedByAdmin' => '1',
                'created_at' => $date,       
                'updated_at' => $date
            ],

            [
                'movie_name' => 'Avengers: Endgame',
                'user_name' => 'Pola',
                'title' => 'Great Movie',
                'review' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'rating' => '10',
                'reviewedByAdmin' => '1',
                'created_at' => $date,       
                'updated_at' => $date
            ],

            [
                'movie_name' => 'Avengers: Endgame',
                'user_name' => 'Cooke',
                'title' => 'Fantastic Movie',
                'review' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'rating' => '9.5',
                'reviewedByAdmin' => '1',
                'created_at' => $date,       
                'updated_at' => $date
            ],

            [
                'movie_name' => 'John Wick: Chapter 3 – Parabellum',
                'user_name' => 'Pola',
                'title' => 'Great Movie',
                'review' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'rating' => '10',
                'reviewedByAdmin' => '1',
                'created_at' => $date,       
                'updated_at' => $date
            ],

            [
                'movie_name' => 'John Wick: Chapter 3 – Parabellum',
                'user_name' => 'Cooke',
                'title' => 'Fantastic Movie',
                'review' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'rating' => '9.5',
                'reviewedByAdmin' => '1',
                'created_at' => $date,       
                'updated_at' => $date
            ],

            [
                'movie_name' => 'Avengers: Infinity War',
                'user_name' => 'Pola',
                'title' => 'Great Movie',
                'review' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'rating' => '10',
                'reviewedByAdmin' => '1',
                'created_at' => $date,       
                'updated_at' => $date
            ],

            [
                'movie_name' => 'Avengers: Infinity War',
                'user_name' => 'Cooke',
                'title' => 'Fantastic Movie',
                'review' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'rating' => '9.5',
                'reviewedByAdmin' => '1',
                'created_at' => $date,       
                'updated_at' => $date
            ],

            [
                'movie_name' => 'Pokémon Detective Pikachu',
                'user_name' => 'Pola',
                'title' => 'Great Movie',
                'review' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'rating' => '10',
                'reviewedByAdmin' => '1',
                'created_at' => $date,       
                'updated_at' => $date
            ],

            [
                'movie_name' => 'Pokémon Detective Pikachu',
                'user_name' => 'Cooke',
                'title' => 'Fantastic Movie',
                'review' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'rating' => '9.5',
                'reviewedByAdmin' => '1',
                'created_at' => $date,       
                'updated_at' => $date
            ],

            [
                'movie_name' => 'Toy Story 4',
                'user_name' => 'Pola',
                'title' => 'Great Movie',
                'review' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'rating' => '10',
                'reviewedByAdmin' => '1',
                'created_at' => $date,       
                'updated_at' => $date
            ],

            [
                'movie_name' => 'Toy Story 4',
                'user_name' => 'Cooke',
                'title' => 'Fantastic Movie',
                'review' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'rating' => '9.5',
                'reviewedByAdmin' => '1',
                'created_at' => $date,       
                'updated_at' => $date
            ],
        ];

        DB::table('reviews')->insert($reviews);
    }
}
