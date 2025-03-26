<?php 
require_once 'core/Controller.php';
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
        $this->view('header');
        $this->view('admin/dashboard');
    }

    public function nhanvien()
    {
        $listnv = $this->adminModel->getlistnv();
        $role = $this->adminModel->getRoles();
        $this->view('header');
        $this->view('admin/listnv', ['listnv' => $listnv, 'role' => $role]);
    }

    public function khachhang()
    {
        $listkh = $this->adminModel->getlistkh();
        $this->view('header');
        $this->view('admin/listkh', ['listkh' => $listkh]);
    }

    public function donhang()
    {
       $this->view('header');
        $listddh = $this->adminModel->getddh();
        $chitietddh = $this->adminModel->chitietdonhang();
        $this->view('admin/listddh', ['listddh' => $listddh, 'ctddh' => $chitietddh]);
    }

    public function sanpham()
    {
        $listsp = $this->adminModel->getlistsanpham();
        $danhmucsp = $this->adminModel->getdanhmuc();

        $this->view('header');
        $this->view('admin/listsp', ['listsp' => $listsp, 'danhmucsp' => $danhmucsp, 'laysp' => $laysp]);
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


    public function xulyxacnhan($id_giohang)
    {
        $this->adminModel->xacnhan($id_giohang);
        header("location: /inis/admin/listddh");

    }

    public function dashboard()
    {
        $doanhthu = $this->adminModel->doanhthu();
        $sanphamsaphet = $this->adminModel->sanphamsaphet();

        $this->view('admin/dashboard', ['doanhthu' => $doanhthu, 'sanphamsaphet' => $sanphamsaphet]);

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
        $this->view('header');
        $this->view('admin/add_nv', ['role' => $role]);
    }

    public function xulythemnv() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $_SESSION['error'] = "Phương thức không hợp lệ!";
            header("location: /inis/admin/nhanvien");
            return;
        }

        $tennhanvien = $_POST['tennhanvien'] ?? '';
        $sdt = $_POST['sdt'] ?? '';
        $password = $_POST['password'] ?? '';
        $mat_khau_2 = $_POST['mat_khau_2'] ?? '';
        $id_role = $_POST['id_role'] ?? '';

        if (empty($tennhanvien) || empty($sdt) || empty($password) || empty($id_role)) {
            $_SESSION['error'] = "Vui lòng điền đầy đủ thông tin bắt buộc!";
            header("location: /inis/admin/addnv");
            return;
        }

        if ($password !== $mat_khau_2) {
            $_SESSION['error'] = "Mật khẩu không khớp!";
            header("location: /inis/admin/addnv");
            return;
        }

        if (!preg_match("/^0[0-9]{9,10}$/", $sdt)) {
            $_SESSION['error'] = "Số điện thoại không hợp lệ!";
            header("location: /inis/admin/addnv");
            return;
        }

        // Sinh mã nhân viên tự động (ví dụ: NV002)
        $last_nv = $this->adminModel->getLastNhanvien();
        $last_id = $last_nv ? (int)substr($last_nv['Manhanvien'], 2) : 0;
        $manhanvien = 'NV' . str_pad($last_id + 1, 3, '0', STR_PAD_LEFT);

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $this->adminModel->themnhanvien($manhanvien, $tennhanvien, $sdt, $hashed_password, $id_role);

        $_SESSION['thanhcong'] = "Thêm nhân viên $tennhanvien thành công!";
        header("location: /inis/admin/nhanvien");
    }

    public function editnv($manhanvien = '') {
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

    public function xulysuanv() {
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

    public function updatetrangthai() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false]);
            return;
        }

        $manhanvien = $_POST['Manhanvien'] ?? '';
        $trangthai = $_POST['trangthai'] ?? '';

        if (empty($manhanvien) || !in_array($trangthai, ['0', '1'])) {
            echo json_encode(['success' => false]);
            return;
        }

        $this->adminModel->updatetrangthai($manhanvien, $trangthai);
        echo json_encode(['success' => true]);
    }
}