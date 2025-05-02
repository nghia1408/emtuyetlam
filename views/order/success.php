<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['last_order'])) {
    header('Location: index.php?controller=home');
    exit;
}

$order = $_SESSION['last_order'];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đặt hàng thành công - CasaFine</title>
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

        .success-container {
            max-width: 800px;
            margin: 40px auto;
            background: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        .success-header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 30px;
            border-bottom: 1px solid #eee;
        }

        .success-icon {
            width: 100px;
            height: 100px;
            background-color: #4CAF50;
            border-radius: 50%;
            margin: 0 auto 25px;
            position: relative;
            box-shadow: 0 4px 12px rgba(76, 175, 80, 0.3);
            animation: scaleIn 0.5s ease-out;
        }

        @keyframes scaleIn {
            from { transform: scale(0); }
            to { transform: scale(1); }
        }

        .success-icon i {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 50px;
        }

        .success-title {
            color: #000000;
            font-size: 32px;
            margin: 0 0 15px;
            font-weight: 600;
        }

        .success-message {
            color: #000000;
            font-size: 18px;
            margin: 0;
        }

        .order-details {
            background: #f8f9fa;
            margin: 30px 0;
            padding: 25px;
            border-radius: 12px;
            border: 1px solid #e9ecef;
        }

        .order-number {
            font-size: 20px;
            color: #000000;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #e3f2fd;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .detail-row:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .detail-label {
            font-weight: 600;
            color: #000000;
            flex: 1;
        }

        .detail-value {
            color: #000000;
            flex: 2;
            text-align: right;
            font-weight: 500;
        }

        .shipping-info {
            background: white;
            padding: 25px;
            border-radius: 12px;
            margin-top: 30px;
            border: 1px solid #e9ecef;
        }

        .shipping-info h3 {
            color: #333;
            margin: 0 0 20px;
            font-size: 20px;
            font-weight: 600;
        }

        .note {
            margin-top: 30px;
            padding: 20px;
            background-color: #fff8e1;
            border: 1px solid #ffe082;
            border-radius: 12px;
            color: #ff8f00;
        }

        .note ul {
            margin: 15px 0;
            padding-left: 20px;
        }

        .note li {
            margin-bottom: 10px;
            position: relative;
            padding-left: 10px;
        }

        .button-container {
            text-align: center;
            margin-top: 40px;
        }

        .home-button {
            display: inline-flex;
            align-items: center;
            padding: 15px 30px;
            background-color: #1976d2;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(25, 118, 210, 0.3);
        }

        .home-button:hover {
            background-color: #1565c0;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(25, 118, 210, 0.4);
        }

        .home-button i {
            margin-right: 10px;
        }

        .status-badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 14px;
            color: #000000;
            background-color: #f8f9fa;
        }

        .status-pending {
            background-color: #fff3e0;
            color: #e65100;
        }

        .status-paid {
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        .bank-info {
            margin-top: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }

        .bank-info h4 {
            color: #000000;
            margin: 0 0 10px 0;
        }

        .bank-info p {
            margin: 5px 0;
            color: #000000;
        }

        .bank-info strong {
            color: #000000;
        }

        @media (max-width: 600px) {
            .success-container {
                padding: 20px;
                margin: 20px;
            }

            .detail-row {
                flex-direction: column;
                gap: 8px;
            }

            .detail-value {
                text-align: left;
            }

            .success-title {
                font-size: 24px;
            }

            .success-message {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-header">
            <div class="success-icon">
                <i class="fas fa-check"></i>
            </div>
            <h1 class="success-title">Đặt hàng thành công!</h1>
            <p class="success-message">Cảm ơn bạn đã mua hàng tại CasaFine</p>
        </div>

        <div class="order-details">
            <div class="order-number">
                <i class="fas fa-receipt"></i> Mã đơn hàng: #<?php echo htmlspecialchars($order['order_id']); ?>
            </div>

            <div class="detail-row">
                <span class="detail-label">Phương thức thanh toán:</span>
                <span class="detail-value">
                    <?php 
                    if ($order['payment_method'] === 'bank_transfer') {
                        echo 'Thanh toán chuyển khoản';
                    } else if ($order['payment_method'] === 'cod') {
                        echo 'Thanh toán khi nhận hàng';
                    }
                    ?>
                </span>
            </div>

            <?php if ($order['payment_method'] === 'bank_transfer'): ?>
            <div class="bank-info">
                <h4>THÔNG TIN CHUYỂN KHOẢN:</h4>
                <p><strong>Vietcombank - Ngân hàng TMCP Ngoại Thương Việt Nam</strong></p>
                <p><strong>Chủ tài khoản:</strong> LÊ THÀNH PHÚ</p>
                <p><strong>Số tài khoản:</strong> 99344097177</p>
                <p style="margin: 10px 0 0 0; color: #000000;">
                    <strong>Nội dung chuyển khoản:</strong> <?php echo $order['order_id']; ?>
                </p>
            </div>
            <?php endif; ?>

            <div class="detail-row">
                <span class="detail-label">Tổng tiền:</span>
                <span class="detail-value" style="color: #000000; font-size: 20px; font-weight: bold;">
                    <?php echo number_format($order['total_amount']); ?>₫
                </span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Trạng thái:</span>
                <span class="detail-value">
                    <span class="status-badge">
                        Chờ thanh toán
                    </span>
                </span>
            </div>
        </div>

        <div class="shipping-info">
            <h3><i class="fas fa-shipping-fast"></i> Thông tin giao hàng</h3>
            <div class="detail-row">
                <span class="detail-label">
                    <i class="fas fa-user"></i> Người nhận:
                </span>
                <span class="detail-value"><?php echo htmlspecialchars($order['customer_name']); ?></span>
            </div>
            <div class="detail-row">
                <span class="detail-label">
                    <i class="fas fa-phone"></i> Số điện thoại:
                </span>
                <span class="detail-value"><?php echo htmlspecialchars($order['phone']); ?></span>
            </div>
            <div class="detail-row">
                <span class="detail-label">
                    <i class="fas fa-map-marker-alt"></i> Địa chỉ:
                </span>
                <span class="detail-value">
                    <?php 
                    echo htmlspecialchars($order['address']) . ', ' . 
                         htmlspecialchars($order['ward']) . ', ' . 
                         htmlspecialchars($order['district']) . ', ' . 
                         htmlspecialchars($order['province']);
                    ?>
                </span>
            </div>
        </div>

        <div class="button-container">
            <a href="index.php?controller=home" class="home-button">
                <i class="fas fa-shopping-cart"></i> Tiếp tục mua sắm
            </a>
        </div>
    </div>

    <?php
    // Xóa thông tin đơn hàng khỏi session sau khi hiển thị
    unset($_SESSION['last_order']);
    ?>
</body>
</html>
