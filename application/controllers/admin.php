<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class admin extends CI_Controller{
	
	public $data;

	function __construct(){
		parent:: __construct();							
		$this->data['Username'] = $this->chucnang->getLoginUsername();  
		$this->data['Name'] = $this->chucnang->GetName();
		$this->data['UserID'] = $this->chucnang->GetUserID();
		$this->data['Role'] = $this->chucnang->GetUserRole();
		$this->data['Avatar'] = $this->chucnang->GetAvatar();
	}	

	// Trang chủ

	public function index(){
		$check = $this->chucnang->ktdangnhap();		
		if($check == 1 || $check == 2 )
		{			
			$role = $this->data['Role'];
			if($role == 0)
				return redirect(base_url());
			else{								
				$this->data['title'] = 'Bảng thông tin';
				$this->data['page'] = 'dashboard';
				$this->data['subpage'] = 'dashboard';

				$this->load->view('admin/include/header',$this->data);
				$this->load->view('admin/include/sidebar',$this->data);									
				$this->load->view('admin/home/index',$this->data);				
				$this->load->view('admin/include/footer',$this->data);	
			}
		}
		else
			return redirect(base_url('dangnhap'));	
	}

	// Quản lý người dùng

	function nguoidung($chucnang = "xem"){
		$check = $this->chucnang->ktdangnhap();		
		if($check == 1 || $check == 2 )
		{
			$role = $this->data['Role'];
			if($role == 0)
				return redirect(base_url());
			else{												
				if($chucnang == "xem")
				{									
					$this->data['title'] = 'Người dùng';
					$this->data['page'] = 'user';
					$this->data['subpage'] = 'user-manage';
					if($this->session->userdata('nguoidung_action')==FALSE){
						$this->session->set_userdata('nguoidung_action', '1');
						$this->data['nguoidung_action'] = $this->session->userdata('nguoidung_action');
					}
					else $this->data['nguoidung_action'] = $this->session->userdata('nguoidung_action');	
					$this->session->set_userdata('nguoidung_action', '1');

					$this->data['result'] = $this->nguoidung_model->get_nguoidung();
						
					$this->load->view('admin/include/header',$this->data);
					$this->load->view('admin/include/sidebar',$this->data);									
					$this->load->view('admin/nguoidung/index',$this->data);				
					$this->load->view('admin/include/footer',$this->data);					
				}
				elseif ($chucnang == "them") {					
					$this->data['title'] = 'Thêm người dùng';
					$this->data['page'] = 'user';
					$this->data['subpage'] = 'user-add';					
					
					$config = array(	
		               array(
		                     'field'   => 'firstname', 
		                     'label'   => 'Họ đệm', 
		                     'rules'   => 'trim|required|xss_clean|min_length[2]|max_length[20]'
		                  ),
		               array(
		                     'field'   => 'lastname', 
		                     'label'   => 'Tên', 
		                     'rules'   => 'trim|required|xss_clean|min_length[2]|max_length[20]'
		                  ),
		               array(
		                     'field'   => 'username', 
		                     'label'   => 'Tên đăng nhập', 
		                     'rules'   => 'trim|required|xss_clean|min_length[6]|alpha_dash|is_unique[NGUOIDUNG.TENDANGNHAP]|max_length[20]'
		                  ),
		               array(
		                     'field'   => 'email', 
		                     'label'   => 'Email', 
		                     'rules'   => 'trim|required|valid_email|is_unique[NGUOIDUNG.EMAIL]'
		                  ),
		               array(
		                     'field'   => 'password', 
		                     'label'   => 'Mật khẩu', 
		                     'rules'   => 'required|max_length[20]|min_length[6]|callback_ktmatkhau'
		                  ),
		               array(
		                     'field'   => 'confirm_password', 
		                     'label'   => 'Nhập lại mật khẩu', 
		                     'rules'   => 'required|matches[password]'
		                  ),
		               array(
		                     'field'   => 'birth', 
		                     'label'   => 'Ngày sinh', 
		                     'rules'   => 'trim|required|callback_ktngaysinh'
		                  ),		               
		               array(
		                     'field'   => 'city', 
		                     'label'   => 'tỉnh thành', 
		                     'rules'   => 'callback_kttinhthanh'
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
					$this->form_validation->set_message('max_length', '%s quá dài');
					$this->form_validation->set_message('min_length', '%s quá ngắn');
					$this->form_validation->set_message('valid_email', 'Địa chỉ email không hợp lệ');	
					$this->form_validation->set_message('alpha_dash', 'Tên đăng nhập không hợp lệ');
					$this->form_validation->set_message('numeric', 'Vui lòng chỉ nhập số');
					$this->form_validation->set_message('exact_length', 'Vui lòng nhập chính xác 9 chữ số CMND');

					$this->form_validation->set_error_delimiters('<label class="control-label col-lg-6" style="color: red"><strong>', '</strong></label>');

					$this->setting =  array(
		                  'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/static/img/",
		                  'upload_url'      => base_url()."static/img",
		                  'allowed_types'   => "gif|jpg|png|jpeg",                  
		                  'max_size'        => 2048,
		                  'max_height'      => 768,
		                  'max_width'       => 1024  
	                );        			        
				    $this->load->library('upload', $this->setting);
					
					if ($this->form_validation->run() == FALSE){
						$this->data['tinhthanh'] = $this->nguoidung_model->get_tinhthanh();
						$this->load->view('admin/include/header',$this->data);
						$this->load->view('admin/include/sidebar',$this->data);									
						$this->load->view('admin/nguoidung/insert',$this->data);				
						$this->load->view('admin/include/footer',$this->data);
					}			
					else{	
						$Hodem = $this->input->post('firstname',TRUE);
						$Ten = $this->input->post('lastname',TRUE);
						$Tendangnhap = $this->input->post('username',TRUE);
						$Matkhau = $this->input->post('password',TRUE);
						$Email = $this->input->post('email',TRUE);						
						$Ngaysinh = $this->input->post('birth',TRUE);
						$Ngaysinh = date('Y-m-d', strtotime($Ngaysinh));
						$Diachi = $this->input->post('address',TRUE);
						$Tinhthanh = $this->input->post('city',TRUE);
						$Gioitinh = $this->input->post('sex',TRUE);						
						$CMND = $this->input->post('cmnd',TRUE);
						$SDT = $this->input->post('sdt',TRUE);
						$Quyen = $this->input->post('role',TRUE);
						$Trangthai = $this->input->post('status',TRUE);						
		                $Anhdaidien = 6;		                

				        if($this->upload->do_upload('avatar'))
				        {			            	
		                	$img_data = array('upload_data' => $this->upload->data());
		                	$Anhdaidien = $img_data['upload_data']['orig_name'];		                			                			                
				        }				        		                					       

						$tmp = $this->nguoidung_model->insert($Hodem, $Ten, $Tendangnhap, $Matkhau, $Email, $Ngaysinh, $Diachi, $Tinhthanh, $Gioitinh, $CMND, $SDT, $Quyen, $Trangthai, $Anhdaidien);
						
						if($tmp)
						{							
							$this->session->set_userdata('nguoidung_action', '2');														
							return redirect(base_url('admin/nguoidung'));
						}							
						else
						{ 
							$this->session->set_userdata('nguoidung_action', '3');
							return redirect(base_url('admin/nguoidung'));
						}
					}					
				}
				elseif ($chucnang == "doithongtin") {
					$id = $this->input->get("id");																				
					if(!is_numeric($id)||$id<1)
					{ 
						$this->session->set_userdata('nguoidung_action', '3');
						return redirect(base_url('admin/nguoidung'));
					}				

					$this->data['title'] = 'Đổi thông tin người dùng';
					$this->data['page'] = 'user';
					$this->data['subpage'] = 'user-edit';					
					
					$config = array(	
		               array(
		                     'field'   => 'firstname', 
		                     'label'   => 'Họ đệm', 
		                     'rules'   => 'trim|required|xss_clean|min_length[2]|max_length[20]'
		                  ),
		               array(
		                     'field'   => 'lastname', 
		                     'label'   => 'Tên', 
		                     'rules'   => 'trim|required|xss_clean|min_length[2]|max_length[20]'
		                  ),		               		              
		               array(
		                     'field'   => 'password', 
		                     'label'   => 'Mật khẩu', 
		                     'rules'   => 'max_length[20]|min_length[6]|callback_ktmatkhau'
		                  ),		               
		               array(
		                     'field'   => 'birth', 
		                     'label'   => 'Ngày sinh', 
		                     'rules'   => 'trim|required|callback_ktngaysinh'
		                  ),		               
		               array(
		                     'field'   => 'city', 
		                     'label'   => 'tỉnh thành', 
		                     'rules'   => 'callback_kttinhthanh'
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
					$this->form_validation->set_message('max_length', '%s quá dài');
					$this->form_validation->set_message('min_length', '%s quá ngắn');										
					$this->form_validation->set_message('numeric', 'Vui lòng chỉ nhập số');
					$this->form_validation->set_message('exact_length', 'Vui lòng nhập chính xác 9 chữ số CMND');

					$this->form_validation->set_error_delimiters('<label class="control-label col-lg-6" style="color: red"><strong>', '</strong></label>');

					$this->setting =  array(
		                  'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/static/img/",
		                  'upload_url'      => base_url()."static/img",
		                  'allowed_types'   => "gif|jpg|png|jpeg",                  
		                  'max_size'        => 2048,
		                  'max_height'      => 768,
		                  'max_width'       => 1024  
	                );        			        
				    $this->load->library('upload', $this->setting);

					if ($this->form_validation->run() == FALSE)
					{
						$this->data['result'] = $this->nguoidung_model->get_userinfo($id);						
						if($this->data['result']==FALSE)
						{
							$this->session->set_userdata('nguoidung_action', '3');
							return redirect(base_url('admin/nguoidung'));
						}
						$this->data['tinhthanh'] = $this->nguoidung_model->get_tinhthanh();
						$this->load->view('admin/include/header',$this->data);
						$this->load->view('admin/include/sidebar',$this->data);									
						$this->load->view('admin/nguoidung/edit',$this->data);				
						$this->load->view('admin/include/footer',$this->data);
					}
					else
					{
						$Hodem = $this->input->post('firstname',TRUE);
						$Ten = $this->input->post('lastname',TRUE);
						$Tendangnhap = $this->input->post('username',TRUE);
						$Matkhau = $this->input->post('password',TRUE);
						if($Matkhau)
							$Matkhau = do_hash($Matkhau,'md5');
						else
						{
							$Matkhau_old = $this->input->post('password_old',TRUE);
							$Matkhau = $Matkhau_old;
						}						
						$Email = $this->input->post('email',TRUE);						
						$Ngaysinh = $this->input->post('birth',TRUE);
						$Ngaysinh = date('Y-m-d', strtotime($Ngaysinh));
						$Diachi = $this->input->post('address',TRUE);
						$Tinhthanh = $this->input->post('city',TRUE);
						$Gioitinh = $this->input->post('sex',TRUE);						
						$CMND = $this->input->post('cmnd',TRUE);
						$SDT = $this->input->post('sdt',TRUE);
						$Quyen = $this->input->post('role',TRUE);
						$Trangthai = $this->input->post('status',TRUE);						
		                $Anhdaidien = $this->input->post('avatar_old',TRUE);

				        if($this->upload->do_upload('avatar'))
				        {			            	
		                	$img_data = array('upload_data' => $this->upload->data());
		                	$Anhdaidien = $img_data['upload_data']['orig_name'];		                			                			                
				        }				        				        		                					        

						$tmp = $this->nguoidung_model->edit($id, $Hodem, $Ten, $Tendangnhap, $Matkhau, $Email, $Ngaysinh, $Diachi, $Tinhthanh, $Gioitinh, $CMND, $SDT, $Quyen, $Trangthai, $Anhdaidien);
						
						if($tmp)
						{							
							$this->session->set_userdata('nguoidung_action', '2');														
							return redirect(base_url('admin/nguoidung'));
						}							
						else
						{ 
							$this->session->set_userdata('nguoidung_action', '3');
							return redirect(base_url('admin/nguoidung'));
						}
					}						
				}
				elseif ($chucnang == "dongtaikhoan") {
						$id = $this->input->get("id");																				
						if(!is_numeric($id)||$id<1)
						{ 
							$this->session->set_userdata('nguoidung_action', '3');
							return redirect(base_url('admin/nguoidung'));
						}												
						$tmp = $this->nguoidung_model->dongtaikhoan($id);
						if($tmp)
						{
							$this->session->set_userdata('nguoidung_action', '2');
							return redirect(base_url('admin/nguoidung'));													
						}							
						else
						{ 
							$this->session->set_userdata('nguoidung_action', '3');						
							return redirect(base_url('admin/nguoidung'));
						}
				}
				elseif ($chucnang == "motaikhoan") {
						$id = $this->input->get("id");																				
						if(!is_numeric($id)||$id<1)
						{ 
							$this->session->set_userdata('nguoidung_action', '3');
							return redirect(base_url('admin/nguoidung'));
						}												
						$tmp = $this->nguoidung_model->motaikhoan($id);
						if($tmp)
						{
							$this->session->set_userdata('nguoidung_action', '2');
							return redirect(base_url('admin/nguoidung'));													
						}							
						else
						{ 
							$this->session->set_userdata('nguoidung_action', '3');						
							return redirect(base_url('admin/nguoidung'));
						}					
				}												
			}
		}
		else
			return redirect(base_url('dangnhap'));
	}

	// Quản lý tin tức

	function tintuc($chucnang = "xem"){
		$check = $this->chucnang->ktdangnhap();		
		if($check == 1 || $check == 2 )
		{
			$role = $this->data['Role'];
			if($role == 0)
				return redirect(base_url());
			else{																
				if($chucnang == "xem")
				{									
					$this->data['title'] = 'Tin tức';
					$this->data['page'] = 'news';
					$this->data['subpage'] = 'news-manage';
					if($this->session->userdata('tintuc_action')==FALSE){
						$this->session->set_userdata('tintuc_action', '1');
						$this->data['tintuc_action'] = $this->session->userdata('tintuc_action');
					}
					else $this->data['tintuc_action'] = $this->session->userdata('tintuc_action');	
					$this->session->set_userdata('tintuc_action', '1');

					$this->data['result'] = $this->tintuc_model->get_tintuc();
						
					$this->load->view('admin/include/header',$this->data);
					$this->load->view('admin/include/sidebar',$this->data);									
					$this->load->view('admin/tintuc/index',$this->data);				
					$this->load->view('admin/include/footer',$this->data);					
				}
				elseif ($chucnang == "them"){
					$this->data['title'] = 'Thêm tin tức';
					$this->data['page'] = 'news';
					$this->data['subpage'] = 'news-add';					
					
					$config = array(	
		               array(
		                     'field'   => 'firstname', 
		                     'label'   => 'Họ đệm', 
		                     'rules'   => 'trim|required|xss_clean|min_length[2]|max_length[20]'
		                  ),
		               array(
		                     'field'   => 'lastname', 
		                     'label'   => 'Tên', 
		                     'rules'   => 'trim|required|xss_clean|min_length[2]|max_length[20]'
		                  ),
		               array(
		                     'field'   => 'username', 
		                     'label'   => 'Tên đăng nhập', 
		                     'rules'   => 'trim|required|xss_clean|min_length[6]|alpha_dash|is_unique[NGUOIDUNG.TENDANGNHAP]|max_length[20]'
		                  ),
		               array(
		                     'field'   => 'email', 
		                     'label'   => 'Email', 
		                     'rules'   => 'trim|required|valid_email|is_unique[NGUOIDUNG.EMAIL]'
		                  ),
		               array(
		                     'field'   => 'password', 
		                     'label'   => 'Mật khẩu', 
		                     'rules'   => 'required|max_length[20]|min_length[6]|callback_ktmatkhau'
		                  ),
		               array(
		                     'field'   => 'confirm_password', 
		                     'label'   => 'Nhập lại mật khẩu', 
		                     'rules'   => 'required|matches[password]'
		                  ),
		               array(
		                     'field'   => 'birth', 
		                     'label'   => 'Ngày sinh', 
		                     'rules'   => 'trim|required|callback_ktngaysinh'
		                  ),		               
		               array(
		                     'field'   => 'city', 
		                     'label'   => 'tỉnh thành', 
		                     'rules'   => 'callback_kttinhthanh'
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
					$this->form_validation->set_message('max_length', '%s quá dài');
					$this->form_validation->set_message('min_length', '%s quá ngắn');
					$this->form_validation->set_message('valid_email', 'Địa chỉ email không hợp lệ');	
					$this->form_validation->set_message('alpha_dash', 'Tên đăng nhập không hợp lệ');
					$this->form_validation->set_message('numeric', 'Vui lòng chỉ nhập số');
					$this->form_validation->set_message('exact_length', 'Vui lòng nhập chính xác 9 chữ số CMND');

					$this->form_validation->set_error_delimiters('<label class="control-label col-lg-6" style="color: red"><strong>', '</strong></label>');

					$this->setting =  array(
		                  'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/static/img/",
		                  'upload_url'      => base_url()."static/img",
		                  'allowed_types'   => "gif|jpg|png|jpeg",                  
		                  'max_size'        => 2048,
		                  'max_height'      => 768,
		                  'max_width'       => 1024  
	                );        			        
				    $this->load->library('upload', $this->setting);
					
					if ($this->form_validation->run() == FALSE){
						$this->data['tinhthanh'] = $this->nguoidung_model->get_tinhthanh();
						$this->load->view('admin/include/header',$this->data);
						$this->load->view('admin/include/sidebar',$this->data);									
						$this->load->view('admin/nguoidung/insert',$this->data);				
						$this->load->view('admin/include/footer',$this->data);
					}			
					else{	
						$Hodem = $this->input->post('firstname',TRUE);
						$Ten = $this->input->post('lastname',TRUE);
						$Tendangnhap = $this->input->post('username',TRUE);
						$Matkhau = $this->input->post('password',TRUE);
						$Email = $this->input->post('email',TRUE);						
						$Ngaysinh = $this->input->post('birth',TRUE);
						$Ngaysinh = date('Y-m-d', strtotime($Ngaysinh));
						$Diachi = $this->input->post('address',TRUE);
						$Tinhthanh = $this->input->post('city',TRUE);
						$Gioitinh = $this->input->post('sex',TRUE);						
						$CMND = $this->input->post('cmnd',TRUE);
						$SDT = $this->input->post('sdt',TRUE);
						$Quyen = $this->input->post('role',TRUE);
						$Trangthai = $this->input->post('status',TRUE);						
		                $Anhdaidien = 6;		                

				        if($this->upload->do_upload('avatar'))
				        {			            	
		                	$img_data = array('upload_data' => $this->upload->data());
		                	$Anhdaidien = $img_data['upload_data']['orig_name'];		                			                			                
				        }				        		                					       

						$tmp = $this->nguoidung_model->insert($Hodem, $Ten, $Tendangnhap, $Matkhau, $Email, $Ngaysinh, $Diachi, $Tinhthanh, $Gioitinh, $CMND, $SDT, $Quyen, $Trangthai, $Anhdaidien);
						
						if($tmp)
						{							
							$this->session->set_userdata('nguoidung_action', '2');														
							return redirect(base_url('admin/nguoidung'));
						}							
						else
						{ 
							$this->session->set_userdata('nguoidung_action', '3');
							return redirect(base_url('admin/nguoidung'));
						}
					}					
				}
				elseif ($chucnang == "doithongtin") {
					$id = $this->input->get("id");																				
					if(!is_numeric($id)||$id<1)
					{ 
						$this->session->set_userdata('nguoidung_action', '3');
						return redirect(base_url('admin/nguoidung'));
					}				

					$this->data['title'] = 'Đổi thông tin người dùng';
					$this->data['page'] = 'user';
					$this->data['subpage'] = 'user-edit';					
					
					$config = array(	
		               array(
		                     'field'   => 'firstname', 
		                     'label'   => 'Họ đệm', 
		                     'rules'   => 'trim|required|xss_clean|min_length[2]|max_length[20]'
		                  ),
		               array(
		                     'field'   => 'lastname', 
		                     'label'   => 'Tên', 
		                     'rules'   => 'trim|required|xss_clean|min_length[2]|max_length[20]'
		                  ),		               		              
		               array(
		                     'field'   => 'password', 
		                     'label'   => 'Mật khẩu', 
		                     'rules'   => 'max_length[20]|min_length[6]|callback_ktmatkhau'
		                  ),		               
		               array(
		                     'field'   => 'birth', 
		                     'label'   => 'Ngày sinh', 
		                     'rules'   => 'trim|required|callback_ktngaysinh'
		                  ),		               
		               array(
		                     'field'   => 'city', 
		                     'label'   => 'tỉnh thành', 
		                     'rules'   => 'callback_kttinhthanh'
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
					$this->form_validation->set_message('max_length', '%s quá dài');
					$this->form_validation->set_message('min_length', '%s quá ngắn');										
					$this->form_validation->set_message('numeric', 'Vui lòng chỉ nhập số');
					$this->form_validation->set_message('exact_length', 'Vui lòng nhập chính xác 9 chữ số CMND');

					$this->form_validation->set_error_delimiters('<label class="control-label col-lg-6" style="color: red"><strong>', '</strong></label>');

					$this->setting =  array(
		                  'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/static/img/",
		                  'upload_url'      => base_url()."static/img",
		                  'allowed_types'   => "gif|jpg|png|jpeg",                  
		                  'max_size'        => 2048,
		                  'max_height'      => 768,
		                  'max_width'       => 1024  
	                );        			        
				    $this->load->library('upload', $this->setting);

					if ($this->form_validation->run() == FALSE)
					{
						$this->data['result'] = $this->nguoidung_model->get_userinfo($id);						
						if($this->data['result']==FALSE)
						{
							$this->session->set_userdata('nguoidung_action', '3');
							return redirect(base_url('admin/nguoidung'));
						}
						$this->data['tinhthanh'] = $this->nguoidung_model->get_tinhthanh();
						$this->load->view('admin/include/header',$this->data);
						$this->load->view('admin/include/sidebar',$this->data);									
						$this->load->view('admin/nguoidung/edit',$this->data);				
						$this->load->view('admin/include/footer',$this->data);
					}
					else
					{
						$Hodem = $this->input->post('firstname',TRUE);
						$Ten = $this->input->post('lastname',TRUE);
						$Tendangnhap = $this->input->post('username',TRUE);
						$Matkhau = $this->input->post('password',TRUE);
						if($Matkhau)
							$Matkhau = do_hash($Matkhau,'md5');
						else
						{
							$Matkhau_old = $this->input->post('password_old',TRUE);
							$Matkhau = $Matkhau_old;
						}						
						$Email = $this->input->post('email',TRUE);						
						$Ngaysinh = $this->input->post('birth',TRUE);
						$Ngaysinh = date('Y-m-d', strtotime($Ngaysinh));
						$Diachi = $this->input->post('address',TRUE);
						$Tinhthanh = $this->input->post('city',TRUE);
						$Gioitinh = $this->input->post('sex',TRUE);						
						$CMND = $this->input->post('cmnd',TRUE);
						$SDT = $this->input->post('sdt',TRUE);
						$Quyen = $this->input->post('role',TRUE);
						$Trangthai = $this->input->post('status',TRUE);						
		                $Anhdaidien = $this->input->post('avatar_old',TRUE);

				        if($this->upload->do_upload('avatar'))
				        {			            	
		                	$img_data = array('upload_data' => $this->upload->data());
		                	$Anhdaidien = $img_data['upload_data']['orig_name'];		                			                			                
				        }				        				        		                					        

						$tmp = $this->nguoidung_model->edit($id, $Hodem, $Ten, $Tendangnhap, $Matkhau, $Email, $Ngaysinh, $Diachi, $Tinhthanh, $Gioitinh, $CMND, $SDT, $Quyen, $Trangthai, $Anhdaidien);
						
						if($tmp)
						{							
							$this->session->set_userdata('nguoidung_action', '2');														
							return redirect(base_url('admin/nguoidung'));
						}							
						else
						{ 
							$this->session->set_userdata('nguoidung_action', '3');
							return redirect(base_url('admin/nguoidung'));
						}
					}						
				}
				elseif ($chucnang == "dongtaikhoan") {
						$id = $this->input->get("id");																				
						if(!is_numeric($id)||$id<1)
						{ 
							$this->session->set_userdata('nguoidung_action', '3');
							return redirect(base_url('admin/nguoidung'));
						}												
						$tmp = $this->nguoidung_model->dongtaikhoan($id);
						if($tmp)
						{
							$this->session->set_userdata('nguoidung_action', '2');
							return redirect(base_url('admin/nguoidung'));													
						}							
						else
						{ 
							$this->session->set_userdata('nguoidung_action', '3');						
							return redirect(base_url('admin/nguoidung'));
						}
				}
				elseif ($chucnang == "motaikhoan") {
						$id = $this->input->get("id");																				
						if(!is_numeric($id)||$id<1)
						{ 
							$this->session->set_userdata('nguoidung_action', '3');
							return redirect(base_url('admin/nguoidung'));
						}												
						$tmp = $this->nguoidung_model->motaikhoan($id);
						if($tmp)
						{
							$this->session->set_userdata('nguoidung_action', '2');
							return redirect(base_url('admin/nguoidung'));													
						}							
						else
						{ 
							$this->session->set_userdata('nguoidung_action', '3');						
							return redirect(base_url('admin/nguoidung'));
						}					
				}												
			}
		}
		else
			return redirect(base_url('dangnhap'));
	}

	// Quản lý bình luận

	function binhluan($chucnang = "xem"){
		$check = $this->chucnang->ktdangnhap();		
		if($check == 1 || $check == 2 )
		{			
			$role = $this->data['Role'];
			if($role == 0)
				return redirect(base_url());
			else
			{								
				$this->data['title'] = 'Bình luận';
				$this->data['page'] = 'comment';
				$this->data['subpage'] = 'comment-manage';

				if($chucnang == "xem")
				{
					if($this->session->userdata('binhluan_action')==FALSE){
						$this->session->set_userdata('binhluan_action', '1');
						$this->data['binhluan_action'] = $this->session->userdata('binhluan_action');
					}
					else $this->data['binhluan_action'] = $this->session->userdata('binhluan_action');	
					$this->session->set_userdata('binhluan_action', '1');

					$this->data['result'] = $this->binhluan_model->get_binhluan();					

					$this->load->view('admin/include/header',$this->data);
					$this->load->view('admin/include/sidebar',$this->data);									
					$this->load->view('admin/binhluan/index',$this->data);				
					$this->load->view('admin/include/footer',$this->data);	
				}
				elseif($chucnang == "capnhat")
				{
					$id = $this->input->get("id");																				
					if(!is_numeric($id)||$id<1)
					{ 
						$this->session->set_userdata('danhgia_action', '3');
						return redirect(base_url('admin/binhluan'));
					}				

					$this->data['title'] = 'Cập nhật bình luận';
					$this->data['page'] = 'comment';
					$this->data['subpage'] = 'comment-edit';

					if (!isset($_POST["product_name"]))
					{
						$this->data['result'] = $this->binhluan_model->get_binhluaninfo($id);						
						if($this->data['result']==FALSE)
						{
							$this->session->set_userdata('binhluan_action', '3');
							return redirect(base_url('admin/binhluan'));
						}
						
						$this->load->view('admin/include/header',$this->data);
						$this->load->view('admin/include/sidebar',$this->data);									
						$this->load->view('admin/binhluan/edit',$this->data);				
						$this->load->view('admin/include/footer',$this->data);
					}
					else
					{						
						$Tenkhachhang = $this->input->post('customer_name',TRUE);
						$Email = $this->input->post('email',TRUE);
						$Noidung = $this->input->post('content',TRUE);												
						$Thoigian = $this->input->post('cmt_time',TRUE);						
						$Thoigian = date('Y-m-d H:i:s', strtotime($Thoigian)); 																									        		        				        		                					        
						
						$tmp = $this->binhluan_model->update_binhluan($id, $Tenkhachhang, $Email, $Noidung, $Thoigian);
						
						if($tmp)
						{							
							$this->session->set_userdata('binhluan_action', '2');														
							return redirect(base_url('admin/binhluan'));
						}							
						else
						{ 
							$this->session->set_userdata('binhluan_action', '3');
							return redirect(base_url('admin/binhluan'));
						}
					}
				}
				elseif ($chucnang == "xoa") {
						$id = $this->input->get("id");																				
						if(!is_numeric($id)||$id<1)
						{ 
							$this->session->set_userdata('binhluan_action', '3');
							return redirect(base_url('admin/binhluan'));
						}											
						$tmp = $this->binhluan_model->delete($id);
						if($tmp)
						{
							$this->session->set_userdata('binhluan_action', '2');
							return redirect(base_url('admin/binhluan'));													
						}							
						else
						{ 
							$this->session->set_userdata('binhluan_action', '3');						
							return redirect(base_url('admin/binhluan'));
						}
				}
			}
		}
		else
			return redirect(base_url('dangnhap'));	
	}

	// Quản lý đánh giá

	function danhgia($chucnang = "xem"){
		$check = $this->chucnang->ktdangnhap();		
		if($check == 1 || $check == 2 )
		{			
			$role = $this->data['Role'];
			if($role == 0)
				return redirect(base_url());
			else
			{								
				$this->data['title'] = 'Đánh giá';
				$this->data['page'] = 'rating';
				$this->data['subpage'] = 'rating-manage';

				if($chucnang == "xem")
				{
					if($this->session->userdata('danhgia_action')==FALSE){
						$this->session->set_userdata('danhgia_action', '1');
						$this->data['danhgia_action'] = $this->session->userdata('danhgia_action');
					}
					else $this->data['danhgia_action'] = $this->session->userdata('danhgia_action');	
					$this->session->set_userdata('danhgia_action', '1');

					$this->data['result'] = $this->danhgia_model->get_danhgia();					

					$this->load->view('admin/include/header',$this->data);
					$this->load->view('admin/include/sidebar',$this->data);									
					$this->load->view('admin/danhgia/index',$this->data);				
					$this->load->view('admin/include/footer',$this->data);	
				}
				elseif($chucnang == "capnhat")
				{
					$id = $this->input->get("id");																				
					if(!is_numeric($id)||$id<1)
					{ 
						$this->session->set_userdata('danhgia_action', '3');
						return redirect(base_url('admin/danhgia'));
					}				

					$this->data['title'] = 'Cập nhật đánh giá';
					$this->data['page'] = 'rating';
					$this->data['subpage'] = 'rating-edit';

					if (!isset($_POST["product_name"]))
					{
						$this->data['result'] = $this->danhgia_model->get_danhgiainfo($id);						
						if($this->data['result']==FALSE)
						{
							$this->session->set_userdata('danhgia_action', '3');
							return redirect(base_url('admin/danhgia'));
						}
						
						$this->load->view('admin/include/header',$this->data);
						$this->load->view('admin/include/sidebar',$this->data);									
						$this->load->view('admin/danhgia/edit',$this->data);				
						$this->load->view('admin/include/footer',$this->data);
					}
					else
					{
						$Luotdanhgia = $this->input->post('rating_time',TRUE);
						$Tongdiem = $this->input->post('total_point',TRUE);
						$Diemdanhgia = $this->input->post('avg_point',TRUE);																										        		        				        		                					        
						
						$tmp = $this->danhgia_model->update_danhgia($id, $Luotdanhgia, $Tongdiem, $Diemdanhgia);
						
						if($tmp)
						{							
							$this->session->set_userdata('danhgia_action', '2');														
							return redirect(base_url('admin/danhgia'));
						}							
						else
						{ 
							$this->session->set_userdata('danhgia_action', '3');
							return redirect(base_url('admin/danhgia'));
						}
					}
				}
			}
		}
		else
			return redirect(base_url('dangnhap'));	
	}

	// Các chức năng phụ

	public function ktngaysinh($input){
		$check = $this->chucnang->ktdangnhap();		
		if($check == 1 || $check == 2 )
		{
			$role = $this->data['Role'];
			if($role == 0)
				return redirect(base_url());
			else{
					list($ngay,$thang,$nam)=explode("-",$input);			
			    	if (checkdate($ngay,$thang,$nam)) return TRUE;
			    	elseif ((date("Y")-$nam)>12) return TRUE;
			    	else 
			    	{
						$this->form_validation->set_message('ktngaysinh', 'Ngày sinh không hợp lệ');
			    		return FALSE;
			    	}
			    }
    	}
		else
			return redirect(base_url('dangnhap'));
	}	

	public function kttinhthanh($input){
		$check = $this->chucnang->ktdangnhap();		
		if($check == 1 || $check == 2 )
		{
			$role = $this->data['Role'];
			if($role == 0)
				return redirect(base_url());
			else{
			    	if ($input!="") return TRUE;    	
			    	else 
			    	{
						$this->form_validation->set_message('kttinhthanh', 'Chưa chọn tỉnh thành');
			    		return FALSE;
			    	}
			    }
    	}
		else
			return redirect(base_url('dangnhap'));
	}	

	public function ktmatkhau($matkhau){
		$check = $this->chucnang->ktdangnhap();		
		if($check == 1 || $check == 2 )
		{
			$role = $this->data['Role'];
			if($role == 0)
				return redirect(base_url());
			else{
					if($matkhau=="") return TRUE;					
				    if (preg_match("/^[0-9A-Za-z!@#$%]+$/", $matkhau)) return TRUE;
			    	else 
			    	{
						$this->form_validation->set_message('ktmatkhau', 'Mật khẩu không hợp lệ');
			    		return FALSE;
			    	}
			    }
    	}
		else
			return redirect(base_url('dangnhap'));
	} 

	public function ktcaptcha($cap){
		$check = $this->chucnang->ktdangnhap();		
		if($check == 1 || $check == 2 )
		{
			$role = $this->data['Role'];
			if($role == 0)
				return redirect(base_url());
			else{
					$recaptcha = $this->session->userdata('captcha');
					if ($cap==$recaptcha)
						return TRUE;
					else
					{
						$this->form_validation->set_message('ktcaptcha', 'Mã xác nhận chưa đúng');
						return FALSE;
					}
				}
		}
		else
			return redirect(base_url('dangnhap'));
	}

	public function new_captcha(){
		$check = $this->chucnang->ktdangnhap();		
		if($check == 1 || $check == 2 )
		{
			$role = $this->data['Role'];
			if($role == 0)
				return redirect(base_url());
			else{
			        $this->load->helper(array('captcha', 'file'));
			        $captcha = create_captcha(array(
			            'word'        => strtoupper(substr(md5(time()), 0, 6)),
			            'img_path'    => $this->captcha_path,
			            'img_url'    => $this->captcha_path
			        ));       
			        $this->session->set_userdata('captcha', $captcha['word']);        
			        $filename = $this->captcha_path . $captcha['time'] . '.jpg';
			        $this->output->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
			        $this->output->set_header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');
			        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', FALSE);
			        $this->output->set_header('Pragma: no-cache');
			        $this->output->set_header('Content-Type: image/jpeg');
			        $this->output->set_header('Content-Length: ' . filesize($filename));
			        echo read_file($filename);
			    }
        }
		else
			return redirect(base_url('dangnhap'));
    }      
}