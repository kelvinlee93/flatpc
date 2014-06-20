    <!-- side bar -->            
    <div class="col-md-3 col-sm-12 col-xs-12 box-block page-sidebar"> 
      <div class="box-heading"><span>Danh mục</span></div>
      <!-- Categories -->
      <div class="box-content">
        <div class="panel-group" id="blogcategories">
          <div class="panel panel-default">
            <div class="panel-heading closed" data-parent="#blogcategories" data-target="#collapseOne" data-toggle="collapse">
              <h4 class="panel-title"> <a href="#a"> <span class="fa fa-tablet"></span> Máy tính bảng </a></h4>
            </div>
            <div class="panel-collapse collapse" id="collapseOne">
              <div class="panel-body">
                <ul>
                  <li class="item"> <a href="<?=base_url('sanpham/maytinhbang/acer')?>">ACER</a></li>
                  <li class="item"> <a href="<?=base_url('sanpham/maytinhbang/asus')?>">ASUS</a></li>
                  <li class="item"> <a href="<?=base_url('sanpham/maytinhbang/dell')?>">DELL</a></li>
                  <li class="item"> <a href="<?=base_url('sanpham/maytinhbang/hp')?>">HP</a></li>
                  <li class="item"> <a href="<?=base_url('sanpham/maytinhbang/sony')?>">SONY</a></li>
                  <li class="item"> <a href="<?=base_url('sanpham/maytinhbang/toshiba')?>">TOSHIBA</a></li>
                  <li class="item"> <a href="<?=base_url('sanpham/maytinhbang/apple')?>">APPLE</a></li>
                  <li class="item"> <a href="<?=base_url('sanpham/maytinhbang/lenovo')?>">LENOVO</a></li>
                  <li class="item"> <a href="<?=base_url('sanpham/maytinhbang/samsung')?>">SAMSUNG</a></li>                  
                </ul>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading closed" data-parent="#blogcategories" data-target="#collapseTwo" data-toggle="collapse">
              <h4 class="panel-title"> <a href="#a"> <span class="fa fa-laptop"></span> Máy tính xách tay </a></h4>
            </div>
            <div class="panel-collapse collapse" id="collapseTwo">
              <div class="panel-body">
                <ul>
                  <li class="item"> <a href="<?=base_url('sanpham/maytinhxachtay/acer')?>">ACER</a></li>
                  <li class="item"> <a href="<?=base_url('sanpham/maytinhxachtay/asus')?>">ASUS</a></li>
                  <li class="item"> <a href="<?=base_url('sanpham/maytinhxachtay/dell')?>">DELL</a></li>
                  <li class="item"> <a href="<?=base_url('sanpham/maytinhxachtay/hp')?>">HP</a></li>
                  <li class="item"> <a href="<?=base_url('sanpham/maytinhxachtay/sony')?>">SONY</a></li>
                  <li class="item"> <a href="<?=base_url('sanpham/maytinhxachtay/toshiba')?>">TOSHIBA</a></li>
                  <li class="item"> <a href="<?=base_url('sanpham/maytinhxachtay/apple')?>">APPLE</a></li>
                  <li class="item"> <a href="<?=base_url('sanpham/maytinhxachtay/lenovo')?>">LENOVO</a></li>
                  <li class="item"> <a href="<?=base_url('sanpham/maytinhxachtay/samsung')?>">SAMSUNG</a></li>                  
                </ul>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading closed" data-parent="#blogcategories" data-target="#collapseThree" data-toggle="collapse">
              <h4 class="panel-title"> <a href="#a"> <span class="fa fa-desktop"></span> Máy tính để bàn </a></h4>
            </div>
            <div class="panel-collapse collapse" id="collapseThree">
              <div class="panel-body">
                <ul>
                  <li class="item"> <a href="<?=base_url('sanpham/maytinhdeban/acer')?>">ACER</a></li>
                  <li class="item"> <a href="<?=base_url('sanpham/maytinhdeban/asus')?>">ASUS</a></li>
                  <li class="item"> <a href="<?=base_url('sanpham/maytinhdeban/dell')?>">DELL</a></li>
                  <li class="item"> <a href="<?=base_url('sanpham/maytinhdeban/hp')?>">HP</a></li>
                  <li class="item"> <a href="<?=base_url('sanpham/maytinhdeban/sony')?>">SONY</a></li>
                  <li class="item"> <a href="<?=base_url('sanpham/maytinhdeban/toshiba')?>">TOSHIBA</a></li>
                  <li class="item"> <a href="<?=base_url('sanpham/maytinhdeban/apple')?>">APPLE</a></li>
                  <li class="item"> <a href="<?=base_url('sanpham/maytinhdeban/lenovo')?>">LENOVO</a></li>
                  <li class="item"> <a href="<?=base_url('sanpham/maytinhdeban/samsung')?>">SAMSUNG</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading closed" data-parent="#blogcategories" data-target="#collapseFour" data-toggle="collapse">
              <h4 class="panel-title"> <a href="<?=base_url('sanpham/phukien')?>"> <span class="fa fa-headphones"></span> Phụ kiện </a></h4>
            </div>            
          </div>
          <div class="panel panel-default">
            <div class="panel-heading closed" data-parent="#blogcategories" data-target="#collapseSix" data-toggle="collapse">
              <h4 class="panel-title"> <a href="<?=base_url('tintuc')?>"> <span class="fa fa-rss"></span> Tin tức </a></h4>
            </div>            
          </div>
          <?php if ($Login==1) { ?>
          <div class="panel panel-default">
            <div class="panel-heading closed" data-parent="#blogcategories" data-target="#collapseFive" data-toggle="collapse">
              <h4 class="panel-title"> <a href="#a"> <span class="fa fa-user"></span> Tài khoản </a></h4>
            </div>
            <div class="panel-collapse collapse" id="collapseFive">
              <div class="panel-body">
                <ul>
                  <li class="item"> <a href="<?=base_url('taikhoan/doithongtin')?>">Đổi thông tin</a></li>
                  <li class="item"> <a href="<?=base_url('taikhoan/doimatkhau')?>">Đổi mật khẩu</a></li>
                  <li class="item"> <a href="<?=base_url('taikhoan/lichsudathang')?>">Lịch sử đặt hàng</a></li>
                </ul>
              </div>
            </div>
          </div>
          <?php } ?>          
        </div>
      </div><br>
      <!-- end: Blog Categories -->
      <div class="box-heading"><span>Sản phẩm HOT</span></div>
        <div class="box-content">
          <div class="box-products slide carousel-fade" id="hotproduct">
            <ol class="carousel-indicators">
              <li class="active" data-slide-to="0" data-target="#hotproduct"></li>
              <li class="" data-slide-to="1" data-target="#hotproduct"></li>
              <li class="" data-slide-to="2" data-target="#hotproduct"></li>
            </ol>
            <div class="carousel-inner"> 
              <!-- item -->
              <div class="item active">
                <div class="product-block">
                      <div class="image"> 
                        <div class="product-label product-sale"><span>HOT</span></div>                       
                        <a class="img" href="<?=base_url()?>sanpham/chitiet?id=<?=$show_hotproduct_active[0]['ID']?>"><img src="<?=base_url()?>static/img/<?=$show_hotproduct_active[0]['TENANH']?>" title="<?=$show_hotproduct_active[0]['TENSANPHAM']?>"></a> </div>
                      <div class="product-meta">
                        <div class="name"><a href="<?=base_url()?>sanpham/chitiet?id=<?=$show_hotproduct_active[0]['ID']?>"><?=$show_hotproduct_active[0]['TENSANPHAM']?></a></div>
                        <div class="big-price"> <?=number_format($show_hotproduct_active[0]['DONGIA'], 0, ',', '.');?> đ</div>
                        <div class="big-btns"> 
                            <a class="btn btn-default btn-view pull-left" href="<?=base_url()?>sanpham/chitiet?id=<?=$show_hotproduct_active[0]['ID']?>">Chi tiết</a> 
                            <form id="productform<?=$show_hotproduct_active[0]['ID']?>" name="product-form-<?=$show_hotproduct_active[0]['ID']?>" action="<?=base_url('giohang/add')?>" method="post">                    
                              <input type="hidden" id="id" name="id" value="<?=$show_hotproduct_active[0]['ID']?>"/>
                              <input type="hidden" id="price" name="price" value="<?=$show_hotproduct_active[0]['DONGIA']?>"/>
                              <input type="hidden" id="name" name="name" value="<?=$show_hotproduct_active[0]['TENSANPHAM']?>"/>                    
                              <input type="hidden" id="img" name="img" value="<?=$show_hotproduct_active[0]['TENANH']?>"/>
                              <input type="hidden" id="type" name="type" value="<?=$show_hotproduct_active[0]['TENLOAI']?>"/>
                              <input type="hidden" id="ncc" name="ncc" value="<?=$show_hotproduct_active[0]['TENNCC']?>"/>
                              <input type="hidden" id="soluong" name="soluong" value="<?=$show_hotproduct_active[0]['SOLUONG']?>"/>                                                            
                              <a class="btn btn-default btn-addtocart pull-right" href="javascript:{}" onclick="document.getElementById('productform<?=$show_hotproduct_active[0]['ID']?>').submit();">Thêm vào giỏ</a>
                            </form>                            
                        </div>
                        <div class="small-price"> <?=number_format($show_hotproduct_active[0]['DONGIA'], 0, ',', '.');?> đ</div>
                        <div class="rating"> 
                            <?php 
                                for ($i=1; $i <=5; $i++) { 
                                    if ($i<=floor($show_hotproduct_active[0]['DIEMDANHGIA']/2))
                                        echo '<i class="fa fa-star"></i>';
                                    elseif (($i-1)==floor($show_hotproduct_active[0]['DIEMDANHGIA']/2)) {
                                        if (($show_hotproduct_active[0]['DIEMDANHGIA']/2)>floor($show_hotproduct_active[0]['DIEMDANHGIA']/2))                          
                                          echo '<i class="fa fa-star-half-o"></i>';                  
                                    }
                                    else echo '<i class="fa fa-star-o"></i>';                      
                                } 
                                if ($show_hotproduct_active[0]['DIEMDANHGIA']==0) echo '<i class="fa fa-star-o"></i>';
                            ?> 
                        </div>                        
                      </div>
                      <div class="meta-back"></div>
                    </div>
              </div>
              <!-- end: item --> 
              <!-- item -->
              <?php foreach ($show_hotproduct_deactive as $item) { ?>
              <div class="item">
                <div class="product-block">
                  <div class="image"> 
                        <div class="product-label product-sale"><span>HOT</span></div>                       
                        <a class="img" href="<?=base_url()?>sanpham/chitiet?id=<?=$item['ID']?>"><img src="<?=base_url()?>static/img/<?=$item['TENANH']?>" title="<?=$item['TENSANPHAM']?>"></a> </div>
                      <div class="product-meta">
                        <div class="name"><a href="<?=base_url()?>sanpham/chitiet?id=<?=$item['ID']?>"><?=$item['TENSANPHAM']?></a></div>
                        <div class="big-price"> <?=number_format($item['DONGIA'], 0, ',', '.');?> đ</div>
                        <div class="big-btns"> 
                            <a class="btn btn-default btn-view pull-left" href="<?=base_url()?>sanpham/chitiet?id=<?=$item['ID']?>">Chi tiết</a> 
                            <form id="productform<?=$item['ID']?>" name="product-form-<?=$item['ID']?>" action="<?=base_url('giohang/add')?>" method="post">                    
                              <input type="hidden" id="id" name="id" value="<?=$item['ID']?>"/>
                              <input type="hidden" id="price" name="price" value="<?=$item['DONGIA']?>"/>
                              <input type="hidden" id="name" name="name" value="<?=$item['TENSANPHAM']?>"/>                    
                              <input type="hidden" id="img" name="img" value="<?=$item['TENANH']?>"/>
                              <input type="hidden" id="type" name="type" value="<?=$item['TENLOAI']?>"/>
                              <input type="hidden" id="ncc" name="ncc" value="<?=$item['TENNCC']?>"/> 
                              <input type="hidden" id="soluong" name="soluong" value="<?=$item['SOLUONG']?>"/>                             
                              <a class="btn btn-default btn-addtocart pull-right" href="javascript:{}" onclick="document.getElementById('productform<?=$item['ID']?>').submit();">Thêm vào giỏ</a>
                            </form>                            
                        </div>
                        <div class="small-price"> <?=number_format($item['DONGIA'], 0, ',', '.');?> đ</div>
                        <div class="rating"> 
                            <?php 
                                for ($i=1; $i <=5; $i++) { 
                                    if ($i<=floor($item['DIEMDANHGIA']/2))
                                        echo '<i class="fa fa-star"></i>';
                                    elseif (($i-1)==floor($item['DIEMDANHGIA']/2)) {
                                        if (($item['DIEMDANHGIA']/2)>floor($item['DIEMDANHGIA']/2))                          
                                          echo '<i class="fa fa-star-half-o"></i>';                  
                                    }
                                    else echo '<i class="fa fa-star-o"></i>';                      
                                } 
                                if ($item['DIEMDANHGIA']==0) echo '<i class="fa fa-star-o"></i>';
                            ?> 
                        </div>                        
                      </div>
                      <div class="meta-back"></div>
                </div>
              </div>
              <!-- end: item --> 
              <?php } ?>
            </div>
          </div>
          <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#hotproduct"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#hotproduct"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
          <div class="nav-bg"></div>
        </div>            
    </div>

    <!-- end:sidebar --> 