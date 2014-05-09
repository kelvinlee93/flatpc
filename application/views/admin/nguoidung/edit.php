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
                                              <input class=" form-control" id="firstname" name="firstname" type="text" value="<?=$result[0]['HODEM']?>"/>
                                          </div>                                          
                                          <?php echo form_error('firstname'); ?>
                                      </div>
                                      <div class="form-group ">
                                          <label for="lastname" class="control-label col-lg-2"><strong>Tên <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="lastname" name="lastname" type="text"  value="<?=$result[0]['TENNGUOIDUNG']?>"/>
                                          </div>
                                          <?php echo form_error('lastname'); ?>
                                      </div>
                                      <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2"><strong>Tên đăng nhập <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="username" name="username" type="text"  value="<?=$result[0]['TENDANGNHAP']?>" readonly/>
                                          </div>                                          
                                      </div>                                      
                                      <div class="form-group ">
                                          <label for="password" class="control-label col-lg-2"><strong>Mật khẩu </strong></label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="password" name="password" type="password"/>
                                              <input class="form-control " id="password_old" name="password_old" type="hidden" value="<?=$result[0]['MATKHAU']?>" />
                                              <span class="help-inline">Mật khẩu có thể để trống nếu không muốn thay đổi.</span>
                                          </div>
                                          <?php echo form_error('password'); ?>
                                      </div>                                      
                                      <div class="form-group ">
                                          <label for="email" class="control-label col-lg-2"><strong>Email <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="email" name="email" type="text"  value="<?=$result[0]['EMAIL']?>" readonly/>
                                          </div>                                          
                                      </div>
                                      <div class="form-group ">
                                          <label for="birth" class="control-label col-lg-2"><strong>Ngày sinh <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <input type="text" id="birth" name="birth" placeholder="" data-mask="99-99-9999" class="form-control" value="<?=date('d-m-Y', strtotime($result[0]['NGAYSINH']))?>"/>
                                              <span class="help-inline">Ngày-Tháng-Năm. Ví dụ: 13-06-1993</span>
                                          </div>
                                          <?php echo form_error('birth'); ?>
                                      </div>                                      
                                      <div class="form-group ">
                                          <label for="address" class="control-label col-lg-2"><strong>Địa chỉ</strong></label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="address" name="address" type="text" value="<?=$result[0]['DIACHI']?>"/>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="city" class="control-label col-lg-2"><strong>Tỉnh/Thành phố <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <select class="form-control m-bot15" id="city" name="city">
                                                  <option value="">Chọn tỉnh thành</option>
                                              <?php foreach ($tinhthanh as $item) { ?>
                                                  <option value="<?=$item['ID']?>" <?php if ($result[0]['TINHTHANH']==$item['ID']) echo 'selected' ?>><?=$item['TENTINHTHANH']?></option>
                                              <?php } ?>                                                                                             
                                              </select>
                                          </div>
                                          <?php echo form_error('city'); ?>
                                      </div>
                                      <div class="form-group ">
                                          <label for="sex" class="control-label col-lg-2"><strong>Giới tính</strong></label>
                                          <div class="col-lg-4">
                                              <select class="form-control m-bot15" id="sex" name="sex">
                                                  <option value='1' <?php if ($result[0]['GIOITINH']==1) echo 'selected' ?>>Nam</option>
                                                  <option value='0' <?php if ($result[0]['GIOITINH']==0) echo 'selected' ?>>Nữ</option>                                                  
                                              </select>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cmnd" class="control-label col-lg-2"><strong>CMND</strong></label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="cmnd" name="cmnd" type="text" value="<?=$result[0]['CMND']?>"/>
                                          </div>
                                          <?php echo form_error('cmnd'); ?>
                                      </div>
                                      <div class="form-group ">
                                          <label for="sdt" class="control-label col-lg-2"><strong>Số điện thoại</strong></label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="sdt" name="sdt" type="text" value="<?=$result[0]['SDT']?>"/>
                                          </div>
                                          <?php echo form_error('sdt'); ?>
                                      </div>
                                      <div class="form-group ">
                                          <label for="role" class="control-label col-lg-2"><strong>Quyền hạn</strong></label>
                                          <div class="col-lg-4">
                                              <select class="form-control m-bot15" id="role" name="role">
                                                  <option value="0" <?php if ($result[0]['QUYEN']==0) echo 'selected' ?>>Khách hàng</option>
                                                  <option value="2" <?php if ($result[0]['QUYEN']==2) echo 'selected' ?>>Nhân viên</option>
                                                  <option value="1" <?php if ($result[0]['QUYEN']==1) echo 'selected' ?>>Admin</option>                                                  
                                              </select>  
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="status" class="control-label col-lg-2"><strong>Trạng thái</strong></label>
                                          <div class="col-lg-4">                                                                                  
                                              <select class="form-control m-bot15" id="status" name="status">                                                  
                                                  <option value="1" <?php if ($result[0]['TRANGTHAI']==1) echo 'selected' ?>>Mở</option>
                                                  <option value="0" <?php if ($result[0]['TRANGTHAI']==0) echo 'selected' ?>>Đóng</option>                                                                                              
                                              </select>                                        
                                          </div>                                                                              
                                      </div>
                                      <div class="form-group ">
                                          <label for="role" class="control-label col-lg-2"><strong>Ảnh đại diện</strong></label>                                          
                                          <div class="col-md-9">
                                              <div class="fileupload fileupload-new" data-provides="fileupload">
                                                  <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                      <img src="<?=base_url()?>static/img/<?=$result[0]['TENANH']?>" alt="" />
                                                  </div>
                                                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                  <div>
                                                   <span class="btn btn-white btn-file">
                                                   <span class="fileupload-new"><i class="icon-paper-clip"></i> Chọn ảnh</span>
                                                   <span class="fileupload-exists"><i class="icon-undo"></i> Đổi ảnh khác</span>
                                                   <input type="file" class="default" name="avatar" id="avatar" />
                                                   <input type="hidden" class="form-control " id="avatar_old" name="avatar_old" value="<?=$result[0]['HINHDAIDIEN']?>" />
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
                                              <button class="btn btn-danger" type="submit">Cập nhật</button>
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