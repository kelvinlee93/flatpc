      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h3><i class="icon-truck"></i> <strong><?=$title?></strong></h3>
                          </header>
                          <div class="panel-body">                          
                                <div class="form">
                                  <form class="form-horizontal tasi-form" id="signupForm" method="post" action="" enctype="multipart/form-data" >                                                                                                                  
                                      <div class="form-group">                                      
                                          <?php if ($product) { ?>
                                      <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Chọn sản phẩm</label>
                                      <div class="col-lg-4">
                                          <select class="form-control m-bot15" id="chonsanpham" name="chonsanpham">
                                              <?php foreach ($product as $item) {                                                                                                    
                                                      echo '<option value="'.$item['ID'].'">'.$item['TENSANPHAM'].'</option>';
                                                  } ?>
                                          </select> </div>
                                          <?php } else { ?> 
                                      <div class="col-lg-2"></div>Không có sản phẩm mới, vui lòng nhập hàng!
                                          <?php } ?>                                        
                                      
                                  </div>                                                                                                              
                                      <div class="form-group ">
                                          <div class="col-lg-offset-2 col-lg-10">                                              
                                              <?php if ($product) { ?>
                                              <button class="btn btn-danger" type="submit">Tiếp theo</button>
                                              <?php } ?>
                                              <button class="btn btn-default" type="button" onclick="window.location.href='<?=base_url('admin/sanpham')?>'">Trở lại</button>                                              
                                          </div>
                                      </div>
                                  </form>
                                </div>
                          </div>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->