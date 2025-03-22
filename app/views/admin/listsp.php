<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trang Quản Trị</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400&display=swap" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/fu913pcqvkkjh88a0sbfv2ujw5rgt3bh3w46uhb7drzy233p/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '.mytextarea',
        plugins: [
      // Core editing features
      'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
      // Your account includes a free trial of TinyMCE premium features
      // Try the most popular premium features until Dec 16, 2024:
      'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown',
      // Early access to document converters
      'importword', 'exportword', 'exportpdf'
    ],
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),

      });
      
    </script>


  <style>
    h2{
      text-align: center;
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
/* Hiệu ứng modal */
.modal {
  display: flex;
  position: fixed;
  z-index: 1000;
  left: 50%; /* Đặt vị trí theo chiều ngang */
  top: 50%; /* Đặt vị trí theo chiều dọc */
  transform: translate(-50%, -50%); /* Dịch chuyển về chính giữa */
  width: 100vw;
  height: 100vh;
  background-color: rgba(0, 0, 0, 0.5);
  align-items: center;
  justify-content: center;
  overflow-y: auto;
  padding: 20px;
}

/* Cấu trúc modal dạng ngang */
.modal-content {
  background-color: white;
  width: 80vw; /* Rộng 80% màn hình */
  max-width: 1000px; /* Giới hạn chiều rộng tối đa */
  padding: 20px;
  border-radius: 10px;
  max-height: 85vh; /* Chiếm tối đa 85% chiều cao màn hình */
  overflow-y: auto; /* Cuộn nếu nội dung quá dài */
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
  position: relative;
  font-family: Arial, sans-serif;
}
/* Header modal */
.modal-content h2 {
  text-align: center;
  font-size: 22px;
  font-weight: bold;
  margin-bottom: 15px;
  color: #2ecc71;
}
/* Định dạng 2 cột cho form */
.form-container {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: space-between;
}

/* Mỗi cột chiếm 48% chiều rộng */
.form-column {
  width: 48%;
  display: flex;
  flex-direction: column;
  gap: 10px;
}
/* Input, select, textarea */
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
  resize: none;
  height: 100px;
}
/* Input file */
.form-edit-product input[type="file"] {
  border: none;
}

/* Nút đóng modal */
.close {
  position: absolute;
  right: 15px;
  top: 10px;
  font-size: 24px;
  cursor: pointer;
  border: none;
  background: none;
  color: #555;
}

.close:hover {
  color: red;
}

/* Điều chỉnh kích thước modal trên màn hình nhỏ */
@media (max-width: 600px) {
  .modal-content {
    width: 95vw; /* Chiếm 95% chiều rộng màn hình nhỏ */
    max-width: none; /* Không giới hạn */
    max-height: 95vh;
  }
}

/* Căn chỉnh form bên trong popup */
.form-edit-product {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

/* Label */
.form-edit-product label {
  font-weight: bold;
  margin-bottom: 5px;
  display: block;
  text-align: left;
}
/* Căn chỉnh nút */
.form-buttons {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 20px;
  gap: 20px;
}
.form-buttons .btn {
  min-width: 120px;
  height: 50px;
  font-size: 16px;
  font-weight: bold;
  border: none;
  border-radius: 10px; /* Bo góc nhẹ */
  display: flex;
  align-items: center;
  justify-content: center;
  white-space: nowrap;
}
/* Nút thêm sản phẩm */
.submit-btn {
  background-color: #1abc9c;
  color: white;
}

.submit-btn:hover {
  background-color: #16a085;
  transform: scale(1.05);
}
/* Nút hủy */
.reset-btn {
  background-color: white;
  border: 1px solid #ccc;
  color: black;

}

.reset-btn:hover {
  background-color: #e74c3c;
  color: white;
  transform: scale(1.05);
  cursor: pointer;
}
/* Điều chỉnh modal trên màn hình nhỏ */
@media (max-width: 768px) {
  .modal-content {
    width: 95vw; /* Giữ kích thước phù hợp */
    max-width: none;
    max-height: 90vh;
  }
  
  .form-container {
    flex-direction: column;
  }
  .form-column {
    width: 100%; /* Mỗi cột chiếm toàn bộ chiều rộng */
  }

  .form-buttons {
    flex-direction: column;
    gap: 10px;
  }

}
#previewImage {
    width: 100px;  /* Giữ kích thước vừa phải */
    height: auto;
    margin-left: 10px; /* Cách nút Choose File một chút */
    border-radius: 5px;
    border: 1px solid #ccc;
}
/* Ẩn modal khi không cần hiển thị */
#productModal {
  visibility: hidden; /* Ẩn modal mà không ảnh hưởng đến bố cục */
  opacity: 0; /* Ẩn modal hoàn toàn */
  transition: opacity 0.3s ease-in-out; /* Hiệu ứng mờ khi hiển thị */
}

/* Hiển thị modal khi được kích hoạt */
#productModal.show {
  visibility: visible;
  opacity: 1;
}
#editProductModal {
  visibility: hidden; /* Ẩn modal mà không ảnh hưởng đến bố cục */
  opacity: 0; /* Ẩn modal hoàn toàn */
  transition: opacity 0.3s ease-in-out; /* Hiệu ứng mờ khi hiển thị */
}

/* Hiển thị modal khi được kích hoạt */
#editProductModal.show {
  visibility: visible;
  opacity: 1;
}
    /* Nút chung */
a button {
    padding: 8px 12px;
    margin: 5px;
    border: none;
    border-radius: 5px;
    font-size: 14px;
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
    background-color: #e74c3c; /* Màu đỏ */
    color: white;
}

a .delete-btn:hover {
    background-color: #c0392b;
    transform: scale(1.05);
}
.add-btn {
    background-color: #2ecc71; /* Màu xanh lá */
    color: white;
    font-weight: bold;
    top: 10px; /* Cách cạnh trên 10px */
    right: 10px; /* Cách cạnh trái 10px */
    padding: 10px 20px; /* Khoảng cách bên trong */
    border-radius: 5px; /* Bo tròn góc */
    border: none; /* Xóa viền nút */
    cursor: pointer; /* Con trỏ chuột hiển thị dạng tay */
}
.submit-btn {
    background-color: #2ecc71; /* Màu xanh lá */
    color: white;
    font-weight: bold;
    top: 10px; /* Cách cạnh trên 10px */
    right: 10px; /* Cách cạnh trái 10px */
    padding: 10px 20px; /* Khoảng cách bên trong */
    border-radius: 5px; /* Bo tròn góc */
    border: none; /* Xóa viền nút */
    cursor: pointer; /* Con trỏ chuột hiển thị dạng tay */
}
.header-actions {
  display: flex;
  justify-content: space-between; /* Đẩy các phần tử về 2 bên */
  align-items: center; /* Căn giữa theo chiều dọc */
  margin-bottom: 20px; /* Khoảng cách dưới */
}

.header-actions h2 {
  margin: 0; /* Xóa khoảng cách mặc định */
  font-size: 24px; /* Đặt kích thước chữ */
}

.header-actions .submit-btn {
  margin: 0; /* Xóa khoảng cách thừa */
}
.edit-icon, .delete-icon {
    font-size: 18px; /* Điều chỉnh kích thước icon */
    cursor: pointer;
    margin: 0 8px;
    transition: transform 0.2s ease-in-out;
}

.edit-icon {
    color: #3498db; /* Xanh dương */
}

.delete-icon {
    color: #e74c3c; /* Đỏ */
}

.edit-icon:hover {
    transform: scale(1.2);
    color: #2980b9;
}

.delete-icon:hover {
    transform: scale(1.2);
    color: #c0392b;
}
.add-btn{
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

a .submit-btn:hover {
    background-color: #27ae60; /* Màu xanh lá đậm khi hover */
    transform: scale(1.05); /* Phóng to nhẹ khi hover */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Thêm bóng đổ để nổi bật */
}

  </style>
  </head>
<body>
  <div class="detail">
          <h2>Danh Sách Sản Phẩm</h2>
          <!-- Nút mở popup -->
          <button class="add-btn" onclick="openModal()">Thêm sản phẩm</button>
          <!-- Modal (Popup) -->
          <div id="productModal" class="modal">
            <div class="modal-content">
              <span class="close" onclick="closeModal()">&times;</span>
              <h2>Thêm sản phẩm mới</h2>
              <form method="POST" enctype="multipart/form-data" action="/inis/admin/xulythemsanpham" class="form-edit-product" >
      <div class="form-container">
        <!-- Cột 1 -->
        <div class="form-column">

          <label for="product-name">Tên sản phẩm:</label>
          <input type="text" id="tensanpham" name="tensanpham" required>

          <label for="product-quantity">Số lượng:</label>
          <input type="number" id="soluong" name="so_luong" value="" min="1" required>

          <label for="product-category">Danh mục:</label>
          <select name="danh_muc" id="product-category">
        <?php while ($row = $danhmucsp->fetch_assoc()): ?>
            <option value="<?= $row['id_danhmuc'] ?>"><?= $row['tendanhmuc'] ?></option>
        <?php endwhile; ?>
    </select>

        </div>

        <!-- Cột 2 -->
        <div class="form-column">
          <label for="product-description">Mô tả sản phẩm:</label>
          <textarea id="mota" name="mota"></textarea>

          <label for="product-price">Giá bán:</label>
          <input type="number" id="giagoc" name="gia" value="" min="0" required>

          <label for="product-image">Chọn hình ảnh:</label>
          <input type="file" id="hinhanh" name="hinhanh" accept="image/*" required>
          <img id="previewImage" src="#" alt="Xem trước ảnh" style="display: none;">
        </div>
      </div>

      <!-- Nút bấm -->
      <div class="form-buttons">
        <button type="submit" class="btn submit-btn">Thêm sản phẩm</button>
        <button type="reset" class="btn reset-btn">Hủy</button>
      </div>
    </form>
            </div>
          </div>
   
          <table>
            <thead>
              <tr>
                
                <th>Mã Sản Phẩm</th>
                <th>Tên Sản Phẩm</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Số Lượng</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody>
                <?php
                
                while($row=mysqli_fetch_array($listsp)){?>
              <tr>
                
                <td><?php echo $row['masanpham']  ?></td>
                <td><?php echo $row['tensanpham']  ?></td>
                <td><img style="width:100px" src="<?php echo WEBROOT . 'public/img/' . $row['hinhanh']; ?>" alt=""></td>
                <td><?php echo number_format($row['giagoc'], 0, ',', '.'); ?> VNĐ</td>
                <td><?php echo $row['soluong']  ?></td>
                <td>
                    <!-- Nút sửa -->
            <a href="#" onclick="openEditModal('<?php echo $row['masanpham']; ?>')">
                <i class="fa-solid fa-pen-to-square edit-icon"></i>
            </a>
            <a href="/inis/admin/xoasp/<?php echo $row['masanpham']; ?>" onclick="return confirmCustom('Bạn chắc chắn muốn xóa sản phẩm mã: <?php echo $row['masanpham']; ?> - Tên: <?php echo $row['tensanpham']; ?>?')">
                <i class="fa-solid fa-trash delete-icon"></i>
            </a>
                </td>
              </tr>
              <?php }?>
            </tbody>
          </table>
 <!-- Modal (Popup) sửa sản phẩm -->
            <div id="editProductModal" class="modal">
                    <div class="modal-content">
                      <span class="close" onclick="closeEditModal()">&times;</span>
                      <h2>Sửa sản phẩm</h2>
                      <form method="POST" enctype="multipart/form-data" action="/inis/admin/xulysuasanpham" class="form-edit-product">
                        <div class="form-container">
                          <!-- Cột 1 -->
                          <div class="form-column">
                            <label for="edit-product-id">Mã sản phẩm:</label>
                            
                            <input type="text" id="edit-product-id" name="masanpham" value="<?php echo $row['masanpham']; ?>" required readonly>

                            <label for="edit-product-name">Tên sản phẩm:</label>
                            <input type="text" id="edit-product-name" name="tensanpham" value="<?php echo $row['tensanpham']; ?>" required>


                            <label for="edit-product-quantity">Số lượng:</label>
                            <input type="number" id="edit-product-quantity" name="soluong" value="<?php echo $row['soluong']; ?>" min="1" required>

                            <label for="edit-product-category">Danh mục:</label>
                            <select id="edit-product-category" name="danhmuc" required>
                    <?php
                    // Giả sử $dvt chứa dữ liệu đơn vị tính
                    while ($row = mysqli_fetch_array($danhmucsp)) {
                        $selected = ($row['id_danhmuc'] == $row['id_danhmuc']) ? 'selected' : '';
                        echo "<option value='" . $row['id_danhmuc'] . "' $selected>" . $row['tendanhmuc'] . "</option>";
                    }
                    ?>
                </select>
                          </div>

                          <!-- Cột 2 -->
                          <div class="form-column">
                            <label for="edit-product-description">Mô tả sản phẩm:</label>
                            <textarea id="mytextarea" name="mota"><?php echo $row['mo_ta']?></textarea>
                            
                            <label for="edit-product-price">Giá sản phẩm:</label>
                            <input type="number" id="edit-product-price" name="gia" value="<?php echo $row['giagoc']; ?>" min="0" required>

                            <label for="edit-product-image">Hình ảnh:</label>
                            <input type="file" id="edit-product-image" name="hinhanh" accept="image/*" required>
                            <img id="previewImage" src="<?php echo WEBROOT . 'public/img/' . $row['hinhanh']; ?>" alt="Xem trước ảnh" style="display: none;">
                          </div>

                        </div>

                        <!-- Nút điều khiển -->
                        <div class="form-buttons">
                          <button type="submit" class="btn submit-btn">Lưu thay đổi</button>
                          <button type="button" class="btn reset-btn" onclick="closeEditModal()">Hủy</button>
                        </div>
                      </form>
                    </div>
                  </div>
    </div>  
  
        <?php 
if (isset($_SESSION['thanhcong'])) {
    echo "<script>alert('" . addslashes($_SESSION['thanhcong']) . "');</script>";
    unset($_SESSION['thanhcong']);
}
?>
</div>


    <script>
  function confirmCustom(message) {
    const isConfirmed = window.confirm(message);
    return isConfirmed;
}
</script>
<script>
  // Mở Modal
  function openModal() {
    document.getElementById("productModal").classList.add('show');
  }

  // Đóng Modal
  function closeModal() {
    document.getElementById("productModal").classList.remove('show');
  }

  // Đóng modal khi nhấn ngoài popup
  window.onclick = function(event) {
    const modal = document.getElementById("productModal");
    if (event.target === modal) {
      modal.style.display = "none";
    }
  };
</script>
<script>
    function openEditModal(masanpham) {
    document.getElementById('edit-product-id').value = masanpham;
    document.getElementById('editProductModal').classList.add('show');
}
    function closeEditModal() {
        document.getElementById("editProductModal").classList.remove('show');
    }
    window.onclick = function(event) {
    const modal = document.getElementById("editProductModal");
    if (event.target === modal) {
      modal.style.display = "none";
    }
  };
</script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
  const fileInput = document.getElementById('product-image');
  const formResetButton = document.querySelector('.form-edit-product .reset-btn');
  const previewImage = document.querySelector("#products img");
  const previewImageContainer = document.createElement('div');

  // Thêm container hiển thị ảnh xem trước
  previewImageContainer.style.marginTop = '10px';
  previewImageContainer.innerHTML = '<img id="preview-image" style="width: 500px; display: none; border: 1px solid #ccc; border-radius: 5px;" />';
  fileInput.insertAdjacentElement('afterend', previewImageContainer);

  const previewImage = document.getElementById('preview-image');

  fileInput.addEventListener('change', (event) => {
    const file = event.target.files[0];

    // Kiểm tra nếu không có file
    if (!file) {
      previewImage.style.display = 'none';
      return;
    }

    // Kiểm tra loại file
    if (!file.type.startsWith('image/')) {
      alert('Vui lòng chọn tệp ảnh hợp lệ!');
      fileInput.value = '';
      previewImage.style.display = 'none';
      return;
    }

    // Kiểm tra kích thước file
    if (file.size > 2 * 1024 * 1024) {
      alert('Kích thước tệp không được vượt quá 2MB!');
      fileInput.value = '';
      previewImage.style.display = 'none';
      return;
    }

    // Hiển thị ảnh xem trước
    const reader = new FileReader();
    reader.onload = (e) => {
      previewImage.src = e.target.result;
      previewImage.style.display = 'block';
    };
    reader.readAsDataURL(file);
  });

  // Reset ảnh xem trước khi nhấn nút làm mới
  formResetButton.addEventListener('click', () => {
    previewImage.style.display = 'none';
    fileInput.value = '';
  })
});
</script>

</body>
</html>

