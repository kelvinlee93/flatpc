<div class="row clearfix f-space10"></div>
<!-- Shop Page title -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="shop-page-title dark">
        <h2><?=$public_data['tennhacungcap']?></h2>        
        <ul class="pull-left">
        <?php $i=0; foreach ($soluong as $item) { $i++; ?>
          <li><a href="<?=base_url()?>sanpham/<?=$public_data['name']?>/<?php if ($item['ID']==1) echo 'maytinhbang'; elseif ($item['ID']==2) echo 'maytinhxachtay'; elseif ($item['ID']==3) echo 'maytinhdeban'; elseif ($item['ID']==0) echo 'phukien';?>"><?=$item['TENLOAI']?> (<?=$item['SOLUONG']?>)</a></li>          
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
      <div class="box-heading category-heading"><?php if ($tongspncc[0]['SOLUONG']!=0) { ?><span>Hiển thị từ <?=($public_data['page']-1)*$public_data['perpage']+1?> đến <?=(($public_data['perpage']*($public_data['page']-1))+count($get_sanpham_ncc))?> trong tổng số <?=$tongspncc[0]['SOLUONG']?> sản phẩm</span> <?php } else echo '<span>Không có sản phẩm</span>'; ?>
        <ul class="nav nav-pills pull-right">
          <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" href="#a"> <?php if ($public_data['perpage']!='all') echo $public_data['perpage'].' sản phẩm'; else echo 'Hiển thị tất cả';?> <i class="fa fa-sort fa-fw"></i> </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="<?=base_url()?>sanpham/<?=$public_data['name']?><?php if ($public_data['loai']!=FALSE) echo '/'.$public_data['loai2']; ?>?perpage=6">6 sản phẩm</a></li>
              <li><a href="<?=base_url()?>sanpham/<?=$public_data['name']?><?php if ($public_data['loai']!=FALSE) echo '/'.$public_data['loai2']; ?>?perpage=9">9 sản phẩm</a></li>
              <li><a href="<?=base_url()?>sanpham/<?=$public_data['name']?><?php if ($public_data['loai']!=FALSE) echo '/'.$public_data['loai2']; ?>?perpage=12">12 sản phẩm</a></li>              
              <li><a href="<?=base_url()?>sanpham/<?=$public_data['name']?><?php if ($public_data['loai']!=FALSE) echo '/'.$public_data['loai2']; ?>?perpage=all">Hiển thị tất cả</a></li>
            </ul>
          </li>
          <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" href="#a"> <?php if ($public_data['sortby']=='nameaz') echo 'Tên sản phẩm (A-Z)'; elseif ($public_data['sortby']=='nameza') echo 'Tên sản phẩm (Z-A)'; elseif ($public_data['sortby']=='pricelh') echo 'Giá thấp đến cao'; elseif ($public_data['sortby']=='pricehl') echo 'Giá cao đến thấp'; elseif ($public_data['sortby']=='view') echo 'Được xem nhiều'; else echo 'Sắp xếp theo';?> <i class="fa fa-sort fa-fw"></i> </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="<?=base_url()?>sanpham/<?=$public_data['name']?><?php if ($public_data['loai']!=FALSE) echo '/'.$public_data['loai2']; ?>?sortby=nameaz">Tên sản phẩm (A-Z)</a></li>
              <li><a href="<?=base_url()?>sanpham/<?=$public_data['name']?><?php if ($public_data['loai']!=FALSE) echo '/'.$public_data['loai2']; ?>?sortby=nameza">Tên sản phẩm (Z-A)</a></li>
              <li><a href="<?=base_url()?>sanpham/<?=$public_data['name']?><?php if ($public_data['loai']!=FALSE) echo '/'.$public_data['loai2']; ?>?sortby=pricelh">Giá thấp đến cao</a></li>
              <li><a href="<?=base_url()?>sanpham/<?=$public_data['name']?><?php if ($public_data['loai']!=FALSE) echo '/'.$public_data['loai2']; ?>?sortby=pricehl">Giá cao đến thấp</a></li>
              <li><a href="<?=base_url()?>sanpham/<?=$public_data['name']?><?php if ($public_data['loai']!=FALSE) echo '/'.$public_data['loai2']; ?>?sortby=view">Xem nhiều</a></li>
              <li><a href="<?=base_url()?>sanpham/<?=$public_data['name']?><?php if ($public_data['loai']!=FALSE) echo '/'.$public_data['loai2']; ?>?sortby=time">Mặc định</a></li>                           
            </ul>
          </li>          
        </ul>
      </div>       
      <?php $d=0; foreach ($get_sanpham_ncc as $item) { $d++; ?>
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
          <?php if ($d==3) { $d=0; echo '</div></div></div><!-- end: Products Row -->'; } ?>                                                         
          <?php } if ($d!=0) echo '</div></div></div>'; ?>                                              
        
      <div class="clearfix f-space30"></div>
      <?php if (count($get_sanpham_ncc)!=0) { ?>      
      <?php if ($public_data['perpage']!='all') { ?>
      <center>
        <ul class="pagination pagination-lg">
          <li><a href="<?=base_url()?>sanpham/<?=$public_data['name']?><?php if ($public_data['loai']!=FALSE) echo '/'.$public_data['loai2']; ?>?page=1"><i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i></a></li>
          <li <?php if ($public_data['previous']==0) echo 'class="disabled"'; ?>><a href="<?=base_url()?>sanpham/<?=$public_data['name']?><?php if ($public_data['loai']!=FALSE) echo '/'.$public_data['loai2']; ?>?page=<?=$public_data['previous']?>"><i class="fa fa-angle-left"></i></a></li>
          <?php for($i=1; $i<=(ceil($tongspncc[0]['SOLUONG']/$public_data['perpage'])); $i++) { ?>
          <li <?php if ($public_data['page']==$i) echo 'class="active"'; ?>><a href="<?=base_url()?>sanpham/<?=$public_data['name']?><?php if ($public_data['loai']!=FALSE) echo '/'.$public_data['loai2']; ?>?page=<?=$i?>"><?=$i?></a></li>          
          <?php } ?>
          <li <?php if ($public_data['next']>(ceil($tongspncc[0]['SOLUONG']/$public_data['perpage']))) echo 'class="disabled"'; ?>><a href="<?=base_url()?>sanpham/<?=$public_data['name']?><?php if ($public_data['loai']!=FALSE) echo '/'.$public_data['loai2']; ?>?page=<?=$public_data['next']?>"><i class="fa fa-angle-right"></i></a></li>
          <li><a href="<?=base_url()?>sanpham/<?=$public_data['name']?><?php if ($public_data['loai']!=FALSE) echo '/'.$public_data['loai2']; ?>?page=<?=(ceil($tongspncc[0]['SOLUONG']/$public_data['perpage']))?>"><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></a></li>
        </ul>
      </center>
      <?php } } ?>
    </div>    
    <?php $this->load->view('home/sidebar',$this->data); ?>
  </div>
  <!-- end:row --> 
</div>
<!-- end: container-->