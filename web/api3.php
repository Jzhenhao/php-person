<?php
$id = $_GET['id'];

header("Content-type: text/html; charset=utf-8");


$ch = curl_init();

$url = 'http://zuowen.api.juhe.cn/zuowen/baseList';
$url.= '?gradeId='.$id.'&typeId=&wordId=&level=&page=&key=b98e546cac7e4d53a0d3e9b45b21bfa6';

curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_HEADER,0);

$output = curl_exec($ch);
//$art_type = json_decode($output);
//var_dump($art_type);
$res = json_decode($output);
$result = $res->result;
$zs = $result->totalCount;
$djy = $result->page;
$rs = $result->list;

echo '<a href="api1.php">返回</a>';
echo '<br>';

foreach($rs as $r){
    echo $r->name;
    echo '<br>';

}