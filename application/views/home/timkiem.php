<div class="row clearfix f-space10"></div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="page-title">
        <h2>Tìm kiếm</h2>
      </div>
    </div>
  </div>
</div>

<div class="row clearfix f-space10"></div>

<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 box-block">
      <div class="box-heading category-heading">
        <ul>        
        <li class="col-md-2 dropdown" data-select="true">  <span class="dropdown-display"><?php if($timkiem_info['loaisanpham']==1) echo 'Máy tính bảng'; elseif($timkiem_info['loaisanpham']==2) echo 'Máy tính xách tay'; elseif($timkiem_info['loaisanpham']==3) echo 'Máy tính để bàn'; elseif($timkiem_info['loaisanpham']==0) echo 'Phụ kiện'; else echo 'Loại sản phẩm';?> <i class="fa fa-sort fa-fw"></i> </span> 
        <!-- this hidden field is used to contain the selected option from the dropdown -->
        <input form="timkiem" id="loaisanpham" name="loaisanpham" class="dropdown-field" type="hidden" value="<?=$timkiem_info['loaisanpham']?>"/>
        <ul class="dropdown-menu" role="menu">
          <li><a href="#a" data-value="1">Máy tính bảng</a></li>
          <li><a href="#a" data-value="2">Máy tính xách tay</a></li>
          <li><a href="#a" data-value="3">Máy tính để bàn</a></li>
          <li><a href="#a" data-value="0">Phụ kiện</a></li>                  
          <li><a href="#a" data-value="all">Tất cả</a></li>
        </ul>
      </li>
      <li class="col-md-2 dropdown" data-select="true"> <span class="dropdown-display"><?php if($timkiem_info['ncc']==1) echo 'ACER'; elseif ($timkiem_info['ncc']==2) echo 'ASUS'; elseif($timkiem_info['ncc']==3) echo 'DELL'; elseif($timkiem_info['ncc']==4) echo 'HP'; elseif($timkiem_info['ncc']==5) echo 'SONY'; elseif($timkiem_info['ncc']==6) echo 'TOSHIBA'; elseif($timkiem_info['ncc']==7) echo 'APPLE'; elseif($timkiem_info['ncc']==8) echo 'LENOVO'; elseif ($timkiem_info['ncc']==9) echo 'SAMSUNG'; else echo 'Hãng';?> <i class="fa fa-sort fa-fw"></i></span>
        <!-- this hidden field is used to contain the selected option from the dropdown -->
        <input form="timkiem" id="ncc" name="ncc" class="dropdown-field" type="hidden" value="<?=$timkiem_info['ncc']?>"/>
        <ul class="dropdown-menu" role="menu">
          <li><a href="#a" data-value="1">ACER</a></li>
          <li><a href="#a" data-value="2">ASUS</a></li>
          <li><a href="#a" data-value="3">DELL</a></li>
          <li><a href="#a" data-value="4">HP</a></li> 
          <li><a href="#a" data-value="5">SONY</a></li>
          <li><a href="#a" data-value="6">TOSHIBA</a></li>
          <li><a href="#a" data-value="7">APPLE</a></li>
          <li><a href="#a" data-value="8">LENOVO</a></li>                  
          <li><a href="#a" data-value="9">SAMSUNG</a></li>
          <li><a href="#a" data-value="all">Tất cả</a></li>
        </ul>        
        <li class="col-md-2 dropdown" data-select="true"> <span class="dropdown-display"><?php if ($timkiem_info['hienthi']==4) echo '4 sản phẩm'; elseif ($timkiem_info['hienthi']==8) echo '8 sản phẩm'; elseif ($timkiem_info['hienthi']==12) echo '12 sản phẩm'; elseif ($timkiem_info['hienthi']==16) echo '16 sản phẩm'; elseif ($timkiem_info['hienthi']==20) echo '20 sản phẩm'; else echo 'Hiển thị'; ?> <i class="fa fa-sort fa-fw"></i></span>
        <!-- this hidden field is used to contain the selected option from the dropdown -->
        <input form="timkiem" id="hienthi" name="hienthi" class="dropdown-field" type="hidden" value="<?=$timkiem_info['hienthi']?>"/>
        <ul class="dropdown-menu" role="menu">
          <li><a href="#a" data-value="4">4 sản phẩm</a></li>
          <li><a href="#a" data-value="8">8 sản phẩm</a></li>
          <li><a href="#a" data-value="12">12 sản phẩm</a></li>
          <li><a href="#a" data-value="16">16 sản phẩm</a></li>
          <li><a href="#a" data-value="20">20 sản phẩm</a></li>                            
          <li><a href="#a" data-value="all">Tất cả</a></li>
        </ul>
        <li class="col-md-2 dropdown" data-select="true"> <span class="dropdown-display"><?php if ($timkiem_info['sapxep']=='giatang') echo 'Giá tăng'; elseif ($timkiem_info['sapxep']=='giagiam') echo 'Giá giảm'; elseif ($timkiem_info['sapxep']=='tenaz') echo 'Tên (A-Z)'; elseif ($timkiem_info['sapxep']=='tenza') echo 'Tên (Z-A)'; elseif ($timkiem_info['sapxep']=='luotxem') echo 'Lượt xem'; elseif ($timkiem_info['sapxep']=='luotmua') echo 'Lượt mua'; elseif ($timkiem_info['sapxep']=='danhgia') echo 'Điểm đánh giá'; elseif ($timkiem_info['sapxep']=='moinhat') echo 'Mới nhất'; elseif ($timkiem_info['sapxep']=='cunhat') echo 'Cũ nhất'; else echo 'Sắp xếp';?> <i class="fa fa-sort fa-fw"></i></span>
        <!-- this hidden field is used to contain the selected option from the dropdown -->
        <input form="timkiem" id="sapxep" name="sapxep" class="dropdown-field" type="hidden" value="<?=$timkiem_info['sapxep']?>"/>
        <ul class="dropdown-menu" role="menu">
          <li><a href="#a" data-value="giatang">Giá tăng</a></li>
          <li><a href="#a" data-value="giagiam">Giá giảm</a></li>
          <li><a href="#a" data-value="tenaz">Tên (A-Z)</a></li>
          <li><a href="#a" data-value="tenza">Tên (Z-A)</a></li> 
          <li><a href="#a" data-value="luotxem">Lượt xem</a></li>
          <li><a href="#a" data-value="luotmua">Lượt mua</a></li>          
          <li><a href="#a" data-value="danhgia">Điểm đánh giá</a></li>
          <li><a href="#a" data-value="moinhat">Mới nhất</a></li>
          <li><a href="#a" data-value="cunhat">Cũ nhất</a></li>          
          <li><a href="#a" data-value="all">Tất cả</a></li>
        </ul>
        <li class="col-md-3 dropdown" data-select="true"> <span class="dropdown-display"><?php if ($timkiem_info['gia']==3) echo 'Dưới 3 triệu'; elseif ($timkiem_info['gia']==35) echo 'Từ 3 đến dưới 5 triệu'; elseif ($timkiem_info['gia']==510) echo 'Từ 5 đến dưới 10 triệu'; else if ($timkiem_info['gia']==1020) echo 'Từ 10 đến dưới 20 triệu'; elseif ($timkiem_info['gia']==20) echo 'Trên 20 triệu'; else echo 'Giá thành'; ?> <i class="fa fa-sort fa-fw"></i></span>
        <!-- this hidden field is used to contain the selected option from the dropdown -->
        <input form="timkiem" id="gia" name="gia" class="dropdown-field" type="hidden" value="<?=$timkiem_info['gia']?>"/>
        <ul class="dropdown-menu" role="menu">
          <li><a href="#a" data-value="3">Dưới 3 triệu</a></li>
          <li><a href="#a" data-value="35">Từ 3 đến dưới 5 triệu</a></li>
          <li><a href="#a" data-value="510">Từ 5 đến dưới 10 triệu</a></li>
          <li><a href="#a" data-value="1020">Từ 10 đến dưới 20 triệu</a></li> 
          <li><a href="#a" data-value="20">Trên 20 triệu</a></li>          
          <li><a href="#a" data-value="all">Tất cả</a></li>
        </ul>        
      </li>

    </ul>
    </div>
  </div>
  <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12"></div>
  <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12">
        <div class="searchbar">
          <form action="<?=base_url()?>timkiem" id="timkiem">
            <ul class="pull-left">
              <li class="input-prepend dropdown" data-select="true"> <a class="add-on dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="#a"> <span class="dropdown-display">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nhập từ khóa</span> <i class="fa fa-long-arrow-right fa-fw"></i> </a> 
            </ul>
            <div class="searchbox">
              <input class="searchinput" id="keyword" name="keyword" form="timkiem" placeholder="Từ khóa..." type="search" value="<?=$timkiem_info['keyword']?>">
              <button class="fa fa-search fa-fw" type="submit"></button>
            </div>            
            <?php if (!$timkiem_getsp) { ?>
            <center><div style="color: red">Không tìm thấy sản phẩm phù hợp. Hãy bắt đầu lại bằng một từ khóa khác...</div></center>
            <?php } ?>
          </form>
        </div>        
      </div>    
  </div>
</div>



<?php if ($_SERVER["REQUEST_URI"]!='/timkiem') { if ($timkiem_getsp) { ?>
<?php $d=0; foreach ($timkiem_getsp as $item) { $d++; ?>
      <?php if ($d==1) { ?>
  <div class="row clearfix f-space30"></div>
  <div class="container">
    <div class="row">
      <div class="box-content">
        <div class="box-products">
          <!-- Products Row -->
          <div class="row box-product">
          <?php } ?> 
            <!-- Product -->
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
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
                                        else echo '<i class="fa fa-star-o"></i>';                   
                                    }
                                    else echo '<i class="fa fa-star-o"></i>';                      
                                }                                
                            ?> 
                        </div>                        
                      </div>
                      <div class="meta-back"></div>
              </div>
            </div>
            <!-- end: Product -->
          <?php if ($d==4) { $d=0; echo '</div></div></div><!-- end: Products Row -->'; } ?>                                                         
          <?php } if ($d!=0) echo '</div></div></div>'; ?>
          <?php if ($timkiem_tongsp[0]['SOLUONG']>$timkiem_info['hienthi']) { ?>
          <center>
          <ul class="pagination pagination-lg">
          <li><a href="http://flatpc.com<?=$_SERVER["REQUEST_URI"]?>&page=1"><i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i></a></li>
          <li <?php if ($page-1==0) echo 'class="disabled"'; ?>><a href="http://flatpc.com<?=$_SERVER["REQUEST_URI"]?>&page=<?=$page-1?>"><i class="fa fa-angle-left"></i></a></li>
          <?php for($i=1; $i<=(ceil($timkiem_tongsp[0]['SOLUONG']/$timkiem_info['hienthi'])); $i++) { ?>
          <li <?php if ($page==$i) echo 'class="active"'; ?>><a href="http://flatpc.com<?=$_SERVER["REQUEST_URI"]?>&page=<?=$i?>"><?=$i?></a></li>          
          <?php } ?>
          <li <?php if ($page+1>(ceil($timkiem_tongsp[0]['SOLUONG']/$timkiem_info['hienthi']))) echo 'class="disabled"'; ?>><a href="http://flatpc.com<?=$_SERVER["REQUEST_URI"]?>&page=<?=$page+1?>"><i class="fa fa-angle-right"></i></a></li>
          <li><a href="http://flatpc.com<?=$_SERVER["REQUEST_URI"]?>&page=<?=ceil($timkiem_tongsp[0]['SOLUONG']/$timkiem_info['hienthi'])?>"><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></a></li>
          </ul>
          </center> 
          <?php } ?>
</div></div>          
<?php } } ?>

<div class="row clearfix f-space30"></div>
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