<?php
/**
 * 公共类
 * User: 皮皮赖(https://www.52bz.la)
 * Date: 2018/11/7 0007
 * Time: 17:26
 */
function ssl($url,$code = 1)
{
    return empty($code) ? str_replace('https', 'http', $url) : str_replace('http', 'https', $url);
}
