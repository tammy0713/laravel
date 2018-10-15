<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h3>注册</h3>


    <form action="add" method="post">
        <table>
            @csrf
            <tr>
                <td>用户名</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>密码</td>
                <td><input type="password" name="pwd"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="注册"></td>
            </tr>
        </table>
    </form>

</body>
</html>
