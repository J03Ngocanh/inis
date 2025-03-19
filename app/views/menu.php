<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="<?php echo WEBROOT; ?>public/huhu.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   
    <style>
        input, a{
            font-family: "Nunito", sans-serif;
        }
        #search{
            width: 80%;
        }
        body{
            font-family: "Nunito", sans-serif;
        }
        .duong_dan ul li .dropdown-menu {
         display: none; 
}
.search-bar {
    position: relative;
    width: 300px; /* Tùy chỉnh theo yêu cầu */
    align-items: center;
}
.menu {
    position: fixed; 
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000; /* Đảm bảo menu luôn ở trên cùng */
    background-color: white; /* Đảm bảo nền trắng cho menu */
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); /* Tạo hiệu ứng bóng cho menu */
}
#search {
    padding: 8px 12px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    outline: none;
    transition: border-color 0.3s;
}

#search:focus {
    border-color: #6b8e23; /* Màu xanh lá cây đậm khi focus */
    box-shadow: 0 0 5px rgba(107, 142, 35, 0.5);
}

.icon-menu {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 10px; 
}

.icon-menu span {
    white-space: nowrap; /* Đảm bảo không xuống dòng */
    font-size: 15px;
    color: #333;
}

.icon-menu p {
    margin: 0;
    padding: 0 5px;
    white-space: nowrap; /* Đảm bảo không xuống dòng */
}

.icon-menu a {
    white-space: nowrap; /* Đảm bảo không xuống dòng */
    text-decoration: none;
    color: #333;
    font-size: 15px;
    transition: color 0.3s;
}

.icon-menu a:hover {
    color: #6b8e23; /* Đổi màu khi hover */
}

#search-results {
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    max-height: 200px; /* Giới hạn chiều cao */
    overflow-y: auto; /* Thêm cuộn nếu nội dung quá dài */
    border: 1px solid #ccc;
    background-color: #fff;
    z-index: 9999;
    border-radius: 4px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    display: none; /* Ẩn mặc định */
}

#search-results div {
    display: flex; /* Sử dụng flexbox để xếp hình ảnh và văn bản ngang hàng */
    align-items: center;
    padding: 10px 12px;
    font-size: 14px;
    color: #333;
    cursor: pointer;
    transition: background-color 0.2s;
}

#search-results div img {
    width: 30px;
    height: auto;
    margin-right: 10px; /* Khoảng cách giữa ảnh và tên sản phẩm */
    border-radius: 4px; /* Thêm góc bo tròn nhẹ */
}

#search-results div:hover {
    background-color: #f0f8ff; /* Màu nền nhạt khi hover */
}

#search-results div:not(:last-child) {
    border-bottom: 1px solid #f0f0f0; /* Đường ngăn giữa các kết quả */
}
.noi-dung{
    margin-top: 80px;
}

    </style>
</head>
<body>

<div class="snow-container"></div>
    
    <div class='back'>
    <div class='menu'>
        <div class="logo">
            <a href="<?php echo WEBROOT; ?>trangchu/trangchu">
                <img style="width: 200px; height: auto;" src='<?php echo WEBROOT; ?>public/img/innis.png'>
                <img style="width:30px; height:auto; left:215px;" class="hat-icon" src="<?php echo WEBROOT; ?>public/img/hat.png" alt="hat">
            </a>
        </div>
        <div class="duong_dan">
            <ul>
            <li><a href="<?php echo WEBROOT; ?>taikhoan/thongtin">TRANG CỦA TÔI</a></li>
                <li><a href="<?php echo WEBROOT; ?>veinnis/trangchu">Về Innisfree</a></li>
                <li class="dropdown">
                    <a href="<?php echo WEBROOT; ?>sanpham/sanpham">Sản phẩm</a>
                    <ul class="dropdown-menu">
                        <?php While($row=mysqli_fetch_array($loaisp)){ ?>
                            <li style=" text-transform: capitalize; font-size: 15px; padding:1px; margin:1px;">
                                <a href="/acc/sanpham/sanpham_loai/<?php echo $row['id_loaisp']?>"><?php echo $row['tenloai'];?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
                
            </ul>
        </div>

        <!-- Đặt phần tìm kiếm và các icon giỏ hàng vào trong div.icon-menu -->
        <div class="icon-menu">
            <div class="search-bar">
                <form id="search-form" action="/acc/sanpham/xulytimkiem" method="post">
                    <input type="text" id="search" name="nd" placeholder="Tìm sản phẩm...">
                    <div id="search-results" style="position: absolute; background: white; border: 1px solid #ccc; width: 100%; z-index: 999;"></div>
                </form>
            </div>

            <!-- Kiểm tra người dùng đã đăng nhập hay chưa để hiển thị giỏ hàng, tên và đăng xuất -->
            <?php if (isset($_SESSION['tenkhachhang'])): ?>
               <a href="<?php echo WEBROOT; ?>giohang/giohang" class="icon">
                <i class="fas fa-shopping-cart"></i></a>
                
                <span ><strong><?= htmlspecialchars($_SESSION['tenkhachhang']); ?></strong></span>
                <p>|</p>
                <a style="font-size:15px;" href="<?php echo WEBROOT; ?>taikhoan/logout" class="icon">Đăng xuất</a>
            <?php else: ?>
                <a href="<?php echo WEBROOT; ?>giohang/giohang" class="icon"><i class="fas fa-shopping-cart"></i></a>
                <a  href="<?php echo WEBROOT; ?>taikhoan/login" class="icon"><i class="fas fa-user"></i></a>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="noi-dung"></div>
           
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   document.getElementById("search").addEventListener("keyup", function () {
        const query = this.value.trim();
        const searchResults = document.getElementById("search-results");

        if (query.length > 0) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "/acc/sanpham/goiy_timkiem", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    searchResults.innerHTML = xhr.responseText;
                    searchResults.style.display = "block"; // Hiển thị kết quả gợi ý
                }
            };

            xhr.send("nd=" + encodeURIComponent(query));
        } else {
            searchResults.innerHTML = ""; // Xóa kết quả cũ
            searchResults.style.display = "none"; // Ẩn gợi ý khi ô tìm kiếm rỗng
        }
    });

    document.getElementById("search-results").addEventListener("click", function (event) {
        const target = event.target;
        if (target.tagName === "DIV") {
            document.getElementById("search").value = target.innerText; // Gán tên sản phẩm vào input
            this.innerHTML = "";
            this.style.display = "none"; // Ẩn gợi ý sau khi chọn
        }
    });
    

   

</script>
</body>
</html>
