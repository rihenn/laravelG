<?php

namespace App\Http\Controllers;
use App\Models\Users;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        $kul = $request->input('login');
        $pass = $request->input('password');
    
        $users = Users::all();
        foreach($users as $user)
        {
            $id = $user->id;
            $name = $user->namesurname;
            $cardname = $user->cardname;
            $mail = $user->mail;
            $tel = $user->tel;
            $username = $user->username;
            $password = $user->password;
            $profilurl = $user->profilurl;
            $admin = $user->admin;

            if($kul == $username  && $pass == $password){
                return view('home');
            }
            if($kul == $mail  && $pass == $password){
                return view('home');
            }else{
                return view('login');
            }
        }
        
        

        
    }
}
