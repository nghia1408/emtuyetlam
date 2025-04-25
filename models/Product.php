<?php
    class Product {
        
        
        public $id;
        public $name;
        public $desc;

        public $price;
        public $discount;

        public $qty;
        public $cate_id;

        public $img;
        public $category_name;

        function __construct($id, $name, $desc, $price, $discount, $qty, $cate_id, $img, $category_name) {
            $this->id = $id;
            $this->name = $name;
            $this->desc = $desc;
            $this->price = $price;
            $this->discount = $discount;
            $this->qty = $qty;
            $this->cate_id = $cate_id;
            $this->img = $img;
            $this->category_name = $category_name;
        }


        public static function getAll($category = null) {
            try {
                $db = DB::getInstance();

                // Nếu có danh mục, thêm điều kiện vào truy vấn SQL
                if ($category) {
                    $stmt = $db->prepare("SELECT p.*, c.name AS category_name FROM products p JOIN category c ON p.category_id = c.id WHERE c.name = :category");
                    $stmt->bindParam(':category', $category);
                } else {
                    // Nếu không có danh mục, lấy tất cả sản phẩm
                    $stmt = $db->prepare("SELECT products.*, category.name AS category_name FROM products JOIN category ON products.category_id = category.id;");
                }

                $stmt->execute();
                $products = [];

                foreach ($stmt->fetchAll() as $item) {
                    $products[] = new Product(
                        $item['id'],
                        $item['name'],
                        $item['description'],
                        $item['price'],
                        $item['discount'],
                        $item['quantity'],
                        $item['category_id'],
                        $item['image'],
                        $item['category_name']
                    );
                }

                return $products;
            } catch (PDOException $ex) {
                return "Error";
            }
        }

        /**
         * @return mixed
         */
        public static function getProductById($id) {
            $db = DB::getInstance();
            $stmt = $db->prepare("SELECT * FROM products WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        
            if ($stmt->rowCount() > 0) {
                $item = $stmt->fetch();
                return [
                    'id' => $item['id'],
                    'name' => $item['name'],
                    'description' => $item['description'],
                    'price' => $item['price'],
                    'discount' => $item['discount'],
                    'quantity' => $item['quantity'],
                    'category_id' => $item['category_id'],
                    'img' => $item['image']
                ];
            }
        
            return null;
        }
        

        // Phương thức tìm kiếm sản phẩm
        public static function searchProducts($search_query) {
            try {
                $db = DB::getInstance();

                // Tìm kiếm sản phẩm dựa trên tên hoặc mô tả sản phẩm
                $stmt = $db->prepare("SELECT products.*, category.name AS category_name FROM products JOIN category ON products.category_id = category.id WHERE products.name LIKE :search_query OR products.description LIKE :search_query");
                $search_term = "%" . $search_query . "%";
                $stmt->bindParam(':search_query', $search_term);
                $stmt->execute();

                $products = [];
                foreach ($stmt->fetchAll() as $item) {
                    $products[] = new Product(
                        $item['id'],
                        $item['name'],
                        $item['description'],
                        $item['price'],
                        $item['discount'],
                        $item['quantity'],
                        $item['category_id'],
                        $item['image'],
                        $item['category_name']
                    );
                }

                return $products;
            } catch (PDOException $ex) {
                return "Error";
            }
        }

       public static function addProduct($name, $desc, $price, $cate_id, $img) {
    try {
        // Lấy đối tượng kết nối cơ sở dữ liệu
        $db = DB::getInstance();

        // Chuẩn bị câu lệnh SQL để thêm sản phẩm vào cơ sở dữ liệu
        $stmt = $db->prepare("INSERT INTO products (name, description, price, category_id, image) 
                              VALUES (:name, :desc, :price, :cate_id, :img)");

        // Liên kết các tham số vào câu lệnh SQL
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':desc', $desc);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':cate_id', $cate_id);
        $stmt->bindParam(':img', $img);

        // Thực thi câu lệnh SQL
        return $stmt->execute();  // Trả về kết quả của việc thực thi câu lệnh
    } catch (PDOException $e) {
        // Trả về thông báo lỗi nếu có vấn đề trong quá trình thực thi
        return "Error: " . $e->getMessage();
    }
}

public static function deleteProductById($id): bool
{
    $db = Database::getInstance();
    $conn = $db->getConnection();

    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    return $stmt->execute([$id]);
}



    
}
