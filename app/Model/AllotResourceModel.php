<?php
namespace app\Model;

use Illuminate\Database\Eloquent\Model;

class AllotResourceModel extends Model
{
    protected $table='allot_resource';
    public function selectOne($r_id)
    {
        //var_dump($r_id);die();
        $allotOne=$this->whereIn('f_role_id',$r_id)->get()->toArray();
        return $allotOne;
    }
    public function allotResource($v,$result,$type)
    {
        $data=[
            'f_role_id'=>$result,
            'f_resource_id'=>$v,
            'f_type'=>$type,
        ];
        $roleResult = $this->insert($data);
        return $roleResult;
    }
    public function roleMenu($r_id)
    {
        $allotOne=$this->where('f_role_id',$r_id)->get()->toArray();
        return $allotOne;
    }
    public function deleteOne($r_id)
    {
        $delete=$this->where(['f_role_id'=>$r_id])->delete();
        return $delete;
    }
    public function buttonMenu()
    {
        $buttonMenu=$this->where(['f_type'=>0])->get()->toArray();
        return $buttonMenu;
    }
}