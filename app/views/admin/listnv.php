<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Quản Lý Tài Khoản</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h1, h2 {
            color: #333;
            text-align: center;
        }

        /* Table */
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

        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        /* Hiển thị overlay khi active */
        #overlay.active {
            opacity: 1;
        }

        /* Popup styles */
        #orderDetailsPopup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.8);
            width: 400px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            display: none;
            opacity: 0;
            transition: transform 0.3s ease-out, opacity 0.3s ease-out;
        }


        #orderDetailsPopup.active {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
        }


        /* Close button */
        .close {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 22px;
            color: #888;
            cursor: pointer;
        }

        .close:hover {
            color: #4CAF50;
        }

        /* Input and select styling */
        #orderDetailsPopup .form-item input,
        #orderDetailsPopup .form-item select {
            width: 100%;
            padding: 12px 14px; /* Tăng khoảng cách trong */
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-top: 10px;
            font-size: 14px;
            background-color: #f9f9f9;
            transition: border-color 0.3s ease, background-color 0.3s ease;
        }

        #orderDetailsPopup .form-item input:focus,
        #orderDetailsPopup .form-item select:focus {
            border-color: #4CAF50;
            background-color: #fff;
            outline: none;
            box-shadow: 0 0 6px rgba(76, 175, 80, 0.5); /* Ánh sáng xung quanh ô */
        }

        #editPopup .form-item input,
        #editPopup .form-item select {
            width: 100%;
            padding: 12px 14px; /* Tăng khoảng cách trong */
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-top: 10px;
            font-size: 14px;
            background-color: #f9f9f9;
            transition: border-color 0.3s ease, background-color 0.3s ease;
        }

        #editPopup .form-item input:focus,
        #editPopup .form-item select:focus {
            border-color: #4CAF50;
            background-color: #fff;
            outline: none;
            box-shadow: 0 0 6px rgba(76, 175, 80, 0.5); /* Ánh sáng xung quanh ô */
        }

        /* Button Styling */
        button.btn_ne {
            padding: 12px 20px;
            background-color: #4CAF50; /* Green background for the submit button */
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-top: 20px;
            width: 100%;
            text-align: center;
        }

        button.btn_ne button:hover {
            background-color: #388E3C; /* Darker green on hover */
            transform: scale(1.05);
        }

        /* Cancel button styling */
        #orderDetailsPopup .btn-cancel {
            background-color: #f44336; /* Red background for the cancel button */
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            border: none;
            font-size: 15px;
            cursor: pointer;
            margin-top: 20px;
            width: 100%;
            text-align: center;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        #orderDetailsPopup .btn-cancel:hover {
            background-color: #d32f2f; /* Darker red on hover */
            transform: scale(1.05);
        }

        #editPopup .btn-cancel {
            background-color: #f44336; /* Red background for the cancel button */
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            border: none;
            font-size: 15px;
            cursor: pointer;
            margin-top: 20px;
            width: 100%;
            text-align: center;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        #editPopup .btn-cancel:hover {
            background-color: #d32f2f; /* Darker red on hover */
            transform: scale(1.05);
        }


        /* Button */
        .btn-add {
            background-color: #4CAF50; /* Màu xanh */
            color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 8px 10px 10px 10px; /* Thêm khoảng cách trong nút */
            position: fixed; /* Đặt nút ở vị trí cố định */
            top: 70px; /* Đặt cách từ trên xuống */
            right: 20px; /* Đặt cách từ phải vào */
            border-radius: 10px; /* Bo tròn góc nút */
            border: solid white;
            z-index: 1000; /* Đảm bảo nút hiển thị trên các phần tử khác */
            cursor: pointer;
        }

        button:hover {
            background-color: #388E3C;
        }

        .btn-cancel {
            background-color: #f44336;
        }

        .btn-cancel:hover {
            background-color: #d32f2f;
        }

        /* Form sửa tài khoản */
        #editPopup {
            display: none; /* Loại bỏ display: none; */
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            padding: 30px 20px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            max-width: 650px;
            width: 90%;
        }

        #editPopup.active {
            display: block; /* Chỉ khi có class 'active' thì popup mới hiển thị */
        }

        .btn-edit i {

            color: #4CAF50; /* Màu cho nút sửa */
            margin-right: 5px;
        }

        /* Toggle Switch */
        .switch {
            position: relative;
            display: inline-block;
            width: 40px;
            height: 20px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: 0.4s;
            border-radius: 20px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 2px;
            bottom: 2px;
            background-color: white;
            transition: 0.4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #4CAF50;
        }

        input:checked + .slider:before {
            transform: translateX(20px);
        }

        #overlay {
            z-index: 9999 !important;
        }

        #orderDetailsPopup {
            z-index: 10000 !important;
        }
    </style>
</head>
<body>

<div class="detail">
    <h2>Danh Sách Tài Khoản</h2>
    <a href="/inis/admin/addnv" class="btn-add">Thêm Tài khoản</a>
    <div class="filter-container">
        <select id="filter-role">
            <option value="">Tất cả quyền</option>
            <?php while ($row = $role->fetch_assoc()): ?>
                <option value="<?= $row['id_role'] ?>"><?= $row['ten'] ?></option>
            <?php endwhile; ?>
        </select>

        <select id="filter-status">
            <option value="">Tất cả trạng thái</option>
            <option value="1">Hoạt động</option>
            <option value="0">Bị khóa</option>
        </select>

        <button onclick="filterNhanVien()">Lọc</button>
    </div>
    <table>
        <thead>
        <tr>
            <th>Mã nhân viên</th>
            <th>Tên nhân viên</th>
            <th>Số điện thoại</th>
            <th>Phân quyền</th>
            <th>Trạng Thái</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_array($listnv)) { ?>
            <tr>
                <td><?= htmlspecialchars($row['manhanvien']); ?></td>
                <td><?= htmlspecialchars($row['tennhanvien']); ?></td>
                <td><?= htmlspecialchars($row['sdt']); ?></td>
                <td><?= htmlspecialchars($row['ten']); ?></td>
                <td>
                    <label class="switch">
                        <input type="checkbox"
                               onchange="toggleStatus(this, '<?= $row['manhanvien']; ?>')" <?= $row['trangthai'] == 1 ? 'checked' : ''; ?>>
                        <span class="slider round"></span>
                    </label>
                </td>
                <td>
                    <a href="/inis/admin/editnv/<?= $row['manhanvien']; ?>" class="btn btn-edit">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<!-- Thêm vào phần <head> hoặc trước </body> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function toggleStatus(checkbox, manhanvien) {
        var trangthai = checkbox.checked ? 1 : 0;
        var message = trangthai
            ? "Bạn có chắc chắn muốn <b>MỞ KHÓA</b> tài khoản này không?"
            : "Bạn có chắc chắn muốn <b>KHÓA</b> tài khoản này không?";

        Swal.fire({
            title: "Xác nhận thay đổi",
            html: message,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Có",
            cancelButtonText: "Hủy",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                fetch('/inis/admin/updatetrangthai', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    body: 'manhanvien=' + manhanvien + '&trangthai=' + trangthai
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                title: "Thành công!",
                                text: "Trạng thái tài khoản đã được cập nhật.",
                                icon: "success",
                                timer: 1500,
                                showConfirmButton: false
                            });
                        } else {
                            Swal.fire("Lỗi!", "Có lỗi xảy ra, vui lòng thử lại.", "error");
                            checkbox.checked = !checkbox.checked; // Hoàn tác nếu lỗi
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire("Lỗi!", "Không thể kết nối đến server.", "error");
                        checkbox.checked = !checkbox.checked; // Hoàn tác nếu lỗi
                    });
            } else {
                checkbox.checked = !checkbox.checked; // Hoàn tác nếu nhấn Hủy
            }
        });
    }
</script>


</body>
</html>