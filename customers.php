<?php
include 'protected.php';
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "milind_cafe";

$conn = new mysqli($servername, $username, $password, $dbname);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers - Milind Cafe Admin</title>
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
                <a href="customers.php"><i class="fas fa-users"></i> Customers</a>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
            <div class="col-md-10 content">
                <h2><i class="fas fa-users"></i> Customer List</h2>
                <div class="card p-4 mt-4">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer Name</th>
                                <th>Total Orders</th>
                                <th>Total Spent</th>
                                <th>Last Order</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $customers = $conn->query("SELECT customer_name, COUNT(*) as total_orders, SUM(total_price) as total_spent, MAX(order_date) as last_order FROM orders GROUP BY customer_name ORDER BY total_spent DESC");
                            while($customer = $customers->fetch_assoc()) {
                                echo '
                                <tr>
                                    <td>#'.rand(1000,9999).'</td>
                                    <td>'.$customer['customer_name'].'</td>
                                    <td>'.$customer['total_orders'].'</td>
                                    <td>₹'.number_format($customer['total_spent'], 0).'</td>
                                    <td>'.$customer['last_order'].'</td>
                                </tr>';
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