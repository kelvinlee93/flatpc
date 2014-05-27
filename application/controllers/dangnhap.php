<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class dangnhap extends CI_Controller{

	public $data;

	function __construct(){
		parent:: __construct();
		$this->data['loi'] = "";		
	}

	function index($reg = ""){			
		if(isset($reg) && $reg != "")
			$this->data['success'] = "Đăng ký thành công! Mời bạn đăng nhập...";
		$this->data['title'] = 'Đăng nhập';
		$this->data['page'] = 'login';		
		$chk = $this->chucnang->ktdangnhap();		
		if($chk==1||$chk==2)
		{
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
				$role = $this->chucnang->GetUserRole();																				
				if ($role == 0)
					return redirect(base_url());
				else return redirect(base_url('admin'));
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
				
				$this->load->view('dangnhap',$this->data);
			}
	}

}