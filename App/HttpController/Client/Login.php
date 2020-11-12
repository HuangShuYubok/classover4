<?php
/**
 * FileName Login.php
 * Created by PhpStorm
 * User: "Hsuyi"
 * Date: 2020/10/30 0030
 * Time: 上午 11:10
 */
namespace App\HttpController\Client;

use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\FastCache\Cache;
use App\Model\UserModel;

class Login extends Controller
{
    #用户登录
    public function handle()
    {
        $request = $this->request();
        $RequestParam = $request->getRequestParam();
//        var_dump($request);
        #判断请求是否携带手机号
        if(isset($RequestParam['phone'])){
            $code = Cache::getInstance()->get($RequestParam['phone']);
        }else{
            #不带手机号返回
            $this->writeJson(500,'请输入手机号');
            return false;
        }

        #判断是否已经存在验证码，与验证码是否正确
        if($code && $code == $RequestParam['code']){
            $user = UserModel::create()->get(['phone'=>$RequestParam['phone']]);

            if($user){
                #旧用户登录
                UserModel::create()->update([
                    'phone' =>   $RequestParam['phone']
                ],['phone'=>$RequestParam['phone']]);
            }else{
                #新用户登录
                UserModel::create()->data([
                    'phone' =>   $RequestParam['phone']
                ],false)->save();
            }

            $this->writeJson(200,'ok',$user);
        }else{
            $this->writeJson(500,'验证码错误');
        }

    }

    #用户登录获取验证码
    public function smscode()
    {
        $request = $this->request();
        $RequestParam = $request->getRequestParam();

        #判断请求是否携带手机号
        if(isset($RequestParam['phone'])){
            $code = Cache::getInstance()->get($RequestParam['phone']);
        }else{
            #不带手机号返回
            $this->writeJson(500,'请输入手机号');
            return false;
        }
        #生成验证码
        $code = mt_rand(10000,99999);
        //存进缓存
        Cache::getInstance()->set($RequestParam['phone'],$code,300);
        Cache::getInstance()->set($code,1,60);

        $this->writeJson(200,$code);
    }

}