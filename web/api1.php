<?php
    header("Content-type: text/html; charset=utf-8");

$ch = curl_init();

$url = 'http://zuowen.api.juhe.cn/zuowen/typeList?id=2';
$url.= '&key=b98e546cac7e4d53a0d3e9b45b21bfa6';

curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_HEADER,0);

$output = curl_exec($ch);
$art_type = json_decode($output);
//echo $output;
//var_dump($art_type->result);

$ch1 = curl_init();

$url1 = 'http://zuowen.api.juhe.cn/zuowen/typeList?id=1';
$url1.= '&key=b98e546cac7e4d53a0d3e9b45b21bfa6';

curl_setopt($ch1,CURLOPT_URL,$url1);
curl_setopt($ch1,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch1,CURLOPT_HEADER,0);

$output1 = curl_exec($ch1);
$art_type1 = json_decode($output1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>API</title>
    <style>
        body{
            background-color: papayawhip;
        }
        .im img{
            width: 100%;
            height: 650px;
        }
        #xuanzhun{
            -webkit-transition-property: -webkit-transform;
            -webkit-transition-duration: 10s;
            -moz-transition-property: -moz-transform;
            -moz-transition-duration: 10s;
            -webkit-animation: rotate 20s linear infinite;
            -moz-animation: rotate 20s linear infinite;
            -o-animation: rotate 20s linear infinite;
            animation: rotate 20s linear infinite;
        }
        @-webkit-keyframes rotate{from{-webkit-transform: rotate(0deg)}
            to{-webkit-transform: rotate(360deg)}
        }
        @-moz-keyframes rotate{from{-moz-transform: rotate(0deg)}
            to{-moz-transform: rotate(359deg)}
        }
        @-o-keyframes rotate{from{-o-transform: rotate(0deg)}
            to{-o-transform: rotate(359deg)}
        }
        @keyframes rotate{from{transform: rotate(0deg)}
            to{transform: rotate(359deg)}
        }

    </style>
</head>
<body>
<h1 align="center">作文大全</h1>

<form action="api2.php" method="get" align="center">
    <h2>题材分类</h2>
<select name="id">
    <?php
    foreach($art_type->result as $v){
        echo "<option value='{$v->id}'>{$v->name}</option>";
    }
    ?>
<!--    <option>aaa</option>-->
<!--    <option>bbb</option>-->
<!--    <option>ccc</option>-->
</select>

<input type="submit" name="dosub" value="查看">
</form>
<br>
<form action="api3.php" method="get" align="center">
    <h2>年级分类</h2>
    <select name="id">
        <?php
        foreach($art_type1->result as $r){
            echo "<option value='{$r->id}'>{$r->name}</option>";
        }
        ?>
    </select>

    <input type="submit" name="dosub" value="查看">
    <br><br>
    <div class="im">
    <img src="images/风景.jpg">
    </div>
    <div id="xuanzhun" style="width:100px; height: 90px; background-color:#ffff00;position: absolute;margin-left: 30%;margin-top: -30%;text-align: center">
        <a title="别点我，点我也没用">啦啦啦<br>哈哈哈<br>呵呵呵<br>略略略</a>
    </div>
    <a href="msg_index.php"><font size="6">返回首页</font></a>

</form>

</body>
</html>