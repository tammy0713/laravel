<?php
namespace app\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class IndexGoodDetailsModel extends Model
{
   protected $table='shop_good_details';
   public function selectGoodDetails()
   {
       $selectDataAll=$this->get()->toArray();
       return $selectDataAll;
   }
}