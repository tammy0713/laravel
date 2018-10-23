<?php
namespace app\Model;

use Illuminate\Database\Eloquent\Model;

class ButtonModel extends Model
{
    protected $table = 'button';
    public $timestamps=false;
    public function select()
    {
        $buttonMsg = $this->get();
        return $buttonMsg;
    }
    /*
     * 按钮权限
     */
    public function dateOne($resource_id,$id)
    {
        $buttonMsg = $this->whereIn('b_id',$resource_id)->where(['b_meun_id'=>$id])->get()->toArray();
        return $buttonMsg;
    }
    public function menuOne($id)
    {
        $meunMsg = $this->where(['b_meun_id'=>$id])->get()->toArray();
        return $meunMsg;
    }
    public function add($buttonAddData,$m_id)
    {
        $buttonData = [
            'b_name'=>$buttonAddData['b_name'],
            'b_meun_id'=>$m_id['menu_id']
        ];
        $roleResult = $this->insertGetId($buttonData);
        return $roleResult;
    }
    public function deleteOne($b_id)
    {
        $deleteResult=$this->where(['b_id'=>$b_id])->delete();
        return $deleteResult;
    }
    /*
    * 修改
    */
    public function updateSelectOne($b_id)
    {
        $updateSelectOne=$this->where(['b_id'=>$b_id])->first();
        return $updateSelectOne;
    }
    public function buttonUpdate($roleUpdate)
    {
        $data=[
            'b_meun_id'=>$roleUpdate['b_meun_id'],
            'b_name'=>$roleUpdate['b_name']
        ];
        $updateOne=$this->where(['b_id'=>$roleUpdate['b_id']])->update($data);
        return $updateOne;
    }

}