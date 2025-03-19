<?php 
require_once './core/model.php';
class trangchuModel extends Model {
   protected $tblloaisp='loaisp';
   protected $tblsanpham = 'sanpham';
   protected $tblchitiethoadon = 'chitiethoadon';
   protected $tblhoadon = 'hoadon';

   public function Getloaisp(){
    $sql = "SELECT * FROM $this->tblloaisp ";
    $result=$this->con->query($sql);
    return $result;
   }

   public function laybestseller(){
    $sql = "SELECT 
    sp.masanpham,
    sp.tensanpham, 
    sp.hinhanh, 
    sp.giagoc,
    SUM(cthd.soluong) AS total_sold
FROM {$this->tblchitiethoadon} AS cthd
INNER JOIN {$this->tblhoadon} AS hd
    ON cthd.mahoadon = hd.mahoadon
INNER JOIN {$this->tblsanpham} AS sp 
    ON cthd.masanpham = sp.masanpham
GROUP BY sp.masanpham
ORDER BY total_sold DESC
LIMIT 4";
$result = $this->con->query($sql);
return $result;

}
 public function laynewitem(){
    $sql = "SELECT 
    sp.masanpham,
    sp.tensanpham, 
    sp.hinhanh, 
    sp.giagoc
FROM {$this->tblsanpham} AS sp
ORDER BY sp.ngay_them DESC
LIMIT 4";
$result = $this->con->query($sql);
return $result;
 }
}


?>