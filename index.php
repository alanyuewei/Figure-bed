<?php
/**
 * Created by PhpStorm.
 * User: 烟雨寒云(https://www.yyhy.me/) | 皮皮赖(https://www.52bz.la)
 * Date: 2018/11/6
 * Time: 14:11
 */

//设置时区
date_default_timezone_set("PRC");
//引入配置文件
include './core/config.php';
//引入新浪核心函数
include './core/SinaFunctions.php';
//检测是否存在cookie信息文件，没有则进行登录操作并放置一个cookie信息文件
if (!file_exists('./core/cookie.php')) {
    $res['time'] = date("H", time());
    $res['cookie'] = login($u, $p);
    $file = '<?php $cookie = "' . $res['cookie'] . '";$time = "' . $res['time'] . '";';
    file_put_contents('./core/cookie.php', $file);
}
//引入cookie信息文件
include './core/cookie.php';
//获取当前小时
$dqtime = date("H", time());
//判断cookie信息文件中的时间距离当前相差多少，超过10小时重新进行登录获取cookie信息并更新文件
if (($time - $dqtime) > 10) {
    $res['time'] = date("H", time());
    $res['cookie'] = login($u, $p);
    $file = '<?php $cookie = "' . $res['cookie'] . '";$time = "' . $res['time'] . '"; ?>';
    file_put_contents('./core/cookie.php', $file);
}
//判断上传文件类型
if ($_FILES && !in_array(array_pop(explode(".", $_FILES['pic']['name'])), $allowtype)) {
    die('<script>alert("您上传的文件类型不是图片或被管理员禁止！");window.location.href="index.php";</script>');
}
//进行上传
if ($_POST['tuchuang'] == 'baidu') {
    //引入百度核心函数
    include './core/BaiduFunctions.php';
    $str = uploadToBaidu($_FILES['pic']['tmp_name']);
    $image = $_POST['xieyi'] == 'http' ? $str : BaiduHttps($str);
} else if ($_POST['tuchuang'] == 'Sougou') {
    //引入搜狗核心函数
    include './core/SougouFunctions.php';
    $str = uploadToSogou($_FILES['pic']['tmp_name']);
    $image = $_POST['xieyi'] == 'http' ? $str : SougouHttps($str);
} else {
    $str = upload($_FILES['pic']['tmp_name'], $cookie);
    //格式化返回json数据
    $img = json_decode(($str), true);
    $image = $_POST['xieyi'] == 'https' ? getImageUrl($img['data']['pics']['pic_1']['pid']) : getImageUrl($img['data']['pics']['pic_1']['pid'], 0, 0);
}

if ($image == '404' && !empty($_FILES)) {
    die( '<script>alert("上传失败请重试！");window.location.href="index.php";</script>');
}

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta name="referrer" content="never">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?php echo $description; ?>"/>
    <meta name="keywords" content="<?php echo $keywords; ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://css.letvcdn.com/lc04_yinyue/201612/19/20/00/bootstrap.min.css">
    <style>
        .panel {
            border: none;
            border-radius: 10px;
        }

        .panel {
            box-shadow: 1px 1px 5px 5px rgba(169, 169, 169, 0.35);
            -moz-box-shadow: 1px 1px 5px 5px rgba(169, 169, 169, 0.35);
        }
    </style>
</head>
<body background="https://ww2.sinaimg.cn/large/a15b4afegy1fpp139ax3wj200o00g073.jpg">
<div class="container" style="padding-top:55px;">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 center-block text-center" style="float: none;">
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: linear-gradient(to right,#8ae68a,#5ccdde,#b221ff);"><font
                        color="#000000">选择或拖拽一张图片开始上传...</font></div>
            <div class="panel-body text-center">
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <center>
                        <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $zzqq; ?>&site=qq&menu=yes"><img
                                    class="img-circle m-b-xs"
                                    style="border: 2px solid #1281FF; margin-left:3px; margin-right:3px;"
                                    src="https://q4.qlogo.cn/headimg_dl?dst_uin=<?php echo $zzqq; ?>&spec=100" ;
                                    width="60px" height="60px" alt="<?php echo $title; ?>"></a>
                        <p>
                            <font color="success"><?php echo $title; ?></font>
                        <p>
                            <input type="file" name="pic" class="btn btn-default">
                            <?php if ($image != 404) {
                                echo '<br>图片链接：<input type="text" value="' . $image . '"><a id="copy-btn" data-clipboard-text="' . $image . '" class="btn btn-success btn-sm">一键复制</a><hr><img src="' . $image . '" width="90%">';
                            } ?>
                    </center>
            </div>
            <div class="panel-footer text-center">
                <!-- <input type="" name="num" id="num" style="display:none" /> -->
                图床：<label><input name="tuchuang" type="radio" value="Sina" id="Sina"/>新浪 </label>
                <label><input name="tuchuang" type="radio" value="baidu" id="baidu"/>百度 </label>
                <label><input name="tuchuang" type="radio" value="Sougou" id="Sougou">搜狗 </label><br/>

                协议：<label><input name="xieyi" type="radio" value="http"/>http </label>
                <label><input name="xieyi" type="radio" value="https" checked="checked"/>https </label> <br/>
                <input type="submit" value="开始上传" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>
<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="//cdn.bootcss.com/layer/2.3/layer.js"></script>
<script src="//lib.baomitu.com/clipboard.js/1.7.1/clipboard.min.js"></script>
<script>
    var clipboard = new Clipboard('#copy-btn');
    clipboard.on('success', function (e) {
        layer.msg('复制成功！');
    });
    clipboard.on('error', function (e) {
        layer.msg('复制失败，请长按链接后手动复制！');
    });

    // var input = document.getElementById("num");
    // input.value=Math.round(Math.random()*2);
    var nums = Math.round(Math.random() * 2);
    if (nums == 0) {
        var Sina = document.getElementById("Sina");
        Sina.checked = "checked";
    }

    if (nums == 1) {
        var baidu = document.getElementById("baidu");
        baidu.checked = "checked";
    }

    if (nums == 2) {
        var Sougou = document.getElementById("Sougou");
        Sougou.checked = "checked";

    }
</script>
<center>© <?php echo date("Y", time()); ?> <?php echo $copy; ?></center>
<style>#circle {
        opacity: 0;
        filter: alpha(opacity='0')
        background-color: #ffffff;
        border: 5px solid #FF0000;
        opacity: .9;
        border-right: 5px solid rgba(0, 0, 0, 0);
        border-left: 5px solid rgba(0, 0, 0, 0);
        border-radius: 50px;
        box-shadow: 0 0 35px #FF0000;
        width: 60px;
        height: 60px;
        margin: 0 auto;
        position: fixed;
        left: 30px;
        bottom: 30px;
        -moz-animation: spinPulse 1s infinite linear;
        -webkit-animation: spinPulse 1s infinite linear;
        -o-animation: spinPulse 1s infinite linear;
        -ms-animation: spinPulse 1s infinite linear;
    }

    #circle1 {
        opacity: 0;
        filter: alpha(opacity='0')
        background-color: #ffffff;
        border: 6px solid #FF0000;
        opacity: .9;
        border-left: 6px solid rgba(0, 0, 0, 0);
        border-right: 6px solid rgba(0, 0, 0, 0);
        border-radius: 50px;
        box-shadow: 0 0 15px #FF0000;
        width: 40px;
        height: 40px;
        margin: 0 auto;
        position: fixed;
        left: 39px;
        bottom: 39px;
        -moz-animation: spinoffPulse 1s infinite linear;
        -webkit-animation: spinoffPulse 1s infinite linear;
        -o-animation: spinoffPulse 1s infinite linear;
        -ms-animation: spinoffPulse 1s infinite linear;
    }

    #circletext {
        opacity: 0;
        filter: alpha(opacity='0')
        width: 46px;
        height: 20px;
        margin: 0 auto;
        position: fixed;
        left: 46px;
        bottom: 53px;
        color: #F00
    }

    @-moz-keyframes spinPulse {
        0% {
            -moz-transform: rotate(160deg);
            opacity: 0;
            box-shadow: 0 0 1px #505050;
        }
        50% {
            -moz-transform: rotate(145deg);
            opacity: 1;
        }
        100% {
            -moz-transform: rotate(-320deg);
            opacity: 0;
        }
    }

    @-moz-keyframes spinoffPulse {
        0% {
            -moz-transform: rotate(0deg);
        }
        100% {
            -moz-transform: rotate(360deg);
        }
    }

    @-webkit-keyframes spinPulse {
        0% {
            -webkit-transform: rotate(160deg);
            opacity: 0;
            box-shadow: 0 0 1px #505050;
        }
        50% {
            -webkit-transform: rotate(145deg);
            opacity: 1;
        }
        100% {
            -webkit-transform: rotate(-320deg);
            opacity: 0;
        }
    }

    @-webkit-keyframes spinoffPulse {
        0% {
            -webkit-transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @-o-keyframes spinPulse {
        0% {
            -o-transform: rotate(160deg);
            opacity: 0;
            box-shadow: 0 0 1px #505050;
        }
        50% {
            -o-transform: rotate(145deg);
            opacity: 1;
        }
        100% {
            -o-transform: rotate(-320deg);
            opacity: 0;
        }
    }

    @-o-keyframes spinoffPulse {
        0% {
            -o-transform: rotate(0deg);
        }
        100% {
            -o-transform: rotate(360deg);
        }
    }

    @-ms-keyframes spinPulse {
        0% {
            -ms-transform: rotate(160deg);
            opacity: 0;
            box-shadow: 0 0 1px #505050;
        }
        50% {
            -ms-transform: rotate(145deg);
            opacity: 1;
        }
        100% {
            -ms-transform: rotate(-320deg);
            opacity: 0;
        }
    }

    @-ms-keyframes spinoffPulse {
        0% {
            -ms-transform: rotate(0deg);
        }
        100% {
            -ms-transform: rotate(360deg);
        }
    }</style>
<div id="circle" style="opacity: 1;"></div>
<div id="circletext" style="opacity: 1;"></div>
<div id="circle1" style="opacity: 1;"></div>
</body>
</html>