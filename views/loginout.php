<?php
/**
 * Created by PhpStorm.
 * User: guangming
 * Date: 2017/11/3
 * Time: 14:30
 */


require_once './fn.php';

session_start();

unset($_SESSION['curr_user_login_user_id']);

session_destroy();

header("location:./../index.php");