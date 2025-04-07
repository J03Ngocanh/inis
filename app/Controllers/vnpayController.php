<?php
require_once dirname(dirname(dirname(__FILE__))) . '/core/controller.php';
class vnpayController extends Controller
{
    private $adminModel;

    public function __construct()
    {
        $this->adminModel = $this->model('adminModel');
    }

    public function return()
    {
        $vnp_HashSecret = "NBWOGA7BHPKQ4IF59MXMPRJOFX1W9QQ5";

        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $hashData = "";
        foreach ($inputData as $key => $value) {
            $hashData .= $key . "=" . $value . '&';
        }
        $hashData = rtrim($hashData, '&');

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        if ($secureHash == $vnp_SecureHash) {
            if ($_GET['vnp_ResponseCode'] == '00') {
                if ($_GET['vnp_OrderInfo'] != "") {
                    $mahoadon = $_GET['vnp_OrderInfo'];
                    $this->adminModel->xacnhan($_GET['vnp_OrderInfo']);
                    header("Location: " . WEBROOT . "giohang/hoanthanhthanhtoan/$mahoadon");
                    exit();
                }
            } else {
                echo "Giao dịch không thành công!";
            }
        } else {
            echo "Chữ ký không hợp lệ!";
        }
    }
}