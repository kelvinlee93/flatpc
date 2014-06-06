<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class giohang extends Public_Controller {

	public function __construct(){
		parent:: __construct();		
	}

	public function index()
	{
		$this->load->view('home/header',$this->data);			
		$this->load->view('home/breadcrum',$this->data);			
		$this->load->view('home/giohang',$this->data);
		$this->load->view('home/footer',$this->data);
	}

	function add()
	{		
		$data = array(
               'id'      => $this->input->post('id',TRUE),
               'qty'     => 1,
               'price'   => $this->input->post('price',TRUE),
               'name'    => $this->input->post('name',TRUE),
               'img'    => $this->input->post('img',TRUE),               
               'type'    => $this->input->post('type',TRUE),               
               'ncc'    => $this->input->post('ncc',TRUE),               
            );	   
                 		
		$this->cart->insert($data);

		redirect($_SERVER['HTTP_REFERER'], 'location', 301);
	}

	function update()
	{
		$cart_update = $this->input->post('update',TRUE);
		$cart_delete = $this->input->post('delete',TRUE);
		if ($cart_update)
		{
			$data = array(
	               'rowid' => $this->input->post('rowid',TRUE),
	               'qty'   => $this->input->post('p_quantity',TRUE),
	            );		
			$this->cart->update($data);
		}
		if ($cart_delete)
		{
			$data = array(
	               'rowid' => $this->input->post('rowid',TRUE),
	               'qty'   => 0,
	            );		
			$this->cart->update($data);
		} 				
		redirect($_SERVER['HTTP_REFERER'], 'location', 301);
	}

	function huy()
	{
		$this->cart->destroy();
		redirect($_SERVER['HTTP_REFERER'], 'location', 301);		
	}	
}