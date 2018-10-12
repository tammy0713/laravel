<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="{{url('hello/up_do')}}" method="post">
    <table>
        <tr>
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$up->id}}">
            <td><input type="text" name="name" value="{{$up->name}}"></td>
            <td><input type="text" name="pwd" value="{{$up->pwd}}"></td>
            {{--<td><input type="hidden" name="_token" value="{{csrf_token()}}"></td>--}}
        </tr>
        <tr>
            <td><input type="submit" value="修改"></td>
        </tr>
    </table>
</form>
</body>
</html>