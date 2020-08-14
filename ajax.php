<?php
    header("Content-type: text/html; charset=utf-8");

    $keyword = $_GET['input'];
    // 使用图灵机器人自动回复
    $param = "{
        'perception': {
            'inputText': {
                'text': '{$keyword}',
            }
        },
        'userInfo': {
            'apiKey': '9bf3bbeb34154eada0c724c0339dab48',
            'userId': '79ed49e59b18c4d0',
            }
        }";
    // 初始化curl
    $ch = curl_init();
    // 设置请求地址,双引号地址
    curl_setopt($ch,CURLOPT_URL,"http://openapi.tuling123.com/openapi/api/v2");
    //curl_setopt($ch,CURLOPT_URL,"http://api.douqq.com/?key=N3FHbDNuUnlHenp3WWpNRUtacj0rQ3A9Unh3QUFBPT0&msg=消息");
    // 设置通过POST进行请求
    curl_setopt($ch,CURLOPT_POST,1);
    // 设置发送POST请求时传递的参数或数据
    curl_setopt($ch,CURLOPT_POSTFIELDS,$param);
    // 设置捕获的字符串内容返回但不输出
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    // 执行并接收返回的json格式字符串内容
    $output = curl_exec($ch);
    curl_close($ch);
    // 转化为json对象
    // $output = json_decode($output);                        
    // 获取的回复内容
    // $contentStr = ($output->results)[0]->values->text;
    //之后具体如何处理获取到的自动回复内容就是你个人需求了
    // echo $contentStr;

    echo $output;
?>