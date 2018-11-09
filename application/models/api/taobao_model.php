<?php
/**
 * 淘宝识图.
 * User: 皮皮赖（https://www.52bz.la）
 * Date: 2018/11/8 0008
 * Time: 22:16
 */

class taobao_model extends CI_Model
{
    public function url($tmp_name,$type,$name,$ssl)
    {
        $url = 'https://s.taobao.com/image';
        $post['imgfile'] = curl_file_create(realpath($tmp_name), $type, $name);
        $this->load->model('public_model');
        $result = $this->public_model->public_curl($url, $post);
        $newret = json_decode($result,1);
        if (empty($newret['status'])) return 404;
        return $this->public_model->ssl('https:'.$newret['url'], $ssl);
    }
}