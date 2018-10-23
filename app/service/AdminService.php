<?php
namespace App\Service;

use App\Model\AdminAndRoleModel;
use App\Model\MenuModel;
use App\Model\AdminModel;
use App\Model\RoleModel;
use App\Model\ButtonModel;
use App\Model\AllotResourceModel;
use Session;
use DB;
use Illuminate\Support\Facades\Redis;
class AdminService
{
    /*
     * 1.登录成功
     * 2.密码错误
     * 3.用户名邮箱不存在
     * 4.用户名失效
     */
    public function login($loginData)
    {
        $adminModel = new AdminModel();
        //查询一条数据
        $returnLoginData = $adminModel->adminOne($loginData);
        if (!$returnLoginData) {
            return 3;
        } else {
            if ($returnLoginData['a_pwd'] == $loginData['password']) {
                //判断是否有效
                $adminVaild = $adminModel->adminVaild();
                if (!$adminVaild) {
                    return 4;
                }
                //修改登录时间
                $updatetime = $adminModel->updateTime($returnLoginData);
                if ($updatetime) {
                    session(['msg' => $returnLoginData->toArray()]);
                    $this->menu();
                    return 1;
                }
            } else {
                return 2;
            }
        }
    }

    /*
     * 权限菜单
     */
    public function menu()
    {
        $returnLoginData = session('msg');
        //用户角色表
        $adminModel = new AdminAndRoleModel();
        $adminRoleData = $adminModel->selectOne($returnLoginData);
        //用户的角色 组合数组
        $r_id = array_column($adminRoleData, 'r_id');
        //角色资源表
        $allotService = new AllotResourceModel();
        $allotData = $allotService->selectOne($r_id);
        //菜单组合数组
        $f_resource_id = array_column($allotData, 'f_resource_id');
        //菜单表
        $menuService = new MenuModel();
        $menuData = $menuService->selectAll($f_resource_id)->toArray();

        $menu = $this->Tree($menuData);
//        dump($menu);die;
        return $menu;
    }

    /*
     * 递归
     */
    public function Tree($arr, $path = 0)
    {
        $data = [];
        if (is_array($arr)) {
            foreach ($arr as $k => $v) {
                if ($v['p_id'] == $path) {
                    $v['submenu'] = $this->Tree($arr, $v['m_id']);
                    $data[] = array_filter($v);
                }
            }
        }
        return $data;
    }

    /*
     * 注销
     */
    public function loginOut()
    {
        $session = Session::forget('msg');
        return $session;
    }

    /*
     * 管理员查询数据
     */
    public function adminAllData()
    {
        $adminModel = new AdminModel();
        $selectData = $adminModel->select();
        return $selectData;
    }

    /*
     * 管理员添加
     */
    public function adminAdd($adminAddData)
    {
        $adminModel = new AdminModel();
        //弹出角色的值
        $roles = $adminAddData['role'];
        unset($adminAddData['role']);
        $addResult = $adminModel->add($adminAddData);
        //调用方法 管理员角色表入库
        $result = $this->addRole($roles, $addResult);
        if ($result) {
            return $result;
        }
    }

    /*
     * 管理员添加角色
    */
    public function addRole($roles, $addResult)
    {
        foreach ($roles as $v) {
            $adminAndRoleModel = new AdminAndRoleModel();
            $result = $adminAndRoleModel->adminRole($v, $addResult);
        }
        return $result;

    }

    /*
     * 管理员删除
     */
    public function adminDeleteOne($a_id)
    {
        $result = true;
        DB::beginTransaction();
        try{
            //正常的删除管理员数据
            $adminModel = new AdminModel();
            $deleteResult = $adminModel->deleteOne($a_id);
            //删除管理员角色表
            $adminAndRole=new AdminAndRoleModel();
            $adminAndRole->deleteOne($a_id);
            DB::commit();
        }catch(\Exception $e){
            $result = false;
            $e->getMessage();
            DB::rollBack();
        }
        if($result){
            return true;
        }else{
            return false;
        }
    }

    /*
     * 管理员修改
     */
    public function adminUpdateOne($a_id)
    {
        $adminModel = new AdminModel();
        $updateResult = $adminModel->updateSelectOne($a_id);
        return $updateResult;
    }
    public function adminUpdate($adminUpdate)
    {
        $adminModel1 = new AdminModel();
        //修改id
        $a_id=$adminUpdate['a_id'];
        //需要添加角色id
        $role = $adminUpdate['role'];
        unset($adminUpdate['role']);
        //删除多于用户角色
        $adminAndRoleModel = new AdminAndRoleModel();
        $adminAndRoleModel->deleteOne($a_id);
        //新添加的用户角色入库
        $this->addRole($role,$a_id);
        $updateResult = $adminModel1->updateOne($adminUpdate);
        return $updateResult;
    }
    /*
    * 修改时查询管理员的角色
    */
    public function selectRole($a_id)
    {
        $admiAndRolenModel = new AdminAndRoleModel();
        $selectRole = $admiAndRolenModel->SelectRoleOne($a_id);
        //只传递id
        $r_id=array_column($selectRole,'r_id');
        return $r_id;
    }
    /*
     * 修改管理员状态
     */
    public function adminState($adminUpState)
    {
        $adminModel = new AdminModel();
        $stateResult = $adminModel->updateState($adminUpState);
        return $stateResult;
    }
    /*
     * 角色展示
     */
    public function roleAllDate()
    {
        $roleModel = new RoleModel();
        $selectData = $roleModel->select()->toArray();
        return $selectData;
    }

    /*
     * 角色添加
     */
    public function roleAdd($roleAddData)
    {
        $roleModel = new RoleModel();
        $menu = $roleAddData['menu'];
        //角色添加 弹掉对应的权限
        unset($roleAddData['menu']);
        //正常的角色添加
        $roleResult = $roleModel->add($roleAddData);
        //用户权限表
        $result=$this->roleMenu($menu,$roleResult,$type=1);
        if($result){
            return $roleResult;
        }
    }
    /*
     * 角色分配权限
     */
    public function roleMenu($menu,$roleResult,$type)
    {
        foreach ($menu as $v) {
            $allotResourceModel = new AllotResourceModel();
            $result = $allotResourceModel->allotResource($v, $roleResult,$type);
        }
        return $result;
    }
    /*
     * 角色删除
     */
    public function roleDeleteOne($r_id)
    {
        //删除正常的角色
        $roleModel=new RoleModel();
        $deleteResult=$roleModel->deleteOne($r_id);
        //删除用户角色表
        $adminAndRole=new AdminAndRoleModel();
        $delete=$adminAndRole->deleteRid($r_id);
        //删除资源表
        $allotResource = new AllotResourceModel();
        $rId=$allotResource->deleteOne($r_id);
        if($deleteResult && $delete && $rId){
            return $deleteResult;
        }else{
            return false;
        }

    }
    /*
     * 角色修改
     */
    public function roleUpdateOne($r_id)
    {
        $roleModel=new RoleModel();
        $updateResult=$roleModel->updateSelectOne($r_id);
        return $updateResult;
    }
    /*
     * 读写现在角色对于的权限
     */
    public function roleOnMenu($r_id)
    {
        $allotResourceModel=new AllotResourceModel();
        $allotOne=$allotResourceModel->roleMenu($r_id);
        return $allotOne;
    }
    public function roleUpdate($roleUpdate)
    {
        $roleModel=new RoleModel();
        $r_id=$roleUpdate['r_id'];
        $menu=$roleUpdate['menu'];
        unset($roleUpdate['menu']);
        //正常的修改
        $updateResult=$roleModel->roleUpdate($roleUpdate);
        //先删除之前拥有的权限
        $allotResourcModel1=new AllotResourceModel();
        $allotResourcModel1->deleteOne($r_id);
        //修改当前角色拥有的权限
        $this->roleMenu($menu,$r_id,$type=1);
        return $updateResult;
    }
    /*
     * 权限展示
     */
    public function menuAllDate()
    {
        $menuModel=new MenuModel();
        $selectData=$menuModel->select()->toArray();
        return $selectData;
    }
    /*
     * 权限添加
     */
    public function menuAdd($menuAddData)
    {
        $menuModel=new MenuModel();
        $menuResult=$menuModel->add($menuAddData);
        return $menuResult;
    }
    /*
     * 权限删除
     */
    public function menuDeleteOne($m_id)
    {
        $menuModel=new MenuModel();
        $menuResult=$menuModel->deleteOne($m_id);
        return $menuResult;
    }
    /*
     * 权限修改
     */
    public function menuUpdateOne($m_id)
    {
        $menuModel=new MenuModel();
        $updateResult=$menuModel->updateSelectOne($m_id);
        return $updateResult;
    }
    public function menuUpdate($menuUpdate)
    {
        $menuModel=new MenuModel();
        $updateResult=$menuModel->menuUpdate($menuUpdate);
        return $updateResult;
    }
    /*
     * 按钮展示
     */
    public function buttonAllDate()
    {
        $buttonModel=new ButtonModel();
        $selectData=$buttonModel->select()->toArray();
        return $selectData;
    }
    /*
     * 按钮权限
     */
    public function buttonMenu($id)
    {
        session(['id'=>$id]);
        //按钮的权限
        $allotResourcModel=new AllotResourceModel();
        $menu=$allotResourcModel->buttonMenu();
        //按钮权限id
        $resource_id=array_column($menu,'f_resource_id');
        //按钮表对应的数据{权限} 对应的页面 满足两个条件
        $buttonModel=new ButtonModel();
        $m_id = session('id');
        $button=$buttonModel->dateOne($resource_id,$m_id);
        if($button){
            return $button;
        }
    }
    /*
     * 按钮添加
     */
    public function buttonAdd($buttonAddData)
    {
        $buttonModel=new ButtonModel();
        $menu=$buttonAddData['menu'];
        unset($buttonAddData['menu']);
        $m_id = session('id');
        $buttonResult=$buttonModel->add($buttonAddData,$m_id);
        $this->roleMenu($menu,$buttonResult,$type=0);
        return $buttonResult;
    }
    public function buttonDeleteOne($b_id)
    {
        $buttonModel=new ButtonModel();
        $buttonResult=$buttonModel->deleteOne($b_id);
        return $buttonResult;
    }
    /*
     * 权限修改
     */
    public function buttonUpdateOne($b_id)
    {
        $buttonModel=new ButtonModel();
        $updateResult=$buttonModel->updateSelectOne($b_id);
        return $updateResult;
    }
    public function buttonUpdate($menuUpdate)
    {
        $buttonModel=new ButtonModel();
        $updateResult=$buttonModel->buttonUpdate($menuUpdate);
        return $updateResult;
    }
}