<div class="row clearfix f-space20"></div>
    <div class="container">   
        <!-- row -->
        <div class="row">
            <div class="col-md-9 col-sm-12 col-xs-12 content-block account-pages">
                <div class="page-title"><h2>Thông tin đặt hàng</h2></div>
                <div class="row clearfix f-space20"></div>
                <center><h3><b>CHI TIẾT ĐƠN HÀNG</b></h3></center>                
                <div class="col-md-3"></div>
                <div class="col-md-4"><b>Mã hóa đơn:</b> #<?=$thongtindathang[0]['ID']?></div>
                <div class="col-md-4"><b>PT vận chuyển:</b> <?php if ($thongtindathang[0]['PTVANCHUYEN']==0) echo 'Thông thường'; else echo 'Nhanh';?></div>
                <div class="col-md-3"></div>
                <div class="col-md-4"><b>Ngày đặt hàng:</b> <?=date('d-m-Y',strtotime($thongtindathang[0]['NGAYDATHANG']))?></div>
                <div class="col-md-4"><b>PT thanh toán:</b> <?php if ($thongtindathang[0]['PTTHANHTOAN']==0) echo 'Trực tiếp'; else echo 'Chuyển khoản';?></div>
                <div class="col-md-3"></div>
                <div class="col-md-4"><b>Ngày thanh toán:</b> <?php if ($thongtindathang[0]['NGAYTHANHTOAN']) echo date('d-m-Y',strtotime($thongtindathang[0]['NGAYTHANHTOAN']))?></div>
                <div class="col-md-4"><b>Tình trạng:</b> <?php if ($thongtindathang[0]['TINHTRANG']==-1) echo '<span style="color: green;">Hoàn thành</span>'; elseif ($thongtindathang[0]['TINHTRANG']==2) echo '<span style="color: orange;">Đang xử lý</span>'; elseif ($thongtindathang[0]['TINHTRANG']==1) echo '<span style="color: yellow;">Chờ xác nhận</span>'; else echo '<span style="color: red;">Đã hủy</span>';?></div><br><br><br>
                <hr>                 
                <div class="col-md-3"></div><div class="col-md-4"><h3><b>THÔNG TIN THANH TOÁN</b></h3></div><div class="col-md-3"><h3><b>ĐỊA CHỈ GIAO HÀNG</b></h3></div>
                <div class="col-md-3"></div><div class="col-md-4"><?=$thongtindathang[0]['TENKHACHHANG']?></div><div class="col-md-3"><?=$thongtindathang[0]['TENNGUOINHAN']?></div>
                <div class="col-md-3"></div><div class="col-md-4"><?=$thongtindathang[0]['SDTKHACHHANG']?></div><div class="col-md-3"><?=$thongtindathang[0]['SDTNGUOINHAN']?></div>
                <div class="col-md-3"></div><div class="col-md-4"></div><div class="col-md-3"><?=$thongtindathang[0]['DIACHI']?></div>
                <br><br><br><br><br><br>
                <hr>
                <center><h3><b>SẢN PHẨM ĐẶT MUA</b></h3></center>                
                <div class="col-md-4"><strong>Tên sản phẩm</strong></div><div class="col-md-2"><strong>Loại</strong></div><div class="col-md-2"><strong>Số lượng</strong></div><div class="col-md-2"><strong>Đơn giá</strong></div><div class="col-md-2"><strong>Tổng cộng</strong></div><br><br>
                <?php foreach ($danhsachdathang as $item) { ?>                  
                <div class="col-md-4"><?=$item['TENSANPHAM']?></div><div class="col-md-2"><?=$item['TENLOAI']?></div><div class="col-md-2"><?=$item['SOLUONG']?></div><div class="col-md-2"><?=number_format($item['DONGIA'], 0, ',', '.')?> đ</div><div class="col-md-2"><?=number_format($item['DONGIA']*$item['SOLUONG'], 0, ',', '.')?> đ</div><br><br><br>
                <?php } ?>                
                <div class="col-md-2 pull-right"><?=number_format($thongtindathang[0]['THANHTIEN'], 0, ',', '.')?> đ</div><div class="col-md-2 pull-right"><strong>Tổng tiền:</strong></div><br>
                <div class="col-md-2 pull-right"><?php if ($thongtindathang[0]['PTVANCHUYEN']==1) echo '50.000 đ'; else echo '0 đ'; ?></div><div class="col-md-2 pull-right"><strong>Phí khác:</strong></div><br>
                <div class="col-md-2 pull-right"><?=number_format($thongtindathang[0]['THANHTIEN']*0.1, 0, ',', '.')?> đ</div><div class="col-md-2 pull-right"><strong>VAT (10%):</strong></div><br>
                <div class="col-md-2 pull-right"><?=number_format($thongtindathang[0]['TONGTIEN'], 0, ',', '.')?> đ</div><div class="col-md-2 pull-right"><strong>Thành tiền:</strong></div><br><br>
                <center><button class="btn large color1" type="button" onclick="window.location.href='<?=base_url()?>taikhoan/lichsudathang'">Trở lại</button></center>
            </div>
            <?php $this->load->view('home/sidebar',$this->data); ?> 
        </div>
    </div>