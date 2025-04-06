<?php
require_once dirname(dirname(dirname(__FILE__))) . '/core/model.php';

class adminModel extends Model
{
    protected $tblsanpham = "sanpham";
    protected $tblnhanvien = "nhanvien";
    protected $tblkhachhang = "khachhang";
    protected $tblrole = "role";
    protected $tblrank = "rank";
    protected $tbldanhmucsp = "danhmucsp";
    protected $tblloaisp = 'loaisp';
    protected $tbldonhang = "hoadon";
    protected $tblchitietdonhang = "chitiethoadon";


    public function getlistsanpham()
    {
        $sql = "SELECT * FROM $this->tblsanpham ";
        $result = $this->con->query($sql);
        return $result;
    }

    public function getlistnv()
    {
        $sql = "SELECT nv.*, r.ten FROM nhanvien nv 
                LEFT JOIN role r ON nv.id_role = r.id_role";
        return $this->con->query($sql);
    }

    public function checksdt($sdt)
    {
        $sql = "SELECT * FROM $this->tblnhanvien WHERE sdt='$sdt'";
        $result = $this->con->query($sql);
        return $result;
    }

    public function getRoles()
    {
        $sql = "SELECT * FROM role";
        return $this->con->query($sql);
    }

    public function getsanpham($masanpham)
    {
        $sql = "SELECT * FROM $this->tblsanpham WHERE masanpham='$masanpham' ";
        $result = $this->con->query($sql);
        return $result;
    }

    public function getlistkh()
    {
        $sql = "SELECT * FROM $this->tblkhachhang INNER JOIN $this->tblrank ON $this->tblkhachhang.id_rank = $this->tblrank.id_rank";
        $result = $this->con->query($sql);
        return $result;
    }

    public function getdanhmuc()
    {
        $sql = "SELECT * FROM $this->tbldanhmucsp  ";
        $result = $this->con->query($sql);
        return $result;
    }

    public function suasanpham($masanpham, $tensanpham, $id_danhmuc, $soluong, $giagoc, $mota, $hinhanh, $hinhanh1, $hinhanh2, $hinhanh3, $hinhanh4)
    {
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

        $result = $this->con->query($sql);
        return $result;
    }

    public function themsanpham($id_danhmuc, $tensanpham, $mota, $giagoc, $hinhanh, $hinhanh1, $hinhanh2, $hinhanh3, $hinhanh4, $soluong)
    {
        $ngay_them = date('Y-m-d H:i:s'); // Lấy thời gian hiện tại
        $sql = "INSERT INTO sanpham (id_danhmuc, tensanpham, mota, giagoc, hinhanh, hinhanh1, hinhanh2, hinhanh3, hinhanh4, soluong, ngay_them) 
            VALUES ('$id_danhmuc', '$tensanpham', '$mota', '$giagoc', '$hinhanh', '$hinhanh1', '$hinhanh2', '$hinhanh3', '$hinhanh4', '$soluong', '$ngay_them')";
        $result = $this->con->query($sql);
        return $result;
    }

    public function checkmasanpham($masanpham)
    {
        $sql = "SELECT * FROM $this->tblsanpham WHERE masanpham='$masanpham' ";
        $result = $this->con->query($sql);
        return $result;
    }

    public function xoasanpham($masanpham)
    {
        $sql = "DELETE FROM $this->tblsanpham  WHERE masanpham='$masanpham' ";
        $result = $this->con->query($sql);
        return $result;
    }

    public function getddh()
    {
        $sql = "SELECT * FROM $this->tbldonhang";
        $result = $this->con->query($sql);
        return $result;
    }

    public function xacnhan($mahoadon) {
        $paymentTime = date('Y-m-d H:i:s');
        $sql = "UPDATE $this->tbldonhang SET trangthai='Đã thanh toán', payment_time = '$paymentTime' WHERE mahoadon = '$mahoadon'";
        $result = $this->con->query($sql);
        return $result;
    }

    public function getinfocus($mahoadon)
    {
        $sql = "SELECT makhachhang, tongtientruocgiam FROM $this->tbldonhang WHERE mahoadon = '$mahoadon'";
        $result = $this->con->query($sql);
        return $result;
    }

    public function updatePointsAndRank($makhachhang, $tongtien)
    {
        // Lấy điểm hiện tại của khách hàng
        $sql = "SELECT point, id_rank FROM khachhang WHERE id = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $makhachhang);
        $stmt->execute();
        $result = $stmt->get_result();
        $khachhang = $result->fetch_assoc();
        $stmt->close();

        if ($khachhang) {
            $old_rank = $khachhang['id_rank']; // Rank trước khi cập nhật
            $newPoints = $khachhang['point'] + floor($tongtien / 1000); // Cộng điểm

            // Xác định rank mới
            if ($newPoints >= 7500) {
                $new_rank = 4; // Diamond
            } elseif ($newPoints >= 4000) {
                $new_rank = 3; // Gold
            } elseif ($newPoints >= 2000) {
                $new_rank = 2; // Silver
            } else {
                $new_rank = 1; // Member
            }

            // Cập nhật điểm & rank vào database
            $sqlUpdate = "UPDATE khachhang SET point = ?, id_rank = ? WHERE id = ?";
            $stmtUpdate = $this->con->prepare($sqlUpdate);
            $stmtUpdate->bind_param("iis", $newPoints, $new_rank, $makhachhang);
            $stmtUpdate->execute();
            $stmtUpdate->close();

            // Kiểm tra nếu rank thay đổi => Lưu session để hiển thị popup
            if ($new_rank > $old_rank) {
                $_SESSION['rank_up'] = $new_rank;
            }
        }
    }


    public function chitietdonhang()
    {
        $sql = "SELECT $this->tblchitietdonhang.*, $this->tblsanpham.hinhanh, $this->tblsanpham.tensanpham FROM $this->tblchitietdonhang INNER JOIN $this->tblsanpham
   ON $this->tblchitietdonhang.masanpham = $this->tblsanpham.masanpham";
        $result = $this->con->query($sql);
        return $result;
    }

    public function getnhanvien($manhanvien)
    {
        $sql = "SELECT nv.*, r.ten FROM nhanvien nv 
                LEFT JOIN role r ON nv.id_role = r.id_role 
                WHERE nv.manhanvien = '$manhanvien'";
        return $this->con->query($sql);
    }


    public function themnhanvien($tennhanvien, $sdt, $password, $id_role)
    {
        $sql = "INSERT INTO nhanvien (tennhanvien, sdt, password, id_role, trangthai) 
                VALUES ('$tennhanvien', '$sdt', '$password', '$id_role', 1)";
        return $this->con->query($sql);

    }


    public function suanhanvien($manhanvien, $tennhanvien, $sdt, $password, $id_role)
    {
        $sql = "UPDATE nhanvien SET 
                tennhanvien = '$tennhanvien', 
                sdt = '$sdt', 
                id_role = '$id_role'";
        if ($password) {
            $sql .= ", password = '$password'";
        }
        $sql .= " WHERE manhanvien = '$manhanvien'";
        return $this->con->query($sql);
    }

    public function updatetrangthai($manhanvien, $trangthai)
    {
        $sql = "UPDATE nhanvien SET trangthai = '$trangthai' WHERE manhanvien = '$manhanvien'";
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
    public function doanhthu($month = null)
    {
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

    // Trong app/models/adminModel.php

    public function getDoanhThuTheoNam($year) {
        $query = "SELECT MONTH(payment_time) as thang, SUM(tongtiensaugiam) as doanhthu 
              FROM hoadon 
              WHERE YEAR(ngaytao) = ? AND (trangthai = 'Đã thanh toán')
              GROUP BY MONTH(ngaytao)
              ORDER BY thang ASC";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param("i", $year);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = array_fill(1, 12, 0); // Khởi tạo mảng 12 tháng với giá trị 0
        while ($row = $result->fetch_assoc()) {
            $data[$row['thang']] = (float)$row['doanhthu'];
        }
        return $data;
    }

    public function getTopSanPham($month, $year) {
        $query = "SELECT sp.tensanpham, SUM(ct.soluong) as tongsoluong
              FROM chitiethoadon ct
              JOIN sanpham sp ON ct.masanpham = sp.masanpham
              JOIN hoadon dh ON ct.mahoadon = dh.mahoadon
              WHERE MONTH(dh.ngaytao) = ? AND YEAR(dh.ngaytao) = ? AND (dh.trangthai = 'Đã thanh toán')
              GROUP BY ct.masanpham, sp.tensanpham
              ORDER BY tongsoluong DESC
              LIMIT 5";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param("ii", $month, $year);
        $stmt->execute();
        $result = $stmt->get_result();
        $labels = [];
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $labels[] = $row['tensanpham'];
            $data[] = (int)$row['tongsoluong'];
        }
        // Nếu không có dữ liệu, trả về mảng rỗng để tránh lỗi
        return ['labels' => $labels, 'data' => $data];
    }

        public function getTopSanPhamSH() {
            $query = "SELECT masanpham, tensanpham, soluong 
                      FROM $this->tblsanpham 
                      WHERE soluong < 20";
        
            $stmt = $this->con->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
        
            $labels = [];
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $labels[] = $row['tensanpham'];
                $data[] = $row['soluong'];
            }
        
            return ['labels' => $labels, 'data' => $data];
        }

}


?>