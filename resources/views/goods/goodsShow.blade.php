<?php
?>
@extends('adminlte::page')

@section('title', '商品列表')

@section('content_header')
    <h1>商品列表</h1>
@stop

@section('content')
    <table class="table table-hover">
        <tr>
            <td>商品ID</td>
            <td>商品名称</td>
            <td>商品价格</td>
            <td>商品状态</td>
            <td>商品分类id</td>
            <td>商品库存</td>
            <td>操作</td>
        </tr>
        @foreach($data as $k=>$v)
            <tr>
                <td>{{$v['g_id']}}</td>
                <td>{{$v['g_name']}}</td>
                <td>{{$v['g_price']}}</td>
                <td>{{$v['g_is_state']}}</td>
                <td>{{$v['g_t_id']}}</td>
                <td>{{$v['g_sku']}}</td>
                <td></td>

                <td>
                    <a href="menuDelete/g_id/{{$v['g_id']}}">
                        <button type="button" class="btn btn-default btn-sm" style="background-color:red; color:#fff;">
                            <span class="glyphicon glyphicon-edit">删除</span>
                        </button>
                    </a>
                    <a href="menuUpdate/g_id/{{$v['g_id']}}">
                        <button type="button" class="btn btn-default btn-sm" style="background-color:darkgreen; color:#fff;">
                            <span class="glyphicon glyphicon-trash">修改</span>
                        </button>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@stop