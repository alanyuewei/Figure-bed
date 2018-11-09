<?php
/**
 * mixtape图片上传
 * User: 皮皮赖（https://www.52bz.la）
 * Date: 2018/11/8 0008
 * Time: 17:45
 */

class mixtape_model extends CI_Model
{
    public function url($tmp_name, $type, $name, $ssl)
    {
        $url = 'https://mixtape.moe/upload.php';
        $post['files[]'] = curl_file_create(realpath($tmp_name), $type, $name);
        $this->load->model('public_model');
        $result = $this->public_model->public_curl($url, $post);
        $newret = json_decode($result,1);
        return $this->public_model->ssl($newret['files']['0']['url'], $ssl);;

    }
}