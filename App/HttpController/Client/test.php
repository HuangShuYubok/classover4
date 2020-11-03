<?php
/**
 * FileName test.php
 * Created by PhpStorm
 * User: "Hsuyi"
 * Date: 2020/10/30 0030
 * Time: 上午 11:10
 */


$pid = pcntl_fork();
if($pid==0){
    //子进程
    //模拟发送邮件
    sleep(30);//发送邮件花费30秒
    exit(0);
}

pcntl_waitpid($pid,$status,WNOHANG);
echo "邮件发送中";