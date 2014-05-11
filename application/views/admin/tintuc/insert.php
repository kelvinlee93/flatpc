      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h3><i class="icon-rss"></i> <strong><?=$title?></strong></h3>
                          </header>
                          <div class="panel-body">                          
                                <div class="form">
                                  <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="" enctype="multipart/form-data" >
                                      <div class="form-group ">
                                          <label for="title" class="control-label col-lg-2"><strong>Tiêu đề <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-7">
                                              <input class=" form-control" id="title" name="title" type="text" required/>
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="category" class="control-label col-lg-2"><strong>Loại tin </strong></label>
                                          <div class="col-lg-7">
                                              <select class="form-control m-bot15" id="category" name="category">
                                                  <option value="1">Tin khuyến mãi</option>
                                                  <option value="2">Tin công nghệ</option>                                                
                                              </select>
                                          </div>                                          
                                      </div>
                                      <div class="form-group ">
                                          <label for="desc" class="control-label col-lg-2"><strong>Mô tả ngắn </strong></label>                                          
                                          <div class="col-lg-7">                                              
                                              <textarea class="wysihtml5 form-control" id="desc" name="desc" rows="10"></textarea>
                                          </div>                                                                                    
                                      </div>                                   
                                      <div class="form-group ">
                                          <label for="content" class="control-label col-lg-2"><strong>Nội dung </strong></label>                                          
                                          <div class="col-lg-7">                                                                                            
                                              <textarea class="form-control ckeditor" id="content" name="content" rows="10"></textarea>
                                          </div>                                         
                                      </div>
                                      <div class="form-group ">
                                          <label for="cmt_time" class="control-label col-lg-2"><strong>Thời gian </strong></label>
                                          <div class="col-lg-4">
                                              <input type="text" value="<?=date('d-m-Y H:i:s', now())?>" readonly class="form_datetime form-control"  id="cmt_time" name="cmt_time">
                                              <input class=" form-control" id="author" name="author" type="hidden" readonly value="<?=$Username?>" />
                                          </div>                                                                                                                     
                                      </div>                                      
                                      <div class="form-group ">
                                          <label for="feature_img" class="control-label col-lg-2"><strong>Ảnh tiêu biểu</strong></label>                                          
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
                                                   <input type="file" class="default" name="feature_img" id="feature_img" />
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
                                              <button class="btn btn-danger" type="submit">Thêm</button>
                                              <button class="btn btn-default" type="button" onclick="window.location.href='<?=base_url('admin/tintuc')?>'">Hủy</button>
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