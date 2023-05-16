<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Users;

class UserAddWebController extends Controller
{
    public function AddWebUser(Request $request)
    {
        $name = $request->input("name");
        $cardno = $request->input("cardno");
        $mail = $request->input("mail");
        $tel = $request->input("tel");
        $kulad = $request->input("kulad");
        $password = $request->input("password");
        $passwordt = $request->input("passwordt");
        $görev = $request->input("görev");
        if (isset($name)) {
           if (isset($mail)) {
            if (isset($tel)) {
                if (isset($password)) {
                    if (isset($passwordt)) {
                        if (isset($görev)) {
                            if (isset($kulad)) {
                            if (isset($kardno)) {
                               
                            
                            if ($password == $passwordt) {
                                $user = Users::create([
                                    'nameSurename' => $name,
                                    'cardname'=>null,
                                    'mail' => $mail,
                                    'username'=>$kulad,
                                    'tel' => $tel,
                                    'password' => $password,
                                    'cardno'=>$cardno,
                                    'görev' => $görev, 
                                    'admin'=> 0,
                                ]);
                                return redirect()->back();
                            }else{
                                $htmlMessage = '<div class="alert alert-danger" role="alert">
                                lütfen şifre alanlarını doğru giriniz alanını doldurunuz seçiniz.
                              </div>';
                                    Session::flash('message', $htmlMessage);
                                    return redirect()->back();
                               }  
                            }else{
                                $htmlMessage = '<div class="alert alert-danger" role="alert">
                                lütfen kart no giriniz alanını doldurunuz seçiniz.
                              </div>';
                                    Session::flash('message', $htmlMessage);
                                    return redirect()->back();
                               }  
                            }else{
                                $htmlMessage = '<div class="alert alert-danger" role="alert">
                                lütfen kullanıcı adı giriniz alanını doldurunuz seçiniz.
                              </div>';
                                    Session::flash('message', $htmlMessage);
                                    return redirect()->back();
                               }  
                        }else{
                            $htmlMessage = '<div class="alert alert-danger" role="alert">
                            lütfen görev alanını doldurunuz seçiniz.
                          </div>';
                                Session::flash('message', $htmlMessage);
                                return redirect()->back();
                           }
                    }else{
                        $htmlMessage = '<div class="alert alert-danger" role="alert">
                        lütfen şifre tekrar alanını doldurunuz seçiniz.
                      </div>';
                            Session::flash('message', $htmlMessage);
                            return redirect()->back();
                       }
                }else{
                    $htmlMessage = '<div class="alert alert-danger" role="alert">
                    lütfen şifre alanını doldurunuz seçiniz.
                  </div>';
                        Session::flash('message', $htmlMessage);
                        return redirect()->back();
                   }
            }else{
                $htmlMessage = '<div class="alert alert-danger" role="alert">
                lütfen tel alanını doldurunuz seçiniz.
              </div>';
                    Session::flash('message', $htmlMessage);
                    return redirect()->back();
               }
           }else{
            $htmlMessage = '<div class="alert alert-danger" role="alert">
            lütfen mail alanını doldurunuz seçiniz.
          </div>';
                Session::flash('message', $htmlMessage);
                return redirect()->back();
           }
        }else{
            $htmlMessage = '<div class="alert alert-danger" role="alert">
            lütfen ad soyad alanını doldurunuz seçiniz.
            </div>';
                  Session::flash('message', $htmlMessage);
                  return redirect()->back();
        }
       
        

    }
}
