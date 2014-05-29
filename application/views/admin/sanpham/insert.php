      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h3><i class="icon-desktop"></i> <strong><?=$title?></strong></h3>
                          </header>
                          <div class="panel-body">                          
                                <div class="form">
                                  <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="" enctype="multipart/form-data" >
                                      <div class="form-group ">
                                          <label for="productname" class="control-label col-lg-2"><strong>Tên sản phẩm <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="productname" name="productname" type="text" value="<?php echo set_value('productname'); ?>"/>
                                          </div>                                          
                                          <?php echo form_error('productname'); ?>
                                      </div>
                                      <div class="form-group ">
                                          <label for="productcategory" class="control-label col-lg-2"><strong>Loại sản phẩm <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <select class="form-control m-bot15" id="productcategory" name="productcategory">
                                                  <option value="">Loại sản phẩm </option>
                                              <?php foreach ($loaisanpham as $item) { ?>
                                                  <option value="<?=$item['ID']?>" <?php if (set_value('productcategory')==$item['ID']) echo 'selected' ?>><?=$item['TENLOAI']?></option>
                                              <?php } ?>                                                                                             
                                              </select>
                                          </div>
                                          <?php echo form_error('productcategory'); ?>
                                      </div>
                                      <div class="form-group ">
                                          <label for="provider" class="control-label col-lg-2"><strong>Nhà cung cấp <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <select class="form-control m-bot15" id="provider" name="provider">
                                                  <option value="">Nhà cung cấp </option>
                                              <?php foreach ($nhacungcap as $item) { ?>
                                                  <option value="<?=$item['ID']?>" <?php if (set_value('provider')==$item['ID']) echo 'selected' ?>><?=$item['TENNCC']?></option>
                                              <?php } ?>                                                                                             
                                              </select>
                                          </div>
                                          <?php echo form_error('provider'); ?>
                                      </div>                                      


                                      <div class="form-group ">
                                          <label for="desc" class="control-label col-lg-2"><strong>Mô tả </strong></label>
                                          <div class="col-lg-4">                                              
                                              <textarea class="form-control" id="desc" name="desc" rows="10"><?php echo set_value('desc'); ?></textarea>
                                          </div>
                                          <?php echo form_error('desc'); ?>
                                      </div>

                                      <div class="form-group ">
                                          <label for="price" class="control-label col-lg-2"><strong>Đơn giá <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="price" name="price" type="text" value="<?php echo set_value('price'); ?>"/>
                                          </div>
                                          <?php echo form_error('price'); ?>
                                      </div>

                                    
                                      <div class="form-group ">
                                          <label for="avatar" class="control-label col-lg-2"><strong>Ảnh đại diện</strong></label>                                          
                                          <div class="col-md-9">
                                              <div class="fileupload fileupload-new" data-provides="fileupload">
                                                  <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                      <img src="<?=base_url()?>static/img/chua-co-anh.gif" alt="" />
                                                  </div>
                                                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                  <div>
                                                   <span class="btn btn-white btn-file">
                                                   <span class="fileupload-new"><i class="icon-paper-clip"></i> Chọn ảnh</span>
                                                   <span class="fileupload-exists"><i class="icon-undo"></i> Đổi ảnh khác</span>
                                                   <input type="file" class="default" name="avatar" id="avatar" />
                                                   </span>                                                      
                                                  </div>
                                              </div>                                          
                                          </div>                                                                             
                                      </div> 
                                      <div class="form-group ">
                                          <div class="col-lg-offset-1 col-lg-10">                                      
                                              <span class="label label-danger">LƯU Ý</span> Các trường được đánh dấu <span style="color: red">*</span> là bắt buộc</br></br>                                    
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-danger" type="submit">Tiếp theo</button>
                                              <button class="btn btn-default" type="button" onclick="window.location.href='<?=base_url('admin/sanpham')?>'">Hủy</button>
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