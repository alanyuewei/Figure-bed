<?php
/**
 * Dumpt接口
 * User: 皮皮赖(https://www.52bz.la)
 * Date: 2018/11/7 0007
 * Time: 16:24
 */

function uploadToDumpt($file)
{
    $file['userfile[]'] = curl_file_create(realpath($file['pic']["tmp_name"]),$file['pic']["type"], $file['pic']["name"]);
    $url = "https://dumpt.com/img/upload.php";
    $UserAgent = 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0; SLCC1; .NET CLR 2.0.50727; .NET CLR 3.0.04506; .NET CLR 3.5.21022; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $file);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_USERAGENT, $UserAgent);
    $result = curl_exec($ch);
    curl_close($ch);
    preg_match ('/https:\/\/dumpt.com\/img\/links.php\?file\=(.*?)\">/', $result, $m);
    if (empty($m[1])) return 404;
    return 'https://dumpt.com/img/files/'.$m[1];
}