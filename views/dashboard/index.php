<!-- làm tại đây -->
<!--kjshdfkjhsdkjfhs-->
<div class="dashboard">
    <div class="summary">
        <div class="card purple">
            <h3>Tổng doanh thu</h3>
            <p>99.999.999 VNĐ</p>
            <span class="positive">↑ 5.86%</span>
        </div>
        <div class="card pink">
            <h3>Doanh thu liên kết</h3>
            <p>99.999.999 VNĐ</p>
            <span class="positive">↑ 5.86%</span>
        </div>
        <div class="card blue">
            <h3>Hoàn tiền</h3>
            <p>99.999.999 VNĐ</p>
            <span class="na">N/A</span>
        </div>
        <div class="card yellow">
            <h3>Tổng số sản phẩm bán ra</h3>
            <p>2.222</p>
        </div>
    </div>

    <!--END-->

    <!-- Biểu đồ tĩnh -->
<div class="card" style="margin-top: 20px;">
    <h3>Biểu đồ doanh thu theo tháng</h3>
    <canvas id="revenueChart" height="100"></canvas>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('revenueChart').getContext('2d');
    const revenueChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6'],
            datasets: [{
                label: 'Doanh thu (VNĐ)',
                data: [12000000, 19000000, 30000000, 22000000, 25000000, 28000000],
                backgroundColor: '#8e44ad',
                borderRadius: 8,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    labels: {
                        color: '#fff'
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.dataset.label + ': ' + context.formattedValue + ' VNĐ';
                        }
                    }
                }
            },
            scales: {
                x: {
                    ticks: {
                        color: '#fff'
                    }
                },
                y: {
                    ticks: {
                        color: '#fff'
                    },
                    beginAtZero: true
                }
            }
        }
    });
</script>

    
</div>
</div>