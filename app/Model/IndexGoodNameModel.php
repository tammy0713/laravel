<?php
namespace app\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class IndexGoodNameModel extends Model
{
    protected $table='shop_good_type';
    public function selectGoodType()
    {
        $selectGoodType = $this->get()->toArray();
        return $selectGoodType;
    }
    /*
     * 商品详情展示
     */
    public function selectGoodDetails()
    {
        $selectDataAll=DB::table('shop_good_details')->get()->toArray();
        return $selectDataAll;
    }

}