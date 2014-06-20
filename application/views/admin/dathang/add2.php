      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h3><i class="icon-list"></i> <strong><?=$title?></strong></h3>
                          </header>
                          <div class="panel-body">                          
                                <div class="form">
                                  <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="" enctype="multipart/form-data" >
                                      <div class="form-group ">
                                          <label for="tenkhachhang" class="control-label col-lg-2"><strong>Tên khách hàng <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="tenkhachhang" name="tenkhachhang" type="text" value="<?=$order_info['Tenkhachhang']?>" readonly/>
                                              <input class=" form-control" id="hidden_field" name="hidden_field" type="hidden" value="1" readonly/>
                                              <input class=" form-control" id="thanhvien" name="thanhvien" type="hidden" value="<?=$order_info['Thanhvien']?>" readonly/>
                                          </div>                                          
                                      </div>
                                      <div class="form-group ">
                                          <label for="sdtkhachhang" class="control-label col-lg-2"><strong>SĐT khách hàng <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="sdtkhachhang" name="sdtkhachhang" type="text" value="<?=$order_info['Sdtkhachhang']?>" readonly/>
                                          </div>                                                                                                                              
                                      </div>
                                      <div class="form-group ">
                                          <label for="tennguoinhan" class="control-label col-lg-2"><strong>Tên người nhận <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="tennguoinhan" name="tennguoinhan" type="text"  value="<?=$order_info['Tennguoinhan']?>" readonly/>
                                          </div>                                          
                                      </div>
                                      <div class="form-group ">
                                          <label for="sdtnguoinhan" class="control-label col-lg-2"><strong>SĐT khách hàng <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="sdtnguoinhan" name="sdtnguoinhan" type="text" value="<?=$order_info['Sdtnguoinhan']?>" readonly/>
                                          </div>                                          
                                      </div>
                                      <div class="form-group ">
                                          <label for="diachi" class="control-label col-lg-2"><strong>Địa chỉ </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="diachi" name="diachi" type="text"  value="<?=$order_info['Diachi']?>" readonly/>
                                          </div>                                          
                                      </div>
                                      <div class="form-group ">
                                          <label for="pttt" class="control-label col-lg-2"><strong>Phương thức thanh toán</strong></label>
                                          <div class="col-lg-4">
                                              <select class="form-control m-bot15" id="pttt" name="pttt">
                                                  <option value='0' <?php if ($order_info['Pttt']==0) echo 'selected' ?>>Trực tiếp</option>
                                                  <option value='1' <?php if ($order_info['Pttt']==1) echo 'selected' ?>>Chuyển khoản</option>                                                  
                                              </select>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="ptvc" class="control-label col-lg-2"><strong>Phương thức vận chuyển </strong></label>
                                          <div class="col-lg-4">
                                              <select class="form-control m-bot15" id="ptvc" name="ptvc">
                                                  <option value='0' <?php if ($order_info['Ptvc']==0) echo 'selected' ?>>THÔNG THƯỜNG</option>
                                                  <option value='1' <?php if ($order_info['Ptvc']==1) echo 'selected' ?>>NHANH (50000 đ)</option>                                                  
                                              </select>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label class="control-label col-lg-6"><strong>DANH SÁCH SẢN PHẨM</strong></label>                                                                                                                                                                    
                                      </div>
                                      <?php foreach ($order_list as $item) 
                                            {
                                                foreach ($sanpham as $sp){
                                                    if ($sp['ID']==$item)
                                                    {
                                                        echo'
                                                        <div class="form-group ">
                                                            <label for="sanpham'.$sp['ID'].'" class="control-label col-lg-2"><strong>'.$sp['TENSANPHAM'].' </strong></label>
                                                            <div class="col-lg-4">
                                                                <input class=" form-control" id="sanpham['.$sp['ID'].']" name="sanpham['.$sp['ID'].']" type="number" value="1" min="1" max="'.$sp['SOLUONG'].'"/>
                                                                <input class=" form-control" id="dongia['.$sp['ID'].']" name="dongia['.$sp['ID'].']" type="hidden" value="'.$sp['DONGIA'].'" />
                                                            </div>
                                                            <label class="control-label col-lg-2">(Đơn giá: '.$sp['DONGIA'].' đ)</label>                                                                                                                              
                                                        </div>';
                                                    }

                                                }   
                                            }
                                      ?>                                                                                                             
                                                                        
                                      <div class="form-group ">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-danger" type="submit">Xác nhận</button>
                                              <button class="btn btn-default" type="button" onclick="window.location.href='<?=base_url('admin/dathang')?>'">Hủy</button>
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