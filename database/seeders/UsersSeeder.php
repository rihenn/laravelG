<?php

namespace Database\Seeders;

use App\Models\Device;
use App\Models\PDKSdevice;
use App\Models\PDKSwebUsers;
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
                'entry_ip'=> "192.168.1.123",
                'exit_ip'=>"192.168.1.9",
                'entry_port'=>"4370",
                'exit_port'=>"4370",
                'door_name'=>"Arge",
                'company_name'=>"Netvar"
        ];
         PDKSwebUsers::create($users);
         PDKSdevice::create($devices);
        
    }
}
