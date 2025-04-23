<?php
include_once('controllers/BaseController.php');

class CartController extends BaseController {
    public function __construct() {
        $this->folder = 'cart';
        // Khởi tạo session nếu chưa được bắt đầu
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // Khởi tạo giỏ hàng nếu chưa tồn tại
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    public function index() {
        $data = ['cart_items' => $_SESSION['cart']];
        $this->render('index', $data);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product_id = $_POST['product_id'] ?? '';
            $product_name = $_POST['product_name'] ?? '';
            $product_price = $_POST['product_price'] ?? 0;
            $product_image = $_POST['product_image'] ?? '';
            $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
            $colour = $_POST['colours'] ?? ''; // Lấy màu sắc

            // Kiểm tra dữ liệu đầu vào
            if ($product_id && $product_name && $product_price) {
                // Tạo khóa duy nhất cho sản phẩm dựa trên ID, màu sắc và kích thước
                $cart_key = $product_id . '_' . $colour . '_' . $size;

                // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
                if (isset($_SESSION['cart'][$cart_key])) {
                    // Cập nhật số lượng
                    $_SESSION['cart'][$cart_key]['quantity'] += $quantity;
                } else {
                    // Thêm sản phẩm mới vào giỏ hàng
                    $_SESSION['cart'][$cart_key] = [
                        'id' => $product_id,
                        'name' => $product_name,
                        'price' => $product_price,
                        'image' => $product_image,
                        'quantity' => $quantity,
                        'colour' => $colour,
                        'size' => $size
                    ];
                }
                
                // Chuyển hướng về trang giỏ hàng với thông báo thành công
                $_SESSION['message'] = "Sản phẩm đã được thêm vào giỏ hàng!";
                header("Location: ?controller=cart&action=index");
                exit;
            } else {
                // Chuyển hướng với thông báo lỗi
                $_SESSION['error'] = "Lỗi khi thêm sản phẩm vào giỏ hàng!";
                header("Location: ?controller=cart&action=index");
                exit;
            }
        }
    }

    public function remove() {
        if (isset($_GET['id'])) {
            $cart_key = $_GET['id'];
            if (isset($_SESSION['cart'][$cart_key])) {
                unset($_SESSION['cart'][$cart_key]);
                $_SESSION['message'] = "Sản phẩm đã được xóa khỏi giỏ hàng!";
            }
        }
        header("Location: ?controller=cart&action=index");
        exit;
    }
}