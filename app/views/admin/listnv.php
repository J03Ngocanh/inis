
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
button.btn_ne  {
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

   
    <button class="btn-add" onclick="openPopup()">Thêm Tài khoản</button>

    <div id="overlay" onclick="closePopup()"></div>
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
                <td><?= $row['Manhanvien']; ?></td>
                <td><?= $row['Tennhanvien']; ?></td>
                <td><?= $row['sdt']; ?></td>
                <td><?= $row['ten']; ?></td>
                <td>
    <label class="switch">
    <input type="checkbox" 
       onchange="toggleStatus(this, <?= $row['Manhanvien']; ?>)"  
       <?= $row['trangthai'] == 1 ? 'checked' : ''; ?> >
        <span class="slider round"></span>
    </label></td>
    <td>         
    <a href="javascript:void(0);" class="btn btn-edit" 
       onclick="openEditPopup(<?= $row['Manhanvien']; ?>,'<?= $row['Tennhanvien']; ?>','<?= $row['sdt']; ?>', '<?= $row['ten']; ?>')">
        <i class="fas fa-edit"></i>
    </a>
</td>

            </tr>
        <?php } ?>
        </tbody>
    </table>
    <div id="orderDetailsPopup">
    <span class="close" onclick="closePopup()">&times;</span>
    <h2>Thêm Tài Khoản</h2>
    <form action="<?php echo WEBROOT . 'taikhoan/xulydangkynv'?>" method="POST" onsubmit="return validateForm()">
        <div class="form-item">
        
            <input type="text" name="tennhanvien" id="tennhanvien" placeholder="Nhập họ tên" onblur="checkTennhanvien()" required>
            <div id="TennhanvienFeedback" style="color: red; font-size: 12px;"></div>
        </div>
        <div class="form-item">
        
            <input type="text" name="sdt" id="sdt" placeholder="Số điện thoại" onkeypress="return isNumberKey(event)" required>
        </div>
        <div class="form-item">
       
            <input type="password" name="password" id="password" placeholder="Mật khẩu" required>
        </div>
        <div class="form-item">
        
            <input type="password" name="mat_khau_2" id="mat_khau_2" placeholder="Nhập lại mật khẩu" required>
        </div>
      
        <div class="form-item">
        <select name="id_role" id="id_role">
        <?php while ($row = $role->fetch_assoc()): ?>
            <option value="<?= $row['id_role'] ?>"><?= $row['ten'] ?></option>
        <?php endwhile; ?>
    </select>
       </div>
       <div class="nut" style="display:flex;">
            <button type="submit" class="btn_ne">Lưu Tài Khoản</button>
            <button type="button" class="btn-cancel" onclick="closePopup()">Hủy</button>
          
       </div>
    </form>
</div>
</div>

    <div id="editPopup" >
    <span class="close" onclick="closeEditPopup()">&times;</span>
    <h2>Sửa Tài Khoản</h2>
    <form id="editForm" action="<?php echo WEBROOT . 'taikhoan/xulysua';?>" method="POST" onsubmit="return validateEditForm()">
        <input type="hidden" name="Manhanvien" id="editId">

        <div class="form-item">
            <input type="text" name="tennhanvien" id="editTennhanvien" placeholder="Tên đăng nhập" required>
        </div>
        <div class="form-item">
            <input type="text" name="sdt" id="editSdt" placeholder="Số điện thoại" readonly>
        </div>
        <div class="form-item">
            <input type="password" name="password" id="editPassword" placeholder="Mật khẩu" required>
        </div>
        <div class="form-item">
            <input type="password" name="mat_khau_2" id="editMatKhau2" placeholder="Nhập lại mật khẩu" required>
        </div>
        
        <div class="form-item">
            <select id="editRole" name="id_role" required>
                <option value="" disabled selected >Quyền truy cập</option>

                <?php while ($row2= mysqli_fetch_array($role2)) { ?>
                    <option value="<?= $row2['id_role']; ?>"><?= $row2['ten']  ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="nut" style="display:flex;">
            <button type="submit" class="btn_ne">Lưu Thay Đổi</button>
            <button type="button" class="btn-cancel" onclick="closeEditPopup()">Hủy</button>
        </div>
    </form>
</div>

</div>
<script>
function openPopup() {
    let overlay = document.getElementById('overlay');
    let popup = document.getElementById('orderDetailsPopup');

    if (overlay && popup) {
        overlay.style.display = 'block';
        popup.style.display = 'block';
        setTimeout(() => {
            overlay.classList.add('active');
            popup.classList.add('active');
        }, 10); // Tạo hiệu ứng trễ nhẹ
    } else {
        console.error("Không tìm thấy phần tử overlay hoặc orderDetailsPopup!");
    }
}

function closePopup() {
    let overlay = document.getElementById('overlay');
    let popup = document.getElementById('orderDetailsPopup');

    if (overlay && popup) {
        overlay.classList.remove('active');
        popup.classList.remove('active');
        setTimeout(() => {
            overlay.style.display = 'none';
            popup.style.display = 'none';
        }, 300); // Chờ hiệu ứng mờ dần trước khi ẩn
    }
}


function openEditPopup(id, Tennhanvien, sdt, role) {
    document.getElementById('overlay').classList.add('active'); // Hiển thị overlay

    // Điền thông tin vào form sửa tài khoản
    document.getElementById('editId').value = id;
    document.getElementById('editTennhanvien').value = Tennhanvien; // Không sửa Tennhanvien
    document.getElementById('editSdt').value = sdt;
   // document.getElementById('editRole').value = role;
    document.getElementById('overlay').classList.add('active'); // Hiển thị overlay

    // Hiển thị popup sửa tài khoản
    document.getElementById('editPopup').classList.add('active'); // Thêm lớp active
}


// Đóng popup sửa tài khoản
function closeEditPopup() {
    document.getElementById('editPopup').classList.remove('active');
    document.getElementById('overlay').classList.remove('active');
}


    // Kiểm tra form thêm tài khoản
    function validateForm() {

        var password = document.getElementById("password").value;
        var mat_khau_2 = document.getElementById("mat_khau_2").value;
        var sdt = document.getElementById("sdt").value;

     
        if (mat_khau_2 !== password) {
            alert("Mật khẩu không khớp.");
            return false;
        }
        if (!/^0[0-9]{9,10}$/.test(sdt)) {
            alert("Số điện thoại không hợp lệ.");
            return false;
        }
        return true;
    }

    // Kiểm tra form sửa tài khoản
    function validateEditForm() {

        var password = document.getElementById("editPassword").value;
        var mat_khau_2 = document.getElementById("editMatKhau2").value;
        var sdt = document.getElementById("editSdt").value;

       
        if (mat_khau_2 !== password) {
            alert("Mật khẩu không khớp.");
            return false;
        }
        if (!/^0[0-9]{9,10}$/.test(sdt)) {
            alert("Số điện thoại không hợp lệ.");
            return false;
        }
        return true;
    }

    // Chỉ cho phép nhập số khi nhập số điện thoại
    function isNumberKey(evt) {
        var charCode = evt.which ? evt.which : evt.keyCode;
        return !(charCode > 31 && (charCode < 48 || charCode > 57));
    }

    // Kiểm tra tên đăng nhập khi người dùng nhập vào
    function checksdt() {
        const sdt = document.getElementById('sdt').value.trim();
        const feedback = document.getElementById('sdtFeedback');

        // Kiểm tra nếu tên đăng nhập trống
        if (sdt === "") {
            feedback.textContent = "Tên đăng nhập không được để trống.";
            feedback.style.color = 'red';
            return;
        }

        // Sử dụng fetch API để gửi yêu cầu kiểm tra tên đăng nhập
        fetch('/acc/taikhoan/checksdt', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'sdt=' + encodeURIComponent(username),  // Cập nhật body đúng
        })
        .then(response => response.text())  // Lấy phản hồi dạng text
        .then(data => {
            // Kiểm tra kết quả trả về từ server
            if (data.trim() === 'exists') {
                feedback.textContent = "Tên đăng nhập đã tồn tại.";
                feedback.style.color = 'red';
            } else if (data.trim() === 'available') {
                feedback.textContent = "Tên đăng nhập có sẵn.";
                feedback.style.color = 'green';
            } else {
                feedback.textContent = "Lỗi kiểm tra tên đăng nhập.";
                feedback.style.color = 'red';
            }
        })
        .catch(error => {
            // Xử lý lỗi khi gọi fetch
            console.error('Error during sdt check:', error);
            feedback.textContent = "Có lỗi xảy ra khi kiểm tra tên đăng nhập. Vui lòng thử lại sau.";
            feedback.style.color = 'red';
        });
    }

    function toggleStatus(checkbox, Manhanvien) {
        var trangthai = checkbox.checked ? 1 : 0; // 1 nếu checkbox được chọn, 0 nếu không
        console.log('Manhanvien:', Manhanvien);
        console.log('status:', status);

        // Gửi yêu cầu Ajax đến controller để cập nhật trạng thái
        fetch('/khoinnis/taikhoan/updatetrangthai', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'Manhanvien=' + Manhanvien + '&trangthai=' + trangthai
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Trạng thái tài khoản đã được cập nhật.');
            } else {
                alert('Có lỗi xảy ra.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
   

</script>
</body>
</html>