<?php
/**
 * Created by PhpStorm.
 * User: 皮皮赖（https://www.52bz.la）
 * Date: 2018/11/8 0008
 * Time: 3:02
 */
use app\controllers\api\Api;

class Home extends Api
{
    public function index()
    {
        session_start();
        $jumpapi = strtolower($this->input->post('tuchuang'));
        if (!empty($jumpapi)) {
            $ssl = $this->input->post('xieyi');
            $data['imgarrapi'] = $this->$jumpapi($_FILES, $ssl);
            $data['tuchuang'] = $jumpapi;
        }
        if (empty($_SESSION['notice']) || $_SESSION['notice'] < time()) {
            $data['notice'] = 1;
            $_SESSION['notice'] = time() + 360;
            $data['noticeval'] = '"图床V1.5更新<br/>1、从原生改为 CodeIgniter 框架<br/>2、新增京东，淘宝，Mixtape接口<br/><br/>国内高速接口：新浪，百度，搜狗，京东<br/>国外高速接口：OoXx，Dump，Prnt<br/>温馨提示：http可能存在防盗链，推荐使用https", {icon: 7}';        }
        $this->load->view('v1/home/index.php', $data);
    }
}