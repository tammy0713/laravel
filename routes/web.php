<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
//默认访问的index
Route::get('hello','Hello\HelloController@index');
//数据添加 渲染添加页面
Route::get('hello/info',function(){
    return view('hello.info');
});
//提交过来的值 接值
Route::post('hello/add','Hello\HelloController@add');
//通过路由展示
Route::get('hello/select','Hello\HelloController@select');
//通过路由a标签删除
Route::get('hello/del/id/{id}','Hello\HelloController@del');
//通过路由a标签修改 传id
Route::get('hello/up/id/{id}','Hello\HelloController@up');
//修改成功 跳的页面
Route::post('hello/up_do','Hello\HelloController@up_do');

//测试数据
//展示添加页面
Route::get('user/index','User\UserController@index');
//提交数据路径
Route::post('user/add','User\UserController@add');
//展示数据
Route::get('user/select','User\UserController@select');

//{小米商城}
//发送邮件地址
Route::get('Mail/send','MailController@send');
//商品首页
Route::get('frontend/metershop/index','frontend\Metershop\metershopController@index');
//商品列表页
Route::get('frontend/metershop/show','frontend\Metershop\metershopController@show');
//商品详情页
Route::get('frontend/metershop/wiew','frontend\Metershop\metershopController@wiew');

//用户登录
Route::get('frontend/meterlogin/login','frontend\Meterlogin\meterloginController@login');
Route::post('frontend/meterlogin/loginDo','frontend\Meterlogin\meterloginController@loginDo');
Route::get('frontend/meterlogin/regDestroy','frontend\Meterlogin\meterloginController@regDestroy');
//用户注册
Route::get('frontend/meterlogin/register','frontend\Meterlogin\meterloginController@register');
Route::post('frontend/meterlogin/registerDo','frontend\Meterlogin\meterloginController@registerDo');
//用户个人展示
Route::get('frontend/meterlogin/selfInfo','frontend\Meterlogin\meterloginController@selfInfo');

//用户购物车
Route::get('frontend/metercart/cart','frontend\Metercart\metercartController@cart');
//用户订单
Route::get('frontend/metercart/order','frontend\Metercart\metercartController@order');

Auth::routes();
//后台登录
Route::get('backend/login','Admin\AdminController@login');
Route::post('backend/loginDo','Admin\AdminController@loginDo');
Route::middleware(['back'])->namespace('Admin')->group(function(){
    //注销
    Route::get('backend/destroy','AdminController@destroy');
    //后台首页
    Route::get('backend/index','AdminController@index');

    //管理员展示
    Route::get('backend/adminShow','AdminController@adminShow');
    //管理员添加
    Route::get('backend/adminAdd','AdminController@adminAdd');
    Route::post('backend/adminAddDo','AdminController@adminAddDo');
    //管理员删除
    Route::get('backend/adminDelete/a_id/{a_id}','AdminController@adminDelete');
    //管理员修改
    Route::get('backend/adminUpdate/a_id/{a_id}','AdminController@adminUpdate');
    Route::post('backend/adminUpdateDo','AdminController@adminUpdateDo');
    //管理员修改状态
    Route::post('backend/adminUpState','AdminController@adminUpState');

    //角色展示
    Route::get('role/roleShow','RoleController@roleShow');
    //角色添加
    Route::get('role/roleAdd','RoleController@roleAdd');
    Route::post('role/roleAddDo','RoleController@roleAddDo');
    //角色删除
    Route::get('role/roleDelete/r_id/{r_id}','RoleController@roleDelete');
    //角色修改
    Route::get('role/roleUpdate/r_id/{r_id}','RoleController@roleUpdate');
    Route::post('role/roleUpdateDo','RoleController@roleUpdateDo');

    //菜单展示
    Route::get('menu/menuShow','MenuController@menuShow');
    //菜单添加
    Route::get('menu/menuAdd','MenuController@menuAdd');
    Route::post('menu/menuAddDo','MenuController@menuAddDo');
    //菜单删除
    Route::get('menu/menuDelete/m_id/{m_id}','MenuController@menuDelete');
    //菜单修改
    Route::get('menu/menuUpdate/m_id/{m_id}','MenuController@menuUpdate');
    Route::post('menu/menuUpdateDo','MenuController@menuUpdateDo');

    //按钮展示
    Route::get('button/buttonShow','ButtonController@buttonShow');
    //按钮添加
    Route::get('button/buttonAdd','ButtonController@buttonAdd');
    Route::post('button/buttonAddDo','ButtonController@buttonAddDo');
    //按钮删除
    Route::get('button/buttonDelete/b_id/{b_id}','ButtonController@buttonDelete');
    //按钮修改
    Route::get('button/buttonUpdate/b_id/{b_id}','ButtonController@buttonUpdate');
    Route::post('button/buttonUpdateDo','ButtonController@buttonUpdateDo');

    //商品展示
    Route::get('goods/goodsShow','GoodsController@goodsShow');
    //商品添加
    Route::get('goods/goodsAdd','GoodsController@goodsAdd');
    Route::post('goods/goodsAddDo','GoodsController@goodsAddDo');
    //商品删除
    Route::get('goods/goodsDelete/g_id/{g_id}','GoodsController@goodsDelete');
    //商品修改
    Route::get('goods/goodsUpdate/g_id/{g_id}','GoodsController@goodsUpdate');
    Route::post('goods/goodsUpdateDo','GoodsController@goodsUpdateDo');
});


