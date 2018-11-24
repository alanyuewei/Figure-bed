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
    //登陆页
    public function index()
    {
        $this->admin_exist_session(0,'./');
        $this->admin_public_views(0);
        $this->load->view('v1/admin/login.php');
    }

    //登陆
    public function verify()
    {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');
        $this->load->library('session');
        if (empty($user) || empty($pass)) die($data['code'] = json_encode(['code'=>404,'msg'=>"账号密码不能为空！"]));
        $db_obj = $this->db->get_where('gather_set', ['id'=>'1'])->row();
        $db_arr = $this->get_arr($db_obj);
        $db_user = $this->get_new_str($db_arr['content']);
        if ($db_user[0] != $user || $db_user[1] != $pass) die($data['code'] = json_encode(['code'=>404,'msg'=>"账号密码错误，请重新输入!"]));
        $this->session->set_userdata(['user'=>$db_user[0]]);
        if (!$this->admin_exist_session(1)) die(json_encode(['code'=>404,'msg'=>"出现未知错误，请重试"]));
        return die(json_encode(['code'=>200,'msg'=>"登录成功"]));
    }
}