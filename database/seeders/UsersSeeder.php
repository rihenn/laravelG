<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name_surname' => 'Admin',
                'card_number' => ' ',
                'mail' => ' ',
                'telephone' => ' ',
                'user_name' => 'Admin',
                'password' => '1234',
                'profile_url' => '',
                'task' => 'Admin',
                'admin' => true,
            ],

        ];
        foreach ($users as $userData) {
            Users::create($userData);
        }
    }
}
