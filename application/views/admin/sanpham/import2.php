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
                                          <label for="nguoinhaphang2" class="control-label col-lg-2"><strong>Người nhập hàng </strong></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="nguoinhaphang2" name="nguoinhaphang2" type="text" value="<?=$nguoinhaphang?>" readonly/>
                                          </div>                                                                                                                      
                                      </div> 
                                      <?php if ($this->session->userdata('import_list')==TRUE) { ?>                                     
                                      <div class="form-group ">
                                          <label class="control-label col-lg-4"><strong>TÊN SẢN PHẨM</strong></label> 
                                          <label class="control-label col-lg-4"><strong>SỐ LƯỢNG</strong></label>
                                          <label class="control-label col-lg-4"><strong>ĐƠN GIÁ</strong></label>                                                                                                                                                                    
                                      </div>
                                      <?php foreach ($import_list as $item) 
                                            {
                                                foreach ($sanpham as $sp){
                                                    if ($sp['ID']==$item)
                                                    {
                                                        echo'
                                                        <div class="form-group ">
                                                            <label for="sanpham'.$sp['ID'].'" class="control-label col-lg-4"><strong>'.$sp['TENSANPHAM'].' </strong></label>
                                                            <div class="col-lg-4">
                                                                <input class=" form-control" id="sanpham['.$sp['ID'].']" name="sanpham['.$sp['ID'].']" type="number" value="1" min="1"/>                                                                
                                                            </div>                                                            
                                                            <div class="col-lg-4">                                                                
                                                                <input class=" form-control" id="dongia['.$sp['ID'].']" name="dongia['.$sp['ID'].']" type="number" value="0" min="0" />
                                                            </div>                                                                                                                                                                                        
                                                        </div>';
                                                    }

                                                }   
                                            }
                                      ?>
                                      <?php } ?>
                                      <?php if ($sanphammoi>0) { ?>
                                      <div class="form-group ">
                                          <label class="control-label col-lg-4"><strong>TÊN SẢN PHẨM MỚI</strong></label> 
                                          <label class="control-label col-lg-4"><strong>SỐ LƯỢNG</strong></label>
                                          <label class="control-label col-lg-4"><strong>ĐƠN GIÁ</strong></label>
                                      </div>
                                      <?php } ?>
                                      <?php for($i=1;$i<=$sanphammoi;$i++) { ?>                                           
                                          <div class="form-group ">
                                              <div class="col-lg-4">
                                                  <input class=" form-control" id="sanphammoi[<?=$i?>]" name="sanphammoi[<?=$i?>]" type="text" required/>                                                                
                                              </div>
                                              <div class="col-lg-4">
                                                  <input class=" form-control" id="soluongmoi[<?=$i?>]" name="soluongmoi[<?=$i?>]" type="number" value="1" min="1"/>                                                                
                                              </div>                                                            
                                              <div class="col-lg-4">                                                                
                                                  <input class=" form-control" id="dongiamoi[<?=$i?>]" name="dongiamoi[<?=$i?>]" type="number" value="0" min="0" />
                                              </div>                                                                                                                                                                                        
                                          </div>
                                      <?php } ?>                                                                                                             
                                                                        
                                      <div class="form-group ">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-danger" type="submit">Xác nhận</button>
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