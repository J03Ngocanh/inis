<?php
require_once dirname(dirname(dirname(__FILE__))) . '/core/controller.php';

class chatController extends Controller
{
    private $sanphamModel;

    public function __construct()
    {
        $this->sanphamModel = $this->model('sanphamModel');
    }

    public function chat()
    {
        $rawData = file_get_contents("php://input");
        $data = json_decode($rawData, true);
        $message = $data['message'] ?? '';

        $productResult = $this->sanphamModel->getAll();

        $products = [];
        $i = 0;
        while ($row = $productResult->fetch_assoc()) {
            if ($i == 10) {
                break;
            }
            $products[] = "Tên: {$row['tensanpham']}, Giá: " . number_format($row['giagoc'], 0, ',', '.') . "đ";
            $i++;
        }

        $productData = implode("\n", $products);

        $messages = [
            [
                'role' => 'system',
                'content' => "Bạn là một chuyên gia tư vấn mỹ phẩm. Dưới đây là các sản phẩm đang có. Vui lòng trả lời ngắn gọn và rõ ràng, không dài dòng:\n\n" . $productData . "\n\nHãy tư vấn khách hàng dựa trên danh sách trên."
            ],
            ['role' => 'user', 'content' => $message]
        ];

        $apiKey = $_ENV['GPT_KEY'];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/chat/completions');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            'model' => 'gpt-3.5-turbo',
            'messages' => $messages,
        ]));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $apiKey
        ]);

        $result = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($result, true);

        if (isset($response['error'])) {
            echo "Xin lỗi, hiện hệ thống đang quá tải. Vui lòng thử lại sau.";
        }

        echo $response['choices'][0]['message']['content'];
    }
}