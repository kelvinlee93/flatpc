<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Tintuc_model extends CI_Model{

	var $table = 'TINTUC';

	function __construct(){
		parent:: __construct();
	}

	function get_tintuc(){		
		$query = $this->db->query("SELECT T.*, N.TENDANGNHAP, N.HODEM, N.TENNGUOIDUNG, L.TENLOAI FROM TINTUC T,NGUOIDUNG N, LOAITINTUC L WHERE T.TACGIA = N.ID AND T.LOAITIN = L.ID ORDER BY T.NGAYDANG DESC");
		return $query->result_array();
	}

	function insert($Tieude, $Loaitin, $Mota, $Noidung, $Ngaydang, $Tacgia, $Anhtieubieu, $Tinhtrang)
	{		
		if($Anhtieubieu!=6)	
		{	
			$query = $this->db->query('INSERT INTO HINHANH (TENANH) VALUES (\''.$Anhtieubieu.'\')');
			$query = $this->db->query('SELECT ID FROM HINHANH WHERE TENANH = \''.$Anhtieubieu.'\'');		
			if ($query->num_rows() > 0)				
			   foreach ($query->result() as $row)		   
			      $Anhtieubieu = $row->ID;		      		   								
		}
		else $Anhtieubieu = 0;
		
		$data = array(
			"Tieude" => $Tieude,
			"Loaitin" => $Loaitin,
			"Mota"	=>	$Mota,
			"Noidung" => $Noidung,
			"Ngaydang" => $Ngaydang,
			"Tacgia" => $Tacgia,
			"Hinh" => $Anhtieubieu,
			"Tinhtrang" => $Tinhtrang	
		);		
		$this->db->trans_start();
		$this->db->insert($this->table, $data);									
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

	function delete_cmt($id)
	{
		$this->db->trans_start();
		$this->db->delete("BINHLUANTINTUC",array('id'=>$id));
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else return TRUE;	
	}

	function get_tintucinfo($id){		
		$query = $this->db->query("SELECT T.*, N.TENDANGNHAP, L.TENLOAI, H.TENANH FROM tintuc T,nguoidung N, loaitintuc L, HINHANH H WHERE T.TACGIA = N.ID AND T.LOAITIN = L.ID AND T.HINH = H.ID AND T.ID = ".$id);
		return $query->result_array();		
	}

	function get_tintucbinhluan(){		
		$query = $this->db->query("SELECT C.*, N.TENNGUOIDUNG, T.TIEUDE  FROM tintuc T,nguoidung N, BINHLUANTINTUC C WHERE T.ID = C.MATINTUC AND N.ID = C.MAKHACHHANG");
		return $query->result_array();		
	}

	function get_chitiettintucbinhluan($id){		
		$query = $this->db->query("SELECT C.*, N.TENNGUOIDUNG, T.TIEUDE  FROM tintuc T,nguoidung N, BINHLUANTINTUC C WHERE T.ID = C.MATINTUC AND N.ID = C.MAKHACHHANG AND C.ID = ".$id);
		return $query->result_array();		
	}

	function edit_cmt($id, $Noidung)
	{				
		$data = array(						
			"Noidung" => $Noidung			
		);		

		$this->db->trans_start();
		$this->db->where("Id", $id);
		$query = $this->db->update("BINHLUANTINTUC", $data);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else return TRUE;
	}

	function edit($id, $Tieude, $Loaitin, $Mota, $Noidung, $Ngaydang, $Anhtieubieu, $Tacgia, $Tinhtrang)
	{		
		if(!is_numeric($Anhtieubieu))
		{	
			$this->db->trans_start();
			$query = $this->db->query('INSERT INTO HINHANH (TENANH) VALUES (\''.$Anhtieubieu.'\')');
			$query = $this->db->query('SELECT ID FROM HINHANH WHERE TENANH = \''.$Anhtieubieu.'\'');
			$this->db->trans_complete();
			if ($this->db->trans_status() === FALSE)
				$Anhtieubieu = 0;
			else foreach ($query->result() as $row)		   
			      $Anhtieubieu = $row->ID;					   		      		   								
		}		

		$data = array(			
			"Tieude" => $Tieude,
			"Loaitin" => $Loaitin,
			"Mota"	=>	$Mota,
			"Noidung" => $Noidung,
			"Ngaydang" => $Ngaydang,			
			"Hinh" => $Anhtieubieu,
			"Tacgia" => $Tacgia,
			"Tinhtrang" => $Tinhtrang
		);		

		$this->db->trans_start();
		$this->db->where("Id", $id);
		$query = $this->db->update($this->table, $data);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else return TRUE;
	}
/*	
	function get_loaitin($id){
		$query = $this->db->query("SELECT LOAITIN FROM tintuc WHERE ID = ".$id);	
		return $query->row();
	}

	function get_tinlienquan($id,$loai){
		$query = $this->db->query("SELECT TIEUDE, ID, MOTA FROM tintuc T WHERE T.ID <> ".$id." AND LOAITIN = ".$loai." ORDER BY T.NGAYDANG DESC LIMIT 4");
		return $query->result();
	}

	function edit($id){
		
		$query = $this->db->query("SELECT T.ID, T.TIEUDE, T.LOAITIN, T.MOTA, T.NOIDUNG, T.NGAYDANG, T.HINH, T.TACGIA, N.TENNGUOIDUNG, L.LOAITINTUC FROM tintuc T,nguoidung N, loaitintuc L WHERE T.TACGIA = N.ID AND T.LOAITIN = L.ID AND T.ID = ".$id);
		return $query->result_array();
	}			
	*/
}