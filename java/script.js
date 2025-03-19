const snowContainer = document.querySelector(".snow-container");
const snowflakes = 1000; // Số lượng bông tuyết

function createSnowflake() {
  const snowflake = document.createElement("div");
  snowflake.classList.add("snow");

 
  snowflake.style.left = Math.random() * 100 + "vw";
  snowflake.style.width = Math.random() * 5 + 2 + "px"; // Kích thước ngẫu nhiên
  snowflake.style.height = snowflake.style.width; // Đảm bảo hình tròn

 
  snowflake.style.animationDuration = Math.random() * 3 + 2 + "s"; // 2s đến 5s


  snowContainer.appendChild(snowflake);


  setTimeout(() => {
    snowflake.remove();
  }, 5000); // Thời gian để bông tuyết tồn tại
}


setInterval(createSnowflake, 200); // Tạo bông tuyết mỗi 200ms
