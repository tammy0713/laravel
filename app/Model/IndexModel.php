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
    public function selectAll()
    {
        $selectDataAll=$this->get()->toArray();
        return $selectDataAll;
    }
}