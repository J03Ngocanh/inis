<?php
require_once './core/model.php';
class giohangModel extends Model {
    protected $tblloaisp = "loaisp";
    protected $tblsanpham = "sanpham";
    protected $tblgiohang = "giohang";
    protected $tblkhachhang = "khachhang";
    protected $tblchitietgiohang = "chitiet_giohang";
    protected $tbldonhang = "hoadon";
    protected $tblrank = "rank";
    protected $tblchitietdonhang = "chitiethoadon";


    public function Getttinsanpham($masanpham){
        $sql= "SELECT * FROM $this->tblsanpham WHERE masanpham = '$masanpham'";
        $result = $this->con->query($sql);
        return $result;
    }
    public function Getloaisp(){
        $sql = "SELECT * FROM $this->tblloaisp ";
        $result=$this->con->query($sql);
        return $result;
       }

    // Lấy giỏ hàng của người dùng dựa vào số điện thoại
    public function layGioHang($sdt) {
        $sql = "SELECT 
        ctgh.*, 
        sp.tensanpham, 
        sp.hinhanh, 
        sp.giagoc, ctgh.soluong
    FROM {$this->tblchitietgiohang} AS ctgh 
    INNER JOIN {$this->tblgiohang} AS gh 
        ON ctgh.id_giohang = gh.id_giohang
    INNER JOIN {$this->tblsanpham} AS sp 
        ON ctgh.masanpham = sp.masanpham
    WHERE gh.sdt = '$sdt' AND gh.active = 0";
        $result=$this->con->query($sql);
        return $result;
    }   

    public function Laymagiohang($sdt){
        $sql = "SELECT * FROM $this->tblgiohang WHERE active=0 AND sdt='$sdt'";
        $result=$this->con->query($sql);
        return $result;
    }

    public function checkgiohang($sdt){
        $sql = "SELECT * FROM $this->tblgiohang WHERE sdt = $sdt AND active=0";
        $result=$this->con->query($sql);
        return $result;
    }
    
   public function themchitietmuangay($id_giohang,$masanpham, $tensanpham,$soluong, $don_gia){
    $sql = "INSERT INTO $this->tblchitietgiohang(id_giohang,masanpham,tensanpham,soluong,giagoc) VALUES ($id_giohang,'$masanpham', '$tensanpham', $soluong, $don_gia) ";
    $result=$this->con->query($sql);
    return $result;
   }

   public function layspmuangay($masanpham) {
    $sql = "SELECT * FROM $this->tblsanpham WHERE masanpham = '$masanpham'"; 
    $result=$this->con->query($sql);
    return $result;
   }

   public function giamslsp($soluong,$masanpham){
    $sql ="UPDATE $this->tblsanpham SET soluong= (SELECT soluong FROM $this->tblsanpham WHERE masanpham = '$masanpham' )-$soluong      
    WHERE masanpham='$masanpham' ";
    $result=$this->con->query($sql);
    return $result;
  }

  public function layctgiohang($id_giohang){
    $sql = "SELECT * FROM $this->tblchitietgiohang WHERE id_giohang = $id_giohang ";
    $result=$this->con->query($sql);
    return $result;
  }

  public function thongtinsanphamgiohang($id_giohang){
    $sql = "SELECT $this->tblsanpham.hinhanh, $this->tblsanpham.tensanpham,$this->tblsanpham.giagoc , $this->tblchitietgiohang.* FROM $this->tblchitietgiohang INNER JOIN $this->tblsanpham ON $this->tblchitietgiohang.masanpham= $this->tblsanpham.masanpham   WHERE id_giohang = $id_giohang ";
    $result=$this->con->query($sql);
    return $result;
  }
  public function updatedondathang($tongTien, $id_giohang ,$hoten_nhan, $diachi_nhan, $phuong_thuc, $Ngay_tao) {
    // Kết nối MySQLi (giả sử bạn đã có kết nối $this->con là một đối tượng MySQLi)
    
    // Escape dữ liệu đầu vào để bảo vệ khỏi SQL Injection
    $hoten_nhan = $this->con->real_escape_string($hoten_nhan);
   
    $diachi_nhan = $this->con->real_escape_string($diachi_nhan);
    $phuong_thuc = $this->con->real_escape_string($phuong_thuc);

    // Câu lệnh SQL để chèn dữ liệu vào bảng giỏ hàng
    $sql = "UPDATE $this->tblgiohang 
    SET tongTien= $tongTien, hoten_nhan='$hoten_nhan', diachi_nhan='$diachi_nhan',
    phuong_thuc='$phuong_thuc',Ngay_tao =NOW(), active=1  WHERE id_giohang= $id_giohang";
    $result=$this->con->query($sql);
    return $result;

}
public function Getttinchitietdonhang($mahoadon){
    $sql = "SELECT sp.tensanpham, ctdh.soluong, sp.giagoc FROM $this->tblchitietdonhang ctdh INNER JOIN $this->tblsanpham sp ON ctdh.masanpham = sp.masanpham WHERE mahoadon = '$mahoadon'";
    $result=$this->con->query($sql);
    return $result;
}
public function Getttindonhang($mahoadon){
    $sql = "SELECT * FROM $this->tbldonhang WHERE mahoadon = '$mahoadon'";
    $result=$this->con->query($sql);
    return $result;
}

    public function updatesolgmuangay($masanpham, $soluong) {
        $sql ="UPDATE $this->tblsanpham SET soluong= (SELECT soluong FROM $this->tblsanpham WHERE masanpham = '$masanpham')-$soluong      
        WHERE masanpham='$masanpham'  ";
        $result=$this->con->query($sql);
        return $result;
    }
 public function Laymasanpham($id_giohang) {
    $sql ="SELECT id_giohang, masanpham, soluong FROM $this->tblchitietgiohang 
    WHERE id_giohang=$id_giohang";
    $result=$this->con->query($sql);
    return $result;
    
 }
 public function addOrder($makhachhang, $tongtien, $giamgia, $tong_thanhtoan, $hoten_nhan, $sdt, $diachi_nhan, $phuong_thuc, $ngay_tao) {
    $sql = "INSERT INTO $this->tbldonhang (makhachhang, tongtientruocgiam,giamgia, tongtiensaugiam, hoten_nhan, sdt_nhan, diachi_nhan, pttt, ngaytao) 
            VALUES ('$makhachhang', '$tongtien', $giamgia, $tong_thanhtoan, '$hoten_nhan','$sdt', '$diachi_nhan', '$phuong_thuc', '$ngay_tao')";
    $this->con->query($sql);

    if ($this->con->affected_rows > 0) {
        // Lấy mã hóa đơn mới nhất của khách hàng đang đặt
        $sql_get = "SELECT mahoadon FROM $this->tbldonhang 
                    WHERE makhachhang = '$makhachhang' 
                      AND ngaytao = '$ngay_tao'
                    ORDER BY ngaytao DESC LIMIT 1";

        $result = $this->con->query($sql_get);
        $row = $result->fetch_assoc();
        
        return $row['mahoadon'] ?? false;
    } else {
        return false;
    }
}

public function addOrderDetail($mahoadon, $masanpham, $soluong, $giagoc) {
    $sql = "INSERT INTO $this->tblchitietdonhang (mahoadon, masanpham, soluong, dongia) 
            VALUES ('$mahoadon', '$masanpham', $soluong, $giagoc)";
            echo $sql;

    if ($this->con->query($sql)) {
        return true; // Thành công
    } else {
        return false; // Lỗi
    }
}
    public function Getcoupon($makhachhang){
        $sql = "SELECT discount FROM $this->tblrank r INNER JOIN $this->tblkhachhang kh ON r.id_rank = kh.id_rank WHERE id='$makhachhang'";
        $result=$this->con->query($sql);
        return $result;
    }
}
?>
