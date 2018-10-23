<?php
?>
@extends('adminlte::page')

@section('title', '角色添加')

@section('content_header')
    <h1>角色添加</h1>
@stop

@section('content')
    <form action="{{url('role/roleAddDo')}}" method="post" class="form-horizontal">
        <div class="box-body">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1" class="col-sm-2 control-label">角色名称：</label>
                <div class="col-sm-10"><input type="text" name="r_name" class="form-control"></div>
            </div>
            <div class="bbD">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <b>权限管理</b>：

                @foreach($data as $k=>$v)

                    <p>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    @if($v['p_id']==0)
                  <b>
                      <input type="checkbox" name="menu[]" id="parent{{$v['m_id']}}" onclick="parent({{$v['m_id']}})" value="{{$v['m_id']}}"> {{str_repeat('|--',substr_count($v['path'],'-'))}}{{$v['text']}}
                  </b>
                  @else
                  <span>
                      <input type="checkbox" name="menu[]" class="son{{$v['p_id']}}" onchange="son({{$v['p_id']}})" value="{{$v['m_id']}}"> {{str_repeat('|--',substr_count($v['path'],'-'))}}{{$v['text']}}
                  </span>
                    @endif
                </p>
                @endforeach

            </div>
            <label for="exampleInputEmail1" class="col-sm-2 control-label"></label>
            <input type="submit" value="添加角色" class="btn btn-primary">
        </div>
    </form>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
    function parent(m_id)
    {
    var status = $("#parent"+m_id).is(":checked");
    $(".son"+m_id).prop("checked",status);
    }

    function son(m_id)
    {
    var status = $(".son"+m_id).is(":checked");
    $("#parent"+m_id).prop("checked",status);
    }
    </script>
@stop

