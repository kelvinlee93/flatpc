<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="utf-8">    
    <link rel="shortcut icon" href="<?=base_url()?>static/img/favicon.ico">

    <title><?=$title?> - FlatPC Admin</title>

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

  <body>      
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
                                  <p>                                  
                                      Mã đơn hàng: <strong>#HD<?=$chitiet[0]['ID']?></strong><br>
                                      Ngày đặt hàng: <?=date('d-m-Y',strtotime($chitiet[0]['NGAYDATHANG']))?><br>
                                      <?php if ($chitiet[0]['NGAYTHANHTOAN'])
                                                echo 'Ngày thanh toán: '.date('d-m-Y',strtotime($chitiet[0]['NGAYTHANHTOAN'])).'<br>';
                                      ?>                                      
                                      <br>
                                  </p>
                              </div>
                          </div>
                          <table class="table table-striped table-hover" border="1">
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
                                      <td>'.$item['DONGIA'].'</td>                                      
                                      <td>'.$item['THANHTIEN'].'</td>
                                  </tr> 
                                  ';
                                  $i++;   
                              } 
                              ?>                                                            
                              </tbody>
                          </table>
                          <div class="row">
                              <div class="col-lg-4 invoice-block pull-right">                                  
                                  <ul class="unstyled amounts" type="none">
                                      <li align="left"><strong>Tổng tiền:</strong> <?=$chitiet[0]['THANHTIEN']?></li>
                                      <li align="left"><strong>Giảm giá:</strong> <?php if ($chitiet[0]['GIAMGIA']) echo $chitiet[0]['GIAMGIA']; else echo '0';?></li>
                                      <li align="left"><strong>Phí vận chuyển :</strong> <?php if ($chitiet[0]['PTVANCHUYEN']==1) echo '50000'; else echo '0';?></li>
                                      <li align="left"><strong>Thuế :</strong> 10%</li>
                                      <li align="left"><strong>Tổng cộng :</strong> <?=$chitiet[0]['TONGTIEN']?></li>
                                  </ul>
                              </div>
                          </div>                          
                      </div>
                  </div>
              </section>
              <!-- invoice end-->
          </section>
      </section>
      <!--main content end-->       
  </section> 
                
    <script src="<?=base_url()?>static/admin/js/jquery.js"></script>
    <script src="<?=base_url()?>static/admin/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>static/admin/js/jquery.dcjqaccordion.2.7.js" class="include" type="text/javascript"></script>
    <script src="<?=base_url()?>static/admin/js/jquery.scrollTo.min.js"></script>
    <script src="<?=base_url()?>static/admin/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?=base_url()?>static/admin/js/respond.min.js" ></script>    
    <script src="<?=base_url()?>static/admin/js/common-scripts.js"></script>
        
  </body>
</html>
     