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

        function __construct($id, $name, $desc, $price, $discount, $qty, $cate_id, $img) {
            $this->id = $id;
            $this->name = $name;
            $this->desc = $desc;
            $this->price = $price;
            $this->discount = $discount;
            $this->qty = $qty;
            $this->cate_id = $cate_id;
            $this->img = $img;
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
                    $stmt = $db->prepare("SELECT * FROM products;");
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
                        $item['image']
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
            try {
                $db = DB::getInstance();
                $stmt = $db->prepare("SELECT * FROM products WHERE id = :id");
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                $item = $stmt->fetch();

                if ($item) {
                    return new Product(
                        $item['id'],
                        $item['name'],
                        $item['description'],
                        $item['price'],
                        $item['discount'],
                        $item['quantity'],
                        $item['category_id'],
                        $item['image']
                    );
                } else {
                    return null;
                }
            } catch (PDOException $ex) {
                return "Error";
            }
        }

        // Phương thức tìm kiếm sản phẩm
        public static function searchProducts($search_query) {
            try {
                $db = DB::getInstance();

                // Tìm kiếm sản phẩm dựa trên tên hoặc mô tả sản phẩm
                $stmt = $db->prepare("SELECT * FROM products WHERE name LIKE :search_query OR description LIKE :search_query");
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
                        $item['image']
                    );
                }

                return $products;
            } catch (PDOException $ex) {
                return "Error";
            }
        }


    }
