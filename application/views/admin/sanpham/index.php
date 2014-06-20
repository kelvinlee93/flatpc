      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h3><i class="icon-desktop"></i> <strong><?=$title?></strong> <button type="button" class="btn btn-default btn-xs" onclick="window.location.href='<?=base_url('admin/sanpham/them')?>'"><i class="icon-plus"></i> Thêm mới</button> <button type="button" class="btn btn-default btn-xs" onclick="window.location.href='<?=base_url('admin/sanpham/nhaphang')?>'"><i class="icon-truck"></i> Nhập hàng</button></h3>
                          </header>
                          <?php if ($sanpham_action!=1)
                                    {
                                        if ($sanpham_action==2)
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
                                        elseif ($sanpham_action==3)
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
                                          <th>Tên sản phẩm</th>
                                          <th>Loại</th>
                                          <th>Nhà cung cấp</th>
                                          <th>Số lượng</th>
                                          <th>Đơn giá</th>
                                          <th>Tình trạng</th>
                                          <th>Lượt xem</th>
                                          <th>Lượt mua</th>                                          
                                          <th class="center">Thao tác</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php $i = 1; foreach ($result as $item) { ?>                                                                   
                                         <tr>
                                            <td class="center"><?=$i?></td>                                            
                                            <td><?=$item['TENSANPHAM']?></td>
                                            <td class="center"><?=$item['TENLOAI']?></td>
                                            <td class="center"><?=$item['TENNCC']?></td>
                                            <td class="center"><?=$item['SOLUONG']?></td>
                                            <td class="center"><?=number_format($item['DONGIA'], 0, ',', '.');?> đ</td>
                                            <td class="center">
                                            <?php if ($item['TINHTRANG']==0)
                                                      echo '<span class="label label-warning label-mini">Hết hàng';
                                                  elseif ($item['TINHTRANG']==1) 
                                                      echo '<span class="label label-success label-mini">Đang kinh doanh';
                                                  elseif ($item['TINHTRANG']==-1) 
                                                      echo '<span class="label label-danger label-mini">Ngưng kinh doanh';  
                                            ?>
                                            </td>
                                            <td class="center"><?=$item['LUOTXEM']?></td>
                                            <td class="center"><?=$item['LUOTMUA']?></td>
                                            <td class="center">
                                            <?php if ($item['TINHTRANG']!=-2) { ?>
                                                <button class="btn btn-primary btn-xs" onclick="window.location.href='<?=base_url()?>admin/sanpham/capnhat?id=<?=$item['ID']?>'"><i class="icon-pencil"></i></button>                                            
                                            <?php } ?>
                                            <?php if ($item['TINHTRANG']==1||$item['TINHTRANG']==0)
                                                      echo '<button class="btn btn-danger btn-xs" onclick="window.location.href=\''.base_url('admin/sanpham/ngungkinhdoanh?id='.$item['ID'].'').'\'"><i class="icon-off"></i></button></a>';
                                                  elseif ($item['TINHTRANG']==-1)
                                                      echo '<button class="btn btn-success btn-xs" onclick="window.location.href=\''.base_url('admin/sanpham/batdaukinhdoanh?id='.$item['ID'].'').'\'"><i class="icon-ok"></i></button></a>';
                                            ?>
                                            </td>
                                         </tr>     
                                      <?php $i++; } ?> 
                                      </tbody>
                                      <tfoot>
                                      <tr>
                                          <th>#</th>                                                                                    
                                          <th>Tên sản phẩm</th>
                                          <th>Loại</th>
                                          <th>Nhà cung cấp</th>
                                          <th>Số lượng</th>
                                          <th>Đơn giá</th>
                                          <th>Tình trạng</th>
                                          <th>Lượt xem</th>
                                          <th>Lượt mua</th>                                          
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