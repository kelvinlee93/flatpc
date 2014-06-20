<div class="row clearfix f-space20"></div>
<div class="container">   
<!-- row -->
  <div class="row">
    <div class="col-md-9 col-sm-12 col-xs-12 content-block account-pages">
        <div class="page-title"><h2>Lịch sử đặt hàng</h2></div>  
        <div class="row clearfix f-space30"></div>
        <table  class="display table table-bordered table-striped" id="example">
          <thead>
          <tr>
              <th>Mã đơn hàng</th>                                          
              <th>Ngày đặt hàng</th>
              <th>Ngày thanh toán</th>
              <th>PT thanh toán</th>              
              <th>Tổng tiền</th>
              <th>Tình trạng</th>                         
          </tr>
          </thead>
          <tbody>
          <?php if ($lichsudathang) { foreach ($lichsudathang as $item) { ?>                                                                   
             <tr>                                                                                   
                <td><center><a href="<?=base_url()?>taikhoan/lichsudathang?id=<?=$item['ID']?>"><span style="color: black;"><?=$item['ID']?></span></a></center></td>
                <td><center><a href="<?=base_url()?>taikhoan/lichsudathang?id=<?=$item['ID']?>"><span style="color: black;"><?=date('Y-m-d', strtotime($item['NGAYDATHANG']))?></span></a></center></td>
                <td><center><a href="<?=base_url()?>taikhoan/lichsudathang?id=<?=$item['ID']?>"><span style="color: black;"><?php if ($item['NGAYTHANHTOAN']) echo date('Y-m-d', strtotime($item['NGAYTHANHTOAN']));?></span></a></center></td>
                <td><center><a href="<?=base_url()?>taikhoan/lichsudathang?id=<?=$item['ID']?>"><span style="color: black;"><?php if ($item['PTTHANHTOAN']==1) echo 'Chuyển khoản'; else echo 'Trực tiếp'; ?></span></a></center></td>                
                <td><center><a href="<?=base_url()?>taikhoan/lichsudathang?id=<?=$item['ID']?>"><span style="color: black;"><?=number_format($item['TONGTIEN'], 0, ',', '.');?> đ</span></a></center></td>
                <td><center><a href="<?=base_url()?>taikhoan/lichsudathang?id=<?=$item['ID']?>">
                    <?php if ($item['TINHTRANG']==0) echo '<span style="color: red;">Đã hủy</span>';
                    elseif ($item['TINHTRANG']==1) echo '<span style="color: orange;">Chờ xác nhận</span>';
                    elseif ($item['TINHTRANG']==2) echo '<span style="color: blue;">Đang xử lý</span>';
                    elseif ($item['TINHTRANG']==-1) echo '<span style="color: green;">Hoàn thành</span>';
                    ?>
                </a></center></td>                
             </tr>    
          <?php } } ?> 
          </tbody>          
        </table>
        <div class="row clearfix f-space30"></div>
        <center><button class="btn large color1 pull-left" type="button" onclick="window.location.href='<?=base_url()?>taikhoan'">Trở lại</button></center>                            
    </div>

    <?php $this->load->view('home/sidebar',$this->data); ?> 
  </div>  
</div>
