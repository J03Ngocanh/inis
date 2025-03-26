<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trang Quản Trị</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400&display=swap" rel="stylesheet">
  </head>
  <style>
/* Popup hiển thị chi tiết đơn hàng */
.popup {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: none; /* Mặc định ẩn */
    justify-content: center;
    align-items: center;
    z-index: 1000;
    animation: fadeIn 0.3s ease-in-out;
}

/* Nội dung chính của popup */
.popup-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    width: 60%;
    max-width: 700px;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
    position: relative;
    animation: slideDown 0.3s ease-in-out;
}

/* Nút đóng popup */
.close {
    font-size: 24px;
    font-weight: bold;
    color: #aaa;
    cursor: pointer;
    position: absolute;
    top: 10px;
    right: 15px;
    transition: color 0.3s ease-in-out;
}

.close:hover {
    color: #000;
}

/* Bảng chi tiết đơn hàng trong popup */
.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.table-header {
    background-color: #f2f2f2;
    font-weight: bold;
    display: flex;
    justify-content: space-between;
    padding: 12px;
    border-bottom: 2px solid #ddd;
}

.table-row {
    display: flex;
    justify-content: space-between;
    padding: 12px;
    border-bottom: 1px solid #ddd;
}

.table-row:nth-child(even) {
    background-color: #f9f9f9;
}

.table-row:hover {
    background-color: #eef;
}

.table-cell {
    flex: 1;
    padding: 10px;
    text-align: left;
}
table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            font-weight: bold;
        }

        td {
            color: #333;
            font-size: 14px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

/* Hiển thị sản phẩm với ảnh */
.table-cell img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    margin-left: 10px;
    border-radius: 5px;
}

/* Nút đóng trong popup */
.popup button {
    background-color: #3498db;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 6px;
    cursor: pointer;
    margin-top: 15px;
    display: block;
    width: 100%;
    font-size: 16px;
    font-weight: bold;
    transition: background-color 0.3s ease-in-out;
}

.popup button:hover {
    background-color: #2980b9;
}
#products{
  flex: 3; /* Tăng độ rộng cho cột sản phẩm */
  gap: 5%;
}


/* Hiệu ứng mở popup */
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes slideDown {
    from {
        transform: translateY(-20px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

  </style>
  <body>
    <div class="detail">
      <main class="main-content">
        <!-- Sections -->

          <h2 style="text-align: center;">Danh sách đơn đặt hàng</h2>
          <table>
            <thead>
              <tr>
                <th>Mã đơn đặt hàng </th>
                <th>Người nhận</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ nhận</th>
                <th>Phương thức</th>
                <th>Tổng tiền</th>
                <th>Ngày mua</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody>
                <?php
                $i=1;
                while($row=mysqli_fetch_array($listddh)){
                mysqli_data_seek($ctddh, 0);

                    ?>
              <tr>
                <td><?php echo $row['mahoadon']  ?></td>
                <td><?php echo $row['hoten_nhan']  ?></td>
                <td><?php echo $row['sdt_nhan']  ?></td>
                <td><?php echo $row['diachi_nhan']  ?></td>
                <td><?php if($row['pttt']=="tien_mat"){
                    echo "Tiền mặt";
                } else{
                    echo "Chuyển khoản";
                }   ?></td>

                <td><?php echo number_format($row['tongtiensaugiam'], 0, ',', '.'); ?> VNĐ</td>
                <td><?php echo $row['ngaytao']  ?></td>
                <td><?php echo $row['trangthai']  ?></td>
                <td>
                    <?php if($row['trangthai']=="Đang xử lý"){?>
                   <a href="/inis/admin/xulyxacnhan/<?php echo $row['mahoadon'] ?>" onclick="return confirmCustom('Bạn chắc chắn muốn xác nhận đơn hàng mã : <?php echo $row['mahoadon'] ?>')  "><button class="btn edit-btn">Xác nhận</button></a>
                   <?php }?>
                   <button onclick="openPopup('<?php echo $row['mahoadon']; ?>')"style="background-color: #16A085; color: white; border: none; padding: 4px 4px; border-radius: 6px; cursor: pointer;"> Chi tiết</button>
                </td>

              </tr>

    <!-- Popup hiển thị chi tiết đơn hàng -->
    <div id="orderDetailsPopup<?php echo $row['mahoadon']; ?>" class="popup">
                <div class="popup-content">
                    <span class="close" onclick="closePopup('<?php echo $row['mahoadon']; ?>')">&times;</span>
                    <h2>Chi tiết đơn hàng mã: <?php echo $row['mahoadon']; ?></h2>
                    <div class="table">
                        <div class="table-header">
                            <div class="table-cell" id="products">Sản phẩm</div>
                            <div class="table-cell">Đơn giá</div>
                            <div class="table-cell">Số lượng</div>
                        </div>

                        <?php while($rowctsp = mysqli_fetch_array($ctddh)) { ?>
                            <?php if($rowctsp['mahoadon'] == $row['mahoadon']) { ?>
                                <div class="table-row">
                                    <div class="table-cell" id="products" style="display:flex">
                                    <img style="width: 80px; height: 80px;" src="<?php echo WEBROOT . 'public/img/' . $rowctsp['hinhanh']; ?>" alt="">
                                        <?php echo $rowctsp['tensanpham'] ?>
                                    </div>
                                    <div class="table-cell"><?php echo number_format($rowctsp['dongia'], 0, '', ','); ?>₫</div>
                                    <div class="table-cell"><?php echo $rowctsp['soluong'] ?></div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <button onclick="closePopup('<?php echo $row['mahoadon']; ?>')"
                        style="background-color: #3498DB; color: white; border: none; padding: 10px 15px; border-radius: 6px; cursor: pointer;">
                        Đóng
                    </button>
                </div>
              </div>
              <?php $i++; }?>
            </tbody>
          </table>

        <?php 
if (isset($_SESSION['thanhcong'])) {
    echo "<script>alert('" . addslashes($_SESSION['thanhcong']) . "');</script>";
    unset($_SESSION['thanhcong']);
}
?>
        
      </main>
    </div>
    </div>
    <script>
  function confirmCustom(message) {
    const isConfirmed = window.confirm(message);
    return isConfirmed;
}

// Hàm hiển thị popup
// Hàm hiển thị popup với ID đơn hàng động
function openPopup(mahd) {
      const popup = document.getElementById('orderDetailsPopup' + mahd);
      popup.style.display = 'flex'; // Hiển thị popup
  }

  // Hàm đóng popup với ID đơn hàng động
  function closePopup(mahd) {
      const popup = document.getElementById('orderDetailsPopup' + mahd);
      popup.style.display = 'none'; // Ẩn popup
  }
</script>
  </body>
</html>

