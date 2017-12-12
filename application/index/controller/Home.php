<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Image;

class Home extends  Base
{
    public function index()
    {

        $this->assign('gonggao',$this->GongGao);
        $this->assign('info',$this->USERINFO);

        $yiziding = $this->GetTableList();
        $this->assign('yiziding',$yiziding);
        
        return view('/home1');
    }

    public function loginout()
    {
        session('info',null);
    }

    public function GetUserInfo()
    {
        $this->UpUserInfo();
        $msg = $this->USERINFO['money'];
        $this->success('余额：'.$msg);
    }

    //下注明细
    public function xz()
    {
        $this->assign('gonggao',$this->GongGao);
        $this->assign('info',$this->USERINFO);
        $result = Db::name('contentres')->where('uid',$this->USERINFO['id'])->order('create_time DESC')->select();
        $result2 = Db::name('content')->where('uid',$this->USERINFO['id'])->where('status',0)->select();
        $temp = array();
        foreach($result2 as $item){
            $item2 = json_decode($item['content']);
            if($item2){
                foreach($item2 as $list){
                    $number = array(
                        'qishu'=>$item['qishu'],
                        'xmoney'=>$item['xmoney'],
                        'content'=>$list,
                        'number'=>'',
                        'iswin'=>false,
                        'peilv'=>'',
                        'winmoney'=>'',
                        'create_time'=>$item['create_time'],
                        'update_time'=>$item['update_time'],
                    );
                    $temp[]=$number;
                }
            }
        }
        foreach($result as $item){
            $temp[]=$item;
        }
        $this->assign('list',$temp);
        return view('/xz');
    }

    //下单
    public function xiadan()
    {
        $data = input('post.');

        $result = Db::name('numberlist')->order('qishu DESC')->find();
        $fengpan = $result['time'] + $this->FengPanTime - time() < 5;
        if($fengpan)$this->error('已封盘');
        $qishu = $result['qishu'] +1; //当前下单期数

        if(!$data)$this->error('参数错误');
        $money = $this->USERINFO['money'];
        if($money <= 0)$this->error('账户余额不足');
        $count = count($data['list']);
        if($count <= 0)$this->error('请选择注数');
        $xmoney = $count * $data['money'];
        if($xmoney > $money)$this->error('用户余额不足 ['.$count.'注] 共需要:'.$xmoney.'元');

        Db::name('admin')->where('id',$this->USERINFO['id'])->setDec('money',$xmoney);

        $type = 0;
        $nu = $data['id']; //通过id判断是几字定

        if($nu > 0 && $nu < 40){//一字定
            $type = 1;
        }

        $arr = array();
        $arr['uid'] = $this->USERINFO['id'];
        $arr['qishu'] = $qishu;
        $arr['content'] = json_encode($data['list']);
        $arr['xmoney'] = $data['money'];
        $arr['type'] = $type;
        $arr['status'] = 0;
        $arr['create_time'] = time();
        $arr['update_time'] = time();
        $result = Db::name('content')->insert($arr);

        $this->SetLog(1,'金额：'.$data['money'].'注数：'.$count.' 总金额：'.$xmoney.'  下注：'.$arr['content']);

        $this->UpUserInfo();
        $result ? $this->success('下单成功') : $this->error('下单失败');
    }

    //获取当前下注列表
    public function GetNowXZList()
    {
        $result = Db::name('content')->where('uid',$this->USERINFO['id'])->where('status',0)->select();
        $listall = '';
        foreach($result as $item){
            $item2 = json_decode($item['content']);
            foreach($item2 as $list){
                $listall .= '
                <tr>
                    <td>'.$list.'</td>
                    <td>1.95</td>
                    <td>'.$item['xmoney'].'</td>
                </tr>
                ';
            }
        }
        return $listall;
    }

    //一字定列表
    public function GetTableList()
    {
        $pl = $this->USERINFO['peilv'];
        $li=array(
            array('0XXX','X0XX','XX0X','XXX0'),
            array('1XXX','X1XX','XX1X','XXX1'),
            array('2XXX','X2XX','XX2X','XXX2'),
            array('3XXX','X3XX','XX3X','XXX3'),
            array('4XXX','X4XX','XX4X','XXX4'),
            array('5XXX','X5XX','XX5X','XXX5'),
            array('6XXX','X6XX','XX6X','XXX6'),
            array('7XXX','X7XX','XX7X','XXX7'),
            array('8XXX','X8XX','XX8X','XXX8'),
            array('9XXX','X9XX','XX9X','XXX9'),
        );
        $list='';
        for($i=0; $i<count($li); $i++){
            $list .= '
        <tr>
            <td class="check" id="'.($i+1).'">
                <div>
                    <label>'.$li[$i][0].'</label>
                    <label class="tred">'.$pl.'</label>
                </div>
            </td>
            <td class="check" id="'.($i+10).'">
                <label>'.$li[$i][1].'</label>
                <label class="tred">'.$pl.'</label>
            </td>
            <td class="check" id="'.($i+20).'">
                 <label>'.$li[$i][2].'</label>
                 <label class="tred">'.$pl.'</label>
            </td>
                 <td class="check" id="'.($i+30).'">
                 <label>'.$li[$i][3].'</label>
                 <label class="tred">'.$pl.'</label>
            </td>
        </tr>
        ';
        }
        return $list;
    }

    public function test()
    {
        $this->InsertNumberList();

        $result = Db::name('numberlist')->order('qishu DESC')->find();

        $phase = $result['qishu']+1;
        $phase = str_replace('2017','',$phase);

        $time_endticket = $result['time'] + $this->FengPanTime;
        $time_startsale = $result['time'] + 610;
        $endms = $time_endticket - time(); //65秒

        $oldnums = $result['number'];
        $oldnums = explode(',',$oldnums);
        $li='';
        foreach($oldnums as $ietem=>$key){
            $li .='<li class="red">'.$oldnums[$ietem].'</li>';
        }

        $oldnumlist = array();
        $arr=array(
            'qsold'=>'第'.$result['qishu'].'期', //上一期期数
            'qsoldnum'=>$li, //上一期开奖号码
            'list'=>$oldnumlist,
            'qs'=>'第2017'.$phase.'期', //本期期数
            'status'=>200,
            'difftime'=>$endms, //剩余封盘秒数
            'endtimestr'=>$time_endticket,//封盘时间
            'opentimestr'=>$time_startsale,//开盘时间
            'open'=>$endms<=5 ? false : true,
            'serno'=>$phase,//"0708069"
            'wait_open'=>false,
        );

        if($endms > 520){//结算上一局
            $this->CheckDingdan();
        }

        return $arr;
    }

    //采集开奖数据
    public function InsertNumberList()
    {
        $url = 'http://d.apiplus.net/newly.do?token=572fb5ab5d5b3062&code=cqssc&format=json';
        $result = http_post_data($url);

        if(!$result)$this->error('获取失败');
        $data = $result['data'];
        $result = Db::name('numberlist')->where('qishu',$data[0]['expect'])->find();
        if($result)return;
        $arr = array(
            'qishu'=>$data[0]['expect'],
            'number'=>$data[0]['opencode'],
            'time'=>$data[0]['opentimestamp'],
            'create_time'=>time(),
        );
        Db::name('numberlist')->insert($arr);

        /*for($i=0; $i<count($data); $i++){
            $arr = array(
                'qishu'=>$data[$i]['expect'],
                'number'=>$data[$i]['opencode'],
                'time'=>$data[$i]['opentimestamp'],
                'create_time'=>time(),
            );
            Db::name('numberlist')->insert($arr);
        }*/
    }

    //检测需要计算的订单
    public function CheckDingdan()
    {

        $result = Db::name('content')->where('uid',$this->USERINFO['id'])->where('status',0)->select();
        //dump($result);
        if(!$result)return;
        for($i=0; $i<count($result); $i++){
            $this->Commp($result[$i]);
        }
    }

    private function Commp($result1){
        $result = Db::name('numberlist')->where('qishu',$result1['qishu'])->find();
        if(!$result)return false;
        $result = $this->IsWin($result,$result1);
        //dump($result);
        Db::name('content')->where('id',$result1['id'])->update(['status'=>1]);
    }

    /**
     * 是否中奖
     * @param $result 开奖信息
     * @param $result1 下注信息
     * @return array
     */
    private function IsWin($result,$result1){
        $number = $result['number'];
        $content = json_decode($result1['content']);

        $peilv = $this->USERINFO['peilv'];
        $arr = array();
        for($i=0; $i<count($content); $i++){

            $xvalue = $content[$i];//下注内容
            $type = $result1['type'];

            $XuResType = $this->GetXValueType($xvalue,$type);
            $nuResType = $this->GetNumberRes($number,$type,$XuResType);
//            dump($XuResType."|".$number."|".$type);
//            dump($xvalue.'|'.$nuResType);
            $iswin = false;
            if($xvalue == $nuResType){ //中奖了
                $iswin = true;
                $money = $peilv * $result1['xmoney'];
                Db::name('admin')->where('id',$this->USERINFO['id'])->setInc('money',$money); //赢了把钱写入
                $this->SetLog(2,'下：'.$xvalue.'开奖：'.$number.' 金额：'.$result1['xmoney'].' 赔率：'.$peilv.' 中奖：'.$money);
            }
            $arr[]=array('iswin'=>$iswin,'number'=>$xvalue,'peilv'=>$peilv);

            $temp = array();
            $temp['uid']=$this->USERINFO['id'];
            $temp['qishu']=$result['qishu'];
            $temp['content']=$xvalue;
            $temp['number']=$number;
            $temp['iswin']=$iswin;
            $temp['peilv']=$this->USERINFO['oldpeilv'];
            $temp['xmoney']=$result1['xmoney'];
            $temp['winmoney']=$iswin ? $result1['xmoney']*$peilv : -$result1['xmoney'];
            $temp['create_time']=time();
            $temp['update_time']=time();
            Db::name('contentres')->insert($temp);
        }

        return $arr;
    }

    /**
     * 获取下注类型
     * @param $value 下注内容
     * @param $type 几字定
     * @return int 返回位置 1: 8XXX 2: X8XX 3: XX8X 4: XXX8
     */
    private function GetXValueType($value,$type){

        //dump($value);
        $restype = -1;
        //一字定
        switch($type){
            case 1:
                $patten = '(^\d)XXX';
                $res = preg_match($patten,$value);
                if($res)return 1;

                $patten = '(^X\d)XX';
                $res = preg_match($patten,$value);
                if($res)return 2;

                $patten = '(^XX\d)X';
                $res = preg_match($patten,$value);
                if($res)return 3;

                $patten = '(^XXX\d)';
                $res = preg_match($patten,$value);
                if($res)return 4;
                break;

        }
        return $restype;
    }

    /**
     * 获取号码组合后的
     * @param $value 开奖号码
     * @param $type 定类型
     * @param $XuResType 位置类型
     * @return string
     */
    private function GetNumberRes($value,$type,$XuResType){
        $result = explode(',',$value);
        switch($type){
            case 1: //1字定
                switch($XuResType){
                    case 1:
                        return $result[0].'XXX';
                    case 2:
                        return 'X'.$result[1].'XX';
                    case 3:
                        return 'XX'.$result[2].'X';
                    case 4:
                        return 'XXX'.$result[3];
                    default:
                        return 'XXXX';
                }
                break;
        }
        return false;
    }





}
