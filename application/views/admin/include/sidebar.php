<!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a href="<?=base_url()?>admin" <?php if($page=='dashboard') echo 'class="active"'?>>
                          <i class="icon-dashboard"></i>
                          <span>Bảng thông tin</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" <?php if($page=='user') echo 'class="active"'?>>
                          <i class="icon-user"></i>
                          <span>Người dùng</span>                      
                      </a>
                      <ul class="sub">
                          <li <?php if($subpage=='user-manage'||$subpage=='user-edit') echo 'class="active"'?>><a href="<?=base_url()?>admin/nguoidung">Quản lý</a></li>
                          <li <?php if($subpage=='user-add') echo 'class="active"'?>><a href="<?=base_url()?>admin/nguoidung/them">Thêm mới</a></li>                          
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" <?php if($page=='product') echo 'class="active"'?>>
                          <i class="icon-desktop"></i>
                          <span>Sản phẩm</span>
                      </a>
                      <ul class="sub">
                          <li <?php if($subpage=='product-manage'||$subpage=='product-edit') echo 'class="active"'?>><a href="<?=base_url()?>admin/sanpham">Quản lý</a></li>
                          <li <?php if($subpage=='product-add') echo 'class="active"'?>><a href="<?=base_url()?>admin/sanpham/them">Thêm mới</a></li>
                          <li <?php if($subpage=='product-import-manage') echo 'class="active"'?>><a href="<?=base_url()?>admin/sanpham/quanlynhaphang">Nhập hàng</a></li>                          
                      </ul>                      
                  </li>

                  <li class="sub-menu">
                      <a href="<?=base_url()?>admin/hoadon" <?php if($page=='invoice') echo 'class="active"'?>>
                          <i class="icon-file-text"></i>
                          <span>Hóa đơn</span>
                      </a>                      
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" <?php if($page=='order') echo 'class="active"'?>>
                          <i class="icon-list"></i>
                          <span>Đặt hàng</span>
                      </a>
                      <ul class="sub">
                          <li <?php if($subpage=='order-manage') echo 'class="active"'?>><a href="<?=base_url()?>admin/dathang">Quản lý</a></li>
                          <li <?php if($subpage=='order-add') echo 'class="active"'?>><a href="<?=base_url()?>admin/dathang/them">Thêm mới</a></li>                          
                      </ul>                      
                  </li>
                  <li class="sub-menu">
                      <a href="<?=base_url()?>admin/tintuc" <?php if($page=='news') echo 'class="active"'?>>
                          <i class="icon-rss"></i>
                          <span>Tin tức</span>                      
                      </a>
                      <ul class="sub">
                          <li <?php if($subpage=='news-manage'||$subpage=='news-edit') echo 'class="active"'?>><a href="<?=base_url()?>admin/tintuc">Quản lý</a></li>
                          <li <?php if($subpage=='news-add') echo 'class="active"'?>><a href="<?=base_url()?>admin/tintuc/them">Thêm mới</a></li>                          
                          <li <?php if($subpage=='news-comment') echo 'class="active"'?>><a href="<?=base_url()?>admin/tintuc/binhluan">Bình luận</a></li>                          
                      </ul>                      
                  </li>
                  <li class="sub-menu">
                      <a href="<?=base_url()?>admin/binhluan" <?php if($page=='comment') echo 'class="active"'?>>
                          <i class="icon-comment"></i>
                          <span>Bình luận</span>
                      </a>                      
                  </li>
                  <li>
                      <a  href="<?=base_url()?>admin/danhgia" <?php if($page=='rating') echo 'class="active"'?>>
                          <i class="icon-thumbs-up"></i>
                          <span>Đánh giá</span>                          
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a target="_blank" href="<?=base_url()?>">
                          <i class="icon-home"></i>
                          <span>Xem trang web</span>
                      </a>                      
                  </li>   
                  <li class="sub-menu">
                      <a href="<?=base_url()?>dangxuat">
                          <i class="icon-signout"></i>
                          <span>Đăng xuất</span>
                      </a>                      
                  </li>                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->