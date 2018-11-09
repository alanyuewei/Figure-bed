<?php
/**
 * 搜狗接口
 * @author 皮皮赖(https://www.52bz.la)
 */

function uploadToSogou($file)
{
    //接口地址
    $UploadUrl = 'http://pic.sogou.com/pic/upload_pic.jsp?r=' . rand(10000, 99999);
    //取出临时目录上传的文件
    $curlPost['pic_path'] = new \CurlFile($file);
    //模拟上传开始
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $UploadUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1); //POST提交
    curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
    $data = curl_exec($ch);
    curl_close($ch);
    if (empty($data)) {
        return "404";
    }
    return $data;
}

function SougouHttps($url)
{
    return str_replace('http', 'https', $url);
}