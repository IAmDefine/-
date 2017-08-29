<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:81:"E:\xampp\htdocs\wechat\public/../application/index\view\pacttype\agency_type.html";i:1503648032;s:70:"E:\xampp\htdocs\wechat\public/../application/index\view\head_type.html";i:1503638385;s:71:"E:\xampp\htdocs\wechat\public/../application/index\view\pub_button.html";i:1503648091;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>代理协议-个人</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="/css/pact/common.css">
    <script src="/js/jquery-1.8.3.min.js"></script>    
</head>
<body>
<div class="container">

  <div class="tab">
  <div class="text-size-26 tab-active">合同</div>
  <!-- <a href="/index/sign/myinfo"> -->
  <div class="text-size-26 identity">身份认证</div>
  <!-- </a> -->
</div>
<?php if(!(empty($pact) || (($pact instanceof \think\Collection || $pact instanceof \think\Paginator ) && $pact->isEmpty()))): if($pact['states']==1): ?>
 <div class="status">
    <div class="status-show">
        <div class="status-show-icon status-icon-checking"></div>
        <div class="status-show-text text-size-26 text-color-222 text-center">审核中</div>
    </div>
    <div class="status-cue text-size-26 text-color-444">
        温馨提示：24小时审核，请耐心等待
    </div>
 </div>
<?php elseif($pact['states']==2): ?>
 <div class="status">
   <div class="status-show">
       <div class="status-show-icon status-icon-success"></div>
       <div class="status-show-text text-size-26 text-color-222 text-center">申请成功</div>
   </div>
 </div>
<?php elseif($pact['states']==3): ?>
    <div class="status">
      <div class="status-show">
          <div class="status-show-icon status-icon-failed"></div>
          <div class="status-show-text text-size-26 text-color-222 text-center">未通过</div>
      </div>
      <div class="status-cue text-size-26 text-color-444">
          失败原因：<span class="text-color-red">信息有误！</span>
      </div>
    </div>
<?php elseif($pact['states']==5): ?>
<div class="status">
  <div class="status-show status-show-border">
      <div class="status-show-icon status-icon-pencil"></div>
      <div class="status-show-text text-size-26 text-color-222 text-center">审核中</div>
  </div>
  <div class="status-cue text-size-26 text-color-444">
      温馨提示：24小时审核，请耐心等待
  </div>
</div>
<?php elseif($pact['states']==6): ?>
<div class="status">
  <div class="status-show status-show-border">
      <div class="status-show-icon status-icon-pencil"></div>
      <div class="status-show-text text-size-26 text-color-222 text-center">签约失败</div>
  </div>
  <div class="status-cue text-size-26 text-color-444">
      失败原因：<span class="text-color-red">您的签字不清晰，请重新签字</span>
  </div>
</div>  
<?php elseif($pact['states']==4): ?>
<div class="status">
  <div class="status-show status-show-border">
      <div class="status-show-icon status-icon-pencil"></div>
      <div class="status-show-text text-size-26 text-color-222 text-center">签约成功</div>
  </div>
</div>    
<?php endif; endif; ?>
<script>
    $('.identity').click(function(){
        window.location.href='/index/sign/myinfo';
    })
</script>

<div class="content">
    <div>
        <h1 class="text-color-red">【签约提示与说明】</h1>

        <h2>一、签约流程与合同生效</h2>
        <p>1.注册用户（下称“您”）与优星库平台签订本协议将借助第三方电子签约机构“文签”（公司名称[杭州文签网络技术有限公司]）的技术实现电子签约的可靠性，您在优星库平台签约视为您同意使用“文签”的服务，为本协议签署之目的，优星库平台有权将您的基本信息、电子签名等必要资料提交给“文签”。</p>
        <p>请您在签约前，先行按“文签”要求创建“我的签章”，该签章代表您认可相关内容并同意签约</p>
        <p>3.在您充分阅读本协议（重要内容提示见本提示与说明第二条），对本协议无疑问、异议，且填写全部待补充的内容（下称“变量条款”）后，如同意签约，请点击本协议“乙方签署区”添加您的电子签章，并将本协议提交给优星库平台审核。</p>
        <h2>4.优星库平台按如下程序审核您根据本条上述第3款签署并提交的本协议：</h2>
        <p>（1）如审核通过，优星库平台将在您提交的本协议的“甲方签署区”加盖甲方电子签章，并将双方均已签署的本协议发送至您账户个人中心；</p>
        <p>（2）如审核未通过，优星库平台有权修改本协议的变量条款后添加甲方电子签章，，并将修改的本协议发送至您账户个人中心，届时请您再次审阅是否同意签约：</p>
        <p>1）若您同意签约，请重新点击本协议“乙方签署区”添加您的电子签章；</p>
        <p>2）若您不认可优星库平台修改的本协议变量条款，则您有权修改变量条款后再次点击本协议“乙方签署区”并将修改的本协议重新提交优星库平台审核。</p>
        <h2>5.本协议在您和优星库平台均已签署时生效，具体生效时间以您或优星库平台在后的签约时间为准。就双方签署的本协议，“文签”将就该协议生成唯一的代码。</h2>
        <h2>6.在阅读本协议的过程中，如您不同意本协议的任何内容，您应停止填写变量条款，并退出签约程序。</h2>
        <h2 class="text-color-red">7.需提示，您签署并提交的本协议不可撤回，优星库平台将在规定审核时限（见本提示与说明第三条）内按上述程序审核完毕。</h2>
        <h2 class="text-color-red">8.优星库平台没有义务确保您提交的本协议必定能够通过审核，优星库平台将综合考量各方面合作因素后作出决定；如未通过审核，您和优星库平台均不承担任何责任。</h2>

        <h1>二、重要内容提示</h1>
        <p>本协议是优星库平台运营方与您就本协议所述艺人的商务事务之代理事宜签订的合同，请您在签约前，务必审慎、仔细阅读并透彻地理解本协议的全部内容，尤其是以下条款：</p>
        <h2>1.本协议约定的<span class="text-color-red">免除或限制责任</span>的条款；</h2>
        <h2>2.本协议约定的<span class="text-color-red">法律适用和管辖</span>的条款；</h2>
        <h2>3.本协议中<span class="text-color-red">以黑体、加粗、下划线、斜体等方式显著标识</span>的重要条款。</h2>

        <h1>三、疑问解答与平台审核时限</h1>
        <h2>1.如对本协议内容有任何疑问，您可通过优星库平台的人工服务热线（[  ]）进行咨询。</h2>
        <h2>2.优星库平台对您提交的本协议的审核时限为48小时（限于工作日时间，不含您提供下述第四条所述资料的时间），遇法定节假日将顺延。</h2>

        <h1>四、签约双方资料</h1>
        <h2>您最迟应在第一次提交本协议时在个人中心进行信息认证、向优星库平台邮箱（邮箱地址：[  ]）提交如下资料或将该等资料作为提交的本协议的附件：</h2>
        <p>（1）您及您指定的联系人的身份资料：</p>
        <p>1）亲笔签名的身份证件。</p>
        <p>2）加盖公章的营业执照正副本或其他主体登记注册文件。</p>
        <p>3）企业法定代表人（境外企业的负责人应附经公证的授权书）或委托代理人（应附授权书）亲笔签名的身份证件。</p>
        <p>（2）证明您为艺人的独家经纪公司的合同等法律文件的扫描件。</p>
        <p>（3）优星库平台在审核本协议过程中要求您补充提供的必要资料。</p>
        <h2>2.任何时候，如您需核实优星库平台的证照资料，请见优星库平台首页的底端。</h2>
    </div>
    <div class="content-header">
        <h1 class="text-bold text-center">代理协议 - 个人&优星库</h1>
        <p class="text-size-26 box-margin-20">
            本协议由以下双方在中华人民共和国（下称“ <strong>中国</strong>”）签署，双方的具体信息如下：
        </p>
        <table class="text-size-26">
            <tr class="line-height-50 text-bold">
                <td>甲方：</td>
                <td>前锋锐吉（北京）传媒有限公司</td>
            </tr>
            <tr class="line-height-50">
                <td>法定代表人：</td>
                <td>牛群</td>
            </tr>
            <tr class="line-height-50">
                <td style="word-break: keep-all;">联系地址：</td>
                <td>北京市亦庄经济技术开发区经海路7号贞观国际1号楼2层</td>
            </tr>
            <tr class="line-height-50">
                <td>联系人：</td>
                <td>牛群</td>
            </tr>
            <tr class="line-height-50">
                <td>电子邮箱：</td>
                <td>niuyu@ce-lian.com</td>
            </tr>
            <tr class="line-height-50">
                <td>联系电话：</td>
                <td>010-85952988</td>
            </tr>
            <tr class="line-height-50">
                <td class="text-justify">乙 方</td>
                <td>： <span class="text-underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
            </tr>
            <tr class="line-height-50">
                <td class="text-justify">国 籍</td>
                <td>： <span class="text-underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
            </tr>
            <tr class="line-height-50">
                <td class="text-justify">证件类型</td>
                <td>： <span class="text-underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
            </tr>
            <tr class="line-height-50">
                <td class="text-justify">证件号码</td>
                <td>： <span class="text-underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
            </tr>
            <tr class="line-height-50">
                <td>联系地址</td>
                <td>： <span class="text-underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
            </tr>

            <tr class="line-height-50">
                <td>联系电话</td>
                <td>： <span class="text-underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
            </tr>
            <tr class="line-height-50">
                <td>电子邮箱</td>
                <td>： <span class="text-underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
            </tr>
        </table>
    </div>
    <div class="content-main">
        <p class="text-color-red line-height-50">( 甲方、乙方以下单称“一方”，合称“双方”)</p>
        <h1>鉴于：</h1>
        <p>（1）甲方是一家依据中国法律设立并存续的有限公司，专业从事演艺和商务事务的经纪、代理及相关业务；</p>
        <p>（2）[ <span class="text-underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span> ]（艺名：[ <span class="text-underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span> ]）是一位具有[中国]国籍的自然人（非未成年人），具有良好的艺术天赋与条件，拟从事或正在从事演艺事业；</p>
        <p>（3）甲乙双方拟就乙方的演艺事业中的商务事务的代理事宜进行合作。</p>
        <p>现根据《中华人民共和国合同法》等相关法律法规的规定，双方经协商一致，达成本协议条款如下：</p>

        <h1>1.合作事项</h1>
        <h2>1.1合作范围</h2>
        <p>双方同意，由甲方作为乙方的演艺事业的商务事务代理人，按照本协议的约定，代表乙方与商务事务合作方洽谈、商议商务事务合作事宜，并由甲方及/或甲方认可的第三方代表乙方签订、出具相关商务合作合同、授权书等法律文件（下称“<strong>商务合同</strong>”），前述商务事务包括：</p>
        <p>1.1.1人身权授权事宜：指将乙方的肖像、姓名、声音等与其形象、个人特征有关的元素（无论是以文字、图片、标识、视音频等形式体现，下称“<strong>个人元素</strong>”）许可、授权第三方进行使用的相关事务。</p>
        <p>1.1.2参加商务活动事宜：指乙方借助其形象、影响力参与的除电影、电视剧、综艺节目、网络剧、网络电影（微电影除外）、网络综艺、话剧、歌舞剧、舞台剧的演出以外的其他一切形式的商业活动，包括但不限于：</p>
        <p>（1）广告代言：指担任一切商品或服务的代言人，或者其他为品牌、商品或服务作推荐、证明的活动，广告的形式包括但不限于平面广告、视音频广告（含直播广告）、新媒体广告、自媒体宣传推广等；</p>
        <p>（2）以现场或非现场的方式参加宣传推广品牌、商品、服务和企业的活动，包括但不限于作为庆典活动、产品推介会/发布会、企业年会/晚会、直播活动等活动的主持、礼仪、嘉宾或为该等活动剪彩、走秀、进行表演等。</p>
        <p>1.2合作期限</p>
        <p>1.2.1合作期限为[36]个月，自[ <span class="text-underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> ]年[ <span class="text-underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> ]月[ <span class="text-underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> ]日起至[ <span class="text-underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> ]年[ <span class="text-underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> ]月[ <span class="text-underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> ]日止。合作期限届满后，同等条件下，甲方有优先续约权。</p>
        <p>1.2.2跨期商务合同</p>
        <p>基于本协议约定，甲方在合作期限内代表乙方与第三方签署的涉及乙方的商务合同，若在合作期限届满之日或本协议终止之日尚未履行完毕的，乙方应继续履行该等商务合同或完成该等商务合同项下涉及乙方的全部工作，并按照本协议约定分配商务收入（见 <span class="text-underline">第3条</span>）。</p>
        <p>1.3合作地域：全世界范围。</p>
        <p>1.4合作性质</p>
        <p class="text-bold text-underline">1.4.1本协议项下的合作为非独家代理。</p>
        <p class="text-bold text-underline">1.4.2自合作期限开始后12个月内，如甲方为乙方成功接洽并签署2份商务合同，则本协议第1.4条约定的合作性质自动变更为独家、排他合作，即：无论是有偿还是无偿，乙方不应就其商务事务与商务合作方达成任何合作，也不应将其商务事务委托除甲方以外的其他方进行代理，或与除甲方以外的其他方就本协议约定的合作范围所涉事宜开展相同或相似的合作；甲方将就此书面通知乙方，但前述合作性质的变更不以甲方是否通知乙方为条件，该等变更自甲方根据本协议约定签署第2份商务合同之日起自动生效。</p>
        <p>1.5转授权：详见<span class="text-underline">第10.2条</span>。</p>

        <h1>2.商务事务安排</h1>
        <p>2.1在合作期限内，甲方有权以乙方的“商务代理公司”或类似的名义对外开展本协议项下的全部工作，乙方应按甲方的需求向甲方出具<strong>《授权书》</strong>，其形式和内容详见<strong class="text-underline">附件一，但甲方有权根据本协议项下工作的实际需要，要求调整《授权书》的内容，乙方应配合签署。</strong>前述《授权书》与本协议约定不一致的，以本协议为准。</p>
        <p>2.2甲方代表乙方签署商务合同前，应将拟签署的商务合同以书面形式提供给乙方审核确认；<strong class="text-underline">乙方收到甲方提供的拟签署的商务合同之日起[5]日内（下称“商务合同确认期”）应书面回复确认或提出书面修改意见，逾期未书面回复确认或提出书面修改意见的，视为乙方确认拟签署的商务合同。</strong>如乙方提出书面修改意见，在甲方重新向乙方提供修订的商务合同后，乙方仍应按商务合同确认期进行书面确认或提出书面修改意见，此后均依此执行。</p>
        <p class="text-bold text-underline">2.3尽管有第2.1条的约定，乙方同意，甲方有权决定商务合同的合作价款标准，乙方有权提出合理建议，但最终以甲方的意见为准，包括但不限于乙方在优星库平台发布、修改的服务价格须经优星库平台审核通过方可发布、修改。</p>
        <p>2.4乙方应以勤勉、敬业的精神严格遵守、配合、完成经乙方事先书面确认的商务合同项下涉及乙方的全部工作。</p>
        <p class="text-bold text-underline">2.5乙方承诺，非因经甲方确认的涉及乙方自身及其近亲属的重大人身、财产事项或其他事由（乙方应向甲方提供真实、充分、合法的证明资料），乙方不得拒绝甲方洽谈、安排的商务事务，且乙方的私人活动与甲方洽谈、安排的商务事务相冲突的，应优先遵守、配合、完成甲方安排的商务事务。</p>
        <p class="text-bold text-underline">2.6甲方代表乙方洽谈商务事务时，应尽力向商务合作方争取乙方的保险、服装、化妆、造型产生的费用及要求商务合作方为乙方办理在中国境内外工作的相关许可手续（如需），如商务合作方不同意承担前述费用或办理前述手续，则参加商务事务产生的保险、服装、化妆、造型的费用由乙方自行承担，前述手续的办理及相关费用的承担由甲乙双方另行协商。</p>
        <p class="text-bold text-underline">2.7为履行本协议之目的，甲方有权无偿使用乙方的个人元素。</p>
        <p>2.8乙方最迟应在本协议签订之日起三个工作日内向甲方提交乙方的品牌、商品或服务的代言清单，并不时向甲方更新该代言清单。</p>
        <p class="text-color-red">2.9双方同意，因商务合同的履行与商务事务合作方产生纠纷的，乙方及/或乙方艺人应自行解决并承担相关责任，甲方将积极配合并协助乙方及/或乙方艺人维权。</p>
        <p class="text-bold text-underline">2.10双方确认，如商务事务合作方出现未取得从事品牌、商品或服务的生产经营活动的行政许可、产品质量缺陷或侵犯第三方合法权益（如商标侵权等）等违规经营情形，并导致乙方名誉或形象受损、产生经济损失或被追究法律责任的，甲方将依据本协议约定配合维权，但无需就此向乙方承担任何责任，乙方同意不得就此向甲方提出承担责任或赔偿损失的要求。</p>
        <p>2.11甲方有权以线上、线下等方式开展本协议项下的合作事项，包括但不限于在甲方运营的互联网平台 “优星库”（网站地址：[ <span class="text-underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> ]）开展合作事项。</p>

        <h1>3.商务收入分配</h1>
        <h2>3.1收入范围</h2>
        <p>3.1.1本协议所述“<strong>商务收入</strong>”是指因<span class="text-underline">第1.1条</span>约定的商务事务而产生的全部收入，具体金额以商务合同项下全部的收入为准，包括但不限于酬金、利润分成、奖金、不退预付款、礼品、许可费、违约金、赔偿金等货币和非货币收入（不包括乙方的保险、服装、化妆和造型的费用），无论该等收入实际发生在合作期限内或合作期限届满后。</p>
        <p>3.1.2为免疑义，应进行分配、结算和支付的商务收入不包括：可退的预付款、保证金、定金，或者其他尚未实际收到的款项。</p>
        <p>3.1.3尽管有本<span class="text-underline">第3.1条</span>前述约定，双方确认，与商务事务维权事宜相关的费用由双方单独结算，即不随同每笔商务收入进行结算与支付，乙方自收到维权收入之日起[5]日内应向甲方提供维权收入报表并附相关证明文件，经甲方书面确认后乙方应按该报表向甲方支付甲方应分配的维权收入。<strong class="text-underline">商务事务维权事宜所产生的成本（下称“维权费用”）在维权收入中扣除，维权收入不足扣除维权费用的，未能扣除的维权费用由乙方自行承担，维权收入扣除维权费用后的款项由双方按甲方[  ]%、乙方 [  ]%的比例共享。</strong></p>
        <h2>3.2收入分配顺序、比例</h2>
        <p>3.2.1扣除商务合同项下应缴纳的税款；</p>
        <p class="text-bold text-underline">3.2.2商务收入扣除上述第3.2.1条约定的税款后的剩余款项由双方按照甲方[  ]%、乙方[  ]%的比例进行分配。</p>
        <p class="text-bold text-underline">3.2.3本协议合作性质自动变更为独家、排他合作的，自变更之日起产生的商务收入（以商务合同的签署时间为准，不包括在变更日以前已签署的商务合同所产生的商务收入）扣除上述第3.2.1条约定的税款后的剩余款项由双方按照甲方[  ]%、乙方[  ]%的比例进行分配，即前述变更合作性质后的商务收入的分配不再适用上述第3.2.2条的约定。</p>
        <h2>3.3收入结算与支付</h2>
        <p>甲方在收到每笔商务收入之日起[10]日内，按<span class="text-underline">第3.2.1条</span>约定扣除税款后，将应分配给乙方的款项支付至乙方指定的收款账户（详见<span class="text-underline">第3.4条</span>）。</p>
        <h2>3.4乙方指定的收款账户如下：</h2>
        <p>开户名称：[ <span class="text-underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> ]；</p>
        <p>开户银行：[ <span class="text-underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> ]；</p>
        <p>银行账户：[ <span class="text-underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> ]。</p>
        <h2>3.5税费与收据</h2>
        <p>双方应按法律规定各自缴纳各项税、费，甲方有权代为扣缴乙方取得的本协议项下的收入应按中国法律缴纳的税款。乙方收到甲方支付的每期商务收入分配款项之日起[5]日内，应向甲方开具等额的收据。</p>
        <h2 class="text-bold text-underline">3.6其他：商务收入按[人民币]结算，因此产生的汇率差损失（如有）由乙方自行承担。</h2>

        <h1>4.承诺与保证</h1>
        <p>4.1双方保证，均具有完全的民事权利能力与行为能力，已充分理解本协议项下各自的权利与义务。</p>
        <p>4.2双方保证，具有洽谈、签订、履行本协议的完整的权力或已经取得充分地授权，一方洽谈、签订、履行本协议的行为不会违反任何在先义务，且不会引致另一方被以任何形式追究责任。</p>
        <p>4.3双方保证，不会对双方及双方基于本协议开展的合作作出任何不利的言论或行为，亦不会对外宣传双方之间存在本协议约定以外的关系。</p>
        <p class="text-bold text-underline">4.4乙方保证，在本协议签订前，其未委托任何第三方代理本协议项下乙方的商务事务，也不存在对乙方将其商务事务委托甲方代理构成限制、障碍的其他事项；同时，乙方保证不存在任何限制、禁止其从事演艺事业、商务事务的情形。</p>
        <p>4.5甲方保证其具有从事本协议项下业务的经营资质。</p>

        <h1>5.保密</h1>
        <p>5.1双方应对本协议及在洽谈、签订、履行本协议过程中所获悉的属于对方的且无法自公开渠道获得的信息予以保密。未经对方书面同意，任何一方不得以任何方式利用或向任何第三方泄露、提供属于对方的上述保密信息的全部或部分内容。</p>
        <p>5.2尽管有前述约定，双方有权因行使本协议项下的权利或自身上市、新三板挂牌、重组、公司股权融资之需要向必要的第三方（包括但不限于必要的员工、财务或法律顾问等）披露本协议全部或部分内容，不视为违约，但应确保该等接受保密信息的第三方履行不低于本第5条约定标准的保密义务。</p>
        <p>5.3本<span class="text-underline">第5条</span>的约定不因本协议无效、终止而失去效力，双方应始终履行保密义务直至该等保密信息非因任何一方违反保密义务而公开为止。</p>

        <h1>6.违约责任</h1>
        <p>6.1双方均应严格履行本协议，任何一方不履行、不全面履行本协议的约定或者所作出的承诺、保证不真实均构成违约，违约方应赔偿守约方因此造成的全部损失。</p>
        <p class="text-bold text-underline">6.2如乙方作出嫖娼、吸/贩毒、赌博等违反中国政治政策、法律法规、行政规章或规范性文件的言行，被任何国家政府机关采取强制措施、启动刑事追诉程序、被处以行政处罚，或因乙方的劣迹行为、负面新闻导致中国国家新闻出版广电总局等行业主管部门禁止、限制乙方从事演艺事业、商务事务或禁止、限制涉及乙方的任何活动、内容的，甲方有权单方书面通知乙方解除或终止本协议，因此给甲方造成损失的，乙方应赔偿甲方的损失。</p>
        <p>6.3本协议所述之“损失”均包括：直接损失、间接损失，以及为主张权利而支出的仲裁/诉讼费、律师费、交通费、通讯费等合理费用。</p>

        <h1>7.不可抗力</h1>
        <p>7.1本协议所称的“<strong>不可抗力</strong>”是指一切不能预见、不能避免并不能克服的客观情况，包括但不限于洪水、地震、飓风、火灾等自然灾害，战争、动乱、政府行为等重大社会事件，以及法律规定或其适用的变化。</p>
        <p>7.2因不可抗力致使任何一方部分或全部不能履行本协议的，遭受不可抗力的一方无需向另一方承担违约责任，但应及时以书面形式通知另一方，并在发出通知后的3日内向另一方提供不可抗力发生以及持续的充分、合法的证据材料。双方应就不可抗力立即进行协商，寻求一项双方认可的解决方案，尽力将不可抗力造成的不利影响降至最低。</p>
        <p>7.3如果不可抗力情况消失后，本协议仍有必要履行且具备继续履行的条件，双方应继续履行本协议；如果因不可抗力导致本协议没有必要或无法继续履行或者不可抗力事件或其影响持续超过30日双方仍未达成共同认可的解决方案的，本协议任何一方均有权提出解除本协议，且双方互不因此承担违约责任。</p>

        <h1>8.法律适用与争议解决</h1>
        <p class="text-bold text-underline">8.1本协议的订立、解释、履行和争议的解决均适用中国的法律；为免疑义，前述适用的法律中不包括香港、澳门、台湾的法律。</p>
        <p class="text-bold text-underline">8.2因本协议的成立、生效、履行与解释产生的一切争议，双方应首先友好协商解决；协商不成的，任何一方均有权向本协议签订地北京市朝阳区有管辖的人民法院提起诉讼。双方同意，本协议项下的争议由中国法院排他性管辖。</p>

        <h1>9.通知与送达</h1>
        <p>9.1除非本协议另有约定，一方履行本协议所需提供的文件资料、发出的通知应采用书面形式，选择专人递送、电子邮件或快递（带有跟踪及查询功能）寄送方式，并按本协议文首所载的联络信息送达。</p>
        <p>9.2通过专人递送的，自交付指定联系人之日视为有效送达；通过快递寄送的通知，应自寄出之日（快递单据显示的日期）起的第五日或实际签收之日（以时间较早的为准）视为有效送达；通过电子邮件发出的通知应自邮件进入对方数据电文系统时视为有效送达。</p>
        <p>9.3一方变更其任何联系地址、联系人、联系电话或电子邮箱等联络信息的均应提前以书面形式告知对方，否则按原联络信息送达即为有效送达。</p>

        <h1>10.生效及其他</h1>
        <p>10.1本协议未尽事宜，由双方另行协商确定并签订书面补充协议。补充协议与本协议具有同等法律效力，补充协议与本协议约定不一致的，应以补充协议约定为准。</p>
        <p class="text-bold text-underline">10.2未经一方事先书面同意，另一方不得将其在本协议项下的部分或全部权利义务转让给任何第三方；尽管有前述约定，甲方有权将其在本协议项下的部分或全部权利义务转让给其关联方，或将本协议项下的工作以转代理、分包等形式与第三方进行合作，但应书面通知乙方。</p>
        <p class="text-bold text-underline">10.3本协议经甲方盖章且乙方签字之日起生效。</p>
        <p>10.4本协议正本壹（1）式贰（2）份，双方各执壹（1）份，每份具有同等法律效力。</p>
    </div>
    <div class="content-footer">
        <div>
            <h2 class="line-height-50"><strong>甲方</strong>（盖章）：前锋锐吉（北京）传媒有限公司</h2>
            <h2 class="line-height-50">法定代表人/授权代表（签字）：</h2>
        </div>
        <div>
            <h2 class="line-height-50"><strong>乙方</strong>（签字）：</h2>
            <!--<h2 class="line-height-50">法定代表人/授权代表（签字）：</h2>-->
        </div>
    </div>
</div>
<?php if(!(empty($pact) || (($pact instanceof \think\Collection || $pact instanceof \think\Paginator ) && $pact->isEmpty()))): if($pact['states']==2): ?>
<footer class="footer sign_up" style="position:fixed">确认签约</footer>
<?php elseif($pact['states']==3): ?>
<footer class="footer" style="position:fixed">重新申请</footer>
<?php elseif($pact['states']==6): ?>
<footer class="footer" style="position:fixed">重新签约</footer>
<?php endif; endif; ?>
<script>
  $('.sign_up').click(function(){
     window.location.href='/index/sign/medal';
  });
</script>
</div>
</body>
</html>