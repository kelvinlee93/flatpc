<div class="row clearfix f-space20"></div>
<div class="container">		
<!-- row -->
	<div class="row">
    <div class="col-md-9 col-sm-12 col-xs-12 content-block account-pages">	
		  <div class="page-title"><h2>Đổi mật khẩu</h2></div>
      <div class="row clearfix f-space20"></div>
      <form action="" method="post">        
        <div class="row clearfix f-space20"></div>  
        <div class="col-md-3 col-sm-12 col-xs-12"></div>
        <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="content-heading">Mật khẩu cũ</div>                
              <input class="input4" id="matkhaucu" name="matkhaucu" type="password">
              <?php echo form_error('matkhaucu'); ?>
              <div class="content-heading">Mật khẩu mới</div>
              <input class="input4" id="matkhaumoi" name="matkhaumoi" type="password">
              <?php echo form_error('matkhaumoi'); ?>
              <div class="content-heading">Nhập lại mật khẩu mới</div>
              <input class="input4" id="rematkhau" name="rematkhau" type="password">  
              <?php echo form_error('rematkhau'); ?>      
        <button class="btn large color1 pull-left" type="button" onclick="window.location.href='<?=base_url('taikhoan')?>'">Trở lại</button>
        <button class="btn large color1 pull-right" type="submit">Tiếp tục</button>
        </div>
      </form>
    </div>   
		<?php $this->load->view('home/sidebar',$this->data); ?>	
  </div>  
</div>