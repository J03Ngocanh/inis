<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trang Quản Trị</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400&display=swap" rel="stylesheet">
  </head>
  <style>
    /* styles.css */
    body {
      font-family: 'Nunito', sans-serif;
      margin: 0;
      display: flex;
      height: 100vh;
      background-color: #f4f4f9;
    }

    .admin-container {
      display: flex;
      width: 100%;
    }

    .sidebar {
      width: 250px;
 
      color: #ecf0f1;
      height: 100%;
      display: flex;
      flex-direction: column;
      padding: 20px;
      box-sizing: border-box;
      position: relative;
    }

    .sidebar h2 {
      margin-bottom: 20px;
      font-size: 24px;
      text-align: center;
      color: #1abc9c;
    }

    .sidebar nav ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .sidebar nav ul li {
      margin: 15px 0;
    }

    .sidebar nav ul li a {
      color: #ecf0f1;
      text-decoration: none;
      font-size: 18px;
      padding: 10px 15px;
      display: block;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .sidebar nav ul li a.active {
      background-color: #1abc9c;
      color: #fff;
    }

    .sidebar nav ul li a:hover {
      background-color: #34495e;
    }

    .main-content {
      flex: 1;
      padding: 20px;
      box-sizing: border-box;
      overflow-y: auto;
    }

    .main-content header {
      background-color: #1abc9c;
      padding: 20px;
      color: #fff;
      text-align: center;
      border-radius: 5px;
      margin-bottom: 20px;
    }

    .content-section {
      display: none;
    }

    .content-section:not(.hidden) {
      display: block;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }


    table tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    table tr:hover {
      background-color: #ddd;
    }





    /* Nút chung */
a button {
    padding: 4px 4px;
    margin: 5px;
    border: none;
    border-radius: 5px;
    font-size: 12px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    text-decoration: none; /* Loại bỏ gạch chân mặc định của <a> */
    display: inline-block; /* Đảm bảo hiển thị đều */
}

/* Nút "Sửa" */
a .edit-btn {
    background-color: #3498db; /* Màu xanh */
    color: white;
}

a .edit-btn:hover {
    background-color: #2980b9;
    transform: scale(1.05);
}

/* Nút "Xóa" */
a .delete-btn {
    background-color: green ; /* Màu đỏ */
    color: white;
}

a .delete-btn:hover {
    background-color: #c0392b;
    transform: scale(1.05);
}

a .add-btn {
    background-color: #2ecc71; /* Màu xanh lá */
    color: white;
    font-weight: bold;
}

a .add-btn:hover {
    background-color: #27ae60; /* Màu xanh lá đậm khi hover */
    transform: scale(1.05); /* Phóng to nhẹ khi hover */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Thêm bóng đổ để nổi bật */
}


.popup {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      display: none; /* Ẩn popup ban đầu */
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }

    /* Nội dung chính của popup */
    .popup-content {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      width: 50%;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
      position: relative;
    }

    /* Nút đóng popup */
    .close {
      font-size: 24px;
      font-weight: bold;
      color: #aaa;
      cursor: pointer;
      position: absolute;
      top: 10px;
      right: 10px;
    }

    .close:hover {
      color: #000;
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

    /* Các style cho bảng trong popup */




    .table-cell {
      flex: 1;
      padding: 10px;
      text-align: left;
      border-right: 1px solid #ddd;
    }

    .table-row:nth-child(even) {
      background-color: #ecf0f1;
    }


  </style>
  <body>
      <!-- Main Content -->
      <main class="main-content">
        <!-- Sections -->
        <section id="products" class="content-section">
          <h2>Danh Sách đơn đặt hàng</h2>
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
                            <div class="table-cell">Sản phẩm</div>
                            <div class="table-cell">Đơn giá</div>
                            <div class="table-cell">Số lượng</div>
                        </div>

                        <?php while($rowctsp = mysqli_fetch_array($ctddh)) { ?>
                            <?php if($rowctsp['mahoadon'] == $row['mahoadon']) { ?>
                                <div class="table-row">
                                    <div class="table-cell" style="display:flex">
                                        <?php echo $rowctsp['tensanpham'] ?>
                                        <img style="width: 80px; height: 80px;" src="<?php echo WEBROOT . 'public/img/' . $rowctsp['hinhanh']; ?>" alt="">
                                    </div>
                                    <div class="table-cell"><?php echo number_format($rowctsp['giagoc'], 0, '', ','); ?>₫</div>
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
    
        </section>
        <?php 
if (isset($_SESSION['thanhcong'])) {
    echo "<script>alert('" . addslashes($_SESSION['thanhcong']) . "');</script>";
    unset($_SESSION['thanhcong']);
}
?>
        
      </main>
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

