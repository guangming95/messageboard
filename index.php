<?php
/**
 * Created by PhpStorm.
 * User: guangming
 * Date: 2017/11/3
 * Time: 14:20
 */

require_once "./views/fn.php";
//获取用户信息
$userID = check_login(false);

if(isset($userID)){
//    用户登录
    $userInfo = execute_row(sprintf("SELECT * FROM user WHERE user_id=%d",$userID));
}
//获取留言列表

$comments = execute_table("SELECT * FROM comment JOIN category ON comment.category_id=category.category_id;");

//var_dump($comments);


//获取分类列表

$category = execute_table("SELECT * FROM category");

//var_dump($category);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的留言板</title>
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>

<div class="header">
    <div class="top">
        <div class="w">
            <div class="left fl">我是可爱的留言板</div>
            <div class="right fr">
                <?php if(isset($userID)) { ?>
                <div class="user">欢迎您：<?php echo $userInfo['name']?></div>
                <?php }else{ ?>
                <a href="./views/login.php" class="visitor ">登录</a>
                <a href="./views/add_account.php" class="visitor ">注册</a>
                <?php }?>
            </div>
        </div>
    </div>
    <div class="w"></div>
</div>
<div class="nav">
    <div class="w">
        <span><a href="#">首页</a></span>
        <?php foreach ($category as $key => $value) { ?>
            <span><a href="#"><?php echo $value['category_name'] ?></a></span>
        <?php } ?>
    </div>
</div>


<div class="main">
    <div class="w clearfix">
        <?php foreach ($comments as $key => $value) {?>
            <div class="content">
                <div class="mini_comment">
                    <div class="tip" data-type="<?php echo $value['category_id'] ?>"><a href="#">
                            <?php echo $value['category_name'] ?>
                        </a></div>
                    <h4><a href="./views/readcomment.php?id=<?php echo $value['comment_id'] ?>">
                            <?php echo $value['comment_title'] ?>
                        </a></h4>
                    <div class="center">
                        <?php echo $value['content'] ?>
                    </div>
                    <div class="footer">
                        <div class="left fl">
                            <span>作者:</span>
                            <span>
                                <?php echo $value['user_name'] ?>
                            </span><br>
                            <span>发表时间:</span>
                            <span>
                                <?php echo $value['comment_time'] ?>
                            </span>
                        </div>
                        <div class="right fr">
                            <div class="img"><img src="assets/img/default.jpg" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!--侧面栏，登录才会有-->
<?php if(isset($userID)) {?>
<div class="aside">
    <a href="">发帖</a>
    <a href="./views/loginout.php">退出</a>
</div>
<?php } ?>
<i class="scrolltop disable">返回顶部</i>


<div class="tips">
    <p>用户名不能为空</p>
</div>


<!--文章分类，菜单-->
<script type="text/html" id="myTplcategory">
    <span><a href="#">{{category_name}}</a></span>
</script>


<!--文章-->
<script type="text/html" id="myTpl">
    <div class="content">
        <div class="mini_comment">
            <div class="tip" data-type="{{category_id}}"><a href="#">{{category_name}}</a></div>
            <h4><a href="./html/readcomment.html?id={{comment_id}}">{{comment_title}}</a></h4>
            <div class="center">{{content}}</div>
            <div class="footer">
                <div class="left fl">
                    <span>作者:</span>
                    <span>{{username}}</span><br>
                    <span>发表时间:</span>
                    <span>{{comment_time}}</span>
                </div>
                <div class="right fr">
                    <div class="img"><img src="assets/img/default.jpg" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</script>


<script src="assets/venders/js/jquery-1.12.4.js"></script>
<script src="assets/js/base.js"></script>

</body>
</html>