<?php

namespace App\Http\Controllers;

use App\Models\PDKSdevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DeviceSelectController extends Controller
{
    public function data()
    {
        $value = PDKSdevice::get();
        foreach ($value as $val) {
            $data[] = [
                "id" => $val->id,
                "entry_ip" => $val->entry_ip,
                "exit_ip" => $val->exit_ip,
                "entry_port" => $val->entry_port,
                "exit_port" => $val->exit_port,
                "door_name" => $val->door_name,

            ];
        }
        return view("deviceSelect", ["data" => $data, "sayac" => 1]);
    }
    public function save(Request $request)
    {
        // dd($request);
        $door_id = $request->input("door_id");
        $entry_ip = $request->input("entry_ip");
        $entry_port = $request->input("entry_port");
        $exit_ip = $request->input("exit_ip");
        $exit_port = $request->input("exit_port");
        $door_name = $request->input("door_name");

        
            if(isset($entry_ip)){
                if(isset($entry_port)){
                    if(isset($exit_ip)){
                        if(isset($exit_port)){
                            if(isset($door_name)){
                                $data = [
                                    "entry_ip" => $entry_ip,
                                    "exit_ip" => $exit_ip,
                                    "entry_port" => $entry_port,
                                    "exit_port" => $exit_port,
                                    "door_name" => $door_name,
                                ];
                                PDKSdevice::where("id", $door_id)->update($data);
                                return redirect()->route("deviceSelect");
                            }else{
                            $htmlMessage = '<div class="alert alert-danger" role="alert">
                            Kapı adı giriniz .
                          </div>';
                                Session::flash('message', $htmlMessage);
                                return redirect()->route("deviceSelect");
                            }
                        }else{
                            $htmlMessage = '<div class="alert alert-danger" role="alert">
                            Çıkış portu giriniz .
                          </div>';
                                Session::flash('message', $htmlMessage);
                                return redirect()->route("deviceSelect");
                            }
                    }else{
                        $htmlMessage = '<div class="alert alert-danger" role="alert">
                        Çıkış ipsini giriniz .
                      </div>';
                            Session::flash('message', $htmlMessage);
                            return redirect()->route("deviceSelect");
                        }
                }else{
                    $htmlMessage = '<div class="alert alert-danger" role="alert">
                    Giriş portunu giriniz .
                  </div>';
                        Session::flash('message', $htmlMessage);
                        return redirect()->route("deviceSelect");
                    }
            }else{
                $htmlMessage = '<div class="alert alert-danger" role="alert">
                Giriş ipsini giriniz .
              </div>';
                    Session::flash('message', $htmlMessage);
                    return redirect()->route("deviceSelect");
                }
        

       
    }
}
