<div class="row clearfix f-space10"></div>
<!-- Shop Page title -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="shop-page-title dark">
        <h2><?=$tenloai?></h2>        
        <ul class="pull-left">
        <?php $i=0; foreach ($soluong as $item) { $i++; ?>
          <li><a href="<?=base_url()?>sanpham/maytinhbang/<?=strtolower($item['TENNCC'])?>"><?=$item['TENNCC']?> (<?=$item['SOLUONG']?>)</a></li>          
        <?php if ($i==3) { echo '</ul><ul class="pull-left">'; $i=0; } } ?>            
        </ul>        
      </div>
    </div>
  </div>
</div>
<!-- end: Shop Page title -->
<div class="row clearfix f-space10"></div>
<div class="container"> 
  <!-- row -->
  <div class="row">
    <div class="col-md-9 col-sm-12 col-xs-12 box-block">
      <div class="box-heading category-heading"><span>Hiển thị từ <?=($maytinhbang_page-1)*$maytinhbang_perpage+1?> đến <?=(($maytinhbang_perpage*($maytinhbang_page-1))+count($get_sanpham_loai))?> trong tổng số <?=$tongsploai[0]['SOLUONG']?> sản phẩm</span>
        <ul class="nav nav-pills pull-right">
          <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" href="#a"> <?php if ($maytinhbang_perpage!='all') echo $maytinhbang_perpage.' sản phẩm'; else echo 'Hiển thị tất cả';?> <i class="fa fa-sort fa-fw"></i> </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="<?=base_url()?>sanpham/maytinhbang?perpage=6">6 sản phẩm</a></li>
              <li><a href="<?=base_url()?>sanpham/maytinhbang?perpage=9">9 sản phẩm</a></li>
              <li><a href="<?=base_url()?>sanpham/maytinhbang?perpage=12">12 sản phẩm</a></li>              
              <li><a href="<?=base_url()?>sanpham/maytinhbang?perpage=all">Hiển thị tất cả</a></li>
            </ul>
          </li>
          <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" href="#a"> <?php if ($maytinhbang_sortby=='nameaz') echo 'Tên sản phẩm (A-Z)'; elseif ($maytinhbang_sortby=='nameza') echo 'Tên sản phẩm (Z-A)'; elseif ($maytinhbang_sortby=='pricelh') echo 'Giá thấp đến cao'; elseif ($maytinhbang_sortby=='pricehl') echo 'Giá cao đến thấp'; elseif ($maytinhbang_sortby=='view') echo 'Được xem nhiều'; else echo 'Sắp xếp theo';?> <i class="fa fa-sort fa-fw"></i> </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="<?=base_url()?>sanpham/maytinhbang?sortby=nameaz">Tên sản phẩm (A-Z)</a></li>
              <li><a href="<?=base_url()?>sanpham/maytinhbang?sortby=nameza">Tên sản phẩm (Z-A)</a></li>
              <li><a href="<?=base_url()?>sanpham/maytinhbang?sortby=pricelh">Giá thấp đến cao</a></li>
              <li><a href="<?=base_url()?>sanpham/maytinhbang?sortby=pricehl">Giá cao đến thấp</a></li>
              <li><a href="<?=base_url()?>sanpham/maytinhbang?sortby=view">Xem nhiều</a></li>
              <li><a href="<?=base_url()?>sanpham/maytinhbang?sortby=time">Mặc định</a></li>                           
            </ul>
          </li>
          <li class="view-list"> <a href="<?=base_url()?>sanpham/maytinhbang?viewby=list"> <i class="fa fa-list-ul fa-fw"></i></a> </li>
          <li class="view-grid active"> <a href="<?=base_url()?>sanpham/maytinhbang?viewby=grid"> <i class="fa fa-th-large fa-fw"></i></a> </li>
        </ul>
      </div>       
      <?php $d=0; foreach ($get_sanpham_loai as $item) { $d++; ?>
      <?php if ($d==1) { ?>
      <div class="row clearfix f-space30"></div>
      <div class="box-content">
        <div class="box-products">
          <!-- Products Row -->
          <div class="row box-product">
          <?php } ?> 
            <!-- Product -->
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
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
          <?php if ($d==3) { $d=0; echo '</div></div></div><!-- end: Products Row -->'; } ?>                                                         
          <?php } if ($d!=0) echo '</div></div></div>'; ?>                                              
        
      <div class="clearfix f-space30"></div>
      <span class="pull-left">Hiển thị từ <?=($maytinhbang_page-1)*$maytinhbang_perpage+1?> đến <?=(($maytinhbang_perpage*($maytinhbang_page-1))+count($get_sanpham_loai))?> trong tổng số <?=$tongsploai[0]['SOLUONG']?> sản phẩm</span>
      <div class="pull-right">
        <ul class="pagination pagination-lg">
          <li <?php if ($maytinhbang_previous==0) echo 'class="disabled"'; ?>><a href="<?=base_url()?>sanpham/maytinhbang?page=<?=$maytinhbang_previous?>"><i class="fa fa-angle-left"></i></a></li>
          <?php for($i=1; $i<=(ceil($tongsploai[0]['SOLUONG']/$maytinhbang_perpage)); $i++) { ?>
          <li <?php if ($maytinhbang_page==$i) echo 'class="active"'; ?>><a href="<?=base_url()?>sanpham/maytinhbang?page=<?=$i?>"><?=$i?></a></li>          
          <?php } ?>
          <li <?php if ($maytinhbang_next>(ceil($tongsploai[0]['SOLUONG']/$maytinhbang_perpage))) echo 'class="disabled"'; ?>><a href="<?=base_url()?>sanpham/maytinhbang?page=<?=$maytinhbang_next?>"><i class="fa fa-angle-right"></i></a></li>
        </ul>
      </div>
    </div>
    
    <!-- side bar -->
    <div class="col-md-3 col-sm-12 col-xs-12 box-block page-sidebar">                  
      <div class="box-heading"><span>Categories</span></div>
      <!-- Categories -->
      <div class="box-content">
        <div class="panel-group" id="blogcategories">
          <div class="panel panel-default">
            <div class="panel-heading closed" data-parent="#blogcategories" data-target="#collapseOne" data-toggle="collapse">
              <h4 class="panel-title"> <a href="#a"> <span class="fa fa-plus"></span> Men Wear </a><span class="categorycount">14</span> </h4>
            </div>
            <div class="panel-collapse collapse" id="collapseOne">
              <div class="panel-body">
                <ul>
                  <li class="item"> <a href="#a">Jeans</a></li>
                  <li class="item"> <a href="#a">Shirts</a></li>
                  <li class="item"> <a href="#a">Shoes</a></li>
                  <li class="item"> <a href="#a">Sports Wear</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading opened" data-parent="#blogcategories" data-target="#collapseTwo" data-toggle="collapse">
              <h4 class="panel-title"> <a href="#a"> <span class="fa fa-minus"></span> Women Wear </a> <span class="categorycount">10</span></h4>
            </div>
            <div class="panel-collapse collapse in" id="collapseTwo">
              <div class="panel-body">
                <ul>
                  <li class="item"> <a href="#a">Jeans</a></li>
                  <li class="item"> <a href="#a">Shirts</a></li>
                  <li class="item"> <a href="#a">Shoes</a></li>
                  <li class="item"> <a href="#a">Sports Wear</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading closed" data-parent="#blogcategories" data-target="#collapseThree" data-toggle="collapse">
              <h4 class="panel-title"> <a href="#a"> <span class="fa fa-plus"></span> Fragrance </a> <span class="categorycount">23</span></h4>
            </div>
            <div class="panel-collapse collapse" id="collapseThree">
              <div class="panel-body">
                <ul>
                  <li class="item"> <a href="#a">Jeans</a></li>
                  <li class="item"> <a href="#a">Shirts</a></li>
                  <li class="item"> <a href="#a">Shoes</a></li>
                  <li class="item"> <a href="#a">Sports Wear</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading closed" data-parent="#blogcategories" data-target="#collapseFour" data-toggle="collapse">
              <h4 class="panel-title"> <a href="#a"> <span class="fa fa-plus"></span> Music </a><span class="categorycount">06</span> </h4>
            </div>
            <div class="panel-collapse collapse" id="collapseFour">
              <div class="panel-body">
                <ul>
                  <li class="item"> <a href="#a">Jeans</a></li>
                  <li class="item"> <a href="#a">Shirts</a></li>
                  <li class="item"> <a href="#a">Shoes</a></li>
                  <li class="item"> <a href="#a">Sports Wear</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading closed" data-parent="#blogcategories" data-target="#collapseFive" data-toggle="collapse">
              <h4 class="panel-title"> <a href="#a"> <span class="fa fa-plus"></span> Games </a><span class="categorycount">80</span> </h4>
            </div>
            <div class="panel-collapse collapse" id="collapseFive">
              <div class="panel-body">
                <ul>
                  <li class="item"> <a href="#a">Jeans</a></li>
                  <li class="item"> <a href="#a">Shirts</a></li>
                  <li class="item"> <a href="#a">Shoes</a></li>
                  <li class="item"> <a href="#a">Sports Wear</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end: Blog Categories -->
      
      <div class="clearfix f-space30"></div>
      <div class="box-heading"><span>Compare</span></div>
      <!-- Compare -->
      <div class="box-content">
        <div class="compare"> <span><a href="product.html">Ladies Stylish Handbag</a> <a href="#" class="pull-right"><i class="fa fa-times fa-fw"></i></a> </span> <span><a href="product.html">Female Strips Handbag</a> <a href="#" class="pull-right"><i class="fa fa-times fa-fw"></i></a> </span> <span><a href="product.html">Blue Fashion Bag</a> <a href="#" class="pull-right"><i class="fa fa-times fa-fw"></i></a> </span>
          <button class="btn color1 normal pull-right" type="submit">Compare</button>
        </div>
        
        <!-- Compare --> 
      </div>      
      
    </div>
    <!-- end:sidebar --> 
  </div>
  <!-- end:row --> 
</div>
<!-- end: container-->