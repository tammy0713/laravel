<?php
namespace app\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserlogModel extends Model
{
   protected $table='login_log';
    /*
     * 添加日志表
     */
   public function insert_log()
   {
       $log=[
           'l_login_ip'=>$_SERVER['REMOTE_ADDR'],
           'l_login_address'=>'北京海淀',
           'l_login_way'=>$_SERVER['HTTP_USER_AGENT'],
       ];
      $res=$this->insert($log);
       if($res)
       {
           return true;
       }else{
           return false;
       }
   }
}