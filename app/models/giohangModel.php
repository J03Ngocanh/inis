<?php
require_once dirname(dirname(dirname(__FILE__))) . '/core/model.php';

class giohangModel extends Model
{
    protected $tblloaisp = "loaisp";
    protected $tblsanpham = "sanpham";
    protected $tblgiohang = "giohang";
    protected $tblkhachhang = "khachhang";
    protected $tblchitietgiohang = "chitiet_giohang";
    protected $tbldonhang = "hoadon";
    protected $tblrank = "rank";
    protected $tblchitietdonhang = "chitiethoadon";


    public function Getttinsanpham($masanpham)
    {
        $sql = "SELECT masanpham, tensanpham, giagoc, hinhanh, soluong AS soluongtonkho 
                FROM $this->tblsanpham 
                WHERE masanpham = '$masanpham'";
        return $this->con->query($sql);
    }

    public function Getloaisp()
    {
        $sql = "SELECT * FROM $this->tblloaisp ";
        $result = $this->con->query($sql);
        return $result;
    }

    public function info($makhachhang)
    {
        $sql = "SELECT * FROM $this->tblkhachhang kh WHERE id = '$makhachhang'";
        $result = $this->con->query($sql);
        return $result;
    }

    // Lấy giỏ hàng của người dùng dựa vào số điện thoại
    public function layGioHang($sdt)
    {
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
        $result = $this->con->query($sql);
        return $result;
    }

    public function Laymagiohang($sdt)
    {
        $sql = "SELECT * FROM $this->tblgiohang WHERE active=0 AND sdt='$sdt'";
        $result = $this->con->query($sql);
        return $result;
    }

    public function checkgiohang($sdt)
    {
        $sql = "SELECT * FROM $this->tblgiohang WHERE sdt = $sdt AND active=0";
        $result = $this->con->query($sql);
        return $result;
    }

//    public function themchitietmuangay($id_giohang, $masanpham, $tensanpham, $soluong, $don_gia)
//    {
//        $sql = "INSERT INTO $this->tblchitietgiohang(id_giohang,masanpham,tensanpham,soluong,giagoc) VALUES ($id_giohang,'$masanpham', '$tensanpham', $soluong, $don_gia) ";
//        $result = $this->con->query($sql);
//        return $result;
//    }

    public function layspmuangay($masanpham)
    {
        $sql = "SELECT * FROM $this->tblsanpham WHERE masanpham = '$masanpham'";
        $result = $this->con->query($sql);
        return $result;
    }

    public function giamslsp($soluong, $masanpham)
    {
        $sql = "UPDATE $this->tblsanpham SET soluong= (SELECT soluong FROM $this->tblsanpham WHERE masanpham = '$masanpham' )-$soluong      
    WHERE masanpham='$masanpham' ";
        $result = $this->con->query($sql);
        return $result;
    }

    public function layctgiohang($id_giohang)
    {
        $sql = "SELECT * FROM $this->tblchitietgiohang WHERE id_giohang = $id_giohang ";
        $result = $this->con->query($sql);
        return $result;
    }

    public function thongtinsanphamgiohang($id_giohang)
    {
        $sql = "SELECT $this->tblsanpham.hinhanh, $this->tblsanpham.tensanpham,$this->tblsanpham.giagoc , $this->tblchitietgiohang.* FROM $this->tblchitietgiohang INNER JOIN $this->tblsanpham ON $this->tblchitietgiohang.masanpham= $this->tblsanpham.masanpham   WHERE id_giohang = $id_giohang ";
        $result = $this->con->query($sql);
        return $result;
    }

    public function updatedondathang($tongTien, $id_giohang, $hoten_nhan, $diachi_nhan, $phuong_thuc, $Ngay_tao)
    {
        // Kết nối MySQLi (giả sử bạn đã có kết nối $this->con là một đối tượng MySQLi)

        // Escape dữ liệu đầu vào để bảo vệ khỏi SQL Injection
        $hoten_nhan = $this->con->real_escape_string($hoten_nhan);

        $diachi_nhan = $this->con->real_escape_string($diachi_nhan);
        $phuong_thuc = $this->con->real_escape_string($phuong_thuc);

        // Câu lệnh SQL để chèn dữ liệu vào bảng giỏ hàng
        $sql = "UPDATE $this->tblgiohang 
    SET tongTien= $tongTien, hoten_nhan='$hoten_nhan', diachi_nhan='$diachi_nhan',
    phuong_thuc='$phuong_thuc',Ngay_tao =NOW(), active=1  WHERE id_giohang= $id_giohang";
        $result = $this->con->query($sql);
        return $result;

    }

    public function Getttinchitietdonhang($mahoadon)
    {
        $sql = "SELECT sp.tensanpham, ctdh.soluong, sp.giagoc FROM $this->tblchitietdonhang ctdh INNER JOIN $this->tblsanpham sp ON ctdh.masanpham = sp.masanpham WHERE mahoadon = '$mahoadon'";
        $result = $this->con->query($sql);
        return $result;
    }

    public function Getttindonhang($mahoadon)
    {
        $sql = "SELECT * FROM $this->tbldonhang WHERE mahoadon = '$mahoadon'";
        $result = $this->con->query($sql);
        return $result;
    }

//    public function updatesolgmuangay($masanpham, $soluong)
//    {
//        $sql = "UPDATE $this->tblsanpham SET soluong= (SELECT soluong FROM $this->tblsanpham WHERE masanpham = '$masanpham')-$soluong
//        WHERE masanpham='$masanpham'  ";
//        $result = $this->con->query($sql);
//        return $result;
//    }

    public function Laymasanpham($id_giohang)
    {
        $sql = "SELECT id_giohang, masanpham, soluong FROM $this->tblchitietgiohang 
    WHERE id_giohang=$id_giohang";
        $result = $this->con->query($sql);
        return $result;

    }

    public function addOrder($mahoadon, $makhachhang, $tongtien, $giamgia, $tong_thanhtoan, $hoten_nhan, $sdt, $diachi_nhan, $phuong_thuc, $ngay_tao)
    {
        $sql = "INSERT INTO $this->tbldonhang (mahoadon, makhachhang, tongtientruocgiam,giamgia, tongtiensaugiam, hoten_nhan, sdt_nhan, diachi_nhan, pttt, ngaytao) 
            VALUES ('$mahoadon','$makhachhang', '$tongtien', $giamgia, $tong_thanhtoan, '$hoten_nhan','$sdt', '$diachi_nhan', '$phuong_thuc', '$ngay_tao')";
        if ($this->con->query($sql)) {
            return true; // Thành công
        } else {
            return false; // Lỗi
        }
    }

//    public function addOrderDetail($mahoadon, $masanpham, $soluong, $giagoc)
//    {
//        $sql = "INSERT INTO $this->tblchitietdonhang (mahoadon, masanpham, soluong, dongia)
//            VALUES ('$mahoadon', '$masanpham', $soluong, $giagoc)";
//        echo $sql;
//
//        if ($this->con->query($sql)) {
//            return true; // Thành công
//        } else {
//            return false; // Lỗi
//        }
//    }

    public function Getcoupon($makhachhang)
    {
        $sql = "SELECT discount FROM $this->tblrank r INNER JOIN $this->tblkhachhang kh ON r.id_rank = kh.id_rank WHERE id='$makhachhang'";
        $result = $this->con->query($sql);
        return $result;
    }

    public function updateStock($masanpham, $soluong)
    {
        $sql = "UPDATE $this->tblsanpham 
                SET soluong = soluong - $soluong 
                WHERE masanpham = '$masanpham' 
                AND soluong >= $soluong";
        return $this->con->query($sql);
    }

    // Kiểm tra số lượng tồn kho
    public function checkStock($masanpham, $soluong)
    {
        $sql = "SELECT soluong AS soluongtonkho 
                FROM $this->tblsanpham 
                WHERE masanpham = '$masanpham'";
        $result = $this->con->query($sql);
        if ($row = $result->fetch_assoc()) {
            return $row['soluongtonkho'] >= $soluong;
        }
        return false;
    }

    public function themchitietmuangay($id_giohang, $masanpham, $tensanpham, $soluong, $don_gia)
    {
        if ($this->checkStock($masanpham, $soluong)) {
            $sql = "INSERT INTO $this->tblchitietgiohang (id_giohang, masanpham, tensanpham, soluong, giagoc) 
                    VALUES ($id_giohang, '$masanpham', '$tensanpham', $soluong, $don_gia)";
            $result = $this->con->query($sql);
            if ($result) {
                $this->updateStock($masanpham, $soluong);
            }
            return $result;
        }
        return false;
    }

    public function addOrderDetail($mahoadon, $masanpham, $soluong, $giagoc)
    {
        if ($this->checkStock($masanpham, $soluong)) {
            $sql = "INSERT INTO $this->tblchitietdonhang (mahoadon, masanpham, soluong, dongia) 
                    VALUES ('$mahoadon', '$masanpham', $soluong, $giagoc)";
            $result = $this->con->query($sql);
            if ($result) {
                $this->updateStock($masanpham, $soluong);
            }
            return $result;
        }
        return false;
    }

    public function updatesolgmuangay($masanpham, $soluong)
    {
        if ($this->checkStock($masanpham, $soluong)) {
            $sql = "UPDATE $this->tblsanpham 
                    SET soluong = soluong - $soluong 
                    WHERE masanpham = '$masanpham'";
            return $this->con->query($sql);
        }
        return false;
    }

}

?>
