<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Innisfree</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script>
        function closeBanner() {
            document.getElementById('promo-banner').style.display = 'none';
        }
    </script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        .event-blog-section {
            margin: 0 auto;
            width: 80%;
            text-align: center;
            padding: 2%
            background-color: #f9f9f9;
        }

        .anh_giua, .anh_ngang, .anh_doc {
            flex: 1;
            text-align: center;
            max-width: 30%;
        }

        .section-title {
            font-size: 28px;
            color: green;
            margin-bottom: 20px;
            text-transform: uppercase;
            font-weight: bold;
            background: linear-gradient(to right, #008000, #008000);
            background-clip: text;
            -webkit-text-fill-color: transparent;
            position: relative;
            display: inline-block;

        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            height: 4px;
            background: linear-gradient(to right, #008000, #008000);
            border-radius: 10px;
        }

        .blogs {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            padding: 3%;
        }

        .blog {
            width: 250px;
            cursor: pointer;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .blog:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .blog img {
            width: 100%;
            height: auto;
        }

        .product-detail {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 25px;
            margin-top: 20px;
            padding: 0 5%;
            justify-content: center;
            align-items: center;
        }

        .item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;

        }

        .item:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .item img {
            width: 70%;
            height: auto;
            object-fit: cover;
        }

        .member-benefits {
            background-color: #f9f9f9;
            text-align: center;
            padding: 3%;
        }

        .benefits-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }

        .benefit-item {
            text-align: center;
            width: 200px;
            transition: transform 0.3s ease;

        }

        .benefit-item:hover {
            transform: scale(1.1);
        }

        .benefit-item .icon {
            border: 2px solid #139b43;
            border-radius: 50%;
            width: 64px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
        }

        .buy-now {
            background-color: #139b43;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer
        }

        #shop-now button:hover {
            background-color: darkgreen;
        }

        .benefit-item .icon img {
            width: 40px;
            height: 40px;
            transition: transform 0.3s ease;
        }

        .benefit-item:hover .icon img {
            transform: scale(1.2);
        }

        .flash-sale {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            margin: 20px;
        }

        .flash-sale h2 {
            color: #e60000;
            font-size: 24px;
        }

        .countdown-timer {
            margin: 20px 0;
            font-size: 18px;
        }

        .product-list {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .product {
            width: 200px;
            padding: 10px;
            margin: 10px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .product img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .product-name {
            font-weight: bold;
            margin-top: 10px;
        }

        .product-price {
            text-decoration: line-through;
            color: #888;
        }

        .flash-sale-price {
            color: #e60000;
            font-weight: bold;
        }

        button {
            background-color: #e60000;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .buy-now:hover {
            background-color: rgb(255, 255, 255);
            color: #28a745;
            border-color: #28a745;
        }

        .flash-message {
            position: fixed;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #28a745;
            color: white;
            padding: 10px;
            border-radius: 5px;
            display: none; /* Initially hidden */
            z-index: 1000;
            font-size: 16px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .flash-message.show {
            display: block;
            animation: slide-in 0.5s ease-out forwards;
        }

        .popup {
            display: none; /* Ẩn mặc định */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Làm tối nền */

            display: flex; /* Kích hoạt flexbox */
            justify-content: center; /* Căn giữa theo chiều ngang */
            align-items: center; /* Căn giữa theo chiều dọc */

            z-index: 9999; /* Đảm bảo hiển thị trên cùng */
        }

        .popup-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 300px;
            position: relative;
            animation: fadeIn 0.5s ease-in-out;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); /* Thêm đổ bóng */
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 20px;
            cursor: pointer;
        }

        .rank-icon {
            width: 80px;
            margin-top: 10px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }


        @keyframes slide-in {
            0% {
                top: -50px;
            }
            100% {
                top: 10px;
            }
        }


        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .product-detail {
                grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            }

            .blogs {
                flex-direction: column;
                align-items: center;
            }

            .blog {
                width: 90%;
            }
        }

        @media screen and (max-width: 480px) {
            .section-title {
                font-size: 24px;
            }

            .blogs {
                padding: 3%;
            }

            .product-detail {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            }

            .benefit-item {
                width: 100%;
            }
        }

        /* Thêm hiệu ứng chạy ngang */
        #promo-banner {
            padding: 10px;
            text-align: center;
            position: sticky;
            top: 0;
            left: 0;
            z-index: 1000;
            width: 100%;
        }

        /* Chỉnh sửa phần chạy chữ */
        #promo-banner span {
            display: inline-block;
            margin-right: 15px;
            font-size: 18px;
        }

        @keyframes slideBanner {
            0% {
                left: 100%;
            }
            100% {
                left: -100%;
            }
        }

        /* Style cho nút đóng */
        button {
            margin-left: 10px;
            border: none;
            background: none;
            cursor: pointer;
        }

        #flag {
            width: 50px; /* Bạn có thể thay đổi kích thước tùy ý */
            height: auto;
            vertical-align: middle;
            margin-right: 10px;
        }
        #messages {
            height: 80%;
            overflow-y: auto;
            margin-bottom: 10px;
        }
        #input {
            width: 100%;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }
        #messages p {
            margin: 5px 0;
        }
        #messages p b {
            color: #12b560; /* Màu xanh của Innisfree */
        }
        #chatbox {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 300px;
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            overflow: hidden;
            z-index: 1000;
            font-family: Arial, sans-serif;
        }

        #chat-log {
            height: 250px;
            padding: 10px;
            overflow-y: auto;
            background-color: #f9f9f9;
            font-size: 14px;
        }

        #chat-log div {
            margin-bottom: 8px;
        }

        #chat-log div b {
            color: #2a9d8f;
        }

        #chat-input {
            width: calc(100% - 70px);
            padding: 10px;
            border: none;
            border-top: 1px solid #eee;
            outline: none;
            font-size: 14px;
            box-sizing: border-box;
        }

        #chatbox button {
            width: 60px;
            border: none;
            background-color: #2a9d8f;
            color: white;
            font-weight: bold;
            cursor: pointer;
            padding: 10px 0;
            border-top: 1px solid #eee;
        }

        #chatbox button:hover {
            background-color: #21867a;
        }
    </style>
</head>
<body>

<?php
if (isset($_SESSION['loidangnhap'])) {
    unset($_SESSION['loidangnhap']);
}
?>

<div class="noi-dung">

    <!-- Hình ảnh slider -->
    <div class='anh_giua'>
        <img src="<?php echo WEBROOT; ?>public/img/anh_giua.jpeg" alt="anh giua">
    </div>
    <div class='anh_ngang'>
        <img src="<?php echo WEBROOT; ?>public/img/anh_ngang.jpg" alt="anh ngang">
    </div>
    <div class='anh_doc'>
        <img src="<?php echo WEBROOT; ?>public/img/anh_doc.jpg" alt="anh doc">
    </div>

    <div class="slider" style="display: flex;">
        <div class='left'>
            <div class="slogan" style="margin-top:-40px;">
                <p style="font-size: 26px">"Effective, nature-powered </p>
                <p style="text-transform: uppercase;font-weight:bolder; font-size:50px; margin-top: -30px; letter-spacing: 5px;">skincare </p>
                <p style="margin-top:-60px">discovered from the island"</p>
                <p style="font-size: 17px; font-style: italic;  text-align: justify; max-width: 100%">
                    Innisfree, the pure island where clean nature and healthy beauty coexist in harmony...
                </p>
            </div>
            <div id="shop-now">
                <a href="<?php echo WEBROOT . 'sanpham/sanpham' ?>">
                    <button>SHOP NOW</button>
                </a>
            </div>
        </div>
        <div class='right'></div>
    </div>

    <!-- Chatbox -->
    <div id="chatbox">
        <div id="chat-log"></div>
        <input type="text" id="chat-input" placeholder="Nhập câu hỏi...">
        <button onclick="sendMessage()">Gửi</button>
    </div>

    <!-- BEST SELLER -->
    <section class="event-blog-section">
        <h2 class="section-title">BEST SELLER</h2>
        <div class="product-detail" style="margin-top:20px">
            <?php while ($row = mysqli_fetch_array($best)) { ?>
                <div class="item">
                    <a href="<?= WEBROOT . 'sanpham/chitietsp/' . $row['masanpham']; ?>">
                        <img src="<?= WEBROOT; ?>public/img/<?= $row['hinhanh'] ?>" alt="">
                    </a>
                    <a href="<?= WEBROOT . 'sanpham/chitietsp/' . $row['masanpham']; ?>">
                        <p style="font-size: 12px;"><?= $row['tensanpham'] ?></p>
                    </a>
                    <p style="margin-top:-5px;">
                        <a href="<?= WEBROOT . 'sanpham/chitietsp/' . $row['masanpham']; ?>" style="color:green; font-weight:bold;">
                            VND <?= number_format($row['giagoc'], 0, ',', '.'); ?>đ
                        </a>
                    </p>
                    <form action="/inis/giohang/themgh/<?= $row['masanpham']; ?>" method="POST">
                        <input type="hidden" name="masanpham" value="<?= htmlspecialchars($row['masanpham']) ?>">
                        <button type="submit" class="buy-now">Thêm vào giỏ hàng</button>
                    </form>
                </div>
            <?php } ?>
        </div>
    </section>

    <!-- NEW ITEMS -->
    <section class="event-blog-section">
        <h2 class="section-title">NEW ITEMS</h2>
        <div class="product-detail" style="margin-top:20px">
            <?php while ($row = mysqli_fetch_array($new)) { ?>
                <div class="item">
                    <a href="<?= WEBROOT . 'sanpham/chitietsp/' . $row['masanpham']; ?>">
                        <img src="<?= WEBROOT; ?>public/img/<?= $row['hinhanh'] ?>" alt="">
                    </a>
                    <a href="<?= WEBROOT . 'sanpham/chitietsp/' . $row['masanpham']; ?>">
                        <p style="font-size: 12px;"><?= $row['tensanpham'] ?></p>
                    </a>
                    <p style="margin-top:-5px;">
                        <a href="<?= WEBROOT . 'sanpham/chitietsp/' . $row['masanpham']; ?>" style="color:green; font-weight:bold;">
                            VND <?= number_format($row['giagoc'], 0, ',', '.'); ?>đ
                        </a>
                    </p>
                    <form action="/inis/giohang/themgh/<?= $row['masanpham']; ?>" method="POST">
                        <input type="hidden" name="masanpham" value="<?= htmlspecialchars($row['masanpham']) ?>">
                        <button type="submit" class="buy-now">Thêm vào giỏ hàng</button>
                    </form>
                </div>
            <?php } ?>
        </div>
    </section>

    <!-- EVENT BLOG -->
    <section class="event-blog-section">
        <h2 class="section-title">EVENT BLOG</h2>
        <div class="blogs">
            <div class="blog" data-id="blog1">
                <a href="<?= WEBROOT; ?>veinnis/blog1">
                    <img src="<?= WEBROOT; ?>public/img/blog1.png" alt="blog1">
                </a>
            </div>
            <div class="blog" data-id="blog2">
                <a href="<?= WEBROOT; ?>veinnis/blog2">
                    <img src="<?= WEBROOT; ?>public/img/blog2.png" alt="blog2">
                </a>
            </div>
        </div>
    </section>

    <!-- CHÍNH SÁCH -->
    <section class="event-blog-section">
        <div class="member-benefits">
            <h2 class="section-title">CHÍNH SÁCH</h2>
            <div class="benefits-container">
                <?php
                $chinhSach = [
                    ['muahang', '1.png', 'Chính sách mua hàng'],
                    ['trahang', '2.png', 'Chính sách trả hàng'],
                    ['giaohang', '3.png', 'Dịch vụ giao hàng'],
                    ['pttt', '4.png', 'Phương thức thanh toán'],
                ];
                foreach ($chinhSach as [$slug, $img, $label]) {
                    echo "<div class='benefit-item'>
                            <a href='/inis/app/views/chinhsach/$slug.php'>
                                <div class='icon'><img src='" . WEBROOT . "public/img/$img' alt='$label'></div>
                                <p>$label</p>
                            </a>
                        </div>";
                }
                ?>
            </div>
        </div>
    </section>

    <!-- POPUP thăng hạng -->
    <?php if (isset($rank_up)): ?>
        <div id="rankUpPopup" class="popup">
            <div class="popup-content">
                <span class="close-btn" onclick="closePopup()">&times;</span>
                <h2>🎉 Chúc mừng! 🎉</h2>
                <p>Bạn đã thăng hạng lên <strong><?= getRankName($rank_up); ?></strong>!</p>
                <img style="width: 100px;" src="<?= WEBROOT; ?>public/img/rank_<?= $rank_up; ?>.png" alt="Rank mới" class="rank-icon">
            </div>
        </div>
    <?php endif; ?>

</div> <!-- .noi-dung -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?= WEBROOT; ?>java/script.js"></script>
<script>
    $(document).ready(function () {
        if ($('#flash-message').length > 0) {
            $('#flash-message').addClass('show');
            setTimeout(function () {
                $('#flash-message').fadeOut(500);
            }, 5000);
        }

        $("#rankUpPopup").show();
        $(".close-btn").click(function () {
            $("#rankUpPopup").hide();
        });
    });

    function sendMessage() {
        const msg = document.getElementById("chat-input").value.trim();
        if (msg === '') return;

        const log = document.getElementById("chat-log");
        log.innerHTML += `<div><b>Bạn:</b> ${msg}</div>`;

        fetch('<?php echo WEBROOT; ?>chat/chat', {
            method: "POST",
            headers: {"Content-Type": "application/json"},
            body: JSON.stringify({ message: msg })
        })
            .then(res => res.text())
            .then(data => {
                log.innerHTML += `<div><b>Bot:</b> ${data}</div>`;
                log.scrollTop = log.scrollHeight;
                document.getElementById("chat-input").value = "";
            });
    }
    document.getElementById("chat-input").addEventListener("keyup", function (event) {
        if (event.key === "Enter") {
            sendMessage();
        }
    });
</script>

<?php
function getRankName($rank_id)
{
    $ranks = [
        1 => "Member",
        2 => "Silver",
        3 => "Gold",
        4 => "Diamond"
    ];
    return $ranks[$rank_id] ?? "Member";
}
?>

</body>
</html>
