      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- invoice start-->
              <section>
                  <div class="panel panel-primary">
                      <!--<div class="panel-heading navyblue"> INVOICE</div>-->
                      <div class="panel-body">
                          <div class="row invoice-list">
                              <div class="text-center corporate-id">
                                  <h2>THÔNG TIN HÓA ĐƠN</h2>
                              </div>
                              <div class="col-lg-4 col-sm-4">
                                  <h4>KHÁCH HÀNG</h4>
                                  <p>
                                      <?=$chitiet[0]['TENKHACHHANG']?> <br>                                      
                                      <?='SĐT: '.$chitiet[0]['SDTKHACHHANG']?><br>
                                      <?php echo 'Thanh toán: '; if ($chitiet[0]['PTTHANHTOAN']==1) echo 'CHUYỂN KHOẢN'; else echo 'TRỰC TIẾP'; ?><br>
                                  </p>
                              </div>
                              <div class="col-lg-4 col-sm-4">
                                  <h4>GIAO HÀNG</h4>
                                  <p>
                                      <?=$chitiet[0]['TENNGUOINHAN']?> <br>
                                      <?php if ($chitiet[0]['DIACHI']) echo $chitiet[0]['DIACHI'].'<br>'?>                                      
                                      <?='SĐT: '.$chitiet[0]['SDTNGUOINHAN']?><br>
                                      <?php echo 'Vận chuyển: '; if ($chitiet[0]['PTVANCHUYEN']==1) echo 'NHANH'; else echo 'THÔNG THƯỜNG'; ?><br>
                                  </p>
                              </div>
                              <div class="col-lg-4 col-sm-4">
                                  <h4>ĐƠN HÀNG</h4>
                                  <ul class="unstyled">
                                      <li>Mã đơn hàng: <strong>#<?=$chitiet[0]['ID']?></strong></li>
                                      <li>Ngày đặt hàng: <?=date('d-m-Y',strtotime($chitiet[0]['NGAYDATHANG']))?></li>
                                      <?php if ($chitiet[0]['NGAYTHANHTOAN'])
                                                echo '<li>Ngày thanh toán: '.date('d-m-Y',strtotime($chitiet[0]['NGAYTHANHTOAN'])).'</li>';
                                      ?>
                                      <li>Tình trạng: <?php if ($chitiet[0]['TINHTRANG']==0) echo 'ĐÃ HỦY';
                                                              elseif ($chitiet[0]['TINHTRANG']==1) echo 'CHỜ XÁC NHẬN';
                                                                elseif ($chitiet[0]['TINHTRANG']==2) echo 'ĐANG XỬ LÝ';
                                                                  elseif ($chitiet[0]['TINHTRANG']==-1) echo 'ĐÃ THANH TOÁN';
                                      ?>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                          <table class="table table-striped table-hover">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Loại sản phẩm</th>
                                  <th>Tên sản phẩm</th>
                                  <th>Bảo hành</th>
                                  <th>Số lượng</th>
                                  <th>Đơn giá</th>                                  
                                  <th>Thành tiền</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $i = 1; foreach ($hoadon as $item)
                              {
                                  echo '
                                  <tr>
                                      <td>'.$i.'</td>
                                      <td>'.$item['TENLOAI'].'</td>
                                      <td>'.$item['TENSANPHAM'].'</td>
                                      <td>'.$item['BAOHANH'].'</td>
                                      <td>'.$item['SOLUONG'].'</td>
                                      <td>'.number_format($item['DONGIA'], 0, ',', '.').' đ</td>                                      
                                      <td>'.number_format($item['THANHTIEN'], 0, ',', '.').' đ</td>
                                  </tr> 
                                  ';
                                  $i++;   
                              } 
                              ?>                                                            
                              </tbody>
                          </table>
                          <div class="row">
                              <div class="col-lg-4 invoice-block pull-right">                                  
                                  <ul class="unstyled amounts">
                                      <li align="left"><strong>Tổng tiền:</strong> <?=number_format($chitiet[0]['THANHTIEN'], 0, ',', '.')?> đ</li>
                                      <li align="left"><strong>Giảm giá:</strong> <?php if ($chitiet[0]['GIAMGIA']) echo $chitiet[0]['GIAMGIA']; else echo '0';?> đ</li>
                                      <li align="left"><strong>Phí vận chuyển :</strong> <?php if ($chitiet[0]['PTVANCHUYEN']==1) echo '50.000'; else echo '0';?> đ</li>
                                      <li align="left"><strong>VAT (10%) :</strong> <?=number_format($chitiet[0]['THANHTIEN']*0.1, 0, ',', '.')?> đ</li>
                                      <li align="left"><strong>Tổng cộng :</strong> <?=number_format($chitiet[0]['TONGTIEN'], 0, ',', '.')?> đ</li>
                                  </ul>
                              </div>
                          </div>
                          <div class="text-center invoice-btn">                                  
                              <button class="btn btn-info" type="button" onclick="window.location.href='<?=base_url()?>admin/hoadon/inhoadon?id=<?=$chitiet[0]['ID']?>'"><i class="icon-print"></i> In Hóa Đơn </button>
                              <button class="btn btn-default" type="button" onclick="window.location.href='<?=base_url('admin/hoadon')?>'"><i class="icon-reply"></i> Trở lại </button>                                                            
                          </div>
                      </div>
                  </div>
              </section>
              <!-- invoice end-->
          </section>
      </section>
      <!--main content end-->      