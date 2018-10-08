<?php

namespace app\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserModel extends Model
{
//    public function index($data)
//    {
//        //$data里面有传递过来的数据 进行入库
//        $user_data=[
//            'name'=>$data['name'],
//            'pwd'=>$data['pwd'],
//        ];
//        $res=DB::table('user')->insert($user_data);
//        return $res;
//    }
//    public function select()
//    {
//        $select_data=DB::table('user')->get()->toArray();
//        return $select_data;
//    }
    protected $table='login_register';
    /*
     *用户注册
     * */
    public function r_insert($resg_data)
    {
       $resg_data_insert=[
        'r_name'=>$resg_data['email'],
        'r_pwd'=>$resg_data['password'],
        'r_pwd2'=>$resg_data['repassword'],
        'r_phone'=>$resg_data['tel']
       ];
        //邮箱存在或者手机号存在 查询一条
        $res=$this->where(['r_name'=>$resg_data['email']])->orWhere(['r_phone'=>$resg_data['tel']])->first();
        if(empty($res))
        {
            //如果为空进行添加
            $this->insert($resg_data_insert);
            return true;
        }else{
            return false;
        }
    }
    /*
     * 用户登录
     */
    public function login_one($login_data)
    {
        $name=$login_data['r_name'];
        //邮箱或者手机号登录  验证密码
        $res=$this->where(['r_name'=>$login_data['r_name']])->orWhere(['r_phone'=>$login_data['r_name']])->where(['r_pwd'=>$login_data['r_pwd']])->first();
        if($res)
        {
            return true;
        }else{
            return false;
        }
    }
    /*
     * 查询多条数据
     */
    public function select_all()
    {
        $select_all=DB::table('login_register')->get()->toArray();
        return $select_all;
    }

}