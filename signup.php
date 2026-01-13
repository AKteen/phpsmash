<?php
include 'partials/dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    if ($password == $confirm_password) {
        // Check if user already exists
        $checkUser = "SELECT * FROM users WHERE username='$username' OR email='$email'";
        $result = $conn->query($checkUser);
        
        if ($result->num_rows > 0) {
            echo "<div class='alert alert-danger'>Username or email already exists!</div>";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, email, password, Date) VALUES ('$username', '$email', '$hashedPassword', NOW())";
            
            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success'>Registration successful!</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
            }
        }
    } else {
        echo "<div class='alert alert-danger'>Passwords do not match!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'partials/navbar.php'; ?>
    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-light text-dark">
                        <h3 class="text-center mb-0">Sign Up</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                            </div>
                            <button type="submit" class="btn btn-secondary w-100">Sign Up</button>
                        </form>
                        <div class="text-center mt-3">
                            <p class="mb-0">Already have an account? <a href="login.php">Login here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>