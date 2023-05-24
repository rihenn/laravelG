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
        $admin = $request->input("admin");
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
                            if (isset($cardno)) {
                               
                            
                            if ($password == $passwordt) {
                                if ($admin == 1) {
                                    $adminlik = 1;
                                }else{
                                    $adminlik = 0;
                                }
                                 Users::create([
                                    
                                    'name_surname' => $name,
                                    'mail' => $mail,
                                    'user_name'=>$kulad,
                                    'profile_url'=>" ",
                                    'telephone' => $tel,
                                    'password' => $password,
                                    'card_number'=>$cardno,
                                    'task' => $görev, 
                                    'admin'=> $adminlik,
                                ]);
                                return redirect()->back();
                            }else{
                                $htmlMessage = '<div class="alert alert-danger" role="alert">
                                lütfen şifre alanlarını doğru giriniz alanını doldurunuz .
                              </div>';
                                    Session::flash('message', $htmlMessage);
                                    return redirect()->back();
                               }  
                            }else{
                                $htmlMessage = '<div class="alert alert-danger" role="alert">
                                lütfen kart no  alanını doldurunuz .
                              </div>';
                                    Session::flash('message', $htmlMessage);
                                    return redirect()->back();
                               }  
                            }else{
                                $htmlMessage = '<div class="alert alert-danger" role="alert">
                                lütfen kullanıcı adı giriniz alanını doldurunuz .
                              </div>';
                                    Session::flash('message', $htmlMessage);
                                    return redirect()->back();
                               }  
                        }else{
                            $htmlMessage = '<div class="alert alert-danger" role="alert">
                            lütfen görev alanını doldurunuz .
                          </div>';
                                Session::flash('message', $htmlMessage);
                                return redirect()->back();
                           }
                    }else{
                        $htmlMessage = '<div class="alert alert-danger" role="alert">
                        lütfen şifre tekrar alanını doldurunuz .
                      </div>';
                            Session::flash('message', $htmlMessage);
                            return redirect()->back();
                       }
                }else{
                    $htmlMessage = '<div class="alert alert-danger" role="alert">
                    lütfen şifre alanını doldurunuz .
                  </div>';
                        Session::flash('message', $htmlMessage);
                        return redirect()->back();
                   }
            }else{
                $htmlMessage = '<div class="alert alert-danger" role="alert">
                lütfen tel alanını doldurunuz .
              </div>';
                    Session::flash('message', $htmlMessage);
                    return redirect()->back();
               }
           }else{
            $htmlMessage = '<div class="alert alert-danger" role="alert">
            lütfen mail alanını doldurunuz .
          </div>';
                Session::flash('message', $htmlMessage);
                return redirect()->back();
           }
        }else{
            $htmlMessage = '<div class="alert alert-danger" role="alert">
            lütfen ad soyad alanını doldurunuz .
            </div>';
                  Session::flash('message', $htmlMessage);
                  return redirect()->back();
        }
       
        

    }
}
