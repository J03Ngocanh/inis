<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
</head>
<style>
    /* Đặt bố cục và căn chỉnh */
body {
    font-family: "Nunito", sans-serif;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    background-color: #f9f9f9;
}


/* Thiết lập kiểu cho form đăng ký */
form {
    background-color: #ffffff;
    padding: 20px 15px;
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
    height:80%;
}

/* Định dạng nhãn và đầu vào */
label {
    padding-top: 200px;
    font-weight: bold;
    color: #555;
}

input[type="text"],
input[type="tel"],
input[type="password"],
input[type="email"],
input[type="date"] {
    width: 100%;
    padding: 10px;
    margin: 8px 0 16px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 16px;
    margin-top: -1px;
}

/* Kiểu nút Đăng Ký */
input[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #28a745;
    border: none;
    border-radius: 4px;
    color: #ffffff;
    font-weight: bold;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #218838;
}


</style>
<body>

    <h2 style="text-align: center; padding-top:2px;
    color: #333;">Đăng Ký Tài Khoản</h2>
    <form action="<?php echo WEBROOT . 'taikhoan/xulydangky'?>" method="POST">
        <label for="ho_ten">Họ và Tên:</label><br>
        <input type="text" id="tenkhachhang" name="tenkhachhang" required><br><br>

        <div style=" margin-top: -15px;">
            <label for="sdt">Số điện thoại:</label><br>
            <input type="tel" id="sdt" name="sdt"  required ><br><br>
    
            <label for="mat_khau">Mật Khẩu:</label><br>
            <input type="text" id="password" name="password" required><br><br>
    
            <label for="mat_khau_2">Nhập Lại Mật Khẩu:</label><br>
            <input type="password" id="mat_khau_2" name="mat_khau_2" required><br><br>
    
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>
    
            <label for="ngay_sinh">Ngày Sinh:</label><br>
            <input type="date" id="ngaysinh" name="ngaysinh" required><br><br>
        </div>

        <input type="submit" value="Đăng Ký">
    </form>

</body>
</html>
