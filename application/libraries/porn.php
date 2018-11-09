<?php

require_once  'vendor/porn/index.php';
use vendor\porn\QcloudImage\CIClient;

class porn
{
    public function updata()
    {
//        var_dump($this->useHttp());
        $appid = 'YOUR_APPID';
        $secretId = 'YOUR_SECRETID';
        $secretKey = 'YOUR_SECRETKEY';
        $bucket = 'YOUR_BUCKET';
        $client = new CIClient($appid, $secretId, $secretKey, $bucket);
        $client->useHttps();
        $client->setTimeout(30);
        $client->useNewDomain();
        var_dump ($client->pornDetect(array('urls'=>array('http://open.youtu.qq.com./static/img/image_porn04.87591fe.jpg'))));
    }
}