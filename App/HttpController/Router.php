<?php
/**
 * FileName Router.php
 * Created by PhpStorm
 * User: "Hsuyi"
 * Date: 2020/10/28 0028
 * Time: 下午 5:12
 */
namespace App\HttpController;

use EasySwoole\Http\AbstractInterface\AbstractRouter;
use FastRoute\RouteCollector;

class Router extends AbstractRouter
{
    public function initialize(RouteCollector $routeCollector)
    {
        $routeCollector->get('/Client/User','/Client/User/getFind');
        $routeCollector->post('/Client/User','/Client/User/userUpdate');
        $routeCollector->post('/Client/Login','/Client/Login/handle');#登录
        $routeCollector->get('/Client/smscode','/Client/Login/smscode');#获取登录验证码
    }

}