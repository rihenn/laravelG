<?php

namespace Database\Seeders;

use App\Models\Device;
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
                'name_surname' => 'Admin',
                'card_number' => ' ',
                'mail' => ' ',
                'telephone' => ' ',
                'user_name' => 'Admin',
                'password' => '1234',
                'profile_url' => '',
                'task' => '',
                'admin' => true,
        ];
        $devices = [
                'giris_ip'=> "192.168.1.123",
                'cikis_ip'=>"192.168.1.9",
                'giris_port'=>"4370",
                'cikis_port'=>"4370",
                'door_name'=>"Arge",
                'company_name'=>"Netvar"
        ];
         Users::create($users);
         Device::create($devices);
        
    }
}
