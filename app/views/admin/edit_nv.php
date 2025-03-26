<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Nhân Viên</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Style tương tự add_nv.php */
        body { font-family: 'Roboto', sans-serif; background-color: #f4f7fa; margin: 0; padding: 0; color: #333; }
        .main-content { max-width: 650px; margin: 20px auto; padding: 20px; background: white; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        h2 { color: #333; text-align: center; }
        .form-item { margin-bottom: 15px; }
        .form-item input, .form-item select { width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 8px; font-size: 14px; }
        .form-item input:focus, .form-item select:focus { border-color: #4CAF50; outline: none; }
        .form-buttons { display: flex; gap: 10px; justify-content: center; margin-top: 20px; }
        .btn { padding: 12px 20px; border: none; border-radius: 8px; font-size: 15px; cursor: pointer; }
        .submit-btn { background-color: #4CAF50; color: white; }
        .submit-btn:hover { background-color: #388E3C; }
        .reset-btn { background-color: #f44336; color: white; }
        .reset-btn:hover { background-color: #d32f2f; }
    </style>
</head>
<body>
<div class="detail">
<div class="main-content">
    <h2>Sửa Nhân Viên</h2>
    <form action="/inis/admin/xulysuanv" method="POST" onsubmit="return validateForm()">
        <input type="hidden" name="manhanvien" value="<?= htmlspecialchars($nhanvien['Manhanvien']) ?>">
        <div class="form-item">
            <input type="text" name="tennhanvien" id="tennhanvien" value="<?= htmlspecialchars($nhanvien['Tennhanvien']) ?>" required>
        </div>
        <div class="form-item">
            <input type="text" name="sdt" id="sdt" value="<?= htmlspecialchars($nhanvien['sdt']) ?>" onkeypress="return isNumberKey(event)" required>
        </div>
        <div class="form-item">
            <input type="password" name="password" id="password" placeholder="Mật khẩu mới (để trống nếu không đổi)">
        </div>
        <div class="form-item">
            <input type="password" name="mat_khau_2" id="mat_khau_2" placeholder="Nhập lại mật khẩu">
        </div>
        <div class="form-item">
            <select name="id_role" id="id_role" required>
                <?php while ($row = $role->fetch_assoc()): ?>
                    <option value="<?= $row['id_role'] ?>" <?= $row['id_role'] == $nhanvien['id_role'] ? 'selected' : '' ?>>
                        <?= $row['ten'] ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-buttons">
            <button type="submit" class="btn submit-btn">Lưu Thay Đổi</button>
            <a href="/inis/admin/nhanvien" class="btn reset-btn">Hủy</a>
        </div>
    </form>

    <?php
    if (isset($_SESSION['thanhcong'])) {
        echo "<script>alert('" . addslashes($_SESSION['thanhcong']) . "');</script>";
        unset($_SESSION['thanhcong']);
    }
    if (isset($_SESSION['error'])) {
        echo "<script>alert('" . addslashes($_SESSION['error']) . "');</script>";
        unset($_SESSION['error']);
    }
    ?>
</div>
</div>
<script>
    function validateForm() {
        var password = document.getElementById("password").value;
        var mat_khau_2 = document.getElementById("mat_khau_2").value;
        var sdt = document.getElementById("sdt").value;

        if (password && mat_khau_2 !== password) {
            alert("Mật khẩu không khớp.");
            return false;
        }
        if (!/^0[0-9]{9,10}$/.test(sdt)) {
            alert("Số điện thoại không hợp lệ.");
            return false;
        }
        return true;
    }

    function isNumberKey(evt) {
        var charCode = evt.which ? evt.which : evt.keyCode;
        return !(charCode > 31 && (charCode < 48 || charCode > 57));
    }
</script>
</body>
</html>