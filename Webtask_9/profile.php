<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .profile-card {
            background: #fff;
            padding: 30px 40px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .profile-card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 4px solid #4a90e2;
            margin-bottom: 15px;
        }

        h2 {
            color: #333;
            margin-bottom: 10px;
        }

        p {
            color: #555;
            font-size: 16px;
            margin-bottom: 20px;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4a90e2;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #357ab7;
        }
    </style>
</head>
<body>

<div class="profile-card">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTCC8BjLBMPtHE5MPlTR6xNRQYI3L9kcSQNpQ&s" alt="Profile Picture">
    <h2>Welcome, <?= htmlspecialchars($user['userName']) ?></h2>
    <p>Name: <?= htmlspecialchars($user['userName']) ?></p>
    <a href="logout.php">Logout</a>
</div>

</body>
</html>
