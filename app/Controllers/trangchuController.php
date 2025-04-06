<?php
require_once dirname(dirname(dirname(__FILE__))) . '/core/controller.php';//require_once 'app/models/product.php';
class trangchuController extends Controller
{
    private $trangchuModel;

    public function __construct()
    {
        $this->trangchuModel = $this->model('trangchuModel');
    }

    public function trangchu()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $loaisp = $this->trangchuModel->Getloaisp();
        $best = $this->trangchuModel->laybestseller();
        $new = $this->trangchuModel->laynewitem();
        $rank_up = $_SESSION['rank_up'] ?? null;
        unset($_SESSION['rank_up']);

        $info = null; // Khởi tạo mặc định
        if (isset($_SESSION['makhachhang'])) {
            $makhachhang = $_SESSION['makhachhang'];
            $info = $this->trangchuModel->info($makhachhang);
        }

        $this->view('menu', ['loaisp' => $loaisp, 'info' => $info]);
        $this->view('trangchu/trangchu', ['best' => $best, 'new' => $new, 'rank_up' => $rank_up]);
        $this->view('footer');
    }


    public function thongtin()
    {
        $history = null; // Khởi tạo mặc định
        if (isset($_SESSION['makhachhang'])) {
            $makhachhang = $_SESSION['makhachhang'];
            $history = $this->trangchuModel->getLichSuDonHang($makhachhang);
        }
        $loaisp = $this->trangchuModel->Getloaisp();
        $info = $this->trangchuModel->info($makhachhang);
        $info1 = $this->trangchuModel->info($makhachhang);
        $this->view('menu', ['loaisp' => $loaisp, 'info' => $info]);
        $this->view('thongtin/thongtin', ['info1' => $info1, 'history' => $history]);
    }

}

?>