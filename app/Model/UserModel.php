<?php

namespace app\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserModel extends Model
{
    protected $table='login_register';
    /*
     *用户注册
     */
    public function registerAdd($resgData)
    {
        $md5Pwd = md5($resgData['password']);
        $resgDataInsert=[
           'r_name'=>$resgData['name'],
           'r_pwd'=>$md5Pwd,
           'r_pwd2'=>$resgData['repassword'],
           'r_phone'=>$resgData['r_phone']
       ];
        $result = $this->insertGetId($resgDataInsert);
        return $result;
    }
    /*
     * 注册提交过来的数据是否存在
     */
    public function registerIsset($resgData)
    {
        $resgOne=$this->where(['r_name'=>$resgData['name']],['r_phone'=>$resgData['r_phone']])->first();
        return $resgOne;
    }
    /*
     * 注册通过id查询数据
     */
    public function registerOne($insertOne)
    {
        $oneData=$this->where(['r_id'=>$insertOne])->first();
        return $oneData;
    }
    /*
     * 用户登录
     */
    public function loginSelectOne($login_data)
    {
        //邮箱或者手机号登录  验证密码
        $loginMsg=$this->where(['r_name'=>$login_data['r_name']])->orWhere(['r_phone'=>$login_data['r_name']])->first();
        return $loginMsg;
    }
    /*
     * 修改状态
     */
    public function loginState($loginDataOne)
    {
        $upState = $this->where(['r_id'=>$loginDataOne['r_id']])->update(['r_state'=>1]);
        return $upState;
    }
    /*
     * 查询多条数据
     */
    public function selectAll()
    {
        $select_all=DB::table('login_register')->get()->toArray();
        return $select_all;
    }

}