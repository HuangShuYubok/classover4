<?php
/**
 * FileName Base.php
 * Created by PhpStorm
 * User: "Hsuyi"
 * Date: 2020/11/3 0003
 * Time: 上午 10:44
 */

namespace App\HttpController\Client;

use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\Session\Session;
use EasySwoole\Mysqli\QueryBuilder;

use EasySwoole\Mysqli\Client;

class Base extends Controller
{
    protected $client;
    //判断登录 参数为字符串或者空类型，返回值必须为bool
    protected function onRequest(?string $action): ?bool
    {
//        if(Session::getInstance()->get('phone')){
//            var_dump(Session::getInstance()->get('phone'));
//        }else{
//            echo "需要登录";
//        }

        return true;

    }

}