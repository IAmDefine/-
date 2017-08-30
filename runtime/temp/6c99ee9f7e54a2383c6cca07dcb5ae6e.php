<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"E:\xampp\htdocs\wechat\public/../application/index\view\edit\edit_pro_auth.html";i:1504078333;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="/css/weui.min.css">
    <script type="text/javascript" src="/js/weui.min.js"></script>
    <script src="/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/js/lib/plupload-2.1.2/js/plupload.full.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>实名认证</title>
    <style>
    html,body{
      width: 100%;
      height: auto;
      padding-bottom: 20px
    }
    img{
        width: 100%;
        height: 100%;
    }
    div{box-sizing: border-box;}
        .weui-uploader__bd{
            overflow: inherit;
        }
        #up{
          position: fixed;
          left: 0;
          height: 50px;
          bottom: 0;
          background-color: #EB2000;
          border: 0;
          color: white;
        }
        .weui-uploader__bd{overflow: hidden;
            margin: 0;
        }

        .weui-uploader{
          border-bottom: 10px solid #EBEBEB;
          padding-bottom: 10px
        }
        .submit_btn{
          width: 100%;
          height: 50px;
        }
        .photo_con{
            width: 48%;
            height: 160px;
            float: left;
            margin-right:5px;
        }
        .photo_con > span{
            margin-left:20px;
        }
    </style>
</head>
<body ontouchstart>
<form id="form">
<div class="weui-cells weui-cells_form">
    <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">明星艺名</label></div>
        <div class="weui-cell__bd">
            <input class="weui-input" name="names" type="text" value="<?php echo (isset($info['names']) && ($info['names'] !== '')?$info['names']:''); ?>"  placeholder="请输入明星艺名"/>
        </div>
    </div>

    <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">明星姓名</label></div>
        <div class="weui-cell__bd">
            <input class="weui-input" name="oldname" value="<?php echo (isset($info['oldname']) && ($info['oldname'] !== '')?$info['oldname']:''); ?>" type="text" placeholder="请输入姓名"/>
        </div>
    </div>
    <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">身份证号</label></div>
        <div class="weui-cell__bd">
            <input class="weui-input" type="text" name="idno" value="<?php echo (isset($info['idno']) && ($info['idno'] !== '')?$info['idno']:''); ?>" placeholder="请输入身份证号"/>
        </div>
    </div>
    <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">邮箱</label></div>
        <div class="weui-cell__bd">
            <input class="weui-input" type="text" name="email" value="<?php echo (isset($info['email']) && ($info['email'] !== '')?$info['email']:''); ?>" placeholder="请输入电子邮箱"/>
        </div>
    </div>
</div>
<div class="weui-cells weui-cells_form">
    <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">上传证件</label></div>
        <div class="weui-cell__bd">
            <span class="weui-input"></span>
        </div>
    </div>
</div>    
    <div class="weui-uploader" style="margin-left:11px;margin-top:20px">
        <div class="weui-uploader__bd">
          <div class="photo_con" onclick="setvar(1)">
            <div class="weui-uploader__input-box" style="width:100%;height:114px" id="selectfiles1" >
               <img src="<?php echo (isset($info['admcard']) && ($info['admcard'] !== '')?$info['admcard']:'/imgs/add_icon.png'); ?>" id="img1">
               <input type="hidden" name="admcard" value="<?php echo $info['admcard']; ?>" id="imgurl1">
            </div>
            <span style="margin-left:40px">身份证正面</span>
          </div>
          <div class="photo_con" onclick="setvar(2)">
            <div class="weui-uploader__input-box" style="width:100%;height:114px" id="selectfiles2" >
                <img src="<?php echo (isset($info['reveside']) && ($info['reveside'] !== '')?$info['reveside']:'/imgs/add_icon.png'); ?>" id="img2">
                <input type="hidden" name="reveside" value="<?php echo $info['reveside']; ?>"  id="imgurl2">
            </div>
            <span style="margin-left:40px">身份证反面</span>
         </div>
         <div class="photo_con" onclick="setvar(3)">
            <div class="weui-uploader__input-box" style="width:100%;height:114px" id="selectfiles3">
                <img src="<?php echo (isset($info['handid']) && ($info['handid'] !== '')?$info['handid']:'/imgs/add_icon.png'); ?>" id="img3">
                <input type="hidden" name="handid" value="<?php echo $info['handid']; ?>" id="imgurl3">
            </div>
            <span>手持身份证正面照</span>
        </div>  
        </div>
    </div>
    <input type="hidden" name="id" value="<?php echo $info['id']; ?>">
</form>

<button class="submit_btn" id="up">保存并上传</button>
</body>
<script>
    //上传
  function setvar(valnum) {
      whichf = valnum;
  }

  accessid = '';
  accesskey = '';
  host = '';
  policyBase64 = '';
  signature = '';
  callbackbody = '';
  filename = '';
  key = '';
  expire = 0;
  g_object_name = '';
  g_object_name_type = '';
  now = timestamp = Date.parse(new Date()) / 1000;
  fname = '';
  whichf = 1;

  //实例化一个plupload上传对象
  var uploader = new plupload.Uploader({
      browse_button: ['selectfiles1', 'selectfiles2', 'selectfiles3'], //触发文件选择对话框的按钮，为那个元素id
      url: 'upload.php', //服务器端的上传页面地址
      flash_swf_url: 'js/Moxie.swf', //swf文件，当需要使用swf方式进行上传时需要配置该参数
      silverlight_xap_url: 'js/Moxie.xap' //silverlight文件，当需要使用silverlight方式进行上传时需要配置该参数

  });

  uploader.init();
  uploader.bind('FilesAdded', function (uploader, files) {
      uploader.start();
      loading = weui.loading('请稍后', {
          className: 'custom-classname'
        });
  });

  uploader.bind('FileUploaded', function (uploader, file, info) {
      if (info.status == 200)
      {
        loading.hide(function() {
        });
          $("#img" + whichf).attr('src', host + "/" + g_object_name);
          $("#imgurl" + whichf).val( host + "/" + g_object_name);
         
      }
  });
  uploader.bind('BeforeUpload', function (uploader, file) {
      ret = get_signature();
      g_object_name = key;
      filetmp = file.name;
      if (filetmp != '') {
          suffix = get_suffix(filetmp)
          calculate_object_name(filetmp)
      }
      new_multipart_params = {
          'key': g_object_name,
          'policy': policyBase64,
          'OSSAccessKeyId': accessid,
          'success_action_status': '200', //让服务端返回200,不然，默认会返回204
          'callback': callbackbody,
          'signature': signature,
      };

      uploader.setOption({
          'url': host,
          'multipart_params': new_multipart_params
      });

  });
  function get_signature()
  {
//可以判断当前expire是否超过了当前时间,如果超过了当前时间,就重新取一下.3s 做为缓冲
      now = timestamp = Date.parse(new Date()) / 1000;
//if (expire < now + 3)
//{
      body = send_request();
      var obj = eval("(" + body + ")");
      host = obj['data']['domain']
      policyBase64 = obj['data']['policy']
      accessid = obj['data']['accessid']
      signature = obj['data']['signature']
      expire = parseInt(obj['data']['expire'])
      callbackbody = obj['data']['callback']
      key = obj['data']['dir']
      fname = obj['data']['fname']
      return true;
//}
//return false;
  }
  function calculate_object_name(filename)
  {
      suffix = get_suffix(filename);
      g_object_name = g_object_name + "/" + fname + suffix;
      return '';
  }
  function send_request()
  {
      var xmlhttp = null;
      if (window.XMLHttpRequest)
      {
          xmlhttp = new XMLHttpRequest();
      } else if (window.ActiveXObject)
      {
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }

      if (xmlhttp != null)
      {
          serverUrl = 'https://api.youxingku.cn/aliyun/upload/php/get.php';
          xmlhttp.open("POST", serverUrl, false);
          xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          xmlhttp.send("types=1&uid=777");
          return xmlhttp.responseText;
      } else
      {
          alert("Your browser does not support XMLHTTP.");
      }
  }
  function get_suffix(filename) {
      pos = filename.lastIndexOf('.')
      suffix = ''
      if (pos != -1) {
          suffix = filename.substring(pos)
      }
      return suffix;
  }
</script>
<script>
    $("#up").click(function(){
        var info = $("#form").serialize()
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
        }
        var loading = weui.loading('请稍后', {
          className: 'custom-classname'
        });
       $.ajax({
           url:"/index/userinfo/doeditauth",
           type:"POST",
           data:info,
           dataType:'JSON',
           success:function (data) {
            if(data==1){
               loading.hide(function() {
               });
                weui.toast('操作成功', {
                  duration: 1500,
                  className: 'custom-classname',
                  callback: function(){
                     window.location.href = '/index/sign/myinfo';
                 }
            });
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
    var card = $("input[name='idno']").val(); 
    var email = $("input[name='email']").val(); 
    var reg = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/;
    var em = /^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$/;
    if(!reg.test(card)){
        return 2;
    }
    if(!em.test(email)){
        return 3;
    }
        return true;
    }
</script>
</html>
