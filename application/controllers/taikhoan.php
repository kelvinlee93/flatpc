<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class taikhoan extends Public_Controller {

	public function __construct(){
		parent:: __construct();		
	}

	public function index()
	{	
		$check = $this->chucnang->ktdangnhap();		
		if($check == 1 || $check == 2 )
		{			
			$this->data['page_title'] = 'Tài khoản';
			$this->data['page_link'] = 'taikhoan';
			$this->data['page_type'] = 0;
			$this->data['page_title2'] = 0;
			$this->data['page_link2'] = 0;
			$this->data['subpage_title'] = 0;
			$this->data['subpage_link'] = 0;

			$this->load->view('home/header',$this->data);			
			$this->load->view('home/breadcrum',$this->data);			
			$this->load->view('home/taikhoan',$this->data);
			$this->load->view('home/footer',$this->data);
		}
		else
			return redirect(base_url('dangnhap'));
	}

	public function doithongtin()
	{
		$check = $this->chucnang->ktdangnhap();		
		if($check == 1 || $check == 2 )
		{						
			$config = array(	
		               array(
		                     'field'   => 'hodem', 
		                     'label'   => 'Họ đệm', 
		                     'rules'   => 'trim|required|xss_clean|min_length[2]|max_length[20]'
		                  ),
		               array(
		                     'field'   => 'ten', 
		                     'label'   => 'Tên', 
		                     'rules'   => 'trim|required|xss_clean|min_length[2]|max_length[20]'
		                  ),
		               array(
		                     'field'   => 'tendangnhap', 
		                     'label'   => 'Tên đăng nhập', 
		                     'rules'   => 'trim|required|xss_clean|min_length[6]|alpha_dash|max_length[32]'
		                  ),
		               array(
		                     'field'   => 'tendangnhap2', 
		                     'label'   => 'Tên đăng nhập', 
		                     'rules'   => 'trim|required|xss_clean|min_length[6]|alpha_dash|is_unique[NGUOIDUNG.TENDANGNHAP]|is_unique[NGUOIDUNG.SDT]|max_length[32]'
		                  ),
		               array(
		                     'field'   => 'email', 
		                     'label'   => 'Email', 
		                     'rules'   => 'trim|required|valid_email'
		                  ),
		               array(
		                     'field'   => 'email2', 
		                     'label'   => 'Email', 
		                     'rules'   => 'trim|required|valid_email|is_unique[NGUOIDUNG.EMAIL]'
		                  ),		               
		               array(
		                     'field'   => 'birth', 
		                     'label'   => 'Ngày sinh', 
		                     'rules'   => 'trim|required|callback_ktngaysinh'
		                  ),		               		               		               
		               array(
		                     'field'   => 'cmnd', 
		                     'label'   => 'Chứng minh nhân dân', 
		                     'rules'   => 'numeric|exact_length[9]'
		                  ),
		               array(
		                     'field'   => 'sdt', 
		                     'label'   => 'Số điện thoại', 
		                     'rules'   => 'numeric|max_length[13]|min_length[10]'
		                  )		               
		            );
			
			$this->form_validation->set_rules($config);
			$this->form_validation->set_message('required', '%s không được trống');
			$this->form_validation->set_message('is_unique', '%s đã được sử dụng');					
			$this->form_validation->set_message('matches', 'Nhập lại mật khẩu chưa đúng');
			$this->form_validation->set_message('valid_email', 'Địa chỉ email không hợp lệ');	
			$this->form_validation->set_message('max_length', '%s quá dài');
			$this->form_validation->set_message('min_length', '%s quá ngắn');		
			$this->form_validation->set_message('numeric', 'Vui lòng chỉ nhập số');
			$this->form_validation->set_message('alpha_dash', 'Tên đăng nhập không hợp lệ');
			$this->form_validation->set_message('exact_length', 'Vui lòng nhập chính xác 9 chữ số CMND');

			$this->form_validation->set_error_delimiters('<div class="content-heading" style="color: red"><strong>', '</strong></div>');

			if ($this->form_validation->run() == FALSE)
			{				
				$this->data['userinfo'] = $this->public_model->get_userinfo();
				$this->data['page_title'] = 'Tài khoản';
				$this->data['page_link'] = 'taikhoan';
				$this->data['page_type'] = 0;
				$this->data['page_title2'] = 'Đổi thông tin';
				$this->data['page_link2'] = 'doithongtin';
				$this->data['subpage_title'] = 0;
				$this->data['subpage_link'] = 0;				

				$this->load->view('home/header',$this->data);			
				$this->load->view('home/breadcrum',$this->data);			
				$this->load->view('home/doithongtin',$this->data);
				$this->load->view('home/footer',$this->data);
			}
			else
			{				
				$Hodem = $this->input->post('hodem',TRUE);
				$Ten = $this->input->post('ten',TRUE);
				$Tendangnhap = $this->input->post('tendangnhap',TRUE);
				$Tendangnhap2 = $this->input->post('tendangnhap2',TRUE);										
				$Email = $this->input->post('email',TRUE);
				$Email2 = $this->input->post('email2',TRUE);						
				$Ngaysinh = $this->input->post('birth',TRUE);
				$Ngaysinh = date('Y-m-d', strtotime($Ngaysinh));				
				$Gioitinh = $this->input->post('gioitinh',TRUE);						
				$Diachi = $this->input->post('diachi',TRUE);
				$CMND = $this->input->post('cmnd',TRUE);
				$SDT = $this->input->post('sdt',TRUE);
				if ($Tendangnhap2!=md5($SDT))
					$Tendangnhap = $Tendangnhap2;
				if (substr($Email2, 0, 32)!=md5($SDT))
					$Email = $Email2;								

				$tmp = $this->nguoidung_model->update($Hodem,$Ten,$Tendangnhap,$Email,$Ngaysinh,$Diachi,$Gioitinh,$CMND,$SDT);
						
				if($tmp)
				{												
					return redirect(base_url('dangnhap?capnhat=thanhcong'));
				}							
				else
				{ 
					$this->session->set_userdata('taikhoan_updateinfo', '3');
					return redirect(base_url('taikhoan'));
				}
			}		
		}
		else
			return redirect(base_url('dangnhap'));			
	}

	public function doimatkhau()
	{
		$check = $this->chucnang->ktdangnhap();		
		if($check == 1 || $check == 2 )
		{						
			$config = array(	
	           array(
	                 'field'   => 'matkhaucu', 
	                 'label'   => 'Mật khẩu cũ', 
	                 'rules'   => 'required|callback_ktmatkhaucu'
	              ),
	           array(
	                 'field'   => 'matkhaumoi', 
	                 'label'   => 'Mật khẩu mới', 
	                 'rules'   => 'required|max_length[20]|min_length[6]|callback_ktmatkhau'
	              ),	               
	           array(
	                 'field'   => 'rematkhau', 
	                 'label'   => 'Nhập lại mật khẩu', 
	                 'rules'   => 'required|matches[matkhaumoi]'
	              )
	        );

			$this->form_validation->set_rules($config);
			$this->form_validation->set_message('required', '%s không được bỏ trống');
			$this->form_validation->set_message('max_length', '%s không quá 20 ký tự');
			$this->form_validation->set_message('min_length', '%s không thể ít hơn 6 ký tự');
			$this->form_validation->set_message('matches', 'Nhập lại mật khẩu chưa đúng');			

			$this->form_validation->set_error_delimiters('<div class="content-heading" style="color: red"><strong>', '</strong></div>');

			if ($this->form_validation->run() == FALSE)
			{				
				$this->data['userinfo'] = $this->public_model->get_userinfo();
				$this->data['page_title'] = 'Tài khoản';
				$this->data['page_link'] = 'taikhoan';
				$this->data['page_type'] = 0;
				$this->data['page_title2'] = 'Đổi đổi mật khẩu';
				$this->data['page_link2'] = 'doimatkhau';
				$this->data['subpage_title'] = 0;
				$this->data['subpage_link'] = 0;				

				$this->load->view('home/header',$this->data);			
				$this->load->view('home/breadcrum',$this->data);			
				$this->load->view('home/doimatkhau',$this->data);
				$this->load->view('home/footer',$this->data);
			}
			else
			{								
				$Matkhaumoi = $this->input->post('matkhaumoi',TRUE);
				$Id = $this->data['UserID'];

				$tmp = $this->nguoidung_model->doimatkhau($Id, $Matkhaumoi);									
						
				if($tmp)
				{												
					$this->session->set_userdata('taikhoan_updateinfo', '2');
					return redirect(base_url('taikhoan'));
				}							
				else
				{ 
					$this->session->set_userdata('taikhoan_updateinfo', '3');
					return redirect(base_url('taikhoan'));
				}
			}		
		}
		else
			return redirect(base_url('dangnhap'));			
	}

	public function lichsudathang()
	{
		$check = $this->chucnang->ktdangnhap();		
		if($check == 1 || $check == 2 )
		{			
			$id = $this->input->get("id");
			if ($id)
			{
				if (!is_numeric($id)||$id<1)
						return redirect(base_url('taikhoan/lichsudathang'));

				$this->data['thongtindathang'] = $this->public_model->thongtindathang($id);
				$this->data['danhsachdathang'] = $this->public_model->danhsachdathang($id);

				if(!$this->data['thongtindathang']||!$this->data['danhsachdathang'])
					return redirect(base_url('taikhoan/lichsudathang'));

				$this->data['page_title'] = 'Tài khoản';
				$this->data['page_link'] = 'taikhoan';
				$this->data['page_type'] = 0;
				$this->data['page_title2'] = 'Lịch sử đặt hàng';
				$this->data['page_link2'] = 'lichsudathang';
				$this->data['subpage_title'] = 0;
				$this->data['subpage_link'] = 0;

				$this->load->view('home/header',$this->data);			
				$this->load->view('home/breadcrum',$this->data);			
				$this->load->view('home/chitietdathang',$this->data);			
				$this->load->view('home/footer',$this->data);
			}
			else
			{				

				$this->data['lichsudathang'] = $this->public_model->get_lichsudathang();							

				$this->data['page_title'] = 'Tài khoản';
				$this->data['page_link'] = 'taikhoan';
				$this->data['page_type'] = 0;
				$this->data['page_title2'] = 'Lịch sử đặt hàng';
				$this->data['page_link2'] = 'lichsudathang';
				$this->data['subpage_title'] = 0;
				$this->data['subpage_link'] = 0;

				$this->load->view('home/header',$this->data);			
				$this->load->view('home/breadcrum',$this->data);			
				$this->load->view('home/lichsudathang',$this->data);			
				$this->load->view('home/footer',$this->data);
			}
		}
		else
			return redirect(base_url('dangnhap'));			
	}

	public function lichsumuahang()
	{
		$check = $this->chucnang->ktdangnhap();		
		if($check == 1 || $check == 2 )
		{			
			$id = $this->input->get("id");
			if ($id)
			{
				if (!is_numeric($id)||$id<1)
						return redirect(base_url('taikhoan/lichsumuahang'));

				$this->data['thongtinmuahang'] = $this->public_model->thongtinmuahang($id);
				$this->data['danhsachmuahang'] = $this->public_model->danhsachmuahang($id);

				if(!$this->data['thongtinmuahang']||!$this->data['danhsachmuahang'])
					return redirect(base_url('taikhoan/lichsumuahang'));

				$this->data['page_title'] = 'Tài khoản';
				$this->data['page_link'] = 'taikhoan';
				$this->data['page_type'] = 0;
				$this->data['page_title2'] = 'Lịch sử mua hàng';
				$this->data['page_link2'] = 'lichsumuahang';
				$this->data['subpage_title'] = 0;
				$this->data['subpage_link'] = 0;

				$this->load->view('home/header',$this->data);			
				$this->load->view('home/breadcrum',$this->data);			
				$this->load->view('home/chitietmuahang',$this->data);			
				$this->load->view('home/footer',$this->data);
			}
			else
			{
				$page = $this->input->get("page");
					if (!$page||!is_numeric($page)||$page<1)
						$page = 1;

				$this->data['lichsumuahang'] = $this->public_model->get_lichsumuahang();				
				$this->data['page'] = $page;

				$this->data['page_title'] = 'Tài khoản';
				$this->data['page_link'] = 'taikhoan';
				$this->data['page_type'] = 0;
				$this->data['page_title2'] = 'Lịch sử mua hàng';
				$this->data['page_link2'] = 'lichsumuahang';
				$this->data['subpage_title'] = 0;
				$this->data['subpage_link'] = 0;

				$this->load->view('home/header',$this->data);			
				$this->load->view('home/breadcrum',$this->data);			
				$this->load->view('home/lichsumuahang',$this->data);			
				$this->load->view('home/footer',$this->data);
			}
		}
		else
			return redirect(base_url('dangnhap'));			
	}

	public function ktngaysinh($input){					
		$ngay = explode("-",$input);

		if (count($ngay)!=3)
		{			
			$this->form_validation->set_message('ktngaysinh', 'Ngày sinh không hợp lệ');
    		return FALSE;
		}		
    	elseif (checkdate($ngay[1],$ngay[0],$ngay[2]))
    	{			    		
    		if ((date("Y")-$ngay[2])>6) return TRUE;
    		else 
    		{
    			$this->form_validation->set_message('ktngaysinh', 'Chưa đủ tuổi');
    			return FALSE;
    		}
    	} 			    	
    	else 
    	{    		
			$this->form_validation->set_message('ktngaysinh', 'Ngày sinh không hợp lệ');
    		return FALSE;
    	}
    }

    public function ktmatkhau($matkhau){
	    if (preg_match("/^[0-9A-Za-z!@#$%]+$/", $matkhau)) return TRUE;
    	else 
    	{
			$this->form_validation->set_message('ktmatkhau', 'Mật khẩu không hợp lệ');
    		return FALSE;
    	}
	} 
	
	public function ktmatkhaucu($matkhau){
		$matkhau = md5($matkhau);		
		$tmp = $this->nguoidung_model->kt_matkhaucu($matkhau);	
	    if ($tmp) return TRUE;
    	else 
    	{
			$this->form_validation->set_message('ktmatkhaucu', 'Mật khẩu cũ không đúng');
    		return FALSE;
    	}		
	}	
}