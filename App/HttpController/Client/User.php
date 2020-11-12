<?php
/**
 * FileName UserModel.php
 * Created by PhpStorm
 * User: "Hsuyi"
 * Date: 2020/11/11 0011
 * Time: 上午 9:24
 */

namespace App\HttpController\Client;


use App\HttpController\Client\Base;
use App\Model\UserModel;

class User extends Base
{

    public function getFind()
    {
        $RequestParam = $this->request()->getRequestParam();
        $result = UserModel::create()->get($RequestParam['id']);
        $this->writeJson(200,$result);
    }

    public function userUpdate()
    {
        $Parsedbody = $this->request()->getParsedBody();
        $res = UserModel::create()->update($Parsedbody, ['id' => $Parsedbody['id']]);
        $user = UserModel::create()->get($Parsedbody['id']);
        $this->writeJson(200,$user,$res);
    }

    function onException(\Throwable $throwable): void
    {
        var_dump($throwable->getMessage());
    }
}