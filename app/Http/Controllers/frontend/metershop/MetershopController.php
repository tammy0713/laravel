<?php

namespace App\Http\Controllers\frontend\metershop;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class MetershopController extends Controller
{
     public function index()
     {
         return view('frontend/metershop/index');
     }
    public function cart()
    {
        return view('frontend/metershop/cart');
    }
    public function show()
    {
        return view('frontend/metershop/show');
    }
    public function wiew()
    {
        return view('frontend/metershop/wiew');
    }
}