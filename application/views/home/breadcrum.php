<div class="row clearfix"></div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="breadcrumb"> <a href="<?=base_url()?>"> <i class="fa fa-home fa-fw"></i> Trang chủ </a>
      <?php if ($page_type==1) { ?>
          <i class="fa fa-angle-right fa-fw"></i> <a href="<?=base_url()?><?=$page_link?>"> <?=$page_title?> </a>
          <?php if ($page_type==1) { ?>
          <i class="fa fa-angle-right fa-fw"></i> <a href="<?=base_url()?><?=$page_link.$page_link2?>"> <?=$page_title2?> </a> 
          <?php } ?>
          <i class="fa fa-angle-right fa-fw"></i> <a href="<?=base_url()?><?=$subpage_link?>"> <?=$subpage_title?> </a>
      <?php } else { ?>
          <?php if ($page_title!='0') { ?>
          <i class="fa fa-angle-right fa-fw"></i> <a href="<?=base_url()?><?=$page_link?>"> <?=$page_title?> </a>
          <?php } ?>
          <?php if ($page_title2!='0') { ?>
          <i class="fa fa-angle-right fa-fw"></i> <a href="<?=base_url()?><?=$page_link.'/'.$page_link2?>"> <?=$page_title2?> </a>
          <?php } ?>
          <?php if ($subpage_title!='0') { ?>
          <i class="fa fa-angle-right fa-fw"></i> <a href="<?=base_url()?><?=$subpage_link?>"> <?=$subpage_title?> </a>
          <?php } ?>
      <?php } ?>
      </div>
      
      <!-- Quick Help for tablets and large screens -->
      <div class="quick-message hidden-xs">
        <div class="quick-box">
          <div class="quick-slide"> <span class="title">Hỗ trợ </span>
            <div class="quickbox slide" id="quickbox">
              <div class="carousel-inner">                
                <div class="item active"> <a href="#"> <i class="fa fa-phone fa-fw"></i> (84) 169 466 2923</a> </div>
              </div>
            </div>            
        </div>
      </div>
      <!-- end: Quick Help --> 
      
    </div>
  </div>
</div>