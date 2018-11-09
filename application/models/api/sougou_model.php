<?php
/**
 * Created by PhpStorm.
 * User: 皮皮赖（https://www.52bz.la）
 * Date: 2018/11/8 0008
 * Time: 5:06
 */

class sougou_model extends CI_Model
{
    public function  url($file,$size,$ssl)
    {
        if (isset($file)) {
            $fp = fopen($file,"r");
            $img = base64_encode(fread($fp,$size));
        }else{
            return "404";
        }
        $img = base64_decode($img);
        $data = base64_decode("LS0tLS0tV2ViS2l0Rm9ybUJvdW5kYXJ5R0xmR0IwSGdVTnRwVFQxaw0KQ29udGVudC1EaXNwb3NpdGlvbjogZm9ybS1kYXRhOyBuYW1lPSJwaWNfcGF0aCI7IGZpbGVuYW1lPSIxMS5wbmciDQpDb250ZW50LVR5cGU6IGltYWdlL3BuZw0KDQo=").$img.base64_decode("DQotLS0tLS1XZWJLaXRGb3JtQm91bmRhcnlHTGZHQjBIZ1VOdHBUVDFrLS0NCg==");
        $url = "http://pic.sogou.com/pic/upload_pic.jsp";
        $headers=array(
            "Content-Type: multipart/form-data; boundary=----WebKitFormBoundaryGLfGB0HgUNtpTT1k",
            "Content-Length: ".strlen($data)
        );
        $this->load->model('public_model');
        $ret = $this->public_model->public_curl($url,$data,$headers);
        return $this->public_model->ssl($ret,$ssl);
    }
}