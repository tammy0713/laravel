<?php

namespace App\Http\Controllers\frontend\metershop;
use App\Http\Controllers\Controller;
use App\Service\IndexService;
use DB;
use Illuminate\Http\Request;

class MetershopController extends Controller
{
     public function index()
     {
         $select=new IndexService();
         //商品中间展示
         $indexData=$select->selectData();
         //配件展示
         $footData=$select->selectFoot();
         //商品分类展示
         $goodTypeData=$select->selectNnameData();
         //商品详细展示
         $goodDetailsData=$select->selectDetails();
         //var_dump($goodDetailsData);die();
         return view('frontend/metershop/index',['data'=>$indexData,'data2'=>$footData,'data3'=>$goodTypeData,'data4'=>$goodDetailsData]);
     }
    public function show()
    {
        return view('frontend/metershop/show');
    }
    public function wiew()
    {
        return view('frontend/metershop/wiew');
    }
}