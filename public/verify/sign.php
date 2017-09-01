<?php

    $signature = $_GET["signature"];
    $timestamp = $_GET["timestamp"];
    $nonce = $_GET["nonce"];
    $echostr = $_GET['echostr'];
    $token = 'qianfeng2017';
    $tmpArr = array($token, $timestamp, $nonce);
    sort($tmpArr, SORT_STRING);//将token、timestamp、nonce三个参数由小到大进行排序
    $tmpStr = implode( $tmpArr );//将三个参数字符串拼接成一个字符串
    $tmpStr = sha1( $tmpStr );//进行sha1加密
    if( $tmpStr == $signature )
    {
        exit( $echostr );//返回echostr参数
    }
