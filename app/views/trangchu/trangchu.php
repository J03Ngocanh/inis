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
</head>
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
    padding:2%
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
.buy-now{
    background-color:  #139b43;
    color: white;
    font-size:16px;
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
    background-color:rgb(255, 255, 255);
    color:  #28a745;
    border-color:   #28a745;
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
 

</style>
<div class="noi-dung">

    <body>
        <?php 
         if(isset( $_SESSION['loidangnhap'])){
            unset( $_SESSION['loidangnhap']);
         }
        ?> 
        
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
                
                    <div class="slogan" style="margin-top:-40px,">
                <p style= "font-size: 26px">"Effective, nature-powered </p>
                <p style="text-transform: uppercase;font-weight:bolder; font-size:50px; margin-top: -30px; letter-spacing: 5px;"> skincare </p>  
                <p style="margin-top:-60px">discovered from the island"</p>
                <p style="font-size: 17px; font-style: italic;  text-align: justify; max-width: 100%">Innisfree, the pure island where clean nature and healthy beauty coexist in harmony. Innisfree is a natural brand that shares the benefits of nature from the pristine island of Jeju for healthy beauty and pursues an eco-friendly green life to preserve the balance of nature</p>
                     </div>
                     <div id="shop-now">
                          <a href="<?php echo WEBROOT . 'sanpham/sanpham' ?>"><button>SHOP NOW</button></a>
                    </div>
    
                </div>
                <div class='right'></div>
           </div>
        </div>
        <div class="flash-sale">
    <h2>Flash Sale</h2>
    <div class="countdown-timer">
        <p>Còn lại: <span id="timer"></span></p>
    </div>
    <div class="product-list">
        <div class="product">
            <img src="product1.jpg" alt="Sản phẩm 1">
            <p class="product-name">Sản phẩm 1</p>
            <p class="product-price">Giá gốc: 100.000 VND</p>
            <p class="flash-sale-price">Giảm còn: 50.000 VND</p>
            <button>Mua ngay</button>
        </div>
        <div class="product">
            <img src="product2.jpg" alt="Sản phẩm 2">
            <p class="product-name">Sản phẩm 2</p>
            <p class="product-price">Giá gốc: 200.000 VND</p>
            <p class="flash-sale-price">Giảm còn: 100.000 VND</p>
            <button>Mua ngay</button>
        </div>

    </div>
</div>

<section class="event-blog-section">
    <h2 class="section-title">BEST SELLER</h2>            
        <div  class="product-detail"  style="margin-top:20px">
            <?php while($row = mysqli_fetch_array($best)){ ?>
                <div class="item"> 
                    <a href="<?php echo WEBROOT . 'sanpham/chitietsp/' . $row['masanpham']; ?>"><img src="<?php echo WEBROOT; ?>public/img/<?php echo $row['hinhanh'] ?>"  alt=""></a>
                    <a href="<?php echo WEBROOT . 'sanpham/chitietsp/' . $row['masanpham']; ?>"><p  style="font-size: 12px;"><?php echo $row['tensanpham']?></p></a>
                     <span></span>
                                  <p style="margin-top:-5px;">
                                       <a href="<?php echo WEBROOT . 'sanpham/chitietsp/' . $row['masanpham']; ?>" style="color:green; font-weight:bold; text-decoration:none;">
                                       VND <?php echo number_format($row['giagoc'], 0, ',', '.'); ?>đ
                                      </a>
                                  </p>
                                  <form action="/inis/giohang/themgh/<?php echo $row['masanpham']; ?>" method="POST">
                                      <input type="hidden" name="masanpham" value="<?= htmlspecialchars($row['masanpham']) ?>">
                                      <button style="margin-bottom: 20px;" type="submit" class="buy-now">Thêm vào giỏ hàng</button>
                                      <?php
                                       if (isset($_SESSION['flash_message'])) {
                                       echo "<div id='flash-message' class='flash-message'>" . $_SESSION['flash_message'] . "</div>";
                                     unset($_SESSION['flash_message']);
                                    }
                                     ?>

                                  </form>
      
            </div>
        <?php } ?>
    </div>  
</section>
    
    <section class="event-blog-section">
          <h2 class="section-title">NEW ITEMS</h2>
                      
                      <div  class="product-detail"  style="margin-top:20px">
                          <?php
                          while($row = mysqli_fetch_array($new)){
                              ?>
                              
                              <div class="item"> 
                                  <a href="<?php echo WEBROOT . 'sanpham/chitietsp/' . $row['masanpham']; ?>"><img src="<?php echo WEBROOT; ?>public/img/<?php echo $row['hinhanh'] ?>"  alt=""></a>
                                  
                              
                                  <a href="<?php echo WEBROOT . 'sanpham/chitietsp/' . $row['masanpham']; ?>"><p  style="font-size: 12px;"><?php echo $row['tensanpham']?></p></a>
                                
                                  <span></span>
                                  <p style="margin-top:-5px;">
                                       <a href="<?php echo WEBROOT . 'sanpham/chitietsp/' . $row['masanpham']; ?>" style="color:green; font-weight:bold; text-decoration:none;">
                                       VND <?php echo number_format($row['giagoc'], 0, ',', '.'); ?>đ
                                      </a>
                                  </p>
                                  <form action="/inis/giohang/themgh/<?php echo $row['masanpham']; ?>" method="POST">
                                      <input type="hidden" name="masanpham" value="<?= htmlspecialchars($row['masanpham']) ?>">
                                      <button style="margin-bottom: 20px;" type="submit" class="buy-now">Thêm vào giỏ hàng</button>
                                      <?php
                                       if (isset($_SESSION['flash_message'])) {
                                       echo "<div id='flash-message' class='flash-message'>" . $_SESSION['flash_message'] . "</div>";
                                     unset($_SESSION['flash_message']);
                                    }
                                     ?>
                                  </form>
      
                              </div>
                              <?php } ?>
                                
      
                              </div>  
    </section>
    
                    
    
        <section class="event-blog-section">
         <h2 class="section-title">EVENT BLOG</h2>
         <div class="blogs">
        <div class="blog" data-id="blog1">
        <a href="<?php echo WEBROOT; ?>veinnis/blog1">
          <img style = "width:" src="<?php echo WEBROOT; ?>public/img/blog1.png" alt="blog1">
         
        </a>
        </div>
        <div class="blog" data-id="blog2">
        <a href="<?php echo WEBROOT; ?>veinnis/blog2">
        <img src="<?php echo WEBROOT; ?>public/img/blog2.png" alt="blog2">
       
        </a>
        </div>
      </div>
    </section>
    <section class="event-blog-section">
    <div class="member-benefits">
            <h2 class="section-title">CHÍNH SÁCH </h2>
            <div class="benefits-container">
              
            <div class="benefit-item">
                    <a href="/inis/app/views/chinhsach/muahang.php">
                      <div class="icon">
                          <img src="<?php echo WEBROOT; ?>public/img/1.png" alt="Voucher ưu đãi">
                      </div>
                      <p>Chính sách mua hàng</p>
                    </a>
                </div>
    
           
           
                <div class="benefit-item">
                    <a href="/inis/app/views/chinhsach/trahang.php">
                      <div class="icon">
                          <img src="<?php echo WEBROOT; ?>public/img/2.png" alt="Voucher ưu đãi">
                      </div>
                      <p>Chính sách trả hàng</p>
                    </a>
                </div>
    
                <div class="benefit-item">
                    <a href="/inis/app/views/chinhsach/giaohang.php">
                      <div class="icon">
                          <img src="<?php echo WEBROOT; ?>public/img/3.png" alt="">
                      </div>
                      <p>Dịch vụ giao hàng</p>
                    </a>
                </div>
    
                <div class="benefit-item">
                   <a href="/inis/app/views/chinhsach/pttt.php">
                      <div class="icon">
                          <img src="<?php echo WEBROOT; ?>public/img/4.png" alt="Phương thức thanh toán">
                      </div>
                      <p>Phương thức thanh toán</p>
                   </a>
                </div>
            </div>
        </div>
        </section> 
</div>
    
    <script src="<?php echo WEBROOT; ?>java/script.js"></script>
 
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Hiển thị thanh thông báo nếu có
    if ($('#flash-message').length > 0) {
        $('#flash-message').addClass('show'); // Thêm class 'show' để hiển thị thông báo

        // Sau 5 giây, ẩn thông báo
        setTimeout(function() {
            $('#flash-message').fadeOut(500); // Dần dần ẩn thanh thông báo
        }, 5000); // Thời gian hiển thị 5 giây
    }
});
</script>

</html>
