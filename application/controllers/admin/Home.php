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
    //判断登陆
    public function login_on()
    {
        $login_on = $this->exist_session($_SESSION['user']);
        if (!$login_on) header("location:login");
    }

    //后台首页
    public function index()
    {
        $this->login_on();
        $this->load->view('v1/admin/public/header.php');
        $this->load->view('v1/admin/index.php');
    }
}