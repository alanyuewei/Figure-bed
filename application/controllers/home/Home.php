<?php
/**
 * Created by PhpStorm.
 * User: 皮皮赖（https://www.52bz.la）
 * Date: 2018/11/8 0008
 * Time: 3:02
 */


class Home extends CI_Controller
{
    public function index()
    {
        $this->load->library('session');
        $jumpapi = strtolower($this->input->post('tuchuang'));
        if (!empty($jumpapi)) {
            $ssl = $this->input->post('xieyi');
            require APPPATH . 'controllers\api\Api.php';
            $imgapi = new Api;
            $data['imgarrapi'] = $imgapi->$jumpapi($_FILES, $ssl);
        }
        if (empty($_SESSION['notice']) || $_SESSION['notice'] < time()) {
            $data['notice'] =1;
            $this->session->set_userdata('notice', time() + 360);
            $data['noticeval'] = '"图床V1.3更新<br/>1、添加国外高速接口OoXx，Dump，Prnt<br/>2、修复链图云在Linux运行返回结果不一样的问题<br/>3、修复新浪接口COOKIE失效问题<br/>4、优化代码，重新封装等...<br/><br/>国内高速接口：新浪，百度，搜狗，SmMs<br/>国外高速接口：OoXx，Dump，Prnt<br/>温馨提示：http可能存在防盗链，推荐使用https", {icon: 7}';
        }

        $this->load->view('home\home_index', $data);
    }
}