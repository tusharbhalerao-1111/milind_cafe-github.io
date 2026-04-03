<?php
include 'protected.php';

$dailySales = $conn->query("SELECT DATE(order_date) as date, COUNT(*) as orders, SUM(total_price) as revenue FROM orders GROUP BY DATE(order_date) ORDER BY date DESC LIMIT 7");
$categorySales = $conn->query("SELECT category, COUNT(*) as count, SUM(total_price) as revenue FROM orders GROUP BY category ORDER BY revenue DESC");
$totalRev = $conn->query("SELECT SUM(total_price) as total FROM orders")->fetch_assoc()['total'] ?? 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports - Milind Cafe Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root { --primary: #ff6347; --dark: #2c3e50; }
        body { font-family: 'Segoe UI', sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; }
        .sidebar { background: rgba(255,255,255,0.95); min-height: 100vh; padding: 20px; }
        .sidebar a { display: block; padding: 10px; color: var(--dark); text-decoration: none; margin: 5px 0; }
        .sidebar a:hover { background: var(--primary); color: white; border-radius: 5px; }
        .content { padding: 30px; }
        .card { background: rgba(255,255,255,0.95); border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); }
        .table thead { background: var(--primary); color: white; }
        .stat-card { background: linear-gradient(135deg, #667eea, #764ba2); color: white; padding: 20px; border-radius: 15px; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <h3><i class="fas fa-mug-hot"></i> Milind Cafe</h3>
                <a href="index.php"><i class="fas fa-home"></i> Dashboard</a>
                <a href="reports.php"><i class="fas fa-chart-line"></i> Reports</a>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
            <div class="col-md-10 content">
                <h2><i class="fas fa-chart-line"></i> Sales Reports</h2>
                
                <div class="row mt-4">
                    <div class="col-md-3">
                        <div class="stat-card">
                            <h3><i class="fas fa-shopping-cart"></i> <?php echo $conn->query("SELECT COUNT(*) as count FROM orders")->fetch_assoc()['count']; ?></h3>
                            <p>Total Orders</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-card" style="background: linear-gradient(135deg, #f093fb, #f5576c);">
                            <h3><i class="fas fa-rupee-sign"></i> ₹<?php echo number_format($conn->query("SELECT SUM(total_price) as total FROM orders")->fetch_assoc()['total'] ?? 0, 0); ?></h3>
                            <p>Total Revenue</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-card" style="background: linear-gradient(135deg, #4facfe, #00f2fe);">
                            <h3><i class="fas fa-utensils"></i> <?php echo $conn->query("SELECT COUNT(*) as count FROM menu")->fetch_assoc()['count']; ?></h3>
                            <p>Menu Items</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-card" style="background: linear-gradient(135deg, #fa709a, #fee140);">
                            <h3><i class="fas fa-clock"></i> <?php echo $conn->query("SELECT COUNT(*) as count FROM orders WHERE status = 'Pending'")->fetch_assoc()['count']; ?></h3>
                            <p>Pending Orders</p>
                        </div>
                    </div>
                </div>

                <div class="card p-4 mt-4">
                    <h4><i class="fas fa-chart-bar"></i> Daily Sales (Last 7 Days)</h4>
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Orders</th>
                                <th>Revenue (₹)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($day = $dailySales->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo date('d M Y', strtotime($day['date'])); ?></td>
                                <td><?php echo $day['orders']; ?></td>
                                <td>₹<?php echo number_format($day['revenue'], 0); ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

                <div class="card p-4 mt-4">
                    <h4><i class="fas fa-chart-pie"></i> Sales by Category</h4>
                    <table class="table table-hover mt-3">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Orders</th>
                                <th>Revenue (₹)</th>
                                <th>Percentage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($cat = $categorySales->fetch_assoc()): ?>
                            <tr>
                                <td><span class="badge bg-info"><?php echo $cat['category']; ?></span></td>
                                <td><?php echo $cat['count']; ?></td>
                                <td>₹<?php echo number_format($cat['revenue'], 0); ?></td>
                                <td>
                                    <div class="progress" style="height: 20px;">
                                        <div class="progress-bar" style="width: <?php echo ($cat['revenue'] / $totalRev) * 100; ?>%; background: linear-gradient(90deg, #667eea, #764ba2);">
                                            <?php echo number_format(($cat['revenue'] / $totalRev) * 100, 1); ?>%
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 text-center">
                    <button class="btn btn-success btn-lg">
                        <i class="fas fa-download"></i> Export Report (CSV)
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>