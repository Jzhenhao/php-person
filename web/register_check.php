<?php
session_start();

header("Content-type:text/html;charset=utf-8");

$link = mysqli_connect('localhost','root','','msg');

if (!$link) {

    die("连接失败:".mysqli_connect_error());

}



$username = @$_POST['username'];

$password = @$_POST['password'];

$confirm = @$_POST['confirmPassword'];//确认密码

$code = @$_POST['captcha'];//验证码




$photoFile = @$_FILES['photoFile']['tmp_name'];//图片文件

/* $data['img'] =base64_encode(file_get_contents($_FILES['photoFile']['tmp_name']));*/

//$data['img_type'] = @$_FILES['photoFile']['type'];

/* $image = mysql_real_escape_string(file_get_contents(@$_FILES['photoFile']['tmp_name']),"localhost"); //获取图片*/





include('file_check.php');



$imgPath = @$_SESSION['imgPath'];



if($username == "" || $password == "" || $confirm == "" || $code == "" ||

    $photoFile==""

)

{

    echo "<script>alert('信息不能为空！重新填写');window.location.href='register.html'</script>";

} elseif ((strlen($username) < 3)||(!preg_match('/^\w+$/i', $username))) {

    echo "<script>alert('用户名至少3位且不含非法字符！重新填写');window.location.href='register.html'</script>";

    //判断用户名长度

}elseif(strlen($password) < 6){

    echo "<script>alert('密码至少6位！重新填写');window.location.href='register.html'</script>";

    //判断密码长度

}elseif($password != $confirm) {

    echo "<script>alert('两次密码不相同！重新填写');window.location.href='register.html'</script>";

    //检测两次输入密码是否相同

}

elseif($code != $_SESSION['authcode']) {

    echo "<script>alert('验证码错误！重新填写');window.location.href='register.html'</script>";

    //判断验证码是否填写正确

} elseif(mysqli_fetch_array(mysqli_query($link,"select * from user where username = '$username'"))){

    echo "<script>alert('用户名已存在');window.location.href='register.html'</script>";

}

else{

    $sql= "insert into user(username, password) values('$username','$password')";

    //插入数据库

    if(!(mysqli_query($link,$sql))){

        echo "<script>alert('数据插入失败');window.location.href='register.html'</script>";

    }

    else{

        echo  "<script>alert('注册成功！');window.location.href='index.php'</script>";

    }





}


?>