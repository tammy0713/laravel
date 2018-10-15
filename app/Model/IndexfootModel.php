<?php
namespace app\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class IndexfootModel extends Model
{
    protected $table='shop_foot';
    public function selectAll()
    {

       $selectDataAll=$this->get()->toArray();
       return $selectDataAll;
    }
}