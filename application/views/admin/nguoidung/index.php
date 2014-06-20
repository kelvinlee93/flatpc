      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h3><i class="icon-user"></i> <strong><?=$title?></strong> <button type="button" class="btn btn-default btn-xs" onclick="window.location.href='<?=base_url('admin/nguoidung/them')?>'"><i class="icon-plus"></i> Thêm mới</button></h3>
                          </header>
                          <?php if ($nguoidung_action!=1)
                                    {
                                        if ($nguoidung_action==2)
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
                                        elseif ($nguoidung_action==3)
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
                                          <th>Họ đệm</th>
                                          <th>Tên</th>
                                          <th>Tên đăng nhập</th>
                                          <th>Email</th>
                                          <th>Ngày sinh</th>
                                          <th>Giới tính</th>
                                          <th>CMND</th>
                                          <th>SĐT</th>
                                          <th>Tỉnh thành</th>
                                          <th>Quyền</th>
                                          <th align="center">Trạng thái</th>
                                          <th class="center">Thao tác</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php $i = 1; foreach ($result as $item) { ?>                                                                   
                                         <tr id="cate_<?=$item['ID'] ?>">
                                            <td class="center"><?=$i?></td>                                            
                                            <td><?=$item['HODEM']?></td>
                                            <td><?=$item['TENNGUOIDUNG']?></td>
                                            <td><?=$item['TENDANGNHAP']?></td>
                                            <td><?=$item['EMAIL']?></td>
                                            <td class="center"><?=date('Y-m-d', strtotime($item['NGAYSINH']))?></td>
                                            <td class="center"><?php if($item['GIOITINH']==1) echo 'Nam'; else echo 'Nữ'; ?>
                                            <td class="center"><?=$item['CMND']?></td>
                                            <td class="center"><?=$item['SDT']?></td>
                                            <td class="center"><?=$item['TENTINHTHANH']?></td> 
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
                                                  echo '<button class="btn btn-primary btn-xs" onclick="window.location.href=\''.base_url('admin/nguoidung/doithongtin?id='.$item['ID'].'').'\'"><i class="icon-pencil"></i></button></a>';
                                                else echo '<button class="btn btn-primary btn-xs" onclick="window.location.href=\''.base_url('admin/nguoidung/doithongtin?id='.$item['ID'].'').'\'" disabled><i class="icon-pencil"></i></button></a>';                                                
                                              }
                                              else echo '<button class="btn btn-primary btn-xs" onclick="window.location.href=\''.base_url('admin/nguoidung/doithongtin?id='.$item['ID'].'').'\'"><i class="icon-pencil"></i></button></a>';
                                              ?>
                                              <?php if ($UserID!=$item['ID']) 
                                              {                                
                                                  if ($Role==2)
                                                  {
                                                      if ($item['QUYEN']!=1)
                                                      {
                                                          if($item['TRANGTHAI'] == 1) 
                                                              echo '<button class="btn btn-danger btn-xs" onclick="window.location.href=\''.base_url('admin/nguoidung/dongtaikhoan?id='.$item['ID'].'').'\'"><i class="icon-ban-circle"></i></button>'; 
                                                          else echo '<button class="btn btn-success btn-xs" onclick="window.location.href=\''.base_url('admin/nguoidung/motaikhoan?id='.$item['ID'].'').'\'"><i class="icon-ok-circle"></i></button></a>'; 
                                                      }
                                                      else
                                                      {
                                                          if($item['TRANGTHAI'] == 1) 
                                                              echo '<button disabled class="btn btn-danger btn-xs" onclick="window.location.href=\''.base_url('admin/nguoidung/dongtaikhoan?id='.$item['ID'].'').'\'"><i class="icon-ban-circle"></i></button>'; 
                                                          else echo '<button disabled class="btn btn-success btn-xs" onclick="window.location.href=\''.base_url('admin/nguoidung/motaikhoan?id='.$item['ID'].'').'\'"><i class="icon-ok-circle"></i></button></a>'; 
                                                      }
                                                  }
                                                  else
                                                  {
                                                      if($item['TRANGTHAI'] == 1) 
                                                          echo '<button class="btn btn-danger btn-xs" onclick="window.location.href=\''.base_url('admin/nguoidung/dongtaikhoan?id='.$item['ID'].'').'\'"><i class="icon-ban-circle"></i></button>'; 
                                                      else echo '<button class="btn btn-success btn-xs" onclick="window.location.href=\''.base_url('admin/nguoidung/motaikhoan?id='.$item['ID'].'').'\'"><i class="icon-ok-circle"></i></button></a>'; 
                                                  }
                                              }
                                              else 
                                              {
                                                  if($item['TRANGTHAI'] == 1) 
                                                      echo '<button disabled class="btn btn-danger btn-xs" onclick="window.location.href=\''.base_url('admin/nguoidung/dongtaikhoan?id='.$item['ID'].'').'\'"><i class="icon-ban-circle"></i></button>'; 
                                                  else echo '<button disabled class="btn btn-success btn-xs" onclick="window.location.href=\''.base_url('admin/nguoidung/motaikhoan?id='.$item['ID'].'').'\'"><i class="icon-ok-circle"></i></button></a>'; 
                                              }
                                              ?>
                                            </td>
                                         </tr>     
                                      <?php $i++; } ?> 
                                      </tbody>
                                      <tfoot>
                                      <tr>
                                          <th>#</th>                                          
                                          <th>Họ đệm</th>
                                          <th>Tên</th>
                                          <th>Tên đăng nhập</th>
                                          <th>Email</th>
                                          <th>Ngày sinh</th>
                                          <th>Giới tính</th>
                                          <th>CMND</th>
                                          <th>SĐT</th>
                                          <th>Tỉnh thành</th>
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