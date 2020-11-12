<?php
/**
 * FileName Index.phpp * Created by PhpStorm
 * User: "Hsuyi"
 * Date: 2020/10/28 0028
 * Time: 下午 5:42
 */

namespace App\HttpController\Client;

use EasySwoole\Http\AbstractInterface\Controller;
use App\HttpController\Client\Base;


class Index extends Base
{
    private $userId;


    /*
     * 产品展示页面
     */
    public function main()
    {
        //假设这是一QueryBuilder段数据库查询出来的数据

        $model = User::create()->get(1);
        $teacher = $model->teacher();

        var_dump($teacher);

        $this->writeJson(300,$teacher,"ok");
    }

}