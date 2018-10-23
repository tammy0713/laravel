<?php
?>
@extends('adminlte::page')

@section('title', '按钮添加')

@section('content_header')
    <h1>按钮添加</h1>
@stop

@section('content')
    <form action="{{url('button/buttonAddDo')}}" method="post" class="form-horizontal">
        <div class="box-body">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1" class="col-sm-2 control-label">按钮名称：</label>
                <div class="col-sm-10"><input type="text" name="b_name" class="form-control"></div>
            </div>
            <table>
            <div class="form-group">
                <label for="exampleInputEmail1" class="col-sm-2 control-label">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    菜单id：
                </label>
                <div class="col-sm-10">

                    @foreach($data as $k=>$v)
                        <tr>
                        <td>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" name="menu[]" value="{{$v['m_id']}}"> {{str_repeat('|--',substr_count($v['path'],'-'))}}{{$v['text']}}
                        </td>
                        </tr>
                    @endforeach

                </div>
            </div>
            </table>
            <label for="exampleInputEmail1" class="col-sm-2 control-label"></label>
            <input type="submit" value="添加按钮" class="btn btn-primary">
        </div>
    </form>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

