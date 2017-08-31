<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"E:\xampp\htdocs\wechat\public/../application/index\view\userinfo\mylogin.html";i:1504145556;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
	<link rel="stylesheet" href="/css/weui.min.css">
	<script type="text/javascript" src="/js/weui.min.js"></script>
	<title>注册</title>
	<style media="screen">
		.bind{
			float: right;
			margin-right: 17px;
			margin-top: 10px;
            font-size:10px; 
		}
	</style>
</head>
<body ontouchstart>
<form id="form">
<div class="weui-cells weui-cells_form">
    <div class="weui-cell weui-cell_vcode">
        <div class="weui-cell__hd">
            <label class="weui-label">手机号</label>
        </div>
        <div class="weui-cell__bd">
            <input class="weui-input mobile" type="tel" name="mobile" placeholder="请输入手机号">
        </div>
        <div class="weui-cell__ft" style="width:120px;border:0">
            <input class="weui-vcode-btn"  style="background-color: #EB2000;color: white;border:0" value="获取验证码" readonly="readonly">
        </div>
    </div>
    <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">验证码</label></div>
        <div class="weui-cell__bd">
            <input class="weui-input" id="newcode" type="number" name="code" placeholder="请输入验证码"/>
        </div>
    </div>
      <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">密码</label></div>
        <div class="weui-cell__bd">
            <input class="weui-input" id="password" type="password"  name="password" placeholder="请输入密码"/>
        </div>
    </div>
    <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">重复密码</label></div>
        <div class="weui-cell__bd">
            <input class="weui-input" id="repassword" type="password" name="repassword" placeholder="重复输入密码"/>
        </div>
    </div>
    <input id="code" type="hidden" value="" name="code">
    <input id="openid" type="hidden" value="<?php echo \think\Session::get('openid'); ?>" name="openid">
</div>
</form>
<div class="weui-btn-area">
    <a class="weui-btn weui-btn_warn" id="loginform" href="javascript:" id="showTooltips">确定</a>
</div>
	<a class="bind sty" href="/index/binduser/bind">我已有账号，立即绑定</a>
</body>
<script>
    var wait = 60;
    function time(o) {
        if (wait == 0) {
            o.removeAttribute("disabled");
            o.value = "获取验证码";
            wait = 60;
        } else {
            o.setAttribute("disabled", true);
            o.value = "重新发送(" + wait + ")";
            wait--;
            setTimeout(function () {
                time(o)
            }, 1000)
        }
    }
    $(".weui-vcode-btn").click(function(){
        var _this = this;
       var mobile = $(".mobile").val();
        var ph = /^1[3|4|5|7|8][0-9]{9}$/; //验证手机
        if(!ph.test(mobile)){
            weui.topTips('请填写正确的手机号');
            return;
        }
        var code = addNumber(4);
        $("#code").val(code);
        time(_this);
        $.ajax({
            url:"/index/userinfo/getcode",
            type:"POST",
            data:{mobile:mobile,authcode:code},
            dataType:'JSON',
            success:function (data) {
            // console.log(data);return;
            if(!data){
                weui.topTips('验证码发送失败');
                return;
                }
            }
        })
    });
$("#loginform").click(function () {
    var mobile = $(".mobile").val();
    if(mobile==''){
        weui.topTips('请输入手机号');
        return;
    }
    var pass = $("#password").val();
    if(pass==''){
        weui.topTips('请输入密码');
        return;
    }
    var repass = $("#repassword").val();
    if(repass==''){
        weui.topTips('请重复输入密码');
        return;
    }
    if(pass != repass){
        weui.topTips('两次密码不一致');
        return;
    }
    var code = $("#code").val();
    var newcode = $("#newcode").val();
    if(newcode==''){
        weui.topTips('请输入验证码');
        return;
    }

    if(code != newcode){
        weui.topTips('验证码错误');
        return;
    }
    var wxpcopenid = $("#openid").val();

    $.ajax({
        url:"/index/userinfo/binding",
        type:"POST",
        data:{mobile:mobile,pass:pass,usertype:2,wxpcopenid:wxpcopenid},
        dataType:'JSON',
        success:function (data) {
           if(data){
               weui.toast('操作成功', 1500);
               setTimeout(function() {
								 //注册之后跳转到点击的入口链接（比如点击的合作代理，注册后会跳转到合作代理）
               window.location.href = "<?php echo \think\Session::get('url_goal'); ?>";
               }, 1500);
           }
        }
    })
});
    //生成随机数
    function addNumber(_idx){
        var str = '';
        for(var i = 0; i < _idx; i += 1){
            str += Math.floor(Math.random() * 10);
        }
        return str;
    }
</script>
</html>
