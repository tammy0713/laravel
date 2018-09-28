<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>展示数据</title>
</head>
<body>
<form action="add" method="post">
    <table>
        <tr>
            {{csrf_field()}}
            <td><input type="text" name="name"></td>
            <td><input type="text" name="pwd"></td>
            {{--<td><input type="hidden" name="_token" value="{{csrf_token()}}"></td>--}}
        </tr>
        <tr>
            <td><input type="submit" value="提交"></td>
        </tr>
    </table>
</form>
</body>
</html>