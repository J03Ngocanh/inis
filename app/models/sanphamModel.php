<?php 
require_once './core/model.php';
class sanphamModel extends Model {
   protected $tblsanpham="sanpham";
   protected $tbldanhmucsp = "danhmucsp";
   protected $tblloaisp='loaisp';


   public function Getloaisp(){
    $sql = "SELECT * FROM $this->tblloaisp ";
    $result=$this->con->query($sql);
    return $result;
   }
   //Lấy tất cả các loại hàng

   public function Getdanhmuc(){
    $sql = "SELECT * FROM $this->tbldanhmucsp ";
    $result=$this->con->query($sql);
    return $result;
   }
   
    public function getAll() {
        $sql = "SELECT * FROM $this->tblsanpham ";
        $result=$this->con->query($sql);
        return $result;
    }

    public function getchitietsp($id){
        $sql = "SELECT * FROM $this->tblsanpham WHERE masanpham = '$id' ";
        $result = $this->con->query($sql);
        return $result;
    }
    public function getAll_danhmuc($id) {
        $sql = "SELECT * FROM $this->tblsanpham WHERE id_danhmuc = $id  ";
        $result=$this->con->query($sql);
        return $result;
    }
    public function getAll_loai($id) {
        $sql = "SELECT * FROM $this->tblsanpham INNER JOIN $this->tbldanhmucsp ON $this->tblsanpham.id_danhmuc=$this->tbldanhmucsp.id_danhmuc  
        WHERE id_loaisp= $id ;
         ";
        $result=$this->con->query($sql);
        return $result;
    }
    public function tenloai($id) {
        $sql = "SELECT * FROM $this->tblloaisp 
        WHERE id_loaisp= $id ;
         ";
        $result=$this->con->query($sql);
        return $result;
    }
    public function tendanhmuc_loai($id) {
        $sql = "SELECT * FROM $this->tbldanhmucsp INNER JOIN $this->tblloaisp ON $this->tbldanhmucsp.id_loaisp= $this->tblloaisp.id_loaisp
        WHERE id_danhmuc= $id ;
         ";
        $result=$this->con->query($sql);
        return $result;
    }
    public function getsanpham_timkiem($nd){
        $sql = "SELECT * FROM $this->tblsanpham WHERE tensanpham LIKE '%$nd%' ";
        $result = $this->con->query($sql);
        return $result;
    }
    public function tensp($nd){
        $sql = "SELECT  masanpham,tensanpham, hinhanh FROM $this->tblsanpham WHERE tensanpham LIKE '%$nd%' ";
        $result = $this->con->query($sql);
        return $result;
    }

    
}
?>