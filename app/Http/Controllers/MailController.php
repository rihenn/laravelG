<?php

namespace App\Http\Controllers;

use App\Models\PDKSpasswordReset;
use App\Models\PDKSwebUsers;


use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;



class MailController extends Controller
{
    public function send(Request $request)
    {
        
       
        $mail = $request->input('gmail');
        $sifrelenmiş_gmail=password_hash($mail,PASSWORD_DEFAULT);
        
        $veriler = PDKSwebUsers::where("mail", "=", $mail)
        ->get();
    foreach ($veriler as  $value) {
   
        $eposta    = $value->mail;
        $ad_soyad = $value->name_surname;
       
    }
        if (isset($eposta)) {
       
            $url='?mail='.$sifrelenmiş_gmail;

          
        $array =[
          'name'=>$ad_soyad,
         
          'date' => date("y-m-d"), 
          "url"=>$url
        ];
        PDKSpasswordReset::create([
            "mail"=>$mail,
            "refresh_token"=>"$sifrelenmiş_gmail",
            "refresh_status"=>1

            
        ]);
        Mail::send("email.test", $array , function ($message)use ($mail){
            $message->subject("Sifre Yenileme Talebi");
            $message->to($mail);
          
            
        });
       
        return view("login");
    }if(isset($mail)) {
        
        $mesaj = ' <div class="alert alert-danger"><strong>UYARI!</strong> Mail sistemimizde kayıtlı bulunmamaktadır.</div>';
        return view("mailGonder",["mesaj"=>$mesaj]);
    }else{
        return view("mailGonder");
        
    }
}
}
