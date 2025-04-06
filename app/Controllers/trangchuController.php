<?php
require_once dirname(dirname(dirname(__FILE__))) . '/core/controller.php';//require_once 'app/models/product.php';
class trangchuController extends Controller
{
    private $trangchuModel;

    public function __construct()
    {
        $this->trangchuModel = $this->model('trangchuModel');
    }
    public function chatbot()
    {
        header('Content-Type: text/plain');

        $message = $_POST['message'] ?? '';
        if (empty($message)) {
            echo "Hỏi gì đi nha, mình đợi bạn á!";
            exit;
        }

        try {
            // Đường dẫn đến file JSON Service Account
            $credentialsFile = dirname(dirname(dirname(__FILE__))) . '/beauty-wbee-3c0c842e188f.json'; // Điều chỉnh đường dẫn nếu cần

            // Kiểm tra file JSON có tồn tại không
            if (!file_exists($credentialsFile)) {
                echo "Lỗi: File JSON không tồn tại tại đường dẫn: " . $credentialsFile;
                exit;
            }

            // Khởi tạo Google Client
//            require_once dirname(__FILE__) . '/../../../vendor/autoload.php'; // Đường dẫn đến autoload.php
            $client = new Google_Client();
            $client->setAuthConfig($credentialsFile);
            $client->addScope('https://www.googleapis.com/auth/cloud-platform');
            $client->addScope('https://www.googleapis.com/auth/dialogflow');

            // Lấy Access Token
            $accessTokenResult = $client->fetchAccessTokenWithAssertion();
            if (isset($accessTokenResult['access_token'])) {
                $accessToken = $accessTokenResult['access_token'];
            } else {
                echo "Lỗi: Không thể lấy Access Token. Chi tiết: " . json_encode($accessTokenResult);
                exit;
            }

            // Thông tin Dialogflow
            $projectId = 'beauty-wbee';
            $url = "https://dialogflow.googleapis.com/v2/projects/{$projectId}/agent/sessions/123456789:detectIntent";

            $data = [
                'queryInput' => [
                    'text' => [
                        'text' => $message,
                        'languageCode' => 'vi'
                    ]
                ]
            ];

            $options = [
                'http' => [
                    'header'  => "Content-Type: application/json\r\n" .
                        "Authorization: Bearer $accessToken\r\n",
                    'method'  => 'POST',
                    'content' => json_encode($data),
                ]
            ];

            $context = stream_context_create($options);
            $response = file_get_contents($url, false, $context);

            // Kiểm tra lỗi
            if ($response === false) {
                $error = error_get_last();
                echo "Lỗi: " . $error['message'];
                exit;
            }

            $result = json_decode($response, true);
            $reply = $result['queryResult']['fulfillmentText'] ?? "Mình chưa hiểu lắm, bạn hỏi lại nha!";
            echo $reply;

        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            exit;
        }
    }
    public function trangchu()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $loaisp = $this->trangchuModel->Getloaisp();
        $best = $this->trangchuModel->laybestseller();
        $new = $this->trangchuModel->laynewitem();
        $rank_up = $_SESSION['rank_up'] ?? null;
        unset($_SESSION['rank_up']);

        $info = null; // Khởi tạo mặc định
        if (isset($_SESSION['makhachhang'])) {
            $makhachhang = $_SESSION['makhachhang'];
            $info = $this->trangchuModel->info($makhachhang);
        }

        $this->view('menu', ['loaisp' => $loaisp, 'info' => $info]);
        $this->view('trangchu/trangchu', ['best' => $best, 'new' => $new, 'rank_up' => $rank_up]);
        $this->view('footer');
    }


    public function thongtin()
    {
        $history = null; // Khởi tạo mặc định
        $info = null; // Khởi tạo mặc định
        $info1 = null; // Khởi tạo mặc định
        if (isset($_SESSION['makhachhang'])) {
            $makhachhang = $_SESSION['makhachhang'];
            $history = $this->trangchuModel->getLichSuDonHang($makhachhang);
            $info = $this->trangchuModel->info($makhachhang);
            $info1 = $this->trangchuModel->info($makhachhang);
        }
        $loaisp = $this->trangchuModel->Getloaisp();
        $this->view('menu', ['loaisp' => $loaisp, 'info' => $info]);
        $this->view('thongtin/thongtin', ['info1' => $info1, 'history' => $history]);
    }

}

?>