      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h3><i class="icon-user"></i> <strong><?=$title?></strong></h3>
                          </header>
                          <div class="panel-body">                          
                                <div class="form">
                                  <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="" enctype="multipart/form-data" >
                                      <div class="form-group ">
                                          <label for="firstname" class="control-label col-lg-2"><strong>Họ đệm <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="firstname" name="firstname" type="text" value="<?php echo set_value('firstname'); ?>"/>
                                          </div>                                          
                                          <?php echo form_error('firstname'); ?>
                                      </div>
                                      <div class="form-group ">
                                          <label for="lastname" class="control-label col-lg-2"><strong>Tên <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="lastname" name="lastname" type="text" value="<?php echo set_value('lastname'); ?>"/>
                                          </div>
                                          <?php echo form_error('lastname'); ?>
                                      </div>
                                      <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2"><strong>Tên đăng nhập <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="username" name="username" type="text" value="<?php echo set_value('username'); ?>"/>
                                          </div>
                                          <?php echo form_error('username'); ?>
                                      </div>                                      
                                      <div class="form-group ">
                                          <label for="password" class="control-label col-lg-2"><strong>Mật khẩu <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="password" name="password" type="password"/>
                                          </div>
                                          <?php echo form_error('password'); ?>
                                      </div>
                                      <div class="form-group ">
                                          <label for="confirm_password" class="control-label col-lg-2"><strong>Nhập lại mật khẩu <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="confirm_password" name="confirm_password" type="password"/>
                                          </div>
                                          <?php echo form_error('confirm_password'); ?>
                                      </div>
                                      <div class="form-group ">
                                          <label for="email" class="control-label col-lg-2"><strong>Email <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="email" name="email" type="text" value="<?php echo set_value('email'); ?>"/>
                                          </div>
                                          <?php echo form_error('email'); ?>
                                      </div>
                                      <div class="form-group ">
                                          <label for="birth" class="control-label col-lg-2"><strong>Ngày sinh <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <input type="text" id="birth" name="birth" placeholder="" data-mask="99-99-9999" class="form-control" value="<?php echo set_value('birth');?>"/>
                                              <span class="help-inline">Ngày-Tháng-Năm. Ví dụ: 13-06-1993</span>
                                          </div>
                                          <?php echo form_error('birth'); ?>
                                      </div>                                      
                                      <div class="form-group ">
                                          <label for="address" class="control-label col-lg-2"><strong>Địa chỉ</strong></label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="address" name="address" type="text" value="<?php echo set_value('address');?>"/>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="city" class="control-label col-lg-2"><strong>Tỉnh/Thành phố <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <select class="form-control m-bot15" id="city" name="city">
                                                  <option value="">Chọn tỉnh thành</option>
                                              <?php foreach ($tinhthanh as $item) { ?>
                                                  <option value="<?=$item['ID']?>" <?php if (set_value('city')==$item['ID']) echo 'selected' ?>><?=$item['TENTINHTHANH']?></option>
                                              <?php } ?>                                                                                             
                                              </select>
                                          </div>
                                          <?php echo form_error('city'); ?>
                                      </div>
                                      <div class="form-group ">
                                          <label for="sex" class="control-label col-lg-2"><strong>Giới tính</strong></label>
                                          <div class="col-lg-4">
                                              <select class="form-control m-bot15" id="sex" name="sex">
                                                  <option value='1' <?php if (isset($_POST['sex'])&&$_POST['sex']==1) echo 'selected' ?>>Nam</option>
                                                  <option value='0' <?php if (isset($_POST['sex'])&&$_POST['sex']==0) echo 'selected' ?>>Nữ</option>                                                  
                                              </select>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cmnd" class="control-label col-lg-2"><strong>CMND</strong></label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="cmnd" name="cmnd" type="text" value="<?php echo set_value('cmnd'); ?>"/>
                                          </div>
                                          <?php echo form_error('cmnd'); ?>
                                      </div>
                                      <div class="form-group ">
                                          <label for="sdt" class="control-label col-lg-2"><strong>Số điện thoại</strong></label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="sdt" name="sdt" type="text" value="<?php echo set_value('sdt'); ?>"/>
                                          </div>
                                          <?php echo form_error('sdt'); ?>
                                      </div>
                                      <div class="form-group ">
                                          <label for="role" class="control-label col-lg-2"><strong>Quyền hạn</strong></label>
                                          <div class="col-lg-4">
                                              <select class="form-control m-bot15" id="role" name="role">
                                                  <option value="0" <?php if (isset($_POST['role'])&&$_POST['role']==0) echo 'selected' ?>>Khách hàng</option>
                                                  <option value="2" <?php if (isset($_POST['role'])&&$_POST['role']==2) echo 'selected' ?>>Nhân viên</option>
                                                  <option value="1" <?php if (isset($_POST['role'])&&$_POST['role']==1) echo 'selected' ?>>Admin</option>                                                  
                                              </select>  
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="status" class="control-label col-lg-2"><strong>Trạng thái</strong></label>
                                          <div class="col-lg-4">                                                                                  
                                              <select class="form-control m-bot15" id="status" name="status">                                                  
                                                  <option value="1" <?php if (isset($_POST['status'])&&$_POST['status']==1) echo 'selected' ?>>Mở</option>
                                                  <option value="0" <?php if (isset($_POST['status'])&&$_POST['status']==0) echo 'selected' ?>>Đóng</option>                                                                                              
                                              </select>                                        
                                          </div>                                                                              
                                      </div>
                                      <div class="form-group ">
                                          <label for="avatar" class="control-label col-lg-2"><strong>Ảnh đại diện</strong></label>                                          
                                          <div class="col-md-9">
                                              <div class="fileupload fileupload-new" data-provides="fileupload">
                                                  <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                      <img src="<?=base_url()?>static/img/default-avatar.png" alt="" />
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
                                              <button class="btn btn-danger" type="submit">Thêm</button>
                                              <button class="btn btn-default" type="button" onclick="window.location.href='<?=base_url('admin/nguoidung')?>'">Hủy</button>
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