<?php
/**
 * dumpt图片上传
 * User: 皮皮赖（https://www.52bz.la）
 * Date: 2018/11/8 0008
 * Time: 6:06
 */

class dumpt_model extends CI_Model
{
    public function url($tmp_name, $type, $name, $ssl)
    {
        $url = 'https://dumpt.com/img/upload.php';
        $post['userfile[]'] = curl_file_create(realpath($tmp_name), $type, $name);
        $this->load->model('public_model');
        $result = $this->public_model->public_curl($url, $post);
        preg_match ('/https:\/\/dumpt.com\/img\/links.php\?file\=(.*?)\">/', $result, $m);
        if (empty($m[1])) return 404;
        return $this->public_model->ssl('https://dumpt.com/img/files/'.$m[1], $ssl);
    }
}