<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
use \think\Request;
class Binduser extends Controller
{
    //合作代理
    public function bind()
    {
      return view();
    }

    public function binduser()
    {
      $data['mobile'] = $_POST['mobile'];
      $data['pass'] = $_POST['pass'];
      $weid = $_POST['openid'];
      $url = '/inter/index/login';
      $res = request_post($url,$data);
      if($res['status']==1){
        //开始绑定
        $url = '/inter/index/useredit';
        $edit['uid'] = $res['data']['id'];
        $edit['wxpcopenid'] = $weid;
        $res = request_post($url,$edit);
        if($res['status']==1){
          return array('status'=>1,'msg'=>'绑定成功');
        }else{
          return array('status'=>2,'msg'=>'绑定失败');
        }
      }else{
        return array('status'=>3,'msg'=>'账号或密码错误！');
      }
    }


}
