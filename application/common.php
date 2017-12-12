<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function http_post_data($url, $data_string='') {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    //curl_setopt($ch, CURLOPT_REFERER, 'http://baidu.lecai.com/lottery/draw/view/200?agentId=5555');
    //curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.110 Safari/537.36');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    ob_start();
    $tmpInfo = curl_exec($ch);
    ob_end_clean();
    //$return_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    return json_decode($tmpInfo,true);
}
