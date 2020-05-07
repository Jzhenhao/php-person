function reflash(){

    var change = document.getElementById('captcha_img');

    check.src="admin/captcha.php?r=<?php echo rand(); ?>";

}

$(document).ready(function(){//页面加载完成再加载脚本



    /*点击登录按钮后做的事件处理*/

    $('input[name="b_login"]').click(function(event){

        var $name = $('input[name="username"]');

        var $password = $('input[name="password"]');

        var $captcha =  $('input[name="captcha"]');

        var $text = $(".text");

        var _name = $.trim($name.val());//去掉字符串多余空格

        var _password = $.trim($password.val());

        var _captcha_img =  $.trim($captcha.val());



        if(_name==''){

            $text.text('请输入用户名');

            $name.focus();

            return;

        }

        if(_password==''){

            $text.text('请输入密码');

            $password.focus();

            return;

        }

        if(captcha==""){

            $text.text('请输入验证码');

            return;

        }





    });



});