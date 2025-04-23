<?php
    include_once('controllers/BaseController.php');
    include_once('models/User.php');
    include_once('utils/account.php');
    include_once('utils/redirect.php');

    class AccountController extends BaseController {
        public function __construct() {
            $this->folder = 'account';
        }


        public function login()
        {
            if (isUserLoggedIn()) {
                // Nếu đã đăng nhập, chuyển hướng về trang chủ
                $user = getUserLoggedIn();

                if ($user && $user->role_id == 2) {
                    redirect("?controller=dashboard&action=index");
                } else {
                    redirect("?controller=home&action=index");
                }
                return;
            }

            if (isset($_POST['btn_submit'])) {
                $username = $_POST['tk'];
                $password = $_POST['mk'];

                if (empty($username) || empty($password)) {
                    $message = "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu";
                    $this->render('login', array("message" => $message));
                    return;
                }
                // Kiểm tra tên đăng nhập và mật khẩu
                $user = User::login($username, $password);
                if ($user) {
                    setUserLogin(serialize($user));
                
                    // Kiểm tra role_id
                    if ($user->role_id == 2) {
                        redirect("?controller=dashboard&action=index");
                    } else {
                        redirect("?controller=home&action=index");
                    }
                } else {
                    $message = "Sai tên đăng nhập hoặc mật khẩu";
                    $this->render('login', array("message" => $message));
                }
            } else {
                $this->render('login');
            }
        }

        public function logout() {
            setUserLogout();
            redirect("?controller=home&action=index");
        }

        public function register() {
            if (isset($_POST['btn_submit'])) {
                $username = $_POST['text_username'];
                $email = $_POST['text_email'];
                $password = $_POST['text_password'];

                $user = User::signup($username, $email, $password);

                if ($user) {
                    // Đăng ký thành công, hiển thị thông báo
                    $message = "Đăng ký thành công";
                } else {
                    // Đăng ký thất bại, hiển thị thông báo lỗi
                    $message = "Đăng ký thất bại, vui lòng thử lại";
                }

                $this->render('register', array("message" => $message));
            } else {
                $this->render('register', array("message" => ""));
            }
        }

        public function changePassword() {
            if(!isUserLoggedIn()) redirect("?controller=account&action=login");
            $user = getUserLoggedIn();  // Lấy thông tin người dùng từ session

            if (isset($_POST['btn_submit'])) {
                $oldPassword = $_POST['old_password'];
                $newPassword = $_POST['new_password'];
                $confirmPassword = $_POST['confirm_password'];

                if (empty($oldPassword) || empty($newPassword) || empty($confirmPassword)) {
                    $this->render('changePassword', ["message" => "Vui lòng nhập đầy đủ thông tin"]);
                    return;
                }

                $currentUser = User::getUserById($user->id);
                if (!$currentUser) {
                    $this->render('changePassword', ["message" => "Unknown error"]);
                    return;
                }

                if ($currentUser->password !== $oldPassword) {
                    $this->render('changePassword', ["message" => "Mật khẩu cũ không chính xác"]);
                    return;
                } else {
                    $updateStatus = User::changePassword($currentUser->id, $newPassword);
                    $message = $updateStatus ? "Mật khẩu đã được thay đổi thành công" : "Đã xảy ra lỗi trong quá trình thay đổi mật khẩu";
                    if ($updateStatus) {
                        $currentUser->password = $newPassword;
                        setUserLogin(serialize($currentUser));
                    }

                    $this->render('changePassword', ["message" => $message]);
                }
            } else {
                $this->render('changePassword', ["message" => ""]);
            }
        }

    }
