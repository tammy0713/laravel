<?php
/**
 * Created by PhpStorm.
 * User: Tammy
 * Date: 2018/10/8
 * Time: 19:26
 */
?>
        <!DOCTYPE html>
<html>
<head>
    <title>Alert</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <style>
        .popupAlert{ position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5)}
        .popupAlert .contentBox{ position: absolute; width: 460px; height: 200px; background: #FFF; left: 50%; margin-left: -230px; top: 100px; overflow: hidden; border-radius: 6px}
        .popupAlert .titBox{ width: 100%; height: 40px; background: #17c2a4; padding: 0 20px; box-sizing: border-box; font-size: 18px; color: #FFF; line-height: 40px;}
        .popupAlert .textBox{ box-sizing: border-box; width: 100%; height: 100px; padding: 31px 20px; font-size: 16px; color: #333; line-height: 24px}
        .popupAlert .backBtn{ float: right; margin: 10px 20px 0 0; display: block; width: 100px; height: 40px; background: #17c2a4; border-radius: 6px; text-align: center; line-height: 40px; text-decoration: none; font-size: 16px; color: #FFF}

    </style>
</head>
<body>

<div class="popupAlert">
    <div class="contentBox">
        <div  class="titBox">提示</div>
        <div class="textBox">{!!str_replace('\n','<br />',$msg)!!}</div>
        <a href="@if(isset($url)){{$url}}@else{{Request::server('HTTP_REFERER')}}@endif" class="backBtn">确定</a>
    </div>
</div>
</body>
</html>
