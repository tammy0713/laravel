<?php
namespace app\Model;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    protected $table='admin';
    public function adminOne($loginData)
    {
        //var_dump($loginData);die();
        $loginMsg=$this->where(['a_email'=>$loginData['email'],'a_name'=>$loginData['name']])->first();
        return $loginMsg;
    }
    /*
     * 判断是否有效
     */
    public function adminVaild()
    {
       $adminVaild=$this->where(['a_is_valid'=>1])->first();
        return $adminVaild;
    }
    /*
     * 修改时间
     */
    public function updateTime($returnLoginData)
    {
        $adminVaild=$this->where(['a_id'=>$returnLoginData['a_id']])->update(['updated_at'=>date('Y-m-d H:i:s')]);
        return $adminVaild;
    }
    /*
     * 查询所有数据
     */
    public function select()
    {
        $selectData=$this->paginate(2);
        return $selectData;
    }
    /*
     * 添加
     */
    public function add($adminAddData)
    {

        $md5Pwd = md5($adminAddData['a_pwd']);
        $addData=[
            'a_name'=>$adminAddData['a_name'],
            'a_pwd'=>$md5Pwd,
            'a_email'=>$adminAddData['a_email'],
            'a_is_valid'=>$adminAddData['a_is_valid'],
            'a_is_root'=>$adminAddData['a_is_root']
        ];
        $addResult = $this->insertGetId($addData);
        return $addResult;
    }
    /*
     * 删除
     */
    public function deleteOne($a_id)
    {
        $deleteResult=$this->where(['a_id'=>$a_id])->delete();
        return $deleteResult;
    }
    /*
     * 修改
     */
    public function updateSelectOne($a_id)
    {
        $updateSelectOne=$this->where(['a_id'=>$a_id])->first();
        return $updateSelectOne;
    }
    public function updateOne($adminUpdate)
    {
        $updateData=[
            'a_name'=>$adminUpdate['a_name'],
            'a_email'=>$adminUpdate['a_email'],
            'a_is_valid'=>$adminUpdate['a_is_valid'],
            'a_is_root'=>$adminUpdate['a_is_root']
        ];
        $updateOne=$this->where(['a_id'=>$adminUpdate['a_id']])->update($updateData);
        return $updateOne;
    }
    public function updateState($adminUpState)
    {
        $updateOne=$this->where(['a_id'=>$adminUpState['a_id']])->update(['a_is_valid'=>$adminUpState['a_is_valid']]);
        return $updateOne;
    }

}