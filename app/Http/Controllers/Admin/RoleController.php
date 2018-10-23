<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Service\AdminService;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Request;

class RoleController extends Controller
{
    /*
     * 角色展示
     */
    public function roleShow()
    {
        $adminService = new AdminService();
        $roleData=$adminService->roleAllDate();
        return view('role/roleShow',['data'=>$roleData]);
    }
    /*
     * 角色添加
     */
    public function roleAdd()
    {
        $adminService = new AdminService();
        $roleData=$adminService->menuAllDate();
        return view('role/roleAdd',['data'=>$roleData]);
    }
    public function roleAddDo(Request $request)
    {
        $roleAddData= $request->input();
        $rules=[
            'r_name'=>'unique:role,r_name',
        ];
        $validata=Validator::make($roleAddData,$rules);
        if($validata->fails()){
            return view('msg.msg',['msg'=>'用户名邮箱唯一','url'=>'roleAdd']);
        }
        $adminService = new AdminService();
        $roleResult=$adminService->roleAdd($roleAddData);
        if($roleResult){
            return view('msg.msg',['msg'=>'添加成功','url'=>'roleShow']);
        }else{
            return view('msg.msg',['msg'=>'添加失败','url'=>'roleShow']);
        }
    }
    /*
     * 角色删除
     */
    public function roleDelete($r_id)
    {
        $adminService = new AdminService();
        $roleDelete=$adminService->roleDeleteOne($r_id);
        if($roleDelete){
            return redirect('role/roleShow');
        }
    }
    /*
    * 角色修改
    */
    public function roleUpdate($r_id)
    {
        $adminService = new AdminService();
        //正常修改数据
        $update=$adminService->roleUpdateOne($r_id);
        //展示的全部权限
        $roleData=$adminService->menuAllDate();
        //现在角色所拥有的权限
        $menu=$adminService->roleOnMenu($r_id);
        $f_resource_id=array_column($menu,'f_resource_id');
        return view('role/roleUpdate',['update'=>$update,'data'=>$roleData,'f_resource_id'=>$f_resource_id]);
    }
    public function roleUpdateDo(Request $request)
    {
        $roleUpdate= $request->input();
        $adminService = new AdminService();
        $roleUpdate=$adminService->roleUpdate($roleUpdate);
        if($roleUpdate){
            return redirect('role/roleShow');
        }
    }
}