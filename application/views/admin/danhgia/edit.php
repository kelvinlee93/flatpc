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
                          <div class="panel-body">                          
                                <div class="form">
                                  <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="" enctype="multipart/form-data" >
                                      <div class="form-group ">
                                          <label for="product_name" class="control-label col-lg-2"><strong>Tên sản phẩm </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="product_name" name="product_name" type="text" value="<?=$result[0]['TENSANPHAM']?>" readonly />
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="product_img" class="control-label col-lg-2"><strong></strong></label>
                                          <div class="col-lg-4">
                                              <img src="<?=base_url()?>static/img/<?=$result[0]['TENANH']?>" width="350" heigh="220">
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="rating_time" class="control-label col-lg-2"><strong>Lượt đánh giá </strong></label>
                                          <div class="col-lg-4">
                                              <div id="Luotdanhgia">
                                                  <div class="input-group" style="width:150px;">
                                                      <input type="text" class="spinner-input form-control" id="rating_time" name="rating_time" maxlength="9" value="<?=$result[0]['LUOTDANHGIA']?>">
                                                      <div class="spinner-buttons input-group-btn">
                                                          <button type="button" class="btn btn-default spinner-up">
                                                              <i class="icon-angle-up"></i>
                                                          </button>
                                                          <button type="button" class="btn btn-default spinner-down">
                                                              <i class="icon-angle-down"></i>
                                                          </button>
                                                      </div>                                                      
                                                  </div>                                                  
                                              </div>                                              
                                          </div>                                          
                                      </div>
                                      <div class="form-group ">
                                          <label for="total_point" class="control-label col-lg-2"><strong>Tổng điểm </strong></label>
                                          <div class="col-lg-4">
                                              <div id="Tongdiem">
                                                  <div class="input-group" style="width:150px;">
                                                      <input type="text" class="spinner-input form-control" id="total_point" name="total_point" maxlength="9" value="<?=$result[0]['TONGDIEM']?>">
                                                      <div class="spinner-buttons input-group-btn">
                                                          <button type="button" class="btn btn-default spinner-up">
                                                              <i class="icon-angle-up"></i>
                                                          </button>
                                                          <button type="button" class="btn btn-default spinner-down">
                                                              <i class="icon-angle-down"></i>
                                                          </button>
                                                      </div>                                                      
                                                  </div>                                                  
                                              </div>                                              
                                          </div>                                          
                                      </div>
                                      <div class="form-group ">
                                          <label for="avg_point" class="control-label col-lg-2"><strong>Điểm đánh giá </strong></label>
                                          <div class="col-lg-4">                                              
                                                  <div class="input-group" style="width:150px;">
                                                      <input type="text" class="spinner-input form-control" id="avg_point" name="avg_point" maxlength="9" readonly value="<?=$result[0]['DIEMDANHGIA']?>">                                                      
                                                      <span class="input-group-addon"><i class="icon-thumbs-up"></i></span>
                                                  </div>

                                          </div>                                          
                                      </div>                                                                     
                                      <div class="form-group ">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-danger" type="submit">Cập nhật</button>
                                              <button class="btn btn-default" type="button" onclick="window.location.href='<?=base_url('admin/danhgia')?>'">Hủy</button>
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