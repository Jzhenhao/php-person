<?php

header("Content-type: text/html; charset=utf-8");



$link = @mysqli_connect("localhost" , "root" ,"");
if(!$link){
    echo 'connect error'.mysqli_connect_error();
    exit();
}

mysqli_select_db($link, 'mymsg');
mysqli_set_charset($link , 'utf8');
$rs = mysqli_query($link , "select * from msg");

if($link ==false){
    echo mysqli_error($link);
    exit();
}

$r1 = mysqli_fetch_assoc($rs);
$r2 = mysqli_fetch_assoc($rs);
$r3 = mysqli_fetch_assoc($rs);

var_dump($r1);
echo '<br>';
var_dump($r2);
echo '<br>';
var_dump($r3);


#echo 'connect success';