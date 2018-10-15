<?php
namespace App\Service;

use App\Model\IndexModel;
use App\Model\IndexGoodDetailsModel;
use App\Model\IndexfootModel;
use App\Model\IndexGoodNameModel;
use Illuminate\Support\Facades\Redis;
class IndexService
{
    /*
     *商品中间展示页面调用
     */
    public function selectData()
    {
        if (!Redis::get('arr')) {
            $service = new IndexModel();
            $resDate = $service->selectAll();
            Redis::set('arr', json_encode($resDate));
            $result = Redis::get('arr');
        } else {
            //Redis::del('arr');
            $result = Redis::get('arr');
        }
        $indexData = json_decode($result, true);
        if ($indexData) {
            return $indexData;
        } else {
            return false;
        }

    }
    /*
     * 商品配件展示
     */
    public function selectFoot()
    {
        if (!Redis::get('arr1')) {
            $service = new IndexfootModel();
            $resDate = $service->selectAll();
            Redis::set('arr1', json_encode($resDate));
            $result = Redis::get('arr1');
        } else {
            //Redis::del('arr');
            $result = Redis::get('arr1');
        }
        $footData = json_decode($result, true);
        if ($footData) {
            return $footData;
        } else {
            return false;
        }
    }

    /*
     * 商品分类展示
     */
    public function selectNnameData()
    {
        if (!Redis::get('arr2')) {
            $service = new IndexGoodNameModel();
            $resDate = $service->selectGoodType();
            Redis::set('arr2', json_encode($resDate));
            $result = Redis::get('arr2');
        } else {
            //Redis::del('arr');
            $result = Redis::get('arr2');
        }
        $goodData = json_decode($result, true);
        if ($goodData) {
            return $goodData;
        } else {
            return false;
        }
    }
    /*
     * 商品详情展示
     */
    public function selectDetails()
    {
        if (!Redis::get('arr3')) {
            $service = new IndexGoodNameModel();
            $detailsDate = $service->selectGoodDetails();
            Redis::set('arr3', json_encode($detailsDate));
            $result = Redis::get('arr3');
        } else {
            $result = Redis::get('arr3');
        }
        $DetailSdata = json_decode($result, true);
        if ($DetailSdata) {
            return $DetailSdata;
        } else {
            return false;
        }
    }
}