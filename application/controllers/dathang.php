<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class dathang extends Public_Controller {

	public function __construct(){
		parent:: __construct();
		$this->data['page_title'] = 'Đặt hàng';
		$this->data['page_link'] = 'dathang';
		$this->data['page_title2'] = 0;
		$this->data['page_link2'] = 0;
		$this->data['page_type'] = 0;
		$this->data['subpage_title'] = 0;
		$this->data['subpage_link'] = 0;		
	}

	public function index()
	{		
		if ($this->cart->total() > 0)
		{				
			if(!isset($_POST["hoten_gh"])||$_POST["hoten_gh"]==""||!isset($_POST["sdt_gh"])||$_POST["sdt_gh"]==""||!isset($_POST["dc_gh"])||$_POST["dc_gh"]==""||!isset($_POST["ptvc"])||!isset($_POST["pttt"])||strlen($_POST["hoten_gh"])<2||strlen($_POST["sdt_gh"])<10||strlen($_POST["sdt_gh"])>13||!is_numeric($_POST["sdt_gh"])||strlen($_POST["sdt_gh"])<10)
			{
				$this->data['noti'] = FALSE;
				if((isset($_POST["hoten_gh"])&&$_POST["hoten_gh"]=="")||(isset($_POST["sdt_gh"])&&$_POST["sdt_gh"]=="")||(isset($_POST["dc_gh"])&&$_POST["dc_gh"]==""))
					$this->data['noti'] = TRUE;			
				if ($this->data['Login']==1)
					$this->data['tttt']	= $this->nguoidung_model->get_userinfo($this->data['UserID']);
				$this->load->view('home/header',$this->data);					
				$this->load->view('home/breadcrum',$this->data);		
				$this->load->view('home/dathang',$this->data);
				$this->load->view('home/footer',$this->data);
				$this->data['noti'] = FALSE;
			}
			else
			{
				$Hodem = $this->input->post('hodem',TRUE);
				$Ten = $this->input->post('tenkhachhang',TRUE);
				$Tenkhachhang = $Hodem.' '.$Ten;
				$Sdt = $this->input->post('sdt',TRUE);
				$Ten_gh = $this->input->post('hoten_gh',TRUE);
				$Diachi_gh = $this->input->post('dc_gh',TRUE);
				$Sdt_gh = $this->input->post('sdt_gh',TRUE);
				$Pttt = $this->input->post('pttt',TRUE);
				$Ptvc = $this->input->post('ptvc',TRUE);
				$Thanhtien = $this->cart->total();
				$Danhsach = $this->cart->contents();				
				$tmp = $this->thongtindathang_model->create_order($Tenkhachhang,$Sdt,$Ten_gh,$Diachi_gh,$Sdt_gh,$Pttt,$Ptvc,$Thanhtien,$Danhsach);			
				if ($tmp)
				{
					$this->data['MDH'] = $tmp;
					$this->cart->destroy();
					$this->load->view('home/header',$this->data);					
					$this->load->view('home/breadcrum',$this->data);
					$this->load->view('home/dathangthanhcong',$this->data);						
					$this->load->view('home/footer',$this->data);
				}
			}		
		}
		else
		{			
			return redirect(base_url('giohang'));
		}
	}	
}