<?php
require_once dirname(dirname(dirname(__FILE__))) . '/core/controller.php';

// require_once 'app/models/sanpham.php';

class adminController extends Controller
{
    private $adminModel;

    public function __construct()
    {
        $this->adminModel = $this->model('adminModel');
    }

    public function tongquan()
    {
        if (isset($_SESSION['tennhanvien'])){
        $this->view('header');
        $this->view('admin/dashboard');
        }
        else {
            header("location: /inis/taikhoan/login");
        }
    }

    public function nhanvien()
    {
        if (isset($_SESSION['tennhanvien'])){
        $listnv = $this->adminModel->getlistnv();
        $role = $this->adminModel->getRoles();
        $this->view('header');
        $this->view('admin/listnv', ['listnv' => $listnv, 'role' => $role]);
    }
    else {
        header("location: /inis/taikhoan/login");
    }
    }

    public function khachhang()
    {
        if (isset($_SESSION['tennhanvien'])){
        $listkh = $this->adminModel->getlistkh();
        $this->view('header');
        $this->view('admin/listkh', ['listkh' => $listkh]);
    }
    else {
        header("location: /inis/taikhoan/login");
    }
    }

    public function donhang()
    {
        if (isset($_SESSION['tennhanvien'])){
        $this->view('header');
        $listddh = $this->adminModel->getddh();
        $chitietddh = $this->adminModel->chitietdonhang();
        $this->view('admin/listddh', ['listddh' => $listddh, 'ctddh' => $chitietddh]);
    }
    else {
        header("location: /inis/taikhoan/login");
    }
    }

    public function sanpham()
    {
        $listsp = $this->adminModel->getlistsanpham();
        $danhmucsp = $this->adminModel->getdanhmuc();

        $this->view('header');
        $this->view('admin/listsp', ['listsp' => $listsp, 'danhmucsp' => $danhmucsp, 'laysp' => $laysp]);
//        if (isset($_SESSION['tennhanvien'])){
//        $listsp = $this->adminModel->getlistsanpham();
//        $danhmucsp = $this->adminModel->getdanhmuc();
//
//        $this->view('header');
//        $this->view('admin/listsp', ['listsp' => $listsp, 'danhmucsp' => $danhmucsp, 'laysp' => $laysp]);
//    }
//    else {
//        header("location: /inis/taikhoan/login");
//    }
    }

    public function getProductInfo($masanpham)
    {
        $result = $this->adminModel->getsanpham($masanpham);
        if ($result) {
            return $result;
        } else {
            return null;
        }
    }

    public function xoasp($masanpham)
    {
        $this->adminModel->xoasanpham($masanpham);
        $_SESSION['thanhcong'] = "Bạn đã xóa thành công sản phẩm mã: $masanpham  ";
        header("location: /inis/admin/sanpham");
    }


    public function xulyxacnhan($mahoadon)
    {
        $this->adminModel->xacnhan($mahoadon);
        $result = $this->adminModel->getinfocus($mahoadon);
        if ($row = $result->fetch_assoc()) {  // Sử dụng fetch_assoc() nếu trả về mysqli_result
            $makhachhang = $row['makhachhang'];
            $tongtien = $row['tongtientruocgiam'];
        } else {
            echo 1111;
        }
        $this->adminModel->updatePointsAndRank($makhachhang, $tongtien);
        header("location: /inis/admin/donhang");

    }

    public function dashboard()
    {
        $year = date('Y'); // Năm hiện tại
        $month = date('m'); // Tháng hiện tại
        $doanhthu = $this->adminModel->getDoanhThuTheoNam($year);
        $topsp = $this->adminModel->getTopSanPham($month, $year);
        $sanphamsaphet = $this->adminModel->sanphamsaphet();


        $this->view('header');
        $this->view('admin/dashboard', [
            'doanhthu' => $doanhthu,
            'topsp' => $topsp,
            'sanphamsaphet' => $sanphamsaphet,
            'currentYear' => $year, // Đảm bảo truyền biến này
            'currentMonth' => $month // Đảm bảo truyền biến này
        ]);
    }
    public function getDoanhThuJSON()
    {
        $month = isset($_POST['month']) ? $_POST['month'] : null; // Get the selected month from POST
        $doanhthu = $this->adminModel->doanhthu($month); // Pass the month to the model
        echo json_encode($doanhthu);
    }

    public function edit($masanpham = '')
    {
        if (empty($masanpham)) {
            $_SESSION['error'] = "Không tìm thấy mã sản phẩm!";
            header("location: /inis/admin/sanpham");
            return;
        }

        // Lấy thông tin sản phẩm
        $product = $this->adminModel->getsanpham($masanpham);
        $danhmucsp = $this->adminModel->getdanhmuc();

        if (!$product) {
            $_SESSION['error'] = "Sản phẩm không tồn tại!";
            header("location: /inis/admin/sanpham");
            return;
        }

        $productData = mysqli_fetch_array($product);

        $this->view('header');
        $this->view('admin/editsp', [  // Sửa thành 'admin/edit_product'
            'product' => $productData,
            'danhmucsp' => $danhmucsp
        ]);
    }

    public function xulysuasanpham()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $_SESSION['error'] = "Phương thức không hợp lệ!";
            header("location: /inis/admin/sanpham");
            return;
        }
        $masanpham = $_POST['masanpham'] ?? '';
        $tensanpham = $_POST['tensanpham'] ?? '';
        $id_danhmuc = $_POST['danhmuc'] ?? '';
        $soluong = $_POST['soluong'] ?? '';
        $giagoc = $_POST['gia'] ?? '';
        $mota = $_POST['mota'] ?? '';

        if (empty($masanpham) || empty($tensanpham) || empty($id_danhmuc) || empty($soluong) || empty($giagoc)) {
            $_SESSION['error'] = "Vui lòng điền đầy đủ thông tin bắt buộc!";
            header("location: /inis/admin/edit/$masanpham");
            return;
        }

        // Lấy thông tin sản phẩm hiện tại để giữ ảnh cũ nếu không upload ảnh mới
        $result = $this->adminModel->getsanpham($masanpham);
        $row = mysqli_fetch_array($result);
        $hinhanh = $row['hinhanh'] ?? '';
        $hinhanh1 = $row['hinhanh1'] ?? '';
        $hinhanh2 = $row['hinhanh2'] ?? '';
        $hinhanh3 = $row['hinhanh3'] ?? '';
        $hinhanh4 = $row['hinhanh4'] ?? '';

        // Xử lý 5 ảnh nếu có upload mới
        $imageFields = ['hinhanh', 'hinhanh1', 'hinhanh2', 'hinhanh3', 'hinhanh4'];
        foreach ($imageFields as $field) {
            if (isset($_FILES[$field]) && $_FILES[$field]['name'] != '') {
                $filename = $_FILES[$field]['name'];
                $file_tmp = $_FILES[$field]['tmp_name'];
                move_uploaded_file($file_tmp, "public/img/" . $filename);
                ${$field} = $filename; // Cập nhật giá trị mới
            }
        }

        // Gọi phương thức sửa sản phẩm
        $this->adminModel->suasanpham($masanpham, $tensanpham, $id_danhmuc, $soluong, $giagoc, $mota, $hinhanh, $hinhanh1, $hinhanh2, $hinhanh3, $hinhanh4);

        $_SESSION['thanhcong'] = "Bạn đã sửa thành công sản phẩm mã: $masanpham, tên: $tensanpham";
        header("location: /inis/admin/sanpham");
    }

    public function add()
    {
        $danhmucsp = $this->adminModel->getdanhmuc();

        $this->view('header');
        $this->view('admin/themsp', [
            'danhmucsp' => $danhmucsp
        ]);
    }

    public function xulythemsanpham()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $_SESSION['error'] = "Phương thức không hợp lệ!";
            header("location: /inis/admin/sanpham");
            return;
        }

        // Lấy dữ liệu từ form
        $tensanpham = $_POST['tensanpham'] ?? '';
        $id_danhmuc = $_POST['danhmuc'] ?? '';
        $soluong = $_POST['soluong'] ?? '';
        $giagoc = $_POST['gia'] ?? '';
        $mota = $_POST['mota'] ?? '';

        // Kiểm tra các trường bắt buộc
        if (empty($tensanpham) || empty($id_danhmuc) || empty($soluong) || empty($giagoc)) {
            $_SESSION['error'] = "Vui lòng điền đầy đủ thông tin bắt buộc!";
            header("location: /inis/admin/add");
            return;
        }

        // Xử lý 5 ảnh
        $hinhanh = '';
        $hinhanh1 = '';
        $hinhanh2 = '';
        $hinhanh3 = '';
        $hinhanh4 = '';

        $imageFields = ['hinhanh', 'hinhanh1', 'hinhanh2', 'hinhanh3', 'hinhanh4'];
        foreach ($imageFields as $field) {
            if (isset($_FILES[$field]) && $_FILES[$field]['name'] != '') {
                $filename = $_FILES[$field]['name'];
                $file_tmp = $_FILES[$field]['tmp_name'];
                move_uploaded_file($file_tmp, "public/img/" . $filename);
                ${$field} = $filename;
            }
        }

        // Gọi phương thức thêm sản phẩm với 10 tham số
        $this->adminModel->themsanpham($id_danhmuc, $tensanpham, $mota, $giagoc, $hinhanh, $hinhanh1, $hinhanh2, $hinhanh3, $hinhanh4, $soluong);

        $_SESSION['thanhcong'] = "Bạn đã thêm thành công sản phẩm: $tensanpham";
        header("location: /inis/admin/sanpham");
    }

    public function addnv()
    {
        $role = $this->adminModel->getRoles();
        //  $this->view('header');
        $this->view('admin/add_nv', ['role' => $role]);
    }

    public function xulythemnv()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(["success" => false, "message" => "Phương thức không hợp lệ!"]);
            return;
        }

        // Lấy dữ liệu từ POST
        $tennhanvien = trim($_POST['tennhanvien'] ?? '');
        $sdt = trim($_POST['sdt'] ?? '');
        $password = $_POST['password'] ?? '';
        $mat_khau_2 = $_POST['mat_khau_2'] ?? '';
        $id_role = $_POST['id_role'] ?? '';

        // Kiểm tra dữ liệu đầu vào
        if (empty($tennhanvien) || empty($sdt) || empty($password) || empty($id_role)) {
            echo json_encode(["success" => false, "message" => "Vui lòng điền đầy đủ thông tin bắt buộc!"]);
            return;
        }

        if ($password !== $mat_khau_2) {
            echo json_encode(["success" => false, "message" => "Mật khẩu không khớp!"]);
            return;
        }

        if (!preg_match("/^0[0-9]{9,10}$/", $sdt)) {
            echo json_encode(["success" => false, "message" => "Số điện thoại không hợp lệ!"]);
            return;
        }

        // Kiểm tra số điện thoại đã tồn tại chưa
        if (mysqli_num_rows($this->adminModel->checksdt($sdt)) > 0) {
            echo json_encode(["success" => false, "message" => "Số điện thoại này đã được sử dụng!"]);
            return;
        }

        // Hash mật khẩu
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Thêm tài khoản vào database
        $this->adminModel->themnhanvien($tennhanvien, $sdt, $hashed_password, $id_role);

        // Xóa session không cần thiết
        unset($_SESSION['hienthitennhanvien'], $_SESSION['trungsdt'], $_SESSION['hienthisdt'],
            $_SESSION['trungemail'], $_SESSION['hienthiemail'], $_SESSION['hienthipass']);

        // Trả về JSON để hiển thị popup
        echo json_encode([
            "success" => true,
            "message" => "Thêm nhân viên $tennhanvien thành công!",
            "redirect" => "/inis/admin/nhanvien"
        ]);
        exit;
    }


    public function editnv($manhanvien = '')
    {
        if (empty($manhanvien)) {
            $_SESSION['error'] = "Không tìm thấy mã nhân viên!";
            header("location: /inis/admin/nhanvien");
            return;
        }

        $nhanvien = $this->adminModel->getnhanvien($manhanvien);
        $role = $this->adminModel->getRoles();

        if (!$nhanvien) {
            $_SESSION['error'] = "Nhân viên không tồn tại!";
            header("location: /inis/admin/nhanvien");
            return;
        }

        $nvData = mysqli_fetch_array($nhanvien);
        $this->view('header');
        $this->view('admin/edit_nv', ['nhanvien' => $nvData, 'role' => $role]);
    }

    public function xulysuanv()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $_SESSION['error'] = "Phương thức không hợp lệ!";
            header("location: /inis/admin/nhanvien");
            return;
        }

        $manhanvien = $_POST['manhanvien'] ?? '';
        $tennhanvien = $_POST['tennhanvien'] ?? '';
        $sdt = $_POST['sdt'] ?? '';
        $password = $_POST['password'] ?? '';
        $mat_khau_2 = $_POST['mat_khau_2'] ?? '';
        $id_role = $_POST['id_role'] ?? '';

        if (empty($manhanvien) || empty($tennhanvien) || empty($sdt) || empty($id_role)) {
            $_SESSION['error'] = "Vui lòng điền đầy đủ thông tin bắt buộc!";
            header("location: /inis/admin/editnv/$manhanvien");
            return;
        }

        if ($password && $password !== $mat_khau_2) {
            $_SESSION['error'] = "Mật khẩu không khớp!";
            header("location: /inis/admin/editnv/$manhanvien");
            return;
        }

        if (!preg_match("/^0[0-9]{9,10}$/", $sdt)) {
            $_SESSION['error'] = "Số điện thoại không hợp lệ!";
            header("location: /inis/admin/editnv/$manhanvien");
            return;
        }

        $hashed_password = $password ? password_hash($password, PASSWORD_DEFAULT) : null;
        $this->adminModel->suanhanvien($manhanvien, $tennhanvien, $sdt, $hashed_password, $id_role);

        $_SESSION['thanhcong'] = "Sửa nhân viên $tennhanvien thành công!";
        header("location: /inis/admin/nhanvien");
    }

    public function updatetrangthai()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false]);
            return;
        }

        $manhanvien = $_POST['manhanvien'] ?? '';
        $trangthai = $_POST['trangthai'] ?? '';

        if (empty($manhanvien) || !in_array($trangthai, ['0', '1'])) {
            echo json_encode(['success' => false]);
            return;
        }

        $this->adminModel->updatetrangthai($manhanvien, $trangthai);
        echo json_encode(['success' => true]);
    }

    // Trong adminController.php

    public function getDoanhThuTheoNamJSON() {
        // Đặt header để đảm bảo trả về JSON
        header('Content-Type: application/json; charset=UTF-8');

        $year = isset($_POST['year']) ? (int)$_POST['year'] : date('Y');
        $doanhthu = $this->adminModel->getDoanhThuTheoNam($year);

        // Trả về JSON và thoát
        echo json_encode(['data' => array_values($doanhthu)]);
        exit;
    }

    public function getTopSanPhamJSON() {
        // Đặt header để đảm bảo trả về JSON
        header('Content-Type: application/json; charset=UTF-8');

        $month = isset($_POST['month']) ? (int)$_POST['month'] : date('m');
        $year = isset($_POST['year']) ? (int)$_POST['year'] : date('Y');
        $topsp = $this->adminModel->getTopSanPham($month, $year);

        // Trả về JSON và thoát
        echo json_encode($topsp);
        exit;
    }
    public function getTopSanPhamStock(){       
        $topspstock = $this->adminModel->getTopSanPhamSH();
        // Trả về JSON và thoát
        echo json_encode($topspstock);
        exit;

    }
}