<?php
require_once dirname(dirname(dirname(__FILE__))) . '/core/controller.php';

class giohangController extends Controller
{
    private $giohangModel;

    public function __construct()
    {
        $this->giohangModel = $this->model('giohangModel');
    }

    public function giohang()
    {
        // Lấy dữ liệu loại sản phẩm
        $loaisp = $this->giohangModel->Getloaisp();
        // Truyền loại sản phẩm vào view 'menu'
        $info = null; // Khởi tạo mặc định
        if (isset($_SESSION['makhachhang'])) {
            $makhachhang = $_SESSION['makhachhang'];
            $info = $this->giohangModel->info($makhachhang);
        }
        $this->view('menu', ['loaisp' => $loaisp, 'info' => $info]);
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

    public function removeItem()
    {

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

    public function checkout()
    {
        $thanhtoan = isset($_SESSION['giohang']) ? $_SESSION['giohang'] : [];
        $makhachhang = $_SESSION['makhachhang'];
        $coupon = $this->giohangModel->Getcoupon($makhachhang);
        $loaisp = $this->giohangModel->Getloaisp();
        $info = $this->giohangModel->info($makhachhang);
        $this->view('menu', ['loaisp' => $loaisp, 'info' => $info]);
        // Truyền giỏ hàng vào view 'thanhtoan'
        $this->view('thanhtoan/thanhtoan', ['thanhtoan' => $thanhtoan, 'coupon' => $coupon]);
    }

    public function muangay($masp)
    {
        if (isset($_SESSION['sdt'])) {
            $masanpham = $masp;
            $loaisp = $this->giohangModel->Getloaisp();
            $soluong = $_POST['soluong'];
            $_SESSION['slmuangay'] = $soluong;
            $thanhtoan = $this->giohangModel->layspmuangay($masanpham);
            if (!$thanhtoan) {
                die("Không tìm thấy sản phẩm với mã: $masanpham");
            }
            $makhachhang = $_SESSION['makhachhang'];
            $coupon = $this->giohangModel->Getcoupon($makhachhang);
            $info = $this->giohangModel->info($makhachhang);
            $this->view('menu', ['loaisp' => $loaisp, 'info' => $info]);
            $this->view('thanhtoan/muangay', ['thanhtoan' => $thanhtoan, 'soluong' => $soluong, 'masp' => $masp, 'coupon' => $coupon]);
            $this->view('footer');
        } else {
            header('Location: ' . WEBROOT . 'taikhoan/login');
            exit();
        }
    }


    public function tienhanhthanhtoan($masp)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $loaisp = $this->giohangModel->Getloaisp();
            // Lấy dữ liệu từ form
            $sdt = $_POST['sdt'];
            $hoten_nhan = $_POST['hoten_nhan'];
            $diachi_nhan = $_POST['diachi_nhan'];
            $phuong_thuc = $_POST['phuong_thuc'];
            $soluong = $_POST['soluong'];
            $tongTien = $_POST['tongTien'];
            $Ngay_tao = date('Y-m-d H:i:s');
            $this->giohangModel->themmuangay($sdt, $hoten_nhan, $diachi_nhan, $phuong_thuc, $tongTien, $Ngay_tao);

            $aaaa = $this->giohangModel->layid_giohang($sdt);
            $chothe = mysqli_fetch_array($aaaa);
            $id_giohang = $chothe['maxid'];
            $data = $this->giohangModel->Getttinsanpham($masp);
            $row = mysqli_fetch_array($data);
            $don_gia = $row['giagoc'];

            $tensanpham = $row['tensanpham'];
            $this->giohangModel->themchitietmuangay($id_giohang, $masp, $tensanpham, $soluong, $don_gia);
            $this->giohangModel->updatesolgmuangay($masp, $soluong);


            if ($phuong_thuc == 'chuyen_khoan') {
                // Gọi hàm generateQRCode để tạo mã QR cho chuyển khoản


            } else if ($phuong_thuc == 'tien_mat') {
                echo "<script>alert('Đơn hàng sẽ được giao và thanh toán khi nhận hàng.');</script>";
            }
            header("location: /inis/giohang/hoanthanhthanhtoan/$id_giohang");
        }
    }

    public function tienhanhthanhtoangiohang()
    {
        $mahoadon = $this->genUUIDv4();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy thông tin từ form
            $sdt = $_POST['sdt'] ?? '';
            $hoten_nhan = $_POST['hoten_nhan'] ?? '';
            $diachi_nhan = $_POST['diachi_nhan'] ?? '';
            $phuong_thuc = $_POST['phuong_thuc'] ?? '';
            $tongtien = $_POST['tongtien'];
            $giamgia = $_POST['giamgia'];
            $tong_thanhtoan = $_POST['tong_thanhtoan'];
            $ngay_tao = date('Y-m-d H:i:s');

            // Lấy mã khách hàng từ session (phải có đăng nhập)
            $makhachhang = $_SESSION['makhachhang'] ?? 'KH0000';

            // Thêm đơn hàng và lấy mã hóa đơn vừa tạo
            $result = $this->giohangModel->addOrder($mahoadon, $makhachhang, $tongtien, $giamgia, $tong_thanhtoan, $hoten_nhan, $sdt, $diachi_nhan, $phuong_thuc, $ngay_tao);

            if ($result) {
                if (!empty($_SESSION['giohang'])) {
                    foreach ($_SESSION['giohang'] as $masanpham => $sanpham) {
                        $soluong = $sanpham['soluong'];
                        $giagoc = $sanpham['giagoc'];
                        $this->giohangModel->addOrderDetail($mahoadon, $masanpham, $soluong, $giagoc);

                        if ($_POST['phuong_thuc'] === 'vnpay_qr') {
                            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                            $vnp_Returnurl = "inis-hvnh.site/inis/vnpay/return";
                            $vnp_TmnCode = "Z0O9T9AJ"; // Mã TMN từ VNPAY
                            $vnp_HashSecret = "NBWOGA7BHPKQ4IF59MXMPRJOFX1W9QQ5"; // Chuỗi bí mật từ VNPAY
                            $vnp_TxnRef = $mahoadon; // Mã đơn hàng duy nhất
                            $vnp_OrderInfo = $vnp_TxnRef;
                            $vnp_Amount = $_POST['tong_thanhtoan'] * 100; // Nhân 100 vì VNPAY dùng đơn vị VNĐ * 100
                            $vnp_Locale = 'vn';
                            $vnp_BankCode = '';
                            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

                            $inputData = array(
                                "vnp_Version" => "2.1.0",
                                "vnp_TmnCode" => $vnp_TmnCode,
                                "vnp_Amount" => $vnp_Amount,
                                "vnp_Command" => "pay",
                                "vnp_CreateDate" => date('YmdHis'),
                                "vnp_CurrCode" => "VND",
                                "vnp_IpAddr" => $vnp_IpAddr,
                                "vnp_Locale" => $vnp_Locale,
                                "vnp_OrderInfo" => $vnp_OrderInfo,
                                "vnp_OrderType" => "other",
                                "vnp_ReturnUrl" => $vnp_Returnurl,
                                "vnp_TxnRef" => $vnp_TxnRef
                            );

                            ksort($inputData);
                            $query = "";
                            $i = 0;
                            $hashdata = "";
                            foreach ($inputData as $key => $value) {
                                if ($i == 1) {
                                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                                } else {
                                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                                    $i = 1;
                                }
                                $query .= urlencode($key) . "=" . urlencode($value) . '&';
                            }

                            $vnp_Url .= "?" . $query;
                            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
                            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;

                            header('Location: ' . $vnp_Url);
                            exit();
                        }

                        unset($_SESSION['giohang']);
                    }
                }

                header("Location: " . WEBROOT . "giohang/hoanthanhthanhtoan/$mahoadon");
                exit();
            } else {
                die("Lỗi: Không thể tạo đơn hàng.");
            }
        } else {
            die("Lỗi: Phương thức không hợp lệ.");
        }
    }

    public function getCartCount()
    {
        $cartCount = 0;
        if (isset($_SESSION['giohang']) && !empty($_SESSION['giohang'])) {
            foreach ($_SESSION['giohang'] as $item) {
                $cartCount += $item['soluong'];
            }
        }
        echo $cartCount;
        exit;
    }

    public function updateQuantity()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $masanpham = $_POST['masanpham'];
            $soluong = (int)$_POST['soluong'];

            // Kiểm tra số lượng tồn kho trước khi cập nhật
            $sanpham = $this->giohangModel->Getttinsanpham($masanpham);
            if ($row = mysqli_fetch_assoc($sanpham)) {
                $soluongTonKho = $row['soluongtonkho']; // Giả sử có cột soluongtonkho trong bảng sản phẩm

                if ($soluong <= $soluongTonKho) {
                    // Cập nhật số lượng trong session nếu hợp lệ
                    if (isset($_SESSION['giohang'])) {
                        foreach ($_SESSION['giohang'] as &$item) {
                            if ($item['masanpham'] === $masanpham) {
                                $item['soluong'] = $soluong;
                                break;
                            }
                        }
                    }
                    echo json_encode(['status' => 'success']);
                } else {
                    echo json_encode([
                        'status' => 'error',
                        'message' => 'Số lượng vượt quá tồn kho',
                        'available' => $soluongTonKho
                    ]);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Không tìm thấy sản phẩm']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Yêu cầu không hợp lệ']);
        }
        exit;
    }

    public function checkQuantity()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $masanpham = $_POST['masanpham'];
            $soluong = (int)$_POST['soluong'];

            // Lấy thông tin sản phẩm từ database
            $sanpham = $this->giohangModel->Getttinsanpham($masanpham);
            if ($row = mysqli_fetch_assoc($sanpham)) {
                $soluongTonKho = $row['soluongtonkho']; // Giả sử có cột soluongtonkho

                if ($soluong <= $soluongTonKho) {
                    echo json_encode(['status' => 'success']);
                } else {
                    echo json_encode([
                        'status' => 'error',
                        'available' => $soluongTonKho
                    ]);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Không tìm thấy sản phẩm']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Yêu cầu không hợp lệ']);
        }
        exit;
    }

    public function themgh($masanpham)
    {
        $sanpham = $this->giohangModel->Getttinsanpham($masanpham);
        if ($row = mysqli_fetch_assoc($sanpham)) {
            $soluongTonKho = $row['soluongtonkho'];
            $soluong = isset($_POST['soluong']) ? (int)$_POST['soluong'] : 1;

            // Kiểm tra số lượng tồn kho
            $currentQty = isset($_SESSION['giohang'][$masanpham]) ? $_SESSION['giohang'][$masanpham]['soluong'] : 0;
            $newQty = $currentQty + $soluong;

            if ($newQty <= $soluongTonKho) {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }

                $tensanpham = $row['tensanpham'];
                $giagoc = $row['giagoc'];
                $hinhanh = $row['hinhanh'];

                if (!isset($_SESSION['giohang'])) {
                    $_SESSION['giohang'] = [];
                }

                if (isset($_SESSION['giohang'][$masanpham])) {
                    $_SESSION['giohang'][$masanpham]['soluong'] = $newQty;
                } else {
                    $_SESSION['giohang'][$masanpham] = [
                        'masanpham' => $masanpham,
                        'tensanpham' => $tensanpham,
                        'giagoc' => $giagoc,
                        'hinhanh' => $hinhanh,
                        'soluong' => $soluong,
                    ];
                }
                $_SESSION['flash_message'] = "Sản phẩm đã được thêm vào giỏ hàng.";
                $redirectUrl = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : WEBROOT . 'trangchu/trangchu';
                header("Location: $redirectUrl");
            } else {
                $_SESSION['flash_message'] = "Số lượng vượt quá tồn kho. Còn lại: $soluongTonKho sản phẩm.";
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
            exit();
        }
        header("Location: " . WEBROOT . "trangchu/trangchu");
        exit();
    }

    function genUUIDv4() {
        $data = random_bytes(16);

        $data[6] = chr((ord($data[6]) & 0x0f) | 0x40);
        // Đặt variant thành 10xx
        $data[8] = chr((ord($data[8]) & 0x3f) | 0x80);

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}
