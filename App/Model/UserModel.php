<?php
/**
 * FileName UserModel.php
 * Created by PhpStorm
 * User: "Hsuyi"
 * Date: 2020/11/3 0003
 * Time: 下午 6:33
 */

namespace App\Model;

use EasySwoole\ORM\Utility\Schema\Table;
use EasySwoole\ORM\AbstractModel;
use App\Model\Teacher;

class UserModel extends AbstractModel
{
    protected $tableName = "classover_user";
    protected $autoTimeStamp = true;
    protected $createTime = 'create_at';
    protected $updateTime = 'login_at';
    /**
     * 表的获取
     * 此处需要返回一个 EasySwoole\ORM\Utility\Schema\Table
     * @return Table
     */
    public function schemaInfo(bool $isCache = true): Table
    {
        $table = new Table($this->tableName);
        $table->colInt('id')->setIsPrimaryKey(true);
        $table->colChar('username', 20);
        $table->colChar('headimg', 255);
        $table->colInt('sex',1);
        $table->colChar('phone',20);
        $table->colChar('identity',20);
        $table->colChar('create_at',20);
        $table->colChar('login_at',20);
        return $table;
    }

    public function teacher()
    {
        return $this->hasMany(Teacher::class,function($builder){
        },'id','userId');
    }

    protected function getSexAttr($value, $data)
    {
        $sex = [0=>'未知',1=>'男',2=>'女'];
        return $sex[$value];
    }
}