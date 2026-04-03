<?php
include 'protected.php';

if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    if($id != $_SESSION['admin_id']) {
        $conn->query("DELETE FROM admin_users WHERE id=$id");
        header("Location: admin_users.php?deleted=1");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Users - Milind Cafe</title>
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
                <a href="admin_users.php"><i class="fas fa-users"></i> Admin Users</a>
                <a href="create_admin.php"><i class="fas fa-user-plus"></i> Create Admin</a>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
            <div class="col-md-10 content">
                <h2><i class="fas fa-users"></i> Admin Users Management</h2>
                
                <?php if(isset($_GET['deleted'])) echo '<div class="alert alert-success">Admin deleted successfully!</div>'; ?>
                
                <div class="card p-4 mt-4">
                    <div class="d-flex justify-content-between mb-3">
                        <h4>All Admin Users</h4>
                        <a href="create_admin.php" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Create New Admin
                        </a>
                    </div>
                    
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $admins = $conn->query("SELECT * FROM admin_users ORDER BY id DESC");
                            while($admin = $admins->fetch_assoc()) {
                                $is_current = ($admin['id'] == $_SESSION['admin_id']) ? '<span class="badge bg-success">Current User</span>' : '';
                                echo '
                                <tr>
                                    <td>#'.$admin['id'].'</td>
                                    <td>'.$admin['username'].' '.$is_current.'</td>
                                    <td>'.$admin['email'].'</td>
                                    <td>'.$admin['created_at'].'</td>
                                    <td>
                                        <?php if($admin["id"] != $_SESSION["admin_id"]): ?>
                                        <a href="admin_users.php?delete='.$admin['id'].'" class="btn btn-sm btn-danger" onclick="return confirm(\'Delete this admin?\')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <?php endif; ?>
                                    </td>
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