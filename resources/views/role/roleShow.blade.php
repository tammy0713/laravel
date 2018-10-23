<?php
?>
@extends('adminlte::page')

@section('title', '角色展示')

@section('content_header')
    <h1>角色展示</h1>
@stop
@section('content')
    <table class="table table-hover">
        <tr>
            <td>角色ID</td>
            <td>角色名称</td>
            <td>操作</td>
        </tr>
        @foreach($data as $k=>$v)
            <tr>
                <td>{{$v['r_id']}}</td>
                <td>{{$v['r_name']}}</td>
                <td>
                    <a href="roleDelete/r_id/{{$v['r_id']}}">
                        <button type="button" class="btn btn-default btn-sm" style="background-color:darkgreen; color:#fff;">
                            <span class="glyphicon glyphicon-edit">删除</span>
                        </button>
                    </a>
                    <a href="roleUpdate/r_id/{{$v['r_id']}}">
                        <button type="button" class="btn btn-default btn-sm" style="background-color:red; color:#fff;">
                            <span class="glyphicon glyphicon-trash">编辑</span>
                        </button>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
