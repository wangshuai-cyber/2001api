<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
class LoginController extends Controller
{
    public function login(){
        return view('login');
    }
    public function login_do(){
      $data=request()->all();
//        dd($data);
    $res=User::where('user_name','=',$data['user_name'])->first();
//       if(!$res){
//            return redirect('/login')->with('msg','用户名错误');
//        }
//        if($data['user_pwd']!=$res['user_pwd']){
//            return redirect('/login')->with('msg','密码错误');
//        }
//        if($res){
            return view('news');
//        }

    }

}
