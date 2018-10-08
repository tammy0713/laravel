<?php
namespace app\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class IndexModel extends Model
{
    /*
     * 查询所有数据
     */
    protected $table='shop_index';
    public function select_all()
    {
        //判断redis里面是否存在
        if(!Redis::get('arr'))
        {
            $select_data_all=$this->get()->toArray();
            Redis::set('arr',json_encode($select_data_all));
            $data1=Redis::get('arr');
            return $data1;
        }else{
          Redis::del('arr');
           $data1=Redis::get('arr');
            return $data1;
        }

    }
}