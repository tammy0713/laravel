<?php
?>
@extends('adminlte::page')

@section('title', '管理员添加')

@section('content_header')
    <h1>管理员添加</h1>
@stop

@section('content')
<form action="{{url('backend/adminAddDo')}}" method="post" class="form-horizontal">
    <div class="box-body">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1" class="col-sm-2 control-label">管理员名称：</label>
            <div class="col-sm-10"><input type="text" name="a_name" class="form-control"></div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" class="col-sm-2 control-label">管理员邮箱：</label>
            <div class="col-sm-10"><input type="email" name="a_email" class="form-control"></div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" class="col-sm-2 control-label">管理员随机密码：</label>
            <div class="col-sm-10"><input type="text" name="a_pwd" class="form-control"></div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" class="col-sm-2 control-label">超级管理员：</label>
            <div class="col-sm-10"><input type="radio" name="a_is_root" value="1"> 是 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="a_is_root" value="0" checked> 否</div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" class="col-sm-2 control-label">是否有效：</label>
            <div class="col-sm-10"><input type="radio" name="a_is_valid" value="1"> 是 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="a_is_valid" value="0" checked> 否</div>
        </div>
        <div class="bbD">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;角色管理：
            @foreach($role as $role)
            <input type="checkbox" name="role[]" value="{{$role['r_id']}}">{{$role['r_name']}}
            @endforeach
        </div>
        <label for="exampleInputEmail1" class="col-sm-2 control-label"></label>
        <input type="submit" value="添加管理员" class="btn btn-primary">
    </div>
</form>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

