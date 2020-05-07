<?php
header("Content-type: text/html; charset=utf-8");

$file = $_FILES['userfile'];

#前端大小
if($file['error'] == 2){
    echo '文件大小超过了MAX_FILE_SIZE';
    echo '<br>';
    echo '<a href="msg_index.php">返回</a>';
    die();
}

#后端大小
if($file['size'] > 6*1024*1024){
    echo '文件过大';
    echo '<br>';
    echo '<a href="msg_index.php">返回</a>';
    die();
}

#文件类型
$file_mimes = ['image/jpeg','image/gif','image/png'];
if(!in_array($file['type'],$file_mimes)){
    echo '本站只允许上传图片类型';
    echo '<br>';
    echo '<a href="msg_index.php">返回</a>';
    die();

}else {
    if (is_uploaded_file($file['tmp_name'])){
        $s =  $file['name'];
        $pot = strrpos($s,'.');
        $t =substr($s,$pot);
        $new_filename ='Jinzhenhao'.'-'.time().'-'.rand(1000,9999).$t;
        echo "$new_filename";

        move_uploaded_file($file['tmp_name'], 'upload/'.$new_filename );
        echo '上传成功！';
        echo '<br>';
        echo '<a href="msg_index.php">图片列表</a>';
    } else {
        echo '临时文件异常';
        echo '<br>';
        echo '<a href="msg_index.php">返回</a>';
    }
}