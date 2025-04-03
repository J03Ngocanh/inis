<?php 
require_once './core/model.php';
class trangchuModel extends Model {
   protected $tblloaisp='loaisp';
   protected $tblsanpham = 'sanpham';
   protected $tblkhachhang = 'khachhang';
   protected $tblrank = 'rank';
   protected $tblchitiethoadon = 'chitiethoadon';
   protected $tblhoadon = 'hoadon';

   public function Getloaisp(){
    $sql = "SELECT * FROM $this->tblloaisp ";
    $result=$this->con->query($sql);
    return $result;
   }

   public function laybestseller(){
    $sql = "SELECT sp.masanpham,sp.tensanpham, sp.hinhanh, sp.giagoc,SUM(cthd.soluong) AS total_sold FROM {$this->tblchitiethoadon} AS cthd
            INNER JOIN {$this->tblhoadon} AS hd ON cthd.mahoadon = hd.mahoadon
            INNER JOIN {$this->tblsanpham} AS sp ON cthd.masanpham = sp.masanpham
            GROUP BY sp.masanpham
            ORDER BY total_sold DESC LIMIT 4";
    $result = $this->con->query($sql);
    return $result;
}
 public function laynewitem(){
    $sql = "SELECT sp.masanpham, sp.tensanpham, sp.hinhanh, sp.giagoc FROM {$this->tblsanpham} AS sp
    ORDER BY sp.ngay_them DESC LIMIT 4";
    echo $sql;
    $result = $this->con->query($sql);
    return $result;
}
public function info($makhachhang){
    $sql = "SELECT * FROM $this->tblkhachhang kh INNER JOIN $this->tblrank r ON kh.id_rank = r.id_rank WHERE id = '$makhachhang'";
    $result = $this->con->query($sql);
    return $result;
}
public function getLichSuDonHang($makhachhang){
    $sql = "SELECT hd.mahoadon, hd.ngaytao, hd.tongtiensaugiam, hd.trangthai, sp.tensanpham, cthd.soluong FROM $this->tblhoadon hd
            JOIN $this->tblchitiethoadon cthd ON hd.mahoadon = cthd.mahoadon 
            JOIN $this->tblsanpham sp ON cthd.masanpham = sp.masanpham WHERE hd.makhachhang = '$makhachhang'
            ORDER BY hd.ngaytao DESC";
    $result = $this->con->query($sql);

    $history = [];
    while ($row = $result->fetch_assoc()) {
        $mahoadon = $row['mahoadon'];
        if (!isset($history[$mahoadon])) {
            $history[$mahoadon] = [
                'ngaytao' => $row['ngaytao'],
                'tongtiensaugiam' => $row['tongtiensaugiam'],
                'trangthai' => $row['trangthai'],
                'sanphams' => []
            ];
        }
        $history[$mahoadon]['sanphams'][] = [
            'sanpham' => $row['tensanpham'],
            'soluong' => $row['soluong']
        ];
    }
    return $history;
}
}



?>