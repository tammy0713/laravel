<?php
namespace App\Service;

use App\Model\IndexModel;
use App\Model\IndexfootModel;
class IndexService
{
    /*
     *商品中间展示页面调用
     */
  public function select_data()
  {
     $service=new IndexModel();
     $res=$service->select_all();
      $res1=json_decode($res,true);
      if($res1)
      {
          return $res1;
      }else{
          return false;
      }
  }
    public function select_foot()
    {
        $service=new IndexfootModel();
        $res=$service->select_all();
        $res1=json_decode($res,true);
        if($res1)
        {
            return $res1;
        }else{
            return false;
        }
    }
}