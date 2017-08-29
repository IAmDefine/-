<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"E:\xampp\htdocs\wechat\public/../application/index\view\sign\agency.html";i:1503643210;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php switch($ty): case "1": ?>
            <title>代理协议</title>
        <?php break; case "2": ?>
            <title>独家协议</title>
        <?php break; case "3": ?>
            <title>肖像独家</title>
        <?php break; default: ?>
            <title>优星库</title>
    <?php endswitch; ?>
    <script src="/js/jquery-1.8.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/weui.min.css">
    <link rel="stylesheet" href="/css/common.css">
    <script type="text/javascript" src="/js/weui.min.js"></script>
    <style>
        .weui-cells {
            margin-top: 0;
        }
        .weui-article {
            padding: 0.3rem 0;
            margin: 0 auto;
        }
        
        .weui-article * {
            max-width: 100%;
            box-sizing: border-box;
            word-wrap: break-word;
        }
        
        .help a {
            line-height: 2.5rem;
            position: absolute;
            height: 2.5rem;
            width: 3rem;
            text-align: center;
            font-size: 0.8rem;
            top: 38%;
            right: -0.6rem;
            background-color: #FFD600;
            border: 0.1rem solid #FFD600;
            border-top-left-radius: 0.9rem;
            border-bottom-left-radius: 0.9rem;
            color: black;
        }
        
    </style>
</head>

<body>
    <div class="container" style="margin:0.7rem 1.2rem;">
        <div class="page__bd" data='2'>
            <article class="weui-article">
                <img src="/imgs/age1.png" width=100% height=100% alt="img">
            </article>
        </div>

        <div class="page__bd" data='3'>
            <article class="weui-article">
                <img src="/imgs/age2.png" width=100% height=100% alt="img">
            </article>
        </div>

        <div class="page__bd help" style="position:relative ;" data='1'>
            <article class="weui-article">
                <img src="/imgs/age3.png" width=100% height=100% alt="img">
            </article>
            <!-- <a href="#" style="text-decoration: none;">帮助</a> -->
        </div>
    </div>
</body>
<script>
   $('.page__bd').click(function(){
      var signtype = $(this).attr('data');
      if(signtype==1){
        window.location.href = '/index/userinfo/auth';//个人认证
      }else if(signtype==2){
        window.location.href = '/index/userinfo/work_auth?signtype=2';//工作室
      }else if(signtype==3){
        window.location.href = '/index/userinfo/work_auth?signtype=3';//经纪公司
      }
   });
</script>
</html>