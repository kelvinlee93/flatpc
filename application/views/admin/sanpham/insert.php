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
                                              <input class=" form-control" id="productname" name="productname" type="text" value="<?=$product[0]['TENSANPHAM']?>" readonly/>
                                              <input class=" form-control" id="chonsanpham" name="chonsanpham" type="hidden" value="<?=$product[0]['ID']?>" readonly/>
                                              <input class=" form-control" id="soluong" name="soluong" type="hidden" value="<?=$product[0]['SOLUONG']?>" readonly/>
                                              <input class=" form-control" id="tinhtrang" name="tinhtrang" type="hidden" value="<?=$product[0]['TINHTRANG']?>" readonly/>
                                              <input class=" form-control" id="luotxem" name="luotxem" type="hidden" value="<?=$product[0]['LUOTXEM']?>" readonly/>
                                              <input class=" form-control" id="luotmua" name="luotmua" type="hidden" value="<?=$product[0]['LUOTMUA']?>" readonly/>
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="productcategory" class="control-label col-lg-2"><strong>Loại sản phẩm <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <select class="form-control m-bot15" id="productcategory" name="productcategory">
                                                  <option value="">Loại sản phẩm </option>
                                              <?php foreach ($loaisanpham as $item) { ?>
                                                  <option value="<?=$item['ID']?>" <?php if ($product[0]['LOAI']==$item['ID']) echo 'selected' ?>><?=$item['TENLOAI']?></option>
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
                                                  <option value="<?=$item['ID']?>" <?php if ($product[0]['NHACUNGCAP']==$item['ID']) echo 'selected' ?>><?=$item['TENNCC']?></option>
                                              <?php } ?>                                                                                             
                                              </select>
                                          </div>                                          
                                      </div>                                      


                                      <div class="form-group ">
                                          <label for="desc" class="control-label col-lg-2"><strong>Mô tả </strong></label>
                                          <div class="col-lg-4">                                              
                                              <textarea class="form-control" id="desc" name="desc" rows="10"></textarea>
                                          </div>                                          
                                      </div>

                                      <div class="form-group ">
                                          <label for="price" class="control-label col-lg-2"><strong>Đơn giá <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="price" name="price" type="text" value="<?=$product[0]['DONGIA']?>" min="<?=$product[0]['DONGIA']?>"/>
                                          </div>                                          
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
                                      <header class="panel-heading">                                      
                                      <h3><i class="icon-tablet"></i> <strong>Chi tiết sản phẩm <?=$title?></strong></h3>
                                      </header>
                                      <div class="form-group ">
                                          <label for="os" class="control-label col-lg-2"><strong>Hệ điều hành </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="os" name="os" type="text" value="<?php if(isset($_POST["os"])) echo $_POST["os"]; ?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="screen" class="control-label col-lg-2"><strong>Màn hình </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="screen" name="screen" type="text" value="<?php if(isset($_POST["screen"])) echo $_POST["screen"]; ?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="cpu" class="control-label col-lg-2"><strong>Vi xử lý </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="cpu" name="cpu" type="text" value="<?php if(isset($_POST["cpu"])) echo $_POST["cpu"]; ?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="chipset" class="control-label col-lg-2"><strong>Chipset </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="chipset" name="chipset" type="text" value="<?php if(isset($_POST["chipset"])) echo $_POST["chipset"]; ?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="graphic" class="control-label col-lg-2"><strong>Đồ họa </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="graphic" name="graphic" type="text" value="<?php if(isset($_POST["graphic"])) echo $_POST["graphic"]; ?>"/>                                              
                                          </div>                                                                                    
                                      </div> 
                                      <div class="form-group ">
                                          <label for="ram" class="control-label col-lg-2"><strong>RAM </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="ram" name="ram" type="text" value="<?php if(isset($_POST["ram"])) echo $_POST["ram"]; ?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="rom" class="control-label col-lg-2"><strong><?php if ($product[0]['LOAI']==2||$product[0]['LOAI']==3) echo 'Ổ cứng'; else echo 'ROM';?></strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="rom" name="rom" type="text" value="<?php if(isset($_POST["rom"])) echo $_POST["rom"]; ?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="camera" class="control-label col-lg-2"><strong>CAMERA </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="camera" name="camera" type="text" value="<?php if(isset($_POST["camera"])) echo $_POST["camera"]; ?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="connect" class="control-label col-lg-2"><strong>Kết nối </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="connect" name="connect" type="text" value="<?php if(isset($_POST["connect"])) echo $_POST["connect"]; ?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="cdrom" class="control-label col-lg-2"><strong>Đĩa quang </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="cdrom" name="cdrom" type="text" value="<?php if(isset($_POST["cdrom"])) echo $_POST["cdrom"]; ?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="pin" class="control-label col-lg-2"><strong>PIN </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="pin" name="pin" type="text" value="<?php if(isset($_POST["pin"])) echo $_POST["pin"]; ?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="weight" class="control-label col-lg-2"><strong>Trọng lượng </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="weight" name="weight" type="text" value="<?php if(isset($_POST["weight"])) echo $_POST["weight"]; ?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="warranty" class="control-label col-lg-2"><strong>Bảo hành </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="warranty" name="warranty" type="text" value="<?php if(isset($_POST["warranty"])) echo $_POST["warranty"]; ?>"/>                                              
                                          </div>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="promotion" class="control-label col-lg-2"><strong>Khuyến mãi </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="promotion" name="promotion" type="text" value="<?php if(isset($_POST["promotion"])) echo $_POST["promotion"]; ?>"/>                                              
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