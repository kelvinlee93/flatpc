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
                                          <label for="customer_name" class="control-label col-lg-2"><strong>Tên khách hàng </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="customer_name" name="customer_name" type="text" value="<?=$result[0]['TENKHACHHANG']?>" required/>
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="email" class="control-label col-lg-2"><strong>Email </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="email" name="email" type="email" value="<?=$result[0]['EMAIL']?>" required/>
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="content" class="control-label col-lg-2"><strong>Nội dung </strong></label>                                          
                                          <div class="col-lg-7">                                              
                                              <textarea class="wysihtml5 form-control" id="content" name="content" rows="10" required><?=$result[0]['NOIDUNG']?></textarea>
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="cmt_time" class="control-label col-lg-2"><strong>Thời gian </strong></label>
                                          <div class="col-lg-4">
                                              <input type="text" value="<?=date('d-m-Y H:i:s', strtotime($result[0]['THOIGIAN']))?>" readonly class="form_datetime form-control"  id="cmt_time" name="cmt_time">
                                          </div>                                                                                                                     
                                      </div>                                                                                                                                                               
                                      <div class="form-group ">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-danger" type="submit">Cập nhật</button>
                                              <button class="btn btn-default" type="button" onclick="window.location.href='<?=base_url('admin/binhluan')?>'">Hủy</button>
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