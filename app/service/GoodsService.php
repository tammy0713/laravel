<?php
namespace App\Service;

use Session;
use App\Model\GoodsModel;
class GoodsService
{
    /*
     * 商品展示
     */
    public function goodsSelect()
    {
        $goodsModel=new GoodsModel();
        $goosData=$goodsModel->select()->toArray();
        return $goosData;
    }
}