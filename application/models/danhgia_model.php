<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Danhgia_model extends CI_Model{

	var $table = 'DANHGIA';

	function __construct(){
		parent:: __construct();
	}

	function get_danhgia(){		
		$query = $this->db->query('SELECT B.*, A.TENSANPHAM FROM SANPHAM A, DANHGIA B WHERE A.ID = B.MASANPHAM');
		return $query->result_array();
	}

	function get_danhgiachitiet($id){		
		$query = $this->db->query('SELECT C.*, S.TENSANPHAM, N.TENDANGNHAP FROM SANPHAM S, CHITIETDANHGIA C, NGUOIDUNG N, DANHGIA D WHERE D.ID = C.MADANHGIA AND S.ID = C.MASANPHAM AND N.ID = C.MAKHACHHANG AND C.MASANPHAM = ? ORDER BY THOIGIAN DESC',$id);
		return $query->result_array();
	}

	function get_danhgiachitiet_tensp($id){		
		$query = $this->db->query('SELECT S.TENSANPHAM FROM SANPHAM S, DANHGIA D WHERE S.ID = D.MASANPHAM AND D.ID = '.$id);
		return $query->result_array();
	}	

	function get_danhgiainfo($id){				
		$this->db->trans_start();				
		$query = $this->db->query('SELECT B.*, A.TENSANPHAM, C.TENDANGNHAP FROM SANPHAM A, CHITIETDANHGIA B, NGUOIDUNG C WHERE A.ID = B.MASANPHAM AND C.ID = B.MAKHACHHANG AND B.ID = '.$id);
		$this->db->trans_complete();
	
		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else return $query->result_array();		
	}

	function update_danhgia($id, $Diem, $Noidung)
	{		
		$this->db->trans_start();		
		$data = array(               
               'Diem' => $Diem,
               'Noidung' => $Noidung
            );
		$this->db->where('id', $id);
		$this->db->update('CHITIETDANHGIA', $data);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else return TRUE;
	}

	function insert($mdg, $Masanpham, $Diem, $Noidung)
	{
		date_default_timezone_set('Asia/Jakarta');		
		$data = array(
			"Madanhgia" => $mdg,
			"Masanpham" => $Masanpham,
			"Makhachhang" => $this->chucnang->GetUserID(),			
			"Diem" => $Diem,
			"Noidung" => $Noidung,
			"Thoigian" => date('Y-m-d H:i:s')		
		);
		$this->db->trans_start();
		$this->db->insert('CHITIETDANHGIA', $data);
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else return TRUE;
	}

	function xoa($id)
	{		
		$this->db->trans_start();							
		$query = $this->db->query('DELETE FROM CHITIETDANHGIA WHERE ID = '.$id);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else return TRUE; 
	}


/*	

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