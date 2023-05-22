<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
                'nameSurename' => 'Admin',
                'cardno' => ' ',
                'mail' => ' ',
                'tel' => ' ',
                'username' => 'Admin',
                'password' => '1234',
                'profilurl' => '',
                'görev' => 'Admin',
                'admin' => true,
            ],

        ];
        foreach ($users as $userData) {
            Users::create($userData);
        }

    }
}
