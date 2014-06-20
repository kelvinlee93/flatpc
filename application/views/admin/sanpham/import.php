      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h3><i class="icon-truck"></i> <strong><?=$title?></strong></h3>
                          </header>
                          <div class="panel-body">                          
                                <div class="form">
                                  <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="" enctype="multipart/form-data" >                                      
                                      <div class="form-group ">
                                          <label for="nguoinhaphang" class="control-label col-lg-2"><strong>Người nhập hàng </strong></label>
                                          <div class="col-lg-4">
                                              <input class="form-control" id="nguoinhaphang" name="nguoinhaphang" type="text" value="<?=$Username?>" readonly/>
                                          </div>                                                                                                                      
                                      </div>
                                      <div class="form-group last">
                                          <label for="ptvc" class="control-label col-lg-2"><strong>Chọn sản phẩm </strong></label>
                                          <div class="col-lg-4">
                                          <select name="chonsanpham[]" class="multi-select" multiple="" id="chonsanpham" >
                                            <optgroup label="MÁY TÍNH BẢNG">
                                              <?php foreach ($tablet as $item) {
                                                  if ($item['SOLUONG']==0)
                                                      echo '<option value="'.$item['ID'].'">'.$item['TENSANPHAM'].' (Hết hàng)</option>';
                                                  else
                                                      echo '<option value="'.$item['ID'].'">'.$item['TENSANPHAM'].' ('.$item['SOLUONG'].')</option>';
                                              } ?> 
                                            </optgroup>
                                            <optgroup label="MÁY TÍNH XÁCH TAY">
                                              <?php foreach ($laptop as $item) {
                                                  if ($item['SOLUONG']==0)
                                                      echo '<option value="'.$item['ID'].'">'.$item['TENSANPHAM'].' (Hết hàng)</option>';
                                                  else
                                                      echo '<option value="'.$item['ID'].'">'.$item['TENSANPHAM'].' ('.$item['SOLUONG'].')</option>'; 
                                              } ?> 
                                            </optgroup>
                                            <optgroup label="MÁY TÍNH ĐỂ BÀN">
                                              <?php foreach ($desktop as $item) {
                                                  if ($item['SOLUONG']==0)
                                                      echo '<option value="'.$item['ID'].'">'.$item['TENSANPHAM'].' (Hết hàng)</option>';
                                                  else
                                                      echo '<option value="'.$item['ID'].'">'.$item['TENSANPHAM'].' ('.$item['SOLUONG'].')</option>';  
                                              } ?> 
                                            </optgroup>
                                            <optgroup label="PHỤ KIỆN">                                                
                                              <?php foreach ($phukien as $item) {
                                                  if ($item['SOLUONG']==0)
                                                      echo '<option value="'.$item['ID'].'">'.$item['TENSANPHAM'].' (Hết hàng)</option>';
                                                  else
                                                      echo '<option value="'.$item['ID'].'">'.$item['TENSANPHAM'].' ('.$item['SOLUONG'].')</option>';
                                              } ?> 
                                            </optgroup>                                                 
                                          </select>
                                          </div>                                          
                                      </div>                                      
                                      <div class="form-group ">
                                          <label for="sanphammoi" class="control-label col-lg-2"><strong>Sản phẩm mới </strong></label>
                                          <div class="col-lg-4">
                                              <select class="form-control" name="sanphammoi" id="sanphammoi" >
                                                    <option value="0" selected>Không</option>
                                              <?php for ($i=1;$i<=10;$i++) { ?>
                                                    <option value="<?=$i?>"><?=$i?> sản phẩm</option>
                                              <?php } ?>                                                                                                                               
                                              </select>                                            
                                          </div>                                          
                                      </div>                                      
                                      <div class="form-group ">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-danger" type="submit">Tiếp theo</button>
                                              <button class="btn btn-default" type="button" onclick="window.location.href='<?=base_url('admin/sanpham/quanlynhaphang')?>'">Hủy</button>
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