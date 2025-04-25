<?php
// include_once("connection.php");
$db = DB::getInstance();

// Số sản phẩm mỗi trang
$limit = 10;

// Trang hiện tại (nếu không có thì mặc định là 1)
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

// Tính offset
$offset = ($page - 1) * $limit;

// Lấy tổng số sản phẩm
$totalQuery = "SELECT COUNT(*) FROM products";
$totalStmt = $db->prepare($totalQuery);
$totalStmt->execute();
$totalProducts = $totalStmt->fetchColumn();

// Tính tổng số trang
$totalPages = ceil($totalProducts / $limit);

// Truy vấn sản phẩm theo phân trang
$query = "SELECT * FROM products LIMIT :limit OFFSET :offset";
$stmt = $db->prepare($query);
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
        <div class="categories">
            <div class="category">
                <img src="./assets/image/icons/sofa.png" alt="" class="category_icon" />
                <p class="category_name">Sofa</p>
            </div>
            <div class="category">
                <img src="./assets/image/icons/door.png" alt="" class="category_icon" />
                <p class="category_name">Door</p>
            </div>
            <div class="category">
                <img src="./assets/image/icons/light.png" alt="" class="category_icon" />
                <p class="category_name">light</p>
            </div>
            <div class="category">
                <img src="./assets/image/icons/window.png" alt="" class="category_icon" />
                <p class="category_name">window</p>
            </div>
            <div class="category">
                <img src="./assets/image/icons/desk.png" alt="" class="category_icon" />
                <p class="category_name">Desk</p>
            </div>
            <div class="category">
                <img src="./assets/image/icons/chair.png" alt="" class="category_icon" />
                <p class="category_name">chair</p>
            </div>
        </div>
    </div>
</section>



<!--DATABASE-->

<div class="product_grid">
    <?php
    foreach ($products as $product) {
        echo '<div class="product_card">';
        echo '<a href="/emtuyetlam/index.php?controller=product&action=detail&id=' . urlencode($product['id']) . '">';
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


<style>
    .pagination {
    display: inline-block;
    padding: 10px 20px;
    border-radius: 8px;
    background-color: #f7f7f7;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.pagination a {
    color: #333;
    float: left;
    padding: 8px 14px;
    margin: 0 5px;
    text-decoration: none;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 6px;
    transition: background-color 0.3s, color 0.3s;
}

.pagination a:hover {
    background-color: #007bff;
    color: #fff;
    border-color: #007bff;
}

.pagination a.active {
    background-color: #007bff;
    color: white;
    border: 1px solid #007bff;
}
</style>
<!--Phân Trang-->
<div style="text-align: center; margin: 30px 0;">
    <?php if ($totalPages > 1): ?>
        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="?controller=product&action=index&page=<?= $page - 1 ?>">&laquo; Prev</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?controller=product&action=index&page=<?= $i ?>" <?= ($i == $page) ? 'class="active"' : '' ?>><?= $i ?></a>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <a href="?controller=product&action=index&page=<?= $page + 1 ?>">Next &raquo;</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>


<section class="section">
    <div class="container services_container">
        <div class="service">
            <img src="./assets/image/icons/service-1.png" alt="" class="service_img" />
            <h3 class="service_title">GIAO HÀNG NHANH VÀ MIỄN PHÍ</h3>
            <p class="service_p">Lorem ipsum dolor sit amet consectetur.</p>
        </div>
        <div class="service">
            <img src="./assets/image/icons/service-2.png" alt="" class="service_img" />
            <h3 class="service_title">HỖ TRỢ 24/7</h3>
            <p class="service_p">Lorem ipsum dolor sit amet consectetur.</p>
        </div>
        <div class="service">
            <img src="./assets/image/icons/service-3.png" alt="" class="service_img" />
            <h3 class="service_title">CHÍNH SÁCH BẢO HÀNH</h3>
            <p class="service_p">Lorem ipsum dolor sit amet consectetur.</p>
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