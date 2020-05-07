<?php
header("Content-type: text/html; charset=utf-8");

$con_list = scandir('msg_con');
unset($con_list[0]);
unset($con_list[1]);
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <style>
        .k{
            text-align: center;
            font-size:4em;
            color:green;
        }
        .content{
            margin-top: 100px;
            width: 100%;
            height: 800px;
            text-align: center;
            -border: 1px solid red;
        }
        .list_img{
            position: relative;
            margin-top: -10%;
            background-color: pink;
        }
        .list_img a{
            font-size:2em;
        }
    </style>
</head>
<body>
<div id="k" class="k">欢迎进入首页</div>
<div style="background-color:yellow;width: 150px;height: 50px;float: right">
    <?php
        echo "你好，jin| <a href='index.php'>退出登录</a>";
    ?>
</div>
<a href="api1.php">点此进入API——作文分类</a>
<div class="content">
    <h1>文字分享—留言板</h1>

<?php
header("Content-type: text/html; charset=utf-8");


foreach($con_list as $v){
    $file_name = 'msg_con/'.$v;
    $file_con = file_get_contents($file_name);
    $r = explode("\r\n\r\n",$file_con);
    $username = $r[0];
    $con = $r[1];
    date_default_timezone_set("Asia/Shanghai");

    echo '<div style="border: 1px solid gray; margin-bottom: 5px">';
    echo '<span>留言内容:'.$con.'</span>';
    echo '<div>留言人:'.$username.'</div>';
    echo "留言时间是 " . date("Y-m-d h:i:sa");
    echo '</div>';
}
?>

<?php
$count=0;
if(file_exists("count.txt"))
{
    $count=file_get_contents("count.txt");
}
$count++;
echo "访问量：".$count;
file_put_contents("count.txt",$count);
?>
<form action="msg_add.php" method="post" style="background-color: #2aabd2">
    <label>留言内容：</label>
    <br>    <textarea name="content"  style="width: 400px ;height: 200px"></textarea>
    <br>
    <label>留言人:</label>
    <input type="text" name="username">
    <br>
    &nbsp; &nbsp;<input type="submit" name="dosub" value="提交" >
</div>
</form>


<div class="list_img">
    <h1 style="text-align:center">图片分享</h1>
<a href="#">图片列表</a>

<form enctype="multipart/form-data" method="post" action="upload.php" style="text-align: center">
    <input type="hidden" name="MAX_FILE_SIZE" value="600000000">
    <input type="file" name="userfile" ><br><br>
    <label>留言人:<?php echo $username; ?></label>
    <input type="submit" value="上传">
</form>
</div>
<div class="images_share">
    <?php
    header("Content-type: text/html; charset=utf-8");
    echo '<a href="#">图片分享</a>';
    echo '<br>';

    $file_list = scandir('upload');
    foreach($file_list as $f) {
    if ($f == '.' or $f == '..') {
    continue;
    }
        echo '<div style="border: 1px solid #b9def0; margin-bottom:20px">';
        echo "<img width='300' src='upload/{$f}'>";
        echo '<div>留言人:'.$username.'</div>';
        echo "留言时间是 " . date("Y-m-d h:i:sa");
    echo '<br>';
    }
    ?>
</div>
<div class="sousuo" style="background: url(images/风景.jpg);">
 <h1 style="color: #e4b9b9">其它操作</h1>
<h1 align="center">验证长度</h1>

<form action="one.php" method="post" align="center">
    请输入身份证号:<input type="text" name="username" value="">
    <br> <br>
    <input type="submit" name="dosub" value="提交">
</form>

<h1 align="center">搜索分享内容关键字</h1>
<form action="two.php" method="get" align="center">
    请输入关键字:<input type="text" name="wz" value="">
    <br> <br>
    <input type="submit" name="dosub" value="搜索">
    </form>

<h1 align="center">验证身份证号码真伪</h1>
<form action="three.php" method="post" align="center">
    请输入身份证号:<input type="text" name="wz" value="">
    <br> <br>
    <input type="submit" name="dosub" value="提交">
</form>
</div>
</body>

</html>
<script>
    setTimeout("document.getElementById('k').style.display='none'",2400);
</script>
