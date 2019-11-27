<?php
/**
 * Description: PhpStorm.
 * Author: momo
 * Date: 2019/11/27
 * Copyright: 风雷文化
 */

namespace app\push\controller;

use GatewayWorker\Register;
use Workerman\Worker;

class Sregister
{
    public function __construct(){
        // register 服务必须是text协议
        $register = new Register('text://0.0.0.0:1238');

        // 如果不是在根目录启动，则运行runAll方法
        if(!defined('GLOBAL_START'))
        {
            Worker::runAll();
        }
    }
}