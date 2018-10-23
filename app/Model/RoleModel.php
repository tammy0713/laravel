<?php
namespace app\Model;

use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    protected $table = 'role';
    public function select()
    {
        $roleMsg=$this->get();
        return $roleMsg;
    }
    public function add($roleAddData)
    {
        $roleData=['r_name'=>$roleAddData['r_name']];
        $roleResult = $this->insertGetId($roleData);
        return $roleResult;
    }
    public function deleteOne($r_id)
    {
        $deleteResult=$this->where(['r_id'=>$r_id])->delete();
        return $deleteResult;
    }
    /*
  * 修改
  */
    public function updateSelectOne($r_id)
    {
        $updateSelectOne=$this->where(['r_id'=>$r_id])->first();
        return $updateSelectOne;
    }
    public function roleUpdate($roleUpdate)
    {
        $updateOne=$this->where(['r_id'=>$roleUpdate['r_id']])->update(['r_name'=>$roleUpdate['r_name']]);
        return $updateOne;
    }
}