<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Danhgia_model extends CI_Model{

	var $table = 'DANHGIA';

	function __construct(){
		parent:: __construct();
	}

	function get_danhgia(){		
		$query = $this->db->query('SELECT B.MASANPHAM, A.TENSANPHAM, B.LUOTDANHGIA, B.TONGDIEM, B.DIEMDANHGIA FROM SANPHAM A, DANHGIA B WHERE A.ID = B.MASANPHAM');
		return $query->result_array();
	}	

	function get_danhgiainfo($id){				
		$this->db->trans_start();				
		$query = $this->db->query('SELECT B.MASANPHAM, A.TENSANPHAM, B.LUOTDANHGIA, B.TONGDIEM, B.DIEMDANHGIA, C.TENANH FROM SANPHAM A, danhgia B, HINHANH C WHERE A.ID = B.MASANPHAM AND A.HINHDAIDIEN = C.ID AND B.MASANPHAM = '.$id);
		$this->db->trans_complete();
	
		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else return $query->result_array();		
	}

	function update_danhgia($id, $Luotdanhgia, $Tongdiem, $Diemdanhgia)
	{
		$tmp_Diemdanhgia = round(($Tongdiem/$Luotdanhgia),1);							

		$this->db->trans_start();		
		$query = $this->db->query('UPDATE DANHGIA SET LUOTDANHGIA = ?, TONGDIEM = ?, DIEMDANHGIA = ? WHERE ID = ?', array($Luotdanhgia, $Tongdiem, $tmp_Diemdanhgia, $id));			
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else return TRUE;
	}
/*
	function insert($Masanpham, $Luotxem, $Luotmua, $Luotdanhgia, $Tongdiem, $Diemdanhgia)
	{
		$Matkhau = do_hash($Matkhau, 'md5');
		$data = array(
			"Masanpham" => $Masanpham,
			"Luotxem" => $Luotxem,
			"Luotmua"	=>	$Luotmua,
			"Luotdanhgia" => $Luotdanhgia,
			"Tongdiem" => $Tongdiem,
			"Diemdanhgia" => $Diemdanhgia			
		);
		$this->db->insert($this->table, $data);
		if($this->db->insert_id() > 0) return TRUE;
		return FALSE;
	}	

	function update_rv($Masanpham, $Luotdanhgia, $Tongdiem, $Diemdanhgia)
	{
		$this->db->trans_start();
		$query = $this->db->query('UPDATE danhgia SET LUOTDANHGIA = '.$Luotdanhgia.', TONGDIEM = '.$Tongdiem.', DIEMDANHGIA ='.$Diemdanhgia.' WHERE MASANPHAM ='.$Masanpham);		
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else return TRUE;
	}
*/
}