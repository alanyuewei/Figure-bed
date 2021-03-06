<?php
/**
 * Created by PhpStorm.
 * User: 皮皮赖（https://www.52bz.la）
 * Date: 2018/11/8 0008
 * Time: 3:36
 */

class public_model extends CI_Model
{
    //https和http互转类
    public function ssl($url, $code = 'http', $b = 0)
    {
        if ($code == "https") {
            if ($b) return $image = "https://image.baidu.com/search/down?tn=download&url=" . $url;
            return stristr($url, 'https') ? $url : str_replace('http', 'https', $url);
        }
        return stristr($url, 'https') ? str_replace('https', 'http', $url) : str_replace('http', 'http', $url);
    }

    //公共curl
    public function public_curl($url, $data = "", $headers = "", $UserAgent = "")
    {
        $ip = rand(0, 255) . '.' . rand(0, 255) . '.' . rand(0, 255) . '.' . rand(0, 255);
        if (empty($UserAgent)) $UserAgent = "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0; SLCC1; .NET CLR 2.0.50727; .NET CLR 3.0.04506; .NET CLR 3.5.21022; .NET CLR 1.0.3705; .NET CLR 1.1.4322)";
        if (empty($headers)) $headers = [
            'Referer: https://github.com/',
            'Host: github.com'
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_USERAGENT, $UserAgent);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    //判断是否是图片
    public function is_imgs($type)
    {
        return strpos($type, 'image') == true ? 1 : 0;
    }

    //获取model api所有文件夹名缩写
    public function file()
    {
        $file = dirname(__FILE__) . "\api\api";
        $dir = dirname($file);
        $file = scandir($dir);
        unset($file[0], $file[1]);
        $niefile = str_replace('_model.php', '', $file);
        return $niefile;
    }

    //获取历史版本信息
    public function Revisions()
    {
        $Revisions = file_get_contents('https://www.52bz.la/Figure-bed/update.txt');
        $Revisions = explode("┭", $Revisions);
        foreach ($Revisions as $val)
        {
            $newrevisions[] = explode("丨", $val);
        }
        return $newrevisions;
    }
}