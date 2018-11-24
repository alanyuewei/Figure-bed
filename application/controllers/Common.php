<?php
/**
 * 公共函数
 * User: 皮皮赖（https://www.52bz.la）
 * Date: 2018/11/8 0008
 * Time: 20:42
 */
namespace app\controllers;
use CI_Controller;

class Common extends CI_Controller
{
    //obj转数组
    public function get_arr($obj)
    {
        return json_decode(json_encode($obj),1);
    }

    //，号分割字符串
    public function get_new_str($string)
    {
        $string_arr = explode(",", $string );
        foreach($string_arr as $val){
            $new_str[] = $val;
        }
        return $new_str;
    }

    //后台是否登录
    public function admin_exist_session($logind = '0',$url="",$real= "1")
    {
        $exist_session = empty($_SESSION['user']) ? 0 : 1;
        if ($logind) return $exist_session;
        if ($real ? $exist_session : !$exist_session) die(header("location:".$url));
    }

    //后台默认公共头
    public function admin_public_views($list = "1")
    {
        if ($list)
        {
            $this->load->view('v1/admin/public/header.php');
            $this->load->view('v1/admin/public/list.php');
        }else{
            $this->load->view('v1/admin/public/header.php');
        }
    }

}