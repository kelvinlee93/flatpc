<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class timkiem extends Public_Controller{

	public $data;

	function __construct(){
		parent:: __construct();
		$this->data['page_title'] = 'Tìm kiếm';
		$this->data['page_link'] = 'timkiem';
		$this->data['page_title2'] = 0;
		$this->data['page_link2'] = 0;
		$this->data['page_type'] = 0;
		$this->data['subpage_title'] = 0;
		$this->data['subpage_link'] = 0;
	}

	public function index()
	{
		$loaisanpham = $this->input->get("loaisanpham");
		if (!is_numeric($loaisanpham))
			$loaisanpham = 'all';
		elseif ($loaisanpham<0||$loaisanpham>3)
			$loaisanpham = 'all';
		$ncc = $this->input->get("ncc");
		if (!$ncc)
			$ncc = 'all';
		$gia = $this->input->get("gia");
		if (!$gia)
			$gia = 'all';
		$sapxep = $this->input->get("sapxep");
		if (!$sapxep)
			$sapxep = 'all';		
		$hienthi = $this->input->get("hienthi");
		if (!$hienthi)
			$hienthi = 'all';
		$page = $this->input->get("page");
		if (!$page||!is_numeric($page)||$page<1)
			$page = 1;

		$keyword = $this->input->get("keyword");

		$this->data['timkiem_tongsp'] = $this->public_model->timkiem_tongsp($loaisanpham,$ncc,$gia,$keyword);		
		$this->data['timkiem_getsp'] = $this->public_model->timkiem_getsp($loaisanpham,$ncc,$gia,$sapxep,$hienthi,$keyword,$page);
		$this->data['timkiem_info'] = array('loaisanpham' => $loaisanpham, 'ncc' => $ncc, 'gia' => $gia, 'sapxep' => $sapxep, 'hienthi' => $hienthi, 'keyword' => $keyword);
		$this->data['page'] = $page;							

		$this->load->view('home/header',$this->data);					
		$this->load->view('home/breadcrum',$this->data);
		$this->load->view('home/timkiem',$this->data);
		$this->load->view('home/footer',$this->data);
	}
}