<?php
/**
 * Created by PhpStorm.
 * User: 皮皮赖（https://www.52bz.la）
 * Date: 2018/11/25 0025
 * Time: 9:01
 */

use app\controllers\Common;

class Setting extends Common
{
    public function  index()
    {
        $db['file_name'] = $this->file_model();
        $db['val'] = $this->array_where_select('id',[3,4,5,6,7],'gather_set');
        $this->admin_public_views();
        $this->load->view('v1/admin/setting.php',$db);
    }

    public function update()
    {
        $post = $this->input->post(['title','describe','keyword','format','identify','imgsapi']);
        $i=0;
        foreach ($post as $key => $value)
        {
            $i++;
            $newi = $i+2;
            $data = ['name'=>$key,'content'=>$value];
            $this->db->update('gather_set', $data, "id = $newi");
        }
        die(json_encode(['code'=>200,'msg'=>"更新成功"]));
    }

    public function  ce()
    {
        $this->admin_public_views();
    }
}