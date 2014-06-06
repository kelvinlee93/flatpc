      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h3><i class="icon-truck"></i> <strong><?=$title?></strong> <button type="button" class="btn btn-default btn-xs" onclick="window.location.href='<?=base_url('admin/sanpham/nhaphang')?>'"><i class="icon-truck"></i> Nhập hàng</button></h3>
                          </header>
                          <?php if ($nhaphang_action!=1)
                                    {
                                        if ($nhaphang_action==2)
                                            echo '
                                              </br>
                                              <div class="col-lg-4">
                                                  <div class="alert alert-success alert-block fade in">                              
                                                      <button data-dismiss="alert" class="close close-sm" type="button">
                                                          <i class="icon-remove"></i>
                                                      </button>                                  
                                                          <p><i class="icon-ok-sign"></i> Thành công!</p>
                                                  </div>
                                              </div>';
                                        elseif ($nhaphang_action==3)
                                            echo '
                                              </br>
                                              <div class="col-lg-4">
                                                  <div class="alert alert-danger alert-block fade in">                              
                                                      <button data-dismiss="alert" class="close close-sm" type="button">
                                                          <i class="icon-remove"></i>
                                                      </button>                                  
                                                          <p><i class="icon-warning-sign"></i> Lỗi xảy ra!</p>
                                                  </div>
                                              </div>';
                                    }
                          ?>
                          <div class="panel-body">
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                          <th>#</th>                                                                                    
                                          <th>Ngày nhập</th>
                                          <th>Người nhập</th>
                                          <th>Tổng tiền</th>                                          
                                          <th>Tình trạng</th>                                                                                
                                          <th class="center">Thao tác</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php $i = 1; foreach ($result as $item) { ?>                                                                   
                                         <tr>
                                            <td class="center"><?=$i?></td>                                                                                        
                                            <td class="center"><?=$item['NGAYNHAP']?></td>
                                            <td class="center"><?=$item['TENDANGNHAP']?></td>
                                            <td class="center"><?=number_format($item['TONGTIEN'], 0, ',', '.');?> đ</td>                                            
                                            <td class="center">
                                            <?php if ($item['TINHTRANG']==0)
                                                      echo '<span class="label label-warning label-mini">Đang xử lý';
                                                  elseif ($item['TINHTRANG']==1) 
                                                      echo '<span class="label label-success label-mini">Đã xử lý';
                                                  elseif ($item['TINHTRANG']==-1) 
                                                      echo '<span class="label label-danger label-mini">Đã hủy';                                                      
                                            ?>
                                            </td>                                            
                                            <td class="center">
                                            <?php if ($Role==1) { ?>
                                                <button class="btn btn-primary btn-xs" onclick="window.location.href='<?=base_url()?>admin/sanpham/thongtinnhaphang?id=<?=$item['ID']?>'"><i class="icon-pencil"></i></button>                                                                                        
                                            <?php if ($item['TINHTRANG']==0)
                                                      echo '<button class="btn btn-danger btn-xs" onclick="window.location.href=\''.base_url('admin/sanpham/huynhaphang?id='.$item['ID'].'').'\'"><i class="icon-remove"></i></button></a>';                                                  
                                            ?>
                                            <?php } ?>
                                            </td>
                                         </tr>     
                                      <?php $i++; } ?> 
                                      </tbody>
                                      <tfoot>
                                      <tr>
                                          <th>#</th>                                                                                    
                                          <th>Ngày nhập</th>
                                          <th>Người nhập</th>
                                          <th>Tổng tiền</th>                                          
                                          <th>Tình trạng</th>                                                                                
                                          <th class="center">Thao tác</th>
                                      </tr>
                                      </tfoot>
                          </table>
                                </div>
                          </div>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->