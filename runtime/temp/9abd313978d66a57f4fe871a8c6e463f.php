<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"E:\xampp\htdocs\wechat\public/../application/index\view\userinfo\work_auth.html";i:1504146888;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>实名认证</title>
    <link rel="stylesheet" href="/css/weui.min.css">
    <link rel="stylesheet" href="/css/lib/common.css">
    <script src="/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/js/lib/plupload-2.1.2/js/plupload.full.min.js"></script>
    <script type="text/javascript" src="/js/weui.min.js"></script>
    <style>
        .weui-cells {
            margin-top: 0;
        }
        
        a img {
            max-width: 100%;
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
        .weui-grid img{
            height:5.7rem;
        }
        .footer{
            z-index: 10;
           
        }
        .weui-uploader__bd{overflow: hidden;
            margin: 0;
        }

        .weui-uploader{
          border-bottom: 40px solid #EBEBEB;
          padding-bottom: 10px
        }

        .photo_con{
            width: 48%;
            height: 160px;
            float: left;
            margin-right:5px;
        }
        .photo_con > span{
            font-size: 14px;
            position: relative;
            bottom:7px;
        }
        img{
        width: 100%;
        height: 100%;
    }
    </style>
</head>

<body>
    <form id="form">
    <div class="container">
        <div class="weui-cells" style="border-bottom:0.8rem solid #f5f5f5;border-top:0.8rem solid #f5f5f5;">
        <div class="weui-cells">
                <a class="weui-cell weui-cell_access type" href="javascript:;">
                    <div class="weui-cell__bd">
                        <p id="types">证件类型：普通证件</p>
                        <input type="hidden" name="credtype" id="credtype" value="1">
                    </div>
                    <div class="weui-cell__ft">
                    </div>
                </a>
            </div>
        </div>
        <div class="content " style="border-bottom:0.8rem solid #F5F5F5; ">
            <div class="weui-cells weui-cells_form ">
                <div class="weui-cell ">
                    <div class="weui-cell__hd "><label class="weui-label ">公司名称</label></div>
                    <div class="weui-cell__bd ">
                        <input class="weui-input " style="text-align: -webkit-right; " name="bizname" type="text " placeholder="请输入公司名称" />
                    </div>
                </div>
                <div class="weui-cell ">
                    <div class="weui-cell__hd "><label class="weui-label ">企业注册号</label></div>
                    <div class="weui-cell__bd ">
                        <input class="weui-input " style="text-align: -webkit-right; " name="compno" type="text " placeholder="请输入企业注册号 " />
                    </div>
                </div>
            </div>
        </div>
        <div class="content " style="border-bottom:0.8rem solid #F5F5F5;">
            <div class="weui-cells weui-cells_form ">
                <div class="weui-cell ">
                    <div class="weui-cell__hd "><label class="weui-label ">艺名</label></div>
                    <div class="weui-cell__bd ">
                        <input class="weui-input " style="text-align: -webkit-right; " name="names" type="text " placeholder="请输入艺名 " />
                    </div>
                </div>
                <div class="weui-cell ">
                    <div class="weui-cell__hd "><label class="weui-label ">姓名</label></div>
                    <div class="weui-cell__bd ">
                        <input class="weui-input " style="text-align: -webkit-right; " name="oldname" type="text " placeholder="请输入姓名 " />
                    </div>
                </div>
                <div class="weui-cell ">
                    <div class="weui-cell__hd "><label class="weui-label ">身份证号码</label></div>
                    <div class="weui-cell__bd ">
                        <input class="weui-input " style="text-align: -webkit-right; " name="idno" type="number " pattern="[0-9]* " placeholder="请输入身份证号码 " />
                    </div>
                </div>
                <div class="weui-cell ">
                    <div class="weui-cell__hd "><label class="weui-label ">邮箱</label></div>
                    <div class="weui-cell__bd ">
                        <input class="weui-input " style="text-align: -webkit-right; " name="email" type="text " pattern="[0-9]* " placeholder="请输入邮箱 " />
                    </div>
                </div>
            </div>
        </div>
        <div class="content ">
            <div class="weui-cells weui-cells_form " style="margin-top:0; ">
                <div class="weui-cell ">
                    <div class="weui-cell__hd "><label class="weui-label ">上传证件</label></div>

                </div>
            </div>
        </div>
       
        <div class="weui-uploader" style="margin-left:11px;margin-top:20px">
                <div class="weui-uploader__bd">
                  <div class="photo_con" onclick="setvar(1)">
                    <div class="weui-uploader__input-box" style="width:100%;height:114px" id="selectfiles" >
                       <img src="" id="img1">
                       <input type="hidden" name="tradcert" id="imgurl1">
                    </div>
                    <span style="margin-left:60px;">营业执照</span>
                  </div>
                  <div class="photo_con" onclick="setvar(2)">
                    <div class="weui-uploader__input-box" style="width:100%;height:114px" id="selectfiles1" >
                        <img src="" id="img2">
                        <input type="hidden" name="entrus" id="imgurl2">
                    </div>
                    <span style="margin-left:55px">企业委托书</span>
                 </div>
                 <div class="photo_con" onclick="setvar(3)">
                    <div class="weui-uploader__input-box" style="width:100%;height:114px" id="selectfiles2">
                        <img src="" id="img3">
                        <input type="hidden" name="admcard" id="imgurl3">
                    </div>
                    <span style="margin-left:55px">身份证正面</span>
                </div>
                <div class="photo_con" onclick="setvar(4)">
                        <div class="weui-uploader__input-box" style="width:100%;height:114px" id="selectfiles3">
                            <img src="" id="img4">
                            <input type="hidden" name="reveside" id="imgurl4">
                        </div>
                        <span style="margin-left:55px">身份证反面</span>
                    </div>  
                <div class="photo_con" onclick="setvar(5)">
                        <div class="weui-uploader__input-box" style="width:100%;height:114px" id="selectfiles4">
                            <img src="" id="img5">
                            <input type="hidden" name="handid" id="imgurl5">
                        </div>
                        <span style="margin-left:30px">手持身份证正面照</span>
                    </div>  
                
                <div class="photo_con show" onclick="setvar(6)">
                        <div class="weui-uploader__input-box" style="width:100%;height:114px" id="selectfiles5">
                            <img src="" id="img6">
                            <input type="hidden" name="groupcode" id="imgurl6">
                        </div>
                        <span style="margin-left:40px">组织机构代码证</span>
                </div> 
           
                </div>
            </div>
    </div>
    <input type="hidden" name="signtype" value="<?php echo (isset($signtype) && ($signtype !== '')?$signtype:''); ?>">
    </form>
    <footer class="footer " id="up">保存并上传</footer>
    </div>
</body>
<script>
      $(".type").click(function(){
      weui.picker([
          {
              label: '多证合一',
              value: 2
          },
          {
              label: '普通证件',
              value: 1
          }
      ], {
          className: 'custom-classname',
          defaultValue: [0],
          onConfirm: function (result) {
              $("#types").text('证件类型：'+result[0]['label']);
              var types = result[0]['value'];
              $("#credtype").val(types);
              console.log(types);
              if(types==1){
                  $('.show').css('display','block');
              }else if(types==2){
                $('.show').css('display','none');
                $("#imgurl6").val('');
                $("#img6").attr('src','');
              }
          },
          id: 'singleLinePicker'
      });
  })
</script>
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
          browse_button: ['selectfiles', 'selectfiles1', 'selectfiles2','selectfiles3','selectfiles4','selectfiles5'], //触发文件选择对话框的按钮，为那个元素id
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
      //提交表单
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
        }else if(v==4){
            weui.alert('请输入公司名称！');
            return;
        }else if(v==5){
            weui.alert('请输入企业注册号！');
            return;
        }else if(v==6 || v==7){
            weui.alert('请输入名字！');
            return;
        }else if(v==8){
            weui.alert('请上传营业执照！');
            return;
        }else if(v==9){
            weui.alert('请上传企业委托书！');
            return;
        }else if(v==10){
            weui.alert('请上传身份证！');
            return;
        }else if(v==12){
            weui.alert('请上传组织结构代码证！');
            return;
        }
        var loading = weui.loading('请稍后', {
          className: 'custom-classname'
        });
       $.ajax({
           url:"/index/userinfo/addauth",
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
        var card = $("input[name='idno']").val(); 
        var email = $("input[name='email']").val(); 
        var bizname = $("input[name='bizname']").val(); 
        var compno = $("input[name='compno']").val(); 
        var names = $("input[name='names']").val(); 
        var names = $("input[name='oldname']").val(); 
        var tradcert = $("input[name='tradcert']").val(); 
        var entrus = $("input[name='entrus']").val(); 
        var admcard = $("input[name='admcard']").val(); 
        var reveside = $("input[name='reveside']").val(); 
        var handid = $("input[name='handid']").val(); 
        var credtype = $("input[name='credtype']").val(); 
        var groupcode = $("input[name='groupcode']").val(); 
        var reg = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/;
        var em = /^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$/;
        if(bizname==''){
            return 4;
        }
        if(compno==''){
            return 5;
        }
        if(names==''){
            return 6;
        }
        if(names==''){
            return 7;
        }
        if(!reg.test(card)){
            return 2;
        }
        if(tradcert==''){
            return 8;
        }
        if(entrus==''){
            return 9;
        }
        if(reveside==''||admcard==''||handid==''){
            return 10;
        }
      
        if(!em.test(email)){
            return 3;
        }
        if(credtype==1){
            if(groupcode==''){
                return 12;
            }
        }
        return true;
    }
    </script>
</html>