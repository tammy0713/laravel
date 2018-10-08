<?php
namespace App\Service;

use App\Model\UserModel;
use App\Model\UserlogModel;
class UserService
{
    public function index($data)
    {
        //实例化模型层
        $user=new usermodel();
        //调用模型层的方法
        $data=$user->index($data);
        return $data;
    }
    public function select()
    {
        $select=new UserModel();
        $select_data=$select->select();
        return $select_data;
    }

    //注册添加
    public function register_insert($resg_data)
    {
        $register_insert=new UserModel();
        $register_insert_data=$register_insert->r_insert($resg_data);
        return $register_insert_data;
    }
    /*
     * 用户登录
     */
    public function login_find($login_data)
    {
        $login_server=new UserModel();
        $login_data_one=$login_server->login_one($login_data);
        if($login_data_one==true)
        {
            $log_server=new UserlogModel();
            $res=$log_server->insert_log();
            if($res)
            {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

}