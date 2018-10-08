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
         //商品中间展示
         $select=new IndexService();
         $res=$select->select_data();
         $res2=$select->select_foot();
         return view('frontend/metershop/index',['data'=>$res,'data2'=>$res2]);
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