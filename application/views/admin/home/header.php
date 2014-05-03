<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">    
    <link rel="shortcut icon" href="<?=base_url()?>static/img/favicon.ico">

    <title><?=$title?> - FlatPC Admin</title>

    <link href="<?=base_url()?>static/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>static/admin/css/bootstrap-reset.css" rel="stylesheet">    
    <link href="<?=base_url()?>static/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?=base_url()?>static/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="<?=base_url()?>static/admin/css/owl.carousel.css" type="text/css">    
    <link href="<?=base_url()?>static/admin/css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>static/admin/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
          <div class="sidebar-toggle-box">
              <div data-original-title="Tắt menu" data-placement="right" class="icon-reorder tooltips"></div>
          </div>
          <!--logo start-->
          <a href="" class="logo" >Flat<span>PC</span></a>
          <!--logo end-->                    

          <div class="top-nav ">
              <ul class="nav pull-right top-menu">                  
                  <!-- user login dropdown start-->
                  <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <img alt="" src="<?=base_url()?>static/admin/img/avatar_kelvinlee.jpeg" width="29" heigh="29">
                          <span class="username"><?=$Name?></span>
                          <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu extended logout">
                          <div class="log-arrow-up"></div>                          
                          <li><a href="<?=base_url()?>dangxuat"><i class="icon-key"></i> Đăng xuất</a></li>
                      </ul>
                  </li>
                  <!-- user login dropdown end -->
              </ul>
          </div>
      </header>
      <!--header end-->