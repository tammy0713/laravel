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
Route::post('frontend/meterlogin/login_do','frontend\Meterlogin\meterloginController@login_do');
//用户注册
Route::get('frontend/meterlogin/register','frontend\Meterlogin\meterloginController@register');
Route::post('frontend/meterlogin/register_do','frontend\Meterlogin\meterloginController@register_do');
//用户个人展示
Route::get('frontend/meterlogin/self_info','frontend\Meterlogin\meterloginController@self_info');

//用户购物车
Route::get('frontend/metercart/cart','frontend\Metercart\metercartController@cart');
//用户订单
Route::get('frontend/metercart/order','frontend\Metercart\metercartController@order');
