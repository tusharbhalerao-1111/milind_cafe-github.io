<?php
include 'protected.php';

if(isset($_POST['add'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $description = $conn->real_escape_string($_POST['description']);
    $price = floatval($_POST['price']);
    $category = $conn->real_escape_string($_POST['category']);
    $image = $conn->real_escape_string($_POST['image']);
    
    $conn->query("INSERT INTO menu (name, description, price, category, image) VALUES ('$name', '$description', $price, '$category', '$image')");
    header("Location: menu.php?added=1");
}

if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM menu WHERE id=$id");
    header("Location: menu.php?deleted=1");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Menu - Milind Cafe Admin</title>
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
                <a href="logout.php" class="text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
            <div class="col-md-10 content">
                <h2><i class="fas fa-utensils"></i> Manage Menu</h2>
                
                <?php if(isset($_GET['added'])) echo '<div class="alert alert-success">Menu item added successfully!</div>'; ?>
                <?php if(isset($_GET['deleted'])) echo '<div class="alert alert-success">Menu item deleted successfully!</div>'; ?>
                
                <div class="card p-4 mt-4">
                    <h4><i class="fas fa-plus"></i> Add New Item</h4>
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label>Item Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Price (₹)</label>
                                <input type="number" name="price" class="form-control" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Category</label>
                                <select name="category" class="form-select">
                                    <option>Breakfast</option>
                                    <option>Starters</option>
                                    <option>Main Course</option>
                                    <option>Biryani</option>
                                    <option>Drinks</option>
                                    <option>Desserts</option>
                                    <option>Fast Food</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="2"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Image URL</label>
                                <input type="text" name="image" class="form-control" placeholder="https://example.com/image.jpg">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" name="add" class="btn btn-primary">Add Item</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card p-4 mt-4">
                    <h4><i class="fas fa-list"></i> Menu Items</h4>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $menu = $conn->query("SELECT * FROM menu ORDER BY id DESC");
                            if($menu->num_rows > 0) {
                                while($item = $menu->fetch_assoc()) {
                                    echo '
                                    <tr>
                                        <td>#'.$item['id'].'</td>
                                        <td>'.$item['name'].'</td>
                                        <td>'.$item['category'].'</td>
                                        <td>₹'.$item['price'].'</td>
                                        <td>
                                            <a href="menu.php?delete='.$item['id'].'" class="btn btn-sm btn-danger" onclick="return confirm(\'Delete this item?\')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>';
                                }
                            } else {
                                echo '<tr><td colspan="5" class="text-center">No menu items found</td></tr>';
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