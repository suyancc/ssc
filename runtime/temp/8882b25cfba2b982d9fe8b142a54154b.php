<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:54:"D:\WWW\ssc\public/../application/index\view\home1.html";i:1500471750;s:57:"D:\WWW\ssc\public/../application/index\view\nav\head.html";i:1499420178;s:57:"D:\WWW\ssc\public/../application/index\view\nav\menu.html";i:1500382082;s:56:"D:\WWW\ssc\public/../application/index\view\nav\top.html";i:1500382629;s:57:"D:\WWW\ssc\public/../application/index\view\nav\foot.html";i:1500470933;}*/ ?>
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
<script type="text/javascript" src="__PUBLIC__/js/main.js"></script>
<style>
    .top {
        height: 25px;
        background: #393D49;
    }

    .head {
        height: 60px;
        background-color: white;
    }

    .head ul {
        /*background-color: white;*/
    }

    .mainbody {
        height: 900px;
        background-color: #c2c2c2;
    }

    .bl {
        float: left;
        width: 200px;
        height: 400px;
        margin: 8px 0 0 8px;
        border-radius: 15px;
        background-color: #D75959;
    }

    .bltop {
        height: 250px;
        width: 100%;
        color: white;
        padding: 15px;
    }

    .bldo {
        height: 150px;
        width: 100%;
        border-bottom-right-radius: 15px;
        border-bottom-left-radius: 15px;
        background-color: white;
    }

    .br {
        height: 850px;
        border-radius: 5px;
        width: 77%;
        float: right;
        margin: 15px 15px 0 5px;
        background-color: white;
    }

    .brtop {
        margin-top: 5px;
        height: 100px;
    }

    .brtopl {
        text-align: center;
        float: left;
        width: auto;
        height: 100px;
        /*background-color: #d5d5d5;*/
    }

    .brtopb div {
        width: 400px;
    }

    .brtopr {
        float: right;
        width: 230px;
        text-align: center;
        margin-top: -5px;
    }

    .sl-draw-number-ball {
        float: left;
    }

    .sl-draw-number-ball ul {
        list-style: none;
        display: block;
        list-style-type: disc;
        -webkit-margin-before: 1em;
        -webkit-margin-after: 1em;
        -webkit-margin-start: 0px;
        -webkit-margin-end: 0px;
        -webkit-padding-start: 40px;
    }

    .sl-draw-number-ball li {
        color: #fff;
        line-height: 36px;
        font-size: 19px;
        float: left;
        width: 36px;
        height: 37px;
        text-align: center;
    }

    .red {
        margin-right: 8px;
        background: url(http://static.lecai.com/img/web/lottery/draw/sorts/common/ball_bg.png) 0 0 no-repeat;
    }

    .log {
        color: white;
        margin-left: 15px;
        float: left;
        width: 100%;
        margin-top: 3px
    }


    .list-group-item {
        padding: 3px 0 0 0;
        height: 26px;
    }

    .l1 {
        float: left;
        margin-left: 15px;
        font-size: 15px
    }
    .l2 {
        color: red;
        font-size: 18px
    }
</style>
<div class="head" style="text-align: center;">
    <ul id="menu" class="layui-nav" lay-filter="">
        <img src="__PUBLIC__/img/logo.png" style="width: 50px;height: 50px;float: left;margin-top: 5px" alt="">
        <li id="index" class="layui-nav-item layui-this"><a href="<?php echo url('home/index'); ?>">首页</a></li>
        <li id="xz" class="layui-nav-item"><a href="<?php echo url('home/xz'); ?>">下注明细</a></li>
        <li class="layui-nav-item"><a href="">历史账单</a></li>
        <li class="layui-nav-item"><a href="">开奖号码</a></li>
        <!--<li  style="float: right;margin-top: 10px">-->
            <!--<button class="layui-btn layui-btn-warm layui-btn-radius" onclick="loginout()">安全退出</button>-->
            <!--<button class="layui-btn layui-btn-danger layui-btn-radius">联系我们</button>-->
        <!--</li>-->
    </ul>
</div>
<script>
    function loginout(){
        $.get("<?php echo url('home/loginout'); ?>",function(){window.location='index/index';});
    }
    $(function(){
        var url = window.location.href;
        url = url.split('/');
        url = url[url.length-1];
        url = url.split('.');
        url = url[0];

        $('#index')[0].className='layui-nav-item';
        $('#xz')[0].className='layui-nav-item';

        $('#'+url)[0].className='layui-nav-item layui-this';
    })
</script>





























<style>
    table,table tr th, table tr td { border:1px solid;}
    .check:hover{
        background-color: whitesmoke;
    }
    .tred{
        color: red;font-size: 15px;float: right
    }
</style>
<div class="container1">
    <div class="form-control">
    <div class="form-group" style="background-color: black">
        <div class="col-xs-8"><marquee id="mqnotice" onmouseover="this.stop()" onmouseout="this.start()" scrolldelay="100"><?php echo $gonggao; ?></marquee></div>
        <div class="col-xs-4"><label id="open_state">距[99999999]期关盘还有: 99分99秒</label></div>
        <!--<div class="form-inline text-right">-->
            <!--<label id="open_state">距[99999999]期关盘还有: 99分99秒</label>-->
        <!--</div>-->
    </div>
</div>
    <div class="col-md-3 col-xs-0"  style="height: 100%;padding: 0">
        <label class="text-center" style="background-color: #1592C3;height: 30px;width: 100%;padding-top: 5px;color: white">会员信息</label>
        <div style="margin-left: 15px">
            <div><label>账号：<?php echo $info['username']; ?></label></div>
            <!--<div><label>信用：<?php echo $info['xinyong']; ?></label></div>-->
            <!--<div><label>已用：<?php echo $info['yiyong']; ?></label></div>-->
            <div><label id="usermoney">余额：<?php echo $info['money']; ?></label></div>
            <div><label id="qsold" style="margin-left: 20%"></label></div>
            <div><label class="sl-draw-number-ball"></label></div>
        </div>
        <label class="text-center" style="background-color: #1592C3;height: 30px;width: 100%;padding-top: 5px;color: white">重庆时时彩</label>
        <label>期数：</label><label id="qs"></label>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>号码</th>
                    <th>赔率</th>
                    <th>金额</th>
                </tr>
            </thead>
            <tbody id="listall"></tbody>
        </table>
    </div>
    <div class="col-md-9" style="height: 100%;padding: 0">
        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief" style="margin: 0">
            <ul class="layui-tab-title">
                <li class="layui-this">一字定</li>
                <li>二字定</li>
                <li>快打</li>
                <li>快选</li>
            </ul>
            <div class="layui-tab-content" style="padding: 0">
                <div class="layui-tab-item layui-show">
                    <table class="table table-bordered" id="tables">
                        <thead>
                        <tr>
                            <td colspan="4" style="text-align: center;padding: 2px;"><label id="msg">笔数： 0 总金额： 0</label></td>
                        </tr>
                        <tr style="background-color: #009E94;">
                            <td id="1001"><label>口XXX</label></td>
                            <td id="1002"><label>X口XX</label></td>
                            <td id="1003"><label>XX口X</label></td>
                            <td id="1004"><label>XXX口</label></td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php echo $yiziding; ?>
                        <tr>
                            <td>
                                <button class="layui-btn layui-btn-small" onclick="CheckLie(0,2)">单</button>
                                <button class="layui-btn layui-btn-small" onclick="CheckLie(0,3)">双</button>
                                <button class="layui-btn layui-btn-small" onclick="CheckLie(0,4)">大</button>
                                <button class="layui-btn layui-btn-small" onclick="CheckLie(0,5)">小</button>
                            </td>
                            <td>
                                <button class="layui-btn layui-btn-small" onclick="CheckLie(1,2)">单</button>
                                <button class="layui-btn layui-btn-small" onclick="CheckLie(1,3)">双</button>
                                <button class="layui-btn layui-btn-small" onclick="CheckLie(1,4)">大</button>
                                <button class="layui-btn layui-btn-small" onclick="CheckLie(1,5)">小</button>
                            </td>
                            <td>
                                <button class="layui-btn layui-btn-small" onclick="CheckLie(2,2)">单</button>
                                <button class="layui-btn layui-btn-small" onclick="CheckLie(2,3)">双</button>
                                <button class="layui-btn layui-btn-small" onclick="CheckLie(2,4)">大</button>
                                <button class="layui-btn layui-btn-small" onclick="CheckLie(2,5)">小</button>
                            </td>
                            <td>
                                <button class="layui-btn layui-btn-small" onclick="CheckLie(3,2)">单</button>
                                <button class="layui-btn layui-btn-small" onclick="CheckLie(3,3)">双</button>
                                <button class="layui-btn layui-btn-small" onclick="CheckLie(3,4)">大</button>
                                <button class="layui-btn layui-btn-small" onclick="CheckLie(3,5)">小</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="layui-form-item" style="text-align: center;padding: 0px">
                        <div class="layui-form-inline">
                            <input id="money" class="layui-input-block" placeholder="请输入金额" type="number" value="0.5">
                            <button class="layui-btn layui-btn-normal" onclick="GetCheckId(2)">下单</button>
                            <button class="layui-btn layui-btn-danger" onclick="tettt()">取消</button>
                        </div>
                    </div>
                </div>
                <div class="layui-tab-item">12</div>
                <div class="layui-tab-item">123</div>
                <div class="layui-tab-item">1234</div>
            </div>
        </div>
    </div>
</div>

<script>
    var m_Color = '#E4AB27';
    var laytpl;
    layui.use(['element','laytpl'], function () {
        var element = layui.element();
        laytpl = layui.laytpl;
    });

    function GetNowXZList(){
        $.get("<?php echo url('home/GetNowXZList'); ?>",function(data){
            $('#listall').html(data);// = data;
        })
    }

    $('td').on('click',function(){
        var id = jQuery(this).attr('id');
        if(id == undefined)return;
        if(id > 1000){
            CheckLie(id-1001,1);
        }else{
            var color = this.style.backgroundColor;
            this.style.backgroundColor = color == '' ? m_Color : '';
            GetCheckId(1)
        }
    });

    //type 1.选中 2.选择单 3.选择双 4.选择大 5.选择小
    function CheckLie(lie,type){
        var table = document.getElementById('tables');
        for(var i=0;i<table.rows.length;i++){
            if(i > 1 && i < table.rows.length-1){
                var color = '';
                var rows = table.rows[i].cells[lie];
                var style = rows.style.backgroundColor;

                switch (type){
                    case 1:
                        color = style == ''?m_Color:'';
                        break;
                    case 2:
                        if(i%2!=0)color = style == ''?m_Color:'';
                        break;
                    case 3:
                        if(i%2==0)color = style == ''?m_Color:'';
                        break;
                    case 4:
                        if(i>6)color = style == ''?m_Color:'';
                        break;
                    case 5:
                        if(i<7)color = style == ''?m_Color:'';
                        break;
                    default :
                        color = '';
                        break;
                }
                rows.style.backgroundColor = color;
            }
        }
        GetCheckId(1)
    }

    //type 1获取数量
    function GetCheckId(type){
        var table = document.getElementById('tables');
        var arr = new  Array();
        var id=0;
        for(var i=0;i<table.rows.length;i++){
            if(i > 1 && i < table.rows.length-1){
                for(var j=0; j<table.rows[i].cells.length; j++){
                    var rows = table.rows[i].cells[j];
                    var style = rows.style.backgroundColor;
                    if(style){
                        var str = $(rows).context.innerText;
                        str = str.split(' ');
                        arr.push(str[0]);//rows.id
                        if(!id)id=rows.id;
                    }
                }
            }
        }
        var money = $('#money').val();
        if(type == 1){
            $('#msg').html('笔数： '+arr.length+' 总金额： '+money*arr.length);
            //console.log(arr.length)
        }else if(type == 2){
            if(money <=0){
                layer.alert('金额不正确',{icon:5});
                return;
            }
            $.post("<?php echo url('home/xiadan'); ?>",
                    {list:arr,money:money,id:id},
                    function(data){
                        console.log(data);
                        if(data.code==1){
                            GetUserInfo();
                            layer.msg(data.msg,{icon:6});
                        }else{
                            layer.msg(data.msg,{icon:5});
                        }
                    }

            );
        }
        //console.log(arr);
    }

    function GetUserInfo(){
        $.get("<?php echo url('home/GetUserInfo'); ?>",function(data){
            GetNowXZList();
            $('#usermoney').text(data.msg);
        });
    }

    function tettt(){
        GetUserInfo();
        $.get("<?php echo url('home/CheckDingdan'); ?>");
    }

</script>

</body>
</html>