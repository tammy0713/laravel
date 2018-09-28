<?php

namespace App\Http\Controllers\metershop;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class MetershopController extends Controller
{
     public function index()
     {
         return view('metershop/index');
     }
    public function cart()
    {
        return view('metershop/cart');
    }
    public function show()
    {
        return view('metershop/show');
    }
    public function wiew()
    {
        return view('metershop/wiew');
    }
}