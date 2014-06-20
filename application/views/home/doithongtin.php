<div class="row clearfix f-space20"></div>
<div class="container">		
<!-- row -->
	<div class="row">
    <div class="col-md-9 col-sm-12 col-xs-12 content-block account-pages">        
		  <div class="page-title"><h2>Thông tin tài khoản</h2></div>
      <div class="row clearfix f-space20"></div>
      <form id="user_info" action="<?=base_url('taikhoan/doithongtin')?>" method="post">
        <div class="row clearfix f-space20"></div>          
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="content-heading">Họ đệm</div>               
            <input class="input4" id="hodem" name="hodem" type="text" value="<?=$userinfo[0]['HODEM']?>">
            <?php echo form_error('hodem'); ?>
            <div class="content-heading">Tên</div>
            <input class="input4" id="ten" name="ten" type="text" value="<?=$userinfo[0]['TENNGUOIDUNG']?>">
            <?php echo form_error('ten'); ?>            
            <div class="content-heading">Tên đăng nhập</div>
            <input class="input4" id="tendangnhap" name="tendangnhap" type="<?php if ($userinfo[0]['TENDANGNHAP']==$userinfo[0]['SDT']) echo "hidden"; else echo "text"; ?>" value="<?=$userinfo[0]['TENDANGNHAP']?>" readonly>                        
            <input class="input4" id="tendangnhap2" name="tendangnhap2" type="<?php if ($userinfo[0]['TENDANGNHAP']==$userinfo[0]['SDT']) echo "text"; else echo "hidden"; ?>" value="<?php if ($userinfo[0]['TENDANGNHAP']==$userinfo[0]['SDT']) echo ""; else echo md5($userinfo[0]['SDT']); ?>">
            <?php echo form_error('tendangnhap2'); ?>
            <?php echo form_error('tendangnhap'); ?> 
            <div class="content-heading">Email</div>                            
            <input class="input4" id="email" name="email" type="<?php if ($userinfo[0]['EMAIL']==$userinfo[0]['SDT']) echo "hidden"; else echo "text"; ?>" value="<?php if ($userinfo[0]['EMAIL']!=$userinfo[0]['SDT']) echo $userinfo[0]['EMAIL']; else echo md5($userinfo[0]['SDT']).'@gmail.com'; ?>" readonly>                        
            <input class="input4" id="email2" name="email2" type="<?php if ($userinfo[0]['EMAIL']==$userinfo[0]['SDT']) echo "text"; else echo "hidden"; ?>" value="<?php if ($userinfo[0]['EMAIL']==$userinfo[0]['SDT']) echo ""; else echo md5($userinfo[0]['SDT']).'@gmail.com'; ?>">
            <?php echo form_error('email2'); ?> 
            <?php echo form_error('email'); ?>
            <div class="content-heading">Ngày sinh</div>
            <input class="input4" id="birth" name="birth" type="text" value="<?=date('d-m-Y',strtotime($userinfo[0]['NGAYSINH']))?>">
            <?php echo form_error('birth'); ?>
            <div class="content-heading">Giới tính</div>   
                <div class="col-md-4"></div>                         
                <div class="col-md-3"><input type="radio" name="gioitinh" value="1" <?php if ($userinfo[0]['GIOITINH']==1) echo 'checked'; ?>>Nam</input></div>
                <input type="radio" name="gioitinh" value="0" <?php if ($userinfo[0]['GIOITINH']==0) echo 'checked'; ?>>Nữ</input>                                          
            <div class="content-heading">Địa chỉ</div>                
            <input class="input4" id="diachi" name="diachi" type="text" value="<?=$userinfo[0]['DIACHI']?>">
            <?php echo form_error('diachi'); ?>
            <div class="content-heading">CMND</div>                
            <input class="input4" id="cmnd" name="cmnd" type="text" value="<?=$userinfo[0]['CMND']?>">
            <?php echo form_error('cmnd'); ?>
            <div class="content-heading">SĐT</div>
            <input class="input4" id="sdt" name="sdt" type="text" value="<?=$userinfo[0]['SDT']?>" readonly>
            <?php echo form_error('sdt'); ?>
        </div>
        <button class="btn large color1 pull-left" type="button" onclick="window.location.href='<?=base_url('taikhoan')?>'">Trở lại</button>
        <button class="btn large color1 pull-right" type="submit" form="user_info">Tiếp tục</button>
      </form>
    </div>   
		<?php $this->load->view('home/sidebar',$this->data); ?>	
  </div>  
</div>