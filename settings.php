<?php
include 'protected.php';

if(isset($_POST['save_settings'])) {
    $cafe_name = $_POST['cafe_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $success = "Settings saved successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - Milind Cafe Admin</title>
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
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <h3><i class="fas fa-mug-hot"></i> Milind Cafe</h3>
                <a href="index.php"><i class="fas fa-home"></i> Dashboard</a>
                <a href="settings.php"><i class="fas fa-cog"></i> Settings</a>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
            <div class="col-md-10 content">
                <h2><i class="fas fa-cog"></i> Settings</h2>
                
                <?php if(isset($success)) echo '<div class="alert alert-success">'.$success.'</div>'; ?>
                
                <div class="card p-4 mt-4">
                    <h4>General Settings</h4>
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Cafe Name</label>
                                <input type="text" name="cafe_name" class="form-control" value="Milind Cafe">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="contact@milindcafe.com">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control" value="+91 98765 43210">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" value="123 Food Street, Mumbai, India">
                            </div>
                        </div>
                        <button type="submit" name="save_settings" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save Settings
                        </button>
                    </form>
                </div>

                <div class="card p-4 mt-4">
                    <h4>Database Backup</h4>
                    <p>Download a backup of your database</p>
                    <a href="backup.php" class="btn btn-success">
                        <i class="fas fa-download"></i> Backup Database
                    </a>
                </div>

                <div class="card p-4 mt-4">
                    <h4>System Information</h4>
                    <table class="table">
                        <tr>
                            <td>PHP Version:</td>
                            <td><?php echo phpversion(); ?></td>
                        </tr>
                        <tr>
                            <td>Server Software:</td>
                            <td><?php echo $_SERVER['SERVER_SOFTWARE']; ?></td>
                        </tr>
                        <tr>
                            <td>Database:</td>
                            <td><?php echo $dbname; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>