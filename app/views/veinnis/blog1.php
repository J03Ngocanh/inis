<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blog - Innisfree</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <!-- Header -->
    <header></header>

    <!-- Nội dung bài viết -->
    <section class="blog-content">
      <div class="content-container">
        <!-- Tiêu đề và hình ảnh -->
        <div class="blog-header">
          <h1>Các bước dưỡng da ban đêm hiệu quả</h1>
          <img
            src="/acc/public/img/blog1.png"
            alt="blog1"
            class="blog-image"
          />
        </div>

        <!-- Nội dung bài viết -->
        <div class="blog-body">
          <p>
            <strong
              >Chăm sóc da mặt vào ban đêm là bước rất quan trọng trong quy
              trình làm đẹp. Dưới đây là các bước dưỡng da hiệu quả cho
              bạn:</strong
            >
          </p>
          <ul>
            <li>
              <strong>Bước 1:</strong> Làm sạch da mặt bằng sữa rửa mặt phù hợp.
            </li>
            <li>
              <strong>Bước 2:</strong> Dùng toner để cân bằng độ pH cho da.
            </li>
            <li>
              <strong>Bước 3:</strong> Sử dụng serum hoặc dưỡng chất đặc trị.
            </li>
            <li>
              <strong>Bước 4:</strong> Dưỡng ẩm với kem dưỡng ban đêm để cung
              cấp độ ẩm sâu cho da.
            </li>
          </ul>
          <p>
            Việc áp dụng đúng quy trình chăm sóc da vào ban đêm sẽ giúp da bạn
            luôn khỏe mạnh và tràn đầy sức sống vào mỗi buổi sáng.
          </p>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer></footer>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        color: #333;
        background-color: #f4f4f4;
      }

      nav ul {
        list-style-type: none;
      }

      nav ul li {
        display: inline;
        margin-right: 20px;
      }

      nav ul li a {
        color: white;
        text-decoration: none;
        font-size: 16px;
      }

      nav ul li a:hover {
        text-decoration: underline;
      }

      /* Nội dung bài viết */
      .blog-content {
        max-width: 900px;
        margin: 50px auto;
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      .blog-header {
        text-align: center;
        margin-bottom: 30px;
      }

      .blog-header h1 {
        font-size: 28px;
        font-weight: bold;
        color: #4c8c2f;
      }

      .blog-image {
        max-width: 100%; /* Hình ảnh không vượt quá chiều rộng khung */
        max-height: 100%; /* Hình ảnh không vượt quá chiều cao khung */
        object-fit: cover; /* Giữ hình ảnh lấp đầy khung */
        object-position: center; /* Canh chỉnh tâm hình ảnh */
      }

      .blog-body {
        font-size: 18px;
        line-height: 1.8;
      }

      .blog-body ul {
        list-style-type: disc;
        margin-left: 40px;
      }

      .blog-body strong {
        font-weight: bold;
        color: #4c8c2f;
      }
    </style>
  </body>
</html>
