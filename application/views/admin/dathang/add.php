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
                                              <input class=" form-control" id="tenkhachhang" name="tenkhachhang" type="text" value="<?php echo set_value('tenkhachhang'); ?>"/>
                                          </div>
                                          <?php echo form_error('tenkhachhang'); ?>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="sdtkhachhang" class="control-label col-lg-2"><strong>SĐT khách hàng <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="sdtkhachhang" name="sdtkhachhang" type="text" value="<?php echo set_value('sdtkhachhang'); ?>"/>
                                          </div>
                                          <?php echo form_error('sdtkhachhang'); ?>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="tennguoinhan" class="control-label col-lg-2"><strong>Tên người nhận <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="tennguoinhan" name="tennguoinhan" type="text"  value="<?php echo set_value('tennguoinhan'); ?>"/>
                                          </div>
                                          <?php echo form_error('tennguoinhan'); ?>                                          
                                      </div>
                                      <div class="form-group ">
                                          <label for="sdtnguoinhan" class="control-label col-lg-2"><strong>SĐT người nhận <span style="color: red">*</span></strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="sdtnguoinhan" name="sdtnguoinhan" type="text" value="<?php echo set_value('sdtnguoinhan'); ?>"/>
                                          </div>
                                          <?php echo form_error('sdtnguoinhan'); ?>                                                                                    
                                      </div>
                                      <div class="form-group ">
                                          <label for="diachi" class="control-label col-lg-2"><strong>Địa chỉ </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="diachi" name="diachi" type="text"  value="<?php echo set_value('diachi'); ?>"/>
                                          </div>                                          
                                      </div>
                                      <div class="form-group ">
                                          <label for="pttt" class="control-label col-lg-2"><strong>Phương thức thanh toán</strong></label>
                                          <div class="col-lg-4">
                                              <select class="form-control m-bot15" id="pttt" name="pttt">
                                                  <option value='0' <?php if (isset($_POST['pttt'])&&$_POST['pttt']==0) echo 'selected' ?>>Trực tiếp</option>
                                                  <option value='1' <?php if (isset($_POST['pttt'])&&$_POST['pttt']==1) echo 'selected' ?>>Chuyển khoản</option>                                                  
                                              </select>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="ptvc" class="control-label col-lg-2"><strong>Phương thức vận chuyển </strong></label>
                                          <div class="col-lg-4">
                                              <select class="form-control m-bot15" id="ptvc" name="ptvc">
                                                  <option value='0' <?php if (isset($_POST['ptvc'])&&$_POST['ptvc']==0) echo 'selected' ?>>THÔNG THƯỜNG</option>
                                                  <option value='1' <?php if (isset($_POST['ptvc'])&&$_POST['ptvc']==1) echo 'selected' ?>>NHANH (50000 đ)</option>                                                  
                                              </select>
                                          </div>
                                      </div>

                                      <div class="form-group last">
                                          <label for="ptvc" class="control-label col-lg-2"><strong>Chọn sản phẩm </strong></label>
                                          <div class="col-lg-4">
                                          <select name="chonsanpham[]" class="multi-select" multiple="" id="chonsanpham" >
                                            <optgroup label="MÁY TÍNH BẢNG">
                                              <?php foreach ($tablet as $item) {
                                                  if ($item['TINHTRANG']==1)
                                                    {
                                                      if (isset($_POST["chonsanpham"]))
                                                      {
                                                        $d = 0;                                                             
                                                        foreach ($_POST['chonsanpham'] as $a)
                                                        {
                                                          if ($item['ID']==$a)
                                                          {                                                      
                                                            echo '<option value="'.$item['ID'].'" selected>'.$item['TENSANPHAM'].' ('.$item['SOLUONG'].')</option>';
                                                            $d = $d + 1;
                                                            break;
                                                          }                                                              
                                                        }
                                                        if ($d==0) echo '<option value="'.$item['ID'].'">'.$item['TENSANPHAM'].' ('.$item['SOLUONG'].')</option>';
                                                      }
                                                      else echo '<option value="'.$item['ID'].'">'.$item['TENSANPHAM'].' ('.$item['SOLUONG'].')</option>';
                                                    }
                                                  elseif ($item['TINHTRANG']==0)
                                                      echo '<option value="'.$item['ID'].'" disabled>'.$item['TENSANPHAM'].' (hết hàng)</option>';
                                                  elseif ($item['TINHTRANG']==-1)
                                                      echo '<option value="'.$item['ID'].'" disabled>'.$item['TENSANPHAM'].' (ngưng kinh doanh)</option>';  
                                              } ?> 
                                            </optgroup>
                                            <optgroup label="MÁY TÍNH XÁCH TAY">
                                              <?php foreach ($laptop as $item) {
                                                  if ($item['TINHTRANG']==1)
                                                    {
                                                      if (isset($_POST["chonsanpham"]))
                                                      {
                                                        $d = 0;                                                             
                                                        foreach ($_POST['chonsanpham'] as $a)
                                                        {
                                                          if ($item['ID']==$a)
                                                          {                                                      
                                                            echo '<option value="'.$item['ID'].'" selected>'.$item['TENSANPHAM'].' ('.$item['SOLUONG'].')</option>';
                                                            $d = $d + 1;
                                                            break;
                                                          }                                                              
                                                        }
                                                        if ($d==0) echo '<option value="'.$item['ID'].'">'.$item['TENSANPHAM'].' ('.$item['SOLUONG'].')</option>';
                                                      }
                                                      else echo '<option value="'.$item['ID'].'">'.$item['TENSANPHAM'].' ('.$item['SOLUONG'].')</option>';
                                                    }
                                                  elseif ($item['TINHTRANG']==0)
                                                      echo '<option value="'.$item['ID'].'" disabled>'.$item['TENSANPHAM'].' (hết hàng)</option>';
                                                  elseif ($item['TINHTRANG']==-1)
                                                      echo '<option value="'.$item['ID'].'" disabled>'.$item['TENSANPHAM'].' (ngưng kinh doanh)</option>';  
                                              } ?> 
                                            </optgroup>
                                            <optgroup label="MÁY TÍNH ĐỂ BÀN">
                                              <?php foreach ($desktop as $item) {
                                                  if ($item['TINHTRANG']==1)
                                                    {
                                                      if (isset($_POST["chonsanpham"]))
                                                      {
                                                        $d = 0;                                                             
                                                        foreach ($_POST['chonsanpham'] as $a)
                                                        {
                                                          if ($item['ID']==$a)
                                                          {                                                      
                                                            echo '<option value="'.$item['ID'].'" selected>'.$item['TENSANPHAM'].' ('.$item['SOLUONG'].')</option>';
                                                            $d = $d + 1;
                                                            break;
                                                          }                                                              
                                                        }
                                                        if ($d==0) echo '<option value="'.$item['ID'].'">'.$item['TENSANPHAM'].' ('.$item['SOLUONG'].')</option>';
                                                      }
                                                      else echo '<option value="'.$item['ID'].'">'.$item['TENSANPHAM'].' ('.$item['SOLUONG'].')</option>';
                                                    }
                                                  elseif ($item['TINHTRANG']==0)
                                                      echo '<option value="'.$item['ID'].'" disabled>'.$item['TENSANPHAM'].' (hết hàng)</option>';
                                                  elseif ($item['TINHTRANG']==-1)
                                                      echo '<option value="'.$item['ID'].'" disabled>'.$item['TENSANPHAM'].' (ngưng kinh doanh)</option>';  
                                              } ?> 
                                            </optgroup>
                                            <optgroup label="PHỤ KIỆN">                                                
                                              <?php foreach ($phukien as $item) {
                                                  if ($item['TINHTRANG']==1)
                                                    {
                                                      if (isset($_POST["chonsanpham"]))
                                                      {
                                                        $d = 0;                                                             
                                                        foreach ($_POST['chonsanpham'] as $a)
                                                        {
                                                          if ($item['ID']==$a)
                                                          {                                                      
                                                            echo '<option value="'.$item['ID'].'" selected>'.$item['TENSANPHAM'].' ('.$item['SOLUONG'].')</option>';
                                                            $d = $d + 1;
                                                            break;
                                                          }                                                              
                                                        }
                                                        if ($d==0) echo '<option value="'.$item['ID'].'">'.$item['TENSANPHAM'].' ('.$item['SOLUONG'].')</option>';
                                                      }
                                                      else echo '<option value="'.$item['ID'].'">'.$item['TENSANPHAM'].' ('.$item['SOLUONG'].')</option>';
                                                    }
                                                  elseif ($item['TINHTRANG']==0)
                                                      echo '<option value="'.$item['ID'].'" disabled>'.$item['TENSANPHAM'].' (hết hàng)</option>';
                                                  elseif ($item['TINHTRANG']==-1)
                                                      echo '<option value="'.$item['ID'].'" disabled>'.$item['TENSANPHAM'].' (ngưng kinh doanh)</option>';  
                                              } ?> 
                                            </optgroup>                                                 
                                          </select>
                                          </div>
                                          <?php echo form_error('chonsanpham'); ?>
                                      </div>

                                      <div class="form-group ">
                                          <div class="col-lg-offset-1 col-lg-10">                                      
                                              <span class="label label-danger">LƯU Ý</span> Các trường được đánh dấu <span style="color: red">*</span> là bắt buộc</br></br>                                    
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-danger" type="submit">Tiếp theo</button>
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