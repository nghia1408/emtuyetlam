<?php
class Cart {
    public $id;
    public $user_id;
    public $product_name;
    public $product_price;
    public $product_img;
    public $quantity;

    // Constructor để khởi tạo đối tượng Cart
    function __construct($id, $user_id, $product_name, $product_price, $product_img, $quantity) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->product_name = $product_name;
        $this->product_price = $product_price;
        $this->product_img = $product_img;
        $this->quantity = $quantity;
    }

    // Lấy giỏ hàng của người dùng
    public static function getCartItems($db, $user_id) {
        $stmt = $db->prepare("SELECT c.id, p.name AS name, p.price AS price, p.image AS image, c.quantity
                      FROM cart c
                      JOIN products p ON c.product_id = p.id
                      WHERE c.user_id = ?");

        $stmt->execute([$user_id]);
        return $stmt->fetchAll();
    }

    // Thêm sản phẩm vào giỏ hàng
    public static function addToCart($db, $user_id, $product_id, $product_name, $product_price, $product_image, $quantity) {
        // Kiểm tra nếu sản phẩm đã có trong giỏ hàng của người dùng
        $stmt = $db->prepare("SELECT * FROM cart WHERE user_id = ? AND product_id = ?");
        $stmt->execute([$user_id, $product_id]);
        $existing_product = $stmt->fetch();

        if ($existing_product) {
            // Cập nhật số lượng nếu sản phẩm đã có trong giỏ
            $new_quantity = $existing_product['quantity'] + $quantity;
            $stmt = $db->prepare("UPDATE cart SET quantity = ?, updated_at = NOW() WHERE id = ?");
            $stmt->execute([$new_quantity, $existing_product['id']]);
        } else {
            // Thêm sản phẩm mới vào giỏ hàng
            $stmt = $db->prepare("INSERT INTO cart (user_id, product_id, product_name, product_price, product_image, quantity) 
                                  VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$user_id, $product_id, $product_name, $product_price, $product_image, $quantity]);
        }
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public static function removeFromCart($db, $user_id, $cart_id) {
        $stmt = $db->prepare("DELETE FROM cart WHERE id = ? AND user_id = ?");
        $stmt->execute([$cart_id, $user_id]);
    }

}
