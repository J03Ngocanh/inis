<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<section class="history-section">
  <br><br>
  <h1 class="history-title">Hành Trình Phát Triển Của Innisfree</h1>
  <div class="timeline">
    <div class="timeline-item" data-year="2000">
      <h2>2000</h2>
      <p>Innisfree ra đời, trở thành thương hiệu mỹ phẩm thiên nhiên đầu tiên tại Hàn Quốc, tập trung vào sản phẩm bền vững và thân thiện với môi trường.</p>
    </div>
    <div class="timeline-item" data-year="2005">
      <h2>2005</h2>
      <p>Ra mắt dòng sản phẩm Green Tea nổi tiếng, được chiết xuất từ đảo Jeju.</p>
    </div>
    <div class="timeline-item" data-year="2010">
      <h2>2010</h2>
      <p>Innisfree mở rộng ra thị trường quốc tế, mang vẻ đẹp thiên nhiên Hàn Quốc đến toàn thế giới.</p>
    </div>
    <div class="timeline-item" data-year="2020">
      <h2>2020</h2>
      <p>Đạt được nhiều giải thưởng quốc tế, khẳng định vị thế của một thương hiệu mỹ phẩm thiên nhiên hàng đầu.</p>
    </div>
  </div>
</section>
<style>body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f7f7f7;
}

.history-section {

  background: linear-gradient(to bottom, #e8f5e9, #ffffff);
}

.history-title {
  text-align: center;
  font-size: 36px;
  color: #2e7d32;
  margin-bottom: 20px;
}

.timeline {
  display: flex;
  flex-direction: column;
  gap: 30px;
  max-width: 800px;
  margin: 0 auto;
  position: relative;
  padding-left: 20px;
}

.timeline:before {
  content: "";
  position: absolute;
  left: 10px;
  top: 0;
  bottom: 0;
  width: 4px;
  background-color: #2e7d32;
}

.timeline-item {
  position: relative;
  background: #ffffff;
  border: 1px solid #e0e0e0;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  animation: fadeInUp 0.8s ease-in-out;
}

.timeline-item h2 {
  font-size: 24px;
  color: #388e3c;
}

.timeline-item p {
  margin: 10px 0 0;
  color: #555;
}

.timeline-item:before {
  content: attr(data-year);
  position: absolute;
  left: -50px;
  top: 20px;
  background: #2e7d32;
  color: #ffffff;
  font-size: 18px;
  font-weight: bold;
  padding: 10px 15px;
  border-radius: 50%;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>
<script>
	document.addEventListener("scroll", function () {
  const items = document.querySelectorAll(".timeline-item");
  const triggerBottom = window.innerHeight / 5 * 4;

  items.forEach((item) => {
    const itemTop = item.getBoundingClientRect().top;

    if (itemTop < triggerBottom) {
      item.classList.add("show");
    }
  });
});
</script>
</body>

</html>
