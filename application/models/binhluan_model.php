<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Binhluan_model extends CI_Model{

	var $table = 'BINHLUAN';

	function __construct(){
		parent:: __construct();
	}

	function get_binhluan(){		
		$query = $this->db->query("SELECT B.*, S.TENSANPHAM FROM sanpham S, binhluan B WHERE S.ID = B.MASANPHAM ORDER BY B.THOIGIAN DESC");
		return $query->result_array();
	}

	function get_binhluaninfo($id){		
		$query = $this->db->query("SELECT B.*, S.TENSANPHAM, C.TENANH FROM sanpham S, binhluan B, HINHANH C WHERE S.ID = B.MASANPHAM AND S.HINHDAIDIEN = C.ID AND B.ID = ".$id);		
		return $query->result_array();		
	}

	function update_binhluan($id, $Tenkhachhang, $Email, $Noidung, $Thoigian)
	{					

		$this->db->trans_start();
		$query = $this->db->query("UPDATE BINHLUAN SET TENKHACHHANG = ?, EMAIL = ?, NOIDUNG = ?, THOIGIAN = ? WHERE ID = ?", array($Tenkhachhang, $Email, $Noidung, $Thoigian, $id));							
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else return TRUE;		
	}

	function delete($id)
	{
		$this->db->trans_start();
		$this->db->delete($this->table,array('id'=>$id));
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else return TRUE;	
	}

/*
	function get_binhluan_sp($id){		
		$query = $this->db->query("SELECT B.*, S.TENSANPHAM FROM sanpham S, binhluan B WHERE S.ID = B.MASANPHAM AND S.ID =".$id." ORDER BY B.THOIGIAN DESC");
		return $query->result_array();
	}	

	function insert($MASANPHAM, $TENKHACHHANG, $EMAIL, $NOIDUNG)
	{
		$Matkhau = do_hash($Matkhau, 'md5');
		$data = array(
			"MASANPHAM" => $MASANPHAM,
			"TENKHACHHANG" => $TENKHACHHANG,
			"EMAIL" => $EMAIL,
			"NOIDUNG" => $NOIDUNG,
			"THOIGIAN" => date('Y-m-d',time()),						
		);
		$this->db->insert($this->table, $data);
		if($this->db->insert_id() > 0) return TRUE;
		return FALSE;
	}

	
	*/
}