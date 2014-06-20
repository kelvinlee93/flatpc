<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends Public_Controller {

	public function __construct(){
		parent:: __construct();
		$this->data['page_title'] = 'FlatPC - Siêu thị máy tính trực tuyến';
		$this->data['page_link'] = 'trangchu';
		$this->data['page_title2'] = 0;
		$this->data['page_link2'] = 0;
		$this->data['page_type'] = 0;
		$this->data['subpage_title'] = 0;
		$this->data['subpage_link'] = 0;			
	}

	public function index()
	{	
		$this->load->view('home/header',$this->data);					
		$this->load->view('home/index',$this->data);
		$this->load->view('home/footer',$this->data);	
	}

	public function lienhe()
	{
		$this->load->view('home/header',$this->data);					
		$this->load->view('home/breadcrum',$this->data);
		$this->load->view('home/lienhe',$this->data);
		$this->load->view('home/footer',$this->data);
	}	
}