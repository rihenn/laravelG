<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\SifreKodModels;
use Illuminate\Support\Facades\DB;
class sifreYenilemeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   
        
        $adres = url()->previous();
        $kod = strstr($adres, '=', false);
        $kod1 = str_replace("=", " ", $kod); 
        $kod2 = str_replace("%24", "$", $kod1);
        $kod3 = str_replace("%2F", "/", $kod2);

        $kod4 = trim($kod3);
        

        $veriler = DB::table("sifreyenileme")->get();


        foreach ($veriler as $value) {
            $durumu = $value->durumu;
            $sifrekod =$value->yenilemeKodu;
            if ($sifrekod==$kod4) {
             
           
            if ($durumu == 0 ) {
                return redirect('Red1');
            }
           
        }
        }

       
       
        return $next($request);
    
}
}
