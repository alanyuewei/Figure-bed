<?php
/**
 * 百度接口
 * @author 皮皮赖(https://www.52bz.la)
 */

function uploadToBaidu($file)
{
    // API 接口地址
    $url = 'http://image.baidu.com/pcdutu/a_upload?fr=html5&target=pcSearchImage&needJson=true';
    $post['file'] = new CURLFile(realpath($file));
    // CURL 模拟提交
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $output = curl_exec($ch);
    curl_close($ch);
    // 返回结果为空（上传失败）
    if ($output == '') return '404';
    // 解析数据
    $output = json_decode($output, true);
    if (isset($output['url']) && $output['url'] != '') {
        return $output['url'];
    }
    return '404';
}

function BaiduHttps($url)
{
    return $image = "https://image.baidu.com/search/down?tn=download&url=".$url;
}