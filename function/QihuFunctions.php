<?php
/**
 * 360识图接口
 * User: 皮皮赖(https://www.52bz.la)
 * Date: 2018/11/7 0007
 * Time: 20:10
 */
function uploadToQihu($file)
{
    $url = 'http://st.so.com/stu?a=index';
    $data['upload'] = curl_file_create(realpath($file['pic']["tmp_name"]), $file['pic']["type"], $file['pic']["name"]);
    if (isset($file)) {
        $fp = fopen($file['pic']["tmp_name"],"r");
        $img = base64_encode(fread($fp,$file['pic']["size"]));
    }else{
        return array("404");
    }
    $headers=array(
        "Content-Type: multipart/form-data; boundary=----WebKitFormBoundaryGLfGB0HgUNtpTT1k",
        "Content-Length: ".strlen($img)
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result=curl_exec($ch);
    curl_close($ch);
    return $result;
}


