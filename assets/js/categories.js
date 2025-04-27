document.querySelectorAll(".category").forEach((category) => {
  category.addEventListener("click", () => {
    const selectedName = category.getAttribute("data-name").toLowerCase();
    document.querySelectorAll(".product_card").forEach((product) => {
      const productName = product.querySelector("h4").textContent.toLowerCase();
      if (productName.includes(selectedName)) {
        product.style.display = "block";
      } else {
        product.style.display = "none";
      }
    });

    // Highlight icon được chọn
    document
      .querySelectorAll(".category")
      .forEach((c) => c.classList.remove("active"));
    category.classList.add("active");
  });
});
