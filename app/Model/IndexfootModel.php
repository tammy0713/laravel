<?php
namespace app\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class IndexfootModel extends Model
{
    protected $table='shop_foot';
    public function select_all()
    {
        //判断redis里面是否存在
        if(!Redis::get('arr1'))
        {
            $select_data_all=$this->get()->toArray();
            Redis::set('arr1',json_encode($select_data_all));
            $data1=Redis::get('arr1');
            return $data1;
        }else{
            Redis::del('arr');
            $data1=Redis::get('arr1');
            return $data1;
        }

    }
}