<div class="product-detail-container">
    <?php if (isset($product)): ?>
        <div class="product-images">
            <div class="main-image">
                <img src="<?= htmlspecialchars($product->img) ?>" alt="<?= htmlspecialchars($product->name) ?>" class="main-product-image" />
            </div>
        </div>

        <div class="product-info">
            <h1 class="product-title"><?= htmlspecialchars($product->name) ?></h1>  <!-- Hiển thị tên sản phẩm -->
            <div class="product-rating">
                <span class="rating">★★★★☆</span> <span>(150 Reviews)</span>  <!-- Có thể thay bằng dữ liệu thực tế -->
            </div>
            <p class="product-price"><?= number_format($product->price, 0, ',', '.') ?> đ</p>  <!-- Hiển thị giá sản phẩm -->
            <p class="product-description">
                <?= htmlspecialchars($product->description) ?>  <!-- Hiển thị mô tả sản phẩm -->
            </p>

            <div class="product-options">
                <form action="?controller=cart&action=add" method="POST">
                    <!-- Các trường ẩn để gửi thông tin sản phẩm -->
                    <input type="hidden" name="product_id" value="<?= htmlspecialchars($product->id) ?>">
                    <input type="hidden" name="product_name" value="<?= htmlspecialchars($product->name) ?>">
                    <input type="hidden" name="product_price" value="<?= $product->price ?>">
                    <input type="hidden" name="product_image" value="<?= htmlspecialchars($product->img) ?>">

                    <label for="colours">Màu sắc:</label>
                    <select id="colours" name="colours">
                        <option value="red">Đỏ</option>
                        <option value="blue">Xanh</option>
                    </select>

                    <label for="quantity">Số lượng:</label>
                    <input
                        type="number"
                        id="quantity"
                        name="quantity"
                        value="1"
                        min="1"
                        style="width: 60px;"
                    />

                    <button type="submit" class="btn-buy">Thêm vào giỏ hàng</button>
                </form>
            </div>

            <div class="product-actions">
                <p>Giao hàng miễn phí</p>
                <p>Đổi trả: Miễn phí đổi trả trong 30 ngày. Xem chi tiết</p>
            </div>
        </div>
    <?php else: ?>
        <p>Không tìm thấy sản phẩm.</p>  <!-- Nếu không có sản phẩm -->
    <?php endif; ?>
</div>
<!--  -->
<footer class="footer">
    <div class="container footer_container">
        <div class="footer_item">
            <a href="#" class="footer_logo">Nội Thất CASAFINE</a>
            <div class="footer_p">
                Nội Thất CASAFINE là thương hiệu đến từ Savimex với gần 40 năm kinh
                nghiệm trong việc sản xuất và xuất khẩu nội thất đạt chuẩn quốc tế.
            </div>
        </div>
        <div class="footer_item">
            <h3 class="footer_item_titl">Dịch Vụ</h3>
            <ul class="footer_list">
                <li class="li footer_list_item">Chính Sách Bán Hàng</li>
                <li class="li footer_list_item">Chính Sách Giao Hàng & Lắp Đặt</li>
                <li class="li footer_list_item">Chính Sách Đổi Trả</li>
                <li class="li footer_list_item">Chính Sách Bảo Hành & Bảo Trì</li>
            </ul>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container footer_bottom_container">
            <p class="footer_copy">
                Copyright Casafine 2025. All right reserved
            </p>
        </div>
    </div>
</footer>