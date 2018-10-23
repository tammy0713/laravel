<?php
?>
@extends('adminlte::page')

@section('title', '按钮列表')

@section('content_header')
    <h1>按钮列表</h1>
@stop

@section('content')
    <table class="table table-hover">
        <tr>
            <td>按钮ID</td>
            <td>菜单id</td>
            <td>按钮名称</td>
            <td>操作</td>
        </tr>
        @foreach($data as $k=>$v)
            <tr>
                <td>{{$v['b_id']}}</td>
                <td>{{$v['b_meun_id']}}</td>
                <td>{{$v['b_name']}}</td>
                <td>
                    <a href="menuDelete/b_id/{{$v['b_id']}}">
                        <button type="button" class="btn btn-default btn-sm" style="background-color:red; color:#fff;">
                            <span class="glyphicon glyphicon-edit">删除</span>
                        </button>
                    </a>
                    <a href="menuUpdate/b_id/{{$v['b_id']}}">
                        <button type="button" class="btn btn-default btn-sm" style="background-color:darkgreen; color:#fff;">
                            <span class="glyphicon glyphicon-trash">修改</span>
                        </button>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@stop