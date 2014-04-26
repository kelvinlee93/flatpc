<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class admin extends CI_Controller{
	
	public $data;

	public function index()
	{
		$this->data['title'] = 'Bảng thông tin';
		$this->data['page'] = 'bangthongtin';
		$this->load->view('admin/include/header',$this->data);
		$this->load->view('admin/include/sidebar',$this->data);
		$this->load->view('admin/home/index',$this->data);
		$this->load->view('admin/include/footer',$this->data);
	}
}