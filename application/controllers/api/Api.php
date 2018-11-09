<?php
/**
 * Created by PhpStorm.
 * User: 皮皮赖（https://www.52bz.la）
 * Date: 2018/11/8 0008
 * Time: 3:13
 */
namespace app\controllers\api;
use CI_Controller;
class Api extends CI_Controller
{
    //百度识图
    public function baidu($file, $ssl)
    {
        $is_imgs = $this->is_imgs($file['pic']['type']);
        if (!$is_imgs) return  404;
        $this->load->model('api/baidu_model');
        $ret = $this->baidu_model->url($file['pic']['tmp_name'], $ssl);
        return $ret;
    }

    //搜狗识图
    public function sougou($file, $ssl)
    {
        $is_imgs = $this->is_imgs($file['pic']['type']);
        if (!$is_imgs) return  404;
        $this->load->model('api/sougou_model');
        $ret = $this->sougou_model->url($file['pic']['tmp_name'], $file['pic']['size'], $ssl);
        return $ret;
    }

    //京东识图
    public function jd($file, $ssl)
    {
        $is_imgs = $this->is_imgs($file['pic']['type']);
        if (!$is_imgs) return  404;
        $this->load->model('api/jd_model');
        $ret = $this->jd_model->url($file['pic']['tmp_name'], $file['pic']['type'], $file['pic']['name'], $ssl);
        return $ret;
    }

    //淘宝识图
    public function taobao($file, $ssl)
    {
        $is_imgs = $this->is_imgs($file['pic']['type']);
        if (!$is_imgs) return  404;
        $this->load->model('api/taobao_model');
        $ret = $this->taobao_model->url($file['pic']['tmp_name'], $file['pic']['type'], $file['pic']['name'], $ssl);
        return $ret;
    }

    //360识图
    public function qihu($file, $ssl)
    {
        return $this->sina($file, $ssl);
    }

    //新浪相册
    public function sina($file, $ssl)
    {
        $is_imgs = $this->is_imgs($file['pic']['type']);
        if (!$is_imgs) return  404;
        $this->load->model('api/sina_model');
        $ret = $this->sina_model->url($file['pic']['tmp_name'], $ssl);
        return $ret;
    }

    public function vim($file, $ssl)
    {
        $is_imgs = $this->is_imgs($file['pic']['type']);
        if (!$is_imgs) return  404;
        $this->load->model('api/vim_model');
        $ret = $this->vim_model->url($file['pic']['tmp_name'], $ssl);
        return $ret;
    }

    //smms接口
    public function smms($file, $ssl)
    {
        $is_imgs = $this->is_imgs($file['pic']['type']);
        if (!$is_imgs) return  404;
        $this->load->model('api/smms_model');
        $ret = $this->smms_model->url($file['pic']['tmp_name'], $file['pic']['type'], $file['pic']['name'], $ssl);
        return $ret;
    }

    //prnt接口
    public function prnt($file, $ssl)
    {
        $is_imgs = $this->is_imgs($file['pic']['type']);
        if (!$is_imgs) return  404;
        $this->load->model('api/prnt_model');
        $ret = $this->prnt_model->url($file['pic']['tmp_name'], $file['pic']['type'], $file['pic']['name'], $ssl);
        return $ret;
    }

    //ooxx接口
    public function ooxx($file, $ssl)
    {
        $is_imgs = $this->is_imgs($file['pic']['type']);
        if (!$is_imgs) return  404;
        $this->load->model('api/ooxx_model');
        $ret = $this->ooxx_model->url($file['pic']['tmp_name'], $file['pic']['type'], $file['pic']['name'], $ssl);
        return $ret;
    }

    //dumpt接口
    public function dumpt($file, $ssl)
    {
        $is_imgs = $this->is_imgs($file['pic']['type']);
        if (!$is_imgs) return  404;
        $this->load->model('api/dumpt_model');
        $ret = $this->dumpt_model->url($file['pic']['tmp_name'], $file['pic']['type'], $file['pic']['name'], $ssl);
        return $ret;
    }

    //liantuyun接口
    public function liantuyun($file, $ssl)
    {
        $is_imgs = $this->is_imgs($file['pic']['type']);
        if (!$is_imgs) return  404;
        $this->load->model('api/liantuyun_model');
        $ret = $this->liantuyun_model->url($file['pic']['tmp_name'], $ssl);
        return $ret;
    }

    //mixtape接口
    public function mixtape($file, $ssl)
    {
        $is_imgs = $this->is_imgs($file['pic']['type']);
        if (!$is_imgs) return  404;
        $this->load->model('api/mixtape_model');
        $ret = $this->mixtape_model->url($file['pic']['tmp_name'], $file['pic']['type'], $file['pic']['name'], $ssl);
        return $ret;
    }

    //判断是否是图片
    public function is_imgs($type)
    {
        return strstr($type, 'image');
    }
}