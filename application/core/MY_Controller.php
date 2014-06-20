<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Public_Controller extends CI_Controller {
    public function __construct()
    {       
      parent::__construct();
       
  		$this->data['title'] = "Trang chủ";
      $this->data['Login'] = $this->chucnang->ktdangnhap();                  
      $this->cart->product_name_rules = '\d\D';            
        
      $this->data['Username'] = $this->chucnang->getLoginUsername();  
      $this->data['Name'] = $this->chucnang->GetName();
      $this->data['UserID'] = $this->chucnang->GetUserID();
      $this->data['Quyen'] = $this->chucnang->GetUserRole();
      $this->data['Email'] = $this->chucnang->GetEmail();      

      $this->data['show_tablet_active'] = $this->public_model->show_tablet_active();
      $this->data['show_tablet_deactive'] = $this->public_model->show_tablet_deactive();
      $this->data['sanphamlq_active'] = $this->public_model->sanphamlq_active();
      $this->data['sanphamlq_deactive'] = $this->public_model->sanphamlq_deactive();
      $this->data['show_laptop_active'] = $this->public_model->show_laptop_active();
      $this->data['show_laptop_deactive'] = $this->public_model->show_laptop_deactive();
      $this->data['show_desktop_active'] = $this->public_model->show_desktop_active();
      $this->data['show_desktop_deactive'] = $this->public_model->show_desktop_deactive();
      $this->data['show_accessory_active'] = $this->public_model->show_accessory_active();
      $this->data['show_accessory_deactive'] = $this->public_model->show_accessory_deactive();            
      $this->data['show_featureproduct_active'] = $this->public_model->show_featureproduct_active();
      $this->data['show_featureproduct_deactive'] = $this->public_model->show_featureproduct_deactive();
      $this->data['show_hotproduct_active'] = $this->public_model->show_hotproduct_active();
      $this->data['show_hotproduct_deactive'] = $this->public_model->show_hotproduct_deactive();
      
      if($this->session->userdata('taikhoan_updateinfo')==FALSE){
            $this->session->set_userdata('taikhoan_updateinfo', '1');
            $this->data['taikhoan_updateinfo'] = $this->session->userdata('taikhoan_updateinfo');
          }
          else $this->data['taikhoan_updateinfo'] = $this->session->userdata('taikhoan_updateinfo');  
      $this->session->set_userdata('taikhoan_updateinfo', '1');

      $TViet = array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
                        "ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề"
                        ,"ế","ệ","ể","ễ",
                        "ì","í","ị","ỉ","ĩ",
                        "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ"
                        ,"ờ","ớ","ợ","ở","ỡ",
                        "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
                        "ỳ","ý","ỵ","ỷ","ỹ",
                        "đ",
                        "À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă"
                        ,"Ằ","Ắ","Ặ","Ẳ","Ẵ",
                        "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
                        "Ì","Í","Ị","Ỉ","Ĩ",
                        "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ"
                        ,"Ờ","Ớ","Ợ","Ở","Ỡ",
                        "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
                        "Ỳ","Ý","Ỵ","Ỷ","Ỹ",
                        "Đ");
      $KoDau = array("a","a","a","a","a","a","a","a","a","a","a"
                        ,"a","a","a","a","a","a",
                        "e","e","e","e","e","e","e","e","e","e","e",
                        "i","i","i","i","i",
                        "o","o","o","o","o","o","o","o","o","o","o","o"
                        ,"o","o","o","o","o",
                        "u","u","u","u","u","u","u","u","u","u","u",
                        "y","y","y","y","y",
                        "d",
                        "A","A","A","A","A","A","A","A","A","A","A","A"
                        ,"A","A","A","A","A",
                        "E","E","E","E","E","E","E","E","E","E","E",
                        "I","I","I","I","I",
                        "O","O","O","O","O","O","O","O","O","O","O","O"
                        ,"O","O","O","O","O",
                        "U","U","U","U","U","U","U","U","U","U","U",
                        "Y","Y","Y","Y","Y",
                        "D");  
      $this->data['TViet'] = $TViet;
      $this->data['KoDau'] = $KoDau;
      // str_replace($TViet,$KoDau,'TP. Cần Thơ');        
    }
    public $data;          
}
