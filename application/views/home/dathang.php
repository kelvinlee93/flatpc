<div class="row clearfix f-space10"></div>
<?php if ($noti) { ?>
<div class="row clearfix"></div>
    <div class="container">
        <div style="color: red"><strong>Lỗi xảy ra: Vui lòng kiểm tra lại địa chỉ giao hàng.</strong></div></div>
<?php } ?>
<div class="row clearfix f-space10"></div>
<!-- Page title -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="page-title">
        <h2>Đặt hàng</h2>
      </div>
    </div>
  </div>
</div>
<!-- end: Page title -->
<div class="row clearfix f-space10"></div>
<div class="container"> 
  <!-- row -->
  <div class="row">
    <div class="col-md-9 col-sm-12 col-xs-12 main-column box-block">     
      <!-- Checkout Options -->
      <div class="box-content checkout-op">
        <div class="panel-group" id="checkout-options"> 
          
          <!-- login and register panel -->
          <div class="panel panel-default">
            <div class="panel-heading opened" data-parent="#checkout-options" data-target="#op1" data-toggle="collapse">
              <h4 class="panel-title"> <a href="#a"> <span class="fa fa-key"></span> KIỂM TRA ĐĂNG NHẬP </a><span class="op-number">01</span> </h4>
            </div>
            <div class="panel-collapse collapse in" id="op1">
              <div class="panel-body">
                <div class="row co-row"> 
                  <?php if ($Login!=1) { ?>
                  <!-- Login -->                  
                  <div class="col-md-6 col-xs-12">
                    <div class="box-content login-box">
                      <h4>Đăng nhập với tài khoản đã đăng ký</h4>
                      <form id="login" method="post" action="<?=base_url()?>dangnhap?redirect=<?=urlencode($_SERVER["REQUEST_URI"])?>">
                        <input type="text" id="username" name="username" placeholder="Tên đăng nhập hoặc số điện thoại" class="input4">                        
                        <input type="password" id="password" name="password" placeholder="Mật khẩu" class="input4">
                        <label class="checkbox" for="remember">
                          <input type="checkbox" id="remember" name="remember" value="1" data-toggle="checkbox" class="pull-left">
                          <span class="pull-left">Ghi nhớ đăng nhập</span> </label>
                        <button class="btn medium color2 pull-right" type="submit" form="login">Đăng nhập</button>                        
                      </form>
                    </div>
                  </div>
                  <!-- end: Login --> 
                  <!-- Register -->
                  
                  <div class="col-md-6 col-xs-12">
                    <div class="box-content register-box">
                      <h4>Chưa có tài khoản?</h4>
                      <p>Hãy đăng ký tài khoản ngay hôm nay để nhận được nhiều lợi ích:</p>
                      <ul>
                        <li><i class="fa fa-check fa-fw"></i> Thanh toán dễ dàng và nhanh chóng.</li>
                        <li><i class="fa fa-check fa-fw"></i> Theo dõi lịch sử và trạng thái các giao dịch.</li>
                        <li><i class="fa fa-check fa-fw"></i> Nhận được nhiều ưu đãi và khuyến mãi hấp dẫn từ FlatPC.</li>                        
                        <li></li> 
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>                                              
                      </ul>
                      <form>
                        <button class="btn medium color2 pull-right" onclick="window.location.href='<?=base_url('dangky')?>'" type="button">Đăng ký</button>                        
                      </form>
                    </div>
                  </div>
                  
                  <!-- end: Register --> 
                  <?php } else { ?>
                  <div class="col-md-6 col-xs-12">
                    <div class="box-content login-box">
                      <h4>Đã đăng nhập với tài khoản <?=$Username?></h4>
                      <button class="btn medium color2 pull-right" data-parent="#checkout-options" data-target="#op2" data-toggle="collapse" type="button">TIẾP TỤC</button>
                    </div>

                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          
          <!-- end: login and register panel --> 
          
          <!-- Billing Address panel -->
          
          <div class="panel panel-default <?php if ($Login!=1) echo 'disabled'; ?>">
            <div class="panel-heading closed" data-parent="#checkout-options" data-target="#op2" data-toggle="collapse">
              <h4 class="panel-title"> <a href="#a"> <span class="fa fa-credit-card"></span> THÔNG TIN THANH TOÁN</a><span class="op-number">02</span> </h4>
            </div>
            <div class="panel-collapse collapse" id="op2">
              <div class="panel-body">
                <div class="row co-row">                  
                    <!-- Login -->

                    <div class="col-md-6 col-xs-12">
                      <div class="box-content form-box">
                      <?php if ($Login==1) { ?>                        
                        <h4>HỌ ĐỆM</h4>
                        <input type="text" form="orderForm" value="<?=$tttt[0]['HODEM']?>" name="hodem" placeholder="Họ đệm *" class="input4" readonly>
                        <h4>TÊN</h4>
                        <input type="text" form="orderForm" value="<?=$tttt[0]['TENNGUOIDUNG']?>" name="tenkhachhang" placeholder="Tên khách hàng *" class="input4" readonly>
                        <h4>EMAIL</h4>
                        <input type="text" value="<?=$tttt[0]['EMAIL']?>" name="email" placeholder="Email *" class="input4" readonly>                        
                      <?php } ?>  
                      </div>
                    </div>
                    <!-- end: Login --> 
                    <!-- Register -->
                    
                    <div class="col-md-6 col-xs-12">
                      <div class="box-content form-box">
                      <?php if ($Login==1) { ?>                        
                        <h4>SỐ ĐIỆN THOẠI</h4>
                        <input  form="orderForm" type="text" value="<?=$tttt[0]['SDT']?>" name="sdt" placeholder="Số điện thoại *" class="input4" readonly>                                                
                        <h4>NGÀY SINH</h4>
                        <input type="text" value="<?=date('d-m-Y',strtotime($tttt[0]['NGAYSINH']))?>" name="address1" placeholder="Ngày sinh *" class="input4" readonly>
                        <h4>ĐỊA CHỈ</h4>
                        <input type="text" value="<?=$tttt[0]['DIACHI']?>" name="address2" placeholder="Địa chỉ *" class="input4" readonly>                                                                                                
                      <?php } ?>
                        <button class="btn medium color2 pull-right" data-parent="#checkout-options" data-target="#op3" data-toggle="collapse" type="button">TIẾP TỤC</button>
                      </div>
                    </div>                 
                  <!-- end: Register --> 
                  
                </div>
              </div>
            </div>
          </div>
          
          <!-- end: Billing Address panel --> 
          
          <!--Shipping Address panel -->
          
          <div class="panel panel-default <?php if ($Login!=1) echo 'disabled'; ?>">
            <div class="panel-heading closed" data-parent="#checkout-options" data-target="#op3" data-toggle="collapse">
              <h4 class="panel-title"> <a href="#a"> <span class="fa fa-map-marker"></span> ĐỊA CHỈ GIAO HÀNG </a><span class="op-number">03</span> </h4>
            </div>
            <div class="panel-collapse collapse" id="op3">
              <div class="panel-body">
                <div class="row co-row">
                    <form id="orderForm" method="post">
                    <!-- Login -->
                    <div class="col-md-12 col-xs-12">
                      <div class="box-content form-box">                                           
                        <h4>HỌ TÊN <span style="color: red">*</span></h4>
                        <input type="text" <?php if (isset($_POST["hoten_gh"])) echo 'value="'.$_POST["hoten_gh"].'"'; ?> name="hoten_gh" id="hoten_gh" class="input4">
                        <h4>SỐ ĐIỆN THOẠI <span style="color: red">*</span></h4>
                        <input type="text" <?php if (isset($_POST["sdt_gh"])) echo 'value="'.$_POST["sdt_gh"].'"'; ?> name="sdt_gh" id="sdt_gh" class="input4">
                        <h4>ĐỊA CHỈ <span style="color: red">*</span></h4>
                        <textarea name="dc_gh" id="dc_gh" rows="4" cols="88"><?php if (isset($_POST["dc_gh"])) echo $_POST["dc_gh"]; ?></textarea> </br> </br>                                                           
                        <button class="btn medium color2 pull-right" data-parent="#checkout-options" data-target="#op4" data-toggle="collapse" type="button">TIẾP TỤC</button>                     
                      </div>
                    </div>
                    </form>
                    <!-- end: Login --> 
                    <!-- Register -->
                                        
                  
                  <!-- end: Register --> 
                  
                </div>
              </div>
            </div>
          </div>
          
          <!-- end: Shipping Address panel --> 
          
          <!--Shipping Method -->
          
          <div class="panel panel-default <?php if ($Login!=1) echo 'disabled'; ?>"> <!-- add class disabled to prevent from clicking -->
            <div class="panel-heading closed" data-parent="#checkout-options" data-target="#op4" data-toggle="collapse">
              <h4 class="panel-title"> <a href="#a"> <span class="fa fa-truck"></span> PHƯƠNG THỨC VẬN CHUYỂN </a><span class="op-number">04</span> </h4>
            </div>
            <div class="panel-collapse collapse" id="op4">
              <div class="panel-body">
                <div class="row co-row"> 
                  
                  <!-- Shipping methods -->
                  <div class="col-md-12 col-xs-12">
                    <div class="box-content form-box">                      
                      <h4>Vui lòng chọn phương thức vận chuyển phù hợp địa chỉ giao hàng của bạn.</h4>
                      <label class="radio" for="radio1">
                        <input type="radio" value="0" data-toggle="radio" form="orderForm" name="ptvc" id="thongthuong" class="pull-left" <?php if (isset($_POST["ptvc"])) { if ($_POST["ptvc"]!=1) echo 'checked'; } else echo 'checked'; ?>>
                        <span class="pull-left color1 provider">VẬN CHUYỂN THÔNG THƯỜNG </span> - <span class="color2 price">MIỄN PHÍ</span><br/>
                        <em>Thời gian nhận hàng từ 3 đến 5 ngày tùy khu vực.</em> </label>
                      <label class="radio" for="radio2">
                        <input type="radio" value="1" data-toggle="radio" form="orderForm" name="ptvc" id="captoc" class="pull-left" <?php if (isset($_POST["ptvc"])) if ($_POST["ptvc"]==1) echo 'checked'; ?>>
                        <span class="pull-left color1 provider">VẬN CHUYỂN NHANH </span> - <span class="color2 price">50.000 đ</span><br/>
                        <em>Thời gian nhận hàng từ 1 đến 2 ngày.</em> </label>                                          
                      <button class="btn medium color2 pull-right" data-parent="#checkout-options" data-target="#op5" data-toggle="collapse" type="button">TIẾP TỤC</button>
                    </div>
                  </div>
                  <!-- end: Shipping methods --> 
                  <script type="text/javascript">
                  function number_format(number, decimals, dec_point, thousands_sep) {
                    number = (number + '')
                      .replace(/[^0-9+\-Ee.]/g, '');
                    var n = !isFinite(+number) ? 0 : +number,
                      prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                      sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                      dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                      s = '',
                      toFixedFix = function(n, prec) {
                        var k = Math.pow(10, prec);
                        return '' + (Math.round(n * k) / k)
                          .toFixed(prec);
                      };
                    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n))
                      .split('.');
                    if (s[0].length > 3) {
                      s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                    }
                    if ((s[1] || '')
                      .length < prec) {
                      s[1] = s[1] || '';
                      s[1] += new Array(prec - s[1].length + 1)
                        .join('0');
                    }
                    return s.join(dec);
                  }
                  $(document).ready(function() {
                     $('#captoc').change( function(){
                        $('#phivanchuyen').text('50.000 đ');
                        $('#phivanchuyen2').text('50.000 đ');    
                        var gtcu = document.getElementById("hidden").innerText;                                            
                        var gtmoi = parseInt(gtcu) + parseInt("50000");                                                
                        document.getElementById("thanhtien").innerHTML = number_format(gtmoi, 0, ',', '.') + ' đ';
                        document.getElementById("thanhtien2").innerHTML = number_format(gtmoi, 0, ',', '.') + ' đ';
                        document.getElementById("hidden").innerHTML = gtmoi;                        
                     });
                     $('#thongthuong').change( function(){
                        $('#phivanchuyen').text('0 đ');
                        $('#phivanchuyen2').text('0 đ');
                        var gtcu = document.getElementById("hidden").innerText;                                            
                        var gtmoi = parseInt(gtcu) - parseInt("50000");                                                
                        document.getElementById("thanhtien").innerHTML = number_format(gtmoi, 0, ',', '.') + ' đ';
                        document.getElementById("thanhtien2").innerHTML = number_format(gtmoi, 0, ',', '.') + ' đ';
                        document.getElementById("hidden").innerHTML = gtmoi;
                     });
                  });
                  </script>
                </div>
              </div>
            </div>
          </div>
          
          <!-- end: Shipping Method --> 
          
          <!-- Payment Method -->
          
          <div class="panel panel-default <?php if ($Login!=1) echo 'disabled'; ?>"> <!-- add class disabled to prevent from clicking -->
            <div class="panel-heading closed" data-parent="#checkout-options" data-target="#op5" data-toggle="collapse">
              <h4 class="panel-title"> <a href="#a"> <span class="fa fa-money"></span> PHƯƠNG THỨC THANH TOÁN </a><span class="op-number">05</span> </h4>
            </div>
            <div class="panel-collapse collapse" id="op5">
              <div class="panel-body">
                <div class="row co-row"> 
                  
                  <!-- Payment methods -->
                  <div class="col-md-12 col-xs-12">
                    <div class="box-content form-box">                      
                      <h4>Vui lòng chọn một phương thức thanh toán dưới đây.</h4>
                      <label class="radio" for="radio4">
                        <input type="radio" value="0" id="tructiep" data-toggle="radio" form="orderForm" name="pttt" class="pull-left" <?php if (isset($_POST["pttt"])) { if ($_POST["pttt"]!=1) echo 'checked'; } else echo 'checked'; ?>>
                        <span class="pull-left color1 provider">Trực tiếp</span><br/>
                        <em>Quý khách trực tiếp đến thanh toán tại cửa hàng FlatPC trong giờ hành chính. (Địa chỉ: 725/66 Trường Chinh, Q.Tân Phú, TP.HCM)</em> </label>                      
                      <label class="radio" for="radio6">
                        <input type="radio" value="1" id="chuyenkhoan" data-toggle="radio" form="orderForm" name="pttt" class="pull-left" <?php if (isset($_POST["pttt"])) if ($_POST["pttt"]==1) echo 'checked'; ?>>
                        <span class="pull-left color1 provider">Chuyển khoản</span><br/>
                        <em>Quý khách chuyển khoản vào một trong những tài khoản sau: </em> </label>
                        </br>
                        <h4>DANH SÁCH TÀI KHOẢN NGÂN HÀNG GIAO DỊCH</h4>                        
                        <div class="col-md-4 col-xs-4">
                          <div class="image"><img src="<?=base_url()?>static/img/vietcombank.png"/></div>
                          <ul>
                            <li>Người thụ hưởng: Lê Thanh Diệp</li>
                            <li>Số tài khoản: 0071 000 654 170</li>
                          </ul>

                          <div class="image"><img src="<?=base_url()?>static/img/vietinbank.png"/></div>
                          <ul>
                            <li>Người thụ hưởng: Lê Thanh Diệp</li>
                            <li>Số tài khoản: 0071 000 654 170</li>
                          </ul> 
                        </div>
                        <div class="col-md-4 col-xs-8">
                          <div class="image"><img src="<?=base_url()?>static/img/agribank.png"/></div>
                          <ul>
                            <li>Người thụ hưởng: Lê Thanh Diệp</li>
                            <li>Số tài khoản: 0071 000 654 170</li>
                          </ul>

                          <div class="image"><img src="<?=base_url()?>static/img/sacombank.png"/></div>
                          <ul>
                            <li>Người thụ hưởng: Lê Thanh Diệp</li>
                            <li>Số tài khoản: 0071 000 654 170</li>
                          </ul> 
                        </div> </br></br></br></br></br></br></br></br></br></br></br></br></br>                       
                        <h4><strong>LƯU Ý:</strong> </br>NỘI DUNG CHUYỂN KHOẢN PHẢI CHỨA MÃ ĐƠN HÀNG. SAU KHI CHUYỂN KHOẢN QUÝ KHÁCH CÓ THỂ THÔNG BÁO CHO CHÚNG TÔI QUA ĐIỆN THOẠI HOẶC EMAIL. </h4>
                      <button class="btn medium color2 pull-right" data-parent="#checkout-options" data-target="#op6" data-toggle="collapse" type="button">TIẾP TỤC</button>                      
                    </div>
                  </div>
                  <!-- end: Payment methods --> 
                  
                </div>
              </div>
            </div>
          </div>
          
          <!-- end: Payment Method --> 
          
          <!-- Confirm Order -->
          
          <div class="panel panel-default <?php if ($Login!=1) echo 'disabled'; ?>"> <!-- add class disabled to prevent from clicking -->
            <div class="panel-heading closed" data-parent="#checkout-options" data-target="#op6" data-toggle="collapse">
              <h4 class="panel-title"> <a href="#a"> <span class="fa fa-check"></span> XÁC NHẬN ĐẶT HÀNG </a><span class="op-number">06</span> </h4>
            </div>
            <div class="panel-collapse collapse" id="op6">
              <div class="panel-body">
                <div class="row co-row">
                  <div class="col-md-12 col-xs-12">
                    <div class="box-content form-box">
                    <?php $d=0; foreach ($this->cart->contents() as $item) 
                    { if ($item['qty']!=0) { $d++; ?>
                    <form action="<?=base_url('giohang/update')?>" method="post" id="cart_<?=$d?>" name="cart_<?=$d?>">
                        <!-- product -->                        
                          <div class="row">
                            <div class="product">
                              <div class="col-md-2 col-sm-3 hidden-xs p-wr">
                                <div class="product-attrb-wr">
                                  <div class="product-attrb">
                                    <div class="image"> <a class="img" href="<?=base_url()?>sanpham/chitiet?id=<?=$item['id']?>"><img alt="product info" src="<?=base_url()?>static/img/<?=$item['img']?>" title="<?=$item['name']?>"></a> </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-3 col-sm-7 col-xs-9 p-wr">
                                <div class="product-attrb-wr">
                                  <div class="product-meta">
                                    <div class="name">
                                      <h3><a href="<?=base_url()?>sanpham/chitiet?id=<?=$item['id']?>"><?=$item['name']?></a></h3>
                                    </div>              
                                    </div>                                                                        
                                          <input type="hidden" id="rowid" name="rowid" value="<?=$item['rowid']?>"/>
                                          <input type="hidden" id="qty" name="qty" value="<?php if (isset($_POST["p_quantity"])) echo $_POST["p_quantity"]; else echo $item['qty']; ?>">                                                            
                                </div>
                              </div>
                              <div class="col-md-2 hidden-sm hidden-xs p-wr">
                                <div class="product-attrb-wr">
                                  <div class="product-attrb">              
                                    <div class="att"> <span>Hãng:</span> <?=$item['ncc']?></div>
                                    <div class="att"> <span>Loại:</span> <?=$item['type']?></div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2 hidden-sm hidden-xs p-wr">
                                <div class="product-attrb-wr">
                                  <div class="product-attrb">
                                    <div class="qtyinput">
                                      <div class="quantity-inp">
                                        <select class="input4" id="p_quantity" name="p_quantity" onchange="document.getElementById('btnSearch_<?=$d?>').click()">
                                          <?php for ($i=1;$i<=10;$i++) { ?>
                                          <option value="<?=$i?>"<?php if ($i==$item['qty']) echo ' selected'; if ($i>$item['soluong']) echo ' disabled';?>><center><?=$i?><?php if ($i>$item['soluong']) echo ' (Hết hàng)';?><center></option>
                                          <?php } ?>                                   
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2 hidden-sm hidden-xs p-wr">
                                <div class="product-attrb-wr">
                                  <div class="product-attrb">
                                    <div class="price"> <span class="t-price"><?=number_format($item['price']*$item['qty'], 0, ',', '.');?></div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-1 col-sm-2 col-xs-3 p-wr">
                                <div class="product-attrb-wr">
                                  <div class="product-attrb">
                                    <button class="color2" style="border: none; padding: 0; background: none;" data-toggle="tooltip" data-original-title="Cập nhật" id="btnSearch_<?=$d?>" name="update" type="submit" hidden="true" value="1"><i class="fa fa-refresh fa-fw color2"></i></button>
                                    <button class="color2" style="border: none; padding: 0; background: none;" data-toggle="tooltip" data-original-title="Xóa" name="delete" type="submit" value="1"><i class="fa fa-trash-o fa-fw color2"></i></button>              
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>                            
                        <!-- end: product -->
                      </form>                                              
                      <?php } } ?>                                                                                                      
                      
                      <div class="box-content cart-box-wr pull-right">
                        <div class="cart-box-tm">
                          <div class="tm1">Tổng cộng</div>
                          <div class="tm2"><?=number_format($this->cart->total(), 0, ',', '.');?> đ</div>
                        </div>                                
                        <div class="clearfix f-space10"></div>
                        <div class="cart-box-tm">
                          <div class="tm1">VAT (10%) </div>
                          <div class="tm2"><?=number_format($this->cart->total()*0.1, 0, ',', '.');?> đ</div>
                        </div>
                        <div class="cart-box-tm">
                          <div class="tm1">Phí vận chuyển </div>
                          <div class="tm2" id="phivanchuyen2">0 đ</div>
                        </div>                        
                        <div class="clearfix f-space10"></div>
                        <div class="cart-box-tm">
                          <div class="tm3 bgcolor2">Thành tiền </div>
                          <div class="tm4 bgcolor2" id="thanhtien2"><?=number_format($this->cart->total()*0.1+$this->cart->total(), 0, ',', '.');?> đ</div>
                        </div>
                      </div>
                      <div class="clearfix f-space20"></div>
                      <!--  <textarea name="comments" id="comments" cols="5" rows="5" class="input4" placeholder="Comments/messsage"></textarea> -->
                      
                      <button class="btn large color1 pull-right" type="submit" form="orderForm" name="orderbtn" id="orderbtn">Xác nhận đặt hàng</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- end: Confirm Order --> 
        </form>    
        </div>
      </div>
      <!-- end: Checkout Options --> 
      
    </div>
    <!-- side bar -->
    <div class="col-md-3 col-sm-12 col-xs-12 box-block page-sidebar">
      <div class="box-heading"><span>THÔNG TIN ĐƠN HÀNG</span></div>
      <!-- Cart Summary -->
      <div class="box-content cart-box-wr">
        <div class="cart-box-tm">          
          <div class="tm1">Tổng cộng</div>
          <div class="tm2"><?=number_format($this->cart->total(), 0, ',', '.');?> đ</div>
        </div>               
        <div class="cart-box-tm">
          <div class="tm1">VAT (10%) </div>
          <div class="tm2"><?=number_format($this->cart->total()*0.1, 0, ',', '.');?> đ</div>
        </div>
        <div class="cart-box-tm">
          <div class="tm1">Phí vận chuyển </div>
          <div class="tm2" id="phivanchuyen">0 đ</div>
        </div>
        <div class="cart-box-tm">          
          <div class="tm3 bgcolor2">Thành tiền </div>
          <div class="tm4 bgcolor2" id="thanhtien"><?=number_format($this->cart->total()*0.1+$this->cart->total(), 0, ',', '.');?> đ</div>
          <div class="hidden" id="hidden"><?=$this->cart->total()*0.1+$this->cart->total()?></div>
        </div>        
      </div>
      
      <!-- end: Cart Summary -->            
      
    </div>
    <!-- end:sidebar --> 
  </div>
  <!-- end:row --> 
</div>
<!-- end: container-->
