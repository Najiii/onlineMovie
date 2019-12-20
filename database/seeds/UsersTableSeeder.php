<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =
        [
            [
                'name' => 'Naji',
                'email' => 'naji1706d@aptechgdn.net',
                'email_verified_at' => NULL,
                'password' => bcrypt('admin'),
                'phone_no' => '12345678901',
                'credit_card' => '1234567890123456',
                'isAdmin' => 1,
                'hasBookedMovie' => 1,
                'remember_token' => NULL,
                'created_at' => NULL,       
                'updated_at' => NULL
            ],

            [
                'name' => 'Pola',
                'email' => 'Pola@polaworld.net',
                'email_verified_at' => NULL,
                'password' => bcrypt('123456789'),
                'phone_no' => '12345678902',
                'credit_card' => '1234567890123457',
                'isAdmin' => NULL,
                'hasBookedMovie' => NULL,
                'remember_token' => NULL,
                'created_at' => NULL,       
                'updated_at' => NULL
            ],

            [
                'name' => 'Cooke',
                'email' => 'Cooke@cookeland.net',
                'email_verified_at' => NULL,
                'password' => bcrypt('123456789'),
                'phone_no' => '12345678903',
                'credit_card' => '1234567890123458',
                'isAdmin' => NULL,
                'hasBookedMovie' => NULL,
                'remember_token' => NULL,
                'created_at' => NULL,       
                'updated_at' => NULL
            ]
        ];

        DB::table('users')->insert($users);
    }
}
