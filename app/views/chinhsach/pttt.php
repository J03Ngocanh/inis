<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Phương thức thanh toán - Innisfree</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <section class="payment-methods">
    <h1>Phương thức thanh toán</h1>
    <div class="payment-grid">
      <div class="method">
        <h2>Thanh toán khi nhận hàng (COD)</h2>
        <p>Thanh toán trực tiếp khi nhận hàng từ đơn vị vận chuyển.</p>
      </div>
      <div class="method">
        <h2>Internet Banking</h2>
        <p>Dịch vụ Internet Banking của ngân hàng.</p>
      </div>

    </div>
  </section>
  <style>
    body {
  font-family: Arial, sans-serif;
  line-height: 1.6;
  margin: 0;
  padding: 0;
  background-color: #f9f9f9;
  color: #333;
 
}

.payment-methods {
  max-width: 800px;
  margin: 20px auto;
  padding: 20px;
  background: #fff;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
}

.payment-methods h1 {
  text-align: center;
  color: #2a7f37;
}

.payment-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
}

.method {
  background: #f4f8f7;
  border: 1px solid #ddd;
  border-radius: 8px;
  padding: 15px;
  text-align: center;
  transition: transform 0.3s;
}

.method:hover {
  transform: scale(1.05);
}

.method h2 {
  font-size: 1.2em;
  color: #2a7f37;
  margin-bottom: 10px;
}

.method p {
  font-size: 0.9em;
  color: #666;
}

  </style>

</body>
</html>