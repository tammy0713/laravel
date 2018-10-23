<?php
?>
@extends('adminlte::page')

@section('title', '管理员列表')

@section('content_header')
<h1>管理员列表</h1>
@stop

@section('content')
<table class="table table-hover">
        <tr>
            <td>管理员ID</td>
            <td>管理员邮箱</td>
            <td>管理员名称</td>
            <td>管理员密码</td>
            <td>是否是管理员</td>
            <td>最后一次登录时间</td>
            <td>是否冻结</td>
            <td>操作</td>
        </tr>
        @foreach($data as $k=>$v)
            <tr>
                <td>{{$v['a_id']}}</td>
                <td>{{$v['a_email']}}</td>
                <td>{{$v['a_name']}}</td>
                <td>{{$v['a_pwd']}}</td>
                <td>{{$v['a_is_root']?"是":"否"}}</td>
                <td>{{$v['updated_at']}}</td>
                <?php if($v['a_is_valid']==1) { ?>
                <td><button value="{{$v['a_id']}}" class="change">冻结</button></td>
                <?php }else{ ?>
                <td><button value="{{$v['a_id']}}" class="change">解冻</button></td>
                <?php } ?>
<td>

    <a href="adminUpdate/a_id/{{$v['a_id']}}">
        <button type="button" class="btn btn-default btn-sm" style="background-color:darkgreen; color:#fff;">
            <span class="glyphicon glyphicon-edit">编辑</span>
        </button>
    </a>
    <a href="adminDelete/a_id/{{$v['a_id']}}">
        <button type="button" class="btn btn-default btn-sm" style="background-color:red; color:#fff;">
            <span class="glyphicon glyphicon-trash">删除</span>
        </button>
    </a>
</td>
                    }

</tr>
@endforeach
</table>
{{ $data->links() }}
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script> console.log('Hi!'); </script>
<script>
    $(".change").click(function(){
        var a_id=$(this).val();
            a_is_valid=1;
        if($(this).text()=="冻结")
        {
            a_is_valid=0;
        }
        $.ajax({
            url:"adminUpState",
            data:{a_is_valid:a_is_valid,a_id:a_id,'_token':'{{csrf_token()}}'},
            type:"post",
            success:function(msg){
               $("body").html(msg)
            }
        });
    });
</script>
@stop