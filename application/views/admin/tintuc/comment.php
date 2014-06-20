      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h3><i class="icon-comment"></i> <strong><?=$title?></strong></h3>
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
                                          <th>#</th>                                          
                                          <th>Tiêu đề</th>
                                          <th>Tên khách hàng</th>                                          
                                          <th>Nội dung</th>
                                          <th>Thời gian</th>                                          
                                          <th class="center">Thao tác</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php $i = 1; foreach ($result as $item) { ?>                                                                   
                                         <tr>
                                            <td class="center"><?=$i?></td>                                            
                                            <td><?=$item['TIEUDE']?></td>
                                            <td><?=$item['TENNGUOIDUNG']?></td>                                            
                                            <td><?=$item['NOIDUNG']?></td>
                                            <td class="center"><?=date('Y-m-d H:i:s',strtotime($item['THOIGIAN']))?></td>                                                                                        
                                            <td class="center"> 
                                            <button class="btn btn-primary btn-xs" onclick="window.location.href='<?=base_url()?>admin/tintuc/binhluan?id=<?=$item['ID']?>'"><i class="icon-pencil"></i></button>
                                            <button class="btn btn-danger btn-xs" onclick="window.location.href='<?=base_url()?>admin/tintuc/binhluan?xoa=<?=$item['ID']?>'"><i class="icon-remove"></i></button>
                                            </td>
                                         </tr>     
                                      <?php $i++; } ?> 
                                      </tbody>                                      
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