<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
use \think\Request;
class Sign extends Base
{
    //合作代理
    public function agency()
    {
      $request = Request::instance();
      //1代理协议 2独家协议 3肖像独家
      $ty = $request->only(['t'])['t'];
      $sid = Session::get('sid');
      if(!isset($sid)){
        $this ->assign('ty',$ty);
        return view();
      }
      //有sid查看用户是个人，工作室，经纪公司，认证通过可以跳转到相应合同
      $data['id']=$sid;
      $url = '/inter/star/startinfolook';
      $starinfo = request_post($url,$data);
      if($starinfo['data']['ifauth']==2){
        //查看是否有签约
        $pacrinfo = $this->con_datas();
        if(!empty($pacrinfo)){
          return view('/sign/transfer');
          // $this->redirect('/index/sign/pact_type');die;
        }
        //1个人 2工作室 3经纪公司        
        $signtype = $starinfo['data']['signtype'];
        if($signtype==1&&$ty==1){       //跳转到代理协议-个人
          return view('/contract/per_contract');
        }else if($signtype==1&&$ty==2){ //跳转到独家协议-个人
          return view('/contract/per_exclusive');
        }else if($signtype==1&&$ty==3){ //跳转到肖像独家-个人
          return view('/contract/per_photo');
        }else if($signtype==2&&$ty==1){ //跳转到代理协议-工作室
          return view('/contract/work_agency');
        }else if($signtype==2&&$ty==2){ //跳转到独家协议-工作室
          return view('/contract/work_exclusive');
        }else if($signtype==2&&$ty==3){ //跳转到肖像独家-工作室
          return view('/contract/work_photo');
        }else if($signtype==3&&$ty==1){ //跳转到代理协议-经纪公司
          return view('/contract/fir_agency');
        }else if($signtype==3&&$ty==2){ //跳转到独家协议-经纪公司
          return view('/contract/fir_exclusive');
        }else if($signtype==3&&$ty==3){ //跳转到肖像独家-经纪公司
          return view('/contract/fir_photo');
        }

      }else if($starinfo['data']['ifauth']==3 || $starinfo['data']['ifauth']==4 ){
        //跳转到认证结果页面
        // $this -> redirect('/index/sign/myinfo');
        return view('/sign/tra_auth');
      }
    }

    //我的页面
    public function myinfo()
    {
        $wx_userinfo = Session::get('wx_userinfo');
        $uid = $wx_userinfo['uid'];
        $mobile = $wx_userinfo['mobile'];
        $data['uid'] = $uid;
        $url = '/inter/star/startinfolook';
        $starinfo = request_post($url,$data);
        if($starinfo['status']==3){
          $this -> assign('wx_userinfo',$wx_userinfo);
          return view();
        }else{
          if($starinfo['data']['credtype']==3){
            $this->assign('statrinfo',$starinfo['data']);
            $this -> assign('wx_userinfo',$wx_userinfo);
            return view();
          }else{
            $this->assign('statrinfo',$starinfo['data']);
            //dd($starinfo['data']);
            $this -> assign('wx_userinfo',$wx_userinfo);
            return view('/sign/work_auth_result'); //工作室认证情况页面
          }
           
        }
    }

    //资料审核失败页面
    public function defeated()
    {
          $request = Request::instance();
          $id = $request->only(['sid'])['sid'];
          $url ='/inter/star/startinfolook';
          $data['id'] = $id;
          $res = request_post($url,$data);
          if($res['status']==1){
              $s['id'] = $res['data']['id'];
              $s['checkdesc'] = $res['data']['checkdesc'];
              $this->assign('s',$s);
              return view('msg');
          }
    }

    //个人-代理合同
    // public function per_contract()
    // {
    //   return view('/contract/per_contract');
    // }
    //工作室-代理合同
    // public function work_agency()
    // {
    //   return view('/contract/work_agency');
    // }

    //我的签约
    public function pact_type()
    {
      $pactinfo = $this -> con_datas();
     
      if(!$pactinfo){
        return view('/pacttype/no_pact');die;
      }
      $sinfo = $this ->selectinfo();
      $ty = $pactinfo['types'];//合同类型 1独家协议 2肖像独家 3代理协议
      $signtype = $sinfo['signtype'];
      $this-> assign('pact',$pactinfo);
      if($signtype==1&&$ty==3){       //跳转到代理协议-个人
        return view('/pacttype/agency_type');
      }else if($signtype==1&&$ty==1){ //跳转到独家协议-个人
        return view('/pacttype/excpre_type');
      }else if($signtype==1&&$ty==2){ //跳转到肖像独家-个人
        return view('/pacttype/phopre_type');
      }else if($signtype==2&&$ty==3){ //跳转到代理协议-工作室
        return view('/pacttype/workage_type');
      }else if($signtype==2&&$ty==1){ //跳转到独家协议-工作室
        return view('/pacttype/workexc_type');
      }else if($signtype==2&&$ty==2){ //跳转到肖像独家-工作室
        return view('/pacttype/workpho_type');
      }else if($signtype==3&&$ty==3){ //跳转到代理协议-经纪公司
        return view('/pacttype/firage_type');
      }else if($signtype==3&&$ty==1){ //跳转到独家协议-经纪公司
        return view('/pacttype/firexc_type');
      }else if($signtype==3&&$ty==2){ //跳转到肖像独家-经纪公司
        return view('/pacttype/firpho_type');
      }
    }

    //查看签约
    public function con_datas()
    {
      $sid = Session::get('sid');
      if($sid){
        $url = '/inter/star/agreelist';
        $data['sid'] = $sid;
        $res = request_post($url,$data);
        
        if($res['status']==1){
          return $res['data']['data'][0];
        }else{
          return 0;
        }
      }else{
        return 0;
      }

    }

    //查看是否有签约数据（暂时保留）
    public function con_data()
    {
      $sid = Session::get('sid');
      $url = '/inter/star/agreelist';
      $data['sid'] = $sid;
      $res = request_post($url,$data);
      if($res['status']==1){
        return 1;
      }else{
        return 0;
      }
    }
    //查看个人信息
    private function selectinfo()
    {
      $sid = Session::get('sid');
      if($sid){
        $url = '/inter/star/startinfolook';
        $data['id'] = $sid;
        $res = request_post($url,$data);
        return $res['data'];
      }else{
        return false;
      }

    }



    //个人签约表单
    public function sign_agency()
    {
      $types = $_GET['types'];
      $sid = Session::get('sid');
      $url = '/inter/star/startinfolook';
      $data['id'] = $sid;
      $res = request_post($url,$data);
      if($res['status']==1){
        $this->assign('types',$types);
        $this->assign('sinfo',$res['data']);
        return view();
      }
    }
    //工作室签约表单
    public function sign_work()
    {
      $types = $_GET['types'];
      $sid = Session::get('sid');
      $url = '/inter/star/startinfolook';
      $data['id'] = $sid;
      $res = request_post($url,$data);
      if($res['status']==1){
        $this->assign('types',$types);
        $this->assign('sinfo',$res['data']);
        return view();
      }
    }
    //经纪公司签约表单
    public function sign_fir()
    {
      $types = $_GET['types'];
      $sid = Session::get('sid');
      $url = '/inter/star/startinfolook';
      $data['id'] = $sid;
      $res = request_post($url,$data);
      if($res['status']==1){
        $this->assign('types',$types);
        $this->assign('sinfo',$res['data']);
        return view();
      }
    }

    //审核失败修改信息页面
    public function edit_pact()
    {
      $id = $_GET['id'];
      $url = '/inter/star/lookagree';
      $data['id'] = $id;
      $res = request_post($url,$data);
      if($res['status']==1){
        $sinfo = $this->selectinfo();
        $signtype = $sinfo['signtype'];
        $this->assign('pinfo',$res['data']);
        $this->assign('sinfo',$sinfo);
        if($signtype==1){
          return view('/edit/edit_per');
        }else if($signtype==2){
          return view('/edit/edit_work');
        }else if($signtype==3){
          return view('/edit/edit_fir');
        }
      }
    }

    //编辑合同资料
    public function editsign()
    {
      $data = $_POST;
      $data['states'] = 1;
      $url = '/inter/star/auditagree';
      $res = request_post($url,$data);
      return $res;
    }



    //提交签约数据
    public function signup()
    {
      $sid = Session::get('sid');

      $post_info = array_filter($_POST);
      $post_info['sid'] = $sid;
      $post_info['signfrom'] = 1;
      $post_info['states'] = 1; //资料审核状态
      $url = '/inter/star/addagree';
      $res = request_post($url,$post_info);
      if($res['status']==1){
        return array('msg'=>'ok','status'=>'1');
      }else{
        return array('msg'=>'申请失败!','status'=>'3');
      }
    }

    //合同详情页面
    public function contractinfo()
    {
      $sid = !empty(Session::get('sid'))?Session::get('sid'):'';
      if($sid){
        $url ='/inter/star/agreelist';
        $data['sid'] = $sid;
        $res = request_post($url,$data);
        // dd($res[status]);
        if($res['status']==1){
        $this->assign('contractinfo',$res['data']['data'][0]);
        }
      }else{
        $this->assign('contractinfo','');
      }
      return view();
    }

    //开始签约
    public function begin()
    {
      $flg = isset($_POST['flg'])?$_POST['flg'] : 1;
      $sid = !empty(Session::get('sid'))?Session::get('sid'):'';
      if($sid){
        $url ='/inter/star/agreelist';
        $data['sid'] = $sid;
        $res = request_post($url,$data);
        $cinfo = $res['data']['data'][0];
        $begindate = date("Y-m-d",time()); //签约时间
        $endtime = date("Y-m-d", strtotime("+".$cinfo['coopnum'] ."months", strtotime($begindate)));//合同结束日期
        $res = $this->selectinfo();
        $wquid = $res['wquid'];
        if($flg==1){
          $stampid = $res['stampid'];
        }else if($flg==2){
            //查询用户表信息
            $url = '/inter/index/userdetail';
            $uinfo = Session::get('wx_userinfo');
            $u['uid'] = $uinfo['uid'];
            $res = request_post($url,$u);
            if($res['status']==1){
              $stampid = $res['data'][0]['diystampid'];
            }
        }
        $url = 'https://api.youxingku.cn/signpact/genpact.php';
       //生成合同模板号和所需变量
       $wqdata = $this->createnum($cinfo,$begindate,$endtime);
        
       $res = get_api($url,$wqdata);
       if($res['status']==1){ 
        //发起签约
        $docid = $res['data']['docid'];
        $pacname = '优星库合同'; //需要更换
        $mytime = date('Y-m-d',(time()+864000));
        $url = 'https://api.youxingku.cn/signpact/beginsign.php';
        $begindata = array('docid'=>$docid,'docname'=>$pacname,'exptime'=>$mytime,'twouid'=>$wquid,'signkey'=>'乙 方');
        $res = get_api($url,$begindata);
        if($res['status']==1){
          //开始签约
					$url = 'https://api.youxingku.cn/signpact/signing.php';
					$dodata = array('docid'=>$docid,'uid'=>$wquid,'stamps'=>$stampid);
					$res = get_api($url,$dodata);
					 if($res['status']==1){
            //下载草稿合同
            $url = 'https://api.youxingku.cn/signpact/downpact.php';
            $down = array('uid'=>'1','docid'=>$docid);
            $res = get_api($url,$down);
            $caogao = $res['data']['fname'];
           
            $begindate = strtotime($begindate);
            $endtime = strtotime($endtime);
						$addhe = array('id'=>$cinfo['id'],'documentid'=>$docid,'drafturl'=>$caogao,'states'=>5,'begindate'=>$begindate,'diedate'=>$endtime);
            //更新数据库
           $url = '/inter/star/auditagree';
           $res = request_post($url,$addhe);
           return $res; //成功
					 }else{
             return $res;
           }
				}else{
          return $res;
        }
       }else{
         return $res;
       }
      }
    }

    //签章页面
    public function medal()
    {
      //查询明星信息
      $myinfo = $this->selectinfo();
      if(!$myinfo['wquid']){
         $mobile = Session::get('wx_userinfo')['mobile'];
         $sid = $myinfo['id'];
         $a = $this->createwquid($myinfo,$mobile,$sid);
           
         $myinfo = $this->selectinfo();
      }
      if(!$myinfo['stampurl']){
        //下载章图片
        $url = 'https://api.youxingku.cn/signpact/downstamp.php';
        $data['uid'] = $myinfo['wquid'];
        $data['stampid'] = $myinfo['stampid'];
        $info = get_api($url,$data);
        if($info['status']==1){
          $png = $info['data']['fname'];
          $url = '/inter/star/startinfoedit';
          $eds['id'] = $myinfo['id'];
          $eds['stampurl'] = $png;
          $res = request_post($url,$eds);
          $myinfo = $this->selectinfo();
        }
      }
      //查询用户表信息
      $url = '/inter/index/userdetail';
      $uinfo = Session::get('wx_userinfo'); 
      $u['uid'] = $uinfo['uid'];
      $res = request_post($url,$u);
      if($res['status']==1){
        if($res['data'][0]['diystampurl']){
          $this -> assign('diystampurl',$res['data'][0]['diystampurl']);
        }else{
          $this -> assign('diystampurl','');
        }
      }

      $this->assign('myinfo',$myinfo);
      return view();
    }

    //上传自定义签章
    public function mystamp()
    {
      $stamp = $_POST['stamp'];
      $wquid = $_POST['wquid'];
      //下载签章
      $url = 'https://api.youxingku.cn/signpact/downstamp.php';
      $data['uid'] = $wquid;
      $data['stampid'] = $stamp;
      $info = get_api($url,$data);
      if($info['status']==1){
        $png = $info['data']['fname'];
        $url = '/inter/index/useredit';
        $uinfo = Session::get('wx_userinfo'); 
        $editu['uid'] = $uinfo['uid'];
        $editu['diystampid'] = $stamp;
        $editu['diystampurl'] = $png;
        $res = request_post($url,$editu);
        if($res['status']==1){
          return array('status'=>1,'msg'=>'成功');
        }else{
          return array('status'=>3,'msg'=>'失败');
        }
      }else{
        return array('status'=>3,'msg'=>'失败');
      }
    }


    //创建文签uid和印章
    private function createwquid($data,$mobile,$sid)
    {
      if($data['credtype']==3){
        $url = 'https://api.youxingku.cn/signpact/regperson.php';
         $wquid = 'u'.$mobile;
        $data = array('uname'=>$data['oldname'],'uid'=>$wquid,'uphone'=>$mobile,'ucode'=>$data['idno']);
        $res = get_api($url,$data);
        if($res['status']==1){
          //生成签名
          $url = 'https://api.youxingku.cn/signpact/genpersonstamp.php';
          $postdata['uid'] = $wquid;
          $re = get_api($url,$data);
          $stampid = $re['data']['stamp'];
          $wqinfo = array('msg'=>'ok','status'=>'1');

          //写入数据库
          $url ='/inter/star/startinfoedit';
          $edata['id'] = $sid;
          $edata['wquid'] = $wquid;
          $edata['stampid'] = $stampid;
          $res = request_post($url,$edata);
          if($res['status']==1){
            return $wqinfo;
          }else{
            return array('msg'=>'生成公章失败！','status'=>'3');
          }
        }else{
          return array('msg'=>$res['msg'],'status'=>3);
        }

      }else{

        $url = 'https://api.youxingku.cn/signpact/regbiz.php';
        $wquid = 'b'.$mobile;
        $data = array('bizid'=>$wquid,'bizname'=>$data['bizname'],'bizcode'=>$data['compno'],'workname'=>$data['oldname'],'workphone'=>$mobile,'workid'=>$data['idno']);
        $res =get_api($url,$data);
          if($res['status']==1){
          //生成签名
          $url = 'https://api.youxingku.cn/signpact/genbizstamp.php';
          $postdata['uid'] = $wquid;
          $re =get_api($url,$postdata);
          $stampid = $re['data']['stamp'];
          $wqinfo = array('msg'=>'ok','status'=>'1');

          //写入数据库
          $url ='/inter/star/startinfoedit';
          $edata['id'] = $sid;
          $edata['wquid'] = $wquid;
          $edata['stampid'] = $stampid;
          $res = request_post($url,$edata);
          if($res['status']==1){
            return $wqinfo;
          }else{
            return array('msg'=>'生成公章失败！','status'=>'3');
          }
        }else{
          return array('msg'=>$res['msg'],'status'=>3);
        }
      }

    }

    //生成合同号
    private function createnum($cinfo,$begindate,$endtime)
    {
      $sinfo = $this ->selectinfo();
      $ty = $cinfo['types'];//合同类型 1独家协议 2肖像独家 3代理协议
      $signtype = $sinfo['signtype'];
      if($signtype==1&&$ty==3){       //代理协议-个人
        $vars = "[yifang]:".$cinfo['starname'].",[lianxidizhi]:".$cinfo['workaddr'].",[lianxidianhua]:".$cinfo['worktel'].",[dianziyouxiang]:".$cinfo['workemail'].",[yirenxingming]:".$cinfo['starname'].",[yiming]:".$cinfo['actorname'].",[zhengjianhaoma]:".$cinfo['cardnum'].",[hezuoqixian]:".$cinfo['coopnum'].",[hezuokaishiriqi]:".$begindate.",[hezuozhongzhiriqi]:".$endtime.",[jfwqsrbl]:".$cinfo['jfwqsrbl'].",[yfwqsrbl]:".$cinfo['yfwqsrbl'].",[jfsrbl]:".$cinfo['jfsrbl'].",[yfsrbl]:".$cinfo['yfsrbl'].",[jfsrbl2]:".$cinfo['jfsrbl2'].",[yfsrbl2]:".$cinfo['yfsrbl2'].",[yfkhmc]:".$cinfo['openname'].",[yfkhyh]:".$cinfo['openbank'].",[yfyhzh]:".$cinfo['openacct'].",[guoji]:".$cinfo['citizenship'].",[zhengjianleixing]:".$cinfo['cardtype'];
        return $wqdata = array('temid'=>1002,'vars'=>$vars);
      }else if($signtype==1&&$ty==1){ //独家协议-个人
        $vars = "[yifang]:".$cinfo['starname'].",[lianxidizhi]:".$cinfo['workaddr'].",[lianxidianhua]:".$cinfo['worktel'].",[dianziyouxiang]:".$cinfo['workemail'].",[yirenxingming]:".$cinfo['starname'].",[yiming]:".$cinfo['actorname'].",[zhengjianhaoma]:".$cinfo['cardnum'].",[hezuoqixian]:".$cinfo['coopnum'].",[hezuokaishiriqi]:".$begindate.",[hezuozhongzhiriqi]:".$endtime.",[jfwqsrbl]:".$cinfo['jfwqsrbl'].",[yfwqsrbl]:".$cinfo['yfwqsrbl'].",[jfsrbl]:".$cinfo['jfsrbl'].",[yfsrbl]:".$cinfo['yfsrbl'].",[yfkhmc]:".$cinfo['openname'].",[yfkhyh]:".$cinfo['openbank'].",[yfyhzh]:".$cinfo['openacct'].",[guoji]:".$cinfo['citizenship'].",[zhengjianleixing]:".$cinfo['cardtype'];
        return $wqdata = array('temid'=>1005,'vars'=>$vars);
      }else if($signtype==1&&$ty==2){ //肖像独家-个人

        $vars = "[yifang]:".$cinfo['starname'].",[lianxidizhi]:".$cinfo['workaddr'].",[lianxidianhua]:".$cinfo['worktel'].",[dianziyouxiang]:".$cinfo['workemail'].",[yirenxingming]:".$cinfo['starname'].",[yiming]:".$cinfo['actorname'].",[zhengjianhaoma]:".$cinfo['cardnum'].",[hezuoqixian]:".$cinfo['coopnum'].",[hezuokaishiriqi]:".$begindate.",[hezuozhongzhiriqi]:".$endtime.",[jfwqsrbl]:".$cinfo['jfwqsrbl'].",[yfwqsrbl]:".$cinfo['yfwqsrbl'].",[jfsrbl]:".$cinfo['jfsrbl'].",[yfsrbl]:".$cinfo['yfsrbl'].",[yfkhmc]:".$cinfo['openname'].",[yfkhyh]:".$cinfo['openbank'].",[yfyhzh]:".$cinfo['openacct'].",[guoji]:".$cinfo['citizenship'].",[zhengjianleixing]:".$cinfo['cardtype'].",[jfwqcdbl]:".$cinfo['jfwqcdbl'].",[yfwqcdbl]:".$cinfo['yfwqcdbl'].",[jfsrbl2]:".$cinfo['jfsrbl2'].",[yfsrbl2]:".$cinfo['yfsrbl2'];
        return $wqdata = array('temid'=>1009,'vars'=>$vars);
      
      }else if($signtype==2&&$ty==3){ //代理协议-工作室
        $vars = "[yifang]:".$cinfo['partyb'].",[touziren]:".$cinfo['investor'].",[lianxidizhi]:".$cinfo['workaddr'].",[lianxiren]:".$cinfo['workman'].",[lianxidianhua]:".$cinfo['worktel'].",[dianziyouxiang]:".$cinfo['workemail'].",[yirenxingming]:".$cinfo['starname'].",[yiming]:".$cinfo['actorname'].",[zhengjianhaoma]:".$cinfo['cardnum'].",[hezuoqixian]:".$cinfo['coopnum'].",[hezuokaishiriqi]:".$begindate.",[hezuozhongzhiriqi]:".$endtime.",[jfwqsrbl]:".$cinfo['jfwqsrbl'].",[yfwqsrbl]:".$cinfo['yfwqsrbl'].",[jfsrbl]:".$cinfo['jfsrbl'].",[yfsrbl]:".$cinfo['yfsrbl'].",[jfsrbl2]:".$cinfo['jfsrbl2'].",[yfsrbl2]:".$cinfo['yfsrbl2'].",[yfkhmc]:".$cinfo['openname'].",[yfkhyh]:".$cinfo['openbank'].",[yfyhzh]:".$cinfo['openacct'];
        return $wqdata = array('temid'=>1003,'vars'=>$vars);
      }else if($signtype==2&&$ty==1){ //独家协议-工作室
        $vars = "[yifang]:".$cinfo['partyb'].",[touziren]:".$cinfo['investor'].",[lianxidizhi]:".$cinfo['workaddr'].",[lianxiren]:".$cinfo['workman'].",[lianxidianhua]:".$cinfo['worktel'].",[dianziyouxiang]:".$cinfo['workemail'].",[yirenxingming]:".$cinfo['starname'].",[yiming]:".$cinfo['actorname'].",[zhengjianhaoma]:".$cinfo['cardnum'].",[hezuoqixian]:".$cinfo['coopnum'].",[hezuokaishiriqi]:".$begindate.",[hezuozhongzhiriqi]:".$endtime.",[jfwqsrbl]:".$cinfo['jfwqsrbl'].",[yfwqsrbl]:".$cinfo['yfwqsrbl'].",[jfsrbl]:".$cinfo['jfsrbl'].",[yfsrbl]:".$cinfo['yfsrbl'].",[yfkhmc]:".$cinfo['openname'].",[yfkhyh]:".$cinfo['openbank'].",[yfyhzh]:".$cinfo['openacct'].",[guoji]:".$cinfo['citizenship'].",[jiesuanriqi]:10";
        return $wqdata = array('temid'=>1006,'vars'=>$vars);
      }else if($signtype==2&&$ty==2){ //肖像独家-工作室
        $vars = "[yifang]:".$cinfo['partyb'].",[touziren]:".$cinfo['investor'].",[lianxidizhi]:".$cinfo['workaddr'].",[lianxiren]:".$cinfo['workman'].",[lianxidianhua]:".$cinfo['worktel'].",[dianziyouxiang]:".$cinfo['workemail'].",[yirenxingming]:".$cinfo['starname'].",[zhengjianhaoma]:".$cinfo['cardnum'].",[hezuoqixian]:".$cinfo['coopnum'].",[hezuokaishiriqi]:".$begindate.",[hezuozhongzhiriqi]:".$endtime.",[jfwqsrbl]:".$cinfo['jfwqsrbl'].",[yfwqsrbl]:".$cinfo['yfwqsrbl'].",[jfsrbl]:".$cinfo['jfsrbl'].",[yfsrbl]:".$cinfo['yfsrbl'].",[yfkhmc]:".$cinfo['openname'].",[yfkhyh]:".$cinfo['openbank'].",[yfyhzh]:".$cinfo['openacct'].",[guoji]:".$cinfo['citizenship'].",[jfwqcdbl]:".$cinfo['jfwqcdbl'].",[yfwqcdbl]:".$cinfo['yfwqcdbl'];
        return $wqdata = array('temid'=>1010,'vars'=>$vars);
      }else if($signtype==3&&$ty==3){ //代理协议-经纪公司
        $vars = "[yifang]:".$cinfo['partyb'].",[touziren]:".$cinfo['investor'].",[lianxidizhi]:".$cinfo['workaddr'].",[lianxiren]:".$cinfo['workman'].",[lianxidianhua]:".$cinfo['worktel'].",[dianziyouxiang]:".$cinfo['workemail'].",[hezuoqixian]:".$cinfo['coopnum'].",[hezuokaishiriqi]:".$begindate.",[hezuozhongzhiriqi]:".$endtime.",[jfwqsrbl]:".$cinfo['jfwqsrbl'].",[yfwqsrbl]:".$cinfo['yfwqsrbl'].",[jfsrbl]:".$cinfo['jfsrbl'].",[yfsrbl]:".$cinfo['yfsrbl'].",[yfkhmc]:".$cinfo['openname'].",[yfkhyh]:".$cinfo['openbank'].",[yfyhzh]:".$cinfo['openacct'].",[jfsrbl2]:".$cinfo['jfsrbl2'].",[yfsrbl2]:".$cinfo['yfsrbl2'];
        return $wqdata = array('temid'=>1004,'vars'=>$vars);
      }else if($signtype==3&&$ty==1){ //独家协议-经纪公司
        $vars = "[yifang]:".$cinfo['partyb'].",[lianxidizhi]:".$cinfo['workaddr'].",[lianxiren]:".$cinfo['workman'].",[lianxidianhua]:".$cinfo['worktel'].",[dianziyouxiang]:".$cinfo['workemail'].",[hezuoqixian]:".$cinfo['coopnum'].",[hezuokaishiriqi]:".$begindate.",[hezuozhongzhiriqi]:".$endtime.",[jfwqsrbl]:".$cinfo['jfwqsrbl'].",[yfwqsrbl]:".$cinfo['yfwqsrbl'].",[jfsrbl]:".$cinfo['jfsrbl'].",[yfsrbl]:".$cinfo['yfsrbl'].",[yfkhmc]:".$cinfo['openname'].",[yfkhyh]:".$cinfo['openbank'].",[yfyhzh]:".$cinfo['openacct'];
        return $wqdata = array('temid'=>1027,'vars'=>$vars);


      }else if($signtype==3&&$ty==2){ //肖像独家-经纪公司
        $vars = "[yifang]:".$cinfo['partyb'].",[touziren]:".$cinfo['investor'].",[lianxidizhi]:".$cinfo['workaddr'].",[lianxiren]:".$cinfo['workman'].",[lianxidianhua]:".$cinfo['worktel'].",[dianziyouxiang]:".$cinfo['workemail'].",[hezuoqixian]:".$cinfo['coopnum'].",[hezuokaishiriqi]:".$begindate.",[hezuozhongzhiriqi]:".$endtime.",[jfwqsrbl]:".$cinfo['jfwqsrbl'].",[yfwqsrbl]:".$cinfo['yfwqsrbl'].",[jfsrbl]:".$cinfo['jfsrbl'].",[yfsrbl]:".$cinfo['yfsrbl'].",[yfkhmc]:".$cinfo['openname'].",[yfkhyh]:".$cinfo['openbank'].",[yfyhzh]:".$cinfo['openacct'].",[jfsrbl2]:".$cinfo['jfsrbl2'].",[yfsrbl2]:".$cinfo['yfsrbl2'].",[jfwqcdbl]:".$cinfo['jfwqcdbl'].",[yfwqcdbl]:".$cinfo['yfwqcdbl'];
        return $wqdata = array('temid'=>1011,'vars'=>$vars);
      }
    }
}
