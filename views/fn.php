<?php
/**
 * Created by PhpStorm.
 * User: guangming
 * Date: 2017/11/3
 * Time: 14:34
 */

header("content-type:text/html;charset=uft-8");

require_once '/web/item/messageboardphp/views/config.php';

function connect()
{
    return mysqli_connect(DB_ADDRESS, DB_USER, DB_PASSWORD, DB_NAME);
}


//check_login
/**判断是否登录*/
function check_login($info)
{
    if (isset($_COOKIE['PHPSESSID'])) {
        session_start();
        if (empty($_SESSION['curr_user_login_user_id'])) {
            if ($info === true) {
                header("location:./login.php");
                exit();
            }
        }
    } else {
        if ($info === true) {
            header("location:./login.php");
            exit();
        }
    }
    if (isset($_SESSION['curr_user_login_user_id'])) {
        return $_SESSION['curr_user_login_user_id'];
    } else {
        return null;
    }
}


//execute_scalar
/**单项查找*/
function execute_scalar($sql)
{
    $conn = connect();
    mysqli_query($conn, "set names utf8");
    mysqli_query($conn, "set character set utf8");//读库
    $reader = mysqli_query($conn, $sql);
    $item = mysqli_fetch_row($reader);
    mysqli_free_result($reader);
    mysqli_close($conn);
    return $item[0];
}

//execute_row
/**返回一行数据*/
function execute_row($sql)
{
    $conn = connect();
    mysqli_query($conn, "set names uft8");
    mysqli_query($conn, "set character set utf8");//读库

    $reader = mysqli_query($conn, $sql);
    $item = mysqli_fetch_assoc($reader);
    mysqli_free_result($reader);
    mysqli_close($conn);
    return $item;
}


//execute_table
/**返回多组数据*/
function execute_table($sql)
{
    $conn = connect();
    mysqli_query($conn, "set names uft8"); //写库
    mysqli_query($conn, "set character set utf8");//读库
    $reader = mysqli_query($conn, $sql);
    $lis = array();
    while ($item = mysqli_fetch_assoc($reader)) {
        $lis[] = $item;
    }
    mysqli_free_result($reader);
    mysqli_close($conn);
    return $lis;
}


//execute_non_query

/** 执行非查询语句, 获得受影响行数 */
function execute_non_query($sql)
{
    $conn = connect();
    mysqli_query($conn, "set names utf8");
    mysqli_query($conn, "set character set utf8");//读库
    mysqli_query($conn, $sql);
    $count = mysqli_affected_rows($conn);
    mysqli_close($conn);
    return $count;
}