<?php
/**
 * FileName Hello.php
 * Created by PhpStorm
 * User: "Hsuyi"
 * Date: 2020/10/28 0028
 * Time: 下午 5:17
 */

namespace App\HttpController;

use EasySwoole\Http\AbstractInterface\Controller;

class Hello extends Controller
{
    function index()
    {
        echo "hello world!!!";
    }
}