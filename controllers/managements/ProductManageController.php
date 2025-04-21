<?php

include_once('controllers/BaseController.php');
include_once('models/User.php');
include_once('utils/account.php');
include_once('utils/redirect.php');
include_once('models/Product.php');

class ProductManageController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'managements/product';
    }


    public function index(): void
    {
        // Lấy danh sách sản phẩm từ model Product
        $products = Product::getAll(); // Giả sử bạn đã có phương thức getAll trong model Product

        // Truyền dữ liệu vào view
        $this->render('index', ['products' => $products], 'admin');
    }
}
