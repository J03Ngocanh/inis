<?php
require_once 'core/Controller.php';
//require_once 'app/models/giohangModel.php';
class veinnisController extends Controller {
    private $veinnisModel;

    public function __construct() {
        $this->veinnisModel = $this->model('veinnisModel');
    }

    public function trangchu(){
        $loaisp= $this->veinnisModel->Getloaisp(); 
        $this->view('menu', ['loaisp' => $loaisp]);
        $this->view('veinnis/veinnis');
        $this->view('footer');
    }

    public function blog1(){
        $loaisp= $this->veinnisModel->Getloaisp(); 
        $this->view('menu', ['loaisp' => $loaisp]);
        $this->view('veinnis/blog1');

        $this->view('footer');
    }
    public function blog2(){
        $loaisp= $this->veinnisModel->Getloaisp(); 
        $this->view('menu', ['loaisp' => $loaisp]);
        $this->view('veinnis/blog2');

        $this->view('footer');
    }
}