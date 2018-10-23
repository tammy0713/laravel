<?php
/**
 * Created by PhpStorm.
 * User: Tammy
 * Date: 2018/10/15
 * Time: 19:24
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Service\AdminService;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    /*
     * 首页展示
     */
    public function index()
    {
        return view('admin.index');
    }
    /*
     * 登录
     */
    public function login()
    {
        return view('admin.login');
    }
    public function loginDo(Request $request)
    {
        $loginData=$request->input();
        $adminService = new AdminService();
        //调用查询数据方法
        $result = $adminService->login($loginData);
        //登录成功
        if($result==1){
            return redirect('backend/index');
        }
        if($result==2){
            return view('msg.msg',['msg'=>'密码错误','url'=>'login']);
        }
        if($result==3){
            return view('msg.msg',['msg'=>'邮箱用户不存在','url'=>'login']);
        }
        if($result==4){
            return view('msg.msg',['msg'=>'用户名失效','url'=>'login']);
        }
    }
    /*
     * 注销
     */
    public function destroy()
    {
        $adminService = new AdminService();
        $session=$adminService->loginOut();
        if(empty($session)){
            return redirect('backend/login');
        }
    }
    /*
     * 管理员展示
     */
    public function adminShow()
    {
        $adminService = new AdminService();
        $adminData=$adminService->adminAllData();
        return view('admin/adminShow',['data'=>$adminData]);
    }
    /*
     * 管理员添加
     */
    public function adminAdd()
    {
        //添加的时候添加角色
        $adminService = new AdminService();
        $role=$adminService->roleAllDate();
        return view('admin.adminAdd',['role'=>$role]);
    }
    public function adminAddDo(Request $request)
    {
        $adminAddData= $request->input();
        //条件唯一
        $rules=[
            'a_name'=>'unique:admin,a_name',
            'a_email'=>'unique:admin,a_email',
        ];
        $validata=Validator::make($adminAddData,$rules);
        if($validata->fails()){
            return view('msg.msg',['msg'=>'用户名邮箱唯一','url'=>'adminAdd']);
        }
        $adminService = new AdminService();
        $addResult=$adminService->adminAdd($adminAddData);
        if($addResult){
            return view('msg.msg',['msg'=>'添加成功','url'=>'adminShow']);
        }else{
            return view('msg.msg',['msg'=>'添加失败','url'=>'adminAdd']);
        }
    }
    /*
     * 管理员删除
     */
    public function adminDelete($a_id)
    {
        $adminService = new AdminService();
        $adminDelete=$adminService->adminDeleteOne($a_id);
        if($adminDelete){
            return redirect('backend/adminShow');
        }
    }
    /*
     * 管理员修改
     */
    public function adminUpdate($a_id)
    {
        //正常修改的值
        $adminService = new AdminService();
        $update=$adminService->adminUpdateOne($a_id);
        //全部的角色
        $role=$adminService->roleAllDate();
        //修改人存在的角色
        $r_id=$adminService->selectRole($a_id);
        return view('admin/adminUpdate',['update'=>$update,'role'=>$role,'r_id'=>$r_id]);
    }
    public function adminUpdateDo(Request $request)
    {
        $adminUpdate= $request->input();
        $adminService = new AdminService();
        $adminUpdate=$adminService->adminUpdate($adminUpdate);
        if($adminUpdate){
            return redirect('backend/adminShow');
        }
    }
    /*
     * 修改状态
     */
    public function adminUpState(Request $request)
    {
        $adminUpState= $request->input();
        $adminService = new AdminService();
        $adminUpdate=$adminService->adminState($adminUpState);
        if($adminUpdate){
          return  $this->adminShow();
        }
    }
}