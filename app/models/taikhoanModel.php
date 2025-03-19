<?php 
require_once './core/model.php';
class taikhoanModel extends Model {
   protected $tblkh="khachhang";
   protected $tblnv="nhanvien";
   protected $tblloaisp='loaisp';

   public function check_kh($sdt){
    $sql = "SELECT * FROM $this->tblkh WHERE (sdt = '$sdt' OR email = '$sdt')";
    $result=$this->con->query($sql);
    return $result;
   }

   public function check_nv($sdt){
    $sql = "SELECT * FROM $this->tblnv WHERE (sdt = '$sdt')";
    $result=$this->con->query($sql);
    return $result;
   }
   
   public function checksdt($sdt){
     $sql = "SELECT * FROM $this->tblnv WHERE sdt='$sdt'";
     $result=$this->con->query($sql);
     return $result;
    }

    public function check_sdt($sdt){
        $sql = "SELECT * FROM $this->tblkh WHERE sdt='$sdt'";
        $result=$this->con->query($sql);
        return $result;
    }


    public function checkEmailExists($email) {
        $sql = "SELECT * FROM khachhang WHERE email = '$email'";
        $result = $this->con->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    // Lưu mã xác nhận vào cơ sở dữ liệu
    public function saveVerificationCode($userId, $verificationCode) {
        $sql = "UPDATE khachhang SET verification_code = '$verificationCode' WHERE id = $userId";
        return $this->con->query($sql);
    }


    // Kiểm tra mã xác nhận
    public function checkVerificationCode($userId, $verificationCode) {
        $sql = "SELECT * FROM khachhang WHERE id = $userId AND verification_code = '$verificationCode'";
        $result = $this->con->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }


    // Cập nhật mật khẩu mới
    public function updatePassword($email, $newPassword) {
        $sql = "UPDATE khachhang SET password = '$newPassword' WHERE email = '$email'";
        return $this->con->query($sql);
    }


    public function themtaikhoan($tenkhachhang,$email,$sdt,$ngaysinh,$password,$id_rank) {
        $sql = "INSERT INTO $this->tblkh (tenkhachhang, email, sdt, ngaysinh, password, id_rank) 
        VALUES ('$tenkhachhang', '$email', '$sdt', '$ngaysinh', '$password', '$id_rank')";
        return $this->con->query($sql);
    }

    public function themtaikhoannv($tennhanvien, $sdt, $password, $id_role){
        $sql = "INSERT INTO $this->tblnv (tennhanvien,sdt, password, id_role) 
        VALUES ('$tenkhachhang', '$sdt', '$password', '$id_role')";
        return $this->con->query($sql);
    }

    public function Getloaisp(){
        $sql = "SELECT * FROM $this->tblloaisp ";
        $result=$this->con->query($sql);
        return $result;
       }

}
?>