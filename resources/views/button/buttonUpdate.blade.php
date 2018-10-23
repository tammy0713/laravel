<?php
?>
@extends('adminlte::page')

@section('title', '按钮修改')

@section('content_header')
<h1>按钮修改</h1>
@stop

@section('content')
<form action="{{url('button/buttonUpdateDo')}}" method="post" class="form-horizontal">
    <div class="box-body">
        @csrf
        <input type="hidden" name="b_id" class="form-control" value="{{$update->b_id}}">
        <div class="form-group">
            <label for="exampleInputEmail1" class="col-sm-2 control-label">按钮属性：</label>
            <div class="col-sm-10"><input type="text" name="b_page_id" class="form-control" value="{{$update->b_page_id}}"></div>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1" class="col-sm-2 control-label">菜单id：</label>
        <div class="col-sm-10"><input type="text" name="b_meun_id" class="form-control" value="{{$update->b_meun_id}}"></div>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1" class="col-sm-2 control-label">按钮名称：</label>
        <div class="col-sm-10"><input type="text" name="b_name" class="form-control" value="{{$update->b_name}}"></div>
    </div>

    </div>
        <label for="exampleInputEmail1" class="col-sm-2 control-label"></label>
        <input type="submit" value="修改按钮" class="btn btn-primary">
    </div>
    </div>
</form>
@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script> console.log('Hi!'); </script>
@stop

