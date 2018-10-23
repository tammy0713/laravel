<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Service\AdminService;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Request;

class MenuController extends Controller
{
    /*
     * 权限展示
     */
    public function menuShow(Request $request)
    {
        $id=$request->input();
        $adminService = new AdminService();
        //按钮的权限
        $menu = $adminService->buttonMenu($id);
        //展示的数据
        $menuData = $adminService->menuAllDate();
        return view('menu/menuShow', ['data' => $menuData,'menu'=>$menu]);
    }
    /*
     * 权限添加
     */
    public function menuAdd()
    {
        return view('menu/menuAdd');
    }
    public function menuAddDo(Request $request)
    {
        $menuAddData= $request->input();
        $rules=[
            'text'=>'unique:menu,text',
        ];
        $validata=Validator::make($menuAddData,$rules);
        if($validata->fails()){
            return view('msg.msg',['msg'=>'权限唯一','url'=>'menuAdd']);
        }
        $adminService = new AdminService();
        $menuResult=$adminService->menuAdd($menuAddData);
        if($menuResult){
            return view('msg.msg',['msg'=>'添加成功','url'=>'menuShow']);
        }else{
            return view('msg.msg',['msg'=>'添加失败','url'=>'menuShow']);
        }
    }
    /*
     * 权限删除
     */
    public function menuDelete($m_id)
    {
        $adminService = new AdminService();
        $menuDelete=$adminService->menuDeleteOne($m_id);
        if($menuDelete){
            return redirect('menu/menuShow');
        }
    }
    /*
    * 角色修改
    */
    public function menuUpdate($r_id)
    {
        $adminService = new AdminService();
        $update=$adminService->menuUpdateOne($r_id);
        return view('menu/menuUpdate',['update'=>$update]);
    }
    public function menuUpdateDo(Request $request)
    {
        $menuUpdate= $request->input();
        $adminService = new AdminService();
        $menuUpdate=$adminService->menuUpdate($menuUpdate);
        if($menuUpdate){
            return redirect('menu/menuShow');
        }
    }
}