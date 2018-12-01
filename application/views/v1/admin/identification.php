<?php
/**
 * Created by PhpStorm.
 * User: 皮皮赖（https://www.52bz.la）
 * Date: 2018/12/1 0001
 * Time: 7:11
 */
?>
<body>
<div class="be-content">
    <div class="page-head">
        <h2 class="page-head-title">基本设置</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">首页</a></li>
            <li><a href="#">设置</a></li>
            <li class="active">账号设置</li>
        </ol>
    </div>
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="panel-heading panel-heading-divider">新浪账号</div>
                    <div class="panel-body form-horizontal group-border-dashed">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">账号</label>
                            <div class="col-sm-6">
                                <input type="text" required="" placeholder="例:a@0oo.ren" class="form-control" id="user" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">密码</label>
                            <div class="col-sm-6">
                                <input type="text" required="" data-parsley-minlength="6" placeholder="例:123456" class="form-control" id="pass" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-space btn-primary" onclick="return scheck(this.form)" >提交</button>
                            </div>
                        </div>

                    </div>
                </div>
                <br/>
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="panel-heading panel-heading-divider">鉴黄账号</div>
                    <div class="panel-body form-horizontal group-border-dashed">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">网站名称</label>
                            <div class="col-sm-6">
                                <input type="text" required="" placeholder="网站名称" class="form-control" id="title" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">网站描述</label>
                            <div class="col-sm-6">
                                <input type="text" required="" data-parsley-minlength="6" placeholder="网站描述" class="form-control" id="describe" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-space btn-primary" onclick="return check(this.form)" >提交</button>
                            </div>
                        </div>

                    </div>
                </div>
        </div>
    </div>
</div>
</div>
<script src="/public/v1/admin/assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
<script src="/public/v1/admin/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="/public/v1/admin/assets/js/main.js" type="text/javascript"></script>
<script src="/public/v1/admin/assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<!--<script src="/public/v1/admin/assets/lib/parsley/parsley.min.js" type="text/javascript"></script>-->
<script src="//cdn.bootcss.com/layer/2.3/layer.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        //initialize the javascript
        App.init();
        $('form').parsley();
    });
    function scheck(form) {
        var user = $("#user").val();
        var pass = $("#pass").val();
        $.post("./identification/sina", { user: user, pass: pass},
            function(data){
                return layer.alert(data['msg']);
            }, 'json');
        return true;
    }
</script>
</body>
</html>
