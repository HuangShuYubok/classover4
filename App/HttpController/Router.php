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
        $routeCollector->get('/main','/Client/Index/main');
        $routeCollector->get('/hello','/Client/Index/hello');
    }
}