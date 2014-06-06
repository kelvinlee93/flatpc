      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h3><i class="<?php if ($result_sanpham[0]['LOAI']==1) echo 'icon-tablet'; elseif ($result_sanpham[0]['LOAI']==2) echo 'icon-laptop'; elseif($result_sanpham[0]['LOAI']==3) echo 'icon-desktop'; else echo 'icon-gears'?>"></i> <strong><?=$title?></strong></h3>
                          </header>
                          <div class="panel-body">                          
                                <div class="form">
                                  <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="" enctype="multipart/form-data" >
                                      <div class="form-group ">
                                          <label for="productname" class="control-label col-lg-2"><strong>Tên sản phẩm <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="productname" name="productname" type="text" value="<?=$result_sanpham[0]['TENSANPHAM']?>"/>
                                              <input class=" form-control" id="hidden_field" name="hidden_field" type="hidden" value="1" readonly/>
                                              <input class=" form-control" id="avatar" name="avatar" type="hidden" value="<?=$result_sanpham[0]['HINHDAIDIEN']?>" readonly/>
                                              <input class=" form-control" id="productcategory" name="productcategory" type="hidden" value="<?=$result_sanpham[0]['LOAI']?>" readonly/>
                                              <input class=" form-control" id="provider" name="provider" type="hidden" value="<?=$result_sanpham[0]['NHACUNGCAP']?>" readonly/>
                                              <input class=" form-control" id="soluong" name="soluong" type="hidden" value="<?=$result_sanpham[0]['SOLUONG']?>" readonly/>
                                              <input class=" form-control" id="tinhtrang" name="tinhtrang" type="hidden" value="<?=$result_sanpham[0]['TINHTRANG']?>" readonly/>
                                              <input class=" form-control" id="luotxem" name="luotxem" type="hidden" value="<?=$result_sanpham[0]['LUOTXEM']?>" readonly/>
                                              <input class=" form-control" id="luotmua" name="luotmua" type="hidden" value="<?=$result_sanpham[0]['LUOTMUA']?>" readonly/>
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="productcategory" class="control-label col-lg-2"><strong>Loại sản phẩm <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <select class="form-control m-bot15" id="productcategory" name="productcategory">
                                                  <option value="">Loại sản phẩm </option>
                                              <?php foreach ($loaisanpham as $item) { ?>
                                                  <option value="<?=$item['ID']?>" <?php if ($result_sanpham[0]['LOAI']==$item['ID']) echo 'selected' ?>><?=$item['TENLOAI']?></option>
                                              <?php } ?>                                                                                             
                                              </select>
                                          </div>                                          
                                      </div>
                                      <div class="form-group ">
                                          <label for="provider" class="control-label col-lg-2"><strong>Nhà cung cấp <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <select class="form-control m-bot15" id="provider" name="provider">
                                                  <option value="">Nhà cung cấp </option>
                                              <?php foreach ($nhacungcap as $item) { ?>
                                                  <option value="<?=$item['ID']?>" <?php if ($result_sanpham[0]['NHACUNGCAP']==$item['ID']) echo 'selected' ?>><?=$item['TENNCC']?></option>
                                              <?php } ?>                                                                                             
                                              </select>
                                          </div>                                          
                                      </div>                                      
                                      <div class="form-group ">
                                          <label for="desc" class="control-label col-lg-2"><strong>Mô tả </strong></label>
                                          <div class="col-lg-4">                                              
                                              <textarea class="form-control" id="desc" name="desc" rows="10"><?=$result_sanpham[0]['MOTA']?></textarea>
                                          </div>                                          
                                      </div>
                                      <div class="form-group ">
                                          <label for="price" class="control-label col-lg-2"><strong>Đơn giá <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="price" name="price" type="text" value="<?=$result_sanpham[0]['DONGIA']?>"/>
                                              <input class="form-control " id="ngay" name="ngay" type="hidden" value="<?=$result_sanpham[0]['NGAY']?>"/>
                                          </div>                                          
                                      </div>                                      
                                      <div class="form-group ">
                                          <label for="avatar" class="control-label col-lg-2"><strong>Ảnh đại diện</strong></label>                                          
                                          <div class="col-md-9">
                                              <div class="fileupload fileupload-new" data-provides="fileupload">
                                                  <div class="fileupload-new thumbnail" style="width: 345px; height: 240px;">
                                                      <img src="<?=base_url()?>static/img/<?=$result_sanpham[0]['TENANH']?>" alt="" />
                                                  </div>
                                                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                  <div>
                                                   <span class="btn btn-white btn-file">
                                                   <span class="fileupload-new"><i class="icon-paper-clip"></i> Đổi ảnh khác</span>
                                                   <span class="fileupload-exists"><i class="icon-undo"></i> Đổi ảnh khác</span>

                                                   <input type="file" class="default" name="avatar" id="avatar" />
                                                   </span> 
                                                   <a class="fancybox" rel="group" href="<?=base_url()?>static/img/<?=$result_sanpham[0]['TENANH']?>"><span class="btn btn-white btn-file"><i class="icon-zoom-in"></i> Xem ảnh to</span></a>
                                                  </div>
                                              </div>                                          
                                          </div>                                                                             
                                      </div>
                                      <header class="panel-heading">                                      
                                      <h3><i class="icon-tablet"></i> <strong>Chi tiết sản phẩm <?=$result_sanpham[0]['TENSANPHAM']?></strong></h3>
                                      </header>
                                      <div class="form-group ">
                                          <label for="os" class="control-label col-lg-2"><strong>Hệ điều hành </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="os" name="os" type="text" value="<?=$result_chitietsanpham[0]['HEDIEUHANH']?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="screen" class="control-label col-lg-2"><strong>Màn hình </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="screen" name="screen" type="text" value="<?=$result_chitietsanpham[0]['MANHINH']?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="cpu" class="control-label col-lg-2"><strong>Vi xử lý </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="cpu" name="cpu" type="text" value="<?=$result_chitietsanpham[0]['CPU']?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="chipset" class="control-label col-lg-2"><strong>Chipset </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="chipset" name="chipset" type="text" value="<?=$result_chitietsanpham[0]['CHIPSET']?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="graphic" class="control-label col-lg-2"><strong>Đồ họa </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="graphic" name="graphic" type="text" value="<?=$result_chitietsanpham[0]['DOHOA']?>"/>                                              
                                          </div>                                                                                    
                                      </div> 
                                      <div class="form-group ">
                                          <label for="ram" class="control-label col-lg-2"><strong>RAM </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="ram" name="ram" type="text" value="<?=$result_chitietsanpham[0]['RAM']?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="rom" class="control-label col-lg-2"><strong><?php if ($result_sanpham[0]['LOAI']==2||$result_sanpham[0]['LOAI']==3) echo 'Ổ cứng'; else echo 'ROM';?> </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="rom" name="rom" type="text" value="<?=$result_chitietsanpham[0]['ROM']?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="camera" class="control-label col-lg-2"><strong>CAMERA </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="camera" name="camera" type="text" value="<?=$result_chitietsanpham[0]['CAMERA']?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="connect" class="control-label col-lg-2"><strong>Kết nối </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="connect" name="connect" type="text" value="<?=$result_chitietsanpham[0]['KETNOI']?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="cdrom" class="control-label col-lg-2"><strong>Đĩa quang </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="cdrom" name="cdrom" type="text" value="<?=$result_chitietsanpham[0]['DIAQUANG']?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="pin" class="control-label col-lg-2"><strong>PIN </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="pin" name="pin" type="text" value="<?=$result_chitietsanpham[0]['PIN']?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="weight" class="control-label col-lg-2"><strong>Trọng lượng </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="weight" name="weight" type="text" value="<?=$result_chitietsanpham[0]['TRONGLUONG']?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="warranty" class="control-label col-lg-2"><strong>Bảo hành </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="warranty" name="warranty" type="text" value="<?=$result_chitietsanpham[0]['BAOHANH']?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="promotion" class="control-label col-lg-2"><strong>Khuyến mãi </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="promotion" name="promotion" type="text" value="<?=$result_chitietsanpham[0]['KHUYENMAI']?>"/>                                              
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