<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
use \think\Request;
use Libs\Wechat_accredit;
class Userinfo extends Controller{

  public function login()
  {
      //微信code
      $code = !empty($_GET['code'])? $_GET['code'] : '';
      $appid = config('appid');
      $appsecret = config('appsecret');
      $redirect_uri = config('redirect_uri');
      $wechat = new Wechat_accredit($appid,$appsecret,$redirect_uri);
      $info = $wechat -> getAccessToken($code);
      if($info){
        $openid = $info['openid'];
        $access_token = $info['access_token'];
      }
      $wechatinfo = $wechat -> get_user_info($access_token,$openid);
      if($wechatinfo){
        //之后换成unionid
        // $wxid = $wechatinfo['unionid'];
        $url = '/inter/index/userdetail';
        // $wxid = $wechatinfo['openid'];
        $wxid = rand(111111,999999);
        
        $data['wxpcopenid'] = $wxid;
        $sinfo = request_post($url,$data);
        if($sinfo['msg']=='ok'){
          $uinfo = $sinfo['data'];
          $wx_userinfo['uid'] = $sinfo['data'][0]['id'];
          $wx_userinfo['mobile'] = $sinfo['data'][0]['mobile'];
          Session::set('wx_userinfo',$wx_userinfo);
          //根据uid查明星信息
          $data['uid'] = $wx_userinfo['uid'];
          $url = '/inter/star/startinfolook';
          $starinfo = request_post($url,$data);
          if($starinfo['msg']=='ok'){
            $sid = $starinfo['data']['id'];
            Session::set('sid',$sid);
            //跳转到目标地址
            $url_goal = Session::get('url_goal');
            $this -> redirect($url_goal);
          }else{
            $url_goal = Session::get('url_goal');
            $this -> redirect($url_goal);
          }

        }else{
          Session::set('openid',$wxid);
          $this -> redirect('/index/userinfo/mylogin');
        }
      }
  }
  public function mylogin()
  {
    return view();
  }
  //获取验证码
  public function getcode()
  {
    $mobile = input('mobile');
    $authcode = input('authcode');
    $url = '/aliyun/regcode.php';
    $data['mobile'] = $mobile;
    $data['authcode'] = $authcode;
    $cinfo = request_post($url,$data);
    if($cinfo['msg']=='ok'){
      return true;
    }else{
      return false;
    }
  }

  //用户注册
  public function binding()
  {
      $data = !empty($_POST)?$_POST:'';
      if(!$data){
        return false;
      }
      $url ='/inter/index/register';
      $res = request_post($url,$data);
       if($res['status']==1){
          $id = $res['data']['id'];
          $mobile = $data['mobile'];
          $wx_userinfo['uid'] = $id;
          $wx_userinfo['mobile'] = $mobile;
           Session::set('wx_userinfo',$wx_userinfo);
           return 1;
       }else{
           return 0;
       }
  }

  //查询有没有填写信息
  public function getstarinfo()
  {
    $sign['signtype'] = $_POST['signtype']; //签约者类型
    $sign['ctype'] = '3'; //合同类型
    Session::set('sign',$sign);

    $uid = Session::get('wx_userinfo');
    $url = '/inter/star/startinfolook';
    $data['uid'] = $uid['uid'];
    $starinfo = request_post($url,$data);
    if($starinfo['status']==1){
      return 1;
    }else{
      return 2;
    }

  }

  //个人认证页面
  public function auth()
  {
    return view();
  }

  //工作室认证页面
  public function work_auth()
  {
    $signtype = $_GET['signtype'];
    $this->assign('signtype',$signtype);
    return view();
  }


  //添加认证信息
  public function addauth()
  {
    $info = $_POST;
    $info = array_filter($info);
    $uid = Session::get('wx_userinfo');
    $url = '/inter/star/starinfoadd';
    $info['ifauth'] = 3;
    $info['uid'] = $uid['uid'];
    $res = request_post($url,$info);
    Session::set('sid',$res['data']['id']);
    if($res['status']==1){
      return 1;
    }else{
     return 0;
    }
  }

  //编辑认证信息
  public function edit_auth()
  {
    $id = $_GET['id'];
    $url = '/inter/star/startinfolook';
    $data['id'] = $id;
    $res = request_post($url,$data);
    $this->assign('info',$res['data']);
    if(isset($_GET['flg'])&&$_GET['flg']==1){
      return view('/edit/edit_pro_auth');
    }
    return view('/edit/edit_work_auth');
  }

  public function doeditauth()
  {
    $data = $_POST;
    $data = array_filter($data);
    $data['ifauth'] = 3;
    $url = '/inter/star/startinfoedit';
    $res = request_post($url,$data);
    if($res['status']==1){
      return 1;
    }else{
      return 0;
    }
  }

  //清除session
  public function clearsession()
  {
      $res = Session::clear();
      echo $res;
  }





















}
