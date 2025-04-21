<div class="product-detail-container">
    <?php if (isset($product)): ?>
        <div class="product-images">
            <div class="main-image">
                <img src="<?= $product->img ?>" alt="<?= $product->name ?>" class="main-product-image" />
            </div>
        </div>

        <div class="product-info">
            <h1 class="product-title"><?= $product->name ?></h1>  <!-- Hiển thị tên sản phẩm -->
            <div class="product-rating">
                <span class="rating">★★★★☆</span> <span>(150 Reviews)</span>  <!-- Có thể thay bằng dữ liệu thực tế -->
            </div>
            <p class="product-price"><?= $product->price ?> đ</p>  <!-- Hiển thị giá sản phẩm -->
            <p class="product-description">
                <?= $product->description ?>  <!-- Hiển thị mô tả sản phẩm -->
            </p>

            <div class="product-options">
                <label for="colours">Colours:</label>
                <select id="colours" name="colours">
                    <option value="red">Red</option>
                    <option value="blue">Blue</option>
                </select>

                <label for="sizes">Size:</label>
                <select id="sizes" name="sizes">
                    <option value="xs">XS</option>
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                    <option value="xl">XL</option>
                </select>

                <label for="quantity">Quantity:</label>
                <input
                        type="number"
                        id="quantity"
                        name="quantity"
                        value="1"
                        min="1"
                />

                <a href="?controller=payment&action=thanhtoan" class="btn-buy">Buy Now</a>
                <a href="?controller=cart&action=index" class="btn-buy">Add to cart</a>

            </div>

            <div class="product-actions">
                <p>Free Delivery</p>
                <p>Return Delivery: Free 30 Days Delivery Returns. Details</p>
            </div>
        </div>
    <?php else: ?>
        <p>Product not found.</p>  <!-- Nếu không có sản phẩm -->
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