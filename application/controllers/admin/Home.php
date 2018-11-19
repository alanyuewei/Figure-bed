<?php
/**
 * Created by PhpStorm.
 * User: 皮皮赖（https://www.52bz.la）
 * Date: 2018/11/20 0020
 * Time: 5:08
 */

use app\controllers\Common;

class Home extends Common
{
    public function index()
    {
        $login_on =  $this->exist_session('user');
        $ret = $login_on ? '登录成功' : "登录失败";
        echo $ret;
    }
}