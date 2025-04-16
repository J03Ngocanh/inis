<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Sửa Sản Phẩm</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400&display=swap" rel="stylesheet">
    <!-- Place the first <script> tag in your HTML's <head> -->
    <script src="https://cdn.tiny.cloud/1/mkkyk1aqb6tdvt5446ukrbo13oot52fqv2y7nhwwjmflhz4k/tinymce/7/tinymce.min.js"
            referrerpolicy="origin"></script>

    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: [
                'code',
                // Core editing features
                'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
                // Your account includes a free trial of TinyMCE premium features
                // Try the most popular premium features until Apr 14, 2025:
                'checklist', 'mediaembed', 'casechange', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown', 'importword', 'exportword', 'exportpdf'
            ],
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                {value: 'First.Name', title: 'First Name'},
                {value: 'Email', title: 'Email'},
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
        });
    </script>

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

        .form-edit-product input,
        .form-edit-product select,
        .form-edit-product textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            width: 100%;
            box-sizing: border-box;
        }

        .form-edit-product textarea {
            resize: vertical; /* Cho phép kéo dãn theo chiều dọc */
            height: 100px;
        }

        .form-edit-product input[type="file"] {
            border: none;
        }

        .form-edit-product label {
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

        .submit-btn {
            background-color: #2ecc71;
            color: white;
        }

        .submit-btn:hover {
            background-color: #27ae60;
            transform: scale(1.05);
        }

        .reset-btn {
            background-color: white;
            border: 1px solid #ccc;
            color: white;
            text-decoration: none; 
            background-color: #e74c3c;
        }

        .reset-btn:hover {

            transform: scale(1.05);
        }

        #previewImage {
            width: 100px;
            height: auto;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
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
        <h2>Sửa sản phẩm</h2>
        <form method="POST" enctype="multipart/form-data" action="/inis/admin/xulysuasanpham" class="form-edit-product">
            <div class="form-container">
                <!-- Cột 1 -->
                <div class="form-column">
                    <label for="edit-product-id">Mã sản phẩm:</label>
                    <input type="text" id="edit-product-id" name="masanpham"
                           value="<?php echo htmlspecialchars($product['masanpham']); ?>" readonly required>

                    <label for="edit-product-name">Tên sản phẩm:</label>
                    <input type="text" id="edit-product-name" name="tensanpham"
                           value="<?php echo htmlspecialchars($product['tensanpham']); ?>" required>

                    <label for="edit-product-quantity">Số lượng:</label>
                    <input type="number" id="edit-product-quantity" name="soluong"
                           value="<?php echo htmlspecialchars($product['soluong']); ?>" min="1" required>

                    <label for="edit-product-category">Danh mục:</label>
                    <select id="edit-product-category" name="danhmuc" required>
                        <?php while ($row = $danhmucsp->fetch_assoc()): ?>
                            <option value="<?php echo $row['id_danhmuc']; ?>" <?php echo ($row['id_danhmuc'] == $product['id_danhmuc']) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($row['tendanhmuc']); ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                    <label for="edit-product-price">Giá sản phẩm:</label>
                    <input type="number" id="edit-product-price" name="gia"
                           value="<?php echo htmlspecialchars($product['giagoc']); ?>" min="0" required>
                </div>

                <!-- Cột 2 -->
                <div class="form-column">
                    <label for="edit-product-image">Hình ảnh 1:</label>
                    <input type="file" id="edit-product-image" name="hinhanh" accept="image/*">
                    <?php if (!empty($product['hinhanh'])): ?>
                        <img id="previewImage" src="/public/img/<?php echo htmlspecialchars($product['hinhanh']); ?>"
                             alt="Xem trước ảnh 1">
                    <?php else: ?>
                        <img id="previewImage" src="#" alt="Xem trước ảnh 1" style="display: none;">
                    <?php endif; ?>

                    <label for="edit-product-image1">Hình ảnh 2:</label>
                    <input type="file" id="edit-product-image1" name="hinhanh1" accept="image/*">
                    <?php if (!empty($product['hinhanh1'])): ?>
                        <img id="previewImage1" src="/public/img/<?php echo htmlspecialchars($product['hinhanh1']); ?>"
                             alt="Xem trước ảnh 2">
                    <?php else: ?>
                        <img id="previewImage1" src="#" alt="Xem trước ảnh 2" style="display: none;">
                    <?php endif; ?>

                    <label for="edit-product-image2">Hình ảnh 3:</label>
                    <input type="file" id="edit-product-image2" name="hinhanh2" accept="image/*">
                    <?php if (!empty($product['hinhanh2'])): ?>
                        <img id="previewImage2" src="/public/img/<?php echo htmlspecialchars($product['hinhanh2']); ?>"
                             alt="Xem trước ảnh 3">
                    <?php else: ?>
                        <img id="previewImage2" src="#" alt="Xem trước ảnh 3" style="display: none;">
                    <?php endif; ?>

                    <label for="edit-product-image3">Hình ảnh 4:</label>
                    <input type="file" id="edit-product-image3" name="hinhanh3" accept="image/*">
                    <?php if (!empty($product['hinhanh3'])): ?>
                        <img id="previewImage3" src="/public/img/<?php echo htmlspecialchars($product['hinhanh3']); ?>"
                             alt="Xem trước ảnh 4">
                    <?php else: ?>
                        <img id="previewImage3" src="#" alt="Xem trước ảnh 4" style="display: none;">
                    <?php endif; ?>

                    <label for="edit-product-image4">Hình ảnh 5:</label>
                    <input type="file" id="edit-product-image4" name="hinhanh4" accept="image/*">
                    <?php if (!empty($product['hinhanh4'])): ?>
                        <img id="previewImage4" src="/public/img/<?php echo htmlspecialchars($product['hinhanh4']); ?>"
                             alt="Xem trước ảnh 5">
                    <?php else: ?>
                        <img id="previewImage4" src="#" alt="Xem trước ảnh 5" style="display: none;">
                    <?php endif; ?>
                </div>
            </div>
            <label for="edit-product-description">Mô tả sản phẩm:</label>
            <textarea id="edit-product-description" class="mytextarea"
                      name="mota"><?php echo htmlspecialchars($product['mota'], ENT_QUOTES, 'UTF-8'); ?></textarea>

            <div class="form-buttons">
                <button type="submit" class="btn submit-btn">Lưu thay đổi</button>
                <a style ="text-decoration: none;" href="/inis/admin/sanpham" class="btn reset-btn">Hủy</a>
            </div>
        </form>

        <!-- Thông báo giữ nguyên -->
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const imageInputs = [
            {
                input: 'edit-product-image',
                preview: 'previewImage',
                src: '<?php echo "/public/img/" . htmlspecialchars($product["hinhanh"]); ?>'
            },
            {
                input: 'edit-product-image1',
                preview: 'previewImage1',
                src: '<?php echo "/public/img/" . htmlspecialchars($product["hinhanh1"]); ?>'
            },
            {
                input: 'edit-product-image2',
                preview: 'previewImage2',
                src: '<?php echo "/public/img/" . htmlspecialchars($product["hinhanh2"]); ?>'
            },
            {
                input: 'edit-product-image3',
                preview: 'previewImage3',
                src: '<?php echo "/public/img/" . htmlspecialchars($product["hinhanh3"]); ?>'
            },
            {
                input: 'edit-product-image4',
                preview: 'previewImage4',
                src: '<?php echo "/public/img/" . htmlspecialchars($product["hinhanh4"]); ?>'
            }
        ];

        imageInputs.forEach(({input, preview, src}) => {
            const inputFile = document.getElementById(input);
            const previewImg = document.getElementById(preview);

            if (src && src !== "/public/img/") {
                previewImg.src = src;
                previewImg.style.display = 'block';
            }

            inputFile.addEventListener('change', function (e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        previewImg.src = e.target.result;
                        previewImg.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    });

</script>
</body>
</html>