<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm</title>
    <style>
        body {
            font-family: Nunito, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .product-header {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }
        .product-image {
            width: 35%;
        }
        .product-image img {
            width: 100%;
            border-radius: 8px;
        }
        .product-info {
            width: 55%;
        }
        .product-info h1 {
            font-size: 24px;
            margin: 0;
            color: #333;
        }
        .product-info .price {
            font-size: 20px;
            color: #e74c3c;
            margin: 10px 0;
        }
        .quantity {
            margin-top:40px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .quantity label {
            font-size: 16px;
            color: #333;
        }
        .quantity-btn {
            width: 30px;
            height: 30px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            font-size: 18px;
            text-align: center;
            cursor: pointer;
            outline: none;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
        }
        .quantity-btn:hover {
            background-color: #e0e0e0;
        }
        .quantity-input {
            width: 50px;
            height: 30px;
            text-align: center;
            border: 1px solid #ccc;
            font-size: 16px;
            border-radius: 5px;
        }
        .action-buttons {
            display: flex;
            align-items: center;
            margin-top: 40px;
            gap: 10px;
        }
        .nut {
            flex: 1;
            padding: 10px;
            background-color: #12b560;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            font-size: 17px;
        }
        .nut:hover {
            background-color: #0e9b4d;
        }
        .thongtin {
            width: 100%;
            margin-top: 20px;
         
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            font-size: 16px;
            color: #333;
        }
 .product-image {
    text-align: center;
}

.main-image img {
    width: 400px; /* Điều chỉnh kích thước */
    height: auto;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.thumbnail-container {
    display: flex;
    justify-content: center;
    margin-top: 10px;
}

.thumbnail {
    width: 80px;
    height: 80px;
    margin: 5px;
    cursor: pointer;
    border-radius: 5px;
    border: 2px solid transparent;
    transition: transform 0.3s ease, border 0.3s ease;
}

.thumbnail:hover {
    transform: scale(1.1);
    border: 2px solid green;
}

        /* Đối với các trình duyệt Webkit (Chrome, Edge, Safari) */
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* Đối với Firefox */
 input[type="number"] {
    -moz-appearance: textfield;
} 
    </style>
</head>
<div class="noi-dung">
    <body>
        <div class="container">
            <?php while ($row = mysqli_fetch_array($sanpham)) { ?>
            <!-- Product Header -->
            <div class="product-header" >
                <div class="product-image">
                
    <div class="main-image">
        <img id="largeImage" src="<?php echo WEBROOT; ?>public/img/<?php echo $row['hinhanh']; ?>" alt="">
    </div>


    <div class="thumbnail-container">
        <img class="thumbnail" src="<?php echo WEBROOT; ?>public/img/<?php echo $row['hinhanh1']; ?>" alt="Ảnh 1" onclick="changeImage(this)">
        <img class="thumbnail" src="<?php echo WEBROOT; ?>public/img/<?php echo $row['hinhanh2']; ?>" alt="Ảnh 2" onclick="changeImage(this)">
        <img class="thumbnail" src="<?php echo WEBROOT; ?>public/img/<?php echo $row['hinhanh3']; ?>" alt="Ảnh 3" onclick="changeImage(this)">
        <img class="thumbnail" src="<?php echo WEBROOT; ?>public/img/<?php echo $row['hinhanh4']; ?>" alt="Ảnh 4" onclick="changeImage(this)">
    </div>


                </div>
                <div class="product-info">
                    <h1><?php echo htmlspecialchars($row['tensanpham']); ?></h1>
                    <div class="price">
                        <p style="margin-top: -5px; color: green; font-weight: bold; text-decoration: none;">
                            VND <?php echo number_format($row['giagoc'], 0, ',', '.'); ?>đ
                        </p>
                    </div>
                    <div class="quantity">
                        <label for="">Số lượng:</label>
                        <button type="button" class="quantity-btn minus">-</button>
                        <input type="number" class="quantity-input" id= "myInput" name="soluong" value="1" min="1" />
                        <button type="button" class="quantity-btn plus">+</button>
                    </div>
                    <div class="action-buttons">
                        <form method="POST" action="/acc/giohang/themvaogiohang/<?php echo $row['masanpham']; ?>">
                            <input type="hidden" id="quantityAdd" name="soluong" value="1">
                            <button type="submit" class="nut">THÊM VÀO GIỎ HÀNG</button>
                        </form>
                        <form method="POST" action="/acc/giohang/muangay/<?php echo $row['masanpham']; ?>">
                            <input type="hidden" id="quantityBuy" name="soluong" value="1">
                            <button type="submit" class="nut">MUA NGAY</button>
                        </form>
                    </div>
                    <div class="thongtin">
                <?php echo $row['mota']; ?>
            </div>
            <?php } ?>
                </div>
            
            </div>
             
        </div>
    </body>
</div>
    <script>
   
function changeImage(thumbnail) {
    let largeImage = document.getElementById("largeImage");
    largeImage.src = thumbnail.src;
}

document.addEventListener("DOMContentLoaded", function () {
    const quantityInput = document.querySelector(".quantity-input");
    const minusBtn = document.querySelector(".quantity-btn.minus");
    const plusBtn = document.querySelector(".quantity-btn.plus");
    const quantityAdd = document.getElementById("quantityAdd");
    const quantityBuy = document.getElementById("quantityBuy");

    minusBtn.addEventListener("click", function () {
        let value = parseInt(quantityInput.value) || 1;
        if (value > 1) {
            value--;
            quantityInput.value = value;
            quantityAdd.value = value;
            quantityBuy.value = value;
        }
    });

    plusBtn.addEventListener("click", function () {
        let value = parseInt(quantityInput.value) || 1;
        value++;
        quantityInput.value = value;
        quantityAdd.value = value;
        quantityBuy.value = value;
    });

    quantityInput.addEventListener("input", function () {
        const value = parseInt(quantityInput.value) || 1;
        quantityAdd.value = value;
        quantityBuy.value = value;
    });
});

    </script>

</html>
