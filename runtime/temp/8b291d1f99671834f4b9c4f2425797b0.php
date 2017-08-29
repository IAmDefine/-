<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"E:\xampp\htdocs\wechat\public/../application/index\view\sign\sign_work.html";i:1503971514;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>工作室-签约</title>
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
        <div class="content ">
            <div class=" weui-cells weui-cells_form " style="margin-top:0; border-top:none;">
                <div class="weui-cell " style=" background-color: #f5f5f5;">
                    <div class="weui-cell__hd "><label class="weui-label " style="margin-top:0.6rem;">工作室信息</label></div>
                </div>
            </div>
        </div>
        <div class="weui-cells">
            <div class="weui-cells weui-cells_form ">
                <div class="weui-cell ">
                    <div class="weui-cell__hd "><label class="weui-label ">工作室名称</label></div>
                    <div class="weui-cell__bd ">
                        <input class="weui-input " style="text-align: -webkit-right;" value="<?php echo (isset($sinfo['bizname'] ) && ($sinfo['bizname']  !== '')?$sinfo['bizname'] :''); ?>" name="partyb" readonly="readonly" />
                    </div>
                </div>
                <div class="weui-cell ">
                    <div class="weui-cell__hd "><label class="weui-label ">投资人</label></div>
                    <div class="weui-cell__bd ">
                        <input class="weui-input " style="text-align: -webkit-right; " type="text " name="investor" placeholder="请输入投资人姓名" />
                    </div>
                </div>
                <div class="weui-cell ">
                    <div class="weui-cell__hd "><label class="weui-label ">联系人</label></div>
                    <div class="weui-cell__bd ">
                        <input class="weui-input " style="text-align: -webkit-right; " name="workman" type="text " placeholder="请输入联系人姓名" />
                    </div>
                </div>
                <div class="weui-cell ">
                    <div class="weui-cell__hd "><label class="weui-label ">联系地址</label></div>
                    <div class="weui-cell__bd ">
                        <input class="weui-input " style="text-align: -webkit-right; " type="text " name="workaddr" placeholder="请输入联系地址" value="<?php echo (isset($sinfo['addr'] ) && ($sinfo['addr']  !== '')?$sinfo['addr'] :''); ?>"/>
                    </div>
                </div>
                <div class="weui-cell ">
                    <div class="weui-cell__hd "><label class="weui-label ">联系电话</label></div>
                    <div class="weui-cell__bd ">
                        <input class="weui-input " style="text-align: -webkit-right; " name="worktel" type="number " placeholder="请输入联系电话" value="<?php echo (isset($sinfo['tel'] ) && ($sinfo['tel']  !== '')?$sinfo['tel'] :''); ?>"/>
                    </div>
                </div>
                <div class="weui-cell ">
                    <div class="weui-cell__hd "><label class="weui-label ">电子邮箱</label></div>
                    <div class="weui-cell__bd ">
                        <input class="weui-input " style="text-align: -webkit-right; " name="workemail" type="text " placeholder="请输入电子邮箱" value="<?php echo (isset($sinfo['email'] ) && ($sinfo['email']  !== '')?$sinfo['email'] :''); ?>"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="content ">
            <div class=" weui-cells weui-cells_form " style="margin-top:0; border-top:none;">
                <div class="weui-cell " style=" background-color: #f5f5f5;">
                    <div class="weui-cell__hd "><label class="weui-label " style="margin-top:0.6rem;">艺人信息</label></div>
                </div>
            </div>
        </div>
        <div class="weui-cells">
            <div class="weui-cells weui-cells_form ">
                <div class="weui-cell ">
                    <div class="weui-cell__hd "><label class="weui-label ">乙方姓名</label></div>
                    <div class="weui-cell__bd ">
                        <input class="weui-input " style="text-align: -webkit-right; " name="starname" value="<?php echo (isset($sinfo['oldname'] ) && ($sinfo['oldname']  !== '')?$sinfo['oldname'] :''); ?>" type="text " placeholder="请输入真实姓名 "  readonly="readonly" />
                    </div>
                </div>
                <div class="weui-cell ">
                    <div class="weui-cell__hd "><label class="weui-label ">乙方艺名</label></div>
                    <div class="weui-cell__bd ">
                        <input class="weui-input " style="text-align: -webkit-right; " value="<?php echo (isset($sinfo['names'] ) && ($sinfo['names']  !== '')?$sinfo['names'] :''); ?>" name="actorname" type="text " placeholder="请输入艺名"  readonly="readonly"/>
                    </div>
                </div>
               
                    <div class="weui-cell weui-cell_select weui-cell_select-after">
                        <div class="weui-cell__hd">
                            <label for="" class="weui-label">国籍</label>
                        </div>
                        <div class="weui-cell__bd" dir="rtl">
                            <select class=" weui-select " name="citizenship">
                                    <option style="color: #F5F5F5" disabled selected>请选择国籍</option>
                                    <option value="中国" >中国</option>
                                    <option value="韩国" >韩国</option>
                                    <option value="日本" >日本</option>
                                    <option value="新加坡" >新加坡</option>
                                    <option value="美国" >美国</option>
                                </select>
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
                <div class="weui-cell ">
                    <div class="weui-cell__hd "><label class="weui-label ">身份证号码</label></div>
                    <div class="weui-cell__bd ">
                        <input class="weui-input " style="text-align: -webkit-right; " name="cardnum" value="<?php echo $sinfo['idno']; ?>"/>
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
                        <option value="24" >24个月</option>
                        <option value="36" >36个月</option>
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
                    <input class="weui-input " style="text-align: -webkit-right;" name="openname" type="text " placeholder="请输入开户名称 " />
                </div>
            </div>
            <div class="weui-cell ">
                <div class="weui-cell__hd "><label class="weui-label ">开户银行</label></div>
                <div class="weui-cell__bd ">
                    <input class="weui-input " style="text-align: -webkit-right; " name="openbank" type="text " placeholder="请输入开户银行 " />
                </div>
            </div>
            <div class="weui-cell ">
                <div class="weui-cell__hd "><label class="weui-label ">银行账户</label></div>
                <div class="weui-cell__bd ">
                    <input class="weui-input " style="text-align: -webkit-right; " name="openacct" type="number " pattern="[0-9]* " placeholder="请输入银行账户" />
                </div>
            </div>
        </div>
    </div>
    </div>
    <input type="hidden" name="type" value="<?php echo $types; ?>">
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
        url:"/index/sign/signup",
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