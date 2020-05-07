<?php
header("Content-Type:text/html;charset=utf-8");

$wz = '';

$wb = [
    '度复古的风格呵呵防护垫付',
    '飞虎呵呵队是否合适',
    '今天天气真晴朗',
    '返回东莞东莞广东发货价格好的发个回复的更换发动机'
];

if(isset($_GET['wz'])) $wz = $_GET['wz'];
foreach($wb as $v) {
    $r = str_replace($wz, "<b><font color='red'>{$wz}</font></b>", $v);
    echo "<li>{$r}</li>";
}