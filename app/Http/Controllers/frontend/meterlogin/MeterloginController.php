<?php
/**
 * Created by PhpStorm.
 * User: Tammy
 * Date: 2018/9/28
 * Time: 10:53
 */

namespace App\Http\Controllers\frontend\meterlogin;


use App\Http\Controllers\Controller;

class MeterloginController extends Controller
{
    public function login()
    {
        return view('frontend/meterlogin/login');
    }
    public function register()
    {
        return view('frontend/meterlogin/register');
    }
    public function self_info()
    {
        return view('frontend/meterlogin/self_info');
    }
}