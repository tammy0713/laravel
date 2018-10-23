<?php
namespace app\Model;

use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    /*
     * 菜单展示
     */
    protected $table='menu';
    public $timestamps=false;
    public function selectAll($f_resource_id)
    {
        $menuMsg=$this->whereIn('m_id',$f_resource_id)->where(['is_menu'=>1])->get();
       // var_dump($menuMsg);die();
        return $menuMsg;
    }
    public function select()
    {
        $roleMsg=$this->orderBy('path')->get();
        return $roleMsg;
    }
    public function add($menuAddData)
    {
        $menuAdd=[
            'text'=>$menuAddData['text'],
            'p_id'=>$menuAddData['p_id'],
            'is_menu'=>$menuAddData['is_menu']
        ];
        $roleResult = $this->insertGetId($menuAdd);
        return $roleResult;
    }
    public function deleteOne($m_id)
    {
        $menuResult=$this->where(['m_id'=>$m_id])->delete();
        return $menuResult;
    }
    public function updateSelectOne($m_id)
    {
        $updateSelectOne=$this->where(['m_id'=>$m_id])->first();
        return $updateSelectOne;
    }
    public function menuUpdate($menuUpdate)
    {
        $menu=[
            'm_id'=>$menuUpdate['m_id'],
            'text'=>$menuUpdate['text'],
            'p_id'=>$menuUpdate['p_id'],
            'is_menu'=>$menuUpdate['is_menu']
        ];
        $updateOne=$this->where(['m_id'=>$menuUpdate['m_id']])->update($menu);
        return $updateOne;
    }
}