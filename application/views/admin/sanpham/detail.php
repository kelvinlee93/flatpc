      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h3><i class="<?php if ($product_info['Loaisanpham']==1) echo 'icon-tablet'; elseif ($product_info['Loaisanpham']==2) echo 'icon-laptop'; elseif($product_info['Loaisanpham']==3) echo 'icon-desktop'; else echo 'icon-gears'?>"></i> <strong>Sản phẩm <?=$title?></strong></h3>
                          </header>
                          <div class="panel-body">                          
                                <div class="form">
                                  <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="" enctype="multipart/form-data" >
                                      <div class="form-group ">
                                          <label for="productname" class="control-label col-lg-2"><strong>Tên sản phẩm <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="productname" name="productname" type="text" value="<?=$product_info['Tensanpham']?>" readonly/>
                                              <input class=" form-control" id="hidden_field" name="hidden_field" type="hidden" value="1" readonly/>
                                              <input class=" form-control" id="avatar" name="avatar" type="hidden" value="<?=$product_info['Hinhdaidien']?>" readonly/>
                                              <input class=" form-control" id="productcategory" name="productcategory" type="hidden" value="<?=$product_info['Loaisanpham']?>" readonly/>
                                              <input class=" form-control" id="provider" name="provider" type="hidden" value="<?=$product_info['Nhacungcap']?>" readonly/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="productcategory" class="control-label col-lg-2"><strong>Loại sản phẩm <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <select class="form-control m-bot15" id="productcategory" name="productcategory" disabled>
                                                  <option value="">Loại sản phẩm </option>
                                              <?php foreach ($loaisanpham as $item) { ?>
                                                  <option value="<?=$item['ID']?>" <?php if ($product_info['Loaisanpham']==$item['ID']) echo 'selected' ?>><?=$item['TENLOAI']?></option>
                                              <?php } ?>                                                                                             
                                              </select>
                                          </div>                                          
                                      </div>
                                      <div class="form-group ">
                                          <label for="provider" class="control-label col-lg-2"><strong>Nhà cung cấp <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <select class="form-control m-bot15" id="provider" name="provider" disabled>
                                                  <option value="">Nhà cung cấp </option>
                                              <?php foreach ($nhacungcap as $item) { ?>
                                                  <option value="<?=$item['ID']?>" <?php if ($product_info['Nhacungcap']==$item['ID']) echo 'selected' ?>><?=$item['TENNCC']?></option>
                                              <?php } ?>                                                                                             
                                              </select>
                                          </div>                                          
                                      </div>                                      
                                      <div class="form-group ">
                                          <label for="desc" class="control-label col-lg-2"><strong>Mô tả </strong></label>
                                          <div class="col-lg-4">                                              
                                              <textarea class="form-control" id="desc" name="desc" rows="10" readonly><?=$product_info['Mota']?></textarea>
                                          </div>                                          
                                      </div>
                                      <div class="form-group ">
                                          <label for="price" class="control-label col-lg-2"><strong>Đơn giá <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="price" name="price" type="text" value="<?=$product_info['Dongia']?>" readonly/>
                                          </div>                                          
                                      </div>
                                      <div class="form-group ">
                                          <label class="control-label col-lg-2"><strong>Hình đại diện </strong></label>
                                          <div class="col-lg-4">
                                              <img src="<?=base_url()?>static/img/<?php if(is_numeric($product_info['Hinhdaidien'])) echo 'chua-co-anh.gif'; else echo $product_info['Hinhdaidien']; ?>" width="320" heigh="250"/>
                                              <a class="fancybox" rel="group" href="<?=base_url()?>static/img/<?php if(is_numeric($product_info['Hinhdaidien'])) echo 'chua-co-anh.gif'; else echo $product_info['Hinhdaidien']; ?>"><span class="btn btn-white btn-file"><i class="icon-zoom-in"></i> Xem ảnh to</span></a>
                                          </div>                                                                                    
                                      </div>
                                      <header class="panel-heading">                                      
                                      <h3><i class="icon-tablet"></i> <strong>Chi tiết sản phẩm <?=$title?></strong></h3>
                                      </header>
                                      <div class="form-group ">
                                          <label for="os" class="control-label col-lg-2"><strong>Hệ điều hành </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="os" name="os" type="text" value="<?php echo set_value('os'); ?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="screen" class="control-label col-lg-2"><strong>Màn hình </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="screen" name="screen" type="text" value="<?php echo set_value('screen'); ?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="cpu" class="control-label col-lg-2"><strong>Vi xử lý </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="cpu" name="cpu" type="text" value="<?php echo set_value('cpu'); ?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="chipset" class="control-label col-lg-2"><strong>Chipset </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="chipset" name="chipset" type="text" value="<?php echo set_value('chipset'); ?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="graphic" class="control-label col-lg-2"><strong>Đồ họa </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="graphic" name="graphic" type="text" value="<?php echo set_value('graphic'); ?>"/>                                              
                                          </div>                                                                                    
                                      </div> 
                                      <div class="form-group ">
                                          <label for="ram" class="control-label col-lg-2"><strong>RAM </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="ram" name="ram" type="text" value="<?php echo set_value('ram'); ?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="rom" class="control-label col-lg-2"><strong><?php if ($product_info['Loaisanpham']==2||$product_info['Loaisanpham']==3) echo 'Ổ cứng'; else echo 'ROM';?></strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="rom" name="rom" type="text" value="<?php echo set_value('rom'); ?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="camera" class="control-label col-lg-2"><strong>CAMERA </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="camera" name="camera" type="text" value="<?php echo set_value('camera'); ?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="connect" class="control-label col-lg-2"><strong>Kết nối </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="connect" name="connect" type="text" value="<?php echo set_value('connect'); ?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="cdrom" class="control-label col-lg-2"><strong>Đĩa quang </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="cdrom" name="cdrom" type="text" value="<?php echo set_value('cdrom'); ?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="pin" class="control-label col-lg-2"><strong>PIN </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="pin" name="pin" type="text" value="<?php echo set_value('pin'); ?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="weight" class="control-label col-lg-2"><strong>Trọng lượng </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="weight" name="weight" type="text" value="<?php echo set_value('weight'); ?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="warranty" class="control-label col-lg-2"><strong>Bảo hành </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="warranty" name="warranty" type="text" value="<?php echo set_value('warranty'); ?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="promotion" class="control-label col-lg-2"><strong>Khuyến mãi </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="promotion" name="promotion" type="text" value="<?php echo set_value('promotion'); ?>"/>                                              
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