<?php
require_once './core/model.php';
class veinnisModel extends Model {
    protected $tblloaisp = "loaisp";


    public function Getloaisp(){
        $sql = "SELECT * FROM $this->tblloaisp ";
        $result=$this->con->query($sql);
        return $result;
       }
    }