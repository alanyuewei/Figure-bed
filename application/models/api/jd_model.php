<?php
/**
 * 京东识图
 * User: 皮皮赖（https://www.52bz.la）
 * Date: 2018/11/8 0008
 * Time: 17:09
 */

class jd_model extends CI_Model
{
    public function url($tmp_name, $type, $name, $ssl)
    {
        $url = 'https://search.jd.com/image?op=upload';
        $post['file'] = curl_file_create(realpath($tmp_name), $type, $name);
        $this->load->model('public_model');
        $result = $this->public_model->public_curl($url, $post);
        preg_match('/callback\("(.*?)"\);/', $result, $m);
        if (empty($m['0']) || $m['1'] == 'ERROR.UPLOAD_MIN_WH') return 404;
        return $this->public_model->ssl('https://img11.360buyimg.com/n1/s1920x1080_' . $m['1'], $ssl);
    }
}