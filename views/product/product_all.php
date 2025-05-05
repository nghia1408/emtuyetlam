
<style>
/* Style cho icon được chọn */
.category.active {
    border: 2px solid #000;
    background-color: #f0f0f0;
    border-radius: 10px;
}
</style>

<?php
// include_once("connection.php");
$db = DB::getInstance();

// Xử lý biểu mẫu POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category'])) {
    $category = trim($_POST['category']);
    if ($category === '') {
        unset($_SESSION['selected_category']); // Xóa danh mục nếu chọn "Tất cả"
    } else {
        $_SESSION['selected_category'] = $category; // Lưu danh mục vào session
    }
    // Chuyển hướng để tránh gửi lại biểu mẫu
    header("Location: ?controller=product&action=index");
    exit;
}

// Lấy trang hiện tại
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

// Số sản phẩm mỗi trang
$limit = 10;

// Tính offset
$offset = ($page - 1) * $limit;

// Lấy danh mục từ session
$category = isset($_SESSION['selected_category']) ? $_SESSION['selected_category'] : '';

// Xây dựng truy vấn đếm tổng số sản phẩm
$totalQuery = "SELECT COUNT(*) FROM products";
if (!empty($category)) {
    $totalQuery .= " WHERE LOWER(name) LIKE :category";
}

$totalStmt = $db->prepare($totalQuery);
if (!empty($category)) {
    $totalStmt->bindValue(':category', '%' . strtolower($category) . '%', PDO::PARAM_STR);
}
$totalStmt->execute();
$totalProducts = $totalStmt->fetchColumn();

// Tính tổng số trang
$totalPages = ceil($totalProducts / $limit);

// Xây dựng truy vấn lấy sản phẩm
$query = "SELECT * FROM products";
if (!empty($category)) {
    $query .= " WHERE LOWER(name) LIKE :category";
}
$query .= " LIMIT :limit OFFSET :offset";

$stmt = $db->prepare($query);
if (!empty($category)) {
    $stmt->bindValue(':category', '%' . strtolower($category) . '%', PDO::PARAM_STR);
}
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>



<section class="section">
    <div class="container">
        <div class="section_category">
            <p class="section_category_p">categories</p>
        </div>
        <div class="section_header">
            <h3 class="section_title">Browse by Category</h3>
        </div>
        <form method="POST" id="categoryForm" action="?controller=product&action=index">
    <input type="hidden" name="category" id="categoryInput">
    <div class="categories">
        <button type="submit" class="category <?= !isset($_SESSION['selected_category']) ? 'active' : '' ?>" data-name="">
            <img src="./assets/image/icons/all.png" alt="" class="category_icon" />
            <p class="category_name">Tất cả</p>
        </button>
        <button type="submit" class="category <?= isset($_SESSION['selected_category']) && $_SESSION['selected_category'] === 'Sofa' ? 'active' : '' ?>" data-name="Sofa">
            <img src="./assets/image/icons/sofa.png" alt="" class="category_icon" />
            <p class="category_name">Sofa</p>
        </button>
        <button type="submit" class="category <?= isset($_SESSION['selected_category']) && $_SESSION['selected_category'] === 'Giường' ? 'active' : '' ?>" data-name="Giường">
            <img src="./assets/image/icons/door.png" alt="" class="category_icon" />
            <p class="category_name">Giường</p>
        </button>
        <button type="submit" class="category <?= isset($_SESSION['selected_category']) && $_SESSION['selected_category'] === 'Đèn' ? 'active' : '' ?>" data-name="Đèn">
            <img src="./assets/image/icons/light.png" alt="" class="category_icon" />
            <p class="category_name">Đèn</p>
        </button>
        <button type="submit" class="category <?= isset($_SESSION['selected_category']) && $_SESSION['selected_category'] === 'Nệm' ? 'active' : '' ?>" data-name="Nệm">
            <img src="./assets/image/icons/window.png" alt="" class="category_icon" />
            <p class="category_name">Nệm</p>
        </button>
        <button type="submit" class="category <?= isset($_SESSION['selected_category']) && $_SESSION['selected_category'] === 'Ghế' ? 'active' : '' ?>" data-name="Ghế">
            <img src="./assets/image/icons/desk.png" alt="" class="category_icon" />
            <p class="category_name">Ghế</p>
        </button>
        <button type="submit" class="category <?= isset($_SESSION['selected_category']) && $_SESSION['selected_category'] === 'Bàn' ? 'active' : '' ?>" data-name="Bàn">
            <img src="./assets/image/icons/chair.png" alt="" class="category_icon" />
            <p class="category_name">Bàn</p>
        </button>
    </div>
</form>

    </div>
</section>



<!--DATABASE-->

<div class="product_grid">
    <?php
    foreach ($products as $product) {
        echo '<div class="product_card">';
        echo '<a href="?controller=product&action=detail&id=' . htmlspecialchars($product['id']) . '">';
        echo '<img class="product_img" src="' . htmlspecialchars($product['image']) . '" alt="' . htmlspecialchars($product['name']) . '">';
        echo '<h4>' . htmlspecialchars($product['name']) . '</h4>';
        echo '<p class="price">' . number_format($product['price']) . '<sup>đ</sup>';

        if ($product['discount'] > 0) {
            echo ' <span class="discount">-' . $product['discount'] . '%</span>';
        }

        echo '</p>';
        echo '<p class="desc">' . htmlspecialchars($product['description']) . '</p>';
        echo '</a>';
        echo '</div>';
    }
    ?>
</div>
<!-- sss -->
<!--Phân Trang-->
<div style="text-align: center; margin: 30px 0;">
    <?php if ($totalPages > 1): ?>
        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="?controller=product&action=index&page=<?= $page - 1 ?>">« Trước</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?controller=product&action=index&page=<?= $i ?>" <?= ($i == $page) ? 'class="active"' : '' ?>><?= $i ?></a>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <a href="?controller=product&action=index&page=<?= $page + 1 ?>">Tiếp »</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>


<section class="section">
    <div class="container services_container">
        <div class="service">
            <img src="./assets/image/icons/service-1.png" alt="" class="service_img" />
            <h3 class="service_title">GIAO HÀNG NHANH VÀ MIỄN PHÍ</h3>
            <p class="service_p">Miễn phí vận chuyển cho mọi đơn hàng toàn quốc.</p>
        </div>
        <div class="service">
            <img src="./assets/image/icons/service-2.png" alt="" class="service_img" />
            <h3 class="service_title">HỖ TRỢ 24/7</h3>
            <p class="service_p">Đội ngũ chăm sóc khách hàng luôn sẵn sàng hỗ trợ bạn mọi lúc.</p>
        </div>
        <div class="service">
            <img src="./assets/image/icons/service-3.png" alt="" class="service_img" />
            <h3 class="service_title">CHÍNH SÁCH BẢO HÀNH</h3>
            <p class="service_p">Cam kết bảo hành chính hãng cho tất cả sản phẩm.</p>
        </div>
    </div>
</section>

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
        <div class="footer_item">
            <h3 class="footer_item_titl">Support</h3>
            <ul class="footer_list">
                <li class="li footer_list_item">Account</li>
                <li class="li footer_list_item">Login / Register</li>
                <li class="li footer_list_item">Cart</li>
                <li class="li footer_list_item">Shop</li>
            </ul>
        </div>
        <div class="footer_item">
            <h3 class="footer_item_titl">Support</h3>
            <ul class="footer_list">
                <li class="li footer_list_item">Privacy policy</li>
                <li class="li footer_list_item">Terms of use</li>
                <li class="li footer_list_item">FAQ's</li>
                <li class="li footer_list_item">Contact</li>
            </ul>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container footer_bottom_container">
            <p class="footer_copy">Copyright Casafine 2025. All right reserved</p>
        </div>
    </div>
    
</footer>