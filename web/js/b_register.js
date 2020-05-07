function reflash(){

    var change = document.getElementById('captcha_img');

    check.src="admin/captcha.php?r=<?php echo rand(); ?>";

}

$(document).ready(function(){//页面加载完成再加载脚本



    /*点击登录按钮后做的事件处理*/

    $('input[name="b_register"]').click(function(event){

        var $name = $('input[name="username"]');

        var $password = $('input[name="password"]');

        var $confirmPassword = $('input[name="confirmPassword"]');

        var $photoFile = $('input[name="photoFile"]');

        var $nickname = $('input[name="nickname"]');



        var $text2 = $(".text2");


        var _name = $.trim($name.val());//去掉字符串多余空格

        var _password = $.trim($password.val());

        var _confirmPassword = $.trim($confirmPassword.val());

        var _nickname = $.trim($.trim($nickname.val()));


        if(_name == ''){

            $text2.text('请输入用户名');

            $name.focus();

            return;

        }


        if(_nickname == ""){

            $text2.text('请输入昵称');

            $nickname.focus();

            return;

        }

        if(_password == ''){

            $text2.text('请输入密码');

            $password.focus();

            return;

        }

        if(_confirmPassword == ""){

            $text2.text("请输入验证码");

            $confirmPassword.focus();

            return;

        }

        if(_password !=_confirmPassword){

            $text2.text("两次输入的密码不一致");

            $password.focus();

            return;

        }

        if (_photoFile == "") {

            $text2.text("请选择一个图片文件");

            $photoFile.focus();

            return;

        }

    });



});