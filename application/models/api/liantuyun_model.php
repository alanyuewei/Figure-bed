<?php
/**
 * 链图云识图
 * User: 皮皮赖（https://www.52bz.la）
 * Date: 2018/11/8 0008
 * Time: 6:11
 */

class liantuyun_model extends CI_Model
{
    public function url($file, $ssl)
    {
        $post['file'] = new CURLFile(realpath($file));
        $url = "http://47.99.32.8:8080/yuanyin_file/ltyimg/stQueryAllByUpload";
        $this->load->model('public_model');
        $result = $this->public_model->public_curl($url, $post);
        $res = json_decode($result, 1);
        if (empty($res["orgUrl"])) return '404';
        $domain = strstr($res["orgUrl"], 'tmp');
        if ($domain) {
            $newres = $res["orgUrl"];
        } else {
            $newres = substr($res["orgUrl"], 0, strlen($res["orgUrl"]) - 1);
        }
        return $this->public_model->ssl($newres,$ssl);
    }
}