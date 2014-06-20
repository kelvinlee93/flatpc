<div class="row clearfix f-space10"></div>
<!-- Page title -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="page-title">
        <h2>Tin tức</h2>
      </div>
    </div>
  </div>
</div>
<!-- end: Page title -->
<div class="row clearfix f-space10"></div>
<div class="container"> 
  <!-- row -->
  <div class="row">
    <div class="col-md-9 col-sm-12 col-xs-12 main-column box-block">
    <?php foreach ($tintuc as $item) { ?>        
      <div class="blogpost row">
        <div class="blogcontent col-md-12">          
          <div class="blogdetails col-md-2 col-xs-12 date"> <span><?=date('d',strtotime($item['NGAYDANG']))?></span><span>Tháng <?=date('m',strtotime($item['NGAYDANG']))?></span> <a href="<?=base_url()?>tintuc?id=<?=$item['ID']?>" class="btn color2 medium"><?=date('o',strtotime($item['NGAYDANG']))?></a> </div>
          <div class="col-md-10 col-xs-12 blog-summery"> <a class="color1" href="<?=base_url()?>tintuc?id=<?=$item['ID']?>">
            <h1><?=$item['TIEUDE']?></h1>
            </a> <span class="bloginfo"> <i class="fa fa-user fa-fw"></i><?=$item['TENDANGNHAP']?> <i class="fa fa-folder fa-fw"></i><?php if ($item['LOAITIN']==1) echo 'Tin khuyến mãi'; else echo 'Tin công nghệ';?> </span>
            <p> <?=$item['MOTA']?> <a href="<?=base_url()?>tintuc?id=<?=$item['ID']?>">Đọc tiếp -></a> </p>
          </div>
        </div>
      </div>      
      <div class="clearfix f-space30"></div>
    <?php } ?>
    <?php if (count($tintuc)!=0) { ?>
      <center>
        <ul class="pagination pagination-lg">
          <li><a href="<?=base_url()?>tintuc?page=1"><i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i></a></li>
          <li <?php if ($page-1==0) echo 'class="disabled"'; ?>><a href="<?=base_url()?>tintuc?page=<?=$page-1?>"><i class="fa fa-angle-left"></i></a></li>
          <?php for($i=1; $i<=(ceil($tongtintuc[0]['SOLUONG']/5)); $i++) { ?>
          <li <?php if ($page==$i) echo 'class="active"'; ?>><a href="<?=base_url()?>tintuc?page=<?=$i?>"><?=$i?></a></li>          
          <?php } ?>
          <li <?php if ($page+1>(ceil($tongtintuc[0]['SOLUONG']/5))) echo 'class="disabled"'; ?>><a href="<?=base_url()?>tintuc?page=<?=$page+1?>"><i class="fa fa-angle-right"></i></a></li>
          <li><a href="<?=base_url()?>tintuc?page=<?=ceil($tongtintuc[0]['SOLUONG']/5)?>"><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></a></li>
            </ul>
      </center>
    <?php } ?>
    </div>
    <!-- side bar -->
    <?php $this->load->view('home/sidebar',$this->data); ?>
    <!-- end:sidebar --> 
  </div>
  <!-- end:row --> 
</div>
<!-- end: container-->