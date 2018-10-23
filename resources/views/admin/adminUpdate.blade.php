<?php
?>
@extends('adminlte::page')

@section('title', '管理员修改')

@section('content_header')
    <h1>管理员修改</h1>
@stop

@section('content')
    <form action="{{url('backend/adminUpdateDo')}}" method="post" class="form-horizontal">
        <div class="box-body">
            @csrf
            <input type="hidden" name="a_id" class="form-control" value="{{$update->a_id}}">
            <div class="form-group">
                <label for="exampleInputEmail1" class="col-sm-2 control-label">管理员名称：</label>
                <div class="col-sm-10"><input type="text" name="a_name" class="form-control" value="{{$update->a_name}}"></div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" class="col-sm-2 control-label">管理员邮箱：</label>
                <div class="col-sm-10"><input type="email" name="a_email" class="form-control" value="{{$update->a_email}}"></div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" class="col-sm-2 control-label">管理员随机密码：</label>
                <div class="col-sm-10"><input type="text" name="a_pwd" class="form-control" value="{{$update->a_pwd}}"></div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" class="col-sm-2 control-label">超级管理员：</label>
                <div class="col-sm-10"><input type="radio" name="a_is_root" value="{{$update->a_is_root}}"> 是 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="a_is_root" value="{{$update->a_is_root}}" checked> 否</div>

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" class="col-sm-2 control-label">是否有效：</label>
                <div class="col-sm-10"><input type="radio" name="a_is_valid" value="{{$update->a_is_valid}}"> 是 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="a_is_valid" value="{{$update->a_is_valid}}" checked> 否</div>
            </div>
            <div class="bbD">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;角色管理：
                @foreach($role as $role)
                    <input type="checkbox" name="role[]" value="{{$role['r_id']}}" @if(in_array($role['r_id'],$r_id)) checked @endif>{{$role['r_name']}}
                @endforeach
            </div>
            <label for="exampleInputEmail1" class="col-sm-2 control-label"></label>
            <input type="submit" value="修改管理员" class="btn btn-primary">
        </div>
    </form>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

