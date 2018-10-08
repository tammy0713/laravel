<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="author" content="order by dede58.com"/>
    <title>用户注册</title>
    <link rel="stylesheet" href="{{ URL::asset('css/login.css') }}">
</head>
<body>
<form  method="post" action="register_do">
    @csrf
    <div class="regist">
        <div class="regist_center">
            <div class="regist_top">
                <div class="left fl">会员注册</div>
                <div class="right fr"><a href="./index.html" target="_self">小米商城</a></div>
                <div class="clear"></div>
                <div class="xian center"></div>
            </div>
            <div class="regist_main center">
                <div class="username">用&nbsp;&nbsp;户&nbsp;&nbsp;名:&nbsp;&nbsp;<input class="shurukuang" type="email" id="email" name="email" placeholder="请输入你的邮箱"/>
                    <span id="email1" style="color: red"></span></div>
                <div class="username">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:&nbsp;&nbsp;<input class="shurukuang" type="password" id="password" name="password" placeholder="请输入你的密码"/><span id="s_password" style="color: red"></span></div>

                <div class="username">确认密码:&nbsp;&nbsp;<input class="shurukuang" type="password" name="repassword" id="repassword" placeholder="请确认你的密码"/>
                    <span id="s_repassword" style="color: red"></span></div>
                <div class="username">手&nbsp;&nbsp;机&nbsp;&nbsp;号:&nbsp;&nbsp;<input class="shurukuang" type="text" id="tel" name="tel" placeholder="请填写正确的手机号"/>
                    <span id="s_tel" style="color: red"></span></div>
                <div class="username">
                    <div class="left fl">验&nbsp;&nbsp;证&nbsp;&nbsp;码:&nbsp;&nbsp;<input class="yanzhengma" type="text" name="captcha" placeholder="请输入验证码"/></div>
                    <div class="right fl"><img src="{{captcha_src()}}" style="cursor: pointer" onclick="this.src='{{captcha_src()}}'+Math.random()">
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="regist_submit">
                <input class="submit" id="sub" type="submit" name="submit" value="立即注册" >
            </div>

        </div>
    </div>
</form>
</body>
</html>
<script src="../../../js/app.js"></script>
<script>
    $("#email").blur(function(){
        if($("#email").val()=='' || !$("#email").val().match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/))
        {
            $("#email1").text("邮箱格式错误");
            return false;
        }else{
            $("#email1").text("邮箱正确");
            return true;
        }
    });
    $("#password").blur(function(){
        var pwd= $("#password").val();
        if(pwd.length < 6)
        {
            $("#s_password").text("密码不允许小于6位");
            return false;
        }else{
            var one=/^\d{6,}$/;//只有数字
            var two=/^[a-z]{6,}$/;//小写字母
            var three=/^[A-Z{6,}]$/;//大写字母
            var four=/^\W{6,}$/;//特殊字符
            var five=/^\w{6,}$/;//所有字符
            if(one.test(pwd) || two.test(pwd)|| three.test(pwd) || four.test(pwd)||five.test(pwd))
            {
                $("#s_password").text("安全为低");
                return true;
            }else{
                $("#s_password").text("安全为高");
                return true;
            }
        }
    });
    //判断两次密码
    $("#repassword").blur(function(){
        if($("#repassword").val()==$("#password").val())
        {
            $("#s_repassword").text("两次密码一致");
            return true;
        }else if($("#repassword").val()=='')
        {
            $("#s_repassword").text("确认密码不能为空");
            return false;
        }else{
            $("#s_repassword").text("两次密码不一致");
            return false;
        }
    });
    //判断手机号
    $("#tel").blur(function(){
       if($("#tel").val()!=$("#tel").val().match(/^[1][3,4,5,7,8][0-9]{9}$/))
       {
           $("#s_tel").text("手机号不符合");
           return false;
       }else{
           $("#s_tel").text("手机号填写正确");
           return true;
       }
    });
    $("#sub").click(function(){
        if($("#tel").val()==false ||$("#repassword").val()==false ||$("#password").val()==false ||$("#username1").val()==false)
        {
            alert("您的信息还不完善");
            return false;
        }
    });
</script>