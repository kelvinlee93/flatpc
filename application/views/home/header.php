<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7 lte9 lte8 lte7" lang="en-US"><![endif]-->
<!--[if IE 8]><html class="ie ie8 lte9 lte8" lang="en-US">	<![endif]-->
<!--[if IE 9]><html class="ie ie9 lte9" lang="en-US"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="vi">
<!--<![endif]-->
	<head>
		<meta charset="UTF-8">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
		<meta content="FlatPC - Shop PC Online" name="description">
		<meta content="Kelvin Lee" name="author">
		
		<title>FlatPC - Siêu thị máy tính trực tuyến</title>
		
		<link href="<?=base_url()?>static/home/css/normalize.css" rel="stylesheet" type="text/css"/>		
		<link href="<?=base_url()?>static/home/css/bootstrap.css" rel="stylesheet">		
		<link href="<?=base_url()?>static/home/css/iview.css" rel="stylesheet">	
		<link href="<?=base_url()?>static/home/css/menu3d.css" rel="stylesheet"/>	
		<link href="<?=base_url()?>static/home/css/animate.css" rel="stylesheet" type="text/css"/>		
		<link href="<?=base_url()?>static/home/css/custom.css" rel="stylesheet" type="text/css" />				
		<link href="<?=base_url()?>static/home/css/skin/midnight-blue.css" id="colorstyle" rel="stylesheet">
		<link href="<?=base_url()?>static/home/images/favicon.ico" rel="icon" type="image/x-icon" />

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]> <script src="js/html5shiv.js"></script> <script src="js/respond.min.js"></script> <![endif]-->		
		<script src="<?=base_url()?>static/home/js/jquery-1.10.2.min.js"></script>
		<script src="<?=base_url()?>static/home/js/bootstrap.min.js"></script>
		<script src="<?=base_url()?>static/home/js/bootstrap-select.js"></script>	
		<script src="<?=base_url()?>static/home/js/scripts.js"></script>		
		<script src="<?=base_url()?>static/home/js/menu3d.js" type="text/javascript"></script>
		<script src="<?=base_url()?>static/home/js/raphael-min.js" type="text/javascript"></script>
		<script src="<?=base_url()?>static/home/js/jquery.easing.js" type="text/javascript"></script>
		<script src="<?=base_url()?>static/home/js/iview.js" type="text/javascript"></script>
		<script src="<?=base_url()?>static/home/js/retina-1.1.0.min.js" type="text/javascript"></script>

		<!--[if IE 8]>
		    <script type="text/javascript" src="js/selectivizr.js"></script>
		    <![endif]-->

	</head>
<body>
  <!-- Header -->
<header> 
  <!-- Top Heading Bar -->
  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="topheadrow">
            <div class="pull-left"></div>
            <ul class="nav nav-pills pull-right">              
              <li> <a href="<?=base_url('giohang')?>"> <i class="fa fa-shopping-cart fa-fw"></i> <span class="hidden-xs"> Giỏ hàng</span></a> </li>
              <?php if($Login==1)
              { ?>
                  <li> <a href="<?=base_url('taikhoan')?>"> <i class="fa fa-user fa-fw"></i> <span class="hidden-xs"> <?=$Username?></span></a> </li>              
                  <li> <a href="<?=base_url('dangxuat')?>"> <i class="fa fa-key fa-fw"></i> <span class="hidden-xs"> Đăng xuất</span></a> </li>              
              <?php } 
              else 
              { ?>
                  <li> <a href="<?=base_url('dangky')?>"> <i class="fa fa-pencil fa-fw"></i> <span class="hidden-xs"> Đăng ký</span></a> </li>              
                  <li class="dropdown"> <a class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="#"> <i class="fa fa-user fa-fw"></i> <span class="hidden-xs"> Đăng nhập</span></a>
                    <div class="loginbox dropdown-menu"> <span class="form-header">Đăng nhập</span>
                      <form method="post" action="<?=base_url('dangnhap')?>">
                        <div class="form-group"> <i class="fa fa-user fa-fw"></i>
                          <input class="form-control" id="username" name="username" placeholder="Tên đăng nhập" type="text">
                        </div>
                        <div class="form-group"> <i class="fa fa-lock fa-fw"></i>
                          <input class="form-control" id="password" name="password" placeholder="Mật khẩu" type="password">
                          <input class="form-control" id="home" name="home" type="hidden" value="1">
                        </div>
                        <button class="btn small color1 pull-left" type="button" onclick="window.location.href='<?=base_url('dangky')?>'">Đăng ký</button>
                        <button class="btn small color1 pull-right" type="submit">Đăng nhập</button>
                      </form>
                    </div>
                  </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  <!-- end: Top Heading Bar -->
  
  <div class="f-space20"></div>
  <!-- Logo and Search -->
  <div class="container">
    <div class="row clearfix">
      <div class="col-lg-3 col-xs-12">
        <div class="logo"> <a href="<?=base_url()?>" title="FlatPC"><!-- <img alt="Flatro - Responsive Metro Inspired Flat ECommerce theme" src="images/logo2.png"> -->
          <div class="logoimage"><i class="fa fa-shopping-cart fa-fw"></i></div>
          <div class="logotext"><span><strong>FLAT</strong></span><span>PC</span></div>
          <span class="slogan"></span></a> </div>
      </div>
      <!-- end: logo -->
      <div class="visible-xs f-space20"></div>
      <!-- search -->
      <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right">
        <div class="searchbar">
          <form action="#">
            <ul class="pull-left">
              <li class="input-prepend dropdown" data-select="true"> <a class="add-on dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="#a"> <span class="dropdown-display">Tất cả</span> <i class="fa fa-sort fa-fw"></i> </a> 
                <!-- this hidden field is used to contain the selected option from the dropdown -->
                <input class="dropdown-field" type="hidden" value="All Categories"/>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#a" data-value="Men Wear">Men Wear</a></li>
                  <li><a href="#a" data-value="Women Wear">Women Wear</a></li>
                  <li><a href="#a" data-value="Music">Music</a></li>
                  <li><a href="#a" data-value="Mobile Phones">Mobile Phones</a></li>
                  <li><a href="#a" data-value="Computers">Computers</a></li>
                  <li><a href="#a" data-value="Gaming">Gaming</a></li>
                  <li><a href="#a" data-value="Gift Ideas">Gift Ideas</a></li>
                  <li><a href="#a" data-value="All Categories">All Categories</a></li>
                </ul>
              </li>
            </ul>
            <div class="searchbox pull-left">
              <input class="searchinput" id="search" placeholder="Tìm..." type="search">
              <button class="fa fa-search fa-fw" type="submit"></button>
            </div>
          </form>
        </div>
      </div>
      <!-- end: search --> 
      
    </div>
  </div>
  <!-- end: Logo and Search -->
  <div class="f-space20"></div>
  <!-- Menu -->
  <div class="container">
    <div class="row clearfix">
      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 menu-col">
        <div class="menu-heading menuHeadingdropdown"> <span> <i class="fa fa-bars"></i> Danh mục <i class="fa fa-angle-down"></i></span> </div>
        <!-- Mega Menu -->
        <div class="menu3dmega vertical menuMegasub" id="menuMega">
          <ul>            
            <!-- Menu Item for Tablets and Computers Only-->
            <li class="hidden-xs"> <a href="#a"> <i class="fa fa-tablet"></i> <span>Máy tính bảng</span> <i class="fa fa-angle-right"></i> </a>
              <div class="dropdown-menu flyout-menu"> 
                <!-- Sub Menu -->
                <ul>
                  <li><a href="index.html">Home</a></li>
                  <li><a href="about.html">About us</a></li>
                  <li><a href="blog.html">Blog</a></li>                  
                </ul>
                <!-- end: Sub Menu --> 
              </div>
            </li>
            <!-- end: Menu Item --> 
            <!-- Menu Item -->
            <li> <a href="#a"> <i class="fa fa-laptop"></i> <span>Máy tính xách tay</span> <i class="fa fa-angle-right"></i> </a>
              <div class="dropdown-menu"> 
                <!-- Sub Menu -->
                <div class="content">
                  <div class="row">
                    <div class="col-md-4"> <a class="menu-title" href="#a">Fashion</a>
                      <ul>
                        <li><a href="#a">Clothing</a></li>
                        <li><a href="#a">Shoes</a></li>
                        <li><a href="#a">Handbags</a></li>
                        <li><a href="#a">Accessories</a></li>
                        <li><a href="#a">Luggage</a></li>
                        <li><a href="#a">Jewelry</a></li>
                      </ul>
                    </div>
                    <div class="col-md-4"> <a class="menu-title" href="#a">Shirts</a>
                      <ul>
                        <li><a href="#a">Reguler Shirts</a></li>
                        <li><a href="#a">Slim Shirts</a></li>
                        <li><a href="#a">Fashion Shirts</a></li>
                        <li><a href="#a">Black Shirts</a></li>
                        <li><a href="#a">White Shirts</a></li>
                        <li><a href="#a">Gray Shirts</a></li>
                      </ul>
                    </div>
                    <div class="col-md-4"> <a class="menu-title" href="#a">Jeans</a>
                      <ul>
                        <li><a href="#a">Reguler Jeans</a></li>
                        <li><a href="#a">Slim-fit Jeans</a></li>
                        <li><a href="#a">Loose Jeans</a></li>
                        <li><a href="#a">Top Jeans</a></li>
                        <li><a href="#a">New Jeans</a></li>
                        <li><a href="#a">Color Jeans</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <p> <a href="#a"><img alt="" src="images/menu-ad.jpg"></a> </p>
                    </div>
                  </div>
                </div>
                <!-- end: Sub Menu --> 
              </div>
            </li>
            <!-- end: Menu Item --> 
            <!-- Menu Item -->
            <li> <a href="#a"> <i class="fa fa-desktop"></i> <span>Máy tính để bàn</span> <i class="fa fa-angle-right"></i> </a>
              <div class="dropdown-menu"> 
                <!-- Sub Menu -->
                <div class="content">
                  <div class="row">
                    <div class="col-md-5"> <a class="menu-title" href="#a">Fashion</a>
                      <ul>
                        <li><a href="#a">Clothing</a></li>
                        <li><a href="#a">Shoes</a></li>
                        <li><a href="#a">Handbags</a></li>
                        <li><a href="#a">Accessories</a></li>
                        <li><a href="#a">Luggage</a></li>
                        <li><a href="#a">Jewelry</a></li>
                      </ul>
                    </div>
                    <div class="col-md-7">
                      <div class="product-block">
                        <div class="image">
                          <div class="product-label product-sale"><span>SALE</span></div>
                          <a class="img" href="product.html"><img alt="product info" src="images/products/product1.jpg" title="product title"></a> </div>
                        <div class="product-meta">
                          <div class="name"><a href="product.html">Ladies Stylish Handbag</a></div>
                          <div class="big-price"> <span class="price-new"><span class="sym">$</span>96</span> <span class="price-old"><span class="sym">$</span>119.50</span> </div>
                          <div class="big-btns"> <a class="btn btn-default btn-view pull-left" href="#">View</a> <a class="btn btn-default btn-addtocart pull-right" href="#">Add to
                            Cart</a> </div>
                          <div class="small-price"> <span class="price-new"><span class="sym">$</span>96</span> <span class="price-old"><span class="sym">$</span>119.50</span> </div>
                          <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i> <i class="fa fa-star-o"></i> </div>
                          <div class="small-btns">
                            <button class="btn btn-default btn-compare pull-left" data-toggle="tooltip" title="Add to Compare"> <i class="fa fa-retweet fa-fw"></i> </button>
                            <button class="btn btn-default btn-wishlist pull-left" data-toggle="tooltip" title="Add to Wishlist"> <i class="fa fa-heart fa-fw"></i> </button>
                            <button class="btn btn-default btn-addtocart pull-left" data-toggle="tooltip" title="Add to Cart"> <i class="fa fa-shopping-cart fa-fw"></i> </button>
                          </div>
                        </div>
                        <div class="meta-back"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end: Sub Menu --> 
              </div>
            </li>
            <li> <a href="#a"> <i class="fa fa-video-camera"></i> <span>Phụ kiện</span></a> </li>
            <!-- end: Menu Item --> 
            <!-- Menu Item 
            <li> <a href="#a"> <i class="fa fa-video-camera"></i> <span>Digital Camera</span></a> </li>
            -->
          </ul>
        </div>
        <!-- end: Mega Menu --> 
      </div>
      <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 menu-col-2"> 
        <!-- Navigation Buttons/Quick Cart for Tablets and Desktop Only -->
        <div class="menu-links hidden-xs">
          <ul class="nav nav-pills nav-justified">
            <li> <a href="<?=base_url()?>"> <i class="fa fa-home fa-fw"></i> <span class="hidden-sm">Trang chủ</span></a> </li>
            <li> <a href="<?=base_url('gioithieu')?>"> <i class="fa fa-info-circle fa-fw"></i> <span class="hidden-sm">Giới thiệu</span></a> </li>
            <li> <a href="<?=base_url('tintuc')?>"> <i class="fa fa-rss fa-fw"></i> <span class="hidden-sm">Tin tức</span></a> </li>
            <li> <a href="<?=base_url('lienhe')?>"> <i class="fa fa-pencil-square-o fa-fw"></i> <span class="hidden-sm ">Liên hệ</span></a> </li>
            <li class="dropdown"> <a href="<?=base_url('giohang')?>"> <i class="fa fa-shopping-cart fa-fw"></i> <span class="hidden-sm"> <?=count($this->cart->contents());?> | <?=number_format($this->cart->total(), 0, ',', '.');?> đ</span></a> 
              <!-- Quick Cart -->
              <div class="dropdown-menu quick-cart">
                <div class="qc-row qc-row-heading"> <span class="qc-col-qty">Số lượng</span> <span class="qc-col-name">Tên sản phẩm</span> <span class="qc-col-price">Đơn giá</span> </div>
                <?php foreach ($this->cart->contents() as $product) 
                { ?>
                    <div class="qc-row qc-row-item"> <span class="qc-col-qty"><?=$product['qty']?></span> <span class="qc-col-name"><a href="<?=base_url()?>sanpham/chitiet?id=<?=$product['id']?>"><?=$product['name']?></a></span> <span class="qc-col-price"><?=number_format($product['price'], 0, ',', '.');?></span></div>
                <?php } ?>                
                <div class="qc-row-bottom"><a class="btn qc-btn-viewcart" href="<?=base_url('giohang')?>">xem giỏ hàng</a><a class="btn qc-btn-checkout" href="<?=base_url('dathang')?>">đặt hàng</a></div>
              </div>
              <!-- end: Quick Cart --> 
            </li>
          </ul>
        </div>
        <!-- end: Navigation Buttons/Quick Cart Tablets and large screens Only --> 
        
      </div>
    </div>
  </div>
</header>
<!-- end: Header -->