<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\log;


class MailController extends Controller
{
    public function send(Request $request)
    {
        Log::alert('Bir bilgi mesajı');
       
        $mail = $request->input('gmail');
        $sifrelenmiş_gmail=password_hash($mail,PASSWORD_DEFAULT);
        
        $veriler = DB::table("kullaniciler")
        ->where("mail", "=", $mail)
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
        DB::table('sifreyenileme')->insert([
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
