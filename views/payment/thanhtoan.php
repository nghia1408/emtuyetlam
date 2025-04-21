<div class="container-payment">
    <!-- Billing Details Form -->
    <div class="form-section">
        <h2>Chi Tiết Thanh Toán</h2>
        <div class="form-group">
            <label>Tên</label>
            <input type="text" required />
        </div>
        <div class="form-group">
            <label>Tỉnh / Thành Phố</label>
            <input type="text" />
        </div>
        <div class="form-group">
            <label>Quận / Huyện</label>
            <input type="text" required />
        </div>
        <div class="form-group">
            <label>Địa Chỉ</label>
            <input type="text" />
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" required />
        </div>
        <div class="form-group">
            <label>Số Điện Thoại</label>
            <input type="tel" required />
        </div>
        <!-- <div class="form-group">
          <label>Email Address*</label>
          <input type="email" required />
        </div> -->
        <div class="checkbox-group">
            <input type="checkbox" id="save-info" />
            <label for="save-info"
            >Lưu thông tin này để thanh toán nhanh hơn vào lần sau</label
            >
        </div>
    </div>

    <!-- Order Summary -->
    <div class="summary-section">
        <div class="cart-item">
            <div class="cart-item-name">
                <img src="./assets/image/items/item-1.png" alt="Monitor" />
                LCD Monitor
            </div>
            <div>$650</div>
        </div>
        <div class="cart-item">
            <div class="cart-item-name">
                <img src="./assets/image/items/item-2.png" alt="Gamepad" />
                Hf Gamepad
            </div>
            <div>$1100</div>
        </div>

        <div class="cart-summary">
            <div class="summary-line">
                <span>Thành Tiền:</span>
                <span>$1750</span>
            </div>
            <div class="summary-line">
                <span>Vận Chuyển:</span>
                <span>Miễn phí</span>
            </div>
            <div class="summary-line">
                <strong>Tổng Cộng:</strong>
                <strong>$1750</strong>
            </div>
        </div>

        <div class="payment-methods">
            <div class="payment-option">
                <input type="radio" name="payment" id="bank" checked />
                <label for="bank">Ngân Hàng</label>
                <div class="payment-icons">
                    <img
                            src="https://img.icons8.com/color/48/000000/visa.png"
                            alt="Visa"
                    />
                    <img
                            src="https://img.icons8.com/color/48/000000/mastercard.png"
                            alt="Mastercard"
                    />
                    <img
                            src="https://img.icons8.com/color/48/000000/amex.png"
                            alt="Amex"
                    />
                </div>
            </div>
            <div class="payment-option">
                <input type="radio" name="payment" id="cod" />
                <label for="cod">Thanh Toán Khi Nhận Hàng</label>
            </div>
        </div>

        <div class="coupon-section">
            <input type="text" placeholder=" nhập mã giảm giá" />
            <button>Mã Giảm Giá</button>
        </div>

        <a href="?controller=order&action=index"><button class="place-order">Đặt Hàng</button></a>
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
        <div class="footer_item">
            <h3 class="footer_item_titl">Support</h3>
            <ul class="footer_list">
                <li class="li footer_list_item">Privacy policy</li>
                <li class="li footer_list_item">Terms of use</li>
                <li class="li footer_list_item">FAQ's</li>
                <li class="li footer_list_item">Contact</li>
            </ul>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container footer_bottom_container">
            <p class="footer_copy">Copyright Casafine 2025. All right reserved</p>
        </div>
    </div>
</footer>