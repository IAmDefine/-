<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
use \think\Request;
use Libs\Jssdk;
class Share extends Controller{

  private $signwx;

  protected function _initialize(){
   $appid = config('appid');
   $appsecret = config('appsecret');
   $jssdk = new JSSDK($appid,$appsecret);
   $this-> signwx = $jssdk->getSignPackage();
  
  }

  public function index()
  {
   //dd($this->signwx);
   $this -> assign('wxinfo',$this->signwx);
    return view();
  }

}
