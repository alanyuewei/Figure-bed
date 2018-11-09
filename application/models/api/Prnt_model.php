<?php
/**
 * Created by PhpStorm.
 * User: 皮皮赖（https://www.52bz.la）
 * Date: 2018/11/8 0008
 * Time: 5:47
 */

class Prnt_model extends CI_Model
{
    public function url($tmp_name, $type, $name, $ssl)
    {
        $url = 'https://prntscr.com/upload.php';
        $post['image'] = curl_file_create(realpath($tmp_name), $type, $name);
        $this->load->model('public_model');
        $result = $this->public_model->public_curl($url, $post);
        $ret = json_decode($result, 1);
        if ($ret['status'] != "success") return 404;
        $newurl = $this->newlink($ret['data']);
        $newret = $this->public_model->public_curl($newurl);
        preg_match('/https:\/\/image.prntscr.com\/image\/(.*?)\" crossorigin/', $newret, $m);
        if (empty($m['0'])) return 404;
        return $this->public_model->ssl('https://image.prntscr.com/image/' . $m['1'], $ssl);
    }

    public function newlink($url)
    {
        return str_replace('http://prntscr.com', 'https://prnt.sc', $url);
    }
}