<?php
/**
 * Created by PhpStorm.
 * User: guangming
 * Date: 2017/11/3
 * Time: 14:30
 */

require_once './fn.php';

$user_id = check_login(false);
if($user_id != null){
    header("location:./../index.php");
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(empty($_POST['username']) || empty($_POST['password'])){
        $message = '请填写完整信息';
    }else{
        foreach ($_POST as $key => $value) {
            $$key = $value;
        }
        $userInfo = execute_row("SELECT * FROM user WHERE name='$username'");

        if(isset($userInfo)){
            if($userInfo['password'] === $password){
                session_start();
                $_SESSION['curr_user_login_user_id'] = intval($userInfo['user_id']);
                header("location:./../index.php");
                exit();
            }else{
                $message = '用户名或密码错误';
                header("location:./login.php");
                exit();
            }
        }else{
            $message = '用户名错误';
            header("location:./login.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/account.css">
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
                <form method="post">
                    <label>用户名：<input type="text" name="username" id="username"></label><br>
                    <label>密　码：<input type="text" name="password" id="password"></label><br>
                    <label>验证码：<input type="text" name="testcode" id="testcode"></label><br>
                    <a href="./add_account.php" id="add_account">注　册</a>
                    <button type="submit" id="loginBtn">登　录</button>
                </form>
            </div>


        </div>
    </div>
</div>
<div class="nav">
    <div class="w"></div>
</div>

<?php if(isset($message)) { ?>
    <div class="tips">
        <p><?php echo $message ?></p>
    </div>

<?php } ?>

<script type="text/html" id="myTplcategory">
    <span><a href="#">{{category_name}}</a></span>
</script>

<script src="../assets/venders/js/jquery-1.12.4.js"></script>
<script src="../assets/js/base.js"></script>

<!--<script src="../js/account.js"></script>-->
</body>
</html>
