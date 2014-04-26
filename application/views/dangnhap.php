<!DOCTYPE html>
<html lang="en">
<head>    
    <link rel="shortcut icon" href="<?=base_url()?>static/img/favicon.ico">

    <title>Đăng nhập - FlatPC Admin</title>
    
    <link href="<?=base_url()?>static/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>static/admin/css/bootstrap-reset.css" rel="stylesheet">    
    <link href="<?=base_url()?>static/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />    
    <link href="<?=base_url()?>static/admin/css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>static/admin/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">

    <div class="container">

      <form class="form-signin" action="index.html">
        <h2 class="form-signin-heading">Đăng nhập</h2>
        <div class="login-wrap">
            <input type="text" class="form-control" placeholder="Tài khoản" autofocus>
            <input type="password" class="form-control" placeholder="Mật khẩu">
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Ghi nhớ đăng nhập
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>

                </span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Đăng nhập</button>
            <p>or you can sign in via social network</p>
            <div class="login-social-link">
                <a href="index.html" class="facebook">
                    <i class="icon-facebook"></i>
                    Facebook
                </a>
                <a href="index.html" class="twitter">
                    <i class="icon-twitter"></i>
                    Twitter
                </a>
            </div>
            <div class="registration">
                Don't have an account yet?
                <a class="" href="registration.html">
                    Create an account
                </a>
            </div>

        </div>

          <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Forgot Password ?</h4>
                      </div>
                      <div class="modal-body">
                          <p>Enter your e-mail address below to reset your password.</p>
                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-success" type="button">Submit</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- modal -->

      </form>

    </div>
    
    <script src="<?=base_url()?>static/admin/js/jquery.js"></script>
    <script src="<?=base_url()?>static/admin/js/bootstrap.min.js"></script>


  </body>
</html>
