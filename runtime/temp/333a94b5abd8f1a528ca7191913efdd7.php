<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"E:\xampp\htdocs\wechat\public/../application/index\view\sign\sign_agency.html";i:1504076467;}*/ ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
  	<link rel="stylesheet" href="/css/weui.min.css">
    <script src="/js/jquery-1.8.3.min.js"></script>
  	<script type="text/javascript" src="/js/weui.min.js"></script>
    <title>个人-签约</title>
  </head>
  <body>
    <form id="form">
    	<div class="weui-cells weui-cells_form">
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">乙方姓名：</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" value="<?php echo (isset($sinfo['oldname'] ) && ($sinfo['oldname']  !== '')?$sinfo['oldname'] :''); ?>" name="starname" readonly="readonly"/>
            </div>
        </div>
        <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">艺名：</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" value="<?php echo $sinfo['names']; ?>" name="actorname"  readonly="readonly"/>
                </div>
            </div>
         <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">地址：</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" value="<?php echo (isset($sinfo['addr'] ) && ($sinfo['addr']  !== '')?$sinfo['addr'] :''); ?>" name="workaddr" placeholder="请输入公司地址"/>
            </div>
        </div>

        <div class="weui-cell weui-cell_select weui-cell_select-after">
            <div class="weui-cell__hd">
                <label for="" class="weui-label">证件类型</label>
            </div>
            <div class="weui-cell__bd" dir="rtl">
                <select class=" weui-select " name="cardtype">
                        <option value="身份证" selected >身份证</option>
                        <option value="护照" >护照</option>
                    </select>
            </div>
        </div>
        
     <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">证件号码：</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" value="<?php echo $sinfo['idno']; ?>" name="cardnum"/>
            </div>
        </div>

         <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">电子邮箱：</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" name="workemail" value="<?php echo $sinfo['email']; ?>" placeholder="请输入邮箱"/>
            </div>
        </div>
         <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">联系人电话：</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="number" name='worktel' value="<?php echo \think\Session::get('wx_userinfo')['mobile']; ?>" placeholder="请输入电话"/>
            </div>
        </div>

       <a class="weui-cell weui-cell_access deadline" href="javascript:;">
         <div class="weui-cell__bd">
             <p id="deadline">合作期限：24个月</p>
             <input type="hidden" name="coopnum" id="time" value="24">
         </div>
         <div class="weui-cell__ft">
         </div>
        </a>

        <a class="weui-cell weui-cell_access country" href="javascript:;">
          <div class="weui-cell__bd">
              <p id="country">国籍：中国</p>
              <input type="hidden" name="citizenship" id="con" value="中国">
          </div>
          <div class="weui-cell__ft">
          </div>
         </a>

        <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">开户名称：</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" name="openname" placeholder="请输入开户名称"/>
                </div>
        </div>

      <div class="weui-cell">
         <div class="weui-cell__hd"><label class="weui-label">开户银行：</label></div>
         <div class="weui-cell__bd">
             <input class="weui-input" type="text" value="<?php echo (isset($sinfo['openbank']) && ($sinfo['openbank'] !== '')?$sinfo['openbank']:''); ?>" name="openbank" placeholder="请输入开户银行"/>
         </div>
     </div>
      <div class="weui-cell">
         <div class="weui-cell__hd"><label class="weui-label">银行账户：</label></div>
         <div class="weui-cell__bd">
             <input class="weui-input" type="text" value="<?php echo (isset($sinfo['account']) && ($sinfo['account'] !== '')?$sinfo['account']:''); ?>" name="openacct" placeholder="请输入银行账户"/>
         </div>
     </div>
        </div>
        <input type="hidden" name="type" value="<?php echo $types; ?>">
    </form>
    <button class="weui-btn weui-btn_warn up" style="margin-top:20px;">提交</button>
  </body>
  <script type="text/javascript">
    $(".deadline").click(function(){
       weui.picker([
            {
                label: '24个月',
                value: 24

            },
            {
                label: '36个月',
                value: 36
            },

        ], {
            className: 'custom-classname',
            defaultValue: [1],
            onConfirm: function (result) {
                $("#deadline").text('合作期限：'+result[0]['label']);
                var gender = result[0]['value'];
                $("#time").val(gender)

            },
            id: 'singleLinePicker'
        });
    });
    //国籍
    var items = [
         {
             label: '中国',
             value: '中国'

         },
         {
             label: '韩国',
             value: '韩国'
         },
         {
             label: '日本',
             value: '日本'
         },
         {
             label: '新加坡',
             value: '新加坡'
         },
         {
             label: '美国',
             value: '美国'
         },

     ];
    $("#country").click(function(){
      weui.picker(
        items,
        {
           className: 'custom-classname',
           defaultValue: [1],
           onConfirm: function (result) {
               $("#country").text('国籍：'+result[0]['label']);
               var con = result[0]['value'];
              $("#con").val(con)
           },
           id: 'singleLinePicker'
       });
    });

    //提交表单
    $('.up').click(function(){
      var info = $("form").serialize()
      info = decodeURIComponent(info,true);
      var v = via(info);
        if(v==11){
            weui.alert('请完善信息！');
            return;
        }else if(v==2){
            weui.alert('请输入正确的身份证号码！');
            return;
        }else if(v==3){
            weui.alert('请输入正确的邮箱！');
            return;
        }else if(v==4){
            weui.alert('请输入地址！');
            return;
        }else if(v==5){
            weui.alert('请输入正确的手机号');
            return;
        }
      $.ajax({
        url:"/index/sign/signup",
        type:"POST",
        data:info,
        dataType:'JSON',
        success:function (data) {
          if(data['status']==1){
            weui.toast('操作成功', {
                  duration: 1500,
                  className: 'custom-classname',
                  callback: function(){
                     window.location.href = '/index/sign/pact_type';
                 }
            });
          }else{
            weui.alert(data['msg']);
          }
        }
      });
    })

    function via(info){
        //验证表单
        str=info.split("&");
        var all = [];
        for(var i in str){
             all[i] = str[i].split('=');
        }
       for(var j in all){
           for(var c in all[j]){
               if(!all[j][1]){
                   return 11;
               }
           }
       }
    var card = $("input[name='cardnum']").val(); 
    var email = $("input[name='workemail']").val();
    var workaddr = $("input[name='workaddr']").val();
    var worktel = $("input[name='worktel']").val();
    var reg = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/;
    var em = /^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$/;
    var t = /^1(3|4|5|7|8)\d{9}$/;
    if(workaddr==''){
        return 4;
    }
    if(!reg.test(card)){
        return 2;
    }
    if(!em.test(email)){
        return 3;
    }
    if(!t.test(worktel)){
        return 5;
    }
        return true;
    }
  </script>
</html>
