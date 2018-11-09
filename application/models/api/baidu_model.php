<?php
/**
 * Created by PhpStorm.
 * User: 皮皮赖（https://www.52bz.la）
 * Date: 2018/11/8 0008
 * Time: 3:39
 */

class baidu_model extends CI_Model
{
    public function url($file, $ssl)
    {
        // API 接口地址
        $url = 'http://image.baidu.com/pcdutu/a_upload?fr=html5&target=pcSearchImage&needJson=true';
        $post['file'] = new CURLFile(realpath($file));
        $this->load->model('public_model');
        $ret = $this->public_model->public_curl($url, $post);
        if (empty($ret)) return '404';
        $output = json_decode($ret, true);
        if (isset($output['url']) && $output['url'] != '') {
            return $this->public_model->ssl($output['url'], $ssl, 1);
        }
        return '404';
    }
}