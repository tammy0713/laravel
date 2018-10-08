<?php

namespace App\Http\Controllers\frontend\meterlogin;

use App\Http\Controllers\Controller;
use App\Service\UserService;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Request;

class MeterloginController extends Controller
{
    public function login()
    {
        return view('frontend/meterlogin/login');
    }
    public function self_info()
    {
        return view('frontend/meterlogin/self_info');
    }
    public function register()
    {
        return view('frontend/meterlogin/register');
    }
    /*
     * 用户注册
     */
    public function register_do(Request $request)
   {
     $resg_data=$request->input();
       $rules=['captcha'=>'required|captcha'];
     $validata=Validator::make($resg_data,$rules);
     if($validata->fails())
     {

         return redirect('frontend/meterlogin/register');
     }
     $service=new UserService();
     $res=$service->register_insert($resg_data);
     if($res==true)
       {
           \Mail::send('email.code', [], function ($message) { $message->to(['583685877@qq.com'])->subject('欢迎加入');});
           return redirect('frontend/meterlogin/login');
       }else{
          return redirect('frontend/meterlogin/register');
     }
   }
    /*
     * 登录
     */
    public function login_do(Request $request)
    {
        $login_data=$request->input();
        $rules=['captcha'=>'required|captcha'];
        $validata=Validator::make($login_data,$rules);
        if(!$validata->fails())
        {
            echo "验证码错误";die();
            return redirect('frontend/meterlogin/login');
        }
        $login_find_data = new UserService();
        $find=$login_find_data->login_find($login_data);
        if($find==true)
        {
            return redirect('frontend/metershop/index');
        }else{
            echo "错误";die();
            return redirect('frontend/meterlogin/login');
        }
    }
}