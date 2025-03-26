<?php 
require_once './core/model.php';
class adminModel extends Model {
   protected $tblsanpham="sanpham";
   protected $tblnhanvien="nhanvien";
   protected $tblkhachhang="khachhang";
   protected $tblrole = "role";
   protected $tblrank = "rank";
   protected $tbldanhmucsp = "danhmucsp";
   protected $tblloaisp='loaisp';
    protected $tbldonhang = "hoadon";
    protected $tblchitietdonhang = "chitiethoadon";


   public fUNCTION getlistsanpham(){
      $sql = "SELECT * FROM $this->tblsanpham ";
      $result = $this->con->query($sql);
      return $result;
  }
    public function getlistnv() {
        $sql = "SELECT nv.*, r.ten FROM nhanvien nv 
                LEFT JOIN role r ON nv.id_role = r.id_role";
        return $this->con->query($sql);
    }

    public function getRoles() {
        $sql = "SELECT * FROM role";
        return $this->con->query($sql);
    }
  public fUNCTION getsanpham($masanpham){
   $sql = "SELECT * FROM $this->tblsanpham WHERE masanpham='$masanpham' ";
   $result = $this->con->query($sql);
   return $result;
}
public function getlistkh(){
   $sql = "SELECT * FROM $this->tblkhachhang INNER JOIN $this->tblrank ON $this->tblkhachhang.id_rank = $this->tblrank.id_rank";
   $result = $this->con->query($sql);
   return $result;
}
public fUNCTION getdanhmuc(){
   $sql = "SELECT * FROM $this->tbldanhmucsp  ";
   $result = $this->con->query($sql);
   return $result;
}

    public function suasanpham($masanpham, $tensanpham, $id_danhmuc, $soluong, $giagoc, $mota, $hinhanh, $hinhanh1, $hinhanh2, $hinhanh3, $hinhanh4) {
        $sql = "UPDATE sanpham SET 
            tensanpham = '$tensanpham', 
            id_danhmuc = '$id_danhmuc', 
            soluong = '$soluong', 
            giagoc = '$giagoc', 
            mota = '$mota', 
            hinhanh = '$hinhanh', 
            hinhanh1 = '$hinhanh1', 
            hinhanh2 = '$hinhanh2', 
            hinhanh3 = '$hinhanh3', 
            hinhanh4 = '$hinhanh4' 
            WHERE masanpham = '$masanpham'";
        // echo $sql; // Để debug, có thể bỏ comment khi cần kiểm tra
        $result = $this->con->query($sql);
        return $result;
    }

    public function themsanpham($id_danhmuc, $tensanpham, $mota, $giagoc, $hinhanh, $hinhanh1, $hinhanh2, $hinhanh3, $hinhanh4, $soluong) {
        $ngay_them = date('Y-m-d H:i:s'); // Lấy thời gian hiện tại
        $sql = "INSERT INTO sanpham (id_danhmuc, tensanpham, mota, giagoc, hinhanh, hinhanh1, hinhanh2, hinhanh3, hinhanh4, soluong, ngay_them) 
            VALUES ('$id_danhmuc', '$tensanpham', '$mota', '$giagoc', '$hinhanh', '$hinhanh1', '$hinhanh2', '$hinhanh3', '$hinhanh4', '$soluong', '$ngay_them')";
        $result = $this->con->query($sql);
        return $result;
    }

public fUNCTION checkmasanpham($masanpham){
   $sql = "SELECT * FROM $this->tblsanpham WHERE masanpham='$masanpham' ";
   $result = $this->con->query($sql);
   return $result;
}

public fUNCTION xoasanpham($masanpham){
   $sql = "DELETE FROM $this->tblsanpham  WHERE masanpham='$masanpham' ";
   $result = $this->con->query($sql);
   return $result;
}
public fUNCTION getddh(){
   $sql = "SELECT * FROM $this->tbldonhang";
   $result = $this->con->query($sql);
   return $result;
}

public fUNCTION xacnhan($id_giohang){
   $sql = " UPDATE $this->tblgiohang  SET trangthai='Đã thanh toán' WHERE id_giohang=  $id_giohang ";
   $result = $this->con->query($sql);
   return $result;
}
public function chitietdonhang(){
   $sql = "SELECT $this->tblchitietdonhang.*, $this->tblsanpham.hinhanh, $this->tblsanpham.tensanpham FROM $this->tblchitietdonhang INNER JOIN $this->tblsanpham
   ON $this->tblchitietdonhang.masanpham = $this->tblsanpham.masanpham";
   $result = $this->con->query($sql);
   return $result;
}

    public function getnhanvien($manhanvien) {
        $sql = "SELECT nv.*, r.ten FROM nhanvien nv 
                LEFT JOIN role r ON nv.id_role = r.id_role 
                WHERE nv.Manhanvien = '$manhanvien'";
        return $this->con->query($sql);
    }

    public function getLastNhanvien() {
        $sql = "SELECT Manhanvien FROM nhanvien ORDER BY Manhanvien DESC LIMIT 1";
        $result = $this->con->query($sql);
        return $result->fetch_assoc();
    }

    public function themnhanvien($manhanvien, $tennhanvien, $sdt, $password, $id_role) {
        $sql = "INSERT INTO nhanvien (Manhanvien, Tennhanvien, sdt, password, id_role, trangthai) 
                VALUES ('$manhanvien', '$tennhanvien', '$sdt', '$password', '$id_role', 1)";
        return $this->con->query($sql);
    }

    public function suanhanvien($manhanvien, $tennhanvien, $sdt, $password, $id_role) {
        $sql = "UPDATE nhanvien SET 
                Tennhanvien = '$tennhanvien', 
                sdt = '$sdt', 
                id_role = '$id_role'";
        if ($password) {
            $sql .= ", password = '$password'";
        }
        $sql .= " WHERE Manhanvien = '$manhanvien'";
        return $this->con->query($sql);
    }

    public function updatetrangthai($manhanvien, $trangthai) {
        $sql = "UPDATE nhanvien SET trangthai = '$trangthai' WHERE Manhanvien = '$manhanvien'";
        return $this->con->query($sql);
    }

// SELECT 
//                 DATE(ngaydat) AS ngay,
//                 SUM(tongtien) AS doanhthu
//             FROM $this->tabledondathang
//             WHERE active = 1";

//     if ($month) {
//         $sql .= " AND DATE_FORMAT(ngaydat, '%Y-%m') = ?"; // Filter by month
//     }

//     $sql .= " GROUP BY DATE(ngaydat)
//               ORDER BY ngay ASC";

//     $stmt = $this->con->prepare($sql);
//     if ($month) {
//         $stmt->bind_param("s", $month);
//     }
//     $stmt->execute();
//     $result = $stmt->get_result();
//     $data = [];
//     while ($row = $result->fetch_assoc()) {
//         $data[] = $row;
//     }

//     return $data;

   // Phương thức lấy doanh thu theo tháng và năm
   public function doanhthu($month = null){
       // Lấy tất cả các dữ liệu về tháng và năm từ bảng orders
       $sql = "SELECT 
            DATE(ngay_tao) AS ngay, 
            SUM(tongtien) AS doanhthu 
        FROM $this->tblgiohang 
        WHERE ((phuong_thuc = 'chuyen_khoan' AND trangthai = 'Đã thanh toán') 
               OR (phuong_thuc = 'tien_mat' AND trangthai = 'Đang xử lý')) 
          AND phuong_thuc IS NOT NULL";
   if ($month) {
      $sql .= " AND DATE_FORMAT(ngay_tao, '%Y-%m') = ?"; // Lọc theo tháng nếu có
  }
  
  $sql .= " GROUP BY DATE(ngay_tao) 
            ORDER BY ngay ASC";
  
  $stmt = $this->con->prepare($sql);
  if ($month) {
      $stmt->bind_param("s", $month);
  }
  
  $stmt->execute();
  $result = $stmt->get_result();
  $data = [];
  
  while ($row = $result->fetch_assoc()) {
      $data[] = $row;
  }
  
  return $data;
  
   }

   public function sanphamsaphet(){
      $sql = "SELECT masanpham, soluong
FROM $this->tblsanpham
WHERE soluong < 15
ORDER BY soluong ASC;
";
$result = $this->con->query($sql);
$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

return $data;

 
   }

 
}


    

?>