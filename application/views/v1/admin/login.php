<!DOCTYPE html>
  <body class="be-splash-screen">
    <div class="be-wrapper be-login">
      <div class="be-content">
        <div class="main-content container-fluid">
          <div class="splash-container">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
              <div class="panel-heading"><img src="/public/v1/admin/assets/img/logo-xx.png" alt="logo" width="102" height="27" class="logo-img"><span class="splash-description">请输入后台账号密码</span></div>
              <div class="panel-body">
                  <div class="form-group">
                    <input id="username" type="text" placeholder="账号" autocomplete="off" class="form-control">
                  </div>
                  <div class="form-group">
                    <input id="password" type="password" placeholder="密码" class="form-control">
                  </div>
                  <div class="form-group login-submit">
                      <input type="submit" data-dismiss="modal" class="btn btn-primary btn-xl"  value="立刻登陆" class="btn btn-primary" onclick="return check(this.form)">
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
    <script src="//cdn.bootcss.com/layer/2.3/layer.js"></script>
    <script type="text/javascript">
        <?php
            $code = json_decode($code,1);
            if ($code['code'] == 404) echo "layer.msg('".$code['msg']."');";
        ?>
    </script>

    <script type="text/javascript">
        function check(form) {
            var user = $("#username").val();
            var pass = $("#password").val();
            if(user=='') {
                layer.msg('账号不能为空！');
                return false;
            }
            if(pass==''){
                layer.msg('密码不能为空！');
                return false;
            }
            $.post("./login/verify", { username: user, password: pass },
                 function(data){
                 if (data['code'] == '404') return layer.msg(data['msg']);
                 return location.href="./";
                }, 'json');
            return true;
        }
    </script>
  </body>
</html>