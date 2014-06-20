<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class sanpham extends Public_Controller {	

	public function __construct(){
		parent:: __construct();						
	}

	public function index()
	{
		return redirect(base_url());
	}
	
	public function chitiet()
	{
		$id = $this->input->get("id");

		if(!is_numeric($id)||$id<1)
		{ 	
			return redirect(base_url('error'));
		}
				
		$this->data['sanpham'] = $this->public_model->sanpham($id);
		
		if (isset($_POST["rating"])&&isset($_POST["review"])&&$_POST["review"]!="")
		{
			$tmp = $this->danhgia_model->insert($this->data['sanpham'][0]['MADANHGIA'],$id, $_POST["rating"]*2, $_POST["review"]);
		}

		if (isset($_POST["comment"])&&$_POST["comment"]!="")
		{
			$tmp = $this->binhluan_model->insert($id, $_POST["comment"]);
		}

		if($this->data['sanpham'])
		{	
			// Dành cho phần đánh giá
			$page = $this->input->get("page");			
			if (!$page)
				$page = 1;
			$this->data['page'] = $page;
			$page = ($page - 1)*5;
			$this->data['danhgiasanpham'] = $this->public_model->danhgiasanpham($id);
			$this->data['chitietdanhgia'] = $this->public_model->chitietdanhgia($id,$page);
			$this->data['tongdanhgia'] = $this->public_model->tongdanhgia($id);			
			$this->data['ktdanhgia'] = $this->public_model->ktdanhgia($id,$this->data['UserID']);

			// Dành cho phần bình luận
			$comment = $this->input->get("comment");
			if (!$comment)
				$comment = 1;
			$this->data['comment'] = $comment;
			$comment = ($comment - 1)*5;
			$this->data['binhluansanpham'] = $this->public_model->binhluansanpham($id,$comment);			
			$this->data['tongbinhluan'] = $this->public_model->tongbinhluan($id);						

			$this->data['chitietsanpham'] = $this->public_model->chitietsanpham($id);
			$this->data['subpage_title'] = $this->data['sanpham'][0]['TENSANPHAM'];
			$this->data['subpage_link'] = 'sanpham/chitiet?id='.$this->data['sanpham'][0]['ID'];			

			$this->data['page_type'] = 0;			
			$this->data['page_title'] = 0;
			$this->data['page_link'] = 0;
			$this->data['page_title2'] = 0;
			$this->data['page_link2'] = 0;		

			$this->load->view('home/header',$this->data);			
			$this->load->view('home/breadcrum',$this->data);			
			$this->load->view('home/sanpham',$this->data);
			$this->load->view('home/footer',$this->data);					
		}							
		else
		{ 				
			return redirect(base_url('error'));
		}
	}	

	public function maytinhbang($ncc = "FALSE"){	
		$this->loaisanpham(1,'Máy tính bảng','maytinhbang',$ncc);
	}

	public function maytinhxachtay($ncc = "FALSE"){		
		$this->loaisanpham(2,'Máy tính xách tay','maytinhxachtay',$ncc);
	}

	public function maytinhdeban($ncc = "FALSE"){		
		$this->loaisanpham(3,'Máy tính để bàn','maytinhdeban',$ncc);
	}	

	public function phukien($ncc = "FALSE"){		
		$this->loaisanpham(0,'Phụ kiện','phukien',$ncc);
	}

	public function acer($loaisanpham = "FALSE"){		
		$this->nhacungcap(1,'ACER','acer',$loaisanpham);
	}

	public function asus($loaisanpham = "FALSE"){		
		$this->nhacungcap(2,'ASUS','asus',$loaisanpham);
	}

	public function dell($loaisanpham = "FALSE"){		
		$this->nhacungcap(3,'DELL','dell',$loaisanpham);
	}

	public function hp($loaisanpham = "FALSE"){		
		$this->nhacungcap(4,'HP','hp',$loaisanpham);
	}

	public function sony($loaisanpham = "FALSE"){		
		$this->nhacungcap(5,'SONY','sony',$loaisanpham);
	}

	public function toshiba($loaisanpham = "FALSE"){		
		$this->nhacungcap(6,'TOSHIBA','toshiba',$loaisanpham);
	}

	public function apple($loaisanpham = "FALSE"){		
		$this->nhacungcap(7,'APPLE','apple',$loaisanpham);
	}

	public function lenovo($loaisanpham = "FALSE"){		
		$this->nhacungcap(8,'LENOVO','lenovo',$loaisanpham);
	}

	public function samsung($loaisanpham = "FALSE"){		
		$this->nhacungcap(9,'SAMSUNG','samsung',$loaisanpham);
	}	

	public function nhacungcap($ncc,$tennhacungcap,$name,$loai)
	{
	
		$loai2 = $loai;
		if ($loai!=FALSE)
		{
			switch ($loai) {
				case 'maytinhbang':
				{
					$tenloai = 'Máy tính bảng';
					$loai = 1;
					break;
				}	
				case 'maytinhxachtay':
				{
					$tenloai = 'Máy tính xách tay';
					$loai = 2;
					break;
				}
				case 'maytinhdeban':
				{
					$tenloai = 'Máy tính để bàn';
					$loai = 3;
					break;
				}
				case 'phukien':
				{
					$tenloai = 'Phụ kiện';
					$loai = 4;
					break;
				}								
				default:
					$loai = FALSE;
					break;
			}
		}	

		$this->data['page_title'] = $tennhacungcap;
		$this->data['page_link'] = 'sanpham/'.$name;
		if (!$loai)
		{
			$this->data['page_title2'] = 0;
			$this->data['page_link2'] = 0;
		}
		else
		{
			$this->data['page_title2'] = $tenloai;
			$this->data['page_link2'] = $loai2;
		}
		$this->data['page_type'] = 0;
		$this->data['subpage_title'] = 0;
		$this->data['subpage_link'] = 0;

		// Số sản phẩm hiển thị trên 1 trang							
		if($this->session->userdata($name.'_perpage')==FALSE)
			$this->session->set_userdata($name.'_perpage', '6');					
		else
		{
			$perpage = $this->input->get("perpage");			
			if($perpage) 
			{
				$this->session->set_userdata($name.'_perpage', $perpage);
				$this->session->set_userdata($name.'_page', '1');								
			}
		}
		$this->data[$name.'_perpage'] = $this->session->userdata($name.'_perpage');
		// Sắp xếp theo bộ lọc
		if($this->session->userdata($name.'_sortby')==FALSE)
			$this->session->set_userdata($name.'_sortby', 'time');					
		else
		{
			$sortby = $this->input->get("sortby");
			if($sortby) 
			{							
				$this->session->set_userdata($name.'_sortby', $sortby);							
				$this->session->set_userdata($name.'_page', '1');
			}
		}
		$this->data[$name.'_sortby'] = $this->session->userdata($name.'_sortby');
		// Hiển thị dạng danh sách hoặc lưới
		if($this->session->userdata($name.'_viewby')==FALSE)
			$this->session->set_userdata($name.'_viewby', 'grid');					
		else
		{
			$viewby = $this->input->get("viewby");
			if($viewby) $this->session->set_userdata($name.'_viewby', $viewby);							
		}
		$this->data[$name.'_viewby'] = $this->session->userdata($name.'_viewby');				
		// Đánh dấu trang hiện tại
		if($this->session->userdata($name.'_page')==FALSE)
			$this->session->set_userdata($name.'_page', '1');					
		else
		{
			$page = $this->input->get("page");
			if($page) $this->session->set_userdata($name.'_page', $page);							
		}
		$this->data[$name.'_page'] = $this->session->userdata($name.'_page');			

		$this->data[$name.'_previous'] = $this->data[$name.'_page'] - 1;
		$this->data[$name.'_next'] = $this->data[$name.'_page'] + 1;
								
		$this->data['soluong'] = $this->public_model->get_soluongncc($ncc);
		$this->data['tongspncc'] =	$this->public_model->get_tongspncc($ncc,$loai);
		$this->data['get_sanpham_ncc']	= $this->public_model->get_sanpham_ncc($this->data[$name.'_perpage'],$this->data[$name.'_sortby'],$this->data[$name.'_page'],$loai,$ncc);			

		$public_data = array('name' => $name, 'loai' => $loai, 'loai2' => $loai2, 'tennhacungcap' => $tennhacungcap, 'perpage' => $this->data[$name.'_perpage'], 'sortby' => $this->data[$name.'_sortby'], 'viewby' => $this->data[$name.'_viewby'], 'page' => $this->data[$name.'_page'], 'previous' => $this->data[$name.'_previous'], 'next' => $this->data[$name.'_next']);		
		$this->data['public_data'] = $public_data;		

		$this->load->view('home/header',$this->data);			
		$this->load->view('home/breadcrum',$this->data);
		$this->load->view('home/loaisanpham2',$this->data);					
		$this->load->view('home/footer',$this->data);

		$this->session->set_userdata($name.'_page', '1');		
	}

	public function loaisanpham($loai,$tenloai,$name,$ncc)
	{		
		$ncc2 = $ncc;
		if ($ncc!=FALSE)
		{
			switch ($ncc) {
				case 'acer':
					$ncc = 1;
					$tenncc = 'ACER';
					break;
				case 'asus':
					$ncc = 2;
					$tenncc = 'ASUS';
					break;
				case 'dell':
					$ncc = 3;
					$tenncc = 'DELL';
					break;
				case 'hp':
					$ncc = 4;
					$tenncc = 'HP';
					break;
				case 'sony':
					$ncc = 5;
					$tenncc = 'SONY';
					break;
				case 'toshiba':
					$ncc = 6;
					$tenncc = 'T';
					break;
				case 'apple':
					$ncc = 7;
					$tenncc = 'APPLE';
					break;
				case 'lenovo':
					$ncc = 8;
					$tenncc = 'LENOVO';
					break;
				case 'samsung':
					$ncc = 9;
					$tenncc = 'SAMSUNG';
					break;
				case 'khac':
					$ncc = 0;
					$tenncc = 'Khác';
					break;				
				default:
					$ncc = FALSE;
					break;
			}
		}

		$this->data['page_title'] = $tenloai;
		$this->data['page_link'] = 'sanpham/'.$name;
		if (!$ncc)
		{
			$this->data['page_title2'] = 0;
			$this->data['page_link2'] = 0;
		}
		else
		{
			$this->data['page_title2'] = $tenncc;
			$this->data['page_link2'] = $ncc2;
		}
		$this->data['page_type'] = 0;
		$this->data['subpage_title'] = 0;
		$this->data['subpage_link'] = 0;				
		// Số sản phẩm hiển thị trên 1 trang							
		if($this->session->userdata($name.'_perpage')==FALSE)
			$this->session->set_userdata($name.'_perpage', '6');					
		else
		{
			$perpage = $this->input->get("perpage");			
			if($perpage) 
			{
				$this->session->set_userdata($name.'_perpage', $perpage);
				$this->session->set_userdata($name.'_page', '1');								
			}
		}
		$this->data[$name.'_perpage'] = $this->session->userdata($name.'_perpage');
		// Sắp xếp theo bộ lọc
		if($this->session->userdata($name.'_sortby')==FALSE)
			$this->session->set_userdata($name.'_sortby', 'time');					
		else
		{
			$sortby = $this->input->get("sortby");
			if($sortby) 
			{							
				$this->session->set_userdata($name.'_sortby', $sortby);							
				$this->session->set_userdata($name.'_page', '1');
			}
		}
		$this->data[$name.'_sortby'] = $this->session->userdata($name.'_sortby');
		// Hiển thị dạng danh sách hoặc lưới
		if($this->session->userdata($name.'_viewby')==FALSE)
			$this->session->set_userdata($name.'_viewby', 'grid');					
		else
		{
			$viewby = $this->input->get("viewby");
			if($viewby) $this->session->set_userdata($name.'_viewby', $viewby);							
		}
		$this->data[$name.'_viewby'] = $this->session->userdata($name.'_viewby');				
		// Đánh dấu trang hiện tại
		if($this->session->userdata($name.'_page')==FALSE)
			$this->session->set_userdata($name.'_page', '1');					
		else
		{
			$page = $this->input->get("page");
			if($page) $this->session->set_userdata($name.'_page', $page);							
		}
		$this->data[$name.'_page'] = $this->session->userdata($name.'_page');			

		$this->data[$name.'_previous'] = $this->data[$name.'_page'] - 1;
		$this->data[$name.'_next'] = $this->data[$name.'_page'] + 1;
								
		$this->data['soluong'] = $this->public_model->get_soluongloai($loai);
		$this->data['tongsploai'] =	$this->public_model->get_tongsploai($loai,$ncc);
		$this->data['get_sanpham_loai']	= $this->public_model->get_sanpham_loai($this->data[$name.'_perpage'],$this->data[$name.'_sortby'],$this->data[$name.'_page'],$loai,$ncc);			

		$public_data = array('name' => $name, 'ncc' => $ncc, 'ncc2' => $ncc2, 'tenloai' => $tenloai, 'perpage' => $this->data[$name.'_perpage'], 'sortby' => $this->data[$name.'_sortby'], 'viewby' => $this->data[$name.'_viewby'], 'page' => $this->data[$name.'_page'], 'previous' => $this->data[$name.'_previous'], 'next' => $this->data[$name.'_next']);		
		$this->data['public_data'] = $public_data;		

		$this->load->view('home/header',$this->data);			
		$this->load->view('home/breadcrum',$this->data);
		$this->load->view('home/loaisanpham1',$this->data);					
		$this->load->view('home/footer',$this->data);

		$this->session->set_userdata($name.'_page', '1');		
	}
}