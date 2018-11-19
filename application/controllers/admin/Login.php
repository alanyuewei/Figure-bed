<?php
/**
 * 后台登录
 * User: 皮皮赖（https://www.52bz.la）
 * Date: 2018/11/9 0009
 * Time: 23:07
 */
use app\controllers\Common;

class Login extends Common
{
    public function index()
    {
        $this->load->view('v1/admin/public/header.php');
        $this->load->view('v1/admin/login.php',$data);
    }

    public function verify()
    {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');
        $this->load->library('session');
        if (empty($user) || empty($pass)) die($data['code'] = json_encode(['code'=>404,'msg'=>"账号密码不能为空"]));
        
        return die(json_encode(['code'=>200,'msg'=>"登录成功"]));
    }
}