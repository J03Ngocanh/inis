<?php
require_once dirname(dirname(dirname(__FILE__))) . '/core/Controller.php';

//require_once 'app/models/giohangModel.php';
class veinnisController extends Controller
{
    private $veinnisModel;

    public function __construct()
    {
        $this->veinnisModel = $this->model('veinnisModel');
    }

    public function veinnis()
    {
        $makhachhang = $_SESSION['makhachhang'];
        $loaisp = $this->veinnisModel->Getloaisp();
        $info = $this->veinnisModel->info($makhachhang);
        $this->view('menu', ['loaisp' => $loaisp, 'info' => $info]);
        $this->view('veinnis/veinnis');
        $this->view('footer');
    }

    public function blog1()
    {
        $loaisp = $this->veinnisModel->Getloaisp();
        $makhachhang = $_SESSION['makhachhang'];
        $info = $this->veinnisModel->info($makhachhang);
        $this->view('menu', ['loaisp' => $loaisp, 'info' => $info]);
        $this->view('veinnis/blog1');
        $this->view('footer');
    }

    public function blog2()
    {
        $loaisp = $this->veinnisModel->Getloaisp();
        $makhachhang = $_SESSION['makhachhang'];
        $info = $this->veinnisModel->info($makhachhang);
        $this->view('menu', ['loaisp' => $loaisp, 'info' => $info]);
        $this->view('veinnis/blog2');

        $this->view('footer');
    }
}