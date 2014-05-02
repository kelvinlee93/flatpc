<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Nguoidung_model extends CI_Model{

	var $table = 'NGUOIDUNG';

	function __construct(){
		parent:: __construct();
		$this->load->helper('security');
	}

	function thongke_nguoidung(){
		$query = $this->db->query('SELECT QUYEN, COUNT(QUYEN) AS SOLUONG FROM nguoidung GROUP BY QUYEN');		
		return $query->result();
	}

	function get_nguoidung(){		
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	function get_nguoidung_quyen($id){		
		$query = $this->db->get_where($this->table,array('QUYEN'=>$id));
		return $query->result_array();
	}

	function get_diachi($id){
		$query =  $this->db->query('SELECT DIACHI FROM NGUOIDUNG WHERE ID ='.$id);
		return $query->row();
	}
	
	function edit($id){					
		$query = $this->db->get_where($this->table,array('ID'=>$id));
		return $query->result_array();
	}	

	function edit2($id){					
		$query = $this->db->get_where($this->table,array('ID'=>$id));
		return $query->result();
	}	

	function kt_matkhaucu($matkhau){
		$query = $this->db->query("SELECT * FROM nguoidung WHERE MATKHAU = '".$matkhau."' AND TENDANGNHAP ='".$this->data['Username']."'");
		if($this->db->affected_rows() > 0 ) return TRUE;
		return FALSE;
	}

	function insert($Tennguoidung, $Tendangnhap, $Matkhau, $Email, $Namsinh, $Gioitinh, $Diachi, $CMND, $SDT, $Quyen, $Trangthai, $HinhDaiDien)
	{		
		$Matkhau = do_hash($Matkhau, 'md5');
		$data = array(
			"Tennguoidung" => $Tennguoidung,
			"Tendangnhap" => $Tendangnhap,
			"Matkhau"	=>	$Matkhau,
			"Email" => $Email,
			"Ngaysinh" => $Namsinh,
			"Gioitinh" => $Gioitinh,
			"Diachi" => $Diachi,
			"CMND" => $CMND,
			"SDT" => $SDT,
			"Quyen"	=>	$Quyen,
			"Trangthai" => $Trangthai,
			"HinhAnh" => $HinhDaiDien
		);
		$this->db->insert($this->table, $data);
		if($this->db->insert_id() > 0) return TRUE;
		return FALSE;
	}

	function update($Id, $Tennguoidung, $Tendangnhap, $Matkhau, $Email, $Namsinh, $Gioitinh, $Diachi, $CMND, $SDT, $Quyen, $Trangthai, $HinhDaiDien)
	{		
		$data = array(
			"Tennguoidung" => $Tennguoidung,
			"Tendangnhap" => $Tendangnhap,
			"Matkhau"	=>	$Matkhau,
			"Email" => $Email,
			"Ngaysinh" => $Namsinh,
			"Gioitinh" => $Gioitinh,
			"Diachi" => $Diachi,
			"CMND" => $CMND,
			"SDT" => $SDT,
			"Quyen"	=>	$Quyen,
			"Trangthai" => $Trangthai,
			"HinhAnh" => $HinhDaiDien
		);		
		$this->db->trans_start();
		$this->db->where("Id", $Id);
		$query = $this->db->update($this->table, $data);							
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else return TRUE;		
	}

	function update_user($Id, $Tennguoidung, $Email, $Ngaysinh, $Gioitinh, $Diachi, $CMND, $SDT)
	{		
		$data = array(
			"Tennguoidung" => $Tennguoidung,			
			"Email" => $Email,
			"Ngaysinh" => $Ngaysinh,
			"Gioitinh" => $Gioitinh,
			"Diachi" => $Diachi,
			"CMND" => $CMND,
			"SDT" => $SDT
		);		
		$this->db->trans_start();
		$this->db->where("Id", $Id);
		$query = $this->db->update($this->table, $data);							
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else return TRUE;		
	}

	function update_diachi($Id,$DiaChi)
	{
		$data = array("Diachi" => $DiaChi);		
		$this->db->trans_start();
		$this->db->where("Id", $Id);
		$query = $this->db->update($this->table, $data);							
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else return TRUE;
	}

	function doimatkhau($Id, $Matkhaumoi){
		$Matkhaumoi = do_hash($Matkhaumoi, 'md5');
		$this->db->trans_start();		
		$query = $this->db->query("UPDATE nguoidung SET MATKHAU = '".$Matkhaumoi."' WHERE ID = ".$Id);							
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else return TRUE;			
	}

	function delete($id){
		$this->db->delete($this->table,array('id'=>$id));
		if($this->db->affected_rows() > 0 ) return TRUE;
		return FALSE;
	}
}