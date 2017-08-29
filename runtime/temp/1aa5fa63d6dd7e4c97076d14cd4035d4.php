<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"E:\xampp\htdocs\wechat\public/../application/index\view\sign\medal.html";i:1504004062;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>签约</title>
    <link rel="stylesheet" type="text/css" href="/css/lib/weui.min.css">
    <link rel="stylesheet" href="/css/lib/common.css">
    <script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="/js/weui.min.js"></script>
    <style>
        .weui-cells {
            margin-top: 0;
        }
        
        a img {
            max-width: 20%;
            border: 0;
        }
        
        .weui-grid:before {
            border-right: none;
        }
        
        .weui-grid:after {
            border-bottom: none;
        }
        
        .weui-grids:before {
            border-top: none;
        }
        
        .weui-grids:after {
            border-left: none;
        }
        
        .container {
            max-width: 100%;
            min-height: 1.4rem;
        }
        
        .foot {
            width: 100%;
            height: 2.2rem;
            line-height: 2.2rem;
            font-size: .75rem;
            position: absolute;
            bottom: 0;
            left: 0;
        }
        
        .foot div {
            display: inline-block;
        }
        
        .see {
            position: absolute;
        }
        .stamimg_one{
            float: left;
            width: 7rem;
            /* height: 7rem; */
            margin-top: 1rem;
            margin-left: 5%;
        }
        .stamimg_two{
            float: left;
            width: 7rem;
            /* height: 7rem; */
            margin-top: 1rem;
            margin-left: 16%;
        }
        .chioce-btn {
            font-size: .75rem;
            height: 1.75rem;
            line-height: 1.75rem;
            background-color: rgb(173, 173, 173);
            color: #000;
            margin-top: .5rem;
        }
    </style>
</head>

<body>
    <form>
    <div class="weui-cells" style="border-bottom:0.8rem solid #f5f5f5;border-top:0.8rem solid #f5f5f5;">
        <!-- <div class="weui-cell">
            <div class="weui-cell__hd"><label for="" class="weui-label">签署日期</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input" style="text-align: -webkit-right; " type="date" name="begindate" value="" />
            </div>
        </div>
        <div class="weui-cell ">
            <div class="weui-cell__hd "><label class="weui-label ">签署地点</label></div>
            <div class="weui-cell__bd ">
                <input class="weui-input " style="text-align: -webkit-right; " type="text " placeholder="请输入签署地点 " />
            </div>
        </div> -->
    </div>
    <div class="weui-flex">
        <div class="weui-flex__item" style="padding: 1.5rem;text-align:center; padding-bottom: 0.75rem;">
         <img src="<?php echo $stamimg; ?>" alt="" style="width:100%;">
         <div class="chioce-btn">选择</div>
        </div>
        
        <div class="weui-flex__item"  style="padding: 1.5rem;text-align:center; padding-bottom: 0.75rem;">
            <img src="<?php echo $stamimg; ?>" alt="" style="width:100%;">
            <div class="chioce-btn">选择</div>
        </div>
    </div>
    <div class="weui-grids" style=" background-color:#f5f5f5;position:absolute;width:100%;">
        <div class="weui-cell ">
            <div class="weui-cell__hd "><label class="weui-label " style="width:100%;color:#9A9A9A;font-size:0.8rem;">温馨提示&nbsp;:本平台生成的公司章及个人签名,经过第三方公正,依法有效.</label></div>
        </div>
        <a href="javascript:;" class="weui-grid" style="width:100%;text-align: center;">
            <div class="weui-msg__icon-area"><i><img src="/imgs/icon-signature.png" alt=""></i></div>
            <p class="weui-grid__label">上传签章</p>
            <p style="color:red;float: giht;float: right;font-size: 0.7rem;margin-bottom: 0.5rem;    bottom: .9rem;"><i><img src="/imgs/icon-eye.png" alt=""></i>&nbsp;&nbsp;<u>查看合同</u></p>
        </a>
    </div>
    </div>

    <footer class="foot ">
        <div class="one-a weui-grid" style="text-align: center; width:50%;background-color:#ffffff;padding:0;border-top:0.1rem solid #f5f5f5;">
            合同附件
        </div>
        <div class="two-a weui-grid sign" style="text-align: center; width:50%;padding:0;background-color: red;color:#ffffff; ">
            确认签约
        </div>
    </footer>
    </div>
</form>
</body>
<script>
    $(".sign").click(function(){
        var loading = weui.loading('请稍后', {
          className: 'custom-classname'
        });
        $.ajax({
        url:"/index/sign/begin",
        type:"POST",
        data:'',
        dataType:'JSON',
        success:function (data) {
          if(data['status']==1){
            loading.hide(function() {
               });
                weui.toast('操作成功', {
                  duration: 1500,
                  className: 'custom-classname',
                  callback: function(){
                    window.location.href='/index/sign/pact_type'
                 }
            });
          }else{
            weui.alert(data['msg']);
          }
        }
      });
    });
</script>
</html>