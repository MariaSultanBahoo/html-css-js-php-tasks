<?php
session_start();
require 'db.php';

$error = '';

function authenticateUser($username, $password, $pdo) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE userName = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "<pre>";
    echo "Submitted Username: $username\n";
    echo "Submitted Password: $password\n";
    echo "User Found: ";
    print_r($user);
    echo "</pre>";

    if ($user && password_verify($password, $user['userPass'])) {
        echo "<p>Password is valid ✅</p>";
        return $user;
    } else {
        echo "<p>Password is invalid ❌</p>";
    }

    return false;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = authenticateUser($username, $password, $pdo);

    if ($user) {
        $_SESSION['user'] = $user;
        header("Location: profile.php");
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: white;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #4a90e2;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #357ab7;
        }

        .error {
            color: red;
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
        }

        @media (max-width: 500px) {
            .login-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <form method="POST">
        <input type="text" name="username" required placeholder="Username">
        <input type="password" name="password" required placeholder="Password">
        <button type="submit">Login</button>
    </form>
    <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
</div>

</body>
</html>
