<?php
/**
 * FileName Index.php
 * Created by PhpStorm
 * User: "Hsuyi"
 * Date: 2020/10/28 0028
 * Time: 下午 5:42
 */

namespace App\HttpController\Client;

use EasySwoole\Http\AbstractInterface\Controller;

class Index extends Controller
{
    private $userId;

    //判断登录 参数为字符串或者空类型，返回值必须为bool
    protected function onRequest(?string $action): ?bool
    {
        if(User::login()){//伪代码，模拟现在已经查询连接数据库，进行登录判断
            return true;
        }
        return parent::onRequest($action);
    }

    /*
     * 产品展示页面
     */
    public function product()
    {
        //假设这是一段数据库查询出来的数据
        $data = ['id'=>1,'title'=>'测试产品'];
        $this->writeJson(500,$data,"ok");
    }

}