      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h3><i class="icon-list"></i> <strong><?=$title?></strong> <button type="button" class="btn btn-default btn-xs" onclick="window.location.href='<?=base_url('admin/dathang/them')?>'"><i class="icon-plus"></i> Thêm mới</button></h3>
                          </header>
                          <?php if ($dathang_action!=1)
                                    {
                                        if ($dathang_action==2)
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
                                        elseif ($dathang_action==3)
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
                                          <th>Mã đặt hàng</th>
                                          <th>Ngày</th>
                                          <th>Khách hàng</th>
                                          <th>SĐT</th>
                                          <th>Người nhận</th>                                          
                                          <th>SĐT</th>
                                          <th>Tổng tiền</th>
                                          <th>Tình trạng</th>
                                          <th class="center">Thao tác</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php foreach ($result as $item) { ?>                                                                   
                                         <tr>                                            
                                            <td class="center"><?=$item['ID']?></td>
                                            <td class="center"><?=date('Y-m-d', strtotime($item['NGAYDATHANG']))?></td>
                                            <td><?=$item['TENKHACHHANG']?></td>
                                            <td class="center"><?=$item['SDTKHACHHANG']?></td>
                                            <td><?=$item['TENNGUOINHAN']?></td>
                                            <td class="center"><?=$item['SDTNGUOINHAN']?></td>
                                            <td class="center"><?=number_format($item['TONGTIEN'], 0, ',', '.');?> đ</td>                                            
                                            <td class="center">
                                              <?php if ($item['TINHTRANG']==0) echo '<span class="label label-danger label-mini">Đã hủy</span>';
                                                    elseif ($item['TINHTRANG']==1) echo '<span class="label label-warning label-mini">Chờ xác nhận</span>';
                                                    elseif ($item['TINHTRANG']==2) echo '<span class="label label-info label-mini">Đang xử lý</span>';
                                                    elseif ($item['TINHTRANG']==-1) echo '<span class="label label-success label-mini">Đã xử lý</span>';
                                              ?>
                                            </td> 
                                            <td class="center">                                             
                                            <?php if ($item['TINHTRANG']!=0||$item['TINHTRANG']!=-1)
                                                {
                                                    if ($item['TINHTRANG']==1)
                                                    {
                                                        echo '<button class="btn btn-primary btn-xs" onclick="window.location.href=\''.base_url('admin/dathang/capnhat?id='.$item['ID'].'').'\'"><i class="icon-pencil"></i></button> ';
                                                        echo '<button class="btn btn-danger btn-xs" onclick="window.location.href=\''.base_url('admin/dathang/huy?id='.$item['ID'].'').'\'"><i class="icon-remove"></i></button>';
                                                    }
                                                    elseif ($item['TINHTRANG']==2)
                                                    {
                                                        if ($Role==1)
                                                        {
                                                            echo '<button class="btn btn-primary btn-xs" onclick="window.location.href=\''.base_url('admin/dathang/capnhat?id='.$item['ID'].'').'\'"><i class="icon-pencil"></i></button> ';
                                                            echo '<button class="btn btn-danger btn-xs" onclick="window.location.href=\''.base_url('admin/dathang/huy?id='.$item['ID'].'').'\'"><i class="icon-remove"></i></button>';
                                                        }
                                                    }
                                                }
                                            ?>
                                            </td>
                                         </tr>     
                                      <?php } ?> 
                                      </tbody>
                                      <tfoot>
                                      <tr>                                          
                                          <th>Mã đặt hàng</th>
                                          <th>Ngày</th>
                                          <th>Khách hàng</th>
                                          <th>SĐT</th>
                                          <th>Người nhận</th>                                          
                                          <th>SĐT</th>
                                          <th>Tình trạng</th>                                                                                    
                                          <th>Tổng tiền</th>                                          
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