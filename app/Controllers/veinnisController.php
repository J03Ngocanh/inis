<?php
require_once dirname(dirname(dirname(__FILE__))) . '/core/controller.php';

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
        $info = null; // Khởi tạo mặc định
        if (isset($_SESSION['makhachhang'])) {
            $makhachhang = $_SESSION['makhachhang'];
            $info = $this->veinnisModel->info($makhachhang);
        }
        $loaisp = $this->veinnisModel->Getloaisp();
        $this->view('menu', ['loaisp' => $loaisp, 'info' => $info]);
        $this->view('veinnis/veinnis');
        $this->view('footer');
    }

    public function blog1()
    {
        $loaisp = $this->veinnisModel->Getloaisp();
        $info = null; // Khởi tạo mặc định
        if (isset($_SESSION['makhachhang'])) {
            $makhachhang = $_SESSION['makhachhang'];
            $info = $this->veinnisModel->info($makhachhang);
        }
        $this->view('menu', ['loaisp' => $loaisp, 'info' => $info]);
        $this->view('veinnis/blog1');
        $this->view('footer');
    }

    public function blog2()
    {
        $loaisp = $this->veinnisModel->Getloaisp();
        $info = null; // Khởi tạo mặc định
        if (isset($_SESSION['makhachhang'])) {
            $makhachhang = $_SESSION['makhachhang'];
            $info = $this->veinnisModel->info($makhachhang);
        }
        $this->view('menu', ['loaisp' => $loaisp, 'info' => $info]);
        $this->view('veinnis/blog2');

        $this->view('footer');
    }
}