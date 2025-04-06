<?php
require_once dirname(dirname(dirname(__FILE__))) . '/core/controller.php';

// require_once 'app/models/sanpham.php';

class sanphamController extends Controller
{
    private $sanphamModel;

    public function __construct()
    {
        $this->sanphamModel = $this->model('sanphamModel');
    }

    public function sanpham()
    {
        $loaisp = $this->sanphamModel->Getloaisp();
        $loaisp2 = $this->sanphamModel->Getloaisp();
        $danhmucsp = $this->sanphamModel->Getdanhmuc();
        $sanpham = $this->sanphamModel->getAll();
        $makhachhang = $_SESSION['makhachhang'];
        $info = $this->sanphamModel->info($makhachhang);
        $this->view('menu', ['loaisp' => $loaisp, 'info' => $info]);
        $this->view('sanpham/sanpham1', ['loaisp' => $loaisp2, 'danhmucsp' => $danhmucsp, 'sanpham' => $sanpham]);
        $this->view('footer');
    }


    public function sanpham_danhmuc($id)
    {
        $loaisp = $this->sanphamModel->Getloaisp();
        $loaisp2 = $this->sanphamModel->Getloaisp();
        $danhmucsp = $this->sanphamModel->Getdanhmuc();
        $sanpham = $this->sanphamModel->getAll_danhmuc($id);
        $tendanhmuc_loai = $this->sanphamModel->tendanhmuc_loai($id);
        $makhachhang = $_SESSION['makhachhang'];
        $info = $this->sanphamModel->info($makhachhang);
        $this->view('menu', ['loaisp' => $loaisp, 'info' => $info]);
        $this->view('sanpham/sanpham1', ['loaisp' => $loaisp2, 'danhmucsp' => $danhmucsp, 'sanpham' => $sanpham, 'tendanhmuc_loai' => $tendanhmuc_loai]);

    }

    public function chitietsp($id)
    {
        $loaisp = $this->sanphamModel->Getloaisp();
        $sanpham = $this->sanphamModel->getchitietsp($id);
        $makhachhang = $_SESSION['makhachhang'];
        $info = $this->sanphamModel->info($makhachhang);
        $this->view('menu', ['loaisp' => $loaisp, 'info' => $info]);
        $this->view('sanpham/chitietsp', ['sanpham' => $sanpham]);
        $this->view('footer');

    }

    public function sanpham_loai($id)
    {

        $loaisp = $this->sanphamModel->Getloaisp();
        $loaisp2 = $this->sanphamModel->Getloaisp();
        $danhmucsp = $this->sanphamModel->Getdanhmuc();
        $makhachhang = $_SESSION['makhachhang'];
        $info = $this->sanphamModel->info($makhachhang);
        $tenloai = $this->sanphamModel->tenloai($id);
        $sanpham = $this->sanphamModel->getAll_loai($id);

        $this->view('menu', ['loaisp' => $loaisp, 'info' => $info]);

        $this->view('sanpham/sanpham1', ['loaisp' => $loaisp2, 'danhmucsp' => $danhmucsp, 'sanpham' => $sanpham, 'tenloai' => $tenloai]);


        // $this->view('footer');
    }

    public function xulytimkiem()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nd'])) {
            $nd = $_POST['nd'];
            $nd = urldecode($nd);
            $nd = trim($nd);
            $nd = filter_var($nd, FILTER_SANITIZE_STRING);
            $encoded_nd = urlencode($nd);
            header("location: /inis/sanpham/sanpham_timkiem/$encoded_nd ");
            exit;
        }
    }

    public function sanpham_timkiem($nd)
    {
        $nd = urldecode($nd);
        $nd = trim($nd);
        $nd = filter_var($nd, FILTER_SANITIZE_STRING);
        $loaisp = $this->sanphamModel->Getloaisp();
        $loaisp2 = $this->sanphamModel->Getloaisp();
        $danhmucsp = $this->sanphamModel->Getdanhmuc();
        $sanpham = $this->sanphamModel->getsanpham_timkiem($nd);
        $makhachhang = $_SESSION['makhachhang'];
        $info = $this->sanphamModel->info($makhachhang);
        $this->view('menu', ['loaisp' => $loaisp, 'info' => $info]);

        $this->view('sanpham/sanpham1', ['loaisp' => $loaisp2, 'danhmucsp' => $danhmucsp, 'sanpham' => $sanpham]);
        $this->view('footer');
    }

    public function goiy_timkiem()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nd'])) {
            $nd = $_POST['nd'];
            $result = $this->sanphamModel->tensp($nd);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<a href="/inis/sanpham/chitietsp/' . $row['masanpham'] . '" style="text-decoration: none; color: inherit;">
                    <div style="display: flex; align-items: center; padding: 10px 12px; font-size: 14px; color: #333; cursor: pointer; transition: background-color 0.2s;">
                        <img style="width: 30px; height: auto; margin-right: 10px; border-radius: 4px;" src="' . WEBROOT . 'public/img/' . htmlspecialchars($row['hinhanh']) . '" alt="' . htmlspecialchars($row['tensanpham']) . '">
                        ' . htmlspecialchars($row['tensanpham']) . '
                    </div>
                </a>';


                }
            } else {
                echo "<div>Không tìm thấy sản phẩm</div>";
            }
        } else {
            echo "<div>Dữ liệu không hợp lệ</div>";
        }
    }


}


?>