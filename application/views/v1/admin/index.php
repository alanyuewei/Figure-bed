<?php
/**
 * Created by PhpStorm.
 * User: 皮皮赖（https://www.52bz.la）
 * Date: 2018/11/21 0021
 * Time: 5:06
 */
?>
    <div class="be-content">
        <div class="main-content container-fluid">
            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-3">
                    <div class="widget widget-tile">
                        <div id="spark1" class="chart sparkline"></div>
                        <div class="data-info">
                            <div class="desc">最新图片</div>
                            <div class="value"><span
                                        class="indicator indicator-equal mdi mdi-chevron-right"></span><span
                                        data-toggle="counter" data-end="<?= $img_num[0] ?>" class="number">0</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-3">
                    <div class="widget widget-tile">
                        <div id="spark2" class="chart sparkline"></div>
                        <div class="data-info">
                            <div class="desc">新图比例</div>
                            <div class="value"><span
                                        class="indicator indicator-positive mdi mdi-chevron-up"></span><span
                                        data-toggle="counter" data-end="<?= $img_num[1] ?>" class="number">0</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-3">
                    <div class="widget widget-tile">
                        <div id="spark3" class="chart sparkline"></div>
                        <div class="data-info">
                            <div class="desc">图片总数</div>
                            <div class="value"><span
                                        class="indicator indicator-positive mdi mdi-chevron-up"></span><span
                                        data-toggle="counter" data-end="<?= $img_num[2] ?>" class="number">0</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-3">
                    <div class="widget widget-tile">
                        <div id="spark4" class="chart sparkline"></div>
                        <div class="data-info">
                            <div class="desc">违规图片</div>
                            <div class="value"><span
                                        class="indicator indicator-negative mdi mdi-chevron-down"></span><span
                                        data-toggle="counter" data-end="<?= $img_num[3] ?>" class="number">0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
<!--                    <div id="main-chart" style="height: 260px;"></div>-->
            </div>
            <div class="row">
                <div class="col-md-6">
                <div class="user-info-list panel panel-default">
                    <div class="panel-heading panel-heading-divider">服务器信息</div>
                    <div class="panel-body">
                        <table class="no-border no-strip skills">
                            <tbody class="no-border-x no-border-y">
                            <tr>
                                <td class="icon"><span class="mdi mdi-pin-drop"></span></td>
                                <td class="item">服务器IP<span class="icon s7-portfolio"></span></td>
                                <td><?= $_SERVER['SERVER_ADDR']?></td>
                            </tr>
                            <tr>
                                <td class="icon"><span class="mdi mdi-group-work"></span></td>
                                <td class="item">PHP版本<span class="icon s7-gift"></span></td>
                                <td><?=PHP_VERSION?></td>
                            </tr>
                            <tr>
                                <td class="icon"><span class="mdi mdi-key"></span></td>
                                <td class="item">Zend版本<span class="icon s7-phone"></span></td>
                                <td><?=Zend_Version()?></td>
                            </tr>
                            <tr>
                                <td class="icon"><span class="mdi mdi-case-check"></span></td>
                                <td class="item">运行方式<span class="icon s7-map-marker"></span></td>
                                <td><?=php_sapi_name()?></td>
                            </tr>
                            <tr>
                                <td class="icon"><span class="mdi mdi-globe-alt"></span></td>
                                <td class="item">网站域名<span class="icon s7-map-marker"></span></td>
                                <td><?=$_SERVER['HTTP_HOST']?></td>
                            </tr>
                            <tr>
                                <td class="icon"><span class="mdi mdi-floppy"></span></td>
                                <td class="item">服务器CPU<span class="icon s7-global"></span></td>
                                <td><?=$_SERVER['PROCESSOR_IDENTIFIER']?></td>
                            </tr>
                            <tr>
                                <td class="icon"><span class="mdi mdi-link"></span></td>
                                <td class="item">服务器域名<span class="icon s7-global"></span></td>
                                <td><?=$_SERVER['SERVER_NAME']?></td>
                            </tr>
                            <tr>
                                <td class="icon"><span class="mdi mdi-language-css3"></span></td>
                                <td class="item">服务器语言<span class="icon s7-global"></span></td>
                                <td><?= $_SERVER['HTTP_ACCEPT_LANGUAGE']?></td>
                            </tr>
                            <tr>
                                <td class="icon"><span class="mdi mdi-http"></span></td>
                                <td class="item">时通信协议<span class="icon s7-global"></span></td>
                                <td><?= $_SERVER['SERVER_PROTOCOL']?></td>
                            </tr>
                            <tr>
                                <td class="icon"><span class="mdi mdi-laptop"></span></td>
                                <td class="item">服务器版本<span class="icon s7-global"></span></td>
                                <td><?=php_uname('s').php_uname('r')?></td>
                            </tr>
                            <tr>
                                <td class="icon"><span class="mdi mdi-dns"></span></td>
                                <td class="item">服务器标识<span class="icon s7-global"></span></td>
                                <td><?=$_SERVER['SERVER_SOFTWARE']?></td>
                            </tr>
                            <tr>
                                <td class="icon"><span class="mdi mdi-folder"></span></td>
                                <td class="item">PHP安装路径<span class="icon s7-global"></span></td>
                                <td><?=DEFAULT_INCLUDE_PATH?></td>
                            </tr>
                            <tr>
                                <td class="icon"><span class="mdi mdi-cloud-upload"></span></td>
                                <td class="item">最大上传限制<span class="icon s7-global"></span></td>
                                <td><?=get_cfg_var ("upload_max_filesize")?get_cfg_var ("upload_max_filesize"):"不允许" ?></td>
                            </tr>
                            <tr>
                                <td class="icon"><span class="mdi mdi-time-restore"></span></td>
                                <td class="item">最大执行时间<span class="icon s7-global"></span></td>
                                <td><?=get_cfg_var("max_execution_time")."秒 " ?></td>
                            </tr>
                            <tr>
                                <td class="icon"><span class="mdi mdi-language-javascript"></span></td>
                                <td class="item">脚本运行内存<span class="icon s7-global"></span></td>
                                <td><?=get_cfg_var ("memory_limit")?get_cfg_var("memory_limit"):"无"?></td>
                            </tr>
                            <tr>
                                <td class="icon"><span class="mdi mdi-time"></span></td>
                                <td class="item">系统时间<span class="icon s7-global"></span></td>
                                <td><?=date("Y-m-d H:i:s")?></td>
                            </tr>
                            <tr>
                                <td class="icon"><span class="mdi mdi-portable-wifi-changes"></span></td>
                                <td class="item">服务器Web端口<span class="icon s7-global"></span></td>
                                <td><?= $_SERVER['SERVER_PORT']?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div></div>


                <div class="col-md-6">
                    <ul class="timeline">
                        <li class="timeline-item">
                            <div class="timeline-date"><span>关于</span></div>
                            <div class="timeline-content">
                                <div class="timeline-avatar"><img src="https://github.com/fluidicon.png" alt="Avatar" class="circle"></div>
                                <div class="timeline-header">                                    <div class="timeline-summary">
                                        <p>最新版本<?= $update[0][1]?>：<a href="https://codeload.github.com/ThedoRap/Figure-bed">点击下载</a>丨联系作者：<a href="https://www.52bz.la">皮皮赖</a>&&<a href="https://www.yyhy.me/">烟雨寒云</a></p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php foreach ($update as $item):?>
                        <li class="timeline-item timeline-item-detailed">
                            <div class="timeline-date"><span><?= $item[1]?></span></div>
                            <div class="timeline-content">
                                <div class="timeline-avatar"><img src="https://q.qlogo.cn/g?b=qq&nk=<?=$item[3]?>&s=100" alt="Avatar" class="circle"></div>
                                <div class="timeline-header"><span class="timeline-time"><?= $item[2]?></span><span class="timeline-autor"><?= $item[3]=='369994633' ? '皮皮赖' : '烟雨寒云' ?></span>
                                    <div class="timeline-summary">
                                        <p><?= $item[0]?></p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach;?>
                        <li class="timeline-item timeline-loadmore"><a href="#" class="load-more-btn">历史版本</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
<nav class="be-right-sidebar">
    <div class="sb-content">
        <div class="tab-navigation">
            <ul role="tablist" class="nav nav-tabs nav-justified">
                <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab"
                                                          data-toggle="tab">Chat</a></li>
                <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Todo</a></li>
                <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Settings</a>
                </li>
            </ul>
        </div>
        <div class="tab-panel">
            <div class="tab-content">
                <div id="tab1" role="tabpanel" class="tab-pane tab-chat active">
                    <div class="chat-contacts">
                        <div class="chat-sections">
                            <div class="be-scroller">
                                <div class="content">
                                    <h2>Recent</h2>
                                    <div class="contact-list contact-list-recent">
                                        <div class="user"><a href="#"><img src="/public/v1/admin/assets/img/avatar1.png"
                                                                           alt="Avatar">
                                                <div class="user-data"><span class="status away"></span><span
                                                            class="name">Claire Sassu</span><span class="message">Can you share the...</span>
                                                </div>
                                            </a></div>
                                        <div class="user"><a href="#"><img src="/public/v1/admin/assets/img/avatar2.png"
                                                                           alt="Avatar">
                                                <div class="user-data"><span class="status"></span><span class="name">Maggie jackson</span><span
                                                            class="message">I confirmed the info.</span></div>
                                            </a></div>
                                        <div class="user"><a href="#"><img src="/public/v1/admin/assets/img/avatar3.png"
                                                                           alt="Avatar">
                                                <div class="user-data"><span class="status offline"></span><span
                                                            class="name">Joel King		</span><span class="message">Ready for the meeti...</span>
                                                </div>
                                            </a></div>
                                    </div>
                                    <h2>Contacts</h2>
                                    <div class="contact-list">
                                        <div class="user"><a href="#"><img src="/public/v1/admin/assets/img/avatar4.png"
                                                                           alt="Avatar">
                                                <div class="user-data2"><span class="status"></span><span class="name">Mike Bolthort</span>
                                                </div>
                                            </a></div>
                                        <div class="user"><a href="#"><img src="/public/v1/admin/assets/img/avatar5.png"
                                                                           alt="Avatar">
                                                <div class="user-data2"><span class="status"></span><span class="name">Maggie jackson</span>
                                                </div>
                                            </a></div>
                                        <div class="user"><a href="#"><img src="/public/v1/admin/assets/img/avatar6.png"
                                                                           alt="Avatar">
                                                <div class="user-data2"><span class="status offline"></span><span
                                                            class="name">Jhon Voltemar</span></div>
                                            </a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-input">
                            <input type="text" placeholder="Search..." name="q"><span class="mdi mdi-search"></span>
                        </div>
                    </div>
                    <div class="chat-window">
                        <div class="title">
                            <div class="user"><img src="/public/v1/admin/assets/img/avatar2.png" alt="Avatar">
                                <h2>Maggie jackson</h2><span>Active 1h ago</span>
                            </div>
                            <span class="icon return mdi mdi-chevron-left"></span>
                        </div>
                        <div class="chat-messages">
                            <div class="be-scroller">
                                <div class="content">
                                    <ul>
                                        <li class="friend">
                                            <div class="msg">Hello</div>
                                        </li>
                                        <li class="self">
                                            <div class="msg">Hi, how are you?</div>
                                        </li>
                                        <li class="friend">
                                            <div class="msg">Good, I'll need support with my pc</div>
                                        </li>
                                        <li class="self">
                                            <div class="msg">Sure, just tell me what is going on with your computer?
                                            </div>
                                        </li>
                                        <li class="friend">
                                            <div class="msg">I don't know it just turns off suddenly</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="chat-input">
                            <div class="input-wrapper"><span class="photo mdi mdi-camera"></span>
                                <input type="text" placeholder="Message..." name="q" autocomplete="off"><span
                                        class="send-msg mdi mdi-mail-send"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab2" role="tabpanel" class="tab-pane tab-todo">
                    <div class="todo-container">
                        <div class="todo-wrapper">
                            <div class="be-scroller">
                                <div class="todo-content"><span class="category-title">Today</span>
                                    <ul class="todo-list">
                                        <li>
                                            <div class="be-checkbox be-checkbox-sm"><span
                                                        class="delete mdi mdi-delete"></span>
                                                <input id="todo1" type="checkbox" checked="">
                                                <label for="todo1">Initialize the project</label>Dashboard
                                            </div>
                                        </li>
                                        <li>
                                            <div class="be-checkbox be-checkbox-sm"><span
                                                        class="delete mdi mdi-delete"></span>
                                                <input id="todo2" type="checkbox">
                                                <label for="todo2">Create the main structure</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="be-checkbox be-checkbox-sm"><span
                                                        class="delete mdi mdi-delete"></span>
                                                <input id="todo3" type="checkbox">
                                                <label for="todo3">Updates changes to GitHub</label>
                                            </div>
                                        </li>
                                    </ul>
                                    <span class="category-title">Tomorrow</span>
                                    <ul class="todo-list">
                                        <li>
                                            <div class="be-checkbox be-checkbox-sm"><span
                                                        class="delete mdi mdi-delete"></span>
                                                <input id="todo4" type="checkbox">
                                                <label for="todo4">Initialize the project</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="be-checkbox be-checkbox-sm"><span
                                                        class="delete mdi mdi-delete"></span>
                                                <input id="todo5" type="checkbox">
                                                <label for="todo5">Create the main structure</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="be-checkbox be-checkbox-sm"><span
                                                        class="delete mdi mdi-delete"></span>
                                                <input id="todo6" type="checkbox">
                                                <label for="todo6">Updates changes to GitHub</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="be-checkbox be-checkbox-sm"><span
                                                        class="delete mdi mdi-delete"></span>
                                                <input id="todo7" type="checkbox">
                                                <label for="todo7"
                                                       title="This task is too long to be displayed in a normal space!">This
                                                    task is too long to be displayed in a normal space!</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-input">
                            <input type="text" placeholder="Create new task..." name="q"><span
                                    class="mdi mdi-plus"></span>
                        </div>
                    </div>
                </div>
                <div id="tab3" role="tabpanel" class="tab-pane tab-settings">
                    <div class="settings-wrapper">
                        <div class="be-scroller"><span class="category-title">General</span>
                            <ul class="settings-list">
                                <li>
                                    <div class="switch-button switch-button-sm">
                                        <input type="checkbox" checked="" name="st1" id="st1"><span>
                            <label for="st1"></label></span>
                                    </div>
                                    <span class="name">Available</span>
                                </li>
                                <li>
                                    <div class="switch-button switch-button-sm">
                                        <input type="checkbox" checked="" name="st2" id="st2"><span>
                            <label for="st2"></label></span>
                                    </div>
                                    <span class="name">Enable notifications</span>
                                </li>
                                <li>
                                    <div class="switch-button switch-button-sm">
                                        <input type="checkbox" checked="" name="st3" id="st3"><span>
                            <label for="st3"></label></span>
                                    </div>
                                    <span class="name">Login with Facebook</span>
                                </li>
                            </ul>
                            <span class="category-title">Notifications</span>
                            <ul class="settings-list">
                                <li>
                                    <div class="switch-button switch-button-sm">
                                        <input type="checkbox" name="st4" id="st4"><span>
                            <label for="st4"></label></span>
                                    </div>
                                    <span class="name">Email notifications</span>
                                </li>
                                <li>
                                    <div class="switch-button switch-button-sm">
                                        <input type="checkbox" checked="" name="st5" id="st5"><span>
                            <label for="st5"></label></span>
                                    </div>
                                    <span class="name">Project updates</span>
                                </li>
                                <li>
                                    <div class="switch-button switch-button-sm">
                                        <input type="checkbox" checked="" name="st6" id="st6"><span>
                            <label for="st6"></label></span>
                                    </div>
                                    <span class="name">New comments</span>
                                </li>
                                <li>
                                    <div class="switch-button switch-button-sm">
                                        <input type="checkbox" name="st7" id="st7"><span>
                            <label for="st7"></label></span>
                                    </div>
                                    <span class="name">Chat messages</span>
                                </li>
                            </ul>
                            <span class="category-title">Workflow</span>
                            <ul class="settings-list">
                                <li>
                                    <div class="switch-button switch-button-sm">
                                        <input type="checkbox" name="st8" id="st8"><span>
                            <label for="st8"></label></span>
                                    </div>
                                    <span class="name">Deploy on commit</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
</div>
<script src="/public/v1/admin/assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
<script src="/public/v1/admin/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"
        type="text/javascript"></script>
<script src="/public/v1/admin/assets/js/main.js" type="text/javascript"></script>
<!--<script src="/public/v1/admin/assets/lib/chartjs/Chart.min.js" type="text/javascript"></script>-->
<!--<script src="/public/v1/admin/assets/js/app-charts-chartjs.js" type="text/javascript"></script>-->
<script src="/public/v1/admin/assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/public/v1/admin/assets/lib/jquery-flot/jquery.flot.js" type="text/javascript"></script>
<script src="/public/v1/admin/assets/lib/jquery-flot/jquery.flot.pie.js" type="text/javascript"></script>
<!--<script src="/public/v1/admin/assets/lib/jquery-flot/jquery.flot.resize.js" type="text/javascript"></script>-->
<!--<script src="/public/v1/admin/assets/lib/jquery-flot/plugins/jquery.flot.orderBars.js" type="text/javascript"></script>-->
<script src="/public/v1/admin/assets/lib/jquery-flot/plugins/curvedLines.js" type="text/javascript"></script>
<script src="/public/v1/admin/assets/lib/jquery.sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!--<script src="/public/v1/admin/assets/js/app-page-profile.js" type="text/javascript"></script>-->
<script src="/public/v1/admin/assets/lib/countup/countUp.min.js" type="text/javascript"></script>
<!--<script src="/public/v1/admin/assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>-->
<!--<script src="/public/v1/admin/assets/lib/jqvmap/jquery.vmap.min.js" type="text/javascript"></script>-->
<!--<script src="/public/v1/admin/assets/lib/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>-->
<script src="/public/v1/admin/assets/js/app-dashboard.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        //initialize the javascript
        App.init();
        App.dashboard();

    });
</script>
</body>
</html>
