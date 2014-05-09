      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h3><i class="icon-rss"></i> <strong><?=$title?></strong> <button type="button" class="btn btn-default btn-xs" onclick="window.location.href='<?=base_url('admin/tintuc/them')?>'"><i class="icon-plus"></i> Thêm mới</button></h3>
                          </header>
                          <?php if ($tintuc_action!=1)
                                    {
                                        if ($tintuc_action==2)
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
                                        elseif ($tintuc_action==3)
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
                                          <th>Tiêu đề</th>
                                          <th>Loại tin</th>
                                          <th>Ngày đăng</th>
                                          <th>Tác giả</th>
                                          <th>Tình trạng</th>                                                                                    
                                          <th class="center">Thao tác</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php foreach ($result as $item) { ?>                                                                   
                                         <tr>                                            
                                            <td><?=$item['TIEUDE']?></td>
                                            <td><?=$item['TENLOAI']?></td>
                                            <td><?=date('d-m-Y', strtotime($item['NGAYDANG']))?></td>
                                            <td><?=$item['TENDANGNHAP']?></td>
                                            <td class="center">
                                              <?php if ($item['TINHTRANG']==1) echo '<span class="label label-success label-mini">Đã đăng</span>';
                                                    elseif ($item['TINHTRANG']==0) echo '<span class="label label-warning label-mini">Chờ kiểm duyệt</span>';
                                                      elseif ($item['TINHTRANG']==2) echo '<span class="label label-primary label-mini">Dự thảo</span>';                                      
                                              ?>
                                            </td>                                            
                                            <td class="center"> 
                                              <button class="btn btn-primary btn-xs" onclick="window.location.href='<?=base_url()?>admin/binhluan/capnhat?id=<?=$item['ID']?>'"><i class="icon-pencil"></i></button>
                                              <button class="btn btn-danger btn-xs" onclick="window.location.href='<?=base_url()?>admin/binhluan/xoa?id=<?=$item['ID']?>'"><i class="icon-remove"></i></button>
                                            </td>
                                         </tr>     
                                      <?php } ?> 
                                      </tbody>
                                      <tfoot>
                                      <tr>                                          
                                          <th>Tiêu đề</th>
                                          <th>Loại tin</th>
                                          <th>Ngày đăng</th>
                                          <th>Tác giả</th>
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