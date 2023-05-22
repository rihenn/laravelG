<?php

namespace App\Http\Controllers;

use App\Models\SifreKodModels;
use App\Models\Users;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;



class MailController extends Controller
{
    public function send(Request $request)
    {
        
       
        $mail = $request->input('gmail');
        $sifrelenmiş_gmail=password_hash($mail,PASSWORD_DEFAULT);
        
        $veriler = Users::where("mail", "=", $mail)
        ->get();
    foreach ($veriler as  $value) {
   
        $eposta    = $value->mail;
    }
        if (isset($eposta)) {
       
            $url='?mail='.$sifrelenmiş_gmail;

          
        $array =[
          'name'=>'Yusuf Can',
          'surname'=>'Yüce' ,
          'date' => date("y-m-d"), 
          "url"=>$url
        ];
        SifreKodModels::insert([
            "gmail"=>$eposta,
            "yenilemeKodu"=>"$sifrelenmiş_gmail",
            "durumu"=>1

            
        ]);
        Mail::send("email.test", $array , function ($message)use ($mail){
            $message->subject("Hoşgeldiniz");
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
