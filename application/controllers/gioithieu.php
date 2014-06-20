<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class gioithieu extends Public_Controller {

	public function __construct(){
		parent:: __construct();
		$this->data['page_title'] = 'Giới thiệu';
		$this->data['page_link'] = 'gioithieu';	
		$this->data['page_title2'] = 0;
		$this->data['page_link2'] = 0;
		$this->data['page_type'] = 0;
		$this->data['subpage_title'] = 0;
		$this->data['subpage_link'] = 0;					
	}

	public function index()
	{
		$this->load->view('home/header',$this->data);					
		$this->load->view('home/breadcrum',$this->data);
		$this->load->view('home/gioithieu',$this->data);
		$this->load->view('home/footer',$this->data);
	}
}