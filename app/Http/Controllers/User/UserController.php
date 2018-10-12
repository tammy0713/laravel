<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Service\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //渲染页面
   public function index()
   {
      return view('user/add');
   }
    //接受的值
    public function add(Request $request)
    {
        //接受值
        $data=$request->post();
        //实例化服务层
        $service=new UserService();
        //调用服务层的方法 传递数据
        $a=$service->index($data);
        if($a)
        {
            return redirect('user/select');
        }
    }
    public function select()
    {
        $user_select = new UserService();
        $select=$user_select->select();
        return view('user/select',['select'=>$select]);
    }
}