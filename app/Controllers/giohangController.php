<?php
require_once 'core/Controller.php';
//require_once 'app/models/giohangModel.php';
class giohangController extends Controller {
    private $giohangModel;

    public function __construct() {
        $this->giohangModel = $this->model('giohangModel');
    }


    public function trangchu() {
     // Lấy dữ liệu loại sản phẩm
     $loaisp = $this->giohangModel->Getloaisp(); 
     // Truyền loại sản phẩm vào view 'menu'
     $this->view('menu', ['loaisp' => $loaisp]);
     // Kiểm tra xem người dùng đã đăng nhập chưa
     if (isset($_SESSION['sdt'])) {
         $sdt = $_SESSION['sdt']; // Lấy số điện thoại từ session
 
         // Kiểm tra xem giỏ hàng đã có trong session chưa
         $data['giohang'] = isset($_SESSION['giohang']) ? $_SESSION['giohang'] : [];
 
         // Truyền dữ liệu giỏ hàng vào view 'giohang/giohang'
         $this->view('giohang/giohang', ['giohang' => $data['giohang']]);
     } else {
         // Nếu chưa đăng nhập, có thể điều hướng đến trang đăng nhập hoặc giỏ hàng trống
         $this->view('taikhoan/login');
     }
 }

 public function themgh($masanpham) {
    // Truy vấn thông tin sản phẩm từ database
    $sanpham = $this->giohangModel->Getttinsanpham($masanpham);
    if ($row = mysqli_fetch_assoc($sanpham)) {
        // Bắt đầu session nếu chưa bắt đầu
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Lấy thông tin sản phẩm từ kết quả truy vấn
        $tensanpham = $row['tensanpham'];
        $giagoc = $row['giagoc'];
        $hinhanh = $row['hinhanh']; // Đảm bảo bạn có cột 'hinhanh' trong DB
        $soluong = isset($_POST['soluong']) ? $_POST['soluong'] : 1;  // Nếu không có số lượng trong POST, mặc định là 1

        // Kiểm tra xem giỏ hàng đã có trong session chưa
        if (!isset($_SESSION['giohang'])) {
            $_SESSION['giohang'] = [];
        }

        // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng
        if (isset($_SESSION['giohang'][$masanpham])) {
            $_SESSION['giohang'][$masanpham]['soluong'] += $soluong;
        } else {
            // Nếu chưa có sản phẩm trong giỏ hàng, thêm mới
            $_SESSION['giohang'][$masanpham] = [
                'masanpham' => $masanpham,
                'tensanpham' => $tensanpham,
                'giagoc' => $giagoc,
                'hinhanh' => $hinhanh,
                'soluong' => $soluong,
            ];
        } 
        // Lưu thông báo vào session
        $_SESSION['flash_message'] = "Sản phẩm đã được thêm vào giỏ hàng.";

        // Điều hướng về trang trước đó
        $redirectUrl = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : WEBROOT . 'trangchu/trangchu';

        header("Location: $redirectUrl");
        exit();
    }

    // Nếu không tìm thấy sản phẩm, quay lại trang chủ
    header("Location: " . WEBROOT . "trangchu/trangchu");
    exit();
}

    
    

    public function removeItem() {
  
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['masanpham'])) {
            $masanpham = $_POST['masanpham'];
            // Kiểm tra và xóa sản phẩm trong giỏ hàng
            if (isset($_SESSION['giohang'][$masanpham])) {
                unset($_SESSION['giohang'][$masanpham]);
            }
        }
        header('Location: /inis/giohang/giohang');
        exit();
    }

    public function checkout(){
        $thanhtoan = isset($_SESSION['giohang']) ? $_SESSION['giohang'] : [];
        if (empty($thanhtoan)) {
            echo "Giỏ hàng trống!";
            return;
        }
        $makhachhang = $_SESSION['makhachhang'];
        $coupon = $this->giohangModel->Getcoupon($makhachhang);
        $loaisp= $this->giohangModel->Getloaisp(); 
        $this->view('menu', ['loaisp' => $loaisp]);
        // Truyền giỏ hàng vào view 'thanhtoan'
        $this->view('thanhtoan/thanhtoan', ['thanhtoan' => $thanhtoan, 'coupon'=> $coupon]);
    }

    public function muangay($masp){
        if(isset($_SESSION['sdt'])){

            $masanpham= $masp;
            $loaisp= $this->giohangModel->Getloaisp();  
            $soluong=$_POST['soluong'];
            $_SESSION['slmuangay']= $soluong;
            $sanphammuangay = $this->giohangModel->layspmuangay($masanpham);
            if (!$sanphammuangay) {
                die("Không tìm thấy sản phẩm với mã: $masanpham");
            }
           $this->view('menu',['loaisp' => $loaisp]);
            $this->view('thanhtoan/thanhtoan',['sanphammuangay' => $sanphammuangay ,  'soluong' => $soluong, 'masp' => $masp ]);
            $this->view('footer');
        }else{
            header('Location: ' . WEBROOT . 'taikhoan/login');
            exit();
        }
       

    }



    public function tienhanhthanhtoan($masp) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $loaisp= $this->giohangModel->Getloaisp();  
            // Lấy dữ liệu từ form
            $sdt = $_POST['sdt'];
            $hoten_nhan = $_POST['hoten_nhan'];
            $diachi_nhan = $_POST['diachi_nhan'];
            $phuong_thuc = $_POST['phuong_thuc'];
            $soluong = $_POST['soluong'];
            $tongTien = $_POST['tongTien'];
            $Ngay_tao = date('Y-m-d H:i:s');
            $this->giohangModel->themmuangay($sdt, $hoten_nhan, $diachi_nhan, $phuong_thuc,$tongTien, $Ngay_tao);

            $aaaa = $this->giohangModel ->layid_giohang($sdt);
            $chothe = mysqli_fetch_array($aaaa);
            $id_giohang = $chothe['maxid'];
            $data = $this->giohangModel->Getttinsanpham($masp);
            $row = mysqli_fetch_array($data);
            $don_gia = $row['giagoc'];
            
            $tensanpham = $row['tensanpham'];
            $this->giohangModel->themchitietmuangay($id_giohang,$masp, $tensanpham,$soluong, $don_gia);
            $this->giohangModel->updatesolgmuangay($masp, $soluong);

         

            if ($phuong_thuc == 'chuyen_khoan') {
                // Gọi hàm generateQRCode để tạo mã QR cho chuyển khoản
        
                

               
            } else if ($phuong_thuc == 'tien_mat') {
               echo "<script>alert('Đơn hàng sẽ được giao và thanh toán khi nhận hàng.');</script>";
        }
         header("location: /inis/giohang/hoanthanhthanhtoan/$id_giohang");
            }
    }

    public function tienhanhthanhtoangiohang() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy thông tin từ form
            $sdt = $_POST['sdt'] ?? '';
            $hoten_nhan = $_POST['hoten_nhan'] ?? '';
            $diachi_nhan = $_POST['diachi_nhan'] ?? '';
            $phuong_thuc = $_POST['phuong_thuc'] ?? '';
            $tongTien = $_POST['tongTien'] ?? 0;
            $ngay_tao = date('Y-m-d H:i:s');
    
            // Lấy mã khách hàng từ session (phải có đăng nhập)
            $makhachhang = $_SESSION['makhachhang'] ?? 'KH0000';
    
            // Thêm đơn hàng và lấy mã hóa đơn vừa tạo
            $mahoadon = $this->giohangModel->addOrder($makhachhang, $tongTien, $hoten_nhan, $sdt, $diachi_nhan, $phuong_thuc, $ngay_tao);
    
            if ($mahoadon) {
                echo $mahoadon;
                if (!empty($_SESSION['giohang'])) {
                    foreach ($_SESSION['giohang'] as $masanpham => $sanpham) {
                        $soluong = $sanpham['soluong'];
                        $giagoc = $sanpham['giagoc'];
                        $this->giohangModel->addOrderDetail($mahoadon, $masanpham, $soluong, $giagoc);
                           // 🎯 Cập nhật điểm và xếp hạng khách hàng
                        $this->giohangModel->updatePointsAndRank($makhachhang, $tongTien);
                        unset($_SESSION['giohang']);
                    }
                }
    
                // Điều hướng đến trang xác nhận đơn hàng
                //header("Location: " . WEBROOT . "giohang/hoanthanhthanhtoan/$mahoadon");
                exit();
            } else {
                die("Lỗi: Không thể tạo đơn hàng.");
            }
        } else {
            die("Lỗi: Phương thức không hợp lệ.");
        }
    }
    
    public function updateQuantity() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $masanpham = $_POST['masanpham'];
            $soluong = (int)$_POST['soluong'];

            // Cập nhật số lượng trong session
            if (isset($_SESSION['giohang'])) {
                foreach ($_SESSION['giohang'] as &$item) {
                    if ($item['masanpham'] === $masanpham) {
                        $item['soluong'] = $soluong;
                        break;
                    }
                }
            }

            // Trả về phản hồi JSON (có thể tùy chỉnh)
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
        }
        exit;
    }
    public function hoanthanhthanhtoan($mahoadon){
        $loaisp= $this->giohangModel->Getloaisp();  
        $this->view('menu',['loaisp' => $loaisp]);
        $ttindonhang = $this->giohangModel->Getttinchitietdonhang($mahoadon);
        $ttinnguoimua = $this->giohangModel->Getttindonhang($mahoadon);
        $this->view('giohang/chitiethoadon' , ['ttindonhang' => $ttindonhang, 'ttinnguoimua' => $ttinnguoimua ]);
        $this->view('footer');
    }
    public function getCartCount() {
        $cartCount = 0;
        if (isset($_SESSION['giohang']) && !empty($_SESSION['giohang'])) {
            foreach ($_SESSION['giohang'] as $item) {
                $cartCount += $item['soluong'];
            }
        }
        echo $cartCount;
        exit;
    }
}
