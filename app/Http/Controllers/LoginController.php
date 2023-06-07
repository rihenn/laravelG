<?php

namespace App\Http\Controllers;

use App\Models\PDKSwebUsers;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function login(Request $request){
        
        $userName = $request->input('login');
        $pass = $request->input('password');
      
        
        $users = PDKSwebUsers::select("id","user_name" , "password", "mail","admin")->get();
    
        foreach($users as $user)
        {
            $id = $user->id;
        
            $admin = $user->admin;
          
            $mail = $user->mail;
            
            $username = $user->user_name;
            $password = $user->password;
            

            if($userName == $username  && $pass == $password){
                
               
                Session::put('sid', $id);
                Session::put('adminlik', $admin);
                
                if($admin == 1){
                    return redirect()->route('deviceSelect');
                }

                return redirect()->route('anasayfa');
            }elseif($userName == $mail  && $pass == $password){

                Session::put('sid', $id);
                Session::put('adminlik', $admin);

                if($admin == 1){
                    return redirect()->route('deviceSelect');
                }

                return redirect()->route('anasayfa');
                
            } 
                
            
        }
        $htmlMessage = '<div class="alert alert-danger" role="alert">
        kullanıcı adı ve ya sifreniz yanlış .
       </div>';
             Session::flash('message', $htmlMessage);
        return redirect()->back();
    }
}
