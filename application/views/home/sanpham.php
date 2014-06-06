<div class="row clearfix f-space10"></div>
<div class="container"> 
  <!-- row -->
  <div class="row">
    <div class="col-md-12 box-block"> 
      
      <!--  box content -->
      
      <div class="box-content"> 
        <!-- single product -->
        <div class="single-product"> 
          <!-- Images -->
          <div class="images col-md-6 col-sm-12 col-xs-12">
            <div class="row"> 
              <!-- Small Images -->              
              <!-- end: Small Images --> 
              <!-- Big Image and Zoom -->
              <div class="big-image col-md-12 col-sm-12 col-xs-12"> <img id="product-image" src="<?=base_url()?>static/img/<?=$sanpham[0]['TENANH']?>"/> </div>
              <!-- end: Big Image and Zoom --> 
            </div>
          </div>
          
          <!-- end: Images --> 
          
          <!-- product details -->
          
          <div class="product-details col-md-6 col-sm-12 col-xs-12"> 
            
            <!-- Title and rating info -->
            <div class="title">
              <h1><?=$sanpham[0]['TENSANPHAM']?></h1>
              <div class="rating"> 
              <?php 
                  for ($i=1; $i <=5; $i++) { 
                      if ($i<=floor($danhgiasanpham[0]['DIEMDANHGIA']/2))
                          echo '<i class="fa fa-star"></i>';
                      elseif (($i-1)==floor($danhgiasanpham[0]['DIEMDANHGIA']/2)) {
                          if (($danhgiasanpham[0]['DIEMDANHGIA']/2)>floor($danhgiasanpham[0]['DIEMDANHGIA']/2))                          
                            echo '<i class="fa fa-star-half-o"></i>';                  
                      }
                      else echo '<i class="fa fa-star-o"></i>';                      
                  } 
                  if ($danhgiasanpham[0]['DIEMDANHGIA']==0) echo '<i class="fa fa-star-o"></i>';
              ?> <span>Lượt đánh giá: <?=$danhgiasanpham[0]['LUOTDANHGIA']?></span><span>Lượt xem: <?=$sanpham[0]['LUOTXEM']?></span><span>Lượt mua: <?=$sanpham[0]['LUOTMUA']?></span></div>
            </div>
            <!-- end: Title and rating info -->
            
            <div class="row"> 
              <!-- Availability, Product Code, Brand and short info -->
              <div class="short-info-wr col-md-12 col-sm-12 col-xs-12">
                <div class="short-info">
                  <div class="product-attr-text">Tình trạng sản phẩm: <span class="<?php if ($sanpham[0]['TINHTRANG']==1) echo 'a'; elseif ($sanpham[0]['TINHTRANG']==0) echo 'o'; else echo 'u';?>"><?php if ($sanpham[0]['TINHTRANG']==1) echo 'Còn Hàng'; elseif ($sanpham[0]['TINHTRANG']==0) echo 'Tạm Hết Hàng'; else echo 'Ngưng Kinh Doanh';?></span></div>                  
                  <?php if ($sanpham[0]['NHACUNGCAP']!=0) { ?>
                  <div class="product-attr-text">Hãng sản xuất: <span><?=$sanpham[0]['TENNCC']?></span></div>
                  <?php } ?>
                  <div class="product-attr-text">Loại sản phẩm: <span><?=$sanpham[0]['TENLOAI']?></span></div>
                  <?php if ($chitietsanpham[0]['BAOHANH']) { ?>
                  <div class="product-attr-text">Bảo hành: <span><?=$chitietsanpham[0]['BAOHANH']?></span></div>
                  <?php } ?>
                  <div class="product-attr-text">Khuyến mãi: <span><?php if ($chitietsanpham[0]['KHUYENMAI']) echo $chitietsanpham[0]['KHUYENMAI']; else echo 'chưa có khuyến mãi cho sản phẩm này';?></span></div>                  
                </div>
              </div>
              <!-- end: Availability, Product Code, Brand and short info --> 
              
            </div>
            
            <div class="row">
              <div class="price-wr col-md-8 col-sm-8 col-xs-12">
                <div class="big-price"> <span class="price-new"><?=number_format($sanpham[0]['DONGIA'], 0, ',', '.'); ?><span class="sym">đ</span></span> </div>
              </div>
              <div class="product-btns-wr col-md-4 col-sm-4 col-xs-12">
                <div class="product-btns">
                  <div class="product-big-btns">
                  <form action="<?=base_url('giohang/add')?>" method="post">                    
                    <input type="hidden" id="id" name="id" value="<?=$sanpham[0]['ID']?>"/>
                    <input type="hidden" id="price" name="price" value="<?=$sanpham[0]['DONGIA']?>"/>
                    <input type="hidden" id="name" name="name" value="<?=$sanpham[0]['TENSANPHAM']?>"/>                    
                    <input type="hidden" id="img" name="img" value="<?=$sanpham[0]['TENANH']?>"/>
                    <input type="hidden" id="type" name="type" value="<?=$sanpham[0]['TENLOAI']?>"/>
                    <input type="hidden" id="ncc" name="ncc" value="<?=$sanpham[0]['TENNCC']?>"/>
                    <button class="btn btn-addtocart" type="submit" <?php if ($sanpham[0]['TINHTRANG']!=1) echo 'disabled'; ?>> <i class="fa fa-shopping-cart fa-fw"></i> Thêm vào giỏ </button>                    
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- end: product details --> 
          
        </div>
        
        <!-- end: single product --> 
        
      </div>
      
      <!-- end: box content --> 
      
    </div>
  </div>
  <!-- end:row --> 
</div>
<!-- end: container-->

<div class="row clearfix f-space30"></div>

<!-- container -->
<div class="container"> 
  <!-- row -->
  <div class="row"> 
    <!-- tabs -->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-column box-block product-details-tabs"> 
      
      <!-- Details Info/Reviews/Tags --> 
      <!-- Nav tabs -->
      <ul class="nav nav-tabs blog-tabs nav-justified">
        <li class="active"><a href="#details-info" data-toggle="tab"><i class="fa  fa-th-list fa-fw"></i> Chi tiết sản phẩm</a></li>
        <li><a href="#reviews" data-toggle="tab"><i class="fa fa-comments fa-fw"></i> Đánh giá</a></li>
        <li> <a href="#tags" data-toggle="tab"><i class="fa fa-tags fa-fw"></i> Tags </a> </li>
        <li><a href="#custom-tab" data-toggle="tab"><i class="fa fa-video-camera fa-fw"></i> Custom Tab</a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane active" id="details-info">
          <p><?=$sanpham[0]['MOTA']?></p>
          <div class="table-responsive">
            <table class="table table-striped">
              <tbody>
              <?php 
                  foreach ($chitietsanpham as $item) 
                  {
                      if ($item['HEDIEUHANH'])
                      {
                          echo '<tr>';
                          echo '<td>Hệ điều hành:</td>';
                          echo '<td> '.$item['HEDIEUHANH'].'</td>';
                          echo '</tr>';
                      }
                      if ($item['MANHINH'])
                      {
                          echo '<tr>';
                          echo '<td>Màn hình:</td>';
                          echo '<td> '.$item['MANHINH'].'</td>';
                          echo '</tr>';
                      }
                      if ($item['CPU'])
                      {
                          echo '<tr>';
                          echo '<td>CPU:</td>';
                          echo '<td> '.$item['CPU'].'</td>';
                          echo '</tr>';
                      }
                      if ($item['CHIPSET'])
                      {
                          echo '<tr>';
                          echo '<td>Chipset:</td>';
                          echo '<td> '.$item['CHIPSET'].'</td>';
                          echo '</tr>';
                      }
                      if ($item['DOHOA'])
                      {
                          echo '<tr>';
                          echo '<td>Đồ họa:</td>';
                          echo '<td> '.$item['DOHOA'].'</td>';
                          echo '</tr>';
                      }
                      if ($item['RAM'])
                      {
                          echo '<tr>';
                          echo '<td>RAM:</td>';
                          echo '<td> '.$item['RAM'].'</td>';
                          echo '</tr>';
                      }
                      if ($item['ROM'])
                      {
                          echo '<tr>';
                          if ($sanpham[0]['LOAI']==2||$sanpham[0]['LOAI']==3) echo '<td>Ổ cứng:</td>'; else echo '<td>ROM:</td>';
                          echo '<td> '.$item['ROM'].'</td>';
                          echo '</tr>';
                      }
                      if ($item['CAMERA'])
                      {
                          echo '<tr>';
                          echo '<td>CAMERA:</td>';
                          echo '<td> '.$item['CAMERA'].'</td>';
                          echo '</tr>';
                      }
                      if ($item['KETNOI'])
                      {
                          echo '<tr>';
                          echo '<td>Kết nối:</td>';
                          echo '<td> '.$item['KETNOI'].'</td>';
                          echo '</tr>';
                      }
                      if ($item['DIAQUANG'])
                      {
                          echo '<tr>';
                          echo '<td>Đĩa quang:</td>';
                          echo '<td> '.$item['DIAQUANG'].'</td>';
                          echo '</tr>';
                      }
                      if ($item['PIN'])
                      {
                          echo '<tr>';
                          echo '<td>PIN:</td>';
                          echo '<td> '.$item['PIN'].'</td>';
                          echo '</tr>';
                      }
                      if ($item['TRONGLUONG'])
                      {
                          echo '<tr>';
                          echo '<td>Trọng lượng:</td>';
                          echo '<td> '.$item['TRONGLUONG'].'</td>';
                          echo '</tr>';
                      }                      
                  }
              ?>                
              </tbody>
            </table>
          </div>
        </div>
        <div class="tab-pane" id="reviews">
          <div class="heading"> <span><strong>"Ladies Stylish Handbag"</strong> has 30 review(s)</span>
            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i> <i class="fa fa-star-o"></i> </div>
            <a href="#wr" class="btn color1 normal">Add Review</a> </div>
          <div class="review">
            <div class="review-info">
              <div class="name"><i class="fa fa-comment-o fa-flip-horizontal fa-fw"></i> Fida Khattak</div>
              <div class="date"> on <em>Aug 15, 2013</em></div>
              <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i> <i class="fa fa-star-o"></i> </div>
            </div>
            <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown.</div>
          </div>
          <div class="review">
            <div class="review-info">
              <div class="name"><i class="fa fa-comment-o fa-flip-horizontal fa-fw"></i> Fida Khattak</div>
              <div class="date"> on <em>Aug 15, 2013</em></div>
              <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i> <i class="fa fa-star-o"></i> </div>
            </div>
            <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown.</div>
          </div>
          <span class="pull-left">Showing 1 to 2 of 123 (4 Pages)</span>
          <div class="pull-right">
            <ul class="pagination pagination-xs">
              <li class="disabled"><a href="#"><i class="fa fa-angle-left"></i></a></li>
              <li  class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
            </ul>
          </div>
          <div class="write-reivew" id="#write-review">
            <h3>Write a reivew</h3>
            <div class="fr-border"></div>
            
            <!-- Form -->
            <form action="#self" id="review_form" method="post">
              <div class="row">
                <div class="col-md-4 col-xs-12"> <a name="wr"> </a>
                  <fieldset class="rating">
                    <input type="radio" id="star5" name="rating" value="5" />
                    <label for="star5" title="Rocks!" class="fa fa-star">5 stars</label>
                    <input type="radio" id="star4" name="rating" value="4" />
                    <label for="star4" title="Pretty good" class="fa fa-star">4 stars</label>
                    <input type="radio" id="star3" name="rating" value="3" />
                    <label for="star3" title="Cool" class="fa fa-star">3 stars</label>
                    <input type="radio" id="star2" name="rating" value="2" />
                    <label for="star2" title="Kinda bad" class="fa fa-star">2 stars</label>
                    <input type="radio" id="star1" name="rating" value="1" />
                    <label for="star1" title="Oops!" class="fa fa-star">1 star</label>
                  </fieldset>
                  <input type="text" id="name" placeholder="Name">
                  <input type="text" id="email" placeholder="E-mail">
                </div>
                <div class="col-md-8 col-xs-12">
                  <textarea name="" id="review" placeholder="Review" rows="8"></textarea>
                </div>
              </div>
              <button class="btn normal color1 pull-right">Submit</button>
            </form>
            <!-- end: Form --> 
          </div>
        </div>
        <div class="tab-pane" id="tags">
          <div class="tags"> <a href="#a">Free</a> <a href="#a">Minimal</a> <a href="#a">Clean</a> <a href="#a">Flatro</a> <a href="#a">Metro</a> <a href="#a">Flat</a> <a href="#a">Blue</a> <a href="#a">Fashion</a> <a href="#a">Best</a> <a href="#a">Popular</a> <a href="#a">Good</a> <a href="#a">Free</a> <a href="#a">Minimal</a> <a href="#a">Clean</a> <a href="#a">Flatro</a> <a href="#a">Metro</a> <a href="#a">Flat</a> <a href="#a">Blue</a> <a href="#a">Fashion</a> <a href="#a">Best</a> <a href="#a">Popular</a> <a href="#a">Good</a> <a href="#a">Free</a> <a href="#a">Minimal</a> <a href="#a">Clean</a> <a href="#a">Flatro</a> <a href="#a">Metro</a> <a href="#a">Flat</a> <a href="#a">Blue</a> <a href="#a">Fashion</a> <a href="#a">Best</a> <a href="#a">Popular</a> <a href="#a">Good</a> <a href="#a">Free</a> <a href="#a">Minimal</a> <a href="#a">Clean</a> <a href="#a">Flatro</a> <a href="#a">Metro</a> <a href="#a">Flat</a> <a href="#a">Blue</a> <a href="#a">Fashion</a> <a href="#a">Best</a> <a href="#a">Popular</a> <a href="#a">Good</a> <a href="#a">Free</a> <a href="#a">Minimal</a> <a href="#a">Clean</a> <a href="#a">Flatro</a> <a href="#a">Metro</a> <a href="#a">Flat</a> <a href="#a">Blue</a> <a href="#a">Fashion</a> <a href="#a">Best</a> <a href="#a">Popular</a> <a href="#a">Good</a> </div>
        </div>
        <div class="tab-pane" id="custom-tab">
          <p>Phosfluorescently productize technically sound process improvements for customized bandwidth. Competently coordinate leveraged catalysts for change without multimedia based services. Objectively fabricate user-centric experiences before.</p>
          <div class="video-wrapper">
            <div class="video-container">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/keDneypw3HY" frameborder="0" allowfullscreen></iframe>
            </div>
            <!-- /video --> 
          </div>
          <!-- /video-wrapper --> 
        </div>
      </div>
      <!-- end: Tab panes --> 
      <!-- end: Details Info/Reviews/Tags -->
      <div class="clearfix f-space30"></div>
    </div>
    <!-- end: tabs --> 
      
    
  </div>
  <!-- row --> 
</div>
<!-- end: container --> 