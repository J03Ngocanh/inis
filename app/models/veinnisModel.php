<?php
require_once './core/model.php';
class veinnisModel extends Model {
    protected $tblloaisp = "loaisp";
    protected $tblkhachhang = "khachhang";



    public function Getloaisp(){
        $sql = "SELECT * FROM $this->tblloaisp ";
        $result=$this->con->query($sql);
        return $result;
    }
    public function info($makhachhang){
        $sql = "SELECT * FROM $this->tblkhachhang kh WHERE id = '$makhachhang'";
        $result = $this->con->query($sql);
        return $result;
    }
    }