      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h3><i class="icon-reorder"></i> <strong><?=$title?></strong></h3>
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
                                          <th>Khách hàng</th>
                                          <th>Ngày đặt</th>
                                          <th>Tổng tiền</th>                                          
                                          <th class="center">Thao tác</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php foreach ($result as $item) { ?>                                                                   
                                         <tr>                                            
                                            <td><?=$item['ID']?></td>
                                            <td class="center"><?=$item['HODEM']?> <?=$item['TENNGUOIDUNG']?></td>
                                            <td class="center"><?=$item['NGAYDATHANG']?></td>
                                            <td class="center"><?=$item['THANHTIEN']?></td>                                                                                        
                                            <td class="center"> 
                                            <button class="btn btn-primary btn-xs" onclick="window.location.href='<?=base_url()?>admin/hoadon/dathang?id=<?=$item['ID']?>'"><i class="icon-pencil"></i></button>                                                                                        
                                            </td>
                                         </tr>     
                                      <?php } ?> 
                                      </tbody>
                                      <tfoot>
                                      <tr>                                          
                                          <th>Mã đặt hàng</th>
                                          <th>Khách hàng</th>
                                          <th>Ngày đặt</th>
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