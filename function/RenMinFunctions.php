<?php
/**
 * 人民网上传图片
 * User: 皮皮赖(https://www.52bz.la)
 * Date: 2018/11/7 0007
 * Time: 22:06
 */

function uploadTorenmin($file)
{
    $url = 'http://71bbs.people.com.cn/postImageUpload.do';
//    return $file;
    $filep['Filedata'] =   curl_file_create(realpath($file['pic']["tmp_name"]), $file['pic']["type"], $file['pic']["name"]);
    $UserAgent =  'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 SE 2.X MetaSr 1.0';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $filep);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, $UserAgent);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
    $ret = json_decode($result,1);
    return  $ret["data"]["url"];
}