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
		<link href="<?=base_url()?>static/home/css/skin/cadetblue-violetred.css" id="colorstyle" rel="stylesheet">
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
    
    <link href="<?=base_url()?>static/home/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="<?=base_url()?>static/home/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />


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
            <div class="pull-left"><br>            
                <?php if ($taikhoan_updateinfo!=1)
                          {
                              if ($taikhoan_updateinfo==2)
                                  echo '<span style="color: green"><strong>Thành công!</strong></span>';
                              elseif ($taikhoan_updateinfo==3)
                                  echo '<span style="red: green"><strong>Lỗi xảy ra!</strong></span>';
                          }
                ?>
            </div>
            <ul class="nav nav-pills pull-right">              
              <li> <a href="<?php if ($this->cart->total()==0) echo 'javascript:alert(\'Chưa có sản phẩm!\')'; else echo base_url('giohang')?>"> <i class="fa fa-shopping-cart fa-fw"></i> <span class="hidden-xs"> Giỏ hàng</span></a> </li>              
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
                      <form method="post" action="<?=base_url()?>dangnhap?redirect=<?=urlencode($_SERVER["REQUEST_URI"])?>">
                        <div class="form-group"> <i class="fa fa-user fa-fw"></i>
                          <input class="form-control" id="username" name="username" placeholder="Tên đăng nhập" type="text">
                        </div>
                        <div class="form-group"> <i class="fa fa-lock fa-fw"></i>
                          <input class="form-control" id="password" name="password" placeholder="Mật khẩu" type="password">                          
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
          <form action="<?=base_url()?>timkiem" id="search_form">
            <ul class="pull-left">
              <li class="input-prepend dropdown" data-select="true"> <a class="add-on dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="#a"> <span class="dropdown-display">Tất cả</span> <i class="fa fa-sort fa-fw"></i> </a> 
                <!-- this hidden field is used to contain the selected option from the dropdown -->
                <input form="search_form" id="loaisanpham" name="loaisanpham" class="dropdown-field" type="hidden" value="all"/>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#a" data-value="1">Máy tính bảng</a></li>
                  <li><a href="#a" data-value="2">Máy tính xách tay</a></li>
                  <li><a href="#a" data-value="3">Máy tính để bàn</a></li>
                  <li><a href="#a" data-value="0">Phụ kiện</a></li>                  
                  <li><a href="#a" data-value="all">Tất cả</a></li>
                </ul>
              </li>
            </ul>
            <div class="searchbox pull-left">
              <input class="searchinput" id="keyword" name="keyword" form="search_form" placeholder="Tìm..." type="search">
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
            <li class="hidden-xs"> <a href="<?=base_url('sanpham/maytinhbang')?>"> <i class="fa fa-tablet"></i> <span>Máy tính bảng</span> <i class="fa fa-angle-right"></i> </a>
              <div class="dropdown-menu"> 
                <!-- Sub Menu -->
                <div class="content">
                  <div class="row">
                    <div class="col-md-4">
                      <ul>
                        <li><a href="<?=base_url('sanpham/maytinhbang/acer')?>">ACER</a></li>
                        <li><a href="<?=base_url('sanpham/maytinhbang/asus')?>">ASUS</a></li>
                        <li><a href="<?=base_url('sanpham/maytinhbang/dell')?>">DELL</a></li>                                            
                      </ul>
                    </div>
                    <div class="col-md-4">
                      <ul>
                        <li><a href="<?=base_url('sanpham/maytinhbang/hp')?>">HP</a></li>
                        <li><a href="<?=base_url('sanpham/maytinhbang/sony')?>">SONY</a></li>
                        <li><a href="<?=base_url('sanpham/maytinhbang/toshiba')?>">TOSHIBA</a></li>
                      </ul>
                    </div>
                    <div class="col-md-4">
                      <ul>
                        <li><a href="<?=base_url('sanpham/maytinhbang/apple')?>">APPLE</a></li>
                        <li><a href="<?=base_url('sanpham/maytinhbang/lenovo')?>">LENOVO</a></li>
                        <li><a href="<?=base_url('sanpham/maytinhbang/samsung')?>">SAMSUNG</a></li>
                      </ul>
                    </div>
                  </div>                  
                </div>
                <!-- end: Sub Menu --> 
              </div>
            </li>
            <!-- end: Menu Item --> 
            <!-- Menu Item -->
            <li> <a href="<?=base_url('sanpham/maytinhxachtay')?>"> <i class="fa fa-laptop"></i> <span>Máy tính xách tay</span> <i class="fa fa-angle-right"></i> </a>
              <div class="dropdown-menu"> 
                <!-- Sub Menu -->
                <div class="content">
                  <div class="row">
                    <div class="col-md-4">
                      <ul>
                        <li><a href="<?=base_url('sanpham/maytinhxachtay/acer')?>">ACER</a></li>
                        <li><a href="<?=base_url('sanpham/maytinhxachtay/asus')?>">ASUS</a></li>
                        <li><a href="<?=base_url('sanpham/maytinhxachtay/dell')?>">DELL</a></li>                                            
                      </ul>
                    </div>
                    <div class="col-md-4">
                      <ul>
                        <li><a href="<?=base_url('sanpham/maytinhxachtay/hp')?>">HP</a></li>
                        <li><a href="<?=base_url('sanpham/maytinhxachtay/sony')?>">SONY</a></li>
                        <li><a href="<?=base_url('sanpham/maytinhxachtay/toshiba')?>">TOSHIBA</a></li>
                      </ul>
                    </div>
                    <div class="col-md-4">
                      <ul>
                        <li><a href="<?=base_url('sanpham/maytinhxachtay/apple')?>">APPLE</a></li>
                        <li><a href="<?=base_url('sanpham/maytinhxachtay/lenovo')?>">LENOVO</a></li>
                        <li><a href="<?=base_url('sanpham/maytinhxachtay/samsung')?>">SAMSUNG</a></li>
                      </ul>
                    </div>
                  </div>                  
                </div>
                <!-- end: Sub Menu --> 
              </div>
            </li>
            <!-- end: Menu Item --> 
            <!-- Menu Item -->
            <li> <a href="<?=base_url('sanpham/maytinhdeban')?>"> <i class="fa fa-desktop"></i> <span>Máy tính để bàn</span> <i class="fa fa-angle-right"></i> </a>
              <div class="dropdown-menu"> 
                <!-- Sub Menu -->
                <div class="content">
                  <div class="row">
                    <div class="col-md-4">
                      <ul>
                        <li><a href="<?=base_url('sanpham/maytinhdeban/acer')?>">ACER</a></li>
                        <li><a href="<?=base_url('sanpham/maytinhdeban/asus')?>">ASUS</a></li>
                        <li><a href="<?=base_url('sanpham/maytinhdeban/dell')?>">DELL</a></li>                                            
                      </ul>
                    </div>
                    <div class="col-md-4">
                      <ul>
                        <li><a href="<?=base_url('sanpham/maytinhdeban/hp')?>">HP</a></li>
                        <li><a href="<?=base_url('sanpham/maytinhdeban/sony')?>">SONY</a></li>
                        <li><a href="<?=base_url('sanpham/maytinhdeban/toshiba')?>">TOSHIBA</a></li>
                      </ul>
                    </div>
                    <div class="col-md-4">
                      <ul>
                        <li><a href="<?=base_url('sanpham/maytinhdeban/apple')?>">APPLE</a></li>
                        <li><a href="<?=base_url('sanpham/maytinhdeban/lenovo')?>">LENOVO</a></li>
                        <li><a href="<?=base_url('sanpham/maytinhdeban/samsung')?>">SAMSUNG</a></li>
                      </ul>
                    </div>
                  </div>                  
                </div>
                <!-- end: Sub Menu --> 
              </div>
            </li>
            <li> <a href="<?=base_url('sanpham/phukien')?>"> <i class="fa fa-headphones"></i> <span>Phụ kiện</span></a> </li>
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
            <li class="dropdown"> <a href="<?php if ($this->cart->total()==0) echo '#'; else echo base_url('giohang'); ?>"> <i class="fa fa-shopping-cart fa-fw"></i> <span class="hidden-sm"> <?=count($this->cart->contents());?> | <?=number_format($this->cart->total(), 0, ',', '.');?> đ</span></a> 
              <!-- Quick Cart -->
              <?php if ($this->cart->total()==0) { ?>
              <div class="dropdown-menu quick-cart empty">
              <div class="qc-row qc-row-item" style="min-height:60px; padding:30px 10px; text-align: center">Chưa có sản phẩm!</div></div>
              <?php } else { ?>
              <div class="dropdown-menu quick-cart">
                <div class="qc-row qc-row-heading"> <span class="qc-col-qty">Số lượng</span> <span class="qc-col-name">Tên sản phẩm</span> <span class="qc-col-price">Đơn giá</span> </div>
                <?php foreach ($this->cart->contents() as $product) 
                { ?>
                    <div class="qc-row qc-row-item"> <span class="qc-col-qty"><?=$product['qty']?></span> <span class="qc-col-name"><a href="<?=base_url()?>sanpham/chitiet?id=<?=$product['id']?>"><?=$product['name']?></a></span> <span class="qc-col-price"><?=number_format($product['price'], 0, ',', '.');?></span></div>
                <?php } ?>                
                <div class="qc-row-bottom"><a class="btn qc-btn-viewcart" href="<?=base_url('giohang')?>">xem giỏ hàng</a><a class="btn qc-btn-checkout" href="<?=base_url('dathang')?>">đặt hàng</a></div>
              </div>
              <?php } ?>
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