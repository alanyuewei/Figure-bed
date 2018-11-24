<?php
/**
 * Created by PhpStorm.
 * User: 皮皮赖（https://www.52bz.la）
 * Date: 2018/11/22 0022
 * Time: 7:45
 */
?>
<body>
<div class="be-wrapper be-fixed-sidebar">
<nav class="navbar navbar-default navbar-fixed-top be-top-header">
    <div class="container-fluid">
        <div class="navbar-header"><a href="index.html" class="navbar-brand"></a></div>
        <div class="be-right-navbar">
            <ul class="nav navbar-nav navbar-right be-user-nav">
                <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><img src="/public/v1/admin/assets/img/avatar.png" alt="Avatar"><span class="user-name">Túpac Amaru</span></a>
                    <ul role="menu" class="dropdown-menu">
                        <li>
                            <div class="user-info">
                                <div class="user-name">Túpac Amaru</div>
                                <div class="user-position online">Available</div>
                            </div>
                        </li>
                        <li><a href="#"><span class="icon mdi mdi-face"></span> Account</a></li>
                        <li><a href="#"><span class="icon mdi mdi-settings"></span> Settings</a></li>
                        <li><a href="#"><span class="icon mdi mdi-power"></span> Logout</a></li>
                    </ul>
                </li>
            </ul>
            <div class="page-title"><span>Dashboard</span></div>
            <ul class="nav navbar-nav navbar-right be-icons-nav">
                <li class="dropdown"><a href="#" role="button" aria-expanded="false" class="be-toggle-right-sidebar"><span class="icon mdi mdi-settings"></span></a></li>
                <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><span class="icon mdi mdi-notifications"></span><span class="indicator"></span></a>
                    <ul class="dropdown-menu be-notifications">
                        <li>
                            <div class="title">Notifications<span class="badge">3</span></div>
                            <div class="list">
                                <div class="be-scroller">
                                    <div class="content">
                                        <ul>
                                            <li class="notification notification-unread"><a href="#">
                                                    <div class="image"><img src="/public/v1/admin/assets/img/avatar2.png" alt="Avatar"></div>
                                                    <div class="notification-info">
                                                        <div class="text"><span class="user-name">Jessica Caruso</span> accepted your invitation to join the team.</div><span class="date">2 min ago</span>
                                                    </div></a></li>
                                            <li class="notification"><a href="#">
                                                    <div class="image"><img src="/public/v1/admin/assets/img/avatar3.png" alt="Avatar"></div>
                                                    <div class="notification-info">
                                                        <div class="text"><span class="user-name">Joel King</span> is now following you</div><span class="date">2 days ago</span>
                                                    </div></a></li>
                                            <li class="notification"><a href="#">
                                                    <div class="image"><img src="/public/v1/admin/assets/img/avatar4.png" alt="Avatar"></div>
                                                    <div class="notification-info">
                                                        <div class="text"><span class="user-name">John Doe</span> is watching your main repository</div><span class="date">2 days ago</span>
                                                    </div></a></li>
                                            <li class="notification"><a href="#">
                                                    <div class="image"><img src="/public/v1/admin/assets/img/avatar5.png" alt="Avatar"></div>
                                                    <div class="notification-info"><span class="text"><span class="user-name">Emily Carter</span> is now following you</span><span class="date">5 days ago</span></div></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="footer"> <a href="#">View all notifications</a></div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><span class="icon mdi mdi-apps"></span></a>
                    <ul class="dropdown-menu be-connections">
                        <li>
                            <div class="list">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-xs-4"><a href="#" class="connection-item"><img src="/public/v1/admin/assets/img/github.png" alt="Github"><span>GitHub</span></a></div>
                                        <div class="col-xs-4"><a href="#" class="connection-item"><img src="/public/v1/admin/assets/img/bitbucket.png" alt="Bitbucket"><span>Bitbucket</span></a></div>
                                        <div class="col-xs-4"><a href="#" class="connection-item"><img src="/public/v1/admin/assets/img/slack.png" alt="Slack"><span>Slack</span></a></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4"><a href="#" class="connection-item"><img src="/public/v1/admin/assets/img/dribbble.png" alt="Dribbble"><span>Dribbble</span></a></div>
                                        <div class="col-xs-4"><a href="#" class="connection-item"><img src="/public/v1/admin/assets/img/mail_chimp.png" alt="Mail Chimp"><span>Mail Chimp</span></a></div>
                                        <div class="col-xs-4"><a href="#" class="connection-item"><img src="/public/v1/admin/assets/img/dropbox.png" alt="Dropbox"><span>Dropbox</span></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="footer"> <a href="#">More</a></div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="be-left-sidebar">
    <div class="left-sidebar-wrapper"><a href="#" class="left-sidebar-toggle">首页</a>
        <div class="left-sidebar-spacer">
            <div class="left-sidebar-scroll">
                <div class="left-sidebar-content">
                    <ul class="sidebar-elements">
                        <li class="divider">菜单</li>
                        <li class="active"><a href="index.html"><i class="icon mdi mdi-home"></i><span>首页</span></a>
                        </li>
                        <li class="parent"><a href="#"><i class="icon mdi mdi-face"></i><span>设置</span></a>
                            <ul class="sub-menu">
                                <li><a href="ui-alerts.html">Alerts</a>
                                </li>
                                <li><a href="ui-buttons.html">Buttons</a>
                                </li>
                                <li><a href="ui-panels.html">Panels</a>
                                </li>
                                <li><a href="ui-general.html">General</a>
                                </li>
                                <li><a href="ui-modals.html">Modals</a>
                                </li>
                                <li><a href="ui-notifications.html">Notifications</a>
                                </li>
                                <li><a href="ui-icons.html">Icons</a>
                                </li>
                                <li><a href="ui-grid.html">Grid</a>
                                </li>
                                <li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a>
                                </li>
                                <li><a href="ui-nestable-lists.html">Nestable Lists</a>
                                </li>
                                <li><a href="ui-typography.html"><span class="label label-primary pull-right">New</span>Typography</a>
                                </li>
                            </ul>
                        </li>
                        <li class="parent"><a href="charts.html"><i class="icon mdi mdi-chart-donut"></i><span>违规</span></a>
                            <ul class="sub-menu">
                                <li><a href="charts-flot.html">Flot</a>
                                </li>
                                <li><a href="charts-sparkline.html">Sparklines</a>
                                </li>
                                <li><a href="charts-chartjs.html">Chart.js</a>
                                </li>
                                <li><a href="charts-morris.html">Morris.js</a>
                                </li>
                            </ul>
                        </li>
                        <li class="parent"><a href="#"><i class="icon mdi mdi-dot-circle"></i><span>友链</span></a>
                            <ul class="sub-menu">
                                <li><a href="form-elements.html">Elements</a>
                                </li>
                                <li><a href="form-validation.html">Validation</a>
                                </li>
                                <li><a href="form-wizard.html">Wizard</a>
                                </li>
                                <li><a href="form-masks.html">Input Masks</a>
                                </li>
                                <li><a href="form-wysiwyg.html">WYSIWYG Editor</a>
                                </li>
                                <li><a href="form-upload.html">Multi Upload</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="progress-widget">
            <div class="progress-data"><span class="progress-value">60%</span><span class="name">Current Project</span></div>
            <div class="progress">
                <div style="width: 60%;" class="progress-bar progress-bar-primary"></div>
            </div>
        </div>
    </div>
</div>

