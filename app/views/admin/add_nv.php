<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Nhân Viên</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        
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
    <h2>Thêm Nhân Viên</h2>
    <form action="/inis/admin/xulythemnv" method="POST">
        <div class="form-item">
            <input type="text" name="tennhanvien" id="tennhanvien" placeholder="Nhập họ tên" required>
        </div>
        <div class="form-item">
            <input type="text" name="sdt" id="sdt" placeholder="Số điện thoại"  required>
        </div>
        <div class="form-item">
            <input type="password" name="password" id="password" placeholder="Mật khẩu" required>
        </div>
        <div class="form-item">
            <input type="password" name="mat_khau_2" id="mat_khau_2" placeholder="Nhập lại mật khẩu" required>
        </div>
        <div class="form-item">
            <select name="id_role" id="id_role" required>
                <option value="" disabled selected>Chọn quyền</option>
                <?php while ($row = $role->fetch_assoc()): ?>
                    <option value="<?= $row['id_role'] ?>"><?= $row['ten'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-buttons">
            <button type="submit" class="btn submit-btn">Thêm Nhân Viên</button>
            <a href="/inis/admin/nhanvien" class="btn reset-btn">Hủy</a>
        </div>
    </form>

    <?php if (isset($_SESSION['thanhcong'])): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Thành công!",
                text: "<?= addslashes($_SESSION['thanhcong']) ?>",
                icon: "success",
                confirmButtonText: "OK"
            });
        });
    </script>
    <?php unset($_SESSION['thanhcong']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['error'])): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Lỗi!",
                text: "<?= addslashes($_SESSION['error']) ?>",
                icon: "error",
                confirmButtonText: "Thử lại"
            });
        });
    </script>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>


</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.querySelector("form").addEventListener("submit", function(event) {
    event.preventDefault(); // Ngăn trang reload
    let formData = new FormData(this);

    fetch("/inis/admin/xulythemnv", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                title: "Thành công!",
                text: data.message,
                icon: "success",
                confirmButtonText: "OK"
            }).then(() => {
                window.location.href = data.redirect; // Chuyển trang sau khi người dùng bấm OK
            });
        } else {
            Swal.fire({
                title: "Lỗi!",
                text: data.message,
                icon: "error",
                confirmButtonText: "Thử lại"
            });
        }
    })
    .catch(error => console.error("Lỗi:", error));
});

</script>

</body>
</html>