<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Service\GoodsService;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Request;

class Goodscontroller extends Controller
{
    /*
     * 商品类
     */
    public function goodsShow()
    {
        $goodsService=new GoodsService();
        $goodsResult=$goodsService->goodsSelect();
        return view('goods/goodsShow',['data'=>$goodsResult]);
    }
    public function goodsAdd()
    {
        return view('goods/goodsAdd');
    }
    public function goodsAddDo(Request $request)
    {
        $goodsAddData = $request->input();
        $rules = [
            'g_name' => 'unique:goods,g_name',
        ];
        $validata = Validator::make($goodsAddData, $rules);
        if ($validata->fails()) {
            return view('msg.msg', ['msg' => '商品唯一', 'url' => 'goodsShow']);
        }
        $adminService = new GoodsService();
        $goodsResult = $adminService->goodsAdd($goodsAddData);
        if ($goodsResult) {
            return view('msg.msg', ['msg' => '添加成功', 'url' => 'goodsShow']);
        } else {
            return view('msg.msg', ['msg' => '添加失败', 'url' => 'goodsShow']);
        }

    }
}