<?php
require_once dirname(dirname(dirname(__FILE__))) . '/core/controller.php';//require_once 'app/models/product.php';
class vnpayController extends Controller
{
    public function return()
    {
        $vnp_HashSecret = "NBWOGA7BHPKQ4IF59MXMPRJOFX1W9QQ5";

        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        var_dump($inputData);
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
                echo "Giao dịch thành công!";
                echo $_GET();
                // Xử lý đơn hàng ở đây
            } else {
                echo "Giao dịch không thành công!";
            }
        } else {
            echo "Chữ ký không hợp lệ!";
        }
    }
}