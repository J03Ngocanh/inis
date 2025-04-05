<?php
require_once dirname(dirname(dirname(__FILE__))) . '/core/controller.php';//require_once 'app/models/product.php';

require_once dirname(dirname(dirname(__FILE__))) . '/app/models/taikhoan.php';
require_once dirname(dirname(dirname(__FILE__))) . '/app/models/mailer.php';

class taikhoanController extends Controller
{
    private $taikhoanModel;

    public function __construct()
    {
        $this->taikhoanModel = $this->model('taikhoanModel');
    }

    public function forgot()
    {

        $this->view('taikhoan/forgot_password');
    }

    public function login()
    {
        $this->view('taikhoan/login');
    }

    // Hàm xử lý khi người dùng ấn "Gửi mã xác nhận"
    public function forgotPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];

            // Kiểm tra email trong cơ sở dữ liệu
            $user = $this->taikhoanModel->checkEmailExists($email);

            if ($user) {
                // Tạo mã xác nhận
                $verificationCode = rand(100000, 999999);
                if ($this->taikhoanModel->saveVerificationCode($user['id'], $verificationCode)) {
                    // Gửi mã xác nhận qua email (sử dụng PHPMailer hoặc thư viện khác)
                    $mailer = new Mailer();
                    if ($mailer->sendVerificationCode($email, $verificationCode)) {
                        // Lưu email vào session để dùng ở bước xác nhận
                        $_SESSION['email'] = $email;
                        $_SESSION['message'] = "Mã xác nhận đã được gửi đến email của bạn.";
                        $_SESSION['message_type'] = "success";
                        $this->view('taikhoan/verify_code'); // Chuyển tới trang nhập mã xác nhận
                        exit;
                    } else {
                        $_SESSION['message'] = "Không thể gửi email. Vui lòng thử lại.";
                        echo 'hihi';
                        $_SESSION['message_type'] = "error";
                        echo 'hihi';
                        $this->view('taikhoan/forgot_password'); // Quay lại form quên mật khẩu
                        exit;
                    }
                }
            } else {
                $_SESSION['message'] = "Email không tồn tại trong hệ thống.";
                $_SESSION['message_type'] = "error";
                $this->view('taikhoan/forgot_password');
                exit;
            }
        }
    }

    // Hàm xử lý khi người dùng nhập mã xác nhận
    public function verifyCode()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $verificationCode = $_POST['verification_code'];
            $email = $_SESSION['email']; // Lấy email từ session

            // Kiểm tra email trong cơ sở dữ liệu
            $user = $this->taikhoanModel->checkEmailExists($email);

            if ($user) {
                // Kiểm tra mã xác nhận
                if ($this->taikhoanModel->checkVerificationCode($user['id'], $verificationCode)) {
                    // Nếu mã xác nhận đúng, chuyển đến trang thay đổi mật khẩu
                    $_SESSION['message'] = "Mã xác nhận đúng. Bạn có thể thay đổi mật khẩu.";
                    $_SESSION['message_type'] = "success";
                    $this->view('taikhoan/reset_password');
                } else {
                    $_SESSION['message'] = "Mã xác nhận không chính xác.";
                    $_SESSION['message_type'] = "error";
                    $this->view('taikhoan/verify_code');
                }
            } else {
                $_SESSION['message'] = "Email không tồn tại trong hệ thống.";
                $_SESSION['message_type'] = "error";
                $this->view('taikhoan/verify_code');
            }
        }
    }

    public function resetPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_SESSION['email']; // Lấy email từ session
            $newPassword = $_POST['new_password'];
            $confirmPassword = $_POST['confirm_password'];

            if ($newPassword === $confirmPassword) {
                // Mã hóa mật khẩu mới (sử dụng password_hash để bảo mật)
                $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

                // Cập nhật mật khẩu mới vào cơ sở dữ liệu
                $user = $this->taikhoanModel->updatePassword($email, $hashedPassword);

                if ($user) {
                    $_SESSION['message'] = "Mật khẩu đã được thay đổi thành công!";
                    $_SESSION['message_type'] = "success";
                    // Xóa session email khi xong
                    unset($_SESSION['email']);
                    // Redirect về trang đăng nhập hoặc trang nào đó
                    header("Location: /inis/taikhoan/login");
                    exit;
                } else {
                    $_SESSION['message'] = "Có lỗi xảy ra. Vui lòng thử lại.";
                    $_SESSION['message_type'] = "error";
                    $this->view('taikhoan/reset_password');
                    exit;
                }
            } else {
                $_SESSION['message'] = "Mật khẩu và xác nhận mật khẩu không khớp.";
                $_SESSION['message_type'] = "error";
                $this->view('taikhoan/reset_password');
                exit;
            }
        }
    }


    public function xulydangnhap()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $_SESSION['loidangnhap'] = "Phương thức không hợp lệ.";
            $this->view('taikhoan/login');
            return;
        }

        $sdt = $_POST['sdt'] ?? '';
        $password = $_POST['password'] ?? '';
        if (empty($sdt) || empty($password)) {
            $_SESSION['loidangnhap'] = "Vui lòng nhập số điện thoại hoặc email và mật khẩu.";
            $this->view('taikhoan/login');
            return;
        }
        // Kiểm tra khách hàng (sdt hoặc email)
        $check_kh = $this->taikhoanModel->check_kh($sdt);
        if ($check_kh && $row = mysqli_fetch_assoc($check_kh)) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['tenkhachhang'] = $row['tenkhachhang'];
                $_SESSION['sdt'] = $row['sdt']; // Lưu sdt thực tế từ database
                $_SESSION['makhachhang'] = $row['id'];

                if (!empty($_POST['rememberMe'])) {
                    setcookie('login_sdt', $sdt, time() + (7 * 24 * 60 * 60), "/");
                    setcookie('login_password', $password, time() + (7 * 24 * 60 * 60), "/");
                }

                unset($_SESSION['loidangnhap']);
                header('Location: /inis/trangchu/');
                exit();
            } else {
                $_SESSION['loidangnhap'] = "Mật khẩu không đúng";
            }
        } else {
            $check_nv = $this->taikhoanModel->check_nv($sdt);
            if ($check_nv && $row = mysqli_fetch_assoc($check_nv)) {
                if (password_verify($password, $row['password'])) {
                    $_SESSION['tennhanvien'] = $row['tennhanvien']; // Đồng bộ với bảng nhanvien
                    $_SESSION['sdt'] = $row['sdt'];
                    $_SESSION['manhanvien'] = $row['manhanvien']; // Thêm mã nhân viên

                    if (!empty($_POST['rememberMe'])) {
                        setcookie('login_sdt', $sdt, time() + (7 * 24 * 60 * 60), "/");
                        setcookie('login_password', $password, time() + (7 * 24 * 60 * 60), "/");
                    }

                    unset($_SESSION['loidangnhap']);
                    header('Location: /inis/admin/sanpham');
                    exit();
                } else {
                    $_SESSION['loidangnhap'] = "Mật khẩu không đúng ";
                }
            } else {
                $_SESSION['loidangnhap'] = "Không tồn tại tài khoản với số điện thoại này.";
            }
        }
        $this->view('taikhoan/login');
    }

    public function signup()
    {
        $this->view('taikhoan/signup1');
    }


    public function xulydangky()
    {
        $tenkhachhang = $_POST['tenkhachhang'] ?? '';
        $sdt = $_POST['sdt'] ?? '';
        $password = $_POST['password'] ?? '';
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $email = $_POST['email'] ?? '';
        $ngaysinh = $_POST['ngaysinh'] ?? '';
        $id_rank = 1;
        $checksdt = $this->taikhoanModel->check_sdt($sdt);
        $checkemail = $this->taikhoanModel->checkEmailExists($email);
        $i = 0;
        // Kiểm tra số điện thoại có tồn tại không
        if (mysqli_num_rows($checksdt) > 0) {
            $_SESSION['trungsdt'] = "Số điện thoại này đã được sử dụng";
            $i++;
        } else {
            unset($_SESSION['trungsdt']);
            $_SESSION['hienthisdt'] = $sdt;
        }

        if ($checkemail) {
            $_SESSION['trungemail'] = "Email này đã tồn tại";
            $i++;
        } else {
            unset($_SESSION['trungemail']);
            $_SESSION['hienthiemail'] = $email;
        }

        if ($i == 0) {
            $this->taikhoanModel->themtaikhoan($tenkhachhang, $email, $sdt, $ngaysinh, $password_hash, $id_rank);
            $_SESSION['dangky_thanhcong'] = true;

            // Xóa session lưu tạm
            unset($_SESSION['hienthitenkhachhang'], $_SESSION['trungsdt'], $_SESSION['hienthisdt'],
                $_SESSION['trungemail'], $_SESSION['hienthiemail'], $_SESSION['hienthipass']);


            header('Location: /inis/taikhoan/login');
            exit();
        } else {
            $_SESSION['hienthitenkhachhang'] = $tenkhachhang;
            $_SESSION['hienthipass'] = $password;
            header('Location: /inis/taikhoan/signup');
            exit();
        }
    }

    public function xulydangkynv()
    {
        $tennhanvien = $_POST['tennhanvien'];
        $sdt = $_POST['sdt'];
        $password = $_POST['password'];
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $id_role = $_POST['id_role'];


        $check_sdt = $this->taikhoanModel->checksdt($sdt);
        $i = 0;
        if (mysqli_num_rows($check_sdt) > 0) {
            $_SESSION['trungsdt'] = "Số điện thoại này đã được sử dụng";
            $i++;
        } else {
            unset($_SESSION['trungsdt']);
            $_SESSION['hienthisdt'] = $sdt;
        }
        if ($i == 0) {
            $this->taikhoanModel->themtaikhoannv($tennhanvien, $sdt, $password, $id_role);

            // Xóa session lưu tạm
            unset($_SESSION['hienthitennhanvien'], $_SESSION['trungsdt'], $_SESSION['hienthisdt'],
                $_SESSION['trungemail'], $_SESSION['hienthiemail'], $_SESSION['hienthipass']);


        } else {
            $_SESSION['hienthitennhanvien'] = $tennhanvien;
            $_SESSION['hienthipass'] = $password;
        }
    }


    public function logout()
    {
        if (isset($_SESSION['sdt'])) {
            session_destroy();

        }
        header('Location: /inis/taikhoan/login/');
    }


}

?>