<div class="ep-container">
    <div class="ep-sidebar">
        <h3>Tài khoản của tôi</h3>
        <ul>
            <li ><a href="?controller=home&action=user">Hồ sơ</a></li>
            <li class="ep-active"><a href="?controller=home&action=changePassword">Đổi mật khẩu</a></li>
        </ul>
    </div>

    <div class="ep-content">
        <div class="ep-breadcrumb">
        </div>
        <div class="ep-card">
            <h4 style="margin-bottom:20px">Đổi mật khẩu</h4>
            <form action="?controller=account&action=changePassword" method="post">
                <input type="password" name="old_password" placeholder="Mật khẩu cũ">
                <input type="password" name="new_password" placeholder="Mật khẩu mới">
                <input type="password" name="confirm_password" placeholder="Nhập lại mật khẩu mới">
                <div class="ep-form-actions">
                    <button style="background-color: #e63946" type="button" class="ep-cancel" onclick="window.location.href='?controller=home&action=user'">Cancel</button>
<!--                    <input type="submit" name="btn_submit" value="Lưu" class="ep-save">-->
                    <button type="submit" name="btn_submit" class="ep-save">Lưu</button>
                </div>

                <?php if(isset($message)) echo("Message: " . $message) ?>
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
