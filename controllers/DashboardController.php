<?php
include_once('controllers/BaseController.php');
include_once('models/Student.php');
include_once('models/Product.php');
include_once('models/User.php');
class DashboardController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'dashboard';
    }

    public function index() {
        // Kiểm tra nếu người dùng chưa đăng nhập hoặc không phải admin
        if (!isUserLoggedIn() || getUserLoggedIn()->role_id != 2) {
            // Nếu không phải admin, chuyển hướng về trang chủ
            header('Location: ?controller=home&action=index');
            exit();
        }

        // Nếu là admin, cho phép truy cập vào trang dashboard
        $this->render('index', [], 'admin');
    }

    public function logout() {
        setUserLogout();
        redirect("?controller=home&action=index");
    }
}