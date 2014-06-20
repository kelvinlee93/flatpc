      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h3><i class="icon-thumbs-up"></i> <strong><?=$title?></strong></h3>
                          </header>
                          <?php if ($danhgia_action!=1)
                                    {
                                        if ($danhgia_action==2)
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
                                        elseif ($danhgia_action==3)
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
                                          <th>Lượt đánh giá</th>
                                          <th>Tổng điểm</th>
                                          <th>Điểm đánh giá</th>                                          
                                          <th class="center">Thao tác</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php $i = 1; foreach ($result as $item) { ?>                                                                   
                                         <tr>
                                            <td class="center"><?=$i?></td>                                            
                                            <td><?=$item['TENSANPHAM']?></td>
                                            <td class="center"><?=$item['LUOTDANHGIA']?></td>
                                            <td class="center"><?=$item['TONGDIEM']?></td>
                                            <td class="center"><?=$item['DIEMDANHGIA']?></td>                                                                                        
                                            <td class="center"> 
                                            <button class="btn btn-primary btn-xs" onclick="window.location.href='<?=base_url()?>admin/danhgia/chitiet?id=<?=$item['ID']?>'"><i class="icon-pencil"></i></button>
                                            </td>
                                         </tr>     
                                      <?php $i++; } ?> 
                                      </tbody>
                                      <tfoot>
                                      <tr>  
                                          <th>#</th>                                                                                
                                          <th>Tên sản phẩm</th>
                                          <th>Lượt đánh giá</th>
                                          <th>Tổng điểm</th>
                                          <th>Điểm đánh giá</th>                                          
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