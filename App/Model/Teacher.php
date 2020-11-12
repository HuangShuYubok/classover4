<?php
/**
 * FileName Teacher.php
 * Created by PhpStorm
 * User: "Hsuyi"
 * Date: 2020/11/4 0004
 * Time: 上午 10:37
 */

namespace App\Model;

use EasySwoole\ORM\Utility\Schema\Table;
use EasySwoole\ORM\AbstractModel;

class Teacher extends AbstractModel
{
    protected $tableName = "classover_teacher";

    /**
     * 表的获取
     * 此处需要返回一个 EasySwoole\ORM\Utility\Schema\Table
     * @return Table
     */
    public function schemaInfo(bool $isCache = true): Table
    {
        $table = new Table($this->tableName);
        $table->colInt('id')->setIsPrimaryKey(true);
        $table->colInt('userId', 11);
        $table->colInt('institutionId', 11);
        $table->colChar('date_birth',20);
        $table->colChar('mark');
        $table->colChar('finish_school',64);
        $table->colChar('major',64);
        $table->colChar('create_time',20);
        return $table;
    }
}