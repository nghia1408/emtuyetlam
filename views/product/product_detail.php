<div class="product-detail-container">
    <?php if (isset($product)): ?>
        <div class="product-images">
            <div class="main-image">
                <img src="<?= htmlspecialchars($product['img']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="main-product-image" />
            </div>
        </div>

        <div class="product-info">
            <h1 class="product-title"><?= htmlspecialchars($product['name']) ?></h1>
            <div class="product-rating">
                <span class="rating">★★★★☆</span> <span>(150 Reviews)</span>
            </div>
            <p class="product-price"><?= number_format($product['price'], 0, ',', '.') ?> đ</p>
            <p class="product-description">
                <?= htmlspecialchars($product['description']) ?>
            </p>

            <div class="product-options">
                <form action="?controller=cart&action=add" method="POST">
                    <input type="hidden" name="product_id" value="<?= htmlspecialchars($product['id']) ?>">
                    <input type="hidden" name="product_name" value="<?= htmlspecialchars($product['name']) ?>">
                    <input type="hidden" name="product_price" value="<?= $product['price'] ?>">
                    <input type="hidden" name="product_image" value="<?= htmlspecialchars($product['img']) ?>">

                    <!-- <label for="colours">Màu sắc:</label>
                    <select id="colours" name="colours">
                        <option value="red">Đỏ</option>
                        <option value="blue">Xanh</option>
                    </select>-->

                    <label for="quantity">Số lượng:</label>
                    <input
                        type="number"
                        id="quantity"
                        name="quantity"
                        value="1"
                        min="1"
                        style="width: 60px;"
                    />

                    <?php if (isUserLoggedIn()): ?>
                <button type="submit" class="btn-buy">Thêm vào giỏ hàng</button>
                <?php else: ?>
                    <a href="?controller=account&action=login" class="btn-buy" style="text-decoration: none; display: inline-block; text-align: center;">
                        Thêm vào giỏ hàng
                    </a>
                <?php endif; ?>
                </form>
            </div>

            <div class="product-actions">
                <p>Giao hàng miễn phí</p>
                <p>Đổi trả: Miễn phí đổi trả trong 30 ngày. Xem chi tiết</p>
            </div>
        </div>
    <?php else: ?>
        <p>Không tìm thấy sản phẩm.</p>
    <?php endif; ?>
</div>
