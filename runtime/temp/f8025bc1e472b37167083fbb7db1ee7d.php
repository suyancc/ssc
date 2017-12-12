<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:55:"D:\WWW\ssc\public/../application/index\view\\index.html";i:1499421278;s:57:"D:\WWW\ssc\public/../application/index\view\nav\head.html";i:1499420178;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
    <link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="__PUBLIC__/css/layui.css"/>
    <script type="text/javascript" src="__PUBLIC__/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/layer.js"></script>
    <script type="text/javascript" src="__PUBLIC__/layui/layui.js"></script>
</head>
<style>
    div, h1, h2, h3, h4, h5, h6, p, ul, li, dl, dd, dt, ol, hr, form, fieldset, input, textarea, select {
        margin: 0;
        padding: 0;
    }
</style>
<body>
<style>
    .top{
        height: 80px;
        margin: 0 auto;
        position: relative;
    }
    .main{
        height: 480px;
        margin: 0 auto;
    }
    .mainlef{
        float: left;
        margin-left: 50px;
        width: 40%;
        background-color: #006666;
    }
    .mainrig{
        float: right;
        width: 50%;
    }
    .loginPart{
        background: rgba(0,0,0,0) url('http://public.zgzcw.com/userCenter/login/bgOflogin.png') no-repeat scroll 0 0;
        height: 430px;
        padding: 3px 7px 7px 3px;
        width: 390px;
    }
    div.loginPart h2 strong {
        border-bottom: 2px solid #ee7d00;
        color: #a70000;
        display: inline-block;
        float: left;
        font-size: 20px;
        line-height: 56px;
        padding-top: 10px;
        text-align: center;
        width: 100%;
    }
    .loginbody{
        margin-top: 66px;
        padding: 45px 0 0 55px;
    }
    .loginbody input{
        width: 260px;
    }
    .loginbody button{
        width: 260px;
    }
    .co-login{
        margin-top: 45px;
        border-top: 1px dotted #dddddd;
    }
</style>
<div class="top">
    <!--<a href="#" target="_blank" title="ssc">
        <img src="__PUBLIC__/img/logo.png" alt="">
    </a>-->
</div>
<div class="main">
    <div class="mainlef">
        <img src="http://public.zgzcw.com/huodong/images/loginbanner.jpg">
    </div>
    <div class="mainrig">
        <div class="loginPart">
            <h2><strong>用户登陆</strong></h2>
            <form class="layui-form" action="<?php echo url('index/login'); ?>" method="post">
                <div class="loginbody">
                    <div class="layui-form-item">
                        <div class="layui-input-inline">
                            <input  name="username" placeholder="请输入账号" class="layui-input" type="text" required>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-inline">
                            <input name="password" placeholder="请输入密码" class="layui-input" type="password" required>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <img src="<?php echo captcha_src(); ?>" onclick="this.src='<?php echo captcha_src(); ?>?t='+Math.random();" style="width: 110px;height: 38px;margin-left: -50px">
                        <div class="layui-input-inline">
                            <input style="width: 150px;margin: 0px" name="code" placeholder="请输入验证码" class="layui-input" type="text" required>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <button class="layui-btn layui-btn-normal" lay-filter="loginsub">立即登陆</button>
                    </div>
                </div>
            </form>
            <dl class="co-login">
                <dt style="padding: 6px">提醒：购买彩票有风险，在线投注需谨慎，不向未满18周岁的青少年出售彩票！</dt>
            </dl>
        </div>
    </div>
</div>
<script>
    layui.use('form',function(){
        var form = layui.form();

        form.on('submit(loginsub)',function(data){
           consolt.log(data.field);
            //return false;
        });
    });
</script>

</body>
</html>