<?php
/**
 * 配置
 * User: 皮皮赖（https://www.52bz.la）
 * Date: 2018/11/9 0009
 * Time: 23:15
 */
namespace app\admin\controllers;

use app\controllers\Common;

class Confingdb extends Common
{
    public function db()
    {
        //账号
        $confing['user'] = "admin";
        //密码
        $confing['pass'] = "qwe123qwe";

        return $confing;
    }
}
