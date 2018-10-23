<?php
?>
@extends('adminlte::page')

@section('title', '权限修改')

@section('content_header')
    <h1>权限修改</h1>
@stop

@section('content')
    <form action="{{url('menu/menuUpdateDo')}}" method="post" class="form-horizontal">
        <div class="box-body">
            @csrf
            <input type="hidden" name="m_id" class="form-control" value="{{$update->m_id}}">
            <div class="form-group">
                <label for="exampleInputEmail1" class="col-sm-2 control-label">权限名称：</label>
                <div class="col-sm-10"><input type="text" name="text" class="form-control" value="{{$update->text}}"></div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" class="col-sm-2 control-label">父id：</label>
                <div class="col-sm-10"><input type="text" name="p_id" class="form-control" value="{{$update->p_id}}"></div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" class="col-sm-2 control-label">是否菜单：</label>
                <div class="col-sm-10"><input type="radio" name="is_menu" value="{{$update->is_menu}}"> 是 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="is_menu" value="{{$update->is_menu}}" checked> 否</div>
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

