<?php
/**
 * Created by PhpStorm.
 * User: 皮皮赖（https://www.52bz.la）
 * Date: 2018/11/25 0025
 * Time: 7:44
 */
?>
<body>
    <div class="be-content">
        <div class="page-head">
            <h2 class="page-head-title">基本设置</h2>
            <ol class="breadcrumb page-head-nav">
                <li><a href="#">首页</a></li>
                <li><a href="#">设置</a></li>
                <li class="active">基本设置</li>
            </ol>
        </div>
        <div class="main-content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default panel-border-color panel-border-color-primary">
                        <div class="panel-heading panel-heading-divider">网站设置</div>
                        <div class="panel-body form-horizontal group-border-dashed">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">网站名称</label>
                                    <div class="col-sm-6">
                                        <input type="text" required="" placeholder="网站名称" class="form-control" id="title" value="<?= $val['0']['content']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">网站描述</label>
                                    <div class="col-sm-6">
                                        <input type="text" required="" data-parsley-minlength="6" placeholder="网站描述" class="form-control" id="describe" value="<?= $val['1']['content']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">网站关键词</label>
                                    <div class="col-sm-6">
                                        <input type="text" required="" data-parsley-maxlength="6" placeholder="例:图床,新浪图床" class="form-control" id="keyword" value="<?= $val['2']['content']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">图片格式</label>
                                    <div class="col-sm-6">
                                        <input type="text" required="" data-parsley-length="[5,10]" placeholder="例:.jpg,.gif" class="form-control" id="format" value="<?= $val['3']['content']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">鉴黄功能</label>
                                    <div class="col-sm-6">
                                        <div class="be-checkbox">
                                                <input <?php if($val['4']['content']) echo 'checked="checked"'  ?> id="Level-3-piece" name="Level-3-piece" type="checkbox" data-parsley-multiple="groups" value="1" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" id="Level-3-piec" >
                                                <label for="Level-3-piece">开/关</label>
                                        </div>
                                        <div id="error-container2"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">接口显示</label>
                                    <div class="col-sm-6">
                                        <div role="alert" class="alert alert-warning alert-icon alert-icon-colored alert-dismissible">
                                            <div class="icon"><span class="mdi mdi-alert-triangle"></span></div>
                                            <div class="message">
                                                <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true" class="mdi mdi-close"></span></button><strong>温馨提示：</strong>目前支持的接口有： <?php foreach ($file_name as $item):?><?= $item?>,<?php endforeach;?>
                                            </div>
                                        </div>
                                                <input type="text" required=""  class="form-control" value="<?php foreach ($file_name as $item):?><?= $item?>,<?php endforeach;?>" id="imgsapi">
                                        <div id="error-container2"></div>
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
    function check(form) {
        var title = $("#title").val();
        var describe = $("#describe").val();
        var keyword = $("#keyword").val();
        var format = $('#format').val();
        var imgsapi = $('#imgsapi').val();
        var identify = $('#Level-3-piece').val();
        if(title=='') {
            layer.alert('网站标题不能为空！');
            return false;
        }
        if (describe == "")
        {
            layer.alert('网站描述不能为空！');
            return false;
        }
        if (keyword == "")
        {
            layer.alert('网站关键词不能为空！');
            return false;
        }
        if (format == "")
        {
            layer.alert('图片格式不能为空！');
            return false;
        }
        if (imgsapi == "")
        {
            layer.alert('图片接口不能为空！');
            return false;
        }
        $.post("./setting/update", { title: title, describe: describe, keyword:keyword,format:format,imgsapi:imgsapi,identify:identify},
            function(data){
                return layer.alert(data['msg']);
            }, 'json');
        return true;
    }
</script>
</body>
</html>