<?php
require_once 'core/Controller.php';
class thanhtoanController extends Controller {
    private $thanhtoanModel;

    public function __construct() {
        $this->thanhtoanModel = $this->model('thanhtoanModel');
    }

    public function thanhtoan(){
    $loaisp = $this->thanhtoanModel->Getloaisp(); 
    $thanhtoan = $_SESSION['giohang'] ?? [];
    $this->view('menu', ['loaisp' => $loaisp]);
    $this->view('thanhtoan/thanhtoan', ['thanhtoan' => $thanhtoan]);
    }

}