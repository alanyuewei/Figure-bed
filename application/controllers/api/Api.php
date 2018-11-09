<?php
/**
 * Created by PhpStorm.
 * User: 皮皮赖（https://www.52bz.la）
 * Date: 2018/11/8 0008
 * Time: 3:13
 */


class Api extends CI_Controller
{
  public  function baidu($file,$ssl)
  {
      $this->load->model('api/baidu_model');
      $ret = $this->baidu_model->url($file['pic']['tmp_name'],$ssl);
      return $ret;
  }

  public function sougou($file,$ssl)
  {
      $this->load->model('api/sougou_model');
      $ret = $this->sougou_model->url($file['pic']['tmp_name'],$file['pic']['size'],$ssl);
      return $ret;
  }

  public function smms($file,$ssl)
  {
      $this->load->model('api/smms_model');
      $ret = $this->smms_model->url($file['pic']['tmp_name'],$file['pic']['type'],$file['pic']['name'],$ssl);
      return $ret;
  }

  public function prnt($file,$ssl)
  {
      $this->load->model('api/prnt_model');
      $ret = $this->prnt_model->url($file['pic']['tmp_name'],$file['pic']['type'],$file['pic']['name'],$ssl);
      return $ret;
  }

  public function ooxx($file,$ssl)
  {
      $this->load->model('api/ooxx_model');
      $ret = $this->ooxx_model->url($file['pic']['tmp_name'],$file['pic']['type'],$file['pic']['name'],$ssl);
      return $ret;
  }

    public function dumpt($file,$ssl)
    {
        $this->load->model('api/dumpt_model');
        $ret = $this->dumpt_model->url($file['pic']['tmp_name'],$file['pic']['type'],$file['pic']['name'],$ssl);
        return $ret;
    }

    public  function liantuyun($file,$ssl)
    {
        $this->load->model('api/liantuyun_model');
        $ret = $this->liantuyun_model->url($file['pic']['tmp_name'],$ssl);
        return $ret;
    }

    public function sina($file,$ssl)
    {
        $this->load->model('api/sina_model');
        $ret = $this->sina_model->url($file['pic']['tmp_name'],$ssl);
        return $ret;
    }
}