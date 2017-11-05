<?php
/**
 * Created by PhpStorm.
 * User: guangming
 * Date: 2017/11/3
 * Time: 14:31
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/add_account.css">
</head>
<body>

<div class="header">
    <div class="top">
        <div class="w">
            <div class="left fl">我是可爱的留言板</div>
            <div class="right fr">
                <a href="./login.html">登录</a>
                <a href="./add_account.html">注册</a>
            </div>
        </div>
    </div>
    <div class="w">
        <div class="login">
            <div class="center">
                <form id="ajaxForm">
                    <label>用户名：<input type="text" name="username" id="username"></label>
                    <label>密　码：<input type="text" name="password" id="password"></label><br>
                    <label>确认密码：<input type="text" name="rpassword" id="rpassword"></label>
                    <label>性　别：<input type="radio" name="sex" value="1" checked>男
                        <input type="radio" name="sex" value="0">女
                        <input type="radio" name="sex" value="2">其他</label><br>
                    <label>手　机：<input type="text" name="mobile" id="mobile"></label>
                    <!--<label>个性签名：<textarea name="text"></textarea></label><br>-->
                    <label>上传头像：<input type="file" name="headerfile"></label><br>
                    <label>验证码：<input type="text" name="testcode" id="testcode"></label><br>
                    <i id="login_Btn" >登　录</i>
                    <i id="resetBtn" >重新输入</i>
                    <i id="addaccountBtn" >注　册</i>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="nav">
    <div class="w"></div>
</div>

<div class="tips">
    <p>用户名不能为空</p>
</div>


<script type="text/html" id="myTplcategory">
    <span><a href="#">{{category_name}}</a></span>
</script>
<script src="../js/jquery-1.12.4.js"></script>
<script src="../js/template-web.js"></script>
<script src="../js/jQuery-cookie.js"></script>
<script src="../js/base.js"></script>
<script src="../js/account.js"></script>
</body>
</html>
