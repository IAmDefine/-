<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"E:\xampp\htdocs\wechat\public/../application/index\view\sign\work_auth_result.html";i:1503890168;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>实名认证</title>
    <link rel="stylesheet" type="text/css" href="/css/weui.min.css">
    <link rel="stylesheet" href="/css/lib/common.css">
    <script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
    <style>
        .weui-cells {
            margin-top: 0;
        }
        
        .weui-form-preview__item {
            color: black;
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
    </style>
</head>

<body>
    <div class="container">
        <?php if($statrinfo['ifauth']==3): ?>
        <div class="weui-msg">
            <div class="weui-msg__icon-area"><i><img src="/imgs/icon-checking.png" alt=""></i></div>
            <div class="weui-msg__text-area">
                <h2 class="weui-msg__title">审核中</h2>
            </div>
            <div class="weui-cells zy-color">
                <div class="weui-form-preview__bd">
                    <div class="weui-form-preview__item">
                        <label class="weui-form-preview__label" style="color:black;">温馨提示&nbsp;:</label>
                        <span class="weui-form-preview__value" style="text-align:left;">24小时审核,请您耐心等待</span>
                    </div>
                </div>
            </div>
        </div>
        <?php elseif($statrinfo['ifauth']==2): ?>
        <div class="weui-msg">
                <div class="weui-msg__icon-area"><i class="weui-icon-success weui-icon_msg"></i></div>
                <div class="weui-msg__text-area">
                    <h2 class="weui-msg__title">认证通过</h2>
                </div>
            </div>
        <?php elseif($statrinfo['ifauth']==4): ?>
        <div class="weui-msg">
                <div class="weui-msg__icon-area"><i class="weui-icon-warn weui-icon_msg"></i></div>
                <div class="weui-msg__text-area">
                    <h2 class="weui-msg__title">认证失败</h2>
                </div>
                <div class="weui-cells zy-color">
                    <div class="weui-form-preview__bd">
                        <div class="weui-form-preview__item">
                            <label class="weui-form-preview__label" style="color:black;">失败原因&nbsp;:</label>
                            <span class="weui-form-preview__value" style="text-align:left;color:red;"><?php echo (isset($statrinfo['checkdesc']) && ($statrinfo['checkdesc'] !== '')?$statrinfo['checkdesc']:''); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="weui-cells zy-color" style="border-bottom:0.8rem solid #f5f5f5;border-top:0.8rem solid #f5f5f5;">
            <div class="weui-form-preview__bd">
                <div class="weui-form-preview__item">
                    <label class="weui-form-preview__label" style="color:black;">企业名称&nbsp;:</label>
                    <span class="weui-form-preview__value" style="text-align:left;"><?php echo (isset($statrinfo['bizname']) && ($statrinfo['bizname'] !== '')?$statrinfo['bizname']:''); ?></span>
                </div>
                <div class="weui-form-preview__item">
                    <label class="weui-form-preview__label" style="color:black;">企业注册号&nbsp;:</label>
                    <span class="weui-form-preview__value" style="text-align:left;"><?php echo (isset($statrinfo['compno']) && ($statrinfo['compno'] !== '')?$statrinfo['compno']:''); ?></span>
                </div>
                <div class="weui-form-preview__item">
                    <label class="weui-form-preview__label" style="color:black;">明星艺名&nbsp;:</label>
                    <span class="weui-form-preview__value" style="text-align:left;"><?php echo (isset($statrinfo['names']) && ($statrinfo['names'] !== '')?$statrinfo['names']:''); ?></span>
                </div>
                <div class="weui-form-preview__item">
                    <label class="weui-form-preview__label" style="color:black;">明星姓名&nbsp;:</label>
                    <span class="weui-form-preview__value" style="text-align:left;"><?php echo (isset($statrinfo['oldname']) && ($statrinfo['oldname'] !== '')?$statrinfo['oldname']:''); ?></span>
                </div>
                <div class="weui-form-preview__item">
                    <label class="weui-form-preview__label" style="color:black;">明星身份证号&nbsp;:</label>
                    <span class="weui-form-preview__value" style="text-align:left;"><?php echo (isset($statrinfo['idno']) && ($statrinfo['idno'] !== '')?$statrinfo['idno']:''); ?></span>
                </div>
                <div class="weui-form-preview__item">
                    <label class="weui-form-preview__label" style="color:black;">电子邮箱&nbsp;:</label>
                    <span class="weui-form-preview__value" style="text-align:left;"><?php echo (isset($statrinfo['email']) && ($statrinfo['email'] !== '')?$statrinfo['email']:''); ?></span>
                </div>
                <div class="weui-form-preview__item">
                    <label class="weui-form-preview__label" style="color:black;">认证时间&nbsp;:</label>
                    <span class="weui-form-preview__value" style="text-align:left;"><?php echo date("Y年m月d日",$statrinfo['instime']); ?></span>
                </div>
            </div>
        </div>
        <div class="weui-grids" style="margin-bottom:1.5rem;">
            <a href="javascript:;" class="weui-grid" style="width:50%;">
                <div class="">
                    <img src="<?php echo (isset($statrinfo['tradcert']) && ($statrinfo['tradcert'] !== '')?$statrinfo['tradcert']:'/imgs/add_icon.png'); ?>" alt="">
                </div>
                <p class="weui-grid__label">营业执照</p>
            </a>
            <a href="javascript:;" class="weui-grid" style="width:50%;">
                <div class="">
                    <img src="<?php echo (isset($statrinfo['entrus']) && ($statrinfo['entrus'] !== '')?$statrinfo['entrus']:'/imgs/add_icon.png'); ?>" alt="">
                </div>
                <p class="weui-grid__label">企业委托书</p>
            </a>
            <a href="javascript:;" class="weui-grid" style="width:50%;">
                <div class="">
                    <img src="<?php echo (isset($statrinfo['admcard']) && ($statrinfo['admcard'] !== '')?$statrinfo['admcard']:'/imgs/add_icon.png'); ?>" alt="">
                </div>
                <p class="weui-grid__label">身份证正面</p>
            </a>
            <a href="javascript:;" class="weui-grid" style="width:50%;">
                <div class="">
                    <img src="<?php echo (isset($statrinfo['reveside']) && ($statrinfo['reveside'] !== '')?$statrinfo['reveside']:'/imgs/add_icon.png'); ?>" alt="">
                </div>
                <p class="weui-grid__label">身份证反面</p>
            </a>
            <a href="javascript:;" class="weui-grid" style="width:50%;">
                <div class="">
                    <img src="<?php echo (isset($statrinfo['handid']) && ($statrinfo['handid'] !== '')?$statrinfo['handid']:'/imgs/add_icon.png'); ?>" alt="">
                </div>
                <p class="weui-grid__label">手持身份证正面照</p>
            </a>
            <?php if($statrinfo['credtype']==1): ?>
            <a href="javascript:;" class="weui-grid" style="width:50%;">
                <div class="">
                    <img src="<?php echo (isset($statrinfo['groupcode']) && ($statrinfo['groupcode'] !== '')?$statrinfo['groupcode']:'/imgs/add_icon.png'); ?>" alt="">
                </div>
                <p class="weui-grid__label">组织机构代码证</p>
            </a>
            <?php endif; ?>
        </div>
    </div>
    <?php if($statrinfo['ifauth']==4): ?>
    <footer class="footer " eid="<?php echo $statrinfo['id']; ?>">重新认证</footer>
    <?php endif; ?>
    </div>
</body>
<script>
    $(".footer").click(function(){
        var id = $(this).attr('eid');
        window.location.href='/index/userinfo/edit_auth?id='+ id;
    })
</script>
</html>