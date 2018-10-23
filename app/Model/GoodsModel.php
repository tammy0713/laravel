<?php
namespace app\Model;

use Illuminate\Database\Eloquent\Model;

class GoodsModel extends Model
{
    protected $table = 'goods';
    public $timestamps=false;
    /*
     *
     */
    public function select()
    {
        $selectGoodsData = $this->get();
        return $selectGoodsData;
    }
}