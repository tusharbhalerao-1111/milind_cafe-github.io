<?php
include 'protected.php';

if(isset($_POST['add_menu'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image = $_POST['image'];
    
    $sql = "INSERT INTO menu (name, description, price, category, image) VALUES ('$name', '$description', '$price', '$category', '$image')";
    if($conn->query($sql)) {
        header("Location: menu.php?success=1");
    } else {
        $error = "Error adding menu item";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Menu - Milind Cafe Admin</title>
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
        .form-control:focus { border-color: var(--primary); box-shadow: 0 0 10px rgba(255,99,71,0.3); }
        .btn-primary { background: linear-gradient(135deg, #667eea, #764ba2); border: none; }
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
                <a href="add_menu.php"><i class="fas fa-plus"></i> Add Menu</a>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
            <div class="col-md-10 content">
                <h2><i class="fas fa-plus-circle"></i> Add New Menu Item</h2>
                
                <?php if(isset($error)) echo '<div class="alert alert-danger">'.$error.'</div>'; ?>
                <?php if(isset($_GET['success'])) echo '<div class="alert alert-success">Menu item added successfully!</div>'; ?>
                
                <div class="card p-4 mt-4">
                    <form method="POST">
                        <div class="mb-3">
                            <label>Item Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Price (₹)</label>
                            <input type="number" name="price" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Category</label>
                            <select name="category" class="form-control" required>
                                <option value="Breakfast">Breakfast</option>
                                <option value="Starters">Starters</option>
                                <option value="Main Course">Main Course</option>
                                <option value="Biryani">Biryani</option>
                                <option value="Drinks">Drinks</option>
                                <option value="Desserts">Desserts</option>
                                <option value="Fast Food">Fast Food</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Image URL</label>
                            <input type="url" name="image" class="form-control" placeholder="https://example.com/image.jpg">
                        </div>
                        <button type="submit" name="add_menu" class="btn btn-primary">
                            <i class="fas fa-save"></i> Add Menu Item
                        </button>
                        <a href="menu.php" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>