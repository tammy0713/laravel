<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<table>
    <tr>
        <td>ID</td>
        <td>姓名</td>
        <td>密码</td>
        <td>操作</td>
    </tr>
    @foreach($select as $k =>$v)
        <tr>
            <td>{{$v->id}}</td>
            <td>{{$v->name}}</td>
            <td>{{$v->pwd}}</td>
            <td>
                <a href="del/id/{{$v->id}}">删除</a>
                <a href="up/id/{{$v->id}}">修改</a>
            </td>
        </tr>
    @endforeach
</table>
</body>
</html>