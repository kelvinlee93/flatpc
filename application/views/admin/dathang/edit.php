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
                                  <h2>THÔNG TIN ĐẶT HÀNG</h2>
                              </div>
                              <div class="col-lg-4 col-sm-4">
                                  <h4>KHÁCH HÀNG</h4>
                                  <p>
                                      <?=$thongtin[0]['TENKHACHHANG']?> <br>                                      
                                      <?='SĐT: '.$thongtin[0]['SDTKHACHHANG']?><br>
                                      <?php echo 'Thanh toán: '; if ($thongtin[0]['PTTHANHTOAN']==1) echo 'CHUYỂN KHOẢN'; else echo 'TRỰC TIẾP'; ?><br>
                                  </p>
                              </div>
                              <div class="col-lg-4 col-sm-4">
                                  <h4>GIAO HÀNG</h4>
                                  <p>
                                      <?=$thongtin[0]['TENNGUOINHAN']?> <br>
                                      <?php if ($thongtin[0]['DIACHI']) echo $thongtin[0]['DIACHI'].'<br>'?>                                      
                                      <?='SĐT: '.$thongtin[0]['SDTNGUOINHAN']?><br>
                                      <?php echo 'Vận chuyển: '; if ($thongtin[0]['PTVANCHUYEN']==1) echo 'NHANH'; else echo 'THÔNG THƯỜNG'; ?><br>
                                  </p>
                              </div>
                              <div class="col-lg-4 col-sm-4">
                                  <h4>ĐƠN HÀNG</h4>
                                  <ul class="unstyled">
                                      <li>Mã đơn hàng: <strong>#<?=$thongtin[0]['ID']?></strong></li>
                                      <li>Ngày đặt hàng: <?=date('d-m-Y',strtotime($thongtin[0]['NGAYDATHANG']))?></li>
                                      <?php if ($thongtin[0]['NGAYTHANHTOAN'])
                                                echo '<li>Ngày thanh toán: '.date('d-m-Y',strtotime($thongtin[0]['NGAYTHANHTOAN'])).'</li>';
                                      ?>
                                      <li>Tình trạng: <?php if ($thongtin[0]['TINHTRANG']==0) echo 'ĐÃ HỦY';
                                                              elseif ($thongtin[0]['TINHTRANG']==1) echo 'CHỜ XÁC NHẬN';
                                                                elseif ($thongtin[0]['TINHTRANG']==2) echo 'ĐANG XỬ LÝ';
                                                                  elseif ($thongtin[0]['TINHTRANG']==-1) echo 'ĐÃ THANH TOÁN';
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
                              <?php $i = 1; foreach ($dathang as $item)
                              {
                                  echo '
                                  <tr>
                                      <td>'.$i.'</td>
                                      <td>'.$item['TENLOAI'].'</td>
                                      <td>'.$item['TENSANPHAM'].'</td>
                                      <td>'.$item['BAOHANH'].'</td>
                                      <td>'.$item['SOLUONG'].'</td>
                                      <td>'.number_format($item['THANHTIEN'], 0, ',', '.').' đ</td>                                      
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
                                      <li align="left"><strong>Tổng tiền:</strong> <?=number_format($thongtin[0]['THANHTIEN'], 0, ',', '.')?> đ</li>
                                      <li align="left"><strong>Giảm giá:</strong> <?php if ($thongtin[0]['GIAMGIA']) echo $thongtin[0]['GIAMGIA']; else echo '0';?> đ</li>
                                      <li align="left"><strong>Phí vận chuyển :</strong> <?php if ($thongtin[0]['PTVANCHUYEN']==1) echo '50.000'; else echo '0';?> đ</li>
                                      <li align="left"><strong>VAT (10%) :</strong> <?=number_format($thongtin[0]['THANHTIEN']*0.1, 0, ',', '.')?> đ</li>
                                      <li align="left"><strong>Tổng cộng :</strong> <?=number_format($thongtin[0]['TONGTIEN'], 0, ',', '.')?> đ</li>
                                  </ul>
                              </div>
                          </div>
                          <div class="text-center invoice-btn">    
                              <?php if ($thongtin[0]['TINHTRANG']==1)
                                    {
                                        echo '<button class="btn btn-warning" type="button" onclick="window.location.href=\''.base_url('admin/dathang/xacnhan?id='.$thongtin[0]['ID'].'').'\'"><i class="icon-check"></i> Xác nhận </button> ';
                                        echo '<button class="btn btn-danger" type="button" onclick="window.location.href=\''.base_url('admin/dathang/huy?id='.$thongtin[0]['ID'].'').'\'"><i class="icon-remove"></i> Hủy đơn hàng </button> ';
                                    }
                                    elseif ($thongtin[0]['TINHTRANG']==2)
                                    {
                                        if ($Role==1)
                                        {
                                            echo '<button class="btn btn-success" type="button" onclick="window.location.href=\''.base_url('admin/dathang/dathanhtoan?id='.$thongtin[0]['ID'].'').'\'"><i class="icon-ok"></i> Đã thanh toán </button> ';
                                            echo '<button class="btn btn-danger" type="button" onclick="window.location.href=\''.base_url('admin/dathang/huy?id='.$thongtin[0]['ID'].'').'\'"><i class="icon-remove"></i> Hủy đơn hàng </button> ';
                                        }
                                    }
                              ?>
                              <button class="btn btn-default" type="button" onclick="window.location.href='<?=base_url('admin/dathang')?>'"><i class="icon-reply"></i> Trở lại </button>
                          </div>
                      </div>
                  </div>
              </section>
              <!-- invoice end-->
          </section>
      </section>
      <!--main content end-->      