<?php
/**
 * 360识图
 * User: 皮皮赖（https://www.52bz.la）
 * Date: 2018/11/8 0008
 * Time: 23:00
 */

class qihu_model extends CI_Model
{
    public function url($tmp_name,$type,$name,$ssl)
    {
        $url = 'http://71bbs.people.com.cn/postImageUpload.do';
        $post['imgfile'] = curl_file_create(realpath($tmp_name), $type, $name);
        $this->load->model('public_model');
        $result = $this->public_model->public_curl($url, $post);
        var_dump($result);die;
//        $newret = json_decode($result,1);
//        if (empty($newret['status'])) return 404;
//        return $this->public_model->ssl('https:'.$newret['url'], $ssl);
    }
}