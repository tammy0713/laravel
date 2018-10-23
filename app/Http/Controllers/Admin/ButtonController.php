<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Service\AdminService;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Validator;

class ButtonController extends Controller
{
    //展示按钮所有
    public function buttonShow()
    {
        $adminService = new AdminService();
        $buttonData = $adminService->buttonAllDate();
        return view('button/buttonShow', ['data' => $buttonData]);
    }
    //按钮添加
    public function buttonAdd()
    {
        $adminService = new AdminService();
        $buttonData = $adminService->menuAllDate();
        return view('button/buttonAdd',['data'=>$buttonData]);
    }
    public function buttonAddDo(Request $request)
    {
        $buttonAddData= $request->input();
        $rules=[
            'b_name'=>'unique:button,b_name',
        ];
        $validata=Validator::make($buttonAddData,$rules);
        if($validata->fails()){
            return view('msg.msg',['msg'=>'','url'=>'buttonShow']);
        }
        $adminService = new AdminService();
        $buttonResult=$adminService->buttonAdd($buttonAddData);
        if($buttonResult){
            return view('msg.msg',['msg'=>'添加成功','url'=>'buttonShow']);
        }else{
            return view('msg.msg',['msg'=>'添加失败','url'=>'buttonShow']);
        }
    }
    //按钮删除
    public function buttonDelete($b_id)
    {
        $adminService = new AdminService();
        $buttonDelete=$adminService->buttonDeleteOne($b_id);
        if($buttonDelete){
            return redirect('button/buttonShow');
        }
    }
    /*
    * 按钮修改
    */
    public function buttonUpdate($b_id)
    {
        $adminService = new AdminService();
        $update=$adminService->buttonUpdateOne($b_id);
        return view('button/buttonUpdate',['update'=>$update]);
    }
    public function buttonUpdateDo(Request $request)
    {
        $buttonUpdate= $request->input();
        $adminService = new AdminService();
        $buttonUpdate=$adminService->buttonUpdate($buttonUpdate);
        if($buttonUpdate){
            return redirect('button/buttonShow');
        }
    }
}