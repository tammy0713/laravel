<?php
/**
 * Created by PhpStorm.
 * User: Tammy
 * Date: 2018/10/15
 * Time: 19:26
 */
?>

@extends('adminlte::page')
@section('content_header')
    <h1>欢迎{{session('msg')['a_name']}}登录&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="destroy">注销</a></h1>
@stop

@section('content')
    <h1 style="color:red">Welcome to the management of mi mall</h1>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

