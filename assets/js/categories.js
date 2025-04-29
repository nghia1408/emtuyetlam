document.querySelectorAll(".category").forEach((category) => {
  category.addEventListener("click", (e) => {
      e.preventDefault(); // Ngăn hành vi mặc định của button
      const selectedName = category.getAttribute("data-name");

      // Cập nhật trường ẩn với danh mục được chọn
      document.getElementById("categoryInput").value = selectedName;

      // Highlight danh mục được chọn
      document.querySelectorAll(".category").forEach((c) => c.classList.remove("active"));
      category.classList.add("active");

      // Gửi biểu mẫu
      document.getElementById("categoryForm").submit();
  });
});