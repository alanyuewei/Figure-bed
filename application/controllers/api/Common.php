<?php
/**
 * 公共函数
 * User: 皮皮赖（https://www.52bz.la）
 * Date: 2018/11/8 0008
 * Time: 20:42
 */

class common extends CI_Controller
{
    public function is_imgs($type)
    {
        $this->load->model('public_model');
        $ret = $this->public_model->is_imgs($type);
        return $ret;
    }

    public function porn($urlarr)
    {
        $this->load->library('porn');
        $url = "http://news.hao123.com/wangzhi";
        $this->snoopy->fetch($url); //获取所有内容
        echo $this->snoopy->results; //显示结果

    }
}