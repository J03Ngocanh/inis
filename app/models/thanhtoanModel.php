<?php
require_once './core/model.php';
class thanhtoanModel extends Model {
    protected $tblloaisp = "loaisp";
    protected $tblsanpham = "sanpham";



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
}