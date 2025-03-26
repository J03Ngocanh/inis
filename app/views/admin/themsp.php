<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thêm Sản Phẩm</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400&display=swap" rel="stylesheet">
    <style>
        h2 {
            text-align: center;
            color: #2ecc71;
            margin-bottom: 20px;
        }

        .main-content {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
        }

        .form-column {
            width: 48%;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .form-add-product input,
        .form-add-product select,
        .form-add-product textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            width: 100%;
            box-sizing: border-box;
        }

        .form-add-product textarea {
            resize: vertical;
            height: 100px;
        }

        .form-add-product input[type="file"] {
            border: none;
        }

        .form-add-product label {
            font-weight: bold;
            margin-bottom: 5px;
            text-align: left;
        }

        .form-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .form-buttons .btn {
            min-width: 120px;
            height: 50px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .btn { padding: 12px 20px; border: none; border-radius: 8px; font-size: 15px; cursor: pointer; }
        .submit-btn { background-color: #4CAF50; color: white; }
        .submit-btn:hover { background-color: #388E3C; }
        .reset-btn { background-color: #f44336; color: white; }
        .reset-btn:hover { background-color: #d32f2f; }

        #previewImage {
            width: 100px;
            height: auto;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            display: none;
        }

        @media (max-width: 768px) {
            .form-column {
                width: 100%;
            }
            .form-buttons {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
<div class="detail">
<div class="main-content">
    <div class="main-content">
        <h2>Thêm sản phẩm mới</h2>
        <form method="POST" enctype="multipart/form-data" action="/inis/admin/xulythemsanpham" class="form-add-product">
            <div class="form-container">
                <!-- Cột 1 -->
                <div class="form-column">
                    <label for="add-product-name">Tên sản phẩm:</label>
                    <input type="text" id="add-product-name" name="tensanpham" required>

                    <label for="add-product-quantity">Số lượng:</label>
                    <input type="number" id="add-product-quantity" name="soluong" min="1" required>

                    <label for="add-product-category">Danh mục:</label>
                    <select id="add-product-category" name="danhmuc" required>
                        <?php while ($row = $danhmucsp->fetch_assoc()): ?>
                            <option value="<?php echo $row['id_danhmuc']; ?>">
                                <?php echo htmlspecialchars($row['tendanhmuc']); ?>
                            </option>
                        <?php endwhile; ?>
                    </select>

                    <label for="add-product-image">Hình ảnh 1:</label>
                    <input type="file" id="add-product-image" name="hinhanh" accept="image/*" required>
                    <img id="previewImage" src="#" alt="Xem trước ảnh 1">
                </div>

                <!-- Cột 2 -->
                <div class="form-column">
                    <label for="add-product-description">Mô tả sản phẩm:</label>
                    <textarea id="add-product-description" name="mota"></textarea>

                    <label for="add-product-price">Giá sản phẩm:</label>
                    <input type="number" id="add-product-price" name="gia" min="0" required>

                    <label for="add-product-image1">Hình ảnh 2:</label>
                    <input type="file" id="add-product-image1" name="hinhanh1" accept="image/*">
                    <img id="previewImage1" src="#" alt="Xem trước ảnh 2">

                    <label for="add-product-image2">Hình ảnh 3:</label>
                    <input type="file" id="add-product-image2" name="hinhanh2" accept="image/*">
                    <img id="previewImage2" src="#" alt="Xem trước ảnh 3">

                    <label for="add-product-image3">Hình ảnh 4:</label>
                    <input type="file" id="add-product-image3" name="hinhanh3" accept="image/*">
                    <img id="previewImage3" src="#" alt="Xem trước ảnh 4">

                    <label for="add-product-image4">Hình ảnh 5:</label>
                    <input type="file" id="add-product-image4" name="hinhanh4" accept="image/*">
                    <img id="previewImage4" src="#" alt="Xem trước ảnh 5">
                </div>
            </div>

            <div class="form-buttons">
                <button type="submit" class="btn submit-btn">Thêm sản phẩm</button>
                <a href="/inis/admin/sanpham" class="btn reset-btn">Hủy</a>
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
        // Script preview ảnh cho 5 field
        const imageInputs = [
            { input: 'add-product-image', preview: 'previewImage' },
            { input: 'add-product-image1', preview: 'previewImage1' },
            { input: 'add-product-image2', preview: 'previewImage2' },
            { input: 'add-product-image3', preview: 'previewImage3' },
            { input: 'add-product-image4', preview: 'previewImage4' }
        ];

        imageInputs.forEach(({ input, preview }) => {
            document.getElementById(input).addEventListener('change', function(e) {
                const file = e.target.files[0];
                const previewImg = document.getElementById(preview);
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImg.src = e.target.result;
                        previewImg.style.display = 'block';
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
</body>
</html>