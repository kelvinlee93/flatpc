<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">    
    <link href="<?=base_url()?>static/home/images/favicon.ico" rel="icon" type="image/x-icon" />

    <title>Đăng ký thành viên - FlatPC</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>static/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>static/admin/css/bootstrap-reset.css" rel="stylesheet">    

    <!--external css-->    
    <link href="<?=base_url()?>static/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <!-- Custom styles for this template -->
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

      <form class="form-signin" action="<?=base_url()?>dangky" method="post">
        <h2 class="form-signin-heading">ĐĂNG KÝ</h2>
        <div class="login-wrap">            
            <p> Thông tin cá nhân</p>
            <?php echo form_error('firstname'); ?>                        
            <input class=" form-control" id="firstname" name="firstname" type="text" value="<?php echo set_value('firstname'); ?>" placeholder="Họ đệm (bắt buộc)"/>
            <?php echo form_error('lastname'); ?>
            <input class=" form-control" id="lastname" name="lastname" type="text" value="<?php echo set_value('lastname'); ?>" placeholder="Tên (bắt buộc)"/>
            <?php echo form_error('email'); ?>
            <input class="form-control " id="email" name="email" type="text" value="<?php echo set_value('email'); ?>" placeholder="Email (bắt buộc)"/>
            <?php echo form_error('birth'); ?>
            <input type="text" id="birth" name="birth" class="form-control" value="<?php echo set_value('birth');?>" placeholder="Ngày sinh (dd-mm-yyyy) (bắt buộc)"/>
            <?php echo form_error('sdt'); ?>
            <input type="text" id="sdt" name="sdt" class="form-control" value="<?php echo set_value('sdt'); ?>" placeholder="Số điện thoại (bắt buộc)"/>            
            <?php echo form_error('address'); ?>
            <input class="form-control " id="address" name="address" type="text" value="<?php echo set_value('address');?>" placeholder="Địa chỉ"/>
            <?php echo form_error('city'); ?>
            <select class="form-control m-bot15" id="city" name="city">
                  <option value="">Chọn tỉnh thành</option>
                <?php foreach ($tinhthanh as $item) { ?>
                  <option value="<?=$item['ID']?>" <?php if (set_value('city')==$item['ID']) echo 'selected' ?>><?=$item['TENTINHTHANH']?></option>
                <?php } ?>                                                                                            
            </select>            
            <div class="radios">
                <label class="label_radio col-lg-6 col-sm-6" for="radio-01">
                    <input id="male" name="sex" value="1" type="radio" checked /> Nam
                </label>
                <label class="label_radio col-lg-6 col-sm-6" for="radio-02">
                    <input id="female" name="sex" value="0" type="radio" /> Nữ
                </label>
            </div>
            <?php echo form_error('sex'); ?>

            <p> Thông tin tài khoản (bắt buộc)</p>
            <?php echo form_error('username'); ?>
            <input class=" form-control" id="username" name="username" type="text" value="<?php echo set_value('username'); ?>" placeholder="Tên đăng nhập"/>
            <?php echo form_error('password'); ?>
            <input class="form-control " id="password" name="password" type="password" placeholder="Mật khẩu"/>
            <?php echo form_error('confirm_password'); ?>
            <input class="form-control " id="confirm_password" name="confirm_password" type="password" placeholder="Nhập lại mật khẩu"/>            
            <?php echo form_error('captcha'); ?>
            <input class="form-control " id="captcha" name="captcha" type="text" placeholder="Mã xác nhận"/>                                    
            <center><?php echo $captcha['image']; ?></center>
            </br>  
            <?php echo form_error('agree'); ?>                  
            <label class="checkbox">                
                <input id="agree" name="agree" type="checkbox" value="agree this condition"> Tôi đồng ý với các Điều khoản dịch vụ và Chính sách bảo mật của FlatPC
            </label>            
            <button class="btn btn-lg btn-login btn-block" type="submit">ĐĂNG KÝ</button>          
            <button class="btn btn-lg btn-info btn-block" type="button" onclick="window.location.href='<?=base_url()?>'">VỀ TRANG CHỦ</button>
        </div>

      </form>

    </div>  
      
  </body>

</html>
