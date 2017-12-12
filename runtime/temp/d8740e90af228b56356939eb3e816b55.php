<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:51:"D:\WWW\ssc\public/../application/index\view\xz.html";i:1500381657;s:57:"D:\WWW\ssc\public/../application/index\view\nav\head.html";i:1499420178;s:57:"D:\WWW\ssc\public/../application/index\view\nav\menu.html";i:1500382082;s:56:"D:\WWW\ssc\public/../application/index\view\nav\top.html";i:1500382629;s:57:"D:\WWW\ssc\public/../application/index\view\nav\foot.html";i:1500470933;}*/ ?>
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





























<div class="container" style="margin-top: 15px">
    <div class="form-control">
    <div class="form-group" style="background-color: black">
        <div class="col-xs-8"><marquee id="mqnotice" onmouseover="this.stop()" onmouseout="this.start()" scrolldelay="100"><?php echo $gonggao; ?></marquee></div>
        <div class="col-xs-4"><label id="open_state">距[99999999]期关盘还有: 99分99秒</label></div>
        <!--<div class="form-inline text-right">-->
            <!--<label id="open_state">距[99999999]期关盘还有: 99分99秒</label>-->
        <!--</div>-->
    </div>
</div>
    <div class="layui-item">
        <div class="panel panel-info" style="padding: 10px">
            <div class="form-inline">
                <div class="form-group">
                    <lable>期数</lable>
                    <input class="form-control" type="text" placeholder="期数">
                </div>
                <button class="btn btn-info">查询</button>
            </div>
        </div>
    </div>
    <div class="layui-item">
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>序号</th>
                <th>彩种</th>
                <th>期数</th>
                <th>开奖</th>
                <th>号码</th>
                <th>金额</th>
                <th>赔率</th>
                <!--<th>中奖</th>-->
                <th>盈亏</th>
                <th>回水</th>
                <th>状态</th>
                <th>下单时间</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $key = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
                <tr>
                    <td><?php echo $key; ?></td>
                    <td>重庆时时彩</td>
                    <td><?php echo $vo['qishu']; ?></td>
                    <td><?php echo $vo['number']; ?></td>
                    <td style="color: #d58512;font-size: 10px;font-weight: 700"><?php echo $vo['content']; ?></td>
                    <td><?php echo $vo['xmoney']; ?></td>
                    <td><?php echo $vo['peilv']/100; ?></td>
                    <!--<td><?php echo $vo['iswin']; ?></td>-->
                    <?php if($vo['winmoney'] < '1'): ?>
                        <td style="color: red"><?php echo $vo['winmoney']; ?></td>
                    <?php else: ?>
                        <td style="color: blue"><?php echo $vo['winmoney']; ?></td>
                    <?php endif; ?>
                    <td></td>
                    <?php if($vo['peilv'] == ''): ?>
                        <td>未结算</td>
                    <?php else: ?>
                        <td>已结算</td>
                    <?php endif; ?>
                    <td><?php echo date("Y-m-d H:i:s",$vo['update_time']); ?></td>
                </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>

</div>



</body>
</html>