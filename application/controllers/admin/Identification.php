<?php
/**
 * Created by PhpStorm.
 * User: 皮皮赖（https://www.52bz.la）
 * Date: 2018/12/1 0001
 * Time: 7:09
 */

use app\controllers\Common;

class Identification extends Common
{
    public function index()
    {
        $this->admin_exist_session(0,'./login',0 );
        $this->admin_public_views();
        $this->load->view('v1/admin/identification.php');
    }

    public function sina()
    {
        $this->admin_exist_session(0,'./login',0 );
        $post = $this->input->post(['user','pass']);
        $data = ['name'=>'sina','content'=>$post['user'].','.$post['pass']];
        $sina = $this->db->update('gather_set', $data, "id = 10");
        if ($sina) die(json_encode(['code'=>200,'msg'=>"更新成功"]));
        die(json_encode(['code'=>404,'msg'=>"更失败，出现未知错误，请重试！"]));
    }
}