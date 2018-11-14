<?php
/**
 * Created by PhpStorm.
 * User: 皮皮赖（https://www.52bz.la）
 * Date: 2018/11/8 0008
 * Time: 3:16
 */
?>
<html lang="zh-CN">
<head>
    <meta name="referrer" content="never">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="皮皮赖图床（http://www.54ylw.cn）,一个为站长提供高速，有限的外链图床站点！">
    <meta name="keywords" content="皮皮赖图床,皮皮赖图床,新浪图床,百度图床,搜狗图床,SMMS图床,链图云图床">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>皮皮赖-极简高速外链图床</title>
    <link rel="stylesheet" href="https://css.letvcdn.com/lc04_yinyue/201612/19/20/00/bootstrap.min.css">
    <script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="//cdn.bootcss.com/layer/2.3/layer.js"></script>
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
    <link rel="stylesheet" href="https://cdn.bootcss.com/layer/2.3/skin/layer.css" id="layui_layer_skinlayercss">
</head>
<body background="https://ww2.sinaimg.cn/large/a15b4afegy1fpp139ax3wj200o00g073.jpg" style="height: 100%">
<div class="container" style="padding-top:55px;">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 center-block text-center" style="float: none;">
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: linear-gradient(to right,#8ae68a,#5ccdde,#b221ff);"><font
                        color="#000000">选择或拖拽一张图片开始上传...</font></div>
            <div class="panel-body text-center">
                <form action=".." method="post" enctype="multipart/form-data">
                    <center>
                        <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=369994633&amp;site=qq&amp;menu=yes"><img
                                    class="img-circle m-b-xs"
                                    style="border: 2px solid #1281FF; margin-left:3px; margin-right:3px;"
                                    src="https://q4.qlogo.cn/headimg_dl?dst_uin=369994633&amp;spec=100" ;=""
                                    width="60px" height="60px" alt="皮皮赖-极简高速外链图床"></a>
                        <p>
                            <font color="success">皮皮赖-极简高速外链图床</font>
                        </p>
                        <p>
                            <input type="file" name="pic" class="btn btn-default">
                            <?php
                            if ($imgarrapi == 404 || $is_imgs == 404) {
                                if ($tuchuang == 'jd' || $tuchuang == 'taobao' && $imgarrapi == 404) echo '<script> layer.alert("图片尺寸不能小于201x201 px"); </script>'; else echo '<script> layer.alert("您的文件不是图片或出现未知错误")</script>';
                            }
                            if (!empty($imgarrapi) && $imgarrapi != 404) {
                                echo '<br>图片链接：<input type="text" value="' . $imgarrapi . '"><a id="copy-btn" data-clipboard-text="' . $imgarrapi . '" class="btn btn-success btn-sm">一键复制</a><hr><img src="' . $imgarrapi . '" width="90%">';
                            } else {
                                echo '<br>图片链接：<input type="text" value="https://www.52bz.la/"><a id="copy-btn" data-clipboard-text="https://ws2.sinaimg.cn/large/006Xmmmgly1fvl8cjxeszj31hc0u0ama.jpg" class="btn btn-success btn-sm">一键复制</a><hr><img src="https://ws2.sinaimg.cn/large/006Xmmmgly1fvl8cjxeszj31hc0u0ama.jpg" width="90%">';
                            } ?></center>
            </div>
            <div class="panel-footer text-center">
                <!-- <input type="" name="num" id="num" style="display:none" /> -->
                国内：<label><input name="tuchuang" type="radio" value="Sina" id="Sina" onclick="yeshttps()">新浪 </label>
                <label><input name="tuchuang" type="radio" value="baidu" id="baidu" onclick="yeshttps()">百度 </label>
                <label><input name="tuchuang" type="radio" value="Sougou" id="Sougou" onclick="yeshttps()">搜狗 </label>
                <label><input name="tuchuang" type="radio" value="jd" id="jd" onclick="yeshttps()">京东</label>
                <label><input name="tuchuang" type="radio" value="qihu" id="qihu" onclick="yeshttps()" disabled="true">360</label>
                <label><input name="tuchuang" type="radio" value="taobao" id="taobao" onclick="yeshttps()">淘宝</label>
                <label><input name="tuchuang" type="radio" value="SmMs" id="SmMs" onclick="yeshttps()">SmMs</label>rr
                <label><input name="tuchuang" type="radio" value="liantuyun" id="liantuyun"
                              onclick="nohttps()">链图云</label>
                <br>
                国外：
                <label><input name="tuchuang" type="radio" value="Vim" id="Vim" onclick="yeshttps()">Vim</label>
                <label><input name="tuchuang" type="radio" value="ooxx" id="ooxx" onclick="yeshttps()">OoXx</label>
                <label><input name="tuchuang" type="radio" value="Dumpt" id="Dumpt" onclick="yeshttps()">Dumpt</label>
                <label><input name="tuchuang" type="radio" value="Prnt" id="Prnt" onclick="yeshttps()">Prnt</label>
                <label><input name="tuchuang" type="radio" value="mixtape" id="mixtape"
                              onclick="yeshttps()">Mixtape</label>
                <br>
                协议：<label><input name="xieyi" type="radio" id="http" value="http">http </label>
                <label><input name="xieyi" type="radio" id="https" value="https" checked="checked">https </label> <br>
                <input type="submit" value="开始上传" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>
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
    if (!empty($notice)) echo 'layer.alert(' . $noticeval . ')';
    echo '
        var nums =' . rand(0, 3) . ';';
    ?>

    nums > 2 ? document.getElementById("Sougou").checked = "checked" : (nums > 1 ? document.getElementById("baidu").checked = "checked" : (nums > 0 ? document.getElementById("Sina").checked = "checked" : document.getElementById("jd").checked = "checked"));

    function nohttps() {
        document.getElementById('https').disabled = true;
        document.getElementById('http').checked = "checked";
    }

    function yeshttps() {
        document.getElementById('https').disabled = false;
        document.getElementById('https').checked = "checked";
    }

    //禁用右键
    document.oncontextmenu = function () {
        return false;
    };
    //禁用开发者工具F12
    document.onkeydown = function () {
        if (window.event && window.event.keyCode == 123) {
            event.keyCode = 0;
            event.returnValue = false;
            return false;
        }
    };

</script>
<center>© 2018 皮皮赖</center>
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
