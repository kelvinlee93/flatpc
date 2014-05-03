<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class admin extends CI_Controller{
	
	public $data;

	function __construct(){
		parent:: __construct();		
		$this->data['page'] = '';				
		$this->data['Username'] = $this->chucnang->getLoginUsername();  
		$this->data['Name'] = $this->chucnang->GetName();
		$this->data['UserID'] = $this->chucnang->GetUserID();
		$this->data['Role'] = $this->chucnang->GetUserRole();
	}	

	public function index()
	{
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

				$this->load->view('admin/home/header',$this->data);
				$this->load->view('admin/include/sidebar',$this->data);									
				$this->load->view('admin/home/index',$this->data);				
				$this->load->view('admin/home/footer',$this->data);	
			}
		}
		else
			return redirect(base_url('dangnhap'));
	
	}

	function nguoidung($chucnang = "view"){
		$check = $this->chucnang->ktdangnhap();		
		if($check == 1 || $check == 2 )
		{
			$role = $this->data['Role'];
			if($role == 0)
				return redirect(base_url());
			else{				
				$this->data['page'] = 'user';
				$this->load->model('nguoidung_model');								
				
				if($chucnang == "view")
				{
					$this->data['title'] = 'Người dùng';
					$this->data['subpage'] = 'user-manage';
					if(isset($_GET['quyen']) && $_GET['quyen'] > 0)
						$this->data['result'] = $this->nguoidung_model->get_nguoidung_quyen($_GET['quyen']);
					else
						$this->data['result'] = $this->nguoidung_model->get_nguoidung();

					$this->load->view('admin/nguoidung/header',$this->data);
					$this->load->view('admin/include/sidebar',$this->data);									
					$this->load->view('admin/nguoidung/index',$this->data);				
					$this->load->view('admin/nguoidung/footer',$this->data);	
				}
				elseif ($chucnang == "insert") {
					$this->data['title'] = 'Thêm người dùng';
					$this->data['subpage'] = 'user-add';

					$this->load->view('admin/nguoidung/header',$this->data);
					$this->load->view('admin/include/sidebar',$this->data);									
					$this->load->view('admin/nguoidung/insert',$this->data);				
					$this->load->view('admin/nguoidung/footer',$this->data);
					/*
					$config = array(	
		               array(
		                     'field'   => 'tendangnhap', 
		                     'label'   => 'Tên đăng nhập', 
		                     'rules'   => 'is_unique[nguoidung.TENDANGNHAP]'
		                  ),
		               array(
		                     'field'   => 'email', 
		                     'label'   => 'Email', 
		                     'rules'   => 'is_unique[nguoidung.EMAIL]'
		                  )
		            );
					
					$this->form_validation->set_rules($config);
					$this->form_validation->set_message('is_unique', '%s đã được sử dụng');	
					$this->form_validation->set_error_delimiters('<div class="alert alert-danger" >
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
					
					if ($this->form_validation->run() == FALSE){
						$this->data['result'] = $this->nguoidung_model->get_nguoidung();
						$this->load->view('admin/include/header',$this->data);
						$this->load->view('admin/include/leftpanel',$this->data);
						$this->load->view('admin/include/headerbar');
						$this->load->view('admin/include/breadcrumb',$this->data);
						$this->load->view('admin/nguoidung/index',$this->data);
						$this->load->view('admin/include/rightpanel');
						$this->load->view('admin/include/footer');
					}			
					else{	
						$Tennguoidung = $this->input->post('hoten',TRUE);
						$Tendangnhap = $this->input->post('tendangnhap',TRUE);
						$Matkhau = $this->input->post('matkhau',TRUE);
						$Email = $this->input->post('email',TRUE);						
						$Namsinh = $this->input->post('namsinh',TRUE);
						$Namsinh = date('Y-m-d', strtotime($Namsinh));
						$Gioitinh = $this->input->post('gioitinh',TRUE);
						$Diachi = $this->input->post('diachi',TRUE);
						$CMND = $this->input->post('CMND',TRUE);
						$SDT = $this->input->post('SDT',TRUE);
						$Quyen = $this->input->post('quyen',TRUE);
						$Trangthai = $this->input->post('trangthai',TRUE);
						$HinhDaiDien = $this->input->post('HinhDaiDien',TRUE);
						$HinhDaiDien =  substr($HinhDaiDien,22);

						$tmp = $this->nguoidung_model->insert($Tennguoidung, $Tendangnhap, $Matkhau, $Email, $Namsinh, $Gioitinh, $Diachi, $CMND, $SDT, $Quyen, $Trangthai, $HinhDaiDien);
						if($tmp) echo redirect(base_url('admin/'.$this->data['page']));
						else echo redirect(base_url('admin/error/insert'));					
					}
					*/
				}
				elseif ($chucnang == "edit") {	
					$this->form_validation->set_rules('tendangnhap','','trim');		
					$id = 0;
					$Idg = $this->input->get("id");			
					if(is_numeric($Idg)) $id = $Idg;
					if ($this->form_validation->run() == FALSE)
					{					
						if($id < 0) echo redirect(base_url('admin/'.$this->data['page']));
						else
						{
							$this->data['result'] = $this->nguoidung_model->edit($id);
							$this->load->view('admin/include/header',$this->data);
							$this->load->view('admin/include/leftpanel',$this->data);
							$this->load->view('admin/include/headerbar');
							$this->load->view('admin/include/breadcrumb',$this->data);
							$this->load->view('admin/nguoidung/edit',$this->data);
							$this->load->view('admin/include/rightpanel');
							$this->load->view('admin/include/footer');
						}
					}
					else
					{									
						$Tennguoidung = $this->input->post('hoten',TRUE);
						$Tendangnhap = $this->input->post('tendangnhap',TRUE);
						$Matkhau_old = $this->input->post('matkhaucu',TRUE);
						$Matkhau_new = $this->input->post('matkhaumoi',TRUE);
						if ($Matkhau_new){
							$Matkhau = $Matkhau_new;
							$Matkhau = do_hash($Matkhau,'md5');
						}
						else $Matkhau = $Matkhau_old;												
						$Email = $this->input->post('email',TRUE);						
						$Namsinh = $this->input->post('namsinh',TRUE);
						$Namsinh = date('Y-m-d', strtotime($Namsinh));
						$Gioitinh = $this->input->post('gioitinh',TRUE);
						$Diachi = $this->input->post('diachi',TRUE);
						$CMND = $this->input->post('CMND',TRUE);
						$SDT = $this->input->post('SDT',TRUE);
						$Quyen = $this->input->post('quyen',TRUE);
						$Trangthai = $this->input->post('trangthai',TRUE);
						$HinhDaiDien = $this->input->post('HinhDaiDien',TRUE);
						$HinhDaiDien =  substr($HinhDaiDien,22);
						
						$tmp = $this->nguoidung_model->update($id, $Tennguoidung, $Tendangnhap, $Matkhau, $Email, $Namsinh, $Gioitinh, $Diachi, $CMND, $SDT, $Quyen, $Trangthai, $HinhDaiDien);
						if($tmp) echo redirect(base_url('admin/'.$this->data['page']));
						else echo redirect(base_url('admin/error/edit'));
					}						
				}
				elseif ($chucnang == 'delete') {
						$id = $this->input->post('id',TRUE);
						$a = $this->nguoidung_model->delete($id);
						if($a)
							echo 1;
						else
							echo 0;
					}	
			}
		}
		else
			return redirect(base_url('dangnhap'));
	}
}