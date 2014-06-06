<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class sanpham extends Public_Controller {

	public function __construct(){
		parent:: __construct();						
	}

	public function chitiet()
	{
		$id = $this->input->get("id");

		if(!is_numeric($id)||$id<1)
		{ 	
			return redirect(base_url('error'));
		}
				
		$this->data['sanpham'] = $this->public_model->sanpham($id);
		
		if($this->data['sanpham'])
		{	
			$this->data['danhgiasanpham'] = $this->public_model->danhgiasanpham($id);
			$this->data['chitietsanpham'] = $this->public_model->chitietsanpham($id);
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

	public function maytinhbang()
	{
		// Số sản phẩm hiển thị trên 1 trang							
		if($this->session->userdata('maytinhbang_perpage')==FALSE)
			$this->session->set_userdata('maytinhbang_perpage', '6');					
		else
		{
			$perpage = $this->input->get("perpage");
			if($perpage) 
			{
				$this->session->set_userdata('maytinhbang_perpage', $perpage);
				$this->session->set_userdata('maytinhbang_page', '1');								
			}
		}
		$this->data['maytinhbang_perpage'] = $this->session->userdata('maytinhbang_perpage');
		// Sắp xếp theo bộ lọc
		if($this->session->userdata('maytinhbang_sortby')==FALSE)
			$this->session->set_userdata('maytinhbang_sortby', 'time');					
		else
		{
			$sortby = $this->input->get("sortby");
			if($sortby) 
			{							
				$this->session->set_userdata('maytinhbang_sortby', $sortby);							
				$this->session->set_userdata('maytinhbang_page', '1');
			}
		}
		$this->data['maytinhbang_sortby'] = $this->session->userdata('maytinhbang_sortby');
		// Hiển thị dạng danh sách hoặc lưới
		if($this->session->userdata('maytinhbang_viewby')==FALSE)
			$this->session->set_userdata('maytinhbang_viewby', 'grid');					
		else
		{
			$viewby = $this->input->get("viewby");
			if($viewby) $this->session->set_userdata('maytinhbang_viewby', $viewby);							
		}
		$this->data['maytinhbang_viewby'] = $this->session->userdata('maytinhbang_viewby');				
		// Đánh dấu trang hiện tại
		if($this->session->userdata('maytinhbang_page')==FALSE)
			$this->session->set_userdata('maytinhbang_page', '1');					
		else
		{
			$page = $this->input->get("page");
			if($page) $this->session->set_userdata('maytinhbang_page', $page);							
		}
		$this->data['maytinhbang_page'] = $this->session->userdata('maytinhbang_page');			

		$this->data['maytinhbang_previous'] = $this->data['maytinhbang_page'] - 1;
		$this->data['maytinhbang_next'] = $this->data['maytinhbang_page'] + 1;
		
		$this->data['tenloai'] = 'Máy tính bảng';
		$loai = 1;
		$this->data['soluong'] = $this->public_model->get_soluongloai($loai);
		$this->data['tongsploai'] =	$this->public_model->get_tongsploai($loai);
		$this->data['get_sanpham_loai']	= $this->public_model->get_sanpham_loai($this->data['maytinhbang_perpage'],$this->data['maytinhbang_sortby'],$this->data['maytinhbang_page'],$loai);			
		
		$this->load->view('home/header',$this->data);			
		$this->load->view('home/breadcrum',$this->data);
		$this->load->view('home/loaisanpham1',$this->data);					
		$this->load->view('home/footer',$this->data);

		$this->session->set_userdata('maytinhbang_page', '1');
	}
}