<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"E:\xampp\htdocs\wechat\public/../application/index\view\edit\edit_fir.html";i:1503907837;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>经纪公司-签约</title>
    <link rel="stylesheet" type="text/css" href="/css/lib/weui.min.css">
    <link rel="stylesheet" href="/css/common.css">
    <script src="/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/js/weui.min.js"></script>
    <style>
        .weui-cells {
            margin-top: 0;
        }
    </style>
</head>

<body>
    <div class="container" style="border-bottom:0.3rem solid #F5F5F5;">
<form id="form">
        <div class="weui-cells">
            <div class="weui-cells weui-cells_form ">
                <div class="weui-cell ">
                    <div class="weui-cell__hd "><label class="weui-label ">乙方公司全称</label></div>
                    <div class="weui-cell__bd ">
                        <input class="weui-input " style="text-align: -webkit-right; " value="<?php echo (isset($sinfo['bizname'] ) && ($sinfo['bizname']  !== '')?$sinfo['bizname'] :''); ?>"  readonly="readonly"  />
                    </div>
                </div>
                <div class="weui-cell ">
                    <div class="weui-cell__hd "><label class="weui-label ">法定代表人</label></div>
                    <div class="weui-cell__bd ">
                        <input class="weui-input " style="text-align: -webkit-right; " type="text " placeholder="请输入投资人姓名" />
                    </div>
                </div>
                <div class="weui-cell ">
                    <div class="weui-cell__hd "><label class="weui-label ">联系人</label></div>
                    <div class="weui-cell__bd ">
                        <input class="weui-input" style="text-align: -webkit-right; " value="<?php echo (isset($pinfo['workman'] ) && ($pinfo['workman']  !== '')?$pinfo['workman'] :''); ?>"  name="workman" type="text " placeholder="请输入经办人姓名" />
                    </div>
                </div>
                <div class="weui-cell ">
                    <div class="weui-cell__hd "><label class="weui-label ">联系地址</label></div>
                    <div class="weui-cell__bd ">
                        <input class="weui-input " style="text-align: -webkit-right; " name="workaddr"  type="text " placeholder="请输入联系地址" value="<?php echo (isset($pinfo['workaddr'] ) && ($pinfo['workaddr']  !== '')?$pinfo['workaddr'] :''); ?>" />
                    </div>
                </div>
                <div class="weui-cell ">
                    <div class="weui-cell__hd "><label class="weui-label ">联系电话</label></div>
                    <div class="weui-cell__bd ">
                        <input class="weui-input " style="text-align: -webkit-right; " type="number " name="worktel" placeholder="请输入联系电话" value="<?php echo (isset($pinfo['worktel'] ) && ($pinfo['worktel']  !== '')?$pinfo['worktel'] :''); ?>"/>
                    </div>
                </div>
                <div class="weui-cell ">
                    <div class="weui-cell__hd "><label class="weui-label ">电子邮箱</label></div>
                    <div class="weui-cell__bd ">
                        <input class="weui-input " style="text-align: -webkit-right; " name="workemail" type="text " value="<?php echo (isset($pinfo['workemail'] ) && ($pinfo['workemail']  !== '')?$pinfo['workemail'] :''); ?>" placeholder="请输入电子邮箱" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="weui-cells">
            <div class="weui-cell weui-cell_select weui-cell_select-after">
                <div class="weui-cell__hd">
                    <label for="" class="weui-label">合作期限</label>
                </div>
                <div class="weui-cell__bd" dir="rtl">
                    <select class=" weui-select " name="coopnum">
                            <option style="color: #F5F5F5" disabled selected>请选择合作期限</option>
                            <option value="24" <?php echo !empty($pinfo['coopnum']) && $pinfo['coopnum']==24?'selected' : ''; ?>>24个月</option>
                            <option value="36" <?php echo !empty($pinfo['coopnum']) && $pinfo['coopnum']==36?'selected' : ''; ?>>36个月</option>
                        </select>
                </div>
            </div>
        </div>
    <div class="content ">
        <div class=" weui-cells weui-cells_form " style="margin-top:0; border-top:none;">
            <div class="weui-cell " style=" background-color: #f5f5f5;">
                <div class="weui-cell__hd "><label class="weui-label " style="margin-top:0.6rem;">乙方指定账户</label></div>
            </div>
        </div>
    </div>
    <div class="content " style="margin-bottom:5.5rem;">
        <div class="weui-cells weui-cells_form ">
            <div class="weui-cell ">
                <div class="weui-cell__hd "><label class="weui-label ">开户名称</label></div>
                <div class="weui-cell__bd ">
                    <input class="weui-input " style="text-align: -webkit-right; " name="openname" type="text " value="<?php echo (isset($pinfo['openname'] ) && ($pinfo['openname']  !== '')?$pinfo['openname'] :''); ?>" placeholder="请输入开户名称 " />
                </div>
            </div>
            <div class="weui-cell ">
                <div class="weui-cell__hd "><label class="weui-label ">开户银行</label></div>
                <div class="weui-cell__bd ">
                    <input class="weui-input " style="text-align: -webkit-right; " name="openbank" type="text " value="<?php echo (isset($pinfo['openbank'] ) && ($pinfo['openbank']  !== '')?$pinfo['openbank'] :''); ?>" placeholder="请输入开户银行 " />
                </div>
            </div>
            <div class="weui-cell ">
                <div class="weui-cell__hd "><label class="weui-label ">银行账户</label></div>
                <div class="weui-cell__bd ">
                    <input class="weui-input " style="text-align: -webkit-right; " name="openacct" value="<?php echo (isset($pinfo['openacct'] ) && ($pinfo['openacct']  !== '')?$pinfo['openacct'] :''); ?>" type="number " pattern="[0-9]* " placeholder="请输入银行账户" />
                </div>
            </div>
        </div>
    </div>
    </div>
    <input type="hidden" name="id" value="<?php echo $pinfo['id']; ?>">
</form>
    <footer class="footer up">保存并上传</footer>
    </div>
</body>
<script>
        //提交表单
        $('.up').click(function(){
          var info = $("form").serialize()
          info = decodeURIComponent(info,true);
          $.ajax({
            url:"/index/sign/editsign",
            type:"POST",
            data:info,
            dataType:'JSON',
            success:function (data) {
              if(data['status']==1){
                //   weui.alert('跳转合同状态页面');
                window.location.href='/index/sign/pact_type'
              }else{
                weui.alert(data['msg']);
              }
            }
          });
        })
    </script>
</html>