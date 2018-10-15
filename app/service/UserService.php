<?php
namespace App\Service;

use App\Http\Controllers\Controller;
use App\Model\UserModel;
use App\Model\UserlogModel;
use Illuminate\foundation\Bus\DispatchesJobs;
use App\Jobs\Test;

use Session;
class UserService extends Controller
{
    /*
     * 注册添加
     * return 1 用户名手机号不唯一
     * return 2 添加失败
     * return 3 添加成功
     */
    public function registerInsert($resgData)
    {
        $registerInsert=new UserModel();
        $registertIsset=$registerInsert->registerIsset($resgData);
        if(empty($registertIsset)) {
            $insertOne=$registerInsert->registerAdd($resgData);
            if($insertOne)
            {
                $insertGetID=$registerInsert->registerOne($insertOne);
                //存session
                session(['msg'=>$insertGetID->toArray()]);
                //发邮件
                $this->dispatch(new Test($insertGetID->r_name));
                return $insertGetID;
                //\Mail::send('email.code', [], function ($message) { $message->to(['583685877@qq.com'])->subject('欢迎加入');});
            }else{
                return 2;
            }
        }else{
            return 1;

        }
    }
    /*
     * 用户登录
     * return 1 为邮箱手机号唯一
     * return 2 日志表添加错误
     * return 3 密码错误
     * return 4  登录正确
     */
    public function login1($loginData)
    {
        $loginServer=new UserModel();
        //登录查询一条数据数据
        $loginDataOne=$loginServer->loginSelectOne($loginData);
        if(!$loginDataOne)
        {
            return 1;
        }else{
            if($loginDataOne['r_pwd']==md5($loginData['r_pwd']))
            {
                //调用方法 修改状态
                $upState = $loginServer->loginState($loginDataOne);
                if($upState)
                {
                    //用户日志表
                    $logServer=new UserlogModel();
                    //取出来用户id
                    $rId=$loginDataOne['r_id'];
                    $getAll=$logServer->findLogOne($rId);
                    $log=[
                        'r_get_id'=>$rId,
                        'l_login_ip'=>$_SERVER['REMOTE_ADDR'],
                        'l_login_address'=>'北京海淀',
                        'l_login_way'=>$_SERVER['HTTP_USER_AGENT'],
                    ];
                    if(count($getAll)>=10){
                        //修改
                       $logServer->upTime($log,$getAll[0]->l_id);
                    }else{
                       //添加
                    $result=$logServer->insertLog($log);
                       if(!$result) {
                           return 2;
                       }
                    }
                    //成功存储session
                    session(['msg'=>$loginDataOne->toArray()]);
                     return 4;

                }
            }else{
                return 3;
            }

        }
    }

}