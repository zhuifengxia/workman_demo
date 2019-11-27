<?php
/**
 * Description: PhpStorm.
 * Author: momo
 * Date: 2019/11/26
 * Copyright: 风雷文化
 */
namespace app\index\controller;
use GatewayWorker\Lib\Db;
use GatewayWorker\Lib\Gateway;

class Push
{
    public function hello()
    {
        $config_name="db1";
        $db1=Db::instance($config_name);
        $data=$db1->select("*")
            ->from("work_users")
            ->where("id=1")
            ->row();
        dump($db1);
        exit;
    }
    public function BindClientId ()
    {
        $client_id = input('client_id');
        $nickname = input('nickname');
        // 设置GatewayWorker服务的Register服务ip和端口，请根据实际情况改成实际值
        Gateway::$registerAddress = '127.0.0.1:1238';
        //增加到数据库
        $data=db('work_users')
            ->where('nick_name',$nickname)
            ->where('client_id',$client_id)
            ->find();
        if($data){
            //已经存在
            $bindUid=$data["id"];
        }else{
            $insert=[
                "nick_name"=>$nickname,
                "client_id"=>$client_id
            ];
            $bindUid=db('work_users')
                ->insertGetId($insert);
        }
        // 假设用户已经登录，用户uid和群组id在session中
        // client_id与uid绑定
        Gateway::bindUid($client_id, $bindUid);
        // 加入某个群组（可调用多次加入多个群组）
        // Gateway::joinGroup($client_id, $group_id);
    }

    public function AjaxSendMessage ()
    {
        $message = input("message");
        // 设置GatewayWorker服务的Register服务ip和端口，请根据实际情况改成实际值
        Gateway::$registerAddress = '127.0.0.1:1238';

        GateWay::sendToAll($message);
        Gateway::sendToUid("7f0000010b5700000003","only");
    }

}