<?php
include_once('controllers/BaseController.php');
include_once('models/Product.php');
class ProductController extends BaseController{
    public function __construct()
    {
        $this->folder = 'product';
    }
    public function index() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $product = Product::getProductById($id);  // Lấy thông tin sản phẩm theo id

            if ($product) {
                $this->render('product_detail', array("product" => $product));  // Hiển thị trang chi tiết sản phẩm
            } else {
                echo "Product not found.";  // Nếu không tìm thấy sản phẩm
            }
        } else {
            $flashSaleProducts = Product::getAll('Flash Sale');  // Hiển thị sản phẩm flash sale nếu không có id
            $this->render('product_detail', array("flashSaleProducts" => $flashSaleProducts));
        }
    }
    public function product_all(){
        $this->render('product_all');
    }

    public function search() {
        // Kiểm tra nếu có từ khóa tìm kiếm và người dùng đã nhấn nút tìm kiếm
        if (isset($_GET['search_query']) && !empty($_GET['search_query']) && isset($_GET['submit_search'])) {
            $search_query = $_GET['search_query'];

            // Tìm sản phẩm với từ khóa tìm kiếm
            $products = Product::searchProducts($search_query);

            // Hiển thị kết quả tìm kiếm
            $this->render('search_results', array('products' => $products));
        } else {
            // Nếu không có từ khóa, hiển thị thông báo
            $this->render('search_results', array('products' => [], 'message' => 'Không tìm thấy sản phẩm.'));
        }
    }
}