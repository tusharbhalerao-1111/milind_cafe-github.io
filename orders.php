<?php
include 'protected.php';

if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM orders WHERE id=$id");
    header("Location: orders.php?deleted=1");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Orders - Milind Cafe Admin</title>
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
        .badge-success { background: linear-gradient(135deg, #2ecc71, #27ae60); }
        .badge-warning { background: linear-gradient(135deg, #f39c12, #e67e22); }
        .badge-danger { background: linear-gradient(135deg, #e74c3c, #c0392b); }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <h3><i class="fas fa-mug-hot"></i> Milind Cafe</h3>
                <a href="index.php"><i class="fas fa-home"></i> Dashboard</a>
                <a href="orders.php"><i class="fas fa-shopping-cart"></i> Orders</a>
                <a href="menu.php"><i class="fas fa-utensils"></i> Menu</a>
                <a href="logout.php" class="text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
            <div class="col-md-10 content">
                <h2><i class="fas fa-list"></i> All Orders</h2>
                
                <?php if(isset($_GET['deleted'])) echo '<div class="alert alert-success">Order deleted successfully!</div>'; ?>
                
                <div class="card p-4 mt-4">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer</th>
                                <th>Phone</th>
                                <th>Item</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $orders = $conn->query("SELECT * FROM orders ORDER BY id DESC");
                            if($orders->num_rows > 0) {
                                while($order = $orders->fetch_assoc()) {
                                    $statusClass = $order['status'] == 'Completed' ? 'badge-success' : ($order['status'] == 'Pending' ? 'badge-warning' : 'badge-danger');
                                    echo '
                                    <tr>
                                        <td>#'.$order['id'].'</td>
                                        <td>'.$order['customer_name'].'</td>
                                        <td>'.$order['customer_phone'].'</td>
                                        <td>'.$order['item_name'].'</td>
                                        <td>'.$order['quantity'].'</td>
                                        <td>₹'.$order['total_price'].'</td>
                                        <td><span class="badge '.$statusClass.'">'.$order['status'].'</span></td>
                                        <td>'.$order['order_date'].'</td>
                                        <td>
                                            <a href="orders.php?delete='.$order['id'].'" class="btn btn-sm btn-danger" onclick="return confirm(\'Delete order?\')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>';
                                }
                            } else {
                                echo '<tr><td colspan="9" class="text-center">No orders found.</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>