<?php
session_start();
include '../db.php';

// Check if already logged in
if(isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}

$error = '';
$success = '';

if(isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    
    if(empty($username) || empty($password)) {
        $error = "Please enter both username and password!";
    } else {
        $stmt = $conn->prepare("SELECT id, username, password, email FROM admin_users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            
            if(password_verify($password, $user['password'])) {
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_id'] = $user['id'];
                $_SESSION['admin_username'] = $user['username'];
                $_SESSION['admin_email'] = $user['email'];
                header("Location: index.php");
                exit();
            } else {
                $error = "Invalid username or password!";
            }
        } else {
            $error = "User not found!";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Milind Cafe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root { --primary: #ff6347; --dark: #2c3e50; }
        body { font-family: 'Segoe UI', sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; }
        .login-container { max-width: 400px; margin: 100px auto; }
        .card { background: rgba(255,255,255,0.95); border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); }
        .btn-primary { background: linear-gradient(135deg, #667eea, #764ba2); border: none; }
        .btn-primary:hover { background: linear-gradient(135deg, #764ba2, #667eea); }
        .forgot-links { margin-top: 15px; }
        .forgot-links a { color: #667eea; text-decoration: none; font-size: 14px; }
        .forgot-links a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="card p-4">
            <div class="text-center mb-4">
                <i class="fas fa-user-shield fa-3x text-primary"></i>
                <h2 class="mt-3">Admin Login</h2>
                <p class="text-muted">Milind Cafe Management</p>
            </div>

            <?php if($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>

            <?php if($success): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-3">
                    <label><i class="fas fa-user"></i> Username</label>
                    <input type="text" name="username" class="form-control" required placeholder="Enter username">
                </div>

                <div class="mb-3">
                    <label><i class="fas fa-lock"></i> Password</label>
                    <input type="password" name="password" class="form-control" required placeholder="Enter password">
                </div>

                <button type="submit" name="login" class="btn btn-primary w-100 py-2">
                    <i class="fas fa-sign-in-alt"></i> Login
                </button>
            </form>

            <div class="forgot-links text-center">
                <a href="forgot_password.php"><i class="fas fa-key"></i> Forgot Password?</a> | 
                <a href="forgot_username.php"><i class="fas fa-user"></i> Forgot Username?</a>
            </div>

            <div class="text-center mt-3">
                <a href="../index.php" class="text-muted"><i class="fas fa-arrow-left"></i> Back to Website</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
