<?php
//开启Session

session_start();

header("Content-type:text/html;charset=utf-8");



$link = mysqli_connect('localhost','root','','msg');
if (!$link) {

    die("连接失败:".mysqli_connect_error());

}

//接受提交过来的用户名及密码

$username = @$_POST["username"];//用户名

$password = @$_POST["password"];//密码

$captcha = @$_POST["captcha"]; //验证码


if($captcha != @$_SESSION['authcode']) //判断填写的验证码是否与验证码PHP文件生成的信息匹配

{

    echo "<script type='text/javascript'>alert('验证码错误!');location='index.php';</script>";

    return;

}
$sql = "select * from user";

$result = mysqli_query($link, $sql);

$rows = mysqli_fetch_array($result);

if($rows) {

    //拿着提交过来的用户名和密码去数据库查找，看是否存在此用户名以及其密码

    if ($username == $rows["username"] && $password == $rows["password"]) {

        $_SESSION['username'] = $username;

        //echo "验证成功！<br>";

        echo "<script type='text/javascript'>alert('登录成功');location='msg_index.php';</script>";

    } else {

        //echo "用户名或者密码错误<br>";

        echo "<script type='text/javascript'>alert('用户名或者密码错误');location='index.php';</script>";

        //echo "<a href='login.html'>返回</a>";

    }

}

?>