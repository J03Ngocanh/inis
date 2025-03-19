<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giao Diện Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Nunito", sans-serif;
        }

        .toto {
            display: flex;
            min-height: 100vh;
            background-color: #f9f9f9;
        }
        .detail{
            margin-left: 250px;
            margin-top: 80px;

        }

        .header {
            display: flex;
         
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 100%;
            height: 60px;
            position: fixed;
            top: 0;
            z-index: 1000;
        }
        .icon-menu{
            display: flex;
            gap:10px;
        }
        .logo img {
            width: 200px;
            height: auto;
        }

        .sidebar {
            width: 250px;
            background-color: rgb(68, 184, 88);
            color: #fff;
            padding-top: 80px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
        }

        .sidebar .menu {
            list-style: none;
        }

        .sidebar .menu a {
            display: block;
            padding: 15px 25px;
            font-size: 18px;
            color: white;
            text-decoration: none;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .sidebar .menu a i {
            margin-right: 10px;
        }

        .sidebar .menu a:hover,
        .sidebar .menu a.active {
            background-color: rgb(21, 100, 12);
            color: white;
        }

        /* Đổi màu khi menu chính được nhấn */
        .sidebar .menu a.open {
            background-color: rgb(30, 130, 20);
        }

        .sidebar .submenu {
            list-style: none;
            padding-left: 30px;
            display: none; /* Ẩn menu con mặc định */
        }

        .sidebar .submenu a {
            padding: 10px 25px;
            font-size: 16px;
            color: white;
            text-decoration: none;
        }

        .sidebar .submenu a:hover {
            background-color: rgb(194, 224, 204);
            color: rgb(5, 27, 11);
        }

        .content {
            margin-left: 250px;
            margin-top: 60px;
            padding: 20px;
        }
    </style>
</head>
<body>
<div class="to">
    <header class="header">
        <div class="logo">
            <a href="<?php echo WEBROOT; ?>tongquan/tongquan">
                <img src="<?php echo WEBROOT; ?>public/img/innis.png" alt="Logo">
            </a>
        </div>
        <div class="icon-menu">
            <?php if (isset($_SESSION['tennhanvien'])): ?>
                Xin chào, <strong><?= htmlspecialchars($_SESSION['tennhanvien']); ?></strong>
                <a href="<?php echo WEBROOT; ?>taikhoan/logout" style="text-decoration:none; color:black">| Đăng xuất</a>
            <?php else: ?>
                <a href="<?php echo WEBROOT; ?>taikhoan/login" class="icon"><i class="fas fa-user"></i></a>
            <?php endif; ?>
        </div>
    </header>
</div>
<div class="sidebar">
    <ul class="menu">
        <li><a href="<?php echo WEBROOT . 'admin/tongquan' ?>"><i class="fas fa-house"></i>Tổng quan</a></li>
        <li><a href="<?php echo WEBROOT . 'admin/nhanvien' ?>"><i class="fas fa-building"></i>Nhân viên</a></li>
        <li><a href="<?php echo WEBROOT . 'admin/khachhang' ?>"><i class="fa-solid fa-boxes-stacked"></i>Khách hàng</a></li>
        <li><a href="<?php echo WEBROOT . 'admin/sanpham' ?>"><i class="fa-brands fa-product-hunt"></i>Sản phẩm</a></li>
        <li><a href="<?php echo WEBROOT . 'admin/donhang' ?>"><i class="fa-solid fa-file-import"></i>Đơn hàng</a></li>
       
       
    
    </ul>
</div>

<script>
    // Lấy URL hiện tại
    const currentUrl = window.location.href;

    // Lấy tất cả các mục <a> trong menu và submenu
    const menuItems = document.querySelectorAll('.sidebar .menu a');

    // Hàm xóa class active hoặc open khỏi tất cả các mục
    function removeActiveStates() {
        menuItems.forEach(item => {
            item.classList.remove('active', 'open');
        });

        // Đóng tất cả submenu
        const allSubmenus = document.querySelectorAll('.submenu');
        allSubmenus.forEach(submenu => {
            submenu.style.display = 'none';
        });
    }

    // Đặt trạng thái active cho mục phù hợp với URL hiện tại
    menuItems.forEach(item => {
        if (item.href === currentUrl) {
            removeActiveStates(); // Xóa trạng thái active trước khi gán mới
            item.classList.add('active');
            const parentMenu = item.closest('.submenu')?.previousElementSibling;
            if (parentMenu) {
                parentMenu.classList.add('active');
                parentMenu.nextElementSibling.style.display = 'block';
            }
        }
    });

    // Xử lý hiển thị submenu khi nhấn vào Báo cáo
    const reportMenu = document.querySelector('.report-menu');
    const submenu = document.querySelector('.submenu');

    reportMenu.addEventListener('click', function () {
        const isVisible = submenu.style.display === 'block';

        // Xóa trạng thái active hoặc open khỏi các mục khác
        removeActiveStates();

        // Hiển thị hoặc ẩn submenu
        submenu.style.display = isVisible ? 'none' : 'block';

        // Thêm class 'open' để đổi màu khi mở submenu
        if (!isVisible) {
            reportMenu.classList.add('open');
        }
    });
</script>

</body>
</html>
