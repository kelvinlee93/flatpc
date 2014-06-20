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
                          else echo '<i class="fa fa-star-o"></i>';                   
                      }
                      else echo '<i class="fa fa-star-o"></i>';                      
                  }                   
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
                    <input type="hidden" id="soluong" name="soluong" value="<?=$sanpham[0]['SOLUONG']?>"/>
                    <button class="btn btn-addtocart <?php if ($sanpham[0]['TINHTRANG']!=1) echo 'disabled'; ?>" type="submit"> <i class="fa fa-shopping-cart fa-fw"></i> Thêm vào giỏ </button>                    
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
        <li><a href="#reviews" data-toggle="tab"><i class="fa fa-thumbs-up fa-fw"></i> Đánh giá (<?=$danhgiasanpham[0]['LUOTDANHGIA']?>)</a></li>
        <li> <a href="#comment" data-toggle="tab"><i class="fa fa-comments fa-fw"></i> Bình luận (<?=$tongbinhluan[0]['SOLUONG']?>)</a> </li>        
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
          <?php if ($danhgiasanpham[0]['LUOTDANHGIA']==0) { ?>
              <center><strong>Chưa có đánh giá cho sản phẩm này.</strong></center></br></br>
          <?php } else { if (!$chitietdanhgia) echo '<center><strong>Không có đánh giá.</strong></center></br></br>'; foreach ($chitietdanhgia as $item) { ?>  
          <div class="review">
            <div class="review-info">
              <div class="name"><i class="fa fa-comment-o fa-flip-horizontal fa-fw"></i> <?=$item['HODEM'].' '.$item['TENNGUOIDUNG']?></div>
              <div class="date"><em><?=date('d-m-Y H:i',strtotime($item['THOIGIAN']))?></em></div>
              <div class="rating">  
              <?php for($i=1; $i<=5; $i++) if ($i<=$item["DIEM"]/2) echo '<i class="fa fa-star"></i> '; else echo '<i class="fa fa-star-o"></i> '; ?>
              </div>
            </div>            
            <div class="text"><?=$item['NOIDUNG']?></div>
          </div>  
          <?php } ?>                  
          <div class="pull-right">
            <ul class="pagination pagination-xs">
              <li><a href="<?=base_url()?>sanpham/chitiet?id=<?=$chitietsanpham[0]['MASANPHAM']?>&page=1"><i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i></a></li>              
              <li class="<?php if(($page-1)<1) echo 'disabled';?>"><a href="<?=base_url()?>sanpham/chitiet?id=<?=$chitietsanpham[0]['MASANPHAM']?>&page=<?=$page-1?>"><i class="fa fa-angle-left"></i></a></li>              
              <?php for($i=1; $i<=ceil($tongdanhgia[0]['SOLUONG']/5); $i++) { ?>
              <li <?php if ($i==$page) echo 'class="active"'; ?>><a href="<?=base_url()?>sanpham/chitiet?id=<?=$chitietsanpham[0]['MASANPHAM']?>&page=<?=$i?>"><?=$i?></a></li>          
              <?php } ?>
              <li class="<?php if(($page+1)>(ceil($tongdanhgia[0]['SOLUONG']/5))) echo 'disabled';?>"><a href="<?=base_url()?>sanpham/chitiet?id=<?=$chitietsanpham[0]['MASANPHAM']?>&page=<?=$page+1?>"><i class="fa fa-angle-right"></i></a></li>
              <li><a href="<?=base_url()?>sanpham/chitiet?id=<?=$chitietsanpham[0]['MASANPHAM']?>&page=<?=ceil($tongdanhgia[0]['SOLUONG']/5)?>"><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></a></li>
            </ul>
          </div>
          <?php } ?>
          <?php if ($Login!=1) { ?>
          <center>
          <div class="col-md-4 col-xs-12">
          </div>
          <div class="col-lg-4 col-md-12">
            <div class="box-content login-box">
              <h4>Đăng nhập để đánh giá sản phẩm này!</h4>
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
          </center>
          <?php } ?>
          <div class="write-reivew" id="#write-review">
          <?php if (!$ktdanhgia) { ?>
            <h3>Viết đánh giá</h3>
            <div class="fr-border"></div>            
            <!-- Form -->
            <form action="" id="review_form" method="post">
              <div class="row">
                <div class="col-md-4 col-xs-12"> 
                  <fieldset class="rating">
                    <input type="radio" id="star5" name="rating" value="5" form="review_form" />
                    <label for="star5" title="Rất tốt" class="fa fa-star">Rất tốt</label>
                    <input type="radio" id="star4" name="rating" value="4" form="review_form" />
                    <label for="star4" title="Tốt" class="fa fa-star">Tốt</label>
                    <input type="radio" id="star3" name="rating" value="3" form="review_form"/>
                    <label for="star3" title="Bình thường" class="fa fa-star">Bình thường</label>
                    <input type="radio" id="star2" name="rating" value="2" form="review_form"/>
                    <label for="star2" title="Kém" class="fa fa-star">Kém</label>
                    <input type="radio" id="star1" name="rating" value="1" form="review_form"/>
                    <label for="star1" title="Quá tệ" class="fa fa-star">Quá tệ</label>
                  </fieldset>                  
                </div>
                <div class="col-md-8 col-xs-12">
                  <textarea form="review_form" name="review" id="review" placeholder="Nội dung đánh giá..." rows="8" cols="120"></textarea>
                </div>
              </div>
              <button form="review_form" class="btn normal color1 pull-right" <?php if ($Login!=1) echo 'disabled'; ?>>Gửi đánh giá</button>
            </form>
            <!-- end: Form -->
          <?php } else { ?>
            <h3>Đánh giá của bạn</h3>
            <div class="fr-border"></div>            
            <!-- Form -->            
              <div class="row">
                <div class="col-md-4 col-xs-12"> 
                  <fieldset class="rating">
                  <?php for($i=5;$i>=1;$i--) { ?>
                    <input type="radio" id="star<?=$i?>" name="rating" value="<?=$i?>" <?php if ($i>=$ktdanhgia[0]['DIEM']/2) echo 'checked'; ?>/>
                    <label for="star<?=$i?>" class="fa fa-star"></label>
                  <?php } ?>                                     
                  </fieldset>                  
                </div>
                <div class="col-md-8 col-xs-12">
                  <textarea name="review" id="review" rows="8" cols="100" readonly><?=$ktdanhgia[0]['NOIDUNG']?></textarea>                  
                </div>
              </div>              
          <?php } ?> 
          </div>            
        </div>
        <div class="tab-pane" id="comment">
          <?php if ($tongbinhluan[0]['SOLUONG']==0) { ?>
              <center><strong>Chưa có bình luận cho sản phẩm này.</strong></center></br></br>
          <?php } else { if (!$binhluansanpham) echo '<center><strong>Không có bình luận.</strong></center></br></br>'; foreach ($binhluansanpham as $item) { ?>  
          <div class="review">
            <div class="review-info">
              <div class="name"><i class="fa fa-comment-o fa-flip-horizontal fa-fw"></i> <?=$item['TENKHACHHANG']?></div>
              <div class="date"><em><?=date('d-m-Y H:i',strtotime($item['THOIGIAN']))?></em></div>              
            </div>            
            <div class="text"><?=$item['NOIDUNG']?></div>
          </div>  
          <?php } ?>                  
          <div class="pull-right">
            <ul class="pagination pagination-xs">
              <li><a href="<?=base_url()?>sanpham/chitiet?id=<?=$binhluansanpham[0]['MASANPHAM']?>&comment=1"><i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i></a></li>              
              <li class="<?php if(($comment-1)<1) echo 'disabled';?>"><a href="<?=base_url()?>sanpham/chitiet?id=<?=$binhluansanpham[0]['MASANPHAM']?>&comment=<?=$comment-1?>"><i class="fa fa-angle-left"></i></a></li>              
              <?php for($i=1; $i<=ceil($tongbinhluan[0]['SOLUONG']/5); $i++) { ?>
              <li <?php if ($i==$comment) echo 'class="active"'; ?>><a href="<?=base_url()?>sanpham/chitiet?id=<?=$binhluansanpham[0]['MASANPHAM']?>&comment=<?=$i?>"><?=$i?></a></li>          
              <?php } ?>
              <li class="<?php if(($comment+1)>(ceil($tongbinhluan[0]['SOLUONG']/5))) echo 'disabled';?>"><a href="<?=base_url()?>sanpham/chitiet?id=<?=$binhluansanpham[0]['MASANPHAM']?>&comment=<?=$page+1?>"><i class="fa fa-angle-right"></i></a></li>
              <li><a href="<?=base_url()?>sanpham/chitiet?id=<?=$binhluansanpham[0]['MASANPHAM']?>&comment=<?=ceil($tongbinhluan[0]['SOLUONG']/5)?>"><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></a></li>
            </ul>
          </div>
          <?php } ?>
          <?php if ($Login!=1) { ?>
          <center>
          <div class="col-md-4 col-xs-12">
          </div>
          <div class="col-lg-4 col-md-12">
            <div class="box-content login-box">
              <h4>Đăng nhập để bình luận sản phẩm này!</h4>
              <form id="login2" method="post" action="<?=base_url()?>dangnhap?redirect=<?=urlencode($_SERVER["REQUEST_URI"])?>">
                <input type="text" id="username" name="username" placeholder="Tên đăng nhập hoặc số điện thoại" class="input4">                        
                <input type="password" id="password" name="password" placeholder="Mật khẩu" class="input4">
                <label class="checkbox" for="remember">
                  <input type="checkbox" id="remember" name="remember" value="1" data-toggle="checkbox" class="pull-left">
                  <span class="pull-left">Ghi nhớ đăng nhập</span> </label>
                <button class="btn medium color2 pull-right" type="submit" form="login2">Đăng nhập</button>                
              </form>
            </div>
          </div>
          </center>
          <?php } ?>
          <div class="write-reivew" id="#write-review">          
            <h3>Đăng bình luận</h3>
            <div class="fr-border"></div>            
            <!-- Form -->
            <form action="" id="comment_form" method="post">
              <div class="row">                
                <div class="col-md-12 col-xs-12">
                  <textarea form="comment_form" name="comment" id="comment" placeholder="Nội dung bình luận..." rows="4" cols="150"></textarea>
                </div>
              </div>
              <button form="comment_form" class="btn normal color1 pull-right" <?php if ($Login!=1) echo 'disabled'; ?>>Đăng bình luận</button>
            </form>
            <!-- end: Form -->                      
          </div>            
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

<div class="row clearfix f-space30"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-column box-block">
        <a href="#"><div class="box-heading"><span>CÁC SẢN PHẨM GỢI Ý</span></div></a>
        <div class="box-content">
          <div class="box-products slide" id="tablet">
            <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#tablet"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#tablet"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
            <div class="carousel-inner"> 
              <!-- Items Row -->              
              <div class="item active">
                <div class="row box-product">                             
              <?php foreach ($sanphamlq_active as $item) { ?> 
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
              <?php foreach ($sanphamlq_deactive as $item) { ?> 
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