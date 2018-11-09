<?php
/**
 * vim 图片接口
 * User: 皮皮赖（https://www.52bz.la）
 * Date: 2018/11/9 0009
 * Time: 1:08
 */

class vim_model extends CI_Model
{
    public function url($tmp_name,$ssl)
    {
        $url = 'https://img.vim-cn.com/';
        $post['image'] = curl_file_create(realpath($tmp_name));
        $this->load->model('public_model');
        $result = $this->public_model->public_curl($url, $post);
         return $this->public_model->ssl($result, $ssl);
    }
}