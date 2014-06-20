  <!-- Products -->  
  <div class="row clearfix f-space10"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 main-column box-block">
        <div class="box-heading"><span>Sản phẩm nổi bật</span></div>
        <div class="box-content">
          <div class="box-products slide" id="newproduct">
            <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#newproduct"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#newproduct"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
            <div class="carousel-inner"> 
              <!-- Items Row -->
              <div class="item active">
                <div class="row box-product">
                <?php foreach ($show_featureproduct_active as $item) { ?> 
                  <!-- Product -->
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="product-block">
                      <div class="image"> 
                        <div class="product-label product-sale"><span>ĐƯỢC MUA NHIỀU</span></div>                       
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
                  <!-- end: Product --> 
                <?php } ?>                                                 
                </div>
              </div>
              <!-- end: Items Row --> 
              <!-- Items Row -->
              <div class="item">
                <div class="row box-product"> 
                <?php foreach ($show_featureproduct_deactive as $item) { ?> 
                  <!-- Product -->
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="product-block">
                      <div class="image"> 
                        <div class="product-label product-sale"><span>ĐƯỢC MUA NHIỀU</span></div>                       
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
                  <!-- end: Product --> 
                <?php } ?>
                </div>
              </div>
              <!-- end: Items Row --> 
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 box-block sidebar">
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
    </div>
  </div> 
  <div class="row clearfix f-space30"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-column box-block">
        <a href="<?=base_url('sanpham/maytinhbang')?>"><div class="box-heading"><span>MÁY TÍNH BẢNG</span></div></a>
        <div class="box-content">
          <div class="box-products slide" id="tablet">
            <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#tablet"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#tablet"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
            <div class="carousel-inner"> 
              <!-- Items Row -->              
              <div class="item active">
                <div class="row box-product">                             
              <?php foreach ($show_tablet_active as $item) { ?> 
                  <!-- Product -->
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="product-block">
                      <div class="image">
                        <div class="product-label product-sale"><span>MỚI</span></div>                        
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
                  <!-- end: Product --> 
              <?php } ?>
                </div>
              </div>
              <!-- end: Items Row --> 
              <!-- Items Row -->
              <div class="item">
                <div class="row box-product"> 
              <?php foreach ($show_tablet_deactive as $item) { ?> 
                  <!-- Product -->
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="product-block">
                      <div class="image">                        
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
                  <!-- end: Product --> 
              <?php } ?>
                </div>
              </div>
              <!-- end: Items Row --> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>  
  </div>
  <div class="row clearfix f-space30"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-column box-block">
        <a href="<?=base_url('sanpham/xachtay')?>"><div class="box-heading"><span>MÁY XÁCH TAY</span></div></a>
        <div class="box-content">
          <div class="box-products slide" id="laptop">
            <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#laptop"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#laptop"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
            <div class="carousel-inner"> 
              <!-- Items Row -->              
              <div class="item active">
                <div class="row box-product">                             
              <?php foreach ($show_laptop_active as $item) { ?> 
                  <!-- Product -->
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="product-block">
                      <div class="image">
                        <div class="product-label product-sale"><span>MỚI</span></div>                        
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
                  <!-- end: Product --> 
              <?php } ?>
                </div>
              </div>
              <!-- end: Items Row --> 
              <!-- Items Row -->
              <div class="item">
                <div class="row box-product"> 
              <?php foreach ($show_laptop_deactive as $item) { ?> 
                  <!-- Product -->
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="product-block">
                      <div class="image">                        
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
                  <!-- end: Product --> 
              <?php } ?>
                </div>
              </div>
              <!-- end: Items Row --> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row clearfix f-space30"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-column box-block">
        <a href="<?=base_url('sanpham/maytinhdeban')?>"><div class="box-heading"><span>MÁY TÍNH ĐỂ BÀN</span></div></a>
        <div class="box-content">
          <div class="box-products slide" id="desktop">
            <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#desktop"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#desktop"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
            <div class="carousel-inner"> 
              <!-- Items Row -->              
              <div class="item active">
                <div class="row box-product">                             
              <?php foreach ($show_desktop_active as $item) { ?> 
                  <!-- Product -->
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="product-block">
                      <div class="image">      
                        <div class="product-label product-sale"><span>MỚI</span></div>                  
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
                  <!-- end: Product --> 
              <?php } ?>
                </div>
              </div>
              <!-- end: Items Row --> 
              <!-- Items Row -->
              <div class="item">
                <div class="row box-product"> 
              <?php foreach ($show_desktop_deactive as $item) { ?> 
                  <!-- Product -->
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="product-block">
                      <div class="image">                        
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
                  <!-- end: Product --> 
              <?php } ?>
                </div>
              </div>
              <!-- end: Items Row --> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>  
  <!-- end: Products -->     
