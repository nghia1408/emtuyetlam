<?php
if (!isUserLoggedIn()) {
    header("Location: index.php?controller=account&action=login");
    exit;
}
$cart_items = $data['cart_items'];
$total_amount = 0;
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thanh toán đơn hàng - CasaFine</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
            color: #333;
            line-height: 1.6;
        }

        .checkout-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 30px;
            padding: 20px;
        }

        .checkout-form {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        .order-summary {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            position: sticky;
            top: 20px;
            height: fit-content;
        }

        .form-title {
            font-size: 24px;
            color: #2c3e50;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #eee;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #2c3e50;
            font-weight: 500;
        }

        input[type="text"],
        input[type="tel"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="tel"]:focus {
            border-color: #4a90e2;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
            outline: none;
        }

        .error {
            color: #e74c3c;
            font-size: 13px;
            margin-top: 5px;
        }

        .cart-items {
            margin-bottom: 20px;
        }

        .cart-item {
            display: grid;
            grid-template-columns: 80px 1fr auto;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
            align-items: center;
        }

        .cart-item img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
        }

        .item-details h4 {
            margin: 0 0 5px;
            color: #2c3e50;
            font-size: 16px;
        }

        .item-price {
            color: #e74c3c;
            font-weight: 600;
            font-size: 16px;
        }

        .quantity {
            color: #666;
            font-size: 14px;
        }

        .total-amount {
            font-size: 24px;
            color: #e74c3c;
            font-weight: 600;
            text-align: right;
            margin: 20px 0;
            padding-top: 20px;
            border-top: 2px solid #eee;
        }

        .payment-methods {
            margin: 25px 0;
        }

        .payment-option {
            padding: 15px;
            border: 2px solid #ddd;
            border-radius: 8px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        .payment-option.selected {
            border-color: #4a90e2;
            background-color: #f0f7ff;
        }

        .payment-option input[type="radio"] {
            margin-right: 10px;
        }

        .bank-info {
            margin-top: 15px;
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            width: 100%;
        }

        .bank-info h4 {
            color: #2c3e50;
            margin: 0 0 10px 0;
        }

        .bank-info p {
            margin: 5px 0;
            color: #333;
        }

        .bank-info strong {
            color: #2c3e50;
        }

        .submit-btn {
            background-color: #4a90e2;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #357abd;
            transform: translateY(-2px);
        }

        @media (max-width: 900px) {
            .checkout-container {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="checkout-container">
        <div class="checkout-form">
            <h2 class="form-title"><i class="fas fa-shipping-fast"></i> Thông tin giao hàng</h2>
            
            <?php if (isset($_SESSION['error'])): ?>
                <div class="error-message">
                    <?php 
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif; ?>

            <form id="payment-form" method="post" action="index.php?controller=order&action=placeOrder" onsubmit="return validateForm()">
                <div class="form-row">
                    <div class="form-group">
                        <label for="name"><i class="fas fa-user"></i> Họ tên</label>
                        <input type="text" id="name" name="name" required>
                        <div class="error" id="name-error"></div>
                    </div>

                    <div class="form-group">
                        <label for="phone"><i class="fas fa-phone"></i> Số điện thoại</label>
                        <input type="tel" id="phone" name="phone" required>
                        <div class="error" id="phone-error"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="address"><i class="fas fa-map-marker-alt"></i> Địa chỉ</label>
                    <input type="text" id="address" name="address" required>
                    <div class="error" id="address-error"></div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="province"><i class="fas fa-city"></i> Tỉnh/Thành phố</label>
                        <input type="text" id="province" name="province" required>
                        <div class="error" id="province-error"></div>
                    </div>

                    <div class="form-group">
                        <label for="district"><i class="fas fa-building"></i> Quận/Huyện</label>
                        <input type="text" id="district" name="district" required>
                        <div class="error" id="district-error"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="ward"><i class="fas fa-map"></i> Phường/Xã</label>
                    <input type="text" id="ward" name="ward" required>
                    <div class="error" id="ward-error"></div>
                </div>

                <div class="payment-methods">
                    <h3>Phương thức thanh toán</h3>
                    <div class="payment-option" onclick="selectPayment('cod')">
                        <div style="width: 100%; display: flex; align-items: center;">
                            <input type="radio" name="payment_method" value="cod" checked>
                            <label>Thanh toán khi nhận hàng (COD)</label>
                        </div>
                    </div>

                    <div class="payment-option" onclick="selectPayment('bank_transfer')">
                        <div style="width: 100%; display: flex; align-items: center;">
                            <input type="radio" name="payment_method" value="bank_transfer">
                            <label>Thanh toán chuyển khoản</label>
                        </div>
                        <div class="bank-info" id="bank-info" style="display: none;">
                            <h4>TÀI KHOẢN NGÂN HÀNG:</h4>
                            <p><strong>Vietcombank - (Ngân hàng TMCP Ngoại Thương Việt Nam)</strong></p>
                            <p><strong>Chủ tài khoản:</strong> LÊ THÀNH PHÚ</p>
                            <p><strong>Số tài khoản:</strong> 99344097177</p>
                        </div>
                    </div>
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fas fa-lock"></i> Đặt hàng an toàn
                </button>
            </form>
        </div>

        <div class="order-summary">
            <h2 class="form-title"><i class="fas fa-shopping-cart"></i> Đơn hàng của bạn</h2>
            <div class="cart-items">
                <?php foreach ($cart_items as $item): 
                    $itemTotal = $item['price'] * $item['quantity'];
                    $total_amount += $itemTotal;
                ?>
                <div class="cart-item">
                    <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">
                    <div class="item-details">
                        <h4><?php echo htmlspecialchars($item['name']); ?></h4>
                        <div class="quantity">Số lượng: <?php echo $item['quantity']; ?></div>
                    </div>
                    <div class="item-price"><?php echo number_format($itemTotal); ?>₫</div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="total-amount">
                Tổng cộng: <?php echo number_format($total_amount); ?>₫
            </div>
        </div>
    </div>

    <script>
        function validateForm() {
            let isValid = true;
            const fields = ['name', 'phone', 'address', 'province', 'district', 'ward'];
            
            // Reset all error messages
            fields.forEach(field => {
                document.getElementById(field + '-error').textContent = '';
            });
            
            // Validate name
            const name = document.getElementById('name').value.trim();
            if (!name) {
                document.getElementById('name-error').textContent = 'Vui lòng nhập họ tên';
                isValid = false;
            } else if (name.length < 2) {
                document.getElementById('name-error').textContent = 'Họ tên phải có ít nhất 2 ký tự';
                isValid = false;
            }
            
            // Validate phone - chấp nhận nhiều định dạng số điện thoại
            const phone = document.getElementById('phone').value.trim();
            if (!phone) {
                document.getElementById('phone-error').textContent = 'Vui lòng nhập số điện thoại';
                isValid = false;
            } else if (!/^[0-9]{8,11}$/.test(phone.replace(/[-. ]/g, ''))) {
                document.getElementById('phone-error').textContent = 'Số điện thoại không hợp lệ (phải có từ 8-11 số)';
                isValid = false;
            }
            
            // Validate address
            const address = document.getElementById('address').value.trim();
            if (!address) {
                document.getElementById('address-error').textContent = 'Vui lòng nhập địa chỉ';
                isValid = false;
            } else if (address.length < 5) {
                document.getElementById('address-error').textContent = 'Địa chỉ quá ngắn';
                isValid = false;
            }
            
            // Validate province, district, ward
            ['province', 'district', 'ward'].forEach(field => {
                const value = document.getElementById(field).value.trim();
                if (!value) {
                    document.getElementById(field + '-error').textContent = `Vui lòng nhập ${field === 'province' ? 'tỉnh/thành phố' : field === 'district' ? 'quận/huyện' : 'phường/xã'}`;
                    isValid = false;
                }
            });

            if (!isValid) {
                return false;
            }

            const method = document.querySelector('input[name="payment_method"]:checked').value;
            if (method === 'vnpay') {
                document.getElementById('payment-form').action = 'vnpay_php/vnpay_create_payment.php';
            }
            return true;
        }

        function selectPayment(method) {
            document.querySelectorAll('.payment-option').forEach(option => {
                option.classList.remove('selected');
            });
            
            const radio = document.querySelector(`input[value="${method}"]`);
            radio.checked = true;
            radio.closest('.payment-option').classList.add('selected');

            // Hiển thị/ẩn thông tin ngân hàng
            const bankInfo = document.getElementById('bank-info');
            if (bankInfo) {
                bankInfo.style.display = method === 'bank_transfer' ? 'block' : 'none';
            }
        }
    </script>
</body>
</html>

