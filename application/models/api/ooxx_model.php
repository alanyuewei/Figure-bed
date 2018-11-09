<?php
/**
 * Created by PhpStorm.
 * User: 皮皮赖（https://www.52bz.la）
 * Date: 2018/11/8 0008
 * Time: 6:02
 */

class ooxx_model extends CI_Model
{
    public function url($tmp_name, $type, $name, $ssl)
    {
        $url = 'https://ooxx.ooo/upload';
        $post['files[]'] = curl_file_create(realpath($tmp_name), $type, $name);
        $this->load->model('public_model');
        $result = $this->public_model->public_curl($url, $post);
        $ret = json_decode($result, 1);
        return $this->public_model->ssl('https://i.ooxx.ooo/' . $ret[0], $ssl);
    }
}