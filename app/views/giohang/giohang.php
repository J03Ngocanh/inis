<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link href="<?php echo WEBROOT; ?>public/huhu.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .duong_dan ul li .dropdown-menu {
            display: none;
        }

        body {
            background: linear-gradient(to bottom right, rgb(134, 204, 118), rgb(217, 235, 215));
            background-size: cover;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
        }


        .cart-container {
            align-items: center;
            margin: 20px;
            padding: 20px;
            border-radius: 5px;
            color: green;
        }

        .cart-items {
            align-items: center;
            display: flex;
            flex-direction: column; /* Sắp xếp các sản phẩm theo cột (mỗi sản phẩm 1 dòng) */
            gap: 20px; /* Khoảng cách giữa các sản phẩm */
        }

        .cart-item {
            background: #fff;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: row; /* Sắp xếp các thành phần của sản phẩm theo dòng ngang */
            justify-content: space-between; /* Căn chỉnh các thành phần */
            width: 50%;
            align-items: center;
        }

        h2 {
            color: white;
            text-align: center;
        }

        .cart-item-info {
            text-align: left;
            margin-right: 10px;
        }

        .cart-item-info p {
            margin: 10px 0;
        }

        .cart-item-image img {
            width: 70%;
            height: auto;
            max-width: 150px;
            margin-right: 10px;
        }

        .cart-item-actions {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .quantity-input {
            border: none;
            width: 60px;
            margin-bottom: 10px;

        }

        .delete-btn {
            background: none;
            border: none;

            color: red;
            cursor: pointer;
            font-size: 20px;
        }

        .delete-btn:hover {
            color: darkred;
        }

        .delete-btn i {
            font-size: 18px;
        }

        .btn-quaylai {
            display: inline-block;
            color: white;
            text-decoration: none;
            font-size: 16px;
            margin-top: 20px;
        }


        .tongTien {
            position: fixed;
            right: 20px;
            bottom: 80px;
            font-size: 20px;
            font-weight: bolder;
            color: rgb(9, 65, 22);
            text-align: right;
            width: 250px;
            border-radius: 8px;
        }

        .thanh-toan {
            position: fixed;
            right: 20px;
            bottom: 20px;
        }

        .btn-thanh-toan {
            display: inline-block;
            padding: 10px 20px;
            background-color: rgb(245, 248, 245);
            color: #218838;
            text-decoration: none;
            border-radius: 5px;
            border: 1px solid #218838;
            font-size: 16px;
            margin-top: 20px;
            font-size: 20px;
        }

        .btn-thanh-toan:hover {
            background-color: #218838;
            color: white;
        }

        #confirmModal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            width: 300px;
        }

        button {
            margin: 5px;
            padding: 10px;
            font-size: 16px;
        }

        .cart-item-info {
            width: 50%;

        }

        .quantity-input {
            width: 30px;
            text-align: center;
            font-size: 16px;
            background-color: transparent;

        }

        /* Style cho container chứa nút + - */
        .quantity-container {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* Style cho nút + và - */
        .btn-decrease, .btn-increase {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 5px 10px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        /* Hover hiệu ứng */
        .btn-decrease:hover, .btn-increase:hover {
            background-color: #218838;
        }

        #confirmYes {
            border-radius: 5px;
            background-color: #218838;
            border: white;
            color: white;
            cursor: pointer;
        }

        #confirmNo {
            border-radius: 5px;
            background-color: rgb(230, 12, 34);
            border: white;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>


<div class="cart-container">
    <h2>GIỎ HÀNG</h2>
    <div class="quaylai">
        <a href="<?php echo WEBROOT; ?>sanpham/sanpham" class="btn-quaylai">⬅ Sản Phẩm</a>
    </div>
    <?php if (!empty($data['giohang'])): ?>

        <div class="cart-items">

            <?php foreach ($data['giohang'] as $item): ?>
                <div class="cart-item">
                    <div class="cart-item-image">
                        <img src="<?php echo WEBROOT; ?>public/img/<?php echo $item['hinhanh'] ?>" alt="product">
                    </div>
                    <div class="cart-item-info">
                        <p><strong></strong> <?= htmlspecialchars($item['tensanpham']) ?></p>
                        <p style="font-weight: bolder;">
                            <strong></strong> <?php echo number_format($item['giagoc'], 0, ',', '.'); ?>đ</p>
                    </div>

                    <div class="cart-item-actions">
                        <div class="quantity-container">
                            <button type="button" class="btn-decrease"
                                    data-masanpham="<?= htmlspecialchars($item['masanpham']) ?>">−
                            </button>
                            <input type="number" class="quantity-input"
                                   data-masanpham="<?= htmlspecialchars($item['masanpham']) ?>"
                                   value="<?= htmlspecialchars($item['soluong']) ?>"
                                   min="1" step="1" readonly>
                            <button type="button" class="btn-increase"
                                    data-masanpham="<?= htmlspecialchars($item['masanpham']) ?>">+
                            </button>
                        </div>
                        <form method="POST" action="<?= WEBROOT ?>giohang/removeItem"
                              id="removeForm_<?= $item['masanpham'] ?>">
                            <input type="hidden" name="masanpham" value="<?= htmlspecialchars($item['masanpham']) ?>">
                            <button type="button" class="delete-btn" data-masanpham="<?= $item['masanpham'] ?>">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div id="confirmModal" style="display:none;">
            <div class="modal-content">
                <p style="color: black;">Bạn có chắc chắn muốn xóa sản phẩm này?</p>
                <button id="confirmYes">Có</button>
                <button id="confirmNo">Không</button>
            </div>
        </div>

    <?php else: ?>
        <p>Giỏ hàng của bạn đang trống.</p>
    <?php endif; ?>


    <!-- Hiển thị tổng tiền -->
    <div class="tongTien" id="tongTien">
        <p>Tổng tiền: VNĐ</p>
    </div>


    <?php
    $cartEmpty = empty($_SESSION['giohang']); // Kiểm tra giỏ hàng có trống không
    ?>

    <div class="thanh-toan">
        <a href="<?php echo !$cartEmpty ? WEBROOT . 'giohang/checkout' : 'javascript:void(0)'; ?>"
           class="btn-thanh-toan <?php echo $cartEmpty ? 'disabled' : ''; ?>"
            <?php echo $cartEmpty ? 'style="background-color: gray; border: 1px solid gray; cursor: not-allowed; pointer-events: none; color: white;"' : ''; ?>>
            Thanh toán
        </a>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Khi click vào nút xóa, xác nhận xóa sản phẩm
            $('.delete-btn').click(function (e) {
                e.preventDefault(); // Ngăn hành động mặc định của form
                var masanpham = $(this).data('masanpham'); // Lấy mã sản phẩm từ thuộc tính data-masanpham
                confirmDelete(masanpham); // Gọi hàm confirmDelete
            });

            var masanphamToDelete = null;

            function confirmDelete(masanpham) {
                // Lưu mã sản phẩm cần xóa
                masanphamToDelete = masanpham;
                // Hiển thị modal xác nhận
                $('#confirmModal').show();
            }

            // Khi nhấn "Có" trong modal, thực hiện xóa sản phẩm
            $('#confirmYes').click(function () {
                if (masanphamToDelete) {
                    var form = $('#removeForm_' + masanphamToDelete); // Lấy form xóa theo mã sản phẩm
                    form.submit();  // Gửi form xóa sản phẩm
                }
                closeModal();  // Đóng modal sau khi xóa
            });

            // Khi nhấn "Không" trong modal, đóng modal
            $('#confirmNo').click(function () {
                closeModal();
            });

            function closeModal() {
                $('#confirmModal').hide(); // Ẩn modal
            }

            $('.btn-increase').click(function () {
                var input = $(this).siblings('.quantity-input');
                var masanpham = $(this).data('masanpham');
                var currentValue = parseInt(input.val());
                var newValue = currentValue + 1;
                checkAndUpdateQuantity(masanpham, newValue, input);
            });

            // Nút giảm số lượng
            $('.btn-decrease').click(function () {
                var input = $(this).siblings('.quantity-input');
                var masanpham = $(this).data('masanpham');
                var currentValue = parseInt(input.val());
                if (currentValue > 1) {
                    var newValue = currentValue - 1;
                    checkAndUpdateQuantity(masanpham, newValue, input);
                }
            });

            function checkAndUpdateQuantity(masanpham, newQuantity, inputElement) {
                $.ajax({
                    url: '<?php echo WEBROOT; ?>giohang/checkQuantity',
                    type: 'POST',
                    data: {
                        masanpham: masanpham,
                        soluong: newQuantity
                    },
                    success: function (response) {
                        var data = JSON.parse(response);
                        if (data.status === 'success') {
                            // Nếu số lượng hợp lệ, cập nhật giỏ hàng
                            updateQuantity(masanpham, newQuantity, inputElement);
                        } else {
                            // Nếu vượt quá tồn kho, hiển thị thông báo
                            alert('Số lượng yêu cầu vượt quá tồn kho! Còn lại: ' + data.available + ' sản phẩm');
                        }
                    },
                    error: function () {
                        alert('Có lỗi xảy ra khi kiểm tra số lượng!');
                    }
                });
            }

            // Hàm gửi yêu cầu AJAX để cập nhật số lượng
            function updateQuantity(masanpham, newQuantity, inputElement) {
                $.ajax({
                    url: '<?php echo WEBROOT; ?>giohang/updateQuantity',
                    type: 'POST',
                    data: {
                        masanpham: masanpham,
                        soluong: newQuantity
                    },
                    success: function (response) {
                        inputElement.val(newQuantity);
                        updateCartTotal(); // Cập nhật tổng tiền
                        updateCartCount(); // Cập nhật số lượng trên icon
                    },
                    error: function () {
                        alert('Có lỗi xảy ra khi cập nhật số lượng!');
                    }
                });
            }

            // Hàm cập nhật tổng tiền giỏ hàng
            function updateCartTotal() {
                var total = 0;
                $('.cart-item').each(function () {
                    var quantity = parseInt($(this).find('.quantity-input').val());
                    var unitPriceText = $(this).find('.cart-item-info p:nth-child(2)').text();
                    var unitPrice = parseFloat(unitPriceText.replace('đ', '').replace(/\./g, '').replace(',', '.'));
                    total += (quantity * unitPrice);
                });

                var formattedTotal = total.toLocaleString('vi-VN') + 'đ';
                $('#tongTien p').text('Tổng tiền: ' + formattedTotal);
            }

            // Hàm cập nhật số lượng trên icon giỏ hàng
            function updateCartCount() {
                $.ajax({
                    url: '<?php echo WEBROOT; ?>giohang/getCartCount',
                    type: 'GET',
                    success: function (response) {
                        console.log(response)
                        var count = parseInt(response);
                        if (count > 0) {
                            $('.cart-count').text(count).show();
                        } else {
                            $('.cart-count').hide();
                        }
                    },
                    error: function () {
                        console.log('Lỗi khi lấy số lượng giỏ hàng');
                    }
                });
            }

            // Cập nhật tổng tiền và số lượng khi trang tải
            updateCartTotal();
            updateCartCount();
        });
    </script>
</body>
</html>
