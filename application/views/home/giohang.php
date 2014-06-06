<div class="row clearfix f-space10"></div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="page-title">
        <h2>Giỏ hàng (<?=count($this->cart->contents());?> sản phẩm)</h2>
      </div>
    </div>
  </div>
</div>
<div class="row clearfix f-space10"></div>
<?php foreach ($this->cart->contents() as $item) 
{ if ($item['qty']!=0) { ?>
<form action="<?=base_url('giohang/update')?>" method="post">
  <!-- product -->
  <div class="container">
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
              <div class="att"> <span>Nhà cung cấp:</span> <?=$item['ncc']?></div>
              <div class="att"> <span>Loại:</span> <?=$item['type']?></div>
            </div>
          </div>
        </div>
        <div class="col-md-2 hidden-sm hidden-xs p-wr">
          <div class="product-attrb-wr">
            <div class="product-attrb">
              <div class="qtyinput">
                <div class="quantity-inp">
                  <input type="text" class="quantity-input" id="p_quantity" name="p_quantity" value="<?=$item['qty']?>">
                  <div class="quantity-txt minusbtn"><a href="#a" class="qty qtyminus" ><i class="fa fa-minus fa-fw"></i></a></div>
                  <div class="quantity-txt plusbtn"><a href="#a" class="qty qtyplus" ><i class="fa fa-plus fa-fw"></i></a></div>
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
              <button class="color2" style="border: none; padding: 0; background: none;" data-toggle="tooltip" data-original-title="Cập nhật" name="update" type="submit" value="1"><i class="fa fa-refresh fa-fw color2"></i></button>
              <button class="color2" style="border: none; padding: 0; background: none;" data-toggle="tooltip" data-original-title="Xóa" name="delete" type="submit" value="1"><i class="fa fa-trash-o fa-fw color2"></i></button>              
            </div>
          </div>
        </div>
      </div>
    </div>    
  </div>
  <!-- end: product -->
  <div class="row clearfix f-space30"></div>  
  </form>
<?php } } ?>
<div class="row clearfix f-space30"></div>
<div class="container">
  <div class="row"> 
    <!-- 	Estimate Shipping & Taxes -->
    <div class="col-md-4  col-sm-4 col-xs-12 cart-box-wr">
      <div class="box-heading"><span>Estimate Shipping & Taxes</span></div>
      <div class="clearfix f-space10"></div>
      <div class="box-content cart-box">
        <p>Enter your destination to get a shipping estimate.</p>
        <form>
          <input type="text" value="" placeholder="Country" class="input4" />
          <input type="text" value="" placeholder="Region/State" class="input4" />
          <button class="btn large color2 pull-right">Submit</button>
        </form>
      </div>
      <div class="clearfix f-space30"></div>
    </div>
    
    <!-- end: Estimate Shipping & Taxes --> 
    
    <!-- 	Discount Codes -->
    
    <div class="col-md-4  col-sm-4 col-xs-12 cart-box-wr">
      <div class="box-heading"><span>Discount Codes</span></div>
      <div class="clearfix f-space10"></div>
      <div class="box-content cart-box">
        <p>Enter your coupon code if you have one.</p>
        <form>
          <input type="text" value="" placeholder="Country" class="input4" />
          <input type="text" value="" placeholder="Region/State" class="input4" />
          <button class="btn large color2 pull-right">Submit</button>
        </form>
      </div>
      <div class="clearfix f-space30"></div>
    </div>
    
    <!-- end: Discount Codes --> 
    
    <!-- 	Total amount -->
    
    <div class="col-md-4 col-sm-4 col-xs-12 cart-box-wr">
      <div class="box-content">
        <div class="cart-box-tm">
          <div class="tm1">Sub-Total</div>
          <div class="tm2">$2167.25</div>
        </div>
        <div class="clearfix f-space10"></div>
        <div class="cart-box-tm">
          <div class="tm1">Eco Tax (-2.00) </div>
          <div class="tm2">$23.60</div>
        </div>
        <div class="clearfix f-space10"></div>
        <div class="cart-box-tm">
          <div class="tm1">VAT (18.2%) </div>
          <div class="tm2">$54.00</div>
        </div>
        <div class="clearfix f-space10"></div>
        <div class="cart-box-tm">
          <div class="tm3 bgcolor2">Total </div>
          <div class="tm4 bgcolor2">$7854.34</div>
        </div>
        <div class="clearfix f-space10"></div>
        <button class="btn large color1 pull-left" type="submit">Cập nhật</button>
        <button class="btn large color1 pull-right">Đặt hàng</button>
        <div class="clearfix f-space30"></div>
      </div>
    </div>
    
    <!-- end: Total amount --> 
    
  </div>
</div>