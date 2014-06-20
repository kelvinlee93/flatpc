<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Nguoidung_model extends CI_Model{

	var $table = 'NGUOIDUNG';

	function __construct(){
		parent:: __construct();		
	}

	function get_nguoidung(){		
		$query = $this->db->query('SELECT a.*, b.TENTINHTHANH FROM NGUOIDUNG a, TINHTHANH b WHERE a.TINHTHANH = b.ID ORDER BY a.ID ASC');		
		return $query->result_array();
	}

	function get_tinhthanh(){		
		$query = $this->db->get('TINHTHANH');
		return $query->result_array();
	}

	function insert($Hodem, $Ten, $Tendangnhap, $Matkhau, $Email, $Ngaysinh, $Diachi, $Tinhthanh, $Gioitinh, $CMND, $SDT, $Quyen, $Trangthai, $Anhdaidien)
	{				
		$Matkhau = do_hash($Matkhau, 'md5');
		if($Anhdaidien!=6)	
		{	
			$query = $this->db->query('INSERT INTO HINHANH (TENANH) VALUES (\''.$Anhdaidien.'\')');
			$query = $this->db->query('SELECT ID FROM HINHANH WHERE TENANH = \''.$Anhdaidien.'\'');		
			if ($query->num_rows() > 0)				
			   foreach ($query->result() as $row)		   
			      $Anhdaidien = $row->ID;		      		   								
		}

		$data = array(
			"Hodem" => $Hodem,
			"Tennguoidung" => $Ten,
			"Tendangnhap" => $Tendangnhap,
			"Matkhau"	=>	$Matkhau,
			"Email" => $Email,
			"Ngaysinh" => $Ngaysinh,
			"Diachi" => $Diachi,
			"Tinhthanh" => $Tinhthanh,
			"Gioitinh" => $Gioitinh,			
			"CMND" => $CMND,
			"SDT" => $SDT,
			"Quyen"	=>	$Quyen,
			"Trangthai" => $Trangthai,
			"Hinhdaidien" => $Anhdaidien			
		);		
		$this->db->trans_start();
		$this->db->insert($this->table, $data);									
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else return TRUE;
	}

	function edit($id, $Hodem, $Ten, $Tendangnhap, $Matkhau, $Email, $Ngaysinh, $Diachi, $Tinhthanh, $Gioitinh, $CMND, $SDT, $Quyen, $Trangthai, $Anhdaidien)
	{	
		if(!is_numeric($Anhdaidien))
		{	
			$query = $this->db->query('INSERT INTO HINHANH (TENANH) VALUES (\''.$Anhdaidien.'\')');
			$query = $this->db->query('SELECT ID FROM HINHANH WHERE TENANH = \''.$Anhdaidien.'\'');		
			if ($query->num_rows() > 0)				
			   foreach ($query->result() as $row)		   
			      $Anhdaidien = $row->ID;		      		   								
		}
			
		$data = array(
			"Hodem" => $Hodem,
			"Tennguoidung" => $Ten,
			"Tendangnhap" => $Tendangnhap,
			"Matkhau"	=>	$Matkhau,
			"Email" => $Email,
			"Ngaysinh" => $Ngaysinh,
			"Diachi" => $Diachi,
			"Tinhthanh" => $Tinhthanh,
			"Gioitinh" => $Gioitinh,			
			"CMND" => $CMND,
			"SDT" => $SDT,
			"Quyen"	=>	$Quyen,
			"Trangthai" => $Trangthai,
			"Hinhdaidien" => $Anhdaidien
		);		
		$this->db->trans_start();
		$this->db->where("Id", $id);
		$query = $this->db->update($this->table, $data);							
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else return TRUE;		
	}

	function dongtaikhoan($id){
		$query = $this->db->query('SELECT QUYEN FROM NGUOIDUNG WHERE ID = '.$id);	
		if ($query->num_rows() > 0)		
		   foreach ($query->result() as $row)		   
		      $role = $row->QUYEN;		      		   					
		if ($this->data['Role']==2&&$role==1)
			return FALSE;
		$this->db->trans_start();
		$query = $this->db->query('UPDATE NGUOIDUNG SET TRANGTHAI = 0 WHERE ID = '.$id);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else return TRUE;
	}

	function motaikhoan($id){		
		$this->db->trans_start();
		$query = $this->db->query('UPDATE NGUOIDUNG SET TRANGTHAI = 1 WHERE ID = '.$id);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else return TRUE;
	}

	function get_userinfo($id){	
		$this->db->trans_start();				
		$query = $this->db->query('SELECT a.*, b.TENANH FROM NGUOIDUNG a, HINHANH b WHERE a.HINHDAIDIEN = b.ID AND a.ID = '.$id);
		$this->db->trans_complete();
	
		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else return $query->result_array();
	}

	function update($Hodem,$Ten,$Tendangnhap,$Email,$Ngaysinh,$Diachi,$Gioitinh,$CMND,$SDT)
	{		
		$data = array(
			"Hodem" => $Hodem,
			"Tennguoidung" => $Ten,
			"Tendangnhap" => $Tendangnhap,			
			"Email" => $Email,
			"Ngaysinh" => $Ngaysinh,
			"Diachi" => $Diachi,			
			"Gioitinh" => $Gioitinh,			
			"CMND" => $CMND,
			"SDT" => $SDT
		);		
		$this->db->trans_start();
		$this->db->where("Id", $this->data['UserID']);
		$query = $this->db->update($this->table, $data);							
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else return TRUE;		
	}

	function kt_matkhaucu($matkhau){
		$query = $this->db->query("SELECT * FROM NGUOIDUNG WHERE MATKHAU = '".$matkhau."' AND TENDANGNHAP ='".$this->data['Username']."'");
		if($this->db->affected_rows() > 0 ) return TRUE;
		return FALSE;
	}	

	function doimatkhau($Id, $Matkhaumoi){
		$Matkhaumoi = do_hash($Matkhaumoi, 'md5');
		$this->db->trans_start();		
		$query = $this->db->query("UPDATE NGUOIDUNG SET MATKHAU = '".$Matkhaumoi."' WHERE ID = ".$Id);							
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else return TRUE;			
	}

/*
	function thongke_nguoidung(){
		$query = $this->db->query('SELECT QUYEN, COUNT(QUYEN) AS SOLUONG FROM nguoidung GROUP BY QUYEN');		
		return $query->result();
	}

	function get_nguoidung_quyen($id){		
		$query = $this->db->get_where($this->table,array('QUYEN'=>$id));
		return $query->result_array();
	}

	function get_diachi($id){
		$query =  $this->db->query('SELECT DIACHI FROM NGUOIDUNG WHERE ID ='.$id);
		return $query->row();
	}		

	function edit2($id){					
		$query = $this->db->get_where($this->table,array('ID'=>$id));
		return $query->result();
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

	function delete($id){
		$this->db->delete($this->table,array('id'=>$id));
		if($this->db->affected_rows() > 0 ) return TRUE;
		return FALSE;
	}
	*/
}