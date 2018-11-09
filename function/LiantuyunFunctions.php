<?php
/**
 * 搜狗接口
 * @author 皮皮赖(https://www.52bz.la)
 */

function uploadToQihu($file)
{
    $data['file'] = new CURLFile(realpath($file));
    $url = "http://47.99.32.8:8080/yuanyin_file/ltyimg/stQueryAllByUpload";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $result = curl_exec($ch);
    curl_close($ch);
    $res = json_decode($result, 1);
    if (empty($res["orgUrl"])) return '404';
   $domain = strstr($res["orgUrl"], 'tmp');
  if($domain){
  $newres =  $res["orgUrl"];
  }else{
  	$newres = substr($res["orgUrl"],0,strlen($res["orgUrl"])-1); 
  }
    return $newres;
}

function QihuHttps($url)
{
    return str_replace('http', 'https', $url);
}

