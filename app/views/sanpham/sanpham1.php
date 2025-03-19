<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục sản phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        main {
            margin: 50px;
            font-family: "Nunito", sans-serif;
        }
        .danhmuc {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    background-color: #12b560;
    border-radius: 0 0 15px 15px;
    position: relative;
}

.loai-wrapper {
    position: relative;
    text-align: center;
  
}

.loai-wrapper > a {
    font-size: 19px;
    font-weight: bold;
    color: white;
    text-decoration: none;
    display: block;
    padding: 10px;
}

.chanhocx2 {
    display: none;
    position: absolute;
    top: 100%; /* Đảm bảo danh mục con nằm ngay dưới */
    left: 0;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    min-width: 180px;
    padding: 10px 0;
    z-index: 100;
}

.chanhocx2 li {
    list-style: none;
    padding: 8px 15px;
}

.chanhocx2 li a {
    text-decoration: none;
    color: black;
    font-size: 14px;
    display: block;
    transition: background 0.3s;
}

.chanhocx2 li a:hover {
    color: #12b560;
    background-color: #f0f0f0;
}
.loai-wrapper:hover > a {
    color:rgb(24, 116, 50); /* Màu chữ khi hover */
    background-color: rgba(255, 255, 255, 0.2); /* Hiệu ứng nền nhẹ */
    border-radius: 8px; /* Bo tròn góc */
    padding: 10px; /* Thêm padding để dễ nhìn */
    transition: all 0.3s ease-in-out;
}
        a {
            text-decoration: none;
            color: black;
        }
        img {
            width: 200px;
            height: 200px;
        }
        .full{
            width: 80%;
            margin: 0 auto;
          
        }
      
        .product {
            margin-left: 30px;
        }
        .product-detail {
            display: grid;
            grid-template-columns: repeat(4, 200px);
            gap: 80px;
        }
        .item {
            text-align: center;
        }
        .buy-now {
            background-color: white;
            color: green;
            border: 1px solid #12b560;
            padding: 10px 20px;
            border-radius: 4px;
            font-weight: bold;
            width: 90%;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .buy-now:hover {
            background-color: #1e8449;
            color: white;
        }
       

        .toggle-icon {
            cursor: pointer;
            margin-left: 8px;
            transition: transform 0.3s ease;
        }
        .category-item.active .toggle-icon {
            transform: rotate(180deg);
        }
        span{
            font-size:20px; 
            color:green; 
            font-weight: bold;
        }
    </style>
</head>
<body>
<main>
<div class="full">
<div class="danhmuc">
    <?php while ($row = mysqli_fetch_array($loaisp)) { ?>
        <div class="loai-wrapper"> 
            <a href="/acc/sanpham/sanpham_loai/<?php echo $row['id_loaisp']; ?>"> 
                <?php echo $row['tenloai']; ?> 
            </a>
            <ul class="chanhocx2">
                <?php 
                mysqli_data_seek($danhmucsp, 0);
                while ($huhu = mysqli_fetch_array($danhmucsp)) {
                    if ($huhu['id_loaisp'] == $row['id_loaisp']) { ?>
                    <li>
                        <a href="/acc/sanpham/sanpham_danhmuc/<?php echo $huhu['id_danhmuc']; ?>"> 
                            <?php echo $huhu['tendanhmuc']; ?> 
                        </a>
                    </li>
                <?php } } ?>
            </ul>
        </div>
    <?php } ?>
</div>

        <div class="product">
            <p style="margin-top:22px;margin-bottom:22px;">
         
                <?php if(isset($tenloai)) { $row=mysqli_fetch_array($tenloai); ?>
                <span>></span>
                <span><?php echo $row['tenloai'] ;?></span>
                <?php } ?>
                <?php if(isset($tendanhmuc_loai)) { $row=mysqli_fetch_array($tendanhmuc_loai); ?>
                <span>></span>
                <span><?php echo $row['tenloai'] ;?></span>
                <span>></span>
                <span><?php echo $row['tendanhmuc'] ;?></span>
                <?php } ?>
            </p>
        
            <div class="product-detail" style="margin-top:20px">
                <?php while($row = mysqli_fetch_array($sanpham)) { ?>
                <div class="item"> 
                    <a href="<?php echo WEBROOT . 'sanpham/chitietsp/' . $row['masanpham']; ?>">
                        <img src="<?php echo WEBROOT; ?>public/img/<?php echo $row['hinhanh'] ?>" alt="">
                    </a>
                    <a href="<?php echo WEBROOT . 'sanpham/chitietsp/' . $row['masanpham']; ?>">
                        <p style="font-size: 12px;"> <?php echo $row['tensanpham']?> </p>
                    </a>
                    <p>
                        <a href="<?php echo WEBROOT . 'sanpham/chitietsp/' . $row['masanpham']; ?>" style="color:green; font-weight:bold;">
                            VND <?php echo number_format($row['giagoc'], 0, ',', '.'); ?>đ
                        </a>
                    </p>
                    <form action="/acc/giohang/themgh/<?php echo $row['masanpham']; ?>" method="POST">
                        <input type="hidden" name="masanpham" value="<?= htmlspecialchars($row['masanpham']) ?>">
                        <button type="submit" class="buy-now">Thêm vào giỏ hàng</button>
                    </form>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    </div>
</main>
<script>
  $(document).ready(function() {
    $(".loai-wrapper").mouseenter(function() {
        $(this).find(".chanhocx2").stop(true, true).fadeIn(200); 
    }).mouseleave(function() {
        setTimeout(() => {
            if (!$(this).find(".chanhocx2:hover").length) {
                $(this).find(".chanhocx2").stop(true, true).fadeOut(200); 
            }
        }, 200);
    });

    $(".chanhocx2").mouseleave(function() {
        $(this).stop(true, true).fadeOut(200); 
    });
});

</script>
</body>
</html>
