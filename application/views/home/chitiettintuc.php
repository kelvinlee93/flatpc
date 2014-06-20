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
    <!--   Single Post -->
    <div class="col-md-9 col-sm-12 col-xs-12 main-column box-block blog-single">       
      <div class="post-title">
        <h1><?=$chitiettintuc[0]['TIEUDE']?></h1>
      </div>
      
      <!-- Post Info -->
      <div class="post-info clearfix">
        <ul class="pinfo">
          <li><i class="fa fa-calendar"></i><a href="#a"><?=date('d-m-Y',strtotime($chitiettintuc[0]['NGAYDANG']))?></a></li>
          <li><i class="fa fa-folder fa-fw"></i><a href="#a"><?php if ($chitiettintuc[0]['LOAITIN']==1) echo 'Tin khuyến mãi'; else echo 'Tin công nghệ';?></a></li>
          <li><i class="fa fa-user"></i><a href="#a"><?=$chitiettintuc[0]['TENDANGNHAP']?></a></li>
          <li><i class="fa fa-comments-o"></i><a href="#a"><?=$tongbinhluantintuc[0]['SOLUONG']?> bình luận</a></li>
          <li class="sharethis btn dropdown hidden-xs"><i class="fa fa-share-square-o"></i><a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" href="#a">Chia sẻ bài viết</a>
            <ul class="dropdown-menu">
              <li> <a href="https://www.facebook.com/sharer/sharer.php?u=<?='http://flatpc.com'.$_SERVER["REQUEST_URI"]?>" target="_blank" rel="nofollow" class="sharefacebook"> <i class="fa fa-facebook-square"></i> Facebook</a> </li>
              <li><a href="https://plus.google.com/share?url=<?='http://flatpc.com'.$_SERVER["REQUEST_URI"]?>" target="_blank" rel="nofollow" class="sharegoogleplus"><i class="fa fa-google-plus-square"></i> Google+ </a></li>
              <li><a href="http://twitter.com/home?status=<?='http://flatpc.com'.$_SERVER["REQUEST_URI"]?>" target="_blank" rel="nofollow" class="sharetwitter"><i class="fa fa-twitter-square"></i> Twitter</a></li>
              <li><a href="http://www.pinterest.com/pin/create/button/?url=<?='http://flatpc.com'.$_SERVER["REQUEST_URI"]?>&amp;description=FlatPC" target="_blank" rel="nofollow" class="sharepinterest"><i class="fa fa-pinterest-square"></i> Pinterest </a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- end: Post Info --> 
      
      <!-- Post Text -->
      <div class="post-text clearfix">
          <?=$chitiettintuc[0]['NOIDUNG']?>
      </div>      
      <!-- Post Text -->                  
      <div class="clearfix f-space30"></div>
      <!-- Comments -->
      
      <div class="box-heading clearfix"><span>Bình luận (<?=$tongbinhluantintuc[0]['SOLUONG']?>)</span></div>
      <div class="box-content clearfix">
        <?php if ($tongbinhluantintuc[0]['SOLUONG']==0) { ?>
        <div class="clearfix f-space30"></div>
        <center><strong>CHƯA CÓ BÌNH LUẬN!</strong></center> 
        <div class="clearfix f-space30"></div>
        <?php } else { foreach ($binhluantintuc as $item) { ?>        
        <!--  Comment Box -->
        <div class="box-heading clearfix">          
          <div class="user-info"> <span class="username"><i class="fa fa-user fa-fw"></i><a href="#a"><?=$item['TENDANGNHAP']?></a></span>
            <p><?=$item['NOIDUNG']?></p>
            <span class="pull-right"><?=date('d-m-Y',strtotime($item['THOIGIAN']))?></span>
          </div>
        </div>
        <!-- end: Comment Box --> 
        <?php } } ?>                                  
      </div>
      
      <!-- end: Comments -->
      <div class="clearfix f-space30"></div> 

      <div class="pull-right">
        <ul class="pagination pagination-xs">
          <li><a href="<?=base_url()?>tintuc?id=<?=$chitiettintuc[0]['ID']?>&page=1"><i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i></a></li>              
          <li class="<?php if(($page-1)<1) echo 'disabled';?>"><a href="<?=base_url()?>tintuc?id=<?=$chitiettintuc[0]['ID']?>&page=<?=$page-1?>"><i class="fa fa-angle-left"></i></a></li>              
          <?php for($i=1; $i<=ceil($tongbinhluantintuc[0]['SOLUONG']/5); $i++) { ?>
          <li <?php if ($i==$page) echo 'class="active"'; ?>><a href="<?=base_url()?>tintuc?id=<?=$chitiettintuc[0]['ID']?>&page=<?=$i?>"><?=$i?></a></li>          
          <?php } ?>
          <li class="<?php if(($page+1)>(ceil($tongbinhluantintuc[0]['SOLUONG']/5))) echo 'disabled';?>"><a href="<?=base_url()?>tintuc?id=<?=$chitiettintuc[0]['ID']?>&page=<?=$page+1?>"><i class="fa fa-angle-right"></i></a></li>
          <li><a href="<?=base_url()?>tintuc?id=<?=$chitiettintuc[0]['ID']?>&page=<?=ceil($tongbinhluantintuc[0]['SOLUONG']/5)?>"><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></a></li>
        </ul>
      </div>

      <div class="clearfix f-space30"></div>      
      
      <div class="box-content clearfix"> 
          <?php if ($Login==1) { ?>
          <div class="comment-reply"> <span class="title">Bình luận của bạn</span>
          <form action="" id="comment_form" method="post">            
            <div class="col-md-12">
              <textarea form="comment_form" name="noidung" id="noidung" rows="7" cols="60" placeholder="Nội dung bình luận..."></textarea>
            </div>
            <div class="col-md-8"> <span class="instruction"> Không đăng bình luận vi phạm nội dung. Bạn có thể sử dụng các thẻ HTML và các thuộc tính: &lt;a href="" title=""&gt; &lt;abbr title=""&gt; &lt;acronym title=""&gt; &lt;b&gt; &lt;blockquote cite=""&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=""&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=""&gt; &lt;strike&gt; &lt;strong&gt; </span></div>
            <div class="col-md-4">
              <button form="comment_form" class="btn medium color2 pull-right" type="submit">Đăng bình luận</button>
            </div>
          </form>
          </div>
          <?php } else { ?> 
            <center><div class="comment-reply"> <span class="title">Đăng nhập để bình luận cho bài viết này!</span>
            <form id="login" method="post" action="<?=base_url()?>dangnhap?redirect=<?=urlencode($_SERVER["REQUEST_URI"])?>">                          
              <input form="login" type="text" id="username" name="username" placeholder="Tên đăng nhập hoặc số điện thoại" class="input4">                        
              <input form="login" type="password" id="password" name="password" placeholder="Mật khẩu" class="input4">              
              <label class="checkbox pull-left" for="remember">
                <input form="login" type="checkbox" id="remember" name="remember" value="1" data-toggle="checkbox" class="pull-left">
                <span class="pull-left">Ghi nhớ đăng nhập</span> </label>
              <button class="btn medium color2 pull-right" type="submit" form="login">Đăng nhập</button>              
            </form>
            </div>
            </center>
          <?php } ?>
      </div>      
      
    </div>
    <!--   end: Single Post --> 
    
    <!-- side bar -->
    <?php $this->load->view('home/sidebar',$this->data); ?>
    <!-- end:sidebar --> 
  </div>
  <!-- end:row --> 
</div>
<!-- end: container-->