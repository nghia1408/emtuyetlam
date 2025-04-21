// Chờ đến khi trang đã load xong
window.addEventListener("load", function () {
    const loader = document.querySelector(".loader");
    const content = document.getElementById("content");
  
    loader.style.display = "none";     // Ẩn loader
    content.style.display = "block";   // Hiện nội dung
  });
  