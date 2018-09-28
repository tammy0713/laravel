<?php

namespace App\Http\Controllers\metercart;


use App\Http\Controllers\Controller;
class MetercartController extends Controller
{
   public function cart()
   {
      return view('metercart/cart');
   }
    public function order()
    {
        return view('metercart/order');
    }
}