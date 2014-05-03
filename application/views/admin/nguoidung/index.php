<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h3><i class="icon-user"></i> <strong><?=$title?></strong> <button type="button" class="btn btn-default btn-xs" onclick="window.location.href='<?=base_url('admin/nguoidung/insert')?>'"><i class="icon-plus"></i> Thêm mới</button></h3>
                          </header>
                          <div class="panel-body">
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>                                          
                                          <th>Họ tên</th>
                                          <th>Tên đăng nhập</th>
                                          <th>Email</th>
                                          <th>Quyền</th>
                                          <th align="center">Trạng thái</th>
                                          <th class="center">Thao tác</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php foreach ($result as $item) { ?>                             
                                         <tr id="cate_<?=$item['ID'] ?>">                                            
                                            <td><?=$item['TENNGUOIDUNG']?></td>
                                            <td><?=$item['TENDANGNHAP']?></td>
                                            <td><?=$item['EMAIL']?></td> 
                                            <td class="center">
                                              <?php if ($item['QUYEN']==1) echo '<span class="label label-warning label-mini">Admin</span>';
                                                    elseif ($item['QUYEN']==2) echo '<span class="label label-info label-mini">Nhân viên</span>';
                                                      else echo '<span class="label label-primary label-mini">Khách hàng</span>';                                      
                                              ?>
                                            </td>                   
                                            <td class="center"><?php if($item['TRANGTHAI'] == 1) echo "<span class=\"label label-success label-mini\">Mở"; else echo "<span class=\"label label-danger label-mini\">Đóng"; ?></span></td>
                                            <td class="center"> 
                                              <?php if ($Role==2)
                                              {
                                                if ($item['QUYEN']!=1) 
                                                  echo '<a title="Chỉnh sửa '.$item['TENDANGNHAP'].'" href="<?=base_url()?>admin/nguoidung/edit?id=<?php echo '.$item['ID'].' ?>" ><button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button></a>';
                                                else echo '<a title="Chỉnh sửa '.$item['TENDANGNHAP'].'" href="<?=base_url()?>admin/nguoidung/edit?id=<?php echo '.$item['ID'].' ?>" ><button class="btn btn-primary btn-xs" disabled><i class="icon-pencil"></i></button></a>';                                                
                                              }
                                              else echo '<a title="Chỉnh sửa '.$item['TENDANGNHAP'].'" href="<?=base_url()?>admin/nguoidung/edit?id=<?php echo '.$item['ID'].' ?>" ><button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button></a>';
                                              ?>
                                              <?php if ($UserID!=$item['ID']) 
                                              {                                
                                                  if ($Role==2)
                                                  {
                                                      if ($item['QUYEN']!=1) 
                                                        echo '<a title="Xóa '.$item['TENDANGNHAP'].'" href="#" onclick="DeleteCate('.$item['ID'].',\''.$page.'\')" class="delete-row"><button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button></a>'; 
                                                      else
                                                        echo '<a href="#" onclick="DeleteCate('.$item['ID'].',\''.$page.'\')" class="delete-row"><button class="btn btn-danger btn-xs" disabled><i class="icon-trash "></i></button></a>';
                                                  }
                                                  else
                                                    echo '<a title="Xóa '.$item['TENDANGNHAP'].'" href="#" onclick="DeleteCate('.$item['ID'].',\''.$page.'\')" class="delete-row"><button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button></a>';
                                              }
                                              else echo '<a href="#" onclick="DeleteCate('.$item['ID'].',\''.$page.'\')" class="delete-row"><button class="btn btn-danger btn-xs" disabled><i class="icon-trash "></i></button></a>';
                                              ?>
                                            </td>
                                         </tr>     
                                      <?php } ?> 
                                      </tbody>
                                      <tfoot>
                                      <tr>                                          
                                          <th>Họ tên</th>
                                          <th>Tên đăng nhập</th>
                                          <th>Email</th>
                                          <th>Quyền</th>
                                          <th class="center">Trạng thái</th>
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