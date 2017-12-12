<?php
namespace app\index\controller;

use think\Controller;
use think\Db;

class Index extends  Controller
{
    public function index()
    {
        //$info = session('info');
        //if($info)$this->redirect('index/index/home');
        return view('\index');
    }

    public function login()
    {
        $data = input('post.');
        if(!$data)$this->error('资料不完整');
        if(!$data['username'] || !$data['password'] || !$data['code'])$this->error('资料不完整');
        if(!captcha_check($data['code']))$this->error('验证码不正确');
        $arr=array(
            'username'=>$data['username'],
            'password'=>$data['password'],
        );
        $result = Db::name('admin')->where($arr)->find();
        if($result)session('info',$result);
        $result ? $this->redirect('/index/home') : $this->error('登陆失败');
    }
}
