<?php
require_once './core/model.php';
class giohangModel extends Model {
    protected $tblloaisp = "loaisp";
    protected $tblsanpham = "sanpham";
    protected $tblgiohang = "giohang";
    protected $tblchitietgiohang = "chitiet_giohang";


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

    public function kiemtrasp($sdt, $masanpham) {
        // Kiểm tra sản phẩm đã tồn tại trong giỏ hàng chưa
        $sql_check = "SELECT * FROM $this->tblchitietgiohang ctgh INNER JOIN $this->tblgiohang gh ON  ctgh.id_giohang = gh.id_giohang  WHERE sdt = $sdt AND masanpham = '$masanpham' AND active=0";
        $result=$this->con->query($sql_check);
        return $result;
    }
       
    public function themgiohang($sdt){
        $sql = "INSERT INTO $this->tblgiohang(active, sdt) VALUES(0,'$sdt') ";
        $result=$this->con->query($sql);
        return $result;
    }
    public function themspgiohang($id_giohang, $masanpham, $tensanpham, $soluong, $don_gia){
           // Nếu chưa tồn tại, thêm mới
           $sql = "INSERT INTO  $this->tblchitietgiohang(id_giohang,masanpham,tensanpham, soluong,giagoc) VALUES ($id_giohang,'$masanpham', '$tensanpham', $soluong, $don_gia)";
           echo $sql ;
           $result=$this->con->query($sql);
           return $result;    
    }

   

    public function xoagiohang($id_giohang, $sdt){
        $sql = "DELETE FROM $this->tblgiohang WHERE sdt  = '$sdt'  AND id_giohang = $id_giohang ";
        $result=$this->con->query($sql);
        return $result;    
    }

    public function xoaspgiohang($id_giohang, $masanpham) {
           $sql_delete = "DELETE FROM $this->tblchitietgiohang WHERE id_giohang  = $id_giohang  AND masanpham = '$masanpham'";
           $result=$this->con->query($sql_delete);
           return $result;    
    }

    public fUNCTION Getchitietgiohang($id_giohang){
        $sql = "SELECT * FROM $this->tblchitietgiohang WHERE id_giohang = $id_giohang";
        $result = $this->con->query($sql);
        return $result;
    }
    public function capnhatsoluong($sdt, $masanpham, $soluong) {
        // Cập nhật số lượng sản phẩm trong giỏ hàng
        $sql = "UPDATE $this->tblchitietgiohang 
                SET soluong = $soluong 
                WHERE masanpham = '$masanpham' AND id_giohang IN (SELECT id_giohang FROM $this->tblgiohang WHERE sdt = '$sdt' AND active = 0)";

        $result = $this->con->query($sql);
        return $result;
    }



    public function capnhattongtien($tongTien, $sdt, $id_giohang){
        $sql = "UPDATE $this->tblgiohang SET tongTien = $tongTien WHERE sdt = '$sdt' AND id_giohang = $id_giohang";
        $result = $this->con->query($sql);
        return $result;
        
    }
    
        //Tính tổng tiền
        public function tinhTongTien($sdt) {
            $sql = "SELECT SUM(ctgh.soluong * ctgh.giagoc) AS tongTien
                    FROM $this->tblgiohang AS gh
                    INNER JOIN $this->tblchitietgiohang AS ctgh ON gh.id_giohang = ctgh.id_giohang
                    WHERE gh.sdt = '$sdt' AND gh.active = 0";
            
            $result = $this->con->query($sql);
           
    
        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc() ;
                $tongTien = $row['tongTien']; 
                return $row['tongTien'];
                }
             else {
                return 0;

            }
        }
    }

    public function themmuangay($sdt, $hoten_nhan, $sdt_nhan, $diachi_nhan, $phuong_thuc, $tongTien, $Ngay_tao) {
        // Kết nối MySQLi (giả sử bạn đã có kết nối $this->con là một đối tượng MySQLi)
        
        // Escape dữ liệu đầu vào để bảo vệ khỏi SQL Injection
        $sdt = $this->con->real_escape_string($sdt);
        $hoten_nhan = $this->con->real_escape_string($hoten_nhan);
        $sdt_nhan = $this->con->real_escape_string($sdt_nhan);
        $diachi_nhan = $this->con->real_escape_string($diachi_nhan);
        $phuong_thuc = $this->con->real_escape_string($phuong_thuc);
    
        // Loại bỏ tất cả ký tự không phải số hoặc dấu chấm trong giá trị tổng tiền
        $tongTien = preg_replace('/[^0-9.]/', '', $tongTien); 
        $tongTien = str_replace('.', '', $tongTien);
        // Kiểm tra lại nếu $tongTien là một số hợp lệ
        if (!is_numeric($tongTien)) {
            echo "Giá trị tổng tiền không hợp lệ!";
            return false;
        }
        
    
        // Câu lệnh SQL để chèn dữ liệu vào bảng giỏ hàng
        $sql = "INSERT INTO $this->tblgiohang(sdt, hoten_nhan, sdt_nhan, diachi_nhan, phuong_thuc, tongTien, Ngay_tao, active)
                VALUES ('$sdt', '$hoten_nhan', '$sdt_nhan', '$diachi_nhan', '$phuong_thuc', $tongTien, NOW(), 1)";
        echo 
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
  public function updatedondathang($tongTien, $id_giohang ,$hoten_nhan, $sdt_nhan, $diachi_nhan, $phuong_thuc, $Ngay_tao) {
    // Kết nối MySQLi (giả sử bạn đã có kết nối $this->con là một đối tượng MySQLi)
    
    // Escape dữ liệu đầu vào để bảo vệ khỏi SQL Injection
    $hoten_nhan = $this->con->real_escape_string($hoten_nhan);
    $sdt_nhan = $this->con->real_escape_string($sdt_nhan);
    $diachi_nhan = $this->con->real_escape_string($diachi_nhan);
    $phuong_thuc = $this->con->real_escape_string($phuong_thuc);

    // Câu lệnh SQL để chèn dữ liệu vào bảng giỏ hàng
    $sql = "UPDATE $this->tblgiohang 
    SET tongTien= $tongTien, hoten_nhan='$hoten_nhan', sdt_nhan='$sdt_nhan',diachi_nhan='$diachi_nhan',
    phuong_thuc='$phuong_thuc',Ngay_tao =NOW(), active=1  WHERE id_giohang= $id_giohang";
    $result=$this->con->query($sql);
    return $result;

}
public function Getttinchitietdonhang($id_giohang){
    $sql = "SELECT * FROM $this->tblchitietgiohang WHERE id_giohang = $id_giohang  ";
    $result=$this->con->query($sql);
    return $result;
}
public function Getttindonhang($id_giohang){
    $sql = "SELECT * FROM $this->tblgiohang WHERE id_giohang = $id_giohang  ";
    $result=$this->con->query($sql);
    return $result;
}

public function layid_giohang($sdt){
    $sql ="SELECT MAX(id_giohang) as maxid FROM $this->tblgiohang WHERE sdt='$sdt' ";
    $result=$this->con->query($sql);
    return $result;
}

public function updatesolg($sdt,$masanpham,$soluong){
    $sql = "UPDATE $this->tblchitietgiohang SET soluong = soluong + $soluong
        WHERE id_giohang = $sdt AND masanpham = '$masanpham'";
$result = $this->con->query($sql);
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
    echo $sql;
    $result=$this->con->query($sql);
    return $result;
    
 }



  

}
  
?>
