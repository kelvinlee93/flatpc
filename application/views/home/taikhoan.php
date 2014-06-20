<div class="row clearfix f-space20"></div>
<div class="container">		
<!-- row -->
	<div class="row">	
		<div class="col-md-9 col-sm-12 col-xs-12 content-block account-pages">			
			<div class="page-title"><h2><strong>TÀI KHOẢN</strong></h2></div>
			<div class="row clearfix f-space30"></div>
				<center>
				<a class="btn large color1" href="<?=base_url('taikhoan/doithongtin')?>">Đổi thông tin</a>
		  		<a class="btn large color1" href="<?=base_url('taikhoan/doimatkhau')?>">Đổi mật khẩu</a>
		  		</center>		  		  				
			<div class="row clearfix f-space30"></div>
			<div class="page-title"><h2><strong>ĐƠN HÀNG</strong></h2></div>
			<div class="row clearfix f-space30"></div>
				<center>
				<a class="btn large color1" href="<?=base_url('taikhoan/lichsudathang')?>">Lịch sử đặt hàng</a>		  		
				<a class="btn large color1" href="<?=base_url('taikhoan/lichsumuahang')?>">Lịch sử mua hàng</a>
				</center>		  		
		</div>
		<?php $this->load->view('home/sidebar',$this->data); ?>
	</div>
</div>