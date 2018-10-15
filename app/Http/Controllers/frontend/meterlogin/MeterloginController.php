<?php

namespace App\Http\Controllers\frontend\meterlogin;

use App\Http\Controllers\Controller;
use App\Service\UserService;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Request;
use Session;
use App\Jobs\Test;

class MeterloginController extends Controller
{
    public function login()
    {
        return view('frontend/meterlogin/login');
    }
    public function selfInfo()
    {
        return view('frontend/meterlogin/selfInfo');
    }
    public function register()
    {
        return view('frontend/meterlogin/register');
    }
    /*
     * 用户注册
     */
    public function registerDo(Request $request)
   {
       $resgData=$request->input();
       $rules=[
           'captcha'=>'required|captcha',
           'name'=>'unique:login_register,r_name',
           'r_phone'=>'unique:login_register,r_phone',
       ];
       $validata=Validator::make($resgData,$rules);
       if(!$validata->fails()){
           return view('msg.msg',['msg'=>'验证码错误','url'=>'register']);
       }
       $service=new UserService();
       //调用注册添加的方法
       $result=$service->registerInsert($resgData);
       if($result) {
           return redirect('frontend/metershop/index');
        }
       if($result==1) {
           return view('msg.msg',['msg'=>'邮箱和手机号唯一','url'=>'register']);
        }
       if($result) {
           return view('msg.msg',['msg'=>'信息添加失败','url'=>'register']);
       }
   }
    /*
     * 用户退出
     */
    public function regDestroy()
    {
        $session = Session::forget('msg');
        return redirect('frontend/meterlogin/register');
    }
    /*
     * 登录
     */
    public function loginDo(Request $request)
    {
        $loginData=$request->input();
        //规则验证码
        $rules=[
            'captcha'=>'required|captcha',
            'name'=>'unique:login_register,r_name',
            'r_phone'=>'unique:login_register,r_phone',
        ];
        $validata=Validator::make($loginData,$rules);
        if(!$validata->fails()){
            return view('msg.msg',['msg'=>'验证码错误','url'=>'login']);
        }
        //实例化Service
        $loginFindData = new UserService();
        //调用查询数据方法
        $find = $loginFindData->login1($loginData);
        if($find == 4){
            return redirect('frontend/metershop/index');
        }
        if($find == 1){
            return view('msg.msg',['msg'=>'用户名或密码错误','url'=>'login']);
        }
        if($find == 2){
            return view('msg.msg',['msg'=>'日志表添加错误','url'=>'login']);
        }
        if($find == 3){
            return view('msg.msg',['msg'=>'密码错误','url'=>'login']);
        }
    }
}