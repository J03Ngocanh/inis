<?php if (isset($_SESSION['message'])): ?>
    <div class="alert <?php echo $_SESSION['message_type']; ?>">
        <?php echo $_SESSION['message']; ?>
    </div>
    <?php unset($_SESSION['message']); unset($_SESSION['message_type']); ?>
<?php endif; ?>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    /* Tạo phong cách cho form */
    body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Chiều cao của toàn bộ màn hình */
    margin: 0; /* Loại bỏ khoảng cách mặc định của body */
    background-color: #f4f4f4; /* Màu nền cho body (tuỳ chỉnh) */
}

form {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Để tạo bóng cho form */
    width: 300px; /* Chiều rộng cố định cho form */
    text-align: center;
}

form input, form button {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border-radius: 5px;
    border: 1px solid #ddd;
}

form input {
    font-size: 14px;
}

form button {
    background-color: white;
    color: #16a085;
    border: 2px solid #16a085;
    font-size: 16px;
    cursor: pointer;
}

form button:hover {
    background-color: #16a085;
    color: white;
}

    form {
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        font-family: "Nunito", sans-serif;
    }
    
    form label {
        font-size: 20px;
        color: #333;
        display: block;
        margin-bottom: 10px;
    
        text-align: center;
        font-family: "Nunito", sans-serif;
        color:  #28a040;
      
    }
    
    form input {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
        box-sizing: border-box;
    }
    
    form input:focus {
        border-color: #16a085; /* Màu khi focus */
        outline: none;
    }
    
    form button {
    width: 100%;
    padding: 12px;
    background-color: white; /* Nền trắng */
    color: #28a040; /* Chữ màu xanh */
    border: 2px solid #28a040; /* Viền xanh */
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease; /* Thêm hiệu ứng khi hover */
}

form button:hover {
    background-color: #28a040; /* Màu nền xanh khi hover */
    color: white; /* Chữ màu trắng khi hover */
    border-color: #28a040; /* Viền xanh khi hover */
}

    form .alert {
        padding: 10px;
        background-color: #f44336; /* Màu đỏ cho thông báo lỗi */
        color: white;
        border-radius: 5px;
        margin-bottom: 20px;
    }
    
    form .alert.success {
        background-color: #4CAF50; /* Màu xanh lá cho thông báo thành công */
    }
    
</style>



<form method="POST" action="<?php echo WEBROOT . 'taikhoan/forgotPassword'?>">
    <label for="email">Nhập email để nhận mã OTP:</label>
    <input type="email" name="email" required>
    <button type="submit">Gửi mã xác nhận</button>
</form>
