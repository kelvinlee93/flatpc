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
                                          <label for="product_name" class="control-label col-lg-2"><strong>Sản phẩm </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="product_name" name="product_name" type="text" value="<?=$result[0]['TENSANPHAM']?>" readonly />
                                          </div>                                                                                    
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="product_name" class="control-label col-lg-2"><strong>Khách hàng </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="tenkh" name="tenkh" type="text" value="<?=$result[0]['TENDANGNHAP']?>" readonly />                                              
                                          </div>                                                                                    
                                      </div>

                                      <div class="form-group ">
                                          <label for="point" class="control-label col-lg-2"><strong>Điểm </strong></label>
                                          <div class="col-lg-4">
                                              <div id="Tongdiem">
                                                  <div class="input-group" style="width:150px;">
                                                      <input type="number" class="spinner-input form-control" id="point" name="point" max="10" min="0" value="<?=$result[0]['DIEM']?>">                                                                                                    
                                                  </div>                                                  
                                              </div>                                              
                                          </div>                                          
                                      </div>
                                      <div class="form-group ">
                                          <label for="content" class="control-label col-lg-2"><strong>Nội dung </strong></label>                                          
                                          <div class="col-lg-7">                                              
                                              <textarea class="wysihtml5 form-control" id="content" name="content" rows="10" required><?=$result[0]['NOIDUNG']?></textarea>
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