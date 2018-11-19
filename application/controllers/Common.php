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

    public function exist_session($string)
    {
        $exist_session = empty($_SESSION[$string]) ? 0 : 1;
        return $exist_session;
    }
}