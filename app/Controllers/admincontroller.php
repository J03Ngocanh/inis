<?php 
require_once 'core/Controller.php';
// require_once 'app/models/sanpham.php';

class adminController extends Controller {
    private $adminModel;
    public function __construct() {
         $this->adminModel = $this->model('adminModel');
    } 

    public function tongquan(){
        $this->view('header');
        $this->view('admin/dashboard');
    }
    public function nhanvien(){
        $listnv = $this->adminModel->getlistnv();
      $this->view('header');
         $this->view('admin/listnv',['listnv' => $listnv]);
    }
    public function khachhang(){
        $listkh = $this->adminModel->getlistkh();
       $this->view('header');
        $this->view('admin/listkh', ['listkh' => $listkh]);
   }
   public function donhang(){
    $this->view('header');
    $this->view('admin/listddh');
}

    public function sanpham() {
        $listsp=$this->adminModel->getlistsanpham();
        $danhmucsp= $this->adminModel->getdanhmuc();
    
         $this->view('header');
        $this->view('admin/listsp',['listsp' => $listsp, 'danhmucsp'=> $danhmucsp, 'laysp'=>$laysp]);
    }
    

    public function xulysuasanpham() {
        $tensanpham = $_POST['tensanpham'];
        $id_danhmuc= $_POST['danh_muc'];
        $soluong= $_POST['so_luong'];
        $giagoc=$_POST['gia'];
        $masanpham=$_POST['masanpham'];
        $mota=$_POST['mota'];
        $result=$this->adminModel->getsanpham($masanpham);
        $row= mysqli_fetch_array($result);
        $hinhanh=$row['hinhanh'];
        if(isset($_FILES['hinhanh']) && $_FILES['hinhanh']['name'] != ''){
            $hinhanh = $_FILES['hinhanh']['name'];
            $file_tmp =$_FILES['hinhanh']['tmp_name'];  
            move_uploaded_file($file_tmp,"public/img/".$hinhanh);
         }

       $this->adminModel->suasanpham($tensanpham,$id_danhmuc,$soluong,$giagoc,$mota,$hinhanh);
        

        $_SESSION['thanhcong']="Bạn đã sửa thành công sản phẩm mã: $masanpham , tên: $tensanpham ";
         header("location: /inis/admin/suasp/$masanpham");




    }


    public function xulythemsanpham() {
        $masanpham=$_POST['masanpham'];
        $tensanpham = $_POST['tensanpham'];
        $id_danhmuc= $_POST['danh_muc'];
        $soluong= $_POST['so_luong'];
        $giagoc=$_POST['gia'];
        $mota=$_POST['mota'];
        $hinhanh='';
        if(isset($_FILES['hinhanh']) && $_FILES['hinhanh']['name'] != ''){
            $hinhanh = $_FILES['hinhanh']['name'];
            $file_tmp =$_FILES['hinhanh']['tmp_name'];  
            move_uploaded_file($file_tmp,"public/img/".$hinhanh);
         }
         
         $this->adminModel->themsanpham($id_danhmuc,$tensanpham,$mota,$giagoc,$hinhanh,$soluong);
        $_SESSION['thanhcong']="Bạn đã thêm thành công sản phẩm: $tensanpham ";
        header("location: /inis/admin/sanpham");




    }
    public function xoasp($masanpham) {
        $this->adminModel->xoasanpham($masanpham);
        $_SESSION['thanhcong']="Bạn đã xóa thành công sản phẩm mã: $masanpham  ";
        header("location: /inis/admin/sanpham");
    }
    
    
    public function listddh() {
        $listddh=$this->adminModel->getddh();
        $chitietddh=$this->adminModel->chitietdonhang();
        $this->view('admin/listddh',['listddh'=>$listddh , 'ctddh' => $chitietddh ]);

    }
    public function xulyxacnhan($id_giohang) {
        $this->adminModel->xacnhan($id_giohang);
        header("location: /inis/admin/listddh");

    }
    public function dashboard(){
      $doanhthu = $this->adminModel->doanhthu();
      $sanphamsaphet = $this->adminModel->sanphamsaphet();
    
        $this->view('admin/dashboard',['doanhthu'=>$doanhthu, 'sanphamsaphet' => $sanphamsaphet]);

    }
    public function getDoanhThuJSON() {
        $month = isset($_POST['month']) ? $_POST['month'] : null; // Get the selected month from POST
        $doanhthu = $this->adminModel->doanhthu($month); // Pass the month to the model
        echo json_encode($doanhthu);
    }
    
}





?>