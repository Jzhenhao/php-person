<?php
header("Content-type: text/html; charset=utf-8");
$P = $_POST;
$username =$P['username'];

$username = trim($username);
$username = addslashes($username);

$len = strlen($username);

if($len == 18){
    $login_msg = $P['username'].'正确,<a href="msg_index.php">返回</a>';
}else{
    $login_msg = '身份证号码长度不是18位,<a href="msg_index.php">请重新输入</a>';
}

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>验证信息</title>
</head>
<body>
<div>
    <?php
    echo $login_msg  ;
    echo '<br>';
    ?>
</div>
</body>
</html>
