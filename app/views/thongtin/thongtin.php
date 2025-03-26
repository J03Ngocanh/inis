<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Nunito', sans-serif;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Đổi màu tab */
        .nav-tabs .nav-link {
            font-size: 18px;
            color: #28a745;
            border: 1px solid #28a745;
            border-radius: 8px;
        }

        .nav-tabs .nav-link.active {
            background-color: #28a745;
            color: white;
            font-weight: bold;
        }

        .tab-content {
            padding: 20px;
            border: 1px solid #28a745;
            border-top: none;
            border-radius: 0 0 12px 12px;
        }

        h3 {
            color: #28a745;
            font-weight: bold;
        }

        /* Bảng lịch sử đơn hàng */
        .table {
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }

        .table thead {
            background: #28a745;
            color: white;
        }

        .table tbody tr:hover {
            background: #e9f5ea;
        }

        .table th, .table td {
            padding: 12px;
            text-align: center;
            font-size: 16px;
        }
    </style>
</head>
<body>
  

<div class="container mt-5">
    <!-- Tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab">Thông tin cá nhân</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="history-tab" data-bs-toggle="tab" data-bs-target="#history" type="button" role="tab">Lịch sử đơn hàng</button>
        </li>
    </ul>

    <!-- Nội dung Tab -->
    <div class="tab-content mt-3" id="myTabContent">
        <!-- Thông tin cá nhân -->
        <div class="tab-pane fade show active" id="info" role="tabpanel">
            <h3>Thông tin cá nhân</h3>
            <?php while($row = mysqli_fetch_array($info)) { ?>
            <p><strong>Họ và tên:</strong><?php echo $row['tenkhachhang']?> </p>
            <p><strong>Email:</strong><?php echo $row['email']?></p>
            <p><strong>Số điện thoại:</strong> <?php echo $row['sdt']?></p>
            <p><strong>Ngày sinh:</strong> <?php echo $row['ngaysinh']?></p>
            <p><strong>Hạng thành viên:</strong> <?php echo $row['name']?></p>
            <?php } ?>
        </div>

        <!-- Lịch sử đơn hàng -->
        <div class="tab-pane fade" id="history" role="tabpanel">
        <h3>Lịch sử đơn hàng</h3>
<?php if (!empty($data['history'])) { ?>
    <?php foreach ($data['history'] as $mahoadon => $order) { ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã đơn</th>
                    <th>Ngày đặt</th>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($order['sanphams'] as $sp) { ?>
                    <tr>
                        <td><?php echo $mahoadon; ?></td>
                        <td><?php echo $order['ngaytao']; ?></td>
                        <td><?php echo $sp['sanpham']; ?></td>
                        <td><?php echo $sp['soluong']; ?></td>
                        <td><?php echo $order['tongtiensaugiam']; ?></td>
                        <td><?php echo $order['trangthai']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>
<?php } ?>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
