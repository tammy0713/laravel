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
            <td>菜单ID</td>
            <td>权限名称</td>
            <td>权限路由</td>
            <td>是否是菜单</td>
            <td>父级Id</td>
            <td>操作</td>
        </tr>
        @foreach($data as $k=>$v)
            <tr>
                <td>{{$v['m_id']}}</td>
                <td>{{str_repeat('|--',substr_count($v['path'],'-'))}}{{$v['text']}}</td>
                <td>{{$v['url']}}</td>
                <td>{{$v['is_menu']?"是":"否"}}</td>
                <td>{{$v['p_id']}}</td>
             @if($menu){
                @foreach($menu as $key=>$val)
                    <td>
                        @if($val['b_name']=='admin_del')
                            <a href="menuDelete/m_id/{{$v['m_id']}}">
                                <button type="button" class="btn btn-default btn-sm" style="background-color:red; color:#fff;">
                                    <span class="glyphicon glyphicon-edit">删除</span>
                                </button>
                            </a>
                        @endif
                        @if($val['b_name']=='admin_update')
                            <a href="menuUpdate/m_id/{{$v['m_id']}}">
                                <button type="button" class="btn btn-default btn-sm" style="background-color:darkgreen; color:#fff;">
                                    <span class="glyphicon glyphicon-trash">修改</span>
                                </button>
                            </a>
                        @endif
                    </td>
                @endforeach
                }
                @endif
            </tr>
        @endforeach
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop