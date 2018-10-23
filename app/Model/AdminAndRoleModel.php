<?php
namespace app\Model;

use Illuminate\Database\Eloquent\Model;

class AdminAndRoleModel extends Model
{
    /*
     * 用户角色展示
     */
    protected $table='admin_role';
    public function selectOne($returnLoginData)
    {
        $adminRoleOne=$this->where(['a_id'=>$returnLoginData['a_id']])->get()->toArray();
        return $adminRoleOne;
    }
    /*
     *查询用户对应的权限
     */
    public function SelectRoleOne($a_id)
    {
        $Role=$this->where(['a_id'=>$a_id])->get()->toArray();
        return $Role;
    }
    /*
     * 删除用户对应的权限
     */
    public function deleteOne($a_id)
    {
        $delete=$this->where(['a_id'=>$a_id])->delete();
        return $delete;
    }
    public function deleteRid($r_id)
    {
        $delete=$this->where(['r_id'=>$r_id])->delete();
        return $delete;
    }
    public function adminRole($v,$addResult)
    {
        $roleData=[
            'a_id'=>$addResult,
            'r_id'=>$v,
        ];
        $roleResult = $this->insert($roleData);
        return $roleResult;

    }
}