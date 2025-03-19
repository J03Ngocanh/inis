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
   protected $tblgiohang = "giohang";
   protected $tblchitietgiohang = "chitiet_giohang";

   public fUNCTION getlistsanpham(){
      $sql = "SELECT * FROM $this->tblsanpham ";
      $result = $this->con->query($sql);
      return $result;
  }
  public function getlistnv(){
   $sql = "SELECT * FROM $this->tblnhanvien INNER JOIN $this->tblrole ON $this->tblnhanvien.id_role = $this->tblrole.id_role";
   $result = $this->con->query($sql);
   return $result;
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

public fUNCTION suasanpham($masanpham,$tensanpham,$id_danhmuc,$soluong,$giagoc,$mota,$hinhanh){
   $sql = " UPDATE $this->tblsanpham SET tensanpham='$tensanpham',mota='$mota',giagoc=$giagoc,hinhanh='$hinhanh',soluong=$soluong,id_danhmuc=$id_danhmuc
   WHERE masanpham='$masanpham'";
   echo $sql ;
   $result = $this->con->query($sql);
   return $result;
}
public fUNCTION themsanpham($id_danhmuc,$tensanpham,$mota,$giagoc,$hinhanh,$soluong){
   $sql = "INSERT INTO $this->tblsanpham(id_danhmuc,tensanpham,mota,giagoc,hinhanh,soluong)  
   VALUES($id_danhmuc,'$tensanpham','$mota',$giagoc,'$hinhanh',$soluong)
   ";
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
   $sql = "SELECT * FROM $this->tblgiohang WHERE active=1  ";
   $result = $this->con->query($sql);
   return $result;
}

public fUNCTION xacnhan($id_giohang){
   $sql = " UPDATE $this->tblgiohang  SET trangthai='Đã thanh toán' WHERE id_giohang=  $id_giohang ";
   $result = $this->con->query($sql);
   return $result;
}
public fUNCTION chitietdonhang(){
   $sql = "SELECT $this->tblchitietgiohang.*, $this->tblsanpham.hinhanh  FROM $this->tblchitietgiohang INNER JOIN $this->tblsanpham
   ON $this->tblchitietgiohang.masanpham = $this->tblsanpham.masanpham
       ";
   $result = $this->con->query($sql);
   return $result;
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