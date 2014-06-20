<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class dangnhap extends CI_Controller{

	public $data;

	function __construct(){
		parent:: __construct();
		$this->data['loi'] = "";		
	}

	function index(){						
		$this->data['title'] = 'Đăng nhập';
		$this->data['page'] = 'login';
		$redirect_url = base_url(urldecode($this->input->get("redirect")));					
		$chk = $this->chucnang->ktdangnhap();		
		if($chk==1||$chk==2)
		{
			$capnhat = $this->input->get("capnhat");
			if ($capnhat)
			{
				$this->session->set_userdata('taikhoan_updateinfo', '2');
				return redirect(base_url('taikhoan'));
			}
			$role = $this->chucnang->GetUserRole();
			if ($role == 0)
				return redirect(base_url());
			else return redirect(base_url('admin'));
		}


		if(isset($_POST['username'])&&isset($_POST['password']))
		{																	
			if(isset($_POST['remember'])&&$_POST['remember']=='1') 
			{				
				$this->session->sess_expire_on_close = FALSE;				
			}					         
			
			$arr = array('username'=>$this->input->post('username'),'password'=>$this->input->post('password'));					
			$tmp = $this->chucnang->dangnhap($arr);	

			if($tmp==1)
			{
				if ($redirect_url)
					redirect($redirect_url, 'location', 301);
				else															
					redirect($_SERVER['HTTP_REFERER'], 'location', 301);
				$redirect_url = FALSE;
			}
			else
			{
				switch($tmp)
				{			
					case -2 : $loi = 'Lỗi không xác định, vui lòng thử lại!'; break;	
					case -3 : $loi = 'Tên đăng nhập không tồn tại'; break;
					case -4 : $loi = 'Mật khẩu chưa đúng'; break;
					case -5 : $loi = 'Tài khoản không hoạt động'; break;					
					case -6 : $loi = 'Tên đăng nhập hoặc mật khẩu chưa đúng'; break;
					case -7 : $loi = 'Bạn không có quyền truy cập'; break;
					default: $loi = ''; break;
				}
				if($_POST['username']==NULL&&$_POST['password']==NULL)
					$loi = 'Chưa nhập tên đăng nhập hoặc mật khẩu';				
				$this->data['loi'] = $loi;
				$this->data['dangky'] = 0;				
				$this->load->view('dangnhap',$this->data);
			}
		}
		else 
			{
				$dangky = $this->input->get("dangky");
				if ($dangky=="thanhcong")
					$this->data['dangky'] = 1;
				else $this->data['dangky'] = 0;
				$dangky = $this->input->get("capnhat");
				if ($dangky)
					$this->data['dangky'] = 2;				
				$this->load->view('dangnhap',$this->data);
			}
	}

}