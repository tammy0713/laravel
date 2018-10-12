<?php

namespace App\Http\Controllers\frontend\metercart;


use App\Http\Controllers\Controller;
class MetercartController extends Controller
{
   public function cart()
   {
      return view('frontend/metercart/cart');
   }
    public function order()
    {
        return view('frontend/metercart/order');
    }
}