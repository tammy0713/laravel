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
   public function insertLog($log)
   {
      $res=$this->insert($log);
       if($res){
           return true;
       }else{
           return false;
       }
   }
    /*
     * 查询日志表一条数据
     */
    public function findLogOne($rId)
    {
       $getId=$this->where(['r_get_id'=>$rId])->get();
       return $getId;
    }
    /*
     * 修改指定id的数据
     */
    public function upTime($log,$l_id)
    {
       $updateTime=$this->where(['l_id'=>$l_id])->update($log);
        return $updateTime;
    }
}