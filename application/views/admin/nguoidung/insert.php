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
                                  <form class="cmxform form-horizontal tasi-form" id="signupForm" method="get" action="">
                                      <div class="form-group ">
                                          <label for="firstname" class="control-label col-lg-2">Họ đệm</label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="firstname" name="firstname" type="text" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="lastname" class="control-label col-lg-2">Tên</label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="lastname" name="lastname" type="text" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="lastname" class="control-label col-lg-2">Tên đăng nhập</label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="username" name="username" type="text" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Email</label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="email" name="email" type="email" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="password" class="control-label col-lg-2">Mật khẩu</label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="password" name="password" type="password" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="confirm_password" class="control-label col-lg-2">Nhập lại mật khẩu</label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="confirm_password" name="confirm_password" type="password" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="email" class="control-label col-lg-2">Ngày sinh</label>
                                          <div class="col-lg-4">
                                              <input type="text" id="birth" name="birth" placeholder="" data-mask="99-99-9999" class="form-control">
                                              <span class="help-inline">Ngày-Tháng-Năm. Ví dụ: 13-06-1993</span>
                                          </div>
                                      </div>                                      
                                      <div class="form-group ">
                                          <label for="email" class="control-label col-lg-2">Địa chỉ</label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="address" name="address" type="text" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="email" class="control-label col-lg-2">Giới tính</label>
                                          <div class="col-lg-4">
                                              <select class="form-control m-bot15">
                                                  <option value="0">Nữ</option>
                                                  <option value="1" selected>Nam</option>                                                  
                                              </select>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="email" class="control-label col-lg-2">CMND</label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="email" name="email" type="email" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="email" class="control-label col-lg-2">Số điện thoại</label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="email" name="email" type="email" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="email" class="control-label col-lg-2">Quyền hạn</label>
                                          <div class="col-lg-4">
                                              <select class="form-control m-bot15">
                                                  <option value="0" selected>Khách hàng</option>
                                                  <option value="1">Admin</option>
                                                  <option value="2">Nhân viên</option>
                                              </select>  
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="email" class="control-label col-lg-2">Trạng thái</label>
                                          <div class="col-lg-4">                                                                                  
                                              <select class="form-control m-bot15">                                                  
                                                  <option value="0">Khóa</option> 
                                                  <option value="1" selected>Hoạt động</option>                                             
                                              </select>                                        
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