<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
body {
    font-family: "Nunito", sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f7f7f7;
}

.container {
    display: flex;
    justify-content: space-between;
    padding: 20px;
    margin: 0 auto;
    max-width: 1200px;
}

.left-section, .right-section {
    width: 48%;
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
}

/* Order Details */
.order-details {
    border: 1px solid #ddd;
    padding: 10px;
    margin-top: 20px;
    background-color: #fff;
    border-radius: 8px;
}

.order-item {
    display: flex;
    margin-bottom: 15px;
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
}

.order-item img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    margin-right: 15px;
    border-radius: 5px;
}

.order-info {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.order-summary {
    margin-top: 20px;
}

.order-summary p {
    font-size: 16px;
    color: #555;
}

.order-summary strong {
    font-size: 18px;
    color: #e60012;
}

/* Form Styling */
.form-group {
    margin-bottom: 20px;
}

.form-group label {
    font-size: 16px;
    color: #333;
    display: block;
    margin-bottom: 8px;
}

.form-group input, .form-group textarea {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    background-color: #fafafa;
}

.form-group input:focus, .form-group textarea:focus {
    outline: none;
    border-color: #6c63ff;
    background-color: #fff;
}

textarea {
    resize: vertical;
    height: 120px;
}

.radio-group {
    display: flex;
    align-items: center;
    margin-bottom: 10px; /* Khoảng cách giữa các nhóm */
}

.radio-group input[type="radio"] {
    margin-right: 10px; /* Khoảng cách giữa radio button và label */
}

.radio-group label {
    font-size: 16px;
    margin-right: 20px;  /* Khoảng cách giữa các phương thức thanh toán */
}
.form-group input#tien_mat,input#chuyen_khoan{
    width: 30%;
}


/* Button Styling */
button {
    padding: 12px 20px;
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;

}

button:hover {
    background-color: #218838;
}

/* Popup Styling */
#qr-popup {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(0, 0, 0, 0.7);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    width: 100%;
    height: 100%;
    display: none;
}

.popup-content {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    text-align: center;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    width: 300px;
}

.popup-content button {
    background-color: #f6a5ae;
    color: white;
    border: none;
    padding: 8px 16px;
    cursor: pointer;
    margin-top: 20px;
    border-radius: 5px;
    font-size: 16px;
}

.popup-content button:hover {
    background-color: #e60012;
}

#qrcode img {
    object-fit: contain;
    width: 100%;
    height: auto;
}

    </style>

    </style>
</head>
<body>
<br>
<br><br>
<form id="thanhtoan" action="<?= WEBROOT ?>giohang/tienhanhthanhtoan/<?php echo $masp?>" method="POST">
  
<div class="container">
    <div class="left-section">
        <h2>Thông tin đơn hàng</h2>
        <div class="order-details">
        <?php
        $data = mysqli_fetch_array($sanphammuangay);
        $soluong = isset($_POST['soluong']) ? $_POST['soluong'] : 1;
        $tongtien = $soluong * $data['giagoc'];
        ?>

        <div class="order-item">
        <img style="width:200px; height:auto;" src="<?php echo WEBROOT . 'public/img/' . $data['hinhanh']; ?>" alt="Sản phẩm">

            <div class="order-info">
                <p><strong><?php echo htmlspecialchars($data['tensanpham']); ?></strong></p>
                <p>Giá: <span><?php echo number_format($data['giagoc']); ?>đ</span></p>
                
                <div class="quantity">
                     <label for="soluong">Số lượng:</label>
                   
                     <input type="number" id="soluong" name="soluong" value="<?php echo $soluong; ?>" min="1" readonly>
                     
                </div>

                <label for="tongTien">Tổng tiền:</label>
                <input type="text" id="tongTien" name="tongTien" value="<?php echo number_format($tongtien); ?>đ" readonly>
             
            </div>
        </div>
    </div>
</div>

    <div class="right-section">
        <h2>Thông tin mua hàng</h2>
       
            <div class="form-group">
                <label for="sdt">Số điện thoại của bạn:</label>
                <input type="sdt" id="sdt" name="sdt" placeholder="Số điện thoại của bạn" required>
            </div>

            <div class="form-group">
                <label for="hoten_nhan">Họ và tên người nhận:</label>
                <input type="text" id="hoten_nhan" name="hoten_nhan" placeholder="Nhập họ và tên" required>
            </div>

            <div class="form-group">
                <label for="sdt_nhan">Số điện thoại người nhận:</label>
                <input type="text" id="sdt_nhan" name="sdt_nhan" placeholder="Nhập số điện thoại" required>
            </div>

            <div class="form-group">
                <label for="diachi_nhan">Địa chỉ giao hàng:</label>
                <textarea id="diachi_nhan" name="diachi_nhan" rows="4" placeholder="Nhập địa chỉ giao hàng" required></textarea>
            </div>

            <div class="form-group">
            <label for="phuong_thuc">Phương thức thanh toán:</label><br>
            <div class="radio-group">
                <input type="radio" id="tien_mat" name="phuong_thuc" value="tien_mat" checked>
                <label for="tien_mat">Thanh toán khi nhận hàng</label><br>
            </div>

            <div class="radio-group">
                <input type="radio" id="chuyen_khoan" name="phuong_thuc" value="chuyen_khoan">
                <label for="chuyen_khoan">Chuyển khoản ngân hàng</label><br>
            </div>
        </div>
      

        <div class="form-group">
            <button  type="submit" id="submit-btn">Xác nhận thanh toán</button>
        </div>
    </div>
</div>

<!-- Popup mã QR -->
<div id="qr-popup" style="display: none;">
    <div class="popup-content">
        <h3>Quét mã QR để thanh toán</h3>
        <div id="qrcode"></div>
        <button type="button" class="close-btn">Đóng</button>
        <button type="button" class="submit">Hoàn thành thanh toán</button>
    </div>
</div>
</form>


<script src="https://cdn.jsdelivr.net/npm/qrcode/build/qrcode.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector("#thanhtoan");  // Chỉ chọn form với id="thanhtoan"
        const qrPopup = document.getElementById("qr-popup");
        const closeBtn = document.querySelector(".close-btn");
        const submitBtn = document.querySelector(".submit");
        const submitBtnElement = document.getElementById("submit-btn");
        let isPopupConfirmed = false;

        // Hiển thị mã QR
        function showQRCode() {
            const qrImageUrl = `https://img.vietqr.io/image/970422-0923736453-compact2.png?amount=<?php echo $tongtien; ?>&addInfo=Thanh%20toán%20đơn%20hàng&accountName=Vu%20Nguyen%20Huong`;
            document.getElementById("qrcode").innerHTML = `<img src="${qrImageUrl}" alt="QR Ngân hàng MB Bank" />`;
            qrPopup.style.display = "flex";
        }

        // Đóng popup khi nhấn "Đóng"
        closeBtn.addEventListener("click", function () {
            qrPopup.style.display = "none";
            isPopupConfirmed = false;
        });

        // Xác nhận thanh toán khi nhấn "Hoàn thành thanh toán"
        submitBtn.addEventListener("click", function () {
            if (form && form.id === "thanhtoan") {  // Kiểm tra nếu form có id="thanhtoan"
                isPopupConfirmed = true;
                qrPopup.style.display = "none";
                form.submit(); // Gửi form sau khi xác nhận thanh toán
            }
        });

        // Xử lý sự kiện khi nhấn "Xác nhận thanh toán"
        submitBtnElement.addEventListener("click", function (event) {
            const paymentMethodInput = document.querySelector('input[name="phuong_thuc"]:checked');
            if (!paymentMethodInput) {
                alert("Hãy chọn phương thức thanh toán!");
                event.preventDefault();
                return;
            }

            const paymentMethod = paymentMethodInput.value;
            if (paymentMethod === "chuyen_khoan" && !isPopupConfirmed) {
                event.preventDefault(); // Ngừng gửi form nếu chưa xác nhận thanh toán
                showQRCode(); // Hiển thị popup mã QR
            }
        });
    });

</script>
</body>
</html>
