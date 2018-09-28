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

//{小米商城}
//商品首页
Route::get('metershop/index','Metershop\metershopController@index');
//商品列表页
Route::get('metershop/show','Metershop\metershopController@show');
//商品详情页
Route::get('metershop/wiew','Metershop\metershopController@wiew');

//用户登录
Route::get('meterlogin/login','Meterlogin\meterloginController@login');
//用户注册
Route::get('meterlogin/register','Meterlogin\meterloginController@register');
//用户个人展示
Route::get('meterlogin/self_info','Meterlogin\meterloginController@self_info');

//用户购物车
Route::get('metercart/cart','Metercart\metercartController@cart');
//用户订单
Route::get('metercart/order','Metercart\metercartController@order');
