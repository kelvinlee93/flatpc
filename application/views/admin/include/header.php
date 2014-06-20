<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="utf-8">    
    <link rel="shortcut icon" href="<?=base_url()?>static/home/images/favicon.ico">

    <title><?=$title?> - FlatPC Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>static/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>static/admin/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?=base_url()?>static/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <?php if($page=='dashboard')
        echo '
    <link href="'.base_url().'static/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="'.base_url().'static/admin/css/owl.carousel.css"rel="stylesheet" type="text/css">
    '
    ?>
    <?php if($subpage=='user-manage'||$subpage=='rating-manage'||$subpage=='comment-manage'||$subpage=='news-manage'||$subpage=='order-manage'||$subpage=='invoice-manage'||$subpage=='product-manage'||$subpage=='product-import-manage'||$subpage=='rating-info'||$subpage=='news-comment')
        echo '
    <link href="'.base_url().'static/admin/assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="'.base_url().'static/admin/assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    '
    ?>
    <?php if($subpage=='user-add'||$subpage=='user-edit'||$subpage=='rating-edit'||$subpage=='comment-edit'||$subpage=='news-edit'||$subpage=='news-add'||$subpage=='order-add'||$subpage=='product-add'||$subpage=='product-edit'||$subpage=='product-import'||$subpage=='news-comment-edit')
        echo '    
    <link rel="stylesheet" type="text/css" href="'.base_url().'static/admin/assets/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="'.base_url().'static/admin/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="'.base_url().'static/admin/assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="'.base_url().'static/admin/assets/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="'.base_url().'static/admin/assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="'.base_url().'static/admin/assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="'.base_url().'static/admin/assets/bootstrap-datetimepicker/css/datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="'.base_url().'static/admin/assets/jquery-multi-select/css/multi-select.css" />
    <link href="'.base_url().'static/admin/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="'.base_url().'static/admin/css/gallery.css" />
    '
    ?>
    <!-- Custom styles for this template -->
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
              <div data-original-title="Đóng menu" data-placement="right" class="icon-reorder tooltips"></div>
          </div>
          <!--logo start-->
          <a href="<?=base_url('admin')?>" class="logo" >Flat<span>PC</span></a>
          <!--logo end-->                    

          <div class="top-nav ">
              <ul class="nav pull-right top-menu">                  
                  <!-- user login dropdown start-->
                  <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <img alt="" src="<?=base_url()?>static/img/<?=$Avatar?>" width="29" heigh="29">
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