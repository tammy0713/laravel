<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="author" content="order by dede58.com"/>
    <title>小米商城</title>
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
</head>
@include('style/header')
<body>
<!-- end banner_x -->
<!-- start banner_y -->
<div class="banner_y center">
    <div class="nav">
        <ul>
            @foreach($data3 as $key=>$val)
                <li><a href="" target="_blank">{{$val['h_title']}}</a>
                    <!--start-->
                <div class="pop">
                    @foreach($data4 as $k=>$v)
                        @if($val['h_id'] == $v['g_id'])
                    <div class="left fl" style="height: 80px">

                        <div>
                            <div class="xuangou_left fl">
                                <a href="">
                                    <div class="img fl"><img src="{{$v['good_img']}}" alt=""></div>
                                    <span class="fl">{{$v['good_title']}}</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_right fr"><a href="">选购</a></div>
                            <div class="clear"></div>
                        </div>

                    </div>
                        @endif
                    @endforeach
                    <div class="clear"></div>
                </div>
                    <!--end-->
               </li>
            @endforeach
        </ul>
    </div>

</div>

<div class="sub_banner center">
    <div class="sidebar fl">
        <div class="fl"><a href=""><img src="{{URL::asset('/image/hjh_01.gif')}}"></a></div>
        <div class="fl"><a href=""><img src="{{URL::asset('/image/hjh_02.gif')}}"></a></div>
        <div class="fl"><a href=""><img src="{{URL::asset('/image/hjh_03.gif')}}"></a></div>
        <div class="fl"><a href=""><img src="{{URL::asset('/image/hjh_04.gif')}}"></a></div>
        <div class="fl"><a href=""><img src="{{URL::asset('/image/hjh_05.gif')}}"></a></div>
        <div class="fl"><a href=""><img src="{{URL::asset('/image/hjh_06.gif')}}"></a></div>
        <div class="clear"></div>
    </div>
    <div class="datu fl"><a href=""><img src="{{URL::asset('/image/hongmi4x.png')}}" alt=""></a></div>
    <div class="datu fl"><a href=""><img src="{{URL::asset('/image/xiaomi5.jpg')}}" alt=""></a></div>
    <div class="datu fr"><a href=""><img src="{{URL::asset('/image/pinghengche.jpg')}}" alt=""></a></div>
    <div class="clear"></div>


</div>
<!-- end banner -->
<div class="tlinks">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>

<!-- start danpin -->
   <div class="danpin center">

    <div class="biaoti center">小米明星单品</div>
       <!--stert-->

     <div class="main center">
         @foreach($data as $v )
        <div class="mingxing fl">
            <div class="sub_mingxing"><a href=""><img src="{{$v['g_photo']}}" alt=""></a></div>
            <div class="pinpai"><a href="">{{$v['g_title']}}</a></div>
            <div class="youhui">{{$v['g_content']}}</div>
            <div class="jiage">{{$v['g_price']}}元起</div>
        </div>
         @endforeach
     </div>

       <!--end-->
        <div class="clear"></div>
    </div>
</div>
<div class="peijian w">
    <div class="biaoti center">配件</div>
    <div class="main center">
        <div class="content">
            <div class="remen fl"><a href=""><img src="{{URL::asset('/image/peijian1.jpg')}}"></a>
            </div>
            <!--start-->
            @foreach($data2 as $v )
            <div class="remen fl">
                <div class="xinpin"><span>新品</span></div>
                <div class="tu"><a href=""><img src="{{$v['f_phtot']}}"></a></div>
                <div class="miaoshu"><a href="">{{$v['f_title']}}</a></div>
                <div class="jiage">{{$v['f_price']}}元</div>
                <div class="pingjia">{{$v['f_eval']}}人评价</div>
                <div class="piao">
                    <a href="">
                        <span>发货速度很快！很配小米6！</span>
                        <span>来至于mi狼牙的评价</span>
                    </a>
                </div>
            </div>
             @endforeach
            <!--end-->
            <div class="clear"></div>
        </div>
        <div class="content">
            <div class="remen fl"><a href=""><img src="{{URL::asset('/image/peijian6.png')}}"></a>
            </div>
            <div class="remenlast fr">
                <div class="hongmi"><a href=""><img src="{{URL::asset('/image/hongmin4.png')}}" alt=""></a></div>
                <div class="liulangengduo"><a href=""><img src="{{URL::asset('/image/liulangengduo.png')}}" alt=""></a></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
@include('style/foot')
</body>
</html>