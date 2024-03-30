<?php
    session_start(); 
    
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "assignment2";
    
    // Creating a PDO connection
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    // To ensure that the connection is made
    if ($pdo) {
        if(isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
        
            $sql = 'SELECT * FROM users WHERE username = :username AND password = :password';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
        
            if ($stmt->execute()) {
                // Check if user exists
                if ($stmt->rowCount() > 0) {
                    // User authenticated, set session and redirect
                    $_SESSION['loggedin'] = true;
                    header('Location: admin-index.php');
                    exit();
                } else {
                    // User does not exist or credentials are incorrect
                    header('Location: login.php?login_error=1');
                    exit();
                }
            } else {
                echo "Execution failed.";
            }
        }
    } else {
        echo "Database Connection Failed";
        exit;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/login.css">
    <title>Log In</title>
</head>
<body>
    <div class="login__container">
        <h2>Login</h2>
        <p>Please fill in your credentials to login</p>

        <form action="" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</body>
</html>