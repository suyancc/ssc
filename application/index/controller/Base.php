<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/16
 * Time: 19:30
 */
namespace app\index\controller;

use think\Controller;
use think\Db;

class Base extends Controller{


    public  $USERINFO;
    public  $FengPanTime = 370 ; //封盘时间差
    public  $GongGao = '公告：<a style="text-decoration:underline;" href="http://baidu.lecai.com/lottery/draw/view/200?agentId=5555" target="_blank">开奖官网</a>';
    public function __construct()
    {
        parent::__construct();
        $info = session('info');
        if(!$info) $this->redirect('index/index');
        $info['oldpeilv'] = $info['peilv'];
        $info['peilv'] = $info['peilv'] / 100;
        $this->USERINFO = $info;
    }

    //更新用户信息
    public function UpUserInfo()
    {
        $result = Db::name('admin')->where('id',$this->USERINFO['id'])->find();
        if(!$result)$this->redirect('index/index');
        session('info',$result);
    }

    //写入日志
    public function SetLog($type,$msg)
    {
        $arr = array();
        $arr['uid'] = $this->USERINFO['id'];
        $arr['type'] = $type;
        $arr['msg'] = $msg;
        $arr['create_time'] = time();
        $arr['update_time'] = time();
        $result = Db::name('log')->insert($arr);
        return $result;
    }
}
