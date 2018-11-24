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
    //后台首页
    public function index()
    {
        $this->admin_exist_session(0,'./login',0 );
        $this->admin_public_views();
        $db_num = $this->db->get_where('gather_set', ['id'=>'2'])->row();
        $db_arr = $this->get_arr($db_num);
        $this->load->model('public_model');
        $db['update'] = $this->public_model->Revisions();
        $db['img_num'] = $this->get_new_str($db_arr['content']);
        $this->load->view('v1/admin/index.php',$db);
    }

    public function  ce()
    {
        $this->load->model('public_model');
        $db = $this->public_model->Revisions();
        echo "<pre>";
        var_dump($db);
    }
}