<?php
?>
@extends('adminlte::page')

@section('title', '权限添加')

@section('content_header')
    <h1>权限添加</h1>
@stop

@section('content')
    <form action="{{url('menu/menuAddDo')}}" method="post" class="form-horizontal">
        <div class="box-body">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1" class="col-sm-2 control-label">权限名称：</label>
                <div class="col-sm-10"><input type="text" name="text" class="form-control"></div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" class="col-sm-2 control-label">父id：</label>
                <div class="col-sm-10"><input type="text" name="p_id" class="form-control"></div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" class="col-sm-2 control-label">是否是菜单：</label>
                <div class="col-sm-10"><input type="radio" name="is_menu" value="1"> 是 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="is_menu" value="0" checked> 否</div>
            </div>
            <label for="exampleInputEmail1" class="col-sm-2 control-label"></label>
            <input type="submit" value="添加权限" class="btn btn-primary">
        </div>
    </form>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

