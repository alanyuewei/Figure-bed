<?php
/**
 * Created by PhpStorm.
 * User: 烟雨寒云(https://www.yyhy.me/) | 皮皮赖(https://www.52bz.la)
 * Date: 2018/11/6
 * Time: 14:11
 */
session_start();
//设置时区
date_default_timezone_set("PRC");
//引入配置文件
include './core/config.php';
//引入公共类
include './function/PublicFunctions.php';
//引入新浪核心函数
include './function/SinaFunctions.php';
//访问一次更新一次cookie
$res['time'] = date("H", time());
$res['cookie'] = login($u, $p);
$file = '<?php $cookie = "' . $res['cookie'] . '";$time = "' . $res['time'] . '";';
file_put_contents('./core/cookie.php', $file);

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
    include './function/BaiduFunctions.php';
    $str = uploadToBaidu($_FILES['pic']['tmp_name']);
    $image = $_POST['xieyi'] == 'http' ? $str : BaiduHttps($str);
} else if ($_POST['tuchuang'] == 'Sougou') {
    //引入搜狗核心函数
    include './function/SougouFunctions.php';
    $str = uploadToSogou($_FILES['pic']['tmp_name'], $_FILES['pic']['size']);
    $image = $_POST['xieyi'] == 'http' ? $str : ssl($str);
} else if ($_POST['tuchuang'] == 'liantuyun') {
    //引入链云图核心函数
    include './function/LiantuyunFunctions.php';
    $image = uploadToQihu($_FILES['pic']['tmp_name']);
} else if ($_POST['tuchuang'] == 'SmMs') {
    //引入SmMs核心函数
    include './function/SmMsFunctions.php';
    $str = uploadToSmMs($_FILES);
    $image = $_POST['xieyi'] != 'http' ? $str : ssl($str, 0);
} else if ($_POST['tuchuang'] == 'Dumpt') {
    //引入Dump核心函数
    include './function/DumptFunctions.php';
    $str = uploadToDumpt($_FILES);
    $image = $_POST['xieyi'] != 'http' ? $str : ssl($str, 0);
} else if ($_POST['tuchuang'] == 'Prnt') {
    //引入Prnt核心函数
    include './function/PrntFunctions.php';
    $str = uploadToPrnt($_FILES);
    $image = $_POST['xieyi'] != 'http' ? $str : ssl($str, 0);
} else if ($_POST['tuchuang'] == 'ooxx') {
    //引入Ooxx核心函数
    include './function/OoxxFunctions.php';
    $str = uploadToOoxx($_FILES);
    $image = $_POST['xieyi'] != 'http' ? $str : ssl($str, 0);
} else if ($_POST['tuchuang'] == 'qihu') {
    //引入奇虎核心函数
    include './function/QihuFunctions.php';
    $str = uploadToQihu($_FILES);
    //var_dump($str);die;
    $image = $_POST['xieyi'] != 'http' ? $str : ssl($str, 0);
}else if ($_POST['tuchuang'] == 'renmin') {
    //引入人民网核心函数
    include './function/RenMinFunctions.php';
    $str = uploadTorenmin($_FILES);
    var_dump($str);die;
    $image = $_POST['xieyi'] != 'http' ? $str : ssl($str, 0);
}  else {
    $str = upload($_FILES['pic']['tmp_name'], $cookie);
    //格式化返回json数据
    $img = json_decode(($str), true);
    $image = $_POST['xieyi'] == 'https' ? getImageUrl($img['data']['pics']['pic_1']['pid']) : getImageUrl($img['data']['pics']['pic_1']['pid'], 0, 0);
}

if ($image == '404' && !empty($_FILES)) {
    die('<script>alert("上传失败请重试！");window.location.href="index.php";</script>');
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
    <link rel="icon" type="image/ico" href="https://q.qlogo.cn/g?b=qq&amp;nk=369994633&amp;s=100">
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
<body background="https://ww2.sinaimg.cn/large/a15b4afegy1fpp139ax3wj200o00g073.jpg" style="height: 100%">
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
                            } else {
                                echo '<br>图片链接：<input type="text" value="https://www.52bz.la/"><a id="copy-btn" data-clipboard-text="https://ws2.sinaimg.cn/large/006Xmmmgly1fvl8cjxeszj31hc0u0ama.jpg" class="btn btn-success btn-sm">一键复制</a><hr><img src="https://ws2.sinaimg.cn/large/006Xmmmgly1fvl8cjxeszj31hc0u0ama.jpg" width="90%">';
                            } ?>
                    </center>
            </div>
            <div class="panel-footer text-center">
                <!-- <input type="" name="num" id="num" style="display:none" /> -->
                图床：<label><input name="tuchuang" type="radio" value="Sina" id="Sina" onclick="yeshttps()"/>新浪 </label>
                <label><input name="tuchuang" type="radio" value="baidu" id="baidu" onclick="yeshttps()"/>百度 </label>
                <label><input name="tuchuang" type="radio" value="Sougou" id="Sougou" onclick="yeshttps()">搜狗 </label>
                <label><input name="tuchuang" type="radio" value="qihu" id="qihu" onclick="yeshttps()" disabled = false>奇虎 </label>
                <label><input name="tuchuang" type="radio" value="SmMs" id="SmMs" onclick="yeshttps()">SmMs</label>
                <label><input name="tuchuang" type="radio" value="liantuyun" id="liantuyun"
                              onclick="nohttps()">链图云</label>
                <label><input name="tuchuang" type="radio" value="renmin" id="renmin"
                              onclick="nohttps()">人民网</label>
                <label><input name="tuchuang" type="radio" value="ooxx" id="ooxx" onclick="yeshttps()">OoXx</label>
                <label><input name="tuchuang" type="radio" value="Dumpt" id="Dumpt" onclick="yeshttps()">Dumpt</label>
                <label><input name="tuchuang" type="radio" value="Prnt" id="Prnt" onclick="yeshttps()">Prnt</label>
                <br/>
                协议：<label><input name="xieyi" type="radio" id="http" value="http"/>http </label>
                <label><input name="xieyi" type="radio" id="https" value="https" checked="checked"/>https </label> <br/>
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


    <?php
    if (isset($_SESSION['index'])) {
        if ($_SESSION['index'] < time()) {
            unset($_SESSION['index']);

        }
    }
    if (empty($_SESSION['index'])) {
        echo 'layer.alert("' . $gogao . '", {icon: 7})';
        $_SESSION['index'] = time() + 360;
    }
    ?>

    var nums = <?php echo rand(0, 3); ?>;
    nums > 2 ? document.getElementById("Sougou").checked = "checked" : (nums > 1 ? document.getElementById("baidu").checked = "checked" : (nums > 0 ? document.getElementById("Sina").checked = "checked" : document.getElementById("SmMs").checked = "checked"))

    function nohttps() {
        document.getElementById('https').disabled = true;
        document.getElementById('http').checked = "checked";
    }

    function yeshttps() {
        document.getElementById('https').disabled = false;
        document.getElementById('https').checked = "checked";
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