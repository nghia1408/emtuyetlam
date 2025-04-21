<div class="ep-container">
    <div class="ep-sidebar">
        <h3>Tài khoản của tôi</h3>
        <ul>
            <li class="ep-active"><a href="./account.html">Hồ sơ</a></li>
            <li ><a href="?controller=account&action=changePassword">Đổi mật khẩu</a></li>
        </ul>
    </div>

    <div class="ep-content">
        <div class="ep-breadcrumb">
            <span class="ep-welcome">Welcome! <?= $user->name ?> </span>
        </div>
        <div class="ep-card">
            <h2 style="margin-bottom:50px">Hồ sơ của tôi</h2>
            <form method="post">
                <div class="ep-form-row">
                    <div class="ep-form-group">
                        <label>Tên đăng nhập</label>
                        <input type="text" value="<?= $user->username ?>">
                    </div>
                </div>
                <div>
                    <div class="ep-form-row">
                        <div class="ep-form-group">
                            <label>Tên</label>
                            <input type="text" value="<?= $user->name ?>">
                        </div>
                    </div>
                </div>
                <div class="ep-form-row">
                    <div class="ep-form-group">
                        <label>Email</label>
                        <input type="email" value="<?= $user->email ?>">
                    </div>
                </div>
                <div>
                    <div class="ep-form-row">
                        <div class="ep-form-group">
                            <label>Số điện thoại</label>
                            <input type="text" value="<?= $user->phone ?>">
                        </div>
                    </div>
                </div>

                <div class="ep-form-row">
                    <div class="ep-form-group">
                        <label>Giới tính</label>
                        <div class="ep-gender-options">
                            <label><input type="radio" name="gender" value="male" checked><span>Nam</span></label>
                            <label><input type="radio" name="gender" value="female"><span>Nữ</span></label>
                            <label><input type="radio" name="gender" value="other"><span>Khác</span></label>
                        </div>
                    </div>
                </div>
                <div class="ep-form-actions">
                    <button type="submit" class="ep-save">Lưu</button>
                </div>

            </form>
        </div>
    </div>
</div>

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
    </div>
    <div class="footer_bottom">
        <div class="container footer_bottom_container">
            <p class="footer_copy">
                Copyright Casafine 2025. All right reserved
            </p>
        </div>
    </div>
</footer>
