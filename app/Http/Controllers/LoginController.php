<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Support\Facades\Session;

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
          
            $mail = $user->mail;
     
            $username = $user->username;
            $password = $user->password;
            

            if($kul == $username  && $pass == $password){
                Session::put('id', $id);
                return redirect()->route('anasayfa');
            }
            if($kul == $mail  && $pass == $password){
                Session::put('id', $id);
                return redirect()->route('anasayfa');
            }else{
                return view('login');
            }
        }
        
        

        
    }
}
