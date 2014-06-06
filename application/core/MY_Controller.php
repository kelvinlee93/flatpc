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
      $this->data['current_url'] = uri_string(current_url());

      $this->data['show_tablet_active'] = $this->public_model->show_tablet_active();
      $this->data['show_tablet_deactive'] = $this->public_model->show_tablet_deactive();
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

      #if (!isset($_SESSION['BO_DEM']))
      #{ 
      // if(substr($_SERVER['REQUEST_URI'],strlen($_SERVER['REQUEST_URI'])-3,3) != "jpg"){
      //   $this->bodem_model->them($_SERVER['HTTP_USER_AGENT'], $_SERVER['REMOTE_ADDR'], date('Y-m-d H:i:s'), $_SERVER['REQUEST_URI']);
      //   #$_SESSION['BO_DEM'] = 'OK';
      // }
      // $this->data['FMenu1'] = $this->public_model->FMenu1($this->data['lang_db']);
      // $this->data['FMenu2'] = $this->public_model->FMenu2($this->data['lang_db']);
      // $this->data['FMenu3'] = $this->public_model->FMenu3($this->data['lang_db']);      
    }
    public $data;
}
