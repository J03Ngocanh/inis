<?php 
require_once './core/controller.php';
 //require_once 'app/models/product.php';

class trangchuController extends Controller {
    private $trangchuModel;
    public function __construct() {
        $this->trangchuModel = $this->model('trangchuModel');
    }  
    public function trangchu() {
        $loaisp= $this->trangchuModel->Getloaisp(); 
        $best = $this->trangchuModel->laybestseller();
        $new = $this->trangchuModel->laynewitem();
        $this->view('menu',['loaisp' => $loaisp]);
    
        
        $this->view('trangchu/trangchu',['best' => $best, 'new' => $new]);
        $this->view('footer');
    }

    public function veinnis(){
        $loaisp= $this->trangchuModel->Getloaisp(); 
        $this->view('menu',['loaisp' => $loaisp]);
        $this->view('trangchu/veinnis');
        $this->view('footer');
    }
    
    public function thongtin(){
        $makhachhang =  $_SESSION['makhachhang'];
        $loaisp= $this->trangchuModel->Getloaisp(); 
        $info = $this->trangchuModel->info($makhachhang);
        $history = $this->trangchuModel->getLichSuDonHang($makhachhang);
        $this->view('menu',['loaisp' => $loaisp]);
        $this->view('thongtin/thongtin', [ 'info' => $info, 'history' => $history]);
    }
    
}
?>