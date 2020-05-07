<?php
header("Content-type: text/html; charset=utf-8");

$p = $_POST;

##建立连接
$link = @mysqli_connect("localhost" , "root" ,"");
if(!$link){
    echo 'connect error'.mysqli_connect_error();
    exit();
}
mysqli_set_charset($link , 'utf8');
mysqli_select_db($link, 'msg');

##
$sql = "insert into lyb VALUES (null , ".$p['username'].",".$p['content'].")";

$r = mysqli_query($link , $sql);

$con = $p['username']."\r\n\r\n".$p['content'];
$file_name = 'msg_con/'.time().'.txt';
$r = file_put_contents($file_name,$con);
if($r){

    echo '留言成功';
    echo '<br>';
    echo '<a href="msg_index.php">回到首页</a>';
}


