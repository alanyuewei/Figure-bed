<?php
/**
 * Created by PhpStorm.
 * User: 皮皮赖（https://www.52bz.la）
 * Date: 2018/11/11 0011
 * Time: 21:39
 */

//namespace app\controllers\api;
use app\controllers\Common;

class File extends  Common
{
    //获取model api所有文件夹名缩写
    public function index()
    {
        $this->load->model('public_model');
        $ret = $this->public_model->file();
        return $ret;
    }
}