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
                                  <h2>THÔNG TIN NHẬP HÀNG</h2>
                              </div>                              
                          </div>
                          <table class="table table-striped table-hover">
                              <thead>
                              <tr>
                                  <th>#</th>                                  
                                  <th>Tên sản phẩm</th>                                  
                                  <th>Số lượng</th>
                                  <th>Đơn giá</th>
                                  <th>Thành tiền</th>                                                                    
                              </tr>
                              </thead>
                              <tbody>
                              <?php $i = 1; foreach ($chitiet as $item)
                              {
                                  echo '
                                  <tr>
                                      <td>'.$i.'</td>                                      
                                      <td>'.$item['TENSANPHAM'].'</td>                                      
                                      <td>'.$item['SOLUONG'].'</td>
                                      <td>'.number_format($item['DONGIA'], 0, ',', '.').' đ</td>
                                      <td>'.number_format($item['DONGIA']*$item['SOLUONG'], 0, ',', '.').' đ</td>
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
                                      <li align="left"><strong>Tổng tiền :</strong> <?=number_format($nhaphang[0]['TONGTIEN'], 0, ',', '.');?> đ</li>   
                                      <li align="left"><strong>Người nhập hàng:</strong> <?=$nhaphang[0]['HODEM'].' '.$nhaphang[0]['TENNGUOIDUNG']?></li>
                                      <li align="left"><strong>Ngày nhập hàng :</strong> <?=$nhaphang[0]['NGAYNHAP']?></li>
                                      <li align="left"><strong>Trạng thái :</strong> <?php if ($nhaphang[0]['TINHTRANG']==0) echo 'ĐANG XỬ LÝ'; elseif ($nhaphang[0]['TINHTRANG']==1) echo 'HOÀN THÀNH'; else echo 'ĐÃ HỦY';?></li>                                      
                                  </ul>
                              </div>
                          </div>
                          <div class="text-center invoice-btn">
                          <?php if ($Role==1) { ?>  
                              <?php if ($nhaphang[0]['TINHTRANG']==0) { ?>                                
                                  <button class="btn btn-success" type="button" onclick="window.location.href='<?=base_url()?>admin/sanpham/xacnhannhaphang?id=<?=$nhaphang[0]['ID']?>'"><i class="icon-ok"></i> Hoàn thành </button>
                                  <button class="btn btn-danger" type="button" onclick="window.location.href='<?=base_url()?>admin/sanpham/huynhaphang?id=<?=$nhaphang[0]['ID']?>'"><i class="icon-remove"></i> Hủy </button>
                              <?php } ?>
                          <?php } ?>
                              <button class="btn btn-default" type="button" onclick="window.location.href='<?=base_url('admin/sanpham/quanlynhaphang')?>'"><i class="icon-reply"></i> Trở lại </button>                                                            
                          </div>
                      </div>
                  </div>
              </section>
              <!-- invoice end-->
          </section>
      </section>
      <!--main content end-->      