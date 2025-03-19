<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đặt hàng thành công</title>
  </head>
  <body>
    <!DOCTYPE html>
    <html lang="vi">
      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Chi tiết đơn hàng</title>
        <style>
          body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
          }

          .container {
            max-width: 800px;
            margin: 30px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
          }

          h2 {
            text-align: center;
            color: #444;
          }

          table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
          }

          th,
          td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
          }

          th {
            background-color: #f4f4f4;
            font-weight: bold;
          }

          .total {
            font-weight: bold;
            color: #e60012;
          }

          .order-info {
            margin-top: 20px;
          }

          .order-info div {
            margin-bottom: 10px;
          }

          .summary-box {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #eaffea;
          }

          .summary-box h3 {
            margin-top: 0;
            color: #2a7e2a;
          }

          .summary-box ul {
            list-style-type: none;
            padding: 0;
          }

          .summary-box ul li {
            margin-bottom: 10px;
            font-size: 14px;
          }

          .summary-box ul li::before {
            content: "✔";
            margin-right: 10px;
            color: #2a7e2a;
          }

          .note {
            margin-top: 20px;
          }

          .note textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
          }
        </style>
      </head>
      <body>
        <br>
        <br>
        <br>
        <div class="container">
          <h2>Chi tiết đơn hàng</h2>

          <table>
            <thead>
              <tr>
                <th>SẢN PHẨM</th>
                <th>SỐ LƯỢNG</th>
                <th>ĐƠN GIÁ</th>
              </tr>
            </thead>
            <tbody>
             <?php while($data=mysqli_fetch_array($ttindonhang)){?>
                <tr>
                <td><?php echo $data['tensanpham'];   ?></td>
                <td><?php echo $data['soluong'];   ?></td>
                <td><?php echo number_format($data['giagoc'], 0, ',', '.'); ?>đ</td>
              </tr> 
              <?php }?>
            </tbody>
          </table>

          <div class="order-info">
          <?php while($row=mysqli_fetch_array($ttinnguoimua)){?>
            <div>Phương thức thanh toán: <strong><?php if($row['phuong_thuc']=="tien_mat"){echo "Tiền mặt " ;} else{ echo "Chuyển khoản" ;} ?></strong></div>
            <div>Tổng tiền thu: <strong class="total"><?php echo number_format($row['tongTien'], 0, ',', '.'); ?>đ</strong></div>
          </div>

          <div class="order-info">

            <h3>Thông tin & Địa chỉ nhận hàng</h3>
          
            <div>Họ và tên: <strong><?php echo $row['hoten_nhan'] ?></strong></div>
            <div>Địa chỉ nhận hàng: <strong><?php echo $row['diachi_nhan'] ?></strong></div>
            <div>Số điện thoại: <strong><?php echo $row['sdt_nhan'] ?></strong></div>
            <?php } ?>
          </div>

          <div class="summary-box">
            <h3>
              Cảm ơn khách hàng đã tin tưởng và ủng hộ.
            </h3>
           
          </div>

        
        </div>
      </body>
    </html>
  </body>
</html>
